<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require ROOT_PATH .'/controllers/mailerPhp/PHPMailer.php';
require ROOT_PATH .'/controllers/mailerPhp/SMTP.php';
require ROOT_PATH .'/controllers/mailerPhp/Exception.php';
require ROOT_PATH .'/controllers/credential.php';

$sql_et = "SELECT * FROM vs_email_templates";
$sql_et_exec = mysqli_query($conn,$sql_et);
$sql_et_fetch = mysqli_fetch_assoc($sql_et_exec);

$sql_d = "SELECT * FROM vs_user WHERE id = '$user_id'";
$sql_d_exec = mysqli_query($conn,$sql_d);
$sql_d_fetch = mysqli_fetch_assoc($sql_d_exec);
$name = $sql_d_fetch['username'];
$email = $sql_d_fetch['email'];

if ($sql_et_exec && $sql_et_fetch && $sql_d_fetch)
{
  $message_change = str_replace("[username]",$name,$sql_et_fetch['account_blockage']);
  $mail = new PHPMailer(true);

 //$mail->SMTPDebug = 4;                               // Enable verbose debug output

  $mail->isSMTP();                                      // Set mailer to use SMTP
  $mail->Host = HOST_MAIL;  // Specify main and backup SMTP servers
  $mail->SMTPAuth = true;                               // Enable SMTP authentication
  $mail->Username = EMAIL;                 // SMTP username
  $mail->Password = PASS;                           // SMTP password
  $mail->SMTPSecure = 'ssl';
  $mail->Port       = 465;                                  // TCP port to connect to

  $mail->setFrom(EMAIL, 'Vehicle Stories Account Blockage');
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

  $mail->Subject = 'Account Blocked';
  $mail->Body    = $message_change;
  //$mail->AltBody = $_POST['message'];

  if(!$mail->send())
  {
      //echo 'Message could not be sent.';
      //echo 'Mailer Error: ' . $mail->ErrorInfo;
  } else {
      //echo 'Message has been sent';
  }
}

 ?>
