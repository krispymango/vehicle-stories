<?php
include("../../path.php");
include( ROOT_PATH . "/app/database/db/db.php");


if (isset($_POST['submit']))
{


  $submit = $_POST['submit'];
  $comment = stripcslashes($_POST['comment']);
  $vehicle_id = stripcslashes($_POST['vehicle_id']);
  $vehicle_name = stripcslashes($_POST['vehicle_name']);
  $user_id = stripcslashes($_POST['user_id']);

  $vehicle_id = mysqli_real_escape_string($conn,$vehicle_id);
  $comment = mysqli_real_escape_string($conn,$comment);
  $vehicle_name = mysqli_real_escape_string($conn,$vehicle_name);
  $user_id = mysqli_real_escape_string($conn,$user_id);
  $vehicle_id_dec = base64_decode(hex2bin($vehicle_id));


  $date_posted = date('d.m.y');
  $time_posted = date('H:i');

  $sql_c = "INSERT INTO vs_comment(user_id,vehicle_id,comment,date_posted,time_posted)
  VALUES('$user_id','$vehicle_id_dec','$comment','$date_posted','$time_posted')";
  $sql_c_exec = mysqli_query($conn,$sql_c);

  if ($sql_c_exec)
  {
    header('location:'.BASE_URL.'/vehicle_details/'.$vehicle_id.'/'.$vehicle_name);
  }
  else
  {
    header('location:'.BASE_URL.'/vehicle_details/'.$vehicle_id.'/'.$vehicle_name);
  }


}


 ?>
