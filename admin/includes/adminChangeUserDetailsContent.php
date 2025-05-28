<?php
$_SESSION['user_idd'] = $_GET['u_id'];
if (isset($_SESSION['change_error']) && $_SESSION['change_error'] == 1)
{
  echo "
  <script>
  $(document).ready(function()
  {
  $('.loading_screen').hide();
  $('.pop_up_box').show();
    $('.fa-times-circle').show();
  $('.pop_up_box').css('box-shadow','0px 2px 5px green');
  $('.pop_up_box').html('<h4> Change was successful </h4>');
  $('#pop_up_change').delay(2000).fadeOut();
});
  </script>
  ";

  unset($_SESSION['change_error']);
}

 ?>

<div id="pop_up_change" class="pop_up_box">
<a id="pop_up_text"></a>
<i class="fas fa-2x fa-times-circle" onclick="hidePopUpModal()"></i>
</div>

<div class="loading_screen">
<img src="<?php echo BASE_URL . '/assets/img/Rolling.svg' ?>">
</div>

<section class="user_panel_wrapper">
  <div class="return_box">
  <a href="<?php echo BASE_URL . '/admin/user_accounts_details?id='.$_GET['u_id']; ?>"><i class="fas fa-lg fa-long-arrow-alt-left"></i>    Return to User Account Details</a>
  </div>
<div style="width:90%;margin:0px auto;padding-bottom:7vh;" class="user_panel">
    <h2 style="margin-bottom: 8vh;text-transform:uppercase;padding-bottom:10px;border-bottom:1px solid grey;">Change User Account Details</h2>

<span><h4>Change Email Address</h4></span>
<form id="changeFor" action="<?php echo BASE_URL . '/app/helpers/AdminChangeUserAccount'; ?>" method="post">
  <input type="hidden" id="uu_id" name="u_id" value="
  <?php
  if (isset($_GET['u_id']))
  {
    echo $_GET['u_id'];
  }
   ?>">
<label>E-mail:</label>
<input type="email" name="new_email" required>
<input type="submit"  name="email_submit" value="Apply">
</form>



<h4>Blocked Status</h4>

<select id="blck" name="blocked_status">
  <?php
  if (isset($_GET['u_id']))
  {
    $sql = "SELECT * FROM vw_user WHERE id = '$_GET[u_id]'";
    $sql_exec = mysqli_query($conn,$sql);
    if ($sql_fetch = mysqli_fetch_assoc($sql_exec))
    {
      if ($sql_fetch['blocked'] == 0)
      {
        echo "<option value='0'>--not blocked--</option>";
      }
      else if($sql_fetch['blocked'] == 1)
      {
        echo "<option value='1'>--blocked--</option>";
      }
    }
  }
  else
  {
  echo "<option value=''>Error</option>";
  }
   ?>
<option value="1">Blocked</option>
<option value="0">not blocked</option>
</select>


<h4>Email Status</h4>
<select id="eml_status" name="email_status">
  <?php
  if (isset($_GET['u_id']))
  {
    $sql = "SELECT * FROM vw_user WHERE id = '$_GET[u_id]'";
    $sql_exec = mysqli_query($conn,$sql);
    if ($sql_fetch = mysqli_fetch_assoc($sql_exec))
    {
      if ($sql_fetch['email_active'] == 1)
      {
        echo "<option value='1'>--Inactive--</option>";
      }
      else if($sql_fetch['email_active'] == 0)
      {
        echo "<option value='0'>--Active--</option>";
      }
    }
  }
  else
  {
  echo "<option value=''>Error</option>";
  }
   ?>
<option value="0">Active</option>
<option value="1">Inactive</option>
</select>






  </div>

</section>



<script type="text/javascript">
//email status
$(document).ready(function()
{
$('#eml_status').change(function()
{
  $('.loading_screen').show();
  var email_status = $('#eml_status').val();
  var u_id = $('#uu_id').val();
  $('#pop_up_change').load("../app/helpers/AdminChangeUserAccount",
 {
    email_status:email_status,
    u_id:u_id
});
});
});

//blocked
$(document).ready(function()
{
$('#blck').change(function()
{
  $('.loading_screen').show();
  var blocked_status = $("#blck").val();
  var u_id = $('#uu_id').val();
  $('#pop_up_change').load("../app/helpers/AdminChangeUserAccount",
 {
    blocked_status:blocked_status,
    u_id:u_id
});
});
});
</script>
