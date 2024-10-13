<?php
session_start();  // Start session to access stored CAPTCHA

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userInput = $_POST['user_captcha'];  // Get the user’s input
    $captcha = $_SESSION['captcha'];  // Get the stored CAPTCHA

    // Validate the CAPTCHA
    if ($userInput === $captcha) {
        echo "<h2>CAPTCHA Verified Successfully!</h2>";
    } else {
        echo "<h2>Invalid CAPTCHA. Please try again.</h2>";
    }
}
?>