<?php  

  class MyStore{
    private $server = "mysql:host=localhost;dbname=storedb";
    private $user = "root";
    private $pass = "";
    private $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);
    protected $conn;

    public function openConnection(){

      try{
        $this->conn = new PDO($this->server, $this->user, $this->pass, $this->options);
        return $this->conn;
      }
      catch(PDOException $e){
        echo "Error: " . $e->getMessage();
      }
    }

    public function closeConnection(){
      $this->conn = null;
    }

    public function getUsers(){
      $connection = $this->openConnection();
      $stmt = $connection->prepare("SELECT * FROM members");
      $stmt->execute();
      $users = $stmt->fetchAll();
      $usercount = $stmt->rowCount();

      if($usercount > 0){
        return $users;
      }
      else{
        return 0;
      }
    }    

    public function gettotalUsers(){
      $connection = $this->openConnection();
      $stmt = $connection->prepare("SELECT * FROM members");
      $stmt->execute();
      $stmt->fetchAll();
      $usercount = $stmt->rowCount();

      if($usercount > 0){
        return $usercount;
      }
      else{
        return 0;
      }
    } 

    public function login(){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $username = $_POST["email"];
        $password = md5($_POST["password"]);
       

        $connection = $this->openConnection();
        $stmt = $connection->prepare("SELECT * FROM members WHERE email = ? AND password = ?");
        $stmt->execute([$username, $password]);
        $user = $stmt->fetch();
        $total = $stmt->rowCount();

          if($total > 0){
            // echo "Welcome {$user["first_name"]} {$user["last_name"]}";
            $this->set_userdata($user);
            header("Location:index.php");
          }
          else{
            echo "Login failed";
          }
      }
    }

    public function set_userdata($array){
      
      if(!isset($_SESSION)){
        session_start();
        
      }
      $_SESSION['userdata'] = array(
        "fullname" => $array['first_name']." ". $array['last_name'],
        "access" => $array['access'],
        "id" => $array['id']);
      return $_SESSION['userdata'];

      
    }

    public function get_userdata(){
      if(!isset($_SESSION)){
        session_start();
      }

      if(isset($_SESSION['userdata'])){
       
        return $_SESSION['userdata'];
      }
      else{
        return null;
      }
      
    }

    public function get_userinfo(){
        $this->get_userdata();
        $id = $_SESSION['userdata']['id'];

        $connection = $this->openConnection();
        $stmt = $connection->prepare("SELECT * FROM members WHERE id = ?");
        $stmt->execute([$id]);
        $user = $stmt->fetch();
        $total = $stmt->rowCount();

          if($total > 0){
            return $user;
          }
          else{
            echo "theres an error in the code";
          }
  }
  public function update_profile(){
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      
      if (isset($_POST['number']) || isset($_POST['address']) || !empty($_POST['number']) || !empty($_POST['address'])) {

        $mobile = $_POST['number'];
        $address = $_POST['address'];
        $id = $_POST['id'];

        $connection = $this->openConnection();
        $stmt = $connection->prepare("UPDATE `members` SET `mobile`= ?,`address`= ? WHERE `id` = ?");
        $stmt->execute([$mobile, $address, $id]);
        $user = $stmt->fetch();
        $total = $stmt->rowCount();

        if ($total > 0) {
          echo '<script>alert("Profile updated successfully!"); window.location.href = "profile.php";</script>';
          exit; 
        } else {
          echo '<script>alert("Update error!"); window.location.href = "profileedit.php";</script>';
          exit; 
        }
      }
    }
}

    public function logout(){
      if(!isset($_SESSION)){
        session_start();
      }

      $_SESSION['userdata'] = null;
      unset($_SESSION['userdata']);
    }

    public function check_user($email){
      $connection = $this->openConnection();
      $stmt = $connection->prepare("SELECT * FROM members WHERE email = ?");
      $stmt->execute([$email]);
      $total = $stmt->rowCount();

        return $total;
  }

    public function add_user(){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $firstname = $_POST['fname'];
        $lastname = $_POST['lname'];
        $access = $_POST['access'];

        if($this->check_user($email) == 0){

          $connection = $this->openConnection();
          $stmt = $connection->prepare("INSERT INTO members (`email`,`password`,`first_name`,`last_name`,`access`)VALUES(?,?,?,?,?)");
          $stmt->execute([$email, $password, $firstname, $lastname, $access]);

          $_SESSION['signup_success'] = true;
      
        }
        else{
          echo "user already exists";
        }
      }
    }

    public function delete_user(){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $id = $_POST['id'];
        
        $connection = $this->openConnection();
        $stmt = $connection->prepare("DELETE FROM `members` WHERE id = ?");
        $stmt->execute([$id]);
        $stmt->fetch();
        $total = $stmt->rowCount();

        if ($total > 0) {
          echo '<script>alert("you have successfully deleted a user!"); window.location.href = "admin.php";</script>';
          exit; 
        } else {
          echo '<script>alert("delete unsuccessful!"); window.location.href = "admin.php";</script>';
          exit; 
      }
    }
  }

    public function show_404(){
      http_response_code(404);
      echo  "Page not found";
      die;
    }

    public function check_product_exist($name){
      $conn = $this->openConnection();
      $stmt = $conn->prepare("SELECT LOWER('product_name') FROM products WHERE product_name = ?");
      $stmt->execute([strtolower($name)]);
      $total = $stmt->rowCount();

      return $total;
    }

    public function add_product(){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(empty($_POST['product_name'])){
          echo "Please fill all fields.";
        }

        else{
          $product_name = $_POST['product_name'];
          $min_stocks = $_POST['min_stocks'];
          $image_name = $_FILES['my_image']['name'];
          $tmp_name = $_FILES['my_image']['tmp_name'];
          $error = $_FILES['my_image']['error'];
         
  
            if($error === 0){
              $img_ex = pathinfo($image_name, PATHINFO_EXTENSION);
              $img_ex_lc = strtolower($img_ex);
              $allowed_exs = array("jpg","jpeg","png");
  
              if(in_array($img_ex_lc, $allowed_exs)){
                $new_img_name = uniqid("IMG-", true). '.' .$img_ex_lc;
                $img_upload_path = 'uploads/'. $new_img_name;
                move_uploaded_file($tmp_name,$img_upload_path);
               
                 if($this->check_product_exist($product_name) == 0)
                {
                  $conn = $this->openConnection();
                  $stmt = $conn->prepare("INSERT INTO products(`product_name`,`min_stocks`,`image_url`) VALUES (?, ?, ?)");
                  $stmt->execute([$product_name, $min_stocks, $new_img_name]);
                  header('location: admin.php');
                }
                else{
                  echo "This product already exists";
                }
              }
              else{
                echo "You can't upload files of this type";
              }
  
            }
            else{
              echo "Please choose an image";
            }
          }
        }
       
    }

    public function get_product(){

      $conn = $this->openConnection();
      $stmt = $conn->prepare("SELECT * FROM products");
      $stmt->execute();
      $products = $stmt->fetchAll();
      $total = $stmt->rowCount();

      if ($total > 0){
        return $products;
      }
      else{
        return false;
      }

    }

    public function get_single_product($id){
      
      $conn = $this->openConnection();
      $stmt = $conn->prepare("SELECT t1.id AS id, product_name, min_stocks, image_url, SUM(qty) AS total 
      FROM products t1 
      INNER JOIN product_items t2 ON t1.id = t2.product_id 
      WHERE t1.id = ?");
      $stmt->execute([$id]);
      $product = $stmt->fetch();
      $total = $stmt->rowCount();

      if ($total > 0){
        return $product;
      }
      else{
        return $this->show_404();
      }

    }

    public function get_total_qty($product_id){
      $conn = $this->openConnection();
      $stmt = $conn->prepare("SELECT *, SUM(qty) AS total FROM product_items WHERE product_id = ?");
      $stmt->execute([$product_id]);
      $product_qty = $stmt->fetch();

      return $product_qty['total'];
    }

    public function add_stock(){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        if(isset($_POST['brand_name']) && isset($_POST['price']) && isset($_POST['batch_number']) && !empty($_POST['brand_name']) && !empty($_POST['price']) && !empty($_POST['batch_number'])){

          $brand_name = $_POST['brand_name'];
          $qty = $_POST['qty'];
          $batch_number = $_POST['batch_number'];
          $product_id= $_POST['product_id'];
          $added_by = $_POST['added_by'];
          $price = $_POST['price'];
        
          if(is_numeric($price)){
            $conn = $this->openConnection();
            $stmt = $conn->prepare("INSERT INTO product_items (`product_id`, `qty`, `vendor_name`, `added_by`, `batch_number`, `price`) VALUES(?, ?, ?, ?, ?, ?)");
            $stmt->execute([$product_id, $qty, $brand_name, $added_by, $batch_number, $price]);
            
            header("location:Product_detailsadmin.php?id=".$product_id);
          }
          else{
            echo"please enter a valid price";
          }
        
        }
        else{
          echo "please fill all fileds.";
        }
      }
    }

    public function view_all_stocks($product_id){
      $conn = $this->openConnection();
    //  $stmt = $conn->prepare("SELECT * FROM product_items WHERE product_id = ?");

      $stmt = $conn->prepare("SELECT t1.id, t1.vendor_name, t1.price, t1.qty, SUM(t2.qty) as sale_qty, SUM(t2.qty * t2.price) as totalsales FROM product_items t1 LEFT JOIN sales t2 ON t1.id = t2.stocks_id WHERE t1.product_id = ? GROUP BY t1.id");

      $stmt->execute([$product_id]);
      $stocks = $stmt->fetchAll();
      $total = $stmt->rowCount();

        if ($total > 0){
          return $stocks;
        }
        else{
          
        }
    }

    public function get_stock_details($stock_id){
      $conn = $this->openConnection();
      $stmt = $conn->prepare("SELECT * FROM product_items WHERE id = ?");
      $stmt->execute([$stock_id]);
      $stocks = $stmt->fetch();
      $total = $stmt->rowCount();

        if ($total > 0){
          return $stocks;
        }
        
    }

    public function insert_sales($stock_id, $qty, $price, $product_id, $customer_name){
      $item = $this->get_stock_details($stock_id);
      $brand = $item['vendor_name'];


      $conn = $this->openConnection();
      $stmt = $conn->prepare("INSERT INTO sales (`product_id`, `stocks_id`, `brand_name`, `qty`, `price`, `customer_name`) VALUES (?,?,?,?,?,?)");
      $stmt->execute([$product_id, $stock_id, $brand, $qty, $price, $customer_name]);
    }
   

}
$store = new MyStore();


?>
