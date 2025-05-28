<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require ROOT_PATH .'/controllers/mailerPhp/PHPMailer.php';
require ROOT_PATH .'/controllers/mailerPhp/SMTP.php';
require ROOT_PATH .'/controllers/mailerPhp/Exception.php';
require ROOT_PATH .'/controllers/credential.php';



  $mail = new PHPMailer(true);

 //$mail->SMTPDebug = 4;                               // Enable verbose debug output

  $mail->isSMTP();                                      // Set mailer to use SMTP
  $mail->Host = HOST_MAIL;  // Specify main and backup SMTP servers
  $mail->SMTPAuth = true;                               // Enable SMTP authentication
  $mail->Username = EMAIL;                 // SMTP username
  $mail->Password = PASS;                           // SMTP password
  $mail->SMTPSecure = 'ssl';
  $mail->Port       = 465;                                 // TCP port to connect to

  $mail->setFrom(EMAIL, 'Vehicle Stories Contact reply');
  $mail->addAddress($email);     // Add a recipient

  $mail->addReplyTo(EMAIL);
  // print_r($_FILES['file']); exit;
/*
  for ($i=0; $i < count($_FILES['file']['tmp_name']) ; $i++)
  {
    $mail->addAttachment($_FILES['file']['tmp_name'][$i], $_FILES['file']['name'][$i]);    // Optional name
  }
  */
  $mail->isHTML(true);                                  // Set email format to HTML

  $mail->Subject = $sbjct;
  $mail->Body    = $message;
  //$mail->AltBody = $_POST['message'];

  if(!$mail->send())
  {
      //echo 'Message could not be sent.';
      //echo 'Mailer Error: ' . $mail->ErrorInfo;
  } else {
      //echo 'Message has been sent';
  }

 ?>
