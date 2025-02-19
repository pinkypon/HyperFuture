<?php 
require_once("storeclass.php");

$userdetails = $store->get_userdata();

if(isset($userdetails)){
  
  if($userdetails['access'] != "administrator"){
    header('Location:index.php');
  } 
}
else{
  header('Location:login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="css/addresto.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Noto+Sans+JP:wght@100&family=Quicksand:wght@500&display=swap" rel="stylesheet">
</head>
<body>

<?php if (isset($_GET['error'])):?>
<p><?php echo $_GET['error'];?></p>
<?php endif ?>



  <div class="container">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"    method="post" enctype="multipart/form-data">
    <label>Restaurant Name</label><br>
    <input type="text" name="product_name" id="product_name"><br>
    <label>Minimum stocks</label><br>
    <input type="number" name="min_stocks" id="min_stocks" min="1" value="1"><br>
    <label>Choose an Image</label><br>
    <input type="file" name="my_image"><br><br>
    <button type="submit" name="add_product">Add Restaurant</button>
    </form>
    
    <div style="color: red;"><?php $store->add_product(); ?></div>
    
  </div>
  <a href="admin.php">
      <button class="cancel">Cancel</button>
    </a> 


</body>
</html>