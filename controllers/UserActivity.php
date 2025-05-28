<?php

$date = date('Y-m-d') . date('H:i:s');
if (isset($_SESSION['id']))
{
  $sql_activity = "INSERT INTO vs_user(id,user_activity) VALUES('$_SESSION[id]','$date') ON DUPLICATE KEY UPDATE user_activity='$date'";
  $sql_activity_exe = mysqli_query($conn,$sql_activity);
  if ($sql_activity_exe)
  {
    //echo "string";
  }
}


 ?>
