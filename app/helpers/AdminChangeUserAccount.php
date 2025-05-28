<?php
include '../../path.php';
include( ROOT_PATH . "/app/database/db/adminDb.php");

if (isset($_POST['email_status']))
{
  $user_id = trim($_POST['u_id']);
  $email_active = trim($_POST['email_status']);
  //send email
  //include( ROOT_PATH . "/controllers/emailTemplates/adminEmailMail.php");
  //send email
  $sql = "UPDATE vs_user SET email_active = '$email_active',registration_key_active_status = '$email_active',email_activation_key_status = '$email_active',password_key_active_status = '$email_active' WHERE id = '$user_id' ";
  $sql_exec = mysqli_query($conn,$sql);
  //die($sql);
  if ($sql_exec)
  {
    echo "
<script> window.location.reload()</script>
        ";
    $_SESSION['change_error'] = 1;
    //include( ROOT_PATH . "/controllers/emailTemplates/adminEmailMail.php");
  }

}
elseif (isset($_POST['blocked_status']))
{
  $user_id = trim($_POST['u_id']);
  $blocked = trim($_POST['blocked_status']);
  $curr_date = date('d.m.Y');
  $curr_time = date('H:i:s');
  if ($blocked == 1)
  {
include(ROOT_PATH . '/controllers/emailTemplates/blockedAccountMail.php');

  }
  //send email
  //include( ROOT_PATH . "/controllers/emailTemplates/adminEmailMail.php");
  //send email
  $sql = "UPDATE vs_user SET blocked = '$blocked', blocked_date = '$curr_date',blocked_time = '$curr_time' WHERE id = '$user_id' ";
  $sql_exec = mysqli_query($conn,$sql);
  //die($sql);
  if ($sql_exec)
  {

    echo "
<script> window.location.reload()</script>
        ";
        $_SESSION['change_error'] = 1;
    //include( ROOT_PATH . "/controllers/emailTemplates/adminEmailMail.php");
  }

}
elseif (isset($_POST['email_submit']))
{
  $user_id = trim($_POST['u_id']);
  $new_email = trim($_POST['new_email']);
  //send email
  //include( ROOT_PATH . "/controllers/emailTemplates/adminEmailMail.php");
  //send email
  $sql = "UPDATE vs_user SET email = '$new_email' WHERE id = '$user_id'";
  $sql_exec = mysqli_query($conn,$sql);
  //die($sql);
  if ($sql_exec)
  {
    include(ROOT_PATH . '/controllers/emailTemplates/changeEmailMailNew.php');
    echo "
        <script>
        $(document).ready(function()
        {
        $('.loading_screen').hide();
        $('#pop_up_change').show();
        $('#pop_up_change').css('box-shadow','0px 2px 5px green');
        $('#pop_up_text').html('<h4>Change was successful</h4>');
        $('#pop_up_change').delay(2000).fadeOut();
        );
        </script>
        ";
        $_SESSION['change_error'] = 1;
        header('location:'.BASE_URL.'/admin/change_user_details?u_id='.$user_id);
  }
}


 ?>
