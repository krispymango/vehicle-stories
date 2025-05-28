<style media="screen">
.menuBar_wrapper
{
  display: none;
  top:0px;
  z-index: 2000;
  position: fixed;
  height: 100vh;
  width: 100%;
background: rgba(0, 0, 0, 0.5);
}

.menuBar .fa-times
{
  position: absolute;
  right: 10px;
  top:10px;
}


#items-header a
{
  font-weight: bold;
  text-decoration: none;
  border-bottom: 1px solid grey;
  padding-bottom: 5px;
}
</style>
<div class="menuBar_wrapper">
<div class="menuBar">

  <div class="">
<h3 style="text-align:center;text-decoration:underline;">Menu</h3>

<div id="items-header" style="width:80%;margin:0px auto; display:grid;grid-template-columns:repeat(1,1fr); grid-row-gap:20px;">
<a href="<?php echo BASE_URL; ?>">Home</a>
<?php if (isset($_SESSION['id'])): ?>
  <a><?php echo $_SESSION['username']; ?>  <i class="fas fa-caret-down"></i></a>
  <div style="border: none;width:80%;margin:0px auto;display:grid;grid-template-columns:repeat(1,1fr); grid-row-gap:20px;">
  <a href="<?php echo BASE_URL . '/user/user_panel'; ?>"><i class="fas fa-angle-right"></i>  </i>  Panel</a>
  <a href="<?php echo BASE_URL . '/user/inbox'; ?>"><i class="fas fa-angle-right"></i>  Message</a>
  <a href="<?php echo BASE_URL . '/logout'; ?>"><i class="fas fa-angle-right"></i>  Logout</a>
  </div>
<?php else: ?>
  <a href="<?php echo BASE_URL . '/account'; ?>">Register/Login</a>
<?php endif; ?>

<a href="<?php echo BASE_URL . '/contact'; ?>">Contact</a>
<a>Others  <i class="fas fa-caret-down"></i></a>
<div style="border: none;width:80%;margin:0px auto;display:grid;grid-template-columns:repeat(1,1fr); grid-row-gap:20px;">
<a href="<?php echo BASE_URL . '/about'; ?>"><i class="fas fa-angle-right"></i>  About</a>
<a href="<?php echo BASE_URL . '/news'; ?>"><i class="fas fa-angle-right"></i>  News</a>
<a href="<?php echo BASE_URL . '/rodo'; ?>"><i class="fas fa-angle-right"></i>  RODO</a>
<a href="<?php echo BASE_URL . '/rules'; ?>"><i class="fas fa-angle-right"></i>  Rules</a>
<a href="<?php echo BASE_URL . '/cookie_consent'; ?>"><i class="fas fa-angle-right"></i>  Cookie Consent</a>
</div>
</div>
  </div>
<i onclick="HideMenuBar()" id="menuClosebtn" class="fas fa-lg fa-times"></i>
</div>
</div>
