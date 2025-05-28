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

if (isset($_SESSION['user_idd']))
{
$id = $_SESSION['user_idd'];
}
else {
$id = $_SESSION['id'];
}
$sql = "SELECT * FROM vs_user WHERE id = '$id'";
$sql_exec = mysqli_query($conn,$sql);
$sql_fetch = mysqli_fetch_assoc($sql_exec);

$name = $sql_fetch['username'];
if ($sql_et_exec && $sql_et_fetch)
{
  $message_change_new = str_replace("[username]",$name,$sql_et_fetch['success_email_change_new']);
  $message_change_old = str_replace("[username]",$name,$sql_et_fetch['success_email_change_old']);

$mail = new PHPMailer(true);

 //$mail->SMTPDebug = 4;                               // Enable verbose debug output

  $mail->isSMTP();                                      // Set mailer to use SMTP
  $mail->Host = HOST_MAIL;  // Specify main and backup SMTP servers
  $mail->SMTPAuth = true;                               // Enable SMTP authentication
  $mail->Username = EMAIL;                 // SMTP username
  $mail->Password = PASS;                           // SMTP password
  $mail->SMTPSecure = 'ssl';
  $mail->Port       = 465;                                  // TCP port to connect to

  $mail->setFrom(EMAIL, 'Vehicle Stories Email Change Success Message');
  $mail->addAddress($new_email);     // Add a recipient

  $mail->addReplyTo(EMAIL);
  // print_r($_FILES['file']); exit;
/*
  for ($i=0; $i < count($_FILES['file']['tmp_name']) ; $i++)
  {
    $mail->addAttachment($_FILES['file']['tmp_name'][$i], $_FILES['file']['name'][$i]);    // Optional name
  }
  */
  $mail->isHTML(true);                                  // Set email format to HTML

  $mail->Subject = 'Successful Email change';
  $mail->Body    = $message_change_new;
  //$mail->AltBody = $_POST['message'];



  if(!$mail->send())
  {
      //echo 'Message could not be sent.';
      //echo 'Mailer Error: ' . $mail->ErrorInfo;
  } else {

      // Remove previous recipients
      $mail->ClearAllRecipients();
      // alternative in this case (only addresses, no cc, bcc):
      // $mail->ClearAddresses();

      $mail->Body = $message_change_old;
      //$adminemail = $generalsettings[0]["admin_email"];

      // Add the admin address
      $mail->AddAddress($_SESSION['email']);
      $mail->Send();
  }
}
 ?>
