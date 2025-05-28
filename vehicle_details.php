<?php
include("path.php");
include("app/database/db/db.php");
include(ROOT_PATH . '/controllers/UserActivity.php');
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Vehicle Stories | Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <!-- jQuery -->

    <!-- Insert to your webpage before the </head>
    <script src="<?php// echo BASE_URL . '/assets/js/jquery.js';?>"></script>
    <script src="assets/js/amazingslider.js"></script>
    <link rel="stylesheet" type="text/css" href="assets/css/amazingslider-1.css">
    <script src="assets/js/initslider-1.js"></script>
    <link rel="stylesheet" type="text/css" href="assets/css/amazingslider-2.css">
    <script src="assets/js/initslider-2.js"></script>
    End of head section HTML codes -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;1,100;1,300;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo BASE_URL . '/assets/css/desktopStyleSheet';?>">
<script src="<?php echo BASE_URL . '/assets/js/jquery.js';?>"></script>
    <link rel="stylesheet" href="<?php echo BASE_URL . '/assets/css/fontawesome.min.css';?>">
    <link rel="stylesheet" href="<?php echo BASE_URL . '/assets/css/all.min.css';?>">

        <link rel="stylesheet" href="<?php echo BASE_URL . "/assets/css/mobileStyleSheet.css"; ?>">
    <!-- Link Swiper's CSS -->
  <!--  <script src="assets/js/gallery_functionality.js"></script> -->
    <link rel="stylesheet" href="<?php echo BASE_URL . '/assets/css/galleryStyleSheet.css';?>">
    <link href="<?php echo BASE_URL . '/assets/3/ninja-slider.css';?>" rel="stylesheet" />
    <script src="<?php echo BASE_URL . '/assets/3/ninja-slider.js';?>"></script>
    <link href="<?php echo BASE_URL . '/assets/3/thumbnail-slider.css';?>" rel="stylesheet" type="text/css" />
    <script src="<?php echo BASE_URL . '/assets/3/thumbnail-slider.js';?>" type="text/javascript"></script>

  </head>
  <body>
    <div class="cokkie_cons" style=" display: none;z-index: 5000; background: rgba(0,0,0,0.5); position:fixed;width:100%;height:100vh;">
      <div style="box-shadow: 0px 2px 5px rgba(0,0,0,0.8);border-radius:5px;padding: 20px;background: white;width: 50%;margin:0px auto;position:fixed;top:50%;left:0px;right:0px;transform:translateY(-50%);" >
        <h2 style="text-align:center;">Cookie Preferences</h2>
        <h4>We use different types of cookies to optimise your experience
          on our website. Click the cookie settings button to learn more
          about their purpose. You may choose which types of cookies to
          allow and can change your preferences at any time. Remember that
          disabling cookies may affect your experience on the website.
          You can learn about how we use cookies by viewing our Cookie Policy.
        </h4>
        <div style="display:grid;grid-template-columns:repeat(3,1fr);">
          <h4></h4>
          <button onclick="AcceptCookie()" style="border:none;border-radius: 5px;background:green;color:white;padding:15px;" type="button" name="button">Accept all Cookies</button>
    <h4></h4>
        </div>
          <i onclick="DenyCookie()" style="color: #717D7E;position:absolute; right:10px;top:10px;" class="fas fa-times"></i>
      </div>
    </div>
    <!-- Navigation bar -->
  <?php include(ROOT_PATH . "/app/includes/menuBarContent.php"); ?>
    <!-- Navigation bar -->


    <!-- Navigation bar -->
  <?php include(ROOT_PATH . "/app/includes/headerContent.php"); ?>

  <?php include(ROOT_PATH . "/app/includes/mobileHeaderContent.php"); ?>
    <!-- Navigation bar -
    <!--slider carousel-->
<?php include(ROOT_PATH . "/app/includes/vehicleDetailsContent.php"); ?>
    <!--slider carousel-->

    <!-- filtered vehicles section -->
<?php include(ROOT_PATH . "/app/includes/footerContent.php"); ?>
    <!-- filtered vehicles section -->
  </body>

  <script type="text/javascript">
  if (sessionStorage.getItem("Cookie"))
  {
  document.querySelector('.cokkie_cons').style.display = "none";
  }
  else
  {
    setTimeout(function ()
    {
      document.querySelector('.cokkie_cons').style.display = "block";
    }, 3000);
  }

    function AcceptCookie()
    {
      document.querySelector('.cokkie_cons').style.display = "none";
      sessionStorage.setItem("Cookie", "Accepted");
    }

    function DenyCookie()
    {
      document.querySelector('.cokkie_cons').style.display = "none";
    }
  </script>

</html>
