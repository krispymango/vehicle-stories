<?php

include("../../path.php");
include( ROOT_PATH . "/app/database/db/db.php");

if (isset($_GET['vehicle_name']) && isset($_GET['vehicle_id']) && isset($_GET['c_id']) && isset($_GET['m_id']) && isset($_SESSION['id']) && (base64_decode(hex2bin($_GET['m_id'])) == $_SESSION['id']))
{
  $comment_id = stripcslashes($_GET['c_id']);
  $vehicle_id = stripcslashes($_GET['vehicle_id']);
  $comment_id_dec = base64_decode(hex2bin($_GET['c_id']));
  $vehicle_name = stripcslashes($_GET['vehicle_name']);
  $sql_c = "DELETE FROM vs_comment WHERE id = '$comment_id_dec' AND user_id = '$_SESSION[id]'";
  $sql_c_exec = mysqli_query($conn,$sql_c);
  if ($sql_c_exec)
  {
    header('location:'.BASE_URL.'/vehicle_details/'.$vehicle_id.'/'.$vehicle_name);
  }
}
else
{
  $vehicle_id = stripcslashes($_GET['vehicle_id']);
$vehicle_name = stripcslashes($_GET['vehicle_name']);
  header('location:'.BASE_URL.'/vehicle_details/'.$vehicle_id.'/'.$vehicle_name);
}


 ?>
