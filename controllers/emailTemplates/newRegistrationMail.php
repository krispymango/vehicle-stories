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

$n=10;
function getName($n) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    }
    return $randomString;
}
$activation_key = getName($n);
$activation_msg = "<a href='".REGISTRATION_ACTIVATION_LNK .'u_id='.bin2hex(base64_encode($_SESSION['id'])).'&acc_key='.$activation_key."'>Activate account</a>";

$sql_et_ins = "UPDATE vs_user SET registration_activation_key = '$activation_key' WHERE email = '$_SESSION[email]' AND username = '$_SESSION[username]'";
$sql_et_ins_exec = mysqli_query($conn,$sql_et_ins);


if ($sql_et_exec && $sql_et_fetch && $sql_et_ins_exec)
{
  $message_change = str_replace("[activation_link]",$activation_msg,$sql_et_fetch['account_registration_activation_link']);
  $message_change = str_replace("[username]",$_SESSION['username'],$message_change);
  $mail = new PHPMailer(true);

 //$mail->SMTPDebug = 4;                               // Enable verbose debug output

  $mail->isSMTP();                                      // Set mailer to use SMTP
  $mail->Host = HOST_MAIL;  // Specify main and backup SMTP servers
  $mail->SMTPAuth = true;                               // Enable SMTP authentication
  $mail->Username = EMAIL;                 // SMTP username
  $mail->Password = PASS;                           // SMTP password
  $mail->SMTPSecure = 'ssl';
  $mail->Port       = 465;                               // TCP port to connect to

  $mail->setFrom(EMAIL, 'Vehicle Stories Registration Activation');
  $mail->addAddress($_SESSION['email']);     // Add a recipient

  $mail->addReplyTo(EMAIL);
  // print_r($_FILES['file']); exit;
/*
  for ($i=0; $i < count($_FILES['file']['tmp_name']) ; $i++)
  {
    $mail->addAttachment($_FILES['file']['tmp_name'][$i], $_FILES['file']['name'][$i]);    // Optional name
  }
  */
  $mail->isHTML(true);                                  // Set email format to HTML

  $mail->Subject = 'Registration Message';
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
