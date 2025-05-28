<!-- this is the file directory which has the administrator panel Navigation -->
<?php include(ROOT_PATH . '/admin/includes/adminPanelNavWrapper.php'); ?>
<!-- this is the file directory which has the administrator panel Navigation -->




<section class="admin_panel_wrapper">
    <h3>Advertisements</h3>

<div class="vert_wrapper">
    <h4>Homepage Ad</h4>
<!-- Homepage advertisement  -->

<div class="homepage_advertisement">
  <!-- Homepage left advertisement  -->
  <form class="left_hp adverisement" action="<?php echo BASE_URL . '/app/helpers/advertisementVerify' ?>" method="post" enctype="multipart/form-data">
<h5>Left Homepage Advertisement</h5>

<label>Link:</label>
<input type="text" name="link"  placeholder="https://www...">
<label>Ad:</label>
<input type="file" name="ad_image" required>
<label for="">Switch on/off:</label>
<div class="radio_buttons_grid">
<input type="radio" id="on_btn1" value="1" name="on" checked="checked">
<input type="radio" id="off_btn1" value="0" name="off">
<!-- On button -->
<label  for="on_btn1" class="option radio_on_button">
  <span><i class="far fa-sun"></i>On</span>
</label>

<!-- Off button -->
<label  for="off_btn1" class="option radio_off_button">
  <span><i class="fas fa-moon"></i>Off</span>
</label>

</div>

<input type="submit" name="left_hp_submit" value="Submit">
  </form>

  <!-- Homepage right advertisement  -->
  <form class="right_hp adverisement" action="<?php echo BASE_URL . '/app/helpers/advertisementVerify' ?>" method="post" enctype="multipart/form-data">
<h5>Right Homepage Advertisement</h5>

<label>Link:</label>
<input type="text" name="link" placeholder="https://www...">
<label>Ad:</label>
<input type="file" name="ad_image" required>
<label>Switch on/off:</label>
<div class="radio_buttons_grid">
<input type="radio" id="on_btn2" value="1" name="on" checked="checked">
<input type="radio" id="off_btn2" value="0" name="off">

<!-- On button -->
<label  for="on_btn2" class="option radio_on_button">
  <span><i class="far fa-sun"></i>On</span>
</label>

<!-- Off button -->
<label  for="off_btn2" class="option radio_off_button">
  <span><i class="fas fa-moon"></i>Off</span>
</label>

</div>

<input type="submit" name="right_hp_submit" value="Submit">
  </form>
</div>




<!--- Section for Edit homepage --->
<a id="edt_hp_btn"><i class="fas fa-info-circle"></i> View homepage ads  <i class="fas fa-lg fa-angle-down"></i></a>
<div class="edit_homepage_ad">
  <div class="hp_edit_heading">
  <label>Graphics</label>
  <label>link:</label>
  <label>Switch on/off</label>
  <label>Action</label>
  </div>

  <?php
$sql = "SELECT * FROM vw_advertisement_left WHERE type_of_ad = 1";
$sql_exe = mysqli_query($conn,$sql);
$a = 1;
$b = 1;
$c = 1;
$d = 1;
   while($sql_fetch = mysqli_fetch_assoc($sql_exe))
   {
   ?>
   <form class="hp_ad hp_edit_form" action="<?php echo BASE_URL . '/app/helpers/homepageEditVerify' ?>" method="post" enctype="multipart/form-data">
   <div>
     <input type="hidden" name="id" value="<?php echo $sql_fetch['id']; ?>">
   <div class="graphics_wrapper">
   <img src="<?php echo BASE_URL . '/assets/img/CarPhotos/'.$sql_fetch['homepage_left_ad']?>">
   <input type="file" name="left_edit_image<?php echo $a++; ?>" value="">
   </div>
   </div>


   <div class="edit_input_style">
   <input type="text" name="left_link<?php echo $b++; ?>" value='<?php echo $sql_fetch['advertising_left_link']; ?>' placeholder="https\\.." >
   </div>
   <div class="action_wrapper">
<select name="ad_state<?php echo $c++; ?>">
<?php if ($sql_fetch['ad_state'] == 0)
{
echo "<option value='0'>--Off--</option>";
}
else if($sql_fetch['ad_state'] == 1)
{
echo "<option value='1'>--On--</option>";
} ?>
<option value="1">On</option>
<option value="0">Off</option>
</select>
   </div>

   <div class="edit_input_style">
   <input type="submit" name="left_edit_apply<?php echo $d++;?>" value="Apply">
    <a href="DeleteAd?id=<?php echo $sql_fetch['id'] ?>&type_left=true">Delete</a>
   </div>
   </form>
 <?php } ?>


 <?php
$sql = "SELECT * FROM vw_advertisement_right WHERE type_of_ad = 1";
$sql_exe = mysqli_query($conn,$sql);
$a = 1;
$b = 1;
$c = 1;
$d = 1;
  while($sql_fetch = mysqli_fetch_assoc($sql_exe))
  {
  ?>
  <form class="hp_ad hp_edit_form" action="<?php echo BASE_URL . '/app/helpers/homepageEditVerify' ?>" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $sql_fetch['id']; ?>">

  <div>
  <div class="graphics_wrapper">
  <img src="<?php echo BASE_URL . '/assets/img/CarPhotos/'.$sql_fetch['homepage_right_ad']?>">
  <input type="file" name="right_edit_image<?php echo $a++; ?>" value="" >
  </div>
  </div>


  <div class="edit_input_style">
  <input type="text" name="right_link<?php echo $b++; ?>" value='<?php echo $sql_fetch['advertising_right_link'] ?>' placeholder="https\\..">
  </div>
  <div class="action_wrapper">
    <select class="" name="ad_state<?php echo $c++; ?>">
    <?php if ($sql_fetch['ad_state'] == 0)
    {
    echo "<option value='0'>--Off--</option>";
    }
    else if($sql_fetch['ad_state'] == 1)
    {
    echo "<option value='1'>--On--</option>";
    } ?>
    <option value="1">On</option>
    <option value="0">Off</option>
  </select>
  </div>

  <div class="edit_input_style">
  <input type="submit" name="right_edit_apply<?php echo $d++; ?>" value="Apply">
    <a href="DeleteAd?id=<?php echo $sql_fetch['id'] ?>&type_right=true">Delete</a>
  </div>
  </form>
<?php } ?>




</div>







<h4 style="margin-top:10vh;">Vehicle Details Ad</h4>
<!-- Homepage advertisement  -->

<div class="homepage_advertisement">
<!-- Homepage left advertisement  -->

<form class="left_vd adverisement" action="<?php echo BASE_URL . '/app/helpers/advertisementVerify' ?>" method="post" enctype="multipart/form-data">
<h5>Left Vehicle Details Advertisement</h5>

<label>Link:</label>
<input type="text" name="link" placeholder="https://www...">
<label>Ad:</label>
<input type="file" name="ad_image" required>
<label for="">Switch on/off:</label>
<div class="radio_buttons_grid">
<input type="radio" id="on_btn1" value="1" name="on" checked="checked">
<input type="radio" id="off_btn1" value="0" name="off">
<!-- On button -->
<label  for="on_btn1" class="option radio_on_button">
<span><i class="far fa-sun"></i>On</span>
</label>

<!-- Off button -->
<label  for="off_btn1" class="option radio_off_button">
<span><i class="fas fa-moon"></i>Off</span>
</label>

</div>

<input type="submit" name="left_vd_submit" value="Submit">
</form>

<!-- Homepage right advertisement  -->
<form class="right_vd adverisement" action="<?php echo BASE_URL . '/app/helpers/advertisementVerify' ?>" method="post" enctype="multipart/form-data">
<h5>Right Vehicle Details Advertisement</h5>

<label>Link:</label>
<input type="text" name="link" placeholder="https://www...">
<label>Ad:</label>
<input type="file" name="ad_image" required>
<label for="">Switch on/off:</label>
<div class="radio_buttons_grid">
<input type="radio" id="on_btn2" value="1" name="on" checked="checked">
<input type="radio" id="off_btn2" value="0" name="off">

<!-- On button -->
<label  for="on_btn2" class="option radio_on_button">
<span><i class="far fa-sun"></i>On</span>
</label>

<!-- Off button -->
<label  for="off_btn2" class="option radio_off_button">
<span><i class="fas fa-moon"></i>Off</span>
</label>

</div>

<input type="submit" name="right_vd_submit" value="Submit">
</form>
</div>




<!--- Section for Edit homepage --->
<a id="edt_vd_btn"><i class="fas fa-info-circle"></i> View Vehicle Details ads  <i class="fas fa-lg fa-angle-down"></i></a>
<div class="edit_vehicle_display_ad">
<div class="hp_edit_heading">
<label>Graphics</label>
<label>link:</label>
<label>Switch on/off</label>
<label>Action</label>
</div>
<?php
$sql = "SELECT * FROM vw_advertisement_left WHERE type_of_ad = 2";
$sql_exe = mysqli_query($conn,$sql);
$a = 1;
$b = 1;
$c = 1;
$d = 1;
 while($sql_fetch = mysqli_fetch_assoc($sql_exe))
 {
 ?>
<form class="vd_ad hp_edit_form" action="<?php echo BASE_URL . '/app/helpers/homepageEditVerify' ?>" method="post" enctype="multipart/form-data">
  <input type="hidden" name="id" value='<?php echo $sql_fetch['id'] ?>' placeholder="https\\..">

<div>
<div class="graphics_wrapper">
<img src="<?php echo BASE_URL . '/assets/img/CarPhotos/'.$sql_fetch['vehicle_details_left_ad']?>" alt="">
<input type="file" name="left_ad<?php echo $a++; ?>" >
</div>
</div>


<div class="edit_input_style">
<input type="text" name="left_link<?php echo $b++; ?>" value="<?php echo $sql_fetch['advertising_left_link'] ?>" placeholder="https\\..">
</div>
<div class="action_wrapper">
  <select class="" name="ad_state<?php echo $c++; ?>">
  <?php if ($sql_fetch['ad_state'] == 0)
  {
  echo "<option value='0'>--Off--</option>";
  }
  else if($sql_fetch['ad_state'] == 1)
  {
  echo "<option value='1'>--On--</option>";
  } ?>
  <option value="1">On</option>
  <option value="0">Off</option>
</select>

</div>

<div class="edit_input_style">
<input type="submit" name="left_vd_apply<?php echo $d++; ?>" value="Apply">
<a href="DeleteAd?id=<?php echo $sql_fetch['id'] ?>&type_left=true">Delete</a>
</div>
</form>
 <?php } ?>


 <?php
 $sql = "SELECT * FROM vw_advertisement_right WHERE type_of_ad = 2";
 $sql_exe = mysqli_query($conn,$sql);
 $a = 1;
 $b = 1;
 $c = 1;
 $d = 1;
  while($sql_fetch = mysqli_fetch_assoc($sql_exe))
  {
  ?>
 <form class="vd_ad hp_edit_form" action="<?php echo BASE_URL . '/app/helpers/homepageEditVerify' ?>" method="post" enctype="multipart/form-data">
   <input type="hidden" name="id" value='<?php echo $sql_fetch['id'] ?>' placeholder="https\\..">

 <div>
 <div class="graphics_wrapper">
 <img src="<?php echo BASE_URL . '/assets/img/CarPhotos/'.$sql_fetch['vehicle_details_right_ad']?>" alt="">
 <input type="file" name="right_ad<?php echo $a++; ?>" value="">
 </div>
 </div>


 <div class="edit_input_style">
 <input type="text" name="right_link<?php echo $b++; ?>" value="<?php echo $sql_fetch['advertising_right_link'] ?>" placeholder="https\\..">
 </div>
 <div class="action_wrapper">
   <select class="" name="ad_state<?php echo $c++; ?>">
   <?php if ($sql_fetch['ad_state'] == 0)
   {
   echo "<option value='0'>--Off--</option>";
   }
   else if($sql_fetch['ad_state'] == 1)
   {
   echo "<option value='1'>--On--</option>";
   } ?>
   <option value="1">On</option>
   <option value="0">Off</option>
   </select>
 </div>

 <div class="edit_input_style">
 <input type="submit" name="right_vd_apply<?php echo $d++; ?>" value="Apply">
 <a href="DeleteAd?id=<?php echo $sql_fetch['id'] ?>&type_right=true">Delete</a>
 </div>
 </form>
  <?php } ?>
</div>














<h4 style="margin-top:10vh;">Gallery Ad</h4>
<!-- Homepage advertisement  -->

<div class="homepage_advertisement">
<!-- Homepage left advertisement  -->
<form class="left_g adverisement" action="<?php echo BASE_URL . '/app/helpers/advertisementVerify' ?>" method="post" enctype="multipart/form-data">
<h5>Left Gallery Advertisement</h5>

<label>Link:</label>
<input type="text" name="link" placeholder="https://www...">
<label>Ad:</label>
<input type="file" name="ad_image" required>
<label for="">Switch on/off:</label>
<div class="radio_buttons_grid">
<input type="radio" id="on_btn1" value="1" name="on" checked="checked">
<input type="radio" id="off_btn1" value="0" name="off">
<!-- On button -->
<label  for="on_btn1" class="option radio_on_button">
<span><i class="far fa-sun"></i>On</span>
</label>

<!-- Off button -->
<label  for="off_btn1" class="option radio_off_button">
<span><i class="fas fa-moon"></i>Off</span>
</label>

</div>

<input type="submit" name="left_g_submit" value="Submit">
</form>

<!-- Homepage right advertisement  -->
<form class="right_g adverisement" action="<?php echo BASE_URL . '/app/helpers/advertisementVerify' ?>" method="post" enctype="multipart/form-data">
<h5>Right Gallery Advertisement</h5>

<label>Link:</label>
<input type="text" name="link" placeholder="https://www...">
<label>Ad:</label>
<input type="file" name="ad_image" value="" required>
<label for="">Switch on/off:</label>
<div class="radio_buttons_grid">
<input type="radio" id="on_btn2" value="1" name="on" checked="checked">
<input type="radio" id="off_btn2" value="0" name="off">

<!-- On button -->
<label  for="on_btn2" class="option radio_on_button">
<span><i class="far fa-sun"></i>On</span>
</label>

<!-- Off button -->
<label  for="off_btn2" class="option radio_off_button">
<span><i class="fas fa-moon"></i>Off</span>
</label>

</div>

<input type="submit" name="right_g_submit" value="Submit">
</form>
</div>




<!--- Section for Edit homepage --->
<a id="edt_g_btn"><i class="fas fa-info-circle"></i> View Gallery ads  <i class="fas fa-lg fa-angle-down"></i></a>
<div class="edit_gallery_ad">
<div class="hp_edit_heading">
<label>Graphics</label>
<label>link:</label>
<label>Switch on/off</label>
<label>Action</label>
</div>
<?php
$sql = "SELECT * FROM vw_advertisement_left WHERE type_of_ad = 3";
$sql_exe = mysqli_query($conn,$sql);
$a=1;
$b=1;
$c=1;
$d=1;
 while($sql_fetch = mysqli_fetch_assoc($sql_exe))
 {
 ?>
<form class="hp_edit_form" action="<?php echo BASE_URL . '/app/helpers/homepageEditVerify' ?>" method="post" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?php echo $sql_fetch['id']; ?>">
<div>
<div class="graphics_wrapper">
<img src="<?php echo BASE_URL . '/assets/img/CarPhotos/'.$sql_fetch['gallery_left_ad']?>" alt="">
<input type="file" name="left_ad<?php echo $a++; ?>" value="">
</div>
</div>


<div class="edit_input_style">
<input type="text" name="left_link<?php echo $b++; ?>" value="<?php echo $sql_fetch['advertising_left_link'] ?>" placeholder="https\\..">
</div>
<div class="action_wrapper">
  <select class="" name="ad_state<?php echo $c++; ?>">
  <?php if ($sql_fetch['ad_state'] == 0)
  {
  echo "<option value='0'>--Off--</option>";
  }
  else if($sql_fetch['ad_state'] == 1)
  {
  echo "<option value='1'>--On--</option>";
  } ?>
  <option value="1">On</option>
  <option value="0">Off</option>
  </select>
</div>

<div class="edit_input_style">
    <a href="DeleteAd?id=<?php echo $sql_fetch['id'] ?>&type_left=true">Delete</a>
<input type="submit" name="left_g_apply<?php echo $d++; ?>" value="Apply">
</div>
</form>
 <?php } ?>


 <?php
 $sql = "SELECT * FROM vw_advertisement_right WHERE type_of_ad = 3";
 $sql_exe = mysqli_query($conn,$sql);
 $a=1;
 $b=1;
 $c=1;
 $d=1;
  while($sql_fetch = mysqli_fetch_assoc($sql_exe))
  {
  ?>
 <form class="hp_edit_form" action="<?php echo BASE_URL . '/app/helpers/homepageEditVerify' ?>" method="post" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?php echo $sql_fetch['id']; ?>">
 <div>
 <div class="graphics_wrapper">
 <img src="<?php echo BASE_URL . '/assets/img/CarPhotos/'.$sql_fetch['gallery_right_ad']?>" alt="">
 <input type="file" name="right_ad<?php echo $a++; ?>" value="">
 </div>
 </div>


 <div class="edit_input_style">
 <input type="text" name="right_link<?php echo $b++; ?>" value="<?php echo $sql_fetch['advertising_right_link'] ?>" placeholder="https\\..">
 </div>
 <div class="action_wrapper">
   <select class="" name="ad_state<?php echo $c++; ?>">
   <?php if ($sql_fetch['ad_state'] == 0)
   {
   echo "<option value='0'>--Off--</option>";
   }
   else if($sql_fetch['ad_state'] == 1)
   {
   echo "<option value='1'>--On--</option>";
   } ?>
   <option value="1">On</option>
   <option value="0">Off</option>
   </select>
 </div>

 <div class="edit_input_style">
    <a href="DeleteAd?id=<?php echo $sql_fetch['id'] ?>&type_right=true">Delete</a>
 <input type="submit" name="right_g_apply<?php echo $d++; ?>" value="Apply">
 </div>
 </form>
  <?php } ?>
</div>














</div>

</section>
