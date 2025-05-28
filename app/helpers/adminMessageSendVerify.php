<?php
include '../../path.php';
include( ROOT_PATH . "/app/database/db/adminDb.php");

if (isset($_POST['admin_subject']) && !empty($_POST['admin_message']) && isset($_POST['admin_send']) && isset($_POST['admin_username_email']) && isset($_POST['admin_user_id']) && isset($_POST['admin_message']))
{
  $email = mysqli_real_escape_string($conn,$_POST['admin_username_email']);
  $user_id = mysqli_real_escape_string($conn,$_POST['admin_user_id']);
  $message = mysqli_real_escape_string($conn,$_POST['admin_message']);
  $sbjct = mysqli_real_escape_string($conn,$_POST['admin_subject']);
  $date_posted = date('d.m.Y');
  $time_posted = date("H:i:s");
  $date_posted_two = date('M d,Y');
  $time_posted_two = date("H:i:a");

  //send email
  include( ROOT_PATH . "/controllers/emailTemplates/adminEmailMail.php");
  //send email

  $sql = "SELECT * FROM vw_user WHERE id = '$user_id' ";
  $sql_exec = mysqli_query($conn,$sql);
//die($sql);
  if ($sql_fetch = mysqli_fetch_assoc($sql_exec))
  {
  $sql_snd = "INSERT INTO
  vs_messages(sender_id,receiver_id,message,date_posted,time_posted)
  VALUES('$_SESSION[id]','$user_id','$message','$date_posted_two','$time_posted_two')";
  $sql_snd_exec = mysqli_query($conn,$sql_snd);

  $sql_cf = "INSERT INTO vs_contact_form(username,subject,message,email,date_posted,time_posted,read_msg,user_id,admin_id)
  VALUES('$_SESSION[username]','$sbjct','$message','$email','$date_posted','$time_posted',0,'$user_id','$_SESSION[id]')";
  $sql_cf_exec = mysqli_query($conn,$sql_cf);


  $sql_f = "SELECT * FROM vw_contact_form WHERE user_id = '$user_id' ";
  $sql_f_exec = mysqli_query($conn,$sql_f);

  if ($sql_snd_exec && $sql_cf_exec)
  {
    while ($sql_f_fetch = mysqli_fetch_assoc($sql_f_exec))
    {
      echo "
      <div class='user_box_wrapper'>
          <div class='user_box_description'>
            <strong>".$sql_f_fetch['username']." &bull; ".$sql_f_fetch['date_posted']." ".$sql_f_fetch['time_posted']."</strong>
            <p>".$sql_f_fetch['message']."</p>
          </div>
        </div>
        ";
    }
  }
 }
}


 ?>

 <script type="text/javascript">
 $('.admin_text_chat').scrollTop($('.admin_text_chat')[0].scrollHeight);
 </script>
