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

$sql = "SELECT * FROM vs_user WHERE id = '$user_id' AND email = '$email'";
$sql_exec = mysqli_query($conn,$sql);
$sql_fetch = mysqli_fetch_assoc($sql_exec);

$name = $sql_fetch['username'];
$curr_date = date('Y.m.d');
$time_of_addition = date('H:i:a');
//echo $name .' '. $curr_date.' '. $time_of_addition;

if ($sql_et_exec && $sql_et_fetch)
{
  $message_change = str_replace("[username]",$name,$sql_et_fetch['vehicle_additions']);
  $message_change = str_replace("[curr_date]",$curr_date,$message_change);
  $message_change = str_replace("[time_of_addition]",$time_of_addition,$message_change);
  $message_change = str_replace("[type]",$type_of_vehicle,$message_change);
  $message_change = str_replace("[brand]",$brand,$message_change);
  $message_change = str_replace("[year_of_production]",$year_of_production,$message_change);

  $mail = new PHPMailer(true);

 //$mail->SMTPDebug = 4;                               // Enable verbose debug output
//$mail->SMTPDebug = SMTP::DEBUG_SERVER;
  $mail->isSMTP();                                      // Set mailer to use SMTP
//  $mail->Host = HOST_MAIL;  // Specify main and backup SMTP servers
  $mail->SMTPAuth = true;                               // Enable SMTP authentication
  $mail->Username = EMAIL;                 // SMTP username
  $mail->Password = PASS;                           // SMTP password
  $mail->Host       = HOST_MAIL;
  $mail->SMTPSecure = 'ssl';
  $mail->Port       = 465;
  $mail->setFrom(EMAIL, 'Vehicle Stories New Vehicle Addition');
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

  $mail->Subject = 'New vehicle Addition';
  $mail->Body    = $message_change;
  //$mail->AltBody = $_POST['message'];

  if(!$mail->send())
  {
      //echo 'Message could not be sent.';
      //echo 'Mailer Error: ' . $mail->ErrorInfo;
      //die();
  } else {
      //die('Message has been sent');
  }
}
 ?>
