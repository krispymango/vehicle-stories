<?php
include '../../path.php';
include(ROOT_PATH . '/app/database/connection/conn.php');


if (isset($_POST['left_hp_submit']))
{
  $link = $_POST['link'];
  $ad_image = $_FILES['ad_image']['name'];
  $temp_ad_image = $_FILES['ad_image']['tmp_name'];
  $folder = ROOT_PATH . "/assets/img/advertisement/".$ad_image;

  if (isset($_POST['on']))
  {
  $switch = $_POST['on'];
  }
  elseif (isset($_POST['off']))
  {
  $switch = $_POST['off'];
  }

  $sql = "INSERT INTO vs_advertisement_left(homepage_left_ad,advertising_left_link,ad_state,type_of_ad) VALUES('$ad_image','$link','$switch',1)";
  $sql_exec = mysqli_query($conn,$sql);
  if ($sql_exec && move_uploaded_file($temp_ad_image,$folder))
  {
header('location:'.BASE_URL . '/admin/advertisements');
  }
  else
  {
header('location:'.BASE_URL . '/admin/advertisements');
  }
}

elseif (isset($_POST['right_hp_submit']))
{
  $link = $_POST['link'];
  $ad_image = $_FILES['ad_image']['name'];
  $temp_ad_image = $_FILES['ad_image']['tmp_name'];
  $folder = ROOT_PATH . "/assets/img/advertisement/".$ad_image;

  if (isset($_POST['on']))
  {
  $switch = $_POST['on'];
  }
  elseif (isset($_POST['off']))
  {
  $switch = $_POST['off'];
  }

  $sql = "INSERT INTO vs_advertisement_right(homepage_right_ad,advertising_right_link,ad_state,type_of_ad) VALUES('$ad_image','$link','$switch',1)";
  $sql_exec = mysqli_query($conn,$sql);
  if ($sql_exec && move_uploaded_file($temp_ad_image,$folder))
  {
header('location:'.BASE_URL . '/admin/advertisements');
  }
  else
  {
header('location:'.BASE_URL . '/admin/advertisements');
  }
}

elseif (isset($_POST['left_vd_submit']))
{
  $link = $_POST['link'];
  $ad_image = $_FILES['ad_image']['name'];
  $temp_ad_image = $_FILES['ad_image']['tmp_name'];
  $folder = ROOT_PATH . "/assets/img/advertisement/".$ad_image;

  if (isset($_POST['on']))
  {
  $switch = $_POST['on'];
  }
  elseif (isset($_POST['off']))
  {
  $switch = $_POST['off'];
  }

  $sql = "INSERT INTO vs_advertisement_left(vehicle_details_left_ad,advertising_left_link,ad_state,type_of_ad) VALUES('$ad_image','$link','$switch',2)";
  $sql_exec = mysqli_query($conn,$sql);
  if ($sql_exec && move_uploaded_file($temp_ad_image,$folder))
  {
header('location:'.BASE_URL . '/admin/advertisements');
  }
  else
  {
header('location:'.BASE_URL . '/admin/advertisements');
  }
}

elseif (isset($_POST['right_vd_submit']))
{
  $link = $_POST['link'];
  $ad_image = $_FILES['ad_image']['name'];
  $temp_ad_image = $_FILES['ad_image']['tmp_name'];
  $folder = ROOT_PATH . "/assets/img/advertisement/".$ad_image;

  if (isset($_POST['on']))
  {
  $switch = $_POST['on'];
  }
  elseif (isset($_POST['off']))
  {
  $switch = $_POST['off'];
  }

  $sql = "INSERT INTO vs_advertisement_right(vehicle_details_right_ad,advertising_right_link,ad_state,type_of_ad) VALUES('$ad_image','$link','$switch',2)";
  $sql_exec = mysqli_query($conn,$sql);
  if ($sql_exec && move_uploaded_file($temp_ad_image,$folder))
  {
header('location:'.BASE_URL . '/admin/advertisements');
  }
  else
  {
header('location:'.BASE_URL . '/admin/advertisements');
  }
}


elseif (isset($_POST['left_g_submit']))
{
  $link = $_POST['link'];
  $ad_image = $_FILES['ad_image']['name'];
  $temp_ad_image = $_FILES['ad_image']['tmp_name'];
  $folder = ROOT_PATH . "/assets/img/advertisement/".$ad_image;

  if (isset($_POST['on']))
  {
  $switch = $_POST['on'];
  }
  elseif (isset($_POST['off']))
  {
  $switch = $_POST['off'];
  }

  $sql = "INSERT INTO vs_advertisement_left(gallery_left_ad,advertising_left_link,ad_state,type_of_ad) VALUES('$ad_image','$link','$switch',3)";
  $sql_exec = mysqli_query($conn,$sql);
  if ($sql_exec && move_uploaded_file($temp_ad_image,$folder))
  {
header('location:'.BASE_URL . '/admin/advertisements');
  }
  else
  {
header('location:'.BASE_URL . '/admin/advertisements');
  }
}


elseif (isset($_POST['right_g_submit']))
{
  $link = $_POST['link'];
  $ad_image = $_FILES['ad_image']['name'];
  $temp_ad_image = $_FILES['ad_image']['tmp_name'];
  $folder = ROOT_PATH . "/assets/img/advertisement/".$ad_image;

  if (isset($_POST['on']))
  {
  $switch = $_POST['on'];
  }
  elseif (isset($_POST['off']))
  {
  $switch = $_POST['off'];
  }

  $sql = "INSERT INTO vs_advertisement_right(gallery_right_ad,advertising_right_link,ad_state,type_of_ad) VALUES('$ad_image','$link','$switch',3)";
  $sql_exec = mysqli_query($conn,$sql);
  if ($sql_exec && move_uploaded_file($temp_ad_image,$folder))
  {
header('location:'.BASE_URL . '/admin/advertisements');
  }
  else
  {
header('location:'.BASE_URL . '/admin/advertisements');
  }
}
 ?>
