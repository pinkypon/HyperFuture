<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login form</title>
  <link rel="stylesheet" href="css/login.css">
  <link rel="stylesheet" href="css/general.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
<body>

    <div class="Container">
        <div class="left-container">Hyper Future</div>
    
        <div class="right-container">  
            <form class="login-form" action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="POST">
                <p>Log In</p>   
                <input type="email" name="email" id="email" placeholder="Email"><br>
                <input type="password" name="password" id="password" placeholder="Password"><br>
                <button class="btnlog" type="submit" name="submit">Login</button>
            </form>
        </div>
    </div>
  
</body>
</html>


