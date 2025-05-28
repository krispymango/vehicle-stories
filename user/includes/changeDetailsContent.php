<?php
if (isset($_SESSION['change_error']) && $_SESSION['change_error'] == 1)
{
  echo "
  <script>
  $(document).ready(function()
  {
  $('.loading_screen').hide();
  $('.pop_up_box').show();
    $('.fa-times-circle').show();
  $('.pop_up_box').css('box-shadow','0px 2px 5px red');
  $('.pop_up_box').html('<h4> Could not update Avatar </h4>');
  $('.pop_up_box').delay(2000).fadeOut();
});
  </script>
  ";

  unset($_SESSION['change_error']);
}
elseif(isset($_SESSION['change_error']) && $_SESSION['change_error'] == 2)
{
  echo "

  <script>
  $(document).ready(function()
  {
  $('.loading_screen').hide();
  $('.pop_up_box').show();
  $('.fa-times-circle').show();
  $('.pop_up_box').css('box-shadow','0px 2px 5px red');
  $('.pop_up_box').html('<h4> File size is greater than 25kb </h4>');
  $('.pop_up_box').delay(2000).fadeOut();
});
  </script>

  ";
  unset($_SESSION['change_error']);
}
elseif(isset($_SESSION['change_error']) && $_SESSION['change_error'] == 3)
{
  echo "

  <script>
  $(document).ready(function()
  {
  $('.loading_screen').hide();
  $('.pop_up_box').show();
    $('.fa-times-circle').show();
  $('.pop_up_box').css('box-shadow','0px 2px 5px green');
  $('.pop_up_box').html('<h4> Avatar has been sucessfully updated </h4>');
  $('.pop_up_box').delay(2000).fadeOut();
});
  </script>

  ";
  unset($_SESSION['change_error']);
}
elseif(isset($_SESSION['change_error']) && $_SESSION['change_error'] == 4)
{
  echo "

  <script>
  $(document).ready(function()
  {
  $('.loading_screen').hide();
  $('.pop_up_box').show();
    $('.fa-times-circle').show();
  $('.pop_up_box').css('box-shadow','0px 2px 5px red');
  $('.pop_up_box').html('<h4> Please choose an image </h4>');
  $('.pop_up_box').delay(2000).fadeOut();
});
  </script>

  ";
  unset($_SESSION['change_error']);
}
 ?>
 <div class="loading_screen">
<img src="<?php echo BASE_URL . '/assets/img/Rolling.svg' ?>">
 </div>

<div id="pop_up_change" class="pop_up_box">
<a id="pop_up_text"></a>
<i class="fas fa-2x fa-times-circle" onclick="hidePopUpModal()"></i>
</div>

<section class="user_panel_wrapper">
  <div class="return_box">
  <a href="<?php echo BASE_URL . '/user/user_panel'; ?>"><i class="fas fa-lg fa-long-arrow-alt-left"></i>    Return to User Panel</a>
  </div>
<div class="user_panel">
    <h3>Change Account Details</h3>



    <h4 id="change_heading">Change avatar</h4>
    <form id="changeForm" class="changeAvatarForm" action="<?php echo BASE_URL . '/app/helpers/changeAccountDetailsVerify' ?>" method="post" enctype="multipart/form-data">
    <?php
      $u_id = $_SESSION['id'];//$_GET['u_id'];
      $sql_ed = "SELECT * FROM vw_user WHERE id = '$u_id'";
      $sql_ed_exec = mysqli_query($conn,$sql_ed);
      $sql_ed_fetch = mysqli_fetch_assoc($sql_ed_exec);

      if ($sql_ed_exec && !empty($sql_ed_fetch['avatar']))
      {
     echo "<img src='". BASE_URL ."/assets/img/avatar/".$sql_ed_fetch['avatar']."'>";
      } ?>
    <label>Change Avatar:</label>
    <input type="file" id="file" name="avatar_file" required>
    <input type="submit" name="avatar_submit" value="Apply">
    </form>

<span><h4>Change Email Address</h4></span>
<form id="changeForm" class="changeEmailForm" action="#" method="post">
<label>E-mail:</label>
<input type="email" id="new_eml" name="new_email" required>
<label>Password:</label>
<input type="password"id="pswd"  name="password" required>
<input type="submit" id="eml_smt" name="email_submit" value="Apply">
</form>


<h4>Change Password</h4>
<form id="changeForm" class="changePasswordForm" action="#" method="post">
<label>Old Password:</label>
<input type="password" id="old_pswd" name="old_password" required>
<label>New Password:</label>
<input type="password" id="new_pswd" name="new_password" required>
<input type="submit" id="pswd_smt" name="password_submit" value="Apply">
</form>


<h4>Change Username</h4>
<form id="changeForm" class="changeUsernameForm" action="#" method="post">
<label>Username:</label>
<input type="text" id="new_usrnme" name="new_username" required>
<input type="submit" id="usrnme_smt" name="username_submit" value="Apply">
</form>





  </div>

</section>

<script type="text/javascript">
$(document).ready(function()
{
  $('#hideHeader').hide();
  $('#hideHeaderTwo').hide();
});
</script>
