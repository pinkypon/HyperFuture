<?php 

   // sample for each code for duplicating database

$assets = [
    "monitor" => 22,
    "mouse" => 19,
    "keyboard" => 20,
    "laptop" => 1
]
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body >
    
<?php foreach ($assets as $asset => $total) {?>
<div class="bg-white p-4 shadow rounded-lg text-center flex flex-col justify-center items-center w-40 h-40 cursor-pointer hover:scale-105 transition-transform duration-200 m-10">
    <h3 class="text-2xl font-bold"><?php echo $total ?></h3>
    <p class="text-gray-600"><?php echo $asset ?></p>
</div>
<?php }?>



</body>
</html>








