<?php
include("../path.php");
include("../app/database/db/db.php");

if (isset($_GET['id']) && isset($_SESSION['id']) && isset($_SESSION['status']) && ($_SESSION['status'] == 1))
{
  $sql = "DELETE FROM vs_user WHERE id = '$_GET[id]'";
  $sql_exec = mysqli_query($conn,$sql);

  if ($sql_exec)
  {

    header('location:'.BASE_URL.'/admin/user_accounts?id='.$_GET['id']);
  }
  else
  {
    header('location:'.BASE_URL.'/admin/user_accounts?id='.$_GET['id']);
  }
}
elseif (isset($_GET['v_id']) && isset($_GET['id']) && isset($_SESSION['status']) && ($_SESSION['status'] == 1))
{
  $sql = "DELETE FROM vs_vehicle_details WHERE id = '$_GET[v_id]' AND user_id = '$_GET[id]'";
  $sql_exec = mysqli_query($conn,$sql);
  if ($sql_exec)
  {
    header('location:'.BASE_URL.'/admin/user_accounts_details?id='.$_GET['id']);
  }
  else
  {
    header('location:'.BASE_URL.'/admin/user_accounts_details?id='.$_GET['id']);
  }
}
else
{
  header('location:'.BASE_URL.'/admin/user_accounts?id='.$_GET['id']);
}
 ?>
