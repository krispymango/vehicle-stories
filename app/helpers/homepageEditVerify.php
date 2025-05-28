<?php
include '../../path.php';
include(ROOT_PATH . '/app/database/connection/conn.php');


for ($i=1; $i < 5; $i++)
{
  //die($_POST['left_edit_apply'.$i]);
  if (isset($_POST['left_edit_apply'.$i]))
  {

    $id = $_POST['id'];
    $ad_image = $_FILES['left_edit_image'.$i]['name'];
    $temp_ad_image = $_FILES['left_edit_image'.$i]['tmp_name'];
    $folder = ROOT_PATH . "/assets/img/advertisement/".$ad_image;
    $left_link = $_POST['left_link'.$i];
    $ad_state = $_POST['ad_state'.$i];
    $sql = "UPDATE vs_advertisement_left SET homepage_left_ad = IF(LENGTH('$ad_image')=0, homepage_left_ad, '$ad_image'),advertising_left_link = '$left_link', ad_state = '$ad_state' WHERE id = '$id' ";
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
  elseif (isset($_POST['right_edit_apply'.$i]))
  {
    $id = $_POST['id'];
    $ad_image = $_FILES['right_edit_image'.$i]['name'];
    $temp_ad_image = $_FILES['right_edit_image'.$i]['tmp_name'];
    $folder = ROOT_PATH . "/assets/img/advertisement/".$ad_image;
    $right_link = $_POST['right_link'.$i];
    $ad_state = $_POST['ad_state'.$i];
    $sql = "UPDATE vs_advertisement_right SET homepage_right_ad = IF(LENGTH('$ad_image')=0, homepage_right_ad, '$ad_image'),advertising_right_link = '$right_link', ad_state = '$ad_state' WHERE id = '$id' ";
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

  elseif (isset($_POST['left_vd_apply'.$i]))
  {
    $id = $_POST['id'];
    $ad_image = $_FILES['left_ad'.$i]['name'];
    $temp_ad_image = $_FILES['left_ad'.$i]['tmp_name'];
    $folder = ROOT_PATH . "/assets/img/advertisement/".$ad_image;
    $left_link = $_POST['left_link'.$i];
    $ad_state = $_POST['ad_state'.$i];
    $sql = "UPDATE vs_advertisement_left SET vehicle_details_left_ad = IF(LENGTH('$ad_image')=0, vehicle_details_left_ad, '$ad_image'),advertising_left_link = '$left_link', ad_state = '$ad_state' WHERE id = '$id' ";
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
  elseif (isset($_POST['right_vd_apply'.$i]))
  {
    $id = $_POST['id'];
    $ad_image = $_FILES['right_ad'.$i]['name'];
    $temp_ad_image = $_FILES['right_ad'.$i]['tmp_name'];
    $folder = ROOT_PATH . "/assets/img/advertisement/".$ad_image;
    $right_link = $_POST['right_link'.$i];
    $ad_state = $_POST['ad_state'.$i];
    $sql = "UPDATE vs_advertisement_right SET vehicle_details_right_ad = IF(LENGTH('$ad_image')=0, vehicle_details_right_ad, '$ad_image'),advertising_right_link = '$right_link', ad_state = '$ad_state' WHERE id = '$id' ";
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
  elseif (isset($_POST['left_g_apply'.$i]))
  {
    $id = $_POST['id'];
    $ad_image = $_FILES['left_ad'.$i]['name'];
    $temp_ad_image = $_FILES['left_ad'.$i]['tmp_name'];
    $folder = ROOT_PATH . "/assets/img/advertisement/".$ad_image;
    $left_link = $_POST['left_link'.$i];
    $ad_state = $_POST['ad_state'.$i];
    $sql = "UPDATE vs_advertisement_left SET gallery_left_ad = IF(LENGTH('$ad_image')=0, gallery_left_ad, '$ad_image'),advertising_left_link = '$left_link', ad_state = '$ad_state' WHERE id = '$id' ";
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
  elseif (isset($_POST['right_g_apply'.$i]))
  {
    $id = $_POST['id'];
    $ad_image = $_FILES['right_ad'.$i]['name'];
    $temp_ad_image = $_FILES['right_ad'.$i]['tmp_name'];
    $folder = ROOT_PATH . "/assets/img/advertisement/".$ad_image;
    $right_link = $_POST['right_link'.$i];
    $ad_state = $_POST['ad_state'.$i];
    $sql = "UPDATE vs_advertisement_right SET gallery_right_ad = IF(LENGTH('$ad_image')=0, gallery_right_ad, '$ad_image'),advertising_right_link = '$right_link', ad_state = '$ad_state' WHERE id = '$id' ";
    $sql_exec = mysqli_query($conn,$sql);
//die($sql);
    if ($sql_exec && move_uploaded_file($temp_ad_image,$folder))
    {


      header('location:'.BASE_URL . '/admin/advertisements');
    }
    else
    {

      header('location:'.BASE_URL . '/admin/advertisements');
    }
  }
}

for ($c=1; $c < 30; $c++)
{//die($_POST['editNewsApply'.'2']);
  if (isset($_POST['editNewsApply'.$c]))
  {
    $id = $_POST['id'.$c];
    $text = mysqli_real_escape_string($conn,str_replace("'", "''", trim($_POST['text'.$c])));
    $heading = $_POST['heading'.$c];
    $sql = "UPDATE vs_news SET heading = '$heading', news = '$text' WHERE id = '$id'";
    $sql_exec = mysqli_query($conn,$sql);

    //die($sql);
    if ($sql_exec)
    {
      header('location:'.BASE_URL . '/admin/list_elements');
    }
    else
    {
      header('location:'.BASE_URL . '/admin/list_elements');
    }
  }
}







 ?>
