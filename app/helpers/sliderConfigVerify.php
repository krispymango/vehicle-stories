<?php
include("../../path.php");
//include( ROOT_PATH . "app/database/db/db.php");
include( ROOT_PATH . "/app/database/db/adminDb.php");


if (isset($_POST['submit']))
{
  $line_1 = $_POST['line_one'];
  $line_2 = $_POST['line_two'];
  $font_size = $_POST['font_size'];
  $font_color = $_POST['font_color'];
  $image = $_FILES['image']['name'];
  $tmp_image = $_FILES['image']['tmp_name'];
  $folder = ROOT_PATH . "/assets/img/carousel/".$tmp_image;
  //die($image);

  $sql = "INSERT INTO vs_slider_config(line_one,line_two,font_size,font_color,image) VALUES('$line_1','$line_2','$font_size','$font_color','$image')";
  $sql_exec = mysqli_query($conn,$sql);

  if (move_uploaded_file($tmp_image,$folder) && $sql_exec)
  {
    $_SESSION['slider_msg'] = "Upload was successful";
    header('location:'.BASE_URL.'/admin/slider_config');
  }
  else {
    $_SESSION['slider_msg'] = "Could not upload image";
    header('location:'.BASE_URL.'/admin/slider_config');
  }
}


 ?>
