<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login form</title>
  <link rel="stylesheet" href="css/login.css">
  <link rel="stylesheet" href="css/general.css">
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


