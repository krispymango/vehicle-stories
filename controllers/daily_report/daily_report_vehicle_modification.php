
<?php
include '../../path.php';
require ROOT_PATH .'/app/database/connection/conn.php';


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require ROOT_PATH .'/controllers/mailerPhp/PHPMailer.php';
require ROOT_PATH .'/controllers/mailerPhp/SMTP.php';
require ROOT_PATH .'/controllers/mailerPhp/Exception.php';
require ROOT_PATH .'/controllers/credential.php';

//vehicle_modification_report
$sql_vm = "SELECT * FROM vw_dr_vehicle_modification";
$sql_vm_exec = mysqli_query($conn,$sql_vm);

$a=1;


//vehicle_modification
if ($sql_vm_exec)
{
  $message_vehicle_modification_header = "
  <h4 style='text-align:center;'>New vehicle modification daily report</h4><table>
      <thead>
      <th>id</th>
    <th>username</th>
    <th>date of modification</th>
    <th>brand</th>
      </thead>
      <tbody>";

while ($sql_va_fetch = mysqli_fetch_assoc($sql_va_exec))
{
  $message_vehicle_modification_body .=
        "<tr>
          td>".$a++."</td>
          <td>".$sql_va_fetch['username']."</td>
          <td>".$sql_va_fetch['last_modification']."</td>
          <td>".$sql_va_fetch['brand']."</td>
        </tr>";
}
$message_vehicle_modification_footer = "
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
  $mail->Port       = 465;                                 // TCP port to connect to

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
  $message_vehicle_modification_header.
  $message_vehicle_modification_body.
  $message_vehicle_modification_footer
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
