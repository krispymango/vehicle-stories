<!-- this is the file directory which has the administrator panel Navigation -->
<?php include(ROOT_PATH . '/admin/includes/adminPanelNavWrapper.php'); ?>
<!-- this is the file directory which has the administrator panel Navigation -->




<section class="admin_panel_wrapper">
    <h3>Slider Config</h3>

<div class="slider_config_wrapper">
  <h4>Image properties</h4>
  <div id="slid_time">

  </div>
<form class="slider_config" action="index.html" method="post">
<label>display time:</label>
<select id="sld_tmm" name="slider_time">
  <?php
  $data = file_get_contents(ROOT_PATH .'/app/helpers/api/properties.json');
  $json_arr = json_decode($data, true);
  echo "<option value='".$json_arr[1]['Value']."'>--".str_replace('000','',$json_arr[1]['Value'])."s--</option>";
  ?>
<?php
for ($i=1; $i < 20; $i++)
{
echo "<option value='".$i."000'>".$i."s</option>";
}
 ?>
</select>
</form>

<h4>Upload images</h4>
<form class="slider_image" action="<?php echo BASE_URL . '/app/helpers/sliderConfigVerify'; ?>" method="post" enctype="multipart/form-data">

  <div id="image_upload_box">
    <label>Font size:</label>
    <select name="font_size">
    <?php
    for ($i=5; $i < 31; $i++)
    {
    echo "<option value='".$i."'>".$i."px</option>";
    }
     ?>
    </select>
    <label>font color:</label>
    <input type="color" name="font_color">
  <label for="">Image:</label>
  <input type="file" name="image">
  <label>Line 1:</label>
  <input type="text" name="line_one">
  <label>Line 2:</label>
  <input type="text" name="line_two">
  </div>

<input type="submit" name="submit" value="Apply">
</form>
</div>

</section>
