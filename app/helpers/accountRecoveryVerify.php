<?php
include '../../path.php';
include(ROOT_PATH . '/app/database/connection/conn.php');
include(ROOT_PATH . "/app/database/db/userDb.php");

if (isset($_POST['submit']))
{
  $email = stripcslashes($_POST['email']);
  $email = mysqli_real_escape_string($conn,$email);
  $sql = "SELECT * FROM vw_user WHERE email = '$email'";
  $sql_exec = mysqli_query($conn,$sql);
  if ($sql_exec && $sql_fetch = mysqli_fetch_assoc($sql_exec))
  {
    include(ROOT_PATH . '/controllers/emailTemplates/passwordRecoveryMail.php');
    echo "<script>
    $('.loading_screen').hide();
    $('#acc_error_msg').css('color','green');
    </script>";
    echo "Kindly follow the instructions in your email to recover your account";
  }
  else
  {
    echo "<script>
    $('.loading_screen').hide();
    $('#acc_error_msg').css('color','red');
    </script>";
    echo "E-mail is not registered";
  }
}

 ?>
