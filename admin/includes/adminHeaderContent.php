<nav>
  <section class="header_logo_wrapper">
    <section class="header_logo">
      <a href="<?php echo BASE_URL; ?>"><img src="<?php echo BASE_URL . "/assets/img/vs1.png"; ?>"></a>
      <a href="<?php echo BASE_URL; ?>">Vehicle</a>
      <a href="<?php echo BASE_URL; ?>">Stories</a>
    </section>
  </section>
  <section class="header_announcement">

  </section>
  <section class="admin_header_navigation_bar_wrapper">
    <div class="admin_header_navigation_bar_grid">
      <section class="admin_header_navigation_bar">
        <span id="admin_header_icon"><i><img src='<?php echo BASE_URL . "/assets/img/avatar/".$_SESSION['user_image']."" ?>'></i></span>
        <a id="admin_header_details"> <span><?php echo $_SESSION['username']; ?></span> <span>Admin</span> </a>
      </section>
      <section class="admin_header_navigation_bar_dropdown_wrapper">
      <section class="admin_header_navigation_bar_dropdown">
        <a href="<?php echo BASE_URL . '/admin/user_accounts'; ?>"><i class='far fa-user'></i>  Admin panel</a>
        <a href="<?php echo BASE_URL . '/admin/change_details'; ?>"><i class="fas fa-cog"></i>  Settings</a>
        <a href="<?php echo BASE_URL . '/logout'; ?>"><i class='fas fa-eye'></i>  Logout</a>
      </section>
      </section>
    </div>
  </section>
</nav>
