<?php
require_once "../config/database.php";
$errors = [];
// ENTER A NEW PASSWORD
if (isset($_POST['new_password'])) {
    $new_pass = mysqli_real_escape_string($conn, $_POST['new_pass']);
    $new_pass_c = mysqli_real_escape_string($conn, $_POST['new_pass_c']);

    // Grab to token that came from the email link
    $token = $_SESSION['token'];
    if (empty($new_pass) || empty($new_pass_c)) array_push($errors, "Password is required");
    if ($new_pass !== $new_pass_c) array_push($errors, "Password do not match");
    if (count($errors) == 0) {
        // select email address of user from the password_reset table
        $sql = "SELECT email FROM password_resets WHERE token='$token' LIMIT 1";
        $results = mysqli_query($conn, $sql);
        $email = mysqli_fetch_assoc($results)['email'];

        if ($email) {
            $new_pass = md5($new_pass);
            $sql = "UPDATE users SET password='$new_pass' WHERE email='$email'";
            $results = mysqli_query($conn, $sql);
            header('location: index.php');
        }
    }
}
?>
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Password Reset PHP</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
<form class="login-form" action="" method="post">
    <h2 class="form-title">New password</h2>
    <!-- form validation messages -->
    <?php include('messages.php'); ?>
    <div class="form-group">
        <label>New password</label>
        <input type="password" name="new_pass">
    </div>
    <div class="form-group">
        <label>Confirm new password</label>
        <input type="password" name="new_pass_c">
    </div>
    <div class="form-group">
        <button type="submit" name="new_password" class="login-btn">Submit</button>
    </div>
</form>
</body>
</html>