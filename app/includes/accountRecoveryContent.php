<div class="acc_recov_wrapper">
<form class="acc_recov" action="app/process.html" method="post">
  <h3>Account Recovery</h3>
  <div style="color:red;" id='acc_error_msg'>

  </div>
<label for="">Type your email address:</label>
<input type="email" id="emil" name="email"  required>
<input type="submit" id="smt" name="submit" value="Submit">
</form>
</div>



<script type="text/javascript">
$(document).ready(function()
{
$('.acc_recov').submit(function(event)
{
event.preventDefault();
$('.loading_screen').show();
var email = $('#emil').val();
var submit = $('#smt').val();
$('#acc_error_msg').load("app/helpers/accountRecoveryVerify",
{
  email: email,
  submit: submit
});
});
});

</script>
