
<?php
include '../../path.php';
require ROOT_PATH .'/app/database/connection/conn.php';


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require ROOT_PATH .'/controllers/mailerPhp/PHPMailer.php';
require ROOT_PATH .'/controllers/mailerPhp/SMTP.php';
require ROOT_PATH .'/controllers/mailerPhp/Exception.php';
require ROOT_PATH .'/controllers/credential.php';


//vehicle_change_password_report
$sql_cp = "SELECT * FROM vw_dr_change_password";
$sql_cp_exec = mysqli_query($conn,$sql_cp);


$a=1;


//change_password
if ($sql_cp_exec)
{
  $message_change_password_header = "
  <h4 style='text-align:center;'>Password change daily report</h4><table>
      <thead>
      <th>id</th>
    <th>username</th>
    <th>password change date</th>
    <th>password change time</th>
      </thead>
      <tbody>";

while ($sql_cp_fetch = mysqli_fetch_assoc($sql_cp_exec))
{
  $message_change_password_body .=
        "<tr>
          td>".$a++."</td>
          <td>".$sql_cp_fetch['username']."</td>
          <td>".$sql_cp_fetch['change_password_date']."</td>
          <td>".$sql_cp_fetch['change_password_time']."</td>
        </tr>";
}
$message_change_password_footer = "
    </tbody>
    </table>
    <br>";
}








//echo $name .' '. $curr_date.' '. $time_of_addition;

if ($sql_vw_user_exec)
{

  $mail = new PHPMailer(true);

 //$mail->SMTPDebug = 4;                               // Enable verbose debug output

  $mail->isSMTP();                                      // Set mailer to use SMTP
  $mail->Host = HOST_MAIL;  // Specify main and backup SMTP servers
  $mail->SMTPAuth = true;                               // Enable SMTP authentication
  $mail->Username = EMAIL;                 // SMTP username
  $mail->Password = PASS;                           // SMTP password
  $mail->SMTPSecure = 'ssl';
  $mail->Port       = 465;                               // TCP port to connect to

  $mail->setFrom(EMAIL, 'Vehicle Stories Daily Report');
  $mail->addAddress(EMAIL);     // Add a recipient

  $mail->addReplyTo(EMAIL);
  // print_r($_FILES['file']); exit;
/*
  for ($i=0; $i < count($_FILES['file']['tmp_name']) ; $i++)
  {
    $mail->addAttachment($_FILES['file']['tmp_name'][$i], $_FILES['file']['name'][$i]);    // Optional name
  }
  */
  $mail->isHTML(true);                                  // Set email format to HTML

  $mail->Subject = 'Daily Report';
  $mail->Body    =

  $message_change_password_header.
  $message_change_password_body.
  $message_change_password_footer
  ;
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
