<?php
include("../../path.php");
include( ROOT_PATH . "/app/database/db/db.php");

//die($_POST['changed_text'] . ' ' .$_POST['comm_id']);
if (isset($_POST['vehicle_name']) && isset($_POST['vehicle_id']) && isset($_POST['comm_id']) && isset($_POST['m_id']) && isset($_SESSION['id']) && ($_POST['m_id'] == $_SESSION['id']))
{
  $comment_id = $_POST['comm_id'];
  $comment_text = $_POST['changed_text'];
  $vehicle_id = $_POST['vehicle_id'];
  $vehicle_name = $_POST['vehicle_name'];
  $date_posted = date('d.m.y');
  $time_posted = date('H:i');
  $sql_c = "UPDATE vs_comment SET id = '$comment_id' , comment = '$comment_text', date_posted = '$date_posted', time_posted = '$time_posted' WHERE id = '$comment_id'";
  $sql_c_exec = mysqli_query($conn,$sql_c);
  if ($sql_c_exec)
  {
    header('location:'.BASE_URL.'/vehicle_details/'.$vehicle_id.'/'.$vehicle_name);
  }
}
else
{
  $vehicle_id = $_POST['vehicle_id'];
  $vehicle_name = $_POST['vehicle_name'];
  header('location:'.BASE_URL.'/vehicle_details/'.$vehicle_id.'/'.$vehicle_name);
}

 ?>
