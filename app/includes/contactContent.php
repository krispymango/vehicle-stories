<section class="contact_content_wrapper">

    <form class="contact_form" action="verify/processes.php" method="post">
      <input type="hidden" id="cct_user_id" name="user_id" value="<?php echo $_SESSION['id']; ?>">
      <input type="hidden" id="cct_user_email" name="user_email" value="<?php echo $_SESSION['email']; ?>">
      <input type="hidden" id="cct_user_name" name="user_name" value="<?php echo $_SESSION['username']; ?>">
      <h2>Contact Us</h2>
      <div id=pop_up_change class="pop_up_box">
      <a id="pop_up_text"></a>
    </div>
      <label>Username</label>
      <input type="text" id="cct_usrnme" name="username">
      <label>Email</label>
      <input type="email" id="cct_email" name="email">
      <label>Subject</label>
      <select name="subject" id="cct_subject" required>
        <option>--Select a subject--</option>
        <option value="fdgsf">Subject 1</option>
        <option value="fdgsf">Subject 2</option>
      </select>
      <label>Message</label>
      <textarea name="message" id="cct_message" rows="8" cols="80"></textarea>
      <input type="submit" id="cct_submit" name="submit" value="Submit">
    </form>
</section>


<script type="text/javascript">
$(document).ready(function()
{
  $('#hideHeader').hide();
  $('#hideHeaderTwo').hide();
});
</script>
