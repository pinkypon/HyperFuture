<?php
require('connection.php');
session_start();

// if (!isset($_SESSION["user_verification"])) {
//     header("Location: ../verification/");   
// }

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['submit'])) {
        // Sanitize and validate inputs
        $fname = htmlspecialchars(strip_tags(trim($_POST['fname'])), ENT_QUOTES, 'UTF-8');
        $lname = htmlspecialchars(strip_tags(trim($_POST['lname'])), ENT_QUOTES, 'UTF-8');
        $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
        $user_kind = htmlspecialchars(strip_tags(trim($_POST['category'])), ENT_QUOTES, 'UTF-8');

        // Validate inputs
        $errors = [];
        if (empty($fname) || !preg_match('/^[a-zA-Z\s]+$/', $fname)) {
            $errors[] = 'Invalid first name. Only letters and spaces are allowed.';
        }
        if (empty($lname) || !preg_match('/^[a-zA-Z\s]+$/', $lname)) {
            $errors[] = 'Invalid last name. Only letters and spaces are allowed.';
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'Invalid email address.';
        }
        if (empty($user_kind) || !preg_match('/^[a-zA-Z\s]*\d[a-zA-Z\s]*$/', $user_kind) || substr_count($user_kind, '0') + substr_count($user_kind, '1') + substr_count($user_kind, '2') + substr_count($user_kind, '3') + substr_count($user_kind, '4') + substr_count($user_kind, '5') + substr_count($user_kind, '6') + substr_count($user_kind, '7') + substr_count($user_kind, '8') + substr_count($user_kind, '9') !== 1) {
            $errors[] = 'Invalid UID. Must contain exactly one number and can only contain alphabetic characters and spaces.';
        }
     

        if (empty($errors)) {
            // Check if UID already exists
            $checkSql = "SELECT COUNT(*) FROM register_user WHERE user_email = ?";
            $checkStmt = $pdo->prepare($checkSql);
            $checkStmt->execute([$email]);
            $emailExists = $checkStmt->fetchColumn();

            if ($emailExists > 0) {
                $errors[] = 'Email already registered. Please choose a different email.';
            } else {
                date_default_timezone_set('Asia/Manila');
                $regDate = date('Y-m-d H:i:s');
                $sql = "INSERT INTO register_user(first_name, last_name, user_email, user_kind, reg_date) VALUES (?, ?, ?, ?, ?)";
                $stmt = $pdo->prepare($sql);

                if ($stmt->execute([$fname, $lname, $email, $user_kind, $regDate])) {
                    unset($_SESSION['user_verification']);
                    $message = "Register Success";
                    $type = "success";
                    $redirect = "../";
                    echo "<script>
                    window.onload = function() {
                        Swal.fire({
                            title: 'NOTE',
                            text: '{$message}',
                            icon: '{$type}',
                            timer: 2000,
                            timerProgressBar: true,
                            didOpen: () => {
                                Swal.showLoading();
                            },
                            willClose: () => {
                                if ('{$redirect}') {
                                    window.location.href = '{$redirect}';
                                }
                            }
                        }); 
                    };
                    </script>";
                } else {
                    $message = "Register Failed. Please try again.";
                    $type = "error";
                    echo "<script>
                    window.onload = function() {
                        Swal.fire({
                            title: 'NOTE',
                            text: '{$message}',
                            icon: '{$type}',
                            timer: 2000,
                            timerProgressBar: true,
                            didOpen: () => {
                                Swal.showLoading();
                            },
                            willClose: () => {
                                window.history.back();
                            }
                        });
                    }
                    </script>";
                }
            }
        }

        if (!empty($errors)) {
            // Display validation errors
            $message = implode(' ', $errors);
            $type = "error";
            echo "<script>
            window.onload = function() {
                Swal.fire({
                    title: 'Validation Errors',
                    text: '{$message}',
                    icon: '{$type}',
                    timer: 2000,
                    timerProgressBar: true,
                    didOpen: () => {
                        Swal.showLoading();
                    },
                    willClose: () => {
                        window.history.back();
                    }
                });
            }
            </script>";
        }
    }
}



            //else{
        //   $message = "Passwords do not match.";
        //   $type = "error";
        //   echo "<script>
        //   window.onload = function() {
        //       Swal.fire({
        //           title: 'NOTE',
        //           text: '{$message}',
        //           icon: '{$type}',
        //           timer: 2000,
        //           timerProgressBar: true,
        //           didOpen: () => {
        //               Swal.showLoading();
        //           },
        //       });
        //   }
        //   </script>";
        // }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/register.css">
</head>
<body>
<div class="container">
    <form class="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="logo-container">
            <img class="cyberpark-logo" src="../admin/image/logo1.png" alt="Logo">
        </div>
        <p class="title">Register</p>
        <div class="flex">
            <label>
                <input class="input" type="text" name="fname" placeholder="" required>
                <span>Firstname</span>
            </label>
            <label>
                <input class="input" type="text" name="lname" placeholder="" required>
                <span>Lastname</span>
            </label>
        </div>
        <label>
            <input class="input" type="email" name="email" placeholder="" required>
            <span>Email</span>
        </label>
        <label>
            <input class="input" type="text" name="category" placeholder="" required>
            <span>Category</span>
        </label>  
        <button type="submit" name="submit" class="submit">Register</button>
    </form>
</div>
<div class="bottom"></div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>
<script>