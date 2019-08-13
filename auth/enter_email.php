<?php
/*
  Accept email of user whose password is to be reset
  Send email to user to reset their password
*/
$errors = [];
require_once "../config/database.php";
if (isset($_POST['reset-password'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    // ensure that the user exists on our system
    $query = "SELECT email FROM users WHERE email='$email'";
    $results = mysqli_query($conn, $query);

    if (empty($email)) {
        array_push($errors, "Your email is required");
    }else if(mysqli_num_rows($results) <= 0) {
        array_push($errors, "Sorry, no user exists on our system with that email");
    }
    // generate a unique random token of length 100
    $token = bin2hex(random_bytes(50));

    if (count($errors) == 0) {
        // store token in the password-reset database table against the user's email
        $sql = "INSERT INTO password_resets(email, token) VALUES ('$email', '$token')";
        $results = mysqli_query($conn, $sql);

        // Send email to user with the token in a link they can click on
        $to = $email;
        $subject = "Password Reset";
        $msg = "Hi there, click on this <a href=\"new_password.php?token=" . $token . "\">link</a> to reset your password on our site";
        $msg = wordwrap($msg,70);
        $headers = "From: info@examplesite.com";
        mail($to, $subject, $msg, $headers);
        header('location: pending.php?email=' . $email);
    }
}
?>