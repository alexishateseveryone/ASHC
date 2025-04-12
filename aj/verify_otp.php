<?php
session_start();
$user_otp = $_POST['otp'];

if ($user_otp == $_SESSION['otp']) {
    echo "✅ OTP Verified! Welcome, " . $_SESSION['email'];
    // Continue registration like saving to DB
} else {
    echo "❌ Incorrect OTP. Try again.";
}
?>
