<section class="registration_content_wrapper">
  <div class="registration_login_form_wrapper">
<div class="registration_login_button">
  <a id="rg_btn">Register</a>
  <a id="lgn_btn">Login</a>
</div>
<div class="registration_form_toggle">
  <div id="registration_error_msg"></div>
<form class="registration_form" action="#" method="post">
<label for="">Username</label>
<input type="text" name="username" id="rg_usrnme" required pattern="[A-Za-z0-9]+" title="Only letters and numbers no space">
<label for="">Email</label>
<input type="email" name="email" id="rg_emil" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
<label for="">Password</label>
<div style="display:flex;">
  <input style="flex:9;"  type="password" name="password" id="rg_psswrd" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters">
  <i onclick="RegPasswordShow()" style="margin-left: 3px;cursor: pointer;border-radius: 3px;text-align:center;flex:1;background:#BDC3C7;height:100%;line-height:4vh;" class="fas fa-eye"></i>
</div>
<label for="">Confrim Password</label>
<div style="display:flex;">
<input style="flex:9;" type="password" name="conf_password" id="rg_conf_psswrd" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters">
<i onclick="RegPasswordConfShow()" style="margin-left: 3px;cursor: pointer;border-radius: 3px;text-align:center;flex:1;background:#BDC3C7;height:100%;line-height:4vh;" class="fas fa-eye"></i>
</div>
<div class="aggrement_form_wrapper">
<input type="checkbox" name="check_box" required>
<p>I would like to receive emails from mobile.de about offers, surveys and information on products and services from mobile.de and eBay Kleinanzeigen (can be cancelled at any time in the account settings).</p>
</div>
<input type="submit" name="submit" id="rg_submit" value="Register">
</form>
</div>

<!-- login form(This form tag will not be displayed. Unless the login button on the div is clicked) -->
<div class="login_form_toggle">
  <div id="login_error_msg"></div>
<form class="login_form" action="process.php" method="post">
  <label>Username</label>
<input type="text" name="username" id="usrnme" required>
<label>Password</label>
<div style="display:flex;">
<input style="flex:9;" type="password" name="password" id="psswrd" required>
<i onclick="LoginPasswordShow()" style="margin-left: 3px; cursor: pointer;border-radius: 3px;text-align:center;flex:1;background:#BDC3C7;height:100%;line-height:4vh;" class="fas fa-eye"></i>
</div>
<br>
<a href="account_recovery">Forgot your password?</a>
<input type="submit" name="submit" id="smt" value="Login">
</form>
</div>
</div>
<div class="">

</div>
</section>


<script type="text/javascript">


let change_reg_password = false;
let change_reg_password_conf = false;
let change_login_password = false;

function RegPasswordShow()
{
  if (change_reg_password === false)
  {
  $('#rg_psswrd').attr("type","text");
  change_reg_password = true;
  }
  else if (change_reg_password === true)
  {
  $('#rg_psswrd').attr("type","password");
  change_reg_password = false;
  }
}


function RegPasswordConfShow()
{
  if (change_reg_password_conf === false)
  {
  $('#rg_conf_psswrd').attr("type","text");
  change_reg_password_conf = true;
  }
  else if (change_reg_password_conf === true)
  {
  $('#rg_conf_psswrd').attr("type","password");
  change_reg_password_conf = false;
  }
}


function LoginPasswordShow()
{
  if (change_login_password === false)
  {
  $('#psswrd').attr("type","text");
  change_login_password = true;
  }
  else if (change_login_password === true)
  {
  $('#psswrd').attr("type","password");
  change_login_password = false;
  }
}


$(document).ready(function()
{
  $('#hideHeader').hide();
  $('#hideHeaderTwo').hide();
});

</script>
