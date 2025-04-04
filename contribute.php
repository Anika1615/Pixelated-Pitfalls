<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $contribution = htmlspecialchars($_POST['contribution']);

    // Email recipients
    $to1 = "aadya.1921@uws.edu.in";  // First email address
    $to2 = "bhutadaa@uws.edu.in";  // Second email address

    // Subject of the email
    $subject = "New Contribution Submission on Pixelated Pitfalls";

    // Message body
    $message = "
    New Contribution Received:

    Name: $name
    Email: $email

    Contribution:
    $contribution
    ";

    // Headers for the email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8" . "\r\n";
    $headers .= "From: no-reply@pixelatedpitfalls.com" . "\r\n";

    
    // Using PHPMailer (recommended) for sending the email
    require 'PHPMailer'; // Make sure to include PHPMailer

    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = $smtp_host;
    $mail->SMTPAuth = true;
    $mail->Username = $smtp_user;
    $mail->Password = $smtp_pass;
    $mail->SMTPSecure = 'ssl';
    $mail->Port = $smtp_port;

    // Set the email details
    $mail->setFrom($smtp_user, 'Pixelated Pitfalls');
    
    // Add multiple recipients
    $mail->addAddress($to1);
    $mail->addAddress($to2);

    $mail->Subject = $subject;
    $mail->Body    = $message;
    $mail->isHTML(true);

    // Send email
    if ($mail->send()) {
        echo "Thank you for your submission! ";
    } else {
        echo "Sorry, something went wrong. Please try again later.";
    }
}
?>