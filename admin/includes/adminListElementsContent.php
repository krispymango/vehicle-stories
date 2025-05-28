<!-- this is the file directory which has the administrator panel Navigation -->
<?php include ROOT_PATH . '/admin/includes/adminPanelNavWrapper.php'; ?>
<!-- this is the file directory which has the administrator panel Navigation -->

<div id="pop_up" class="pop_up_box">

</div>

<section class="admin_panel_wrapper">
  <h3>Dropdown List Elements</h3>

<div class="dropdown_list_element_wrapper">
  <form class="about_wrapper" action="process.html" method="post" enctype="multipart/form-data">
  <h4>About</h4>
  <textarea name="text" rows="8" cols="80" id="editorlist1">
    <?php
  $sql = "SELECT * FROM vw_about";
  $sql_exec = mysqli_query($conn,$sql);
  $sql_fetch = mysqli_fetch_assoc($sql_exec);
  echo $sql_fetch['about'];
     ?>
   </textarea>
  <input type="submit" name="about_submit" id="about_sbmt" value="Apply">
  </form>

  <form class="rules_wrapper" action="index.html" method="post" enctype="multipart/form-data">
    <h4>Rules</h4>
  <textarea name="text" rows="8" cols="80" id="editorlist2">
    <?php
  $sql = "SELECT * FROM vw_rules";
  $sql_exec = mysqli_query($conn,$sql);
  $sql_fetch = mysqli_fetch_assoc($sql_exec);
  echo $sql_fetch['rules'];
     ?>
   </textarea>

  <input type="submit" name="rules_submit" id="rules_sbmt" value="Apply">
  </form>


  <form class="rodo_wrapper" action="index.html" method="post" enctype="multipart/form-data">
    <h4>Rodo</h4>
  <textarea name="text" rows="8" cols="80" id="editorlist3">
    <?php
  $sql = "SELECT * FROM vw_rodo";
  $sql_exec = mysqli_query($conn,$sql);
  $sql_fetch = mysqli_fetch_assoc($sql_exec);
  echo $sql_fetch['rodo'];
     ?>
   </textarea>
  <input type="submit" name="rodo_submit" id="rodo_sbmt" value="Apply">
  </form>



  <form class="cookie_wrapper" action="index.html" method="post" enctype="multipart/form-data">
    <h4>Cookie Consent</h4>
  <textarea name="text" rows="8" cols="80" id="editorlist4">
    <?php
  $sql = "SELECT * FROM vs_cookie_consent";
  $sql_exec = mysqli_query($conn,$sql);
  $sql_fetch = mysqli_fetch_assoc($sql_exec);
  echo $sql_fetch['cookie'];
     ?>
   </textarea>
  <input type="submit" name="cookie_submit" id="cookie_sbmt" value="Apply">
  </form>

  <form class="news_wrapper" action="index.html" method="post" enctype="multipart/form-data">
    <h4>News</h4>

<div style="align-items: center;height: 3vh;margin-bottom:6vh;display:grid;grid-template-columns: repeat(2,1fr);width:30%;">
  <h5>Turn news on/off as popup: </h5>
<select style="width: 50%;height:4vh;" id="n_on_off" class="news_on_of" name="">
  <?php
  $data = file_get_contents(ROOT_PATH .'/app/helpers/api/properties.json');
  $json_arr = json_decode($data, true);
  $switchh =  $json_arr[5]['Value'];
  if ($switchh == 1)
  {
    echo "<option value='".$switchh."'>--On--</option>";
  }
  elseif ($switchh == 0)
  {
    echo "<option value='".$switchh ."'>--Off--</option>";
  }

  ?>
<option value="1">On</option>
<option value="0">Off</option>
</select>
</div>
<label>Date:</label>
<br>
<input type="date" name="heading" id="heading_text" value="" placeholder="Date..">
<br>
<label>News:</label>
<br>
<textarea style="resize:none;" name="text" id="news_text" rows="8" cols="80" ></textarea>
<input type="submit" name="news_submit" id="news_sbmt" value="Apply">
  </form>

  <a href="#" id="view_news_btn">View News</a>
  <div class="edit_form_news_wrapper">
    <div class="news_edit_heading_style">
      <div>
  <label>News</label>
      </div>
      <div>
  <label>Action</label>
      </div>
    </div>
    <?php
    $sql = "SELECT * FROM vs_news";
      $sql_exec = mysqli_query($conn,$sql);
$a = 1;
$b= 1;
$c = 1;
$d = 1;
      //die($sql);
      if ($sql_exec)
      {
        while ($sql_fetch = mysqli_fetch_assoc($sql_exec))
        {?>
        <form class="news_edit1 edit_form_style" action="<?php echo BASE_URL . '/app/helpers/homepageEditVerify' ?>" method="post" enctype="multipart/form-data">
          <div style="margin:0px auto;display:block;width:90%;">
            <input type="hidden" name="id<?php echo $d++; ?>" value="<?php echo $sql_fetch['id']; ?>">
            <label>Date:</label>
            <br>
            <input type="text" name="heading<?php echo $a++; ?>" value="<?php echo $sql_fetch['heading']; ?>" placeholder="Date..">
            <br>
            <label>News:</label>
            <br>
            <textarea style="resize:none;" name="text<?php echo $b++; ?>" rows="8" cols="80" ><?php echo $sql_fetch['news']; ?></textarea>
        </div>

          <div id="edit_action_wrapper">
    <a href="DeleteAd?id=<?php echo $sql_fetch['id'] ?>&news_del=true">Delete</a>
    <input type="submit" name="editNewsApply<?php echo $c++; ?>" value="Apply">
          </div>


        </form>
    <?php }} ?>

  </div>


</div>

</section>



<script>
  CKEDITOR.replace('editorlist1');
  CKEDITOR.replace('editorlist2');
  CKEDITOR.replace('editorlist3');
  CKEDITOR.replace('editorlist4');


  $('#n_on_off').change(function()
  {
  var news_on_of = $('#n_on_off').val();
  $('#pop_up').load("../app/helpers/highlightedVerify",
  {
     news_on_of:news_on_of
  });
  });
</script>
