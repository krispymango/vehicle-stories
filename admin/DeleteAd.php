<?php
include '../path.php';
include(ROOT_PATH . '/app/database/connection/conn.php');


if (isset($_GET['type_right']) && isset($_GET['id']) && isset($_SESSION['status']) && ($_SESSION['status'] == 1))
{
  $sql = "DELETE FROM vs_advertisement_right WHERE id = '$_GET[id]'";
  $sql_query = mysqli_query($conn,$sql);
  if ($sql_query)
  {
    header('location:'.BASE_URL . '/admin/advertisements');
  }
  else
  {
    header('location:'.BASE_URL . '/admin/advertisements');
  }
}
elseif (isset($_GET['type_left']) && isset($_GET['id']) && isset($_SESSION['status']) && ($_SESSION['status'] == 1))
{
  $sql = "DELETE FROM vs_advertisement_left WHERE id = '$_GET[id]'";
  $sql_query = mysqli_query($conn,$sql);
  if ($sql_query)
  {
    header('location:'.BASE_URL . '/admin/advertisements');
  }
  else
  {
    header('location:'.BASE_URL . '/admin/advertisements');
  }
}
elseif (isset($_GET['news_del']) && isset($_GET['id']) && isset($_SESSION['status']) && ($_SESSION['status'] == 1))
{
  $sql = "DELETE FROM vs_news WHERE id = '$_GET[id]'";
  $sql_query = mysqli_query($conn,$sql);
  if ($sql_query)
  {
    header('location:'.BASE_URL . '/admin/list_elements');
  }
  else
  {
    header('location:'.BASE_URL . '/admin/list_elements');
  }
}
else {
header('location:'.BASE_URL . '/admin/user_accounts');
}
 ?>
