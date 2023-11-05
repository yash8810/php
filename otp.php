<?php
session_start();
$otp=random_int(10000,99999);
$to_email = "yash8810patel@gmail.com";
$subject = "OTP VERIFICATION";
$body = "your otp is $otp";
$headers = "From: 21bmiit026@gmail.com";

if (mail($to_email, $subject, $body, $headers)) {
    
header("location:forgetpass2.php");
} else {
    echo "Email sending failed...";
}
?>