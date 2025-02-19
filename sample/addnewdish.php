<?php 
require_once('storeclass.php');
$id = $_GET['id'];
$product = $store->get_single_product($id);
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
  <link rel="stylesheet" href="css/adddish.css">
</head>
<body>
  
  <div class="container">
    <form method="POST">
      <label>Dish Name</label><br>
      <input type="text" name="brand_name" id="brand_name" require><br>
      <label>Qty</label><br>
      <input type="number" name="qty" id="qty" min="1" value="1"><br>
      <label>Price</label><br>
      <input type="text" name="price" id="price"><br>
      <label>Batch Number</label><br>
      <input type="text" name="batch_number" id="batch_number"><br>
      <input type="hidden" name="product_id" value="<?= $product['id'];?>"><br>
      <input type="hidden" name="added_by" value="<?= $userdetails['fullname']?>">
      
      <button type="submit" name="add_stock">Add Dish</button><br>
      <div style="color: red;"><?php $store->add_stock();?></div>
    </form>
  </div>
  <a href="product_detailsadmin.php?id=<?= $product['id'];?>">
    <button class="cancel">Cancel</button>
  </a>

</body>
</html>