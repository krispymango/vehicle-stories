<!-- this is the file directory which has the administrator panel Navigation -->
<?php include(ROOT_PATH . '/admin/includes/adminPanelNavWrapper.php'); ?>
<!-- this is the file directory which has the administrator panel Navigation -->

<?php
if (isset($_GET['u_id']) && isset($_GET['email']))
{
  $sql = "SELECT * FROM vs_contact_form WHERE user_id = '$_GET[u_id]' ";
  $sql_exec = mysqli_query($conn,$sql);

  if ($sql_fetch = mysqli_fetch_assoc($sql_exec))
  {
    $username = $sql_fetch['username'];
    $email = $sql_fetch['email'];
    $subject = $sql_fetch['subject'];
  }

  if (isset($_GET['read']))
  {
    $sql_vd = "UPDATE vs_contact_form SET read_msg = 0 WHERE user_id = '$_GET[u_id]'";
    $sql_vd_exe = mysqli_query($conn,$sql_vd);
  }
}


   ?>


<section class="admin_panel_wrapper">
<h3>Messages</h3>

<div class="return_box">
  <a href="<?php echo BASE_URL . '/admin/messages'; ?>"><i class="fas fa-long-arrow-alt-left"></i> Return to messages</a>
</div>

<div class="admin_send_message_wrapper">


<!-- message box-->
<div class="admin_text_area_wrapper">
<div style="padding-left:3px;" class="conversation_heading">
  <?php
  if (isset($_GET['u_id']) && isset($_GET['email']))
  {
    $sql = "SELECT * FROM vs_contact_form WHERE user_id = '$_GET[u_id]' ";
    $sql_exec = mysqli_query($conn,$sql);

    if ($sql_fetch = mysqli_fetch_assoc($sql_exec))
    {
    echo $sql_fetch['username'] .'('.$sql_fetch['email'].')';
    }
  }

     ?>
   </div>
<div class="admin_text_chat">
  <div id="admn_box_chat" class="admin_text_chat_box">
    <div class="loading_screen">
<img src="<?php echo BASE_URL . '/assets/img/Rolling.svg' ?>">
    </div>
    <?php
if (isset($_GET['u_id']) && isset($_GET['email']))
{
  $sql = "SELECT * FROM vw_contact_form WHERE user_id = '$_GET[u_id]' ";
  $sql_exec = mysqli_query($conn,$sql);
  while ($sql_fetch = mysqli_fetch_assoc($sql_exec))
  {
?>
   <div class="user_box_wrapper">
      <div class="user_box_description">
         <strong><?php echo $sql_fetch['username']; ?> &bull; <?php echo $sql_fetch['date_posted'] . ' '. $sql_fetch['time_posted'];  ?></strong>
 <p><?php echo $sql_fetch['message']; ?></p>
       </div>
     </div>
<?php   }} ?>

<div class="loading_bar">
<img src="<?php echo BASE_URL . '/assets/img/Rolling.svg' ?>">
</div>




  </div>
</div>
<form class="admin_text_box" action="index.html" method="post">
  <!-- email -->
<input type="hidden" id="adm_ue" name="admin_username_email" value="<?php echo $email ?>">
  <!-- user_id -->
<input type="hidden" id="adm_ui" name="admin_user_id" value="<?php echo $_GET['u_id']; ?>">
  <!-- subject -->
<input type="hidden" id="adm_s" name="admin_subject" value="<?php echo $subject ?>">
<input type="text" id="adm_m" name="admin_message"  placeholder="Type your message...">
<input type="submit" id="adm_sub" name="admin_send" value="Send">
</form>
</div>


</div>




</section>

<script type="text/javascript">
$(document).ready(function()
{
$('.admin_text_box').submit(function(event)
{
event.preventDefault();
$('.loading_bar').show();
var admin_username_email = $('#adm_ue').val();
var admin_user_id = $('#adm_ui').val();
var admin_subject = $('#adm_s').val();
var admin_message = $('#adm_m').val();
var admin_send = $('#adm_sub').val();
$('#admn_box_chat').load("../app/helpers/adminMessageSendVerify",
{
  admin_username_email:admin_username_email,
  admin_user_id:admin_user_id,
  admin_subject:admin_subject,
  admin_message:admin_message,
  admin_send:admin_send
});
});
});





var auto_refresh = setInterval(
function ()
{
var admin_user_id = $('#adm_ui').val();
$('#admn_box_chat').load('../app/helpers/adminMessageLoad',
{
  user_id:admin_user_id

});
}, 5000);

</script>

<script type="text/javascript">
$('.admin_text_chat').scrollTop($('.admin_text_chat')[0].scrollHeight);
</script>
