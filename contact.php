<?php
  // Configuration
  $to = 'arjunraj2k3k@gmail.com'; // Your Gmail address
  $subject = 'Contact Form Submission';

  // Validate and sanitize user-input data
  $name = trim(filter_var($_POST['name'], FILTER_SANITIZE_STRING));
  $email = trim(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));
  $message = trim(filter_var($_POST['message'], FILTER_SANITIZE_STRING));

  // Create the email message
  $message_body = "Name: $name\n";
  $message_body .= "Email: $email\n";
  $message_body .= "Message: $message";

  // Use PHPMailer to send the email
  require 'PHPMailer/PHPMailerAutoload.php';
  $mail = new PHPMailer;
  $mail->setFrom('your_email_address@example.com', 'Your Name');
  $mail->addAddress($to, 'Your Name');
  $mail->Subject = $subject;
  $mail->Body = $message_body;
  if (!$mail->send()) {
    echo 'Error sending email: ' . $mail->ErrorInfo;
    exit;
  }

  // Redirect to a thank-you page or display a success message
  echo 'Thank you for getting in touch!';
  exit;
?>