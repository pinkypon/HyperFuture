<?php
session_start();
require('../../connection.php');
if (!isset($_SESSION["logined"])) {
  header("Location: ../");
}
if (isset($_POST['logout'])) {
    // Destroy the session and clear session variables
    session_unset();    // Clears all session variables
    session_destroy();  // Destroys the session
    // Optional: Redirect to another page after logout (e.g., login page)
    header("Location: ../"); // Replace with the URL you want to redirect to
    exit();  // Don't forget to call exit to prevent further code execution
}
// Set the timezone to Philippines
date_default_timezone_set('Asia/Manila');


// Query to get the total count of users
$stmt = $pdo->query("SELECT COUNT(*) FROM register_user"); // Replace 'users' with your actual table name
$total_users = $stmt->fetchColumn(); // Fetch the total count of users
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- Logout Button -->
    <form method="post">
        <button type="submit" name="logout">Logout</button>
    </form>


    <div class="middle">
    <div class="middle-left">
      <div class="left-one">
        <div class="left-one-title">
          Parking Status
        </div>
        <div class="left-one-status">
          <div class="total-parking-slots">
            <p class="total-p-slots">Total Users</p>
            <div class="inner-parking-slots">
              <div class="total-user js-total-slots">
                <?php echo $total_users; ?>
              </div>
              <div class="inner-parking-logo">
                <img src="image/total-parking-slots.png">
              </div>
            </div>
          </div>
          <div class="available-slots">
            <p class="total-p-slots">Available Slots</p>
            <div class="inner-parking-slots">
              <div class="inner-count-slots js-available-slots">
                6
              </div>
              <div class="inner-parking-logo">
                <img src="image/available-slots.png">
              </div>
            </div>
          </div>
          <div class="occupied-slots">
            <p class="total-p-slots">Occupied Slots</p>
            <div class="inner-parking-slots">
              <div class="inner-count-slots js-occupied-slots">
                0
              </div>
              <div class="inner-parking-logo">
                <img src="image/occupied-slots.png">
              </div>
            </div>
          </div>
        </div>
      </div>

</body>
</html>
<script>

</script>