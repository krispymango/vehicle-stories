
<?php
include("path.php");
include("app/database/db/db.php");
include(ROOT_PATH . '/controllers/UserActivity.php');
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Vehicle Stories | Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;1,100;1,300;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/desktopStyleSheet">
    <link rel="stylesheet" href="assets/css/carouselStyleSheet">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/css/all.min.css">
    <link rel="stylesheet" href="assets/css/mobileStyleSheet.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    <!-- Moment Js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <!-- Year Picker CSS -->
    <link rel="stylesheet" href="<?php echo BASE_URL . '/assets/css/yearpicker.css'; ?>" />
    <script src="https://frontbackend.com/storage/resources/jquery-year-picker/yearpicker.js"></script>
    <script src="<?php echo BASE_URL . '/assets/js/form.js'; ?>"></script>

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
    <!-- Navigation bar -->

<div style="text-align:center;">
  <h1 style="font-size:50px;">Error 404!</h1>
  <h2>Page not found.</h2>
  <h4>Click here to get back to safety <a style="color:blue;" href="<?php echo BASE_URL ?>">Home</a> </h4>
</div>


  </body>
</html>
