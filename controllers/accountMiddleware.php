<?php
include(ROOT_PATH . '/app/database/connection/conn.php');

if (isset($_SESSION['email']) && $_SESSION['username'])
{
  $sql_as = "SELECT * FROM vs_user WHERE email = '$_SESSION[email]' AND username = '$_SESSION[username]' AND registration_key_active_status = 1 OR password_key_active_status = 1";
  $sql_as_exec = mysqli_query($conn,$sql_as);
  $sql_as_fetch = mysqli_fetch_assoc($sql_as_exec);
  $sql_as_num_rows = mysqli_num_rows($sql_as_exec);
}

if (isset($_SESSION['id']) && isset($_SESSION['status']) || isset($sql_as_fetch['registration_key_active_status']))
{
  if ($sql_as_fetch['registration_key_active_status'] == 0)
  {
    header('location:'.BASE_URL);
  }
}



 ?>
