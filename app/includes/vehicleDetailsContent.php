<div id="fullscreen_Ad" style="display:none;position:fixed;z-index:400;top:0px;left:0px;right:0px;background:black;height:100vh;" class="">
  <div class="name_of_vehicle">
  <span><?php if (isset($_GET['name']))
  {
    echo $_GET['name'];
  } ?>
</span>
  </div>
<div style="display:flex;">
  <div class="fullscreen_left_ad">
    <?php GalleryLeftAd(); ?>
  </div>

<div style="flex-basis:60%;">

</div>

<div class="fullscreen_right_ad">
<?php GalleryRightAd(); ?>
</div>
</div>
</div>

<section class="car_content_wrapper">
  <div id="TempReturnBox" class="return_box">
  <a href="<?php echo $_SESSION['page']; ?>"><i class="fas fa-lg fa-long-arrow-alt-left"></i>    Return to Results</a>
  </div>
  <div class="car_content_left_advertisement">
    <div class="car_content_left_wrapper">
      <?php VehicleDetailsLeftAd(); ?>
    </div>
  </div>


  <div class="car_content_details">
    <div class="car_gallery_and_comment">
      <div id="mobileReturnHide" class="return_box">
      <a href="<?php echo $_SESSION['page']; ?>"><i class="fas fa-lg fa-long-arrow-alt-left"></i>    Return to Results</a>
      </div>
      <!--start-->

      <!--end-->
<?php include(ROOT_PATH . "/app/includes/galleryContent.php"); ?>
<div class="car_details_wrapper">

<div class="car_details">
<?php VehicleDescription(); ?>
</div>


<?php VehicleAnnouncement() ?>

<form class="car_comment_text" style="display: none;margin-top: 1vh; margin-bottom: 2vh;border:1px solid #F44BC6; border-radius:3px; padding:5px;" action="<?php echo BASE_URL . '/app/helpers/commentVerify'; ?>" method="post">
  <label>Type a comment:</label>
  <input type="hidden" name="vehicle_name" value="<?php echo $_GET['name']; ?>">
  <input type="hidden" name="vehicle_id" value="<?php echo $_GET['id']; ?>">
  <input type="hidden" name="user_id" value="<?php echo $_SESSION['id']; ?>">
<textarea style="margin-top: 1vh; margin-bottom: 1vh;padding: 5px;outline: none;background: #E5E7E9;height: 10vh;border-radius:3px;border:none;resize:none;width:90%;"  name="comment"></textarea>
<input style="height: 5vh; cursor: pointer;display:block;border-radius:3px;border:none;color:white;background:green;box-shadow:0px 2px 5px rgba(0,0,0,0.6);" type="submit" name="submit" value="comment">
</form>
<?php if (isset($_SESSION['id'])): ?>
  <div class="car_comments">

    <?php
    $idd = base64_decode(hex2bin($_GET['id']));
    $sql= "SELECT * FROM vw_comment WHERE vehicle_id = '$idd'";
    $sql_exec = mysqli_query($conn,$sql);
    $sql_num_rows = mysqli_num_rows($sql_exec);
  echo "
  <h4 style='color:#F44BC6;'>".$sql_num_rows." comments <i onclick='ShowComment()' style='color:#F44BC6; cursor:pointer;' class='fas fa-lg fa-plus-circle'></i></h4>";
    if ($sql_exec)
    {
  while ($sql_fetch = mysqli_fetch_assoc($sql_exec))
      {
        echo "
        <div  style='height: 5vh;margin:0px auto; width:95%; display:flex; margin-top:1vh;margin-bottom:1vh'>
        <img style='margin:0px auto; flex:0.5;width:100%;height:100%;border-radius:50%;' src='".BASE_URL."/assets/img/avatar/".$sql_fetch['avatar']."'>
        <div id='closesst' style='margin-left:5px;font-weight: bold;flex:9.5;line-height:5vh'>  ".$sql_fetch['username'].", ".$sql_fetch['date_posted']." ".$sql_fetch['time_posted']."";

        if ($sql_fetch['user_id'] == $_SESSION['id'])
        {
          echo "
          <input type='hidden' id='compare_val' value='".$sql_fetch['user_id']."' >
  <a href='".BASE_URL."/app/helpers/deleteComment?c_id=".bin2hex(base64_encode($sql_fetch['id']))."&m_id=".bin2hex(base64_encode($sql_fetch['user_id']))."&vehicle_id=".$_GET['id']."&vehicle_name=".$_GET['name']."' style='cursor:pointer;'><i style='color:red;' class='fas fa-trash-alt'></i></a>  <button id='et_btn' value='".$sql_fetch['id']."' style='cursor:pointer; border:none;background:white;'><i style='color:blue;' class='fas fa-pencil-alt'></i></button>
          ";
        }
        echo "
         </div>
        </div>
        <p id='cmnt_text".$sql_fetch['id']."'>".$sql_fetch['comment']."</p>
        <form class='edit_comment_form".$sql_fetch['id']."' style='display:none;width:90%;margin:0px auto;margin-bottom:1vh;' action='".BASE_URL."/app/helpers/editComment' method='post'>
     <input id='edit_cmnt_text".$sql_fetch['id']."' name='changed_text' value='".$sql_fetch['comment']."'>
     <input type='hidden' name='comm_id' id='commm_id".$sql_fetch['id']."' value='".$sql_fetch['id']."'>
     <input type='hidden' name='vehicle_name' value='".$_GET['name']."'>
     <input type='hidden' name='vehicle_id' value='".$_GET['id']."'>
     <input type='hidden' name='m_id' value='".$sql_fetch['user_id']."'>
     <input id='sbmt_edit".$sql_fetch['id']."' style='cursor:pointer;background:green;color:white;border-radius:3px;border:none;' type='submit' name='submit' value='Apply'>
        </form>
        ";
      }
    }
     ?>



  </div>
<?php endif; ?>


</div>
    </div>
    <div class="car_description_wrapper">
      <div class="car_description">
        <div class="car_description_details">

<?php VehicleSpecs(); ?>
        </div>
      </div>
    </div>

  </div>


  <div class="car_content_right_advertisement">
  <div class="car_content_left_wrapper">
  <?php VehicleDetailsRightAd(); ?>
  </div>
  </div>

</section>


<script>
function ShowComment()
{
  $(document).ready(function()
  {
$('.car_comment_text').show();
});
}


$(document).on('click','#et_btn',function()
{
//  $('#cmnt_text').hide();
  let tr = $(this).closest('#closesst');
  var cmp_button_val = $('#compare_val').val();
  var button_val = tr.find('#et_btn').val();
//  alert(button_val+ ' '+cmp_button_val);
    if (cmp_button_val == <?php
    if (isset($_SESSION['id']))
    {
      echo $_SESSION['id'];
    }
    else {
      echo "0";
    }  ?>)
    {
      $('#cmnt_text'+button_val).hide()
   $('.edit_comment_form'+button_val).show();
    }
});

let btnFullScreenClick = true;

$('.fs-icon').click(function()
{
  if (btnFullScreenClick === true)
  {
    $('#fullscreen_Ad').show();
    btnFullScreenClick = false;
  }
  else if (btnFullScreenClick === false)
  {
  $('#fullscreen_Ad').hide();
  btnFullScreenClick = true;
  }

})





</script>

<script type="text/javascript">
$(document).ready(function()
{
  $('#hideHeader').hide();
  $('#hideHeaderTwo').hide();
});
</script>
