<?php
include("path.php");
include(ROOT_PATH . "/controllers/accountMiddleware.php");
include(ROOT_PATH . "/app/database/db/userDb.php");
include(ROOT_PATH . "/app/database/db/db.php");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Vehicle Stories | Registration</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;1,100;1,300;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/desktopStyleSheet">
    <link rel="stylesheet" href="assets/css/yearpicker.css">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/css/all.min.css">
      <link rel="stylesheet" href="assets/css/mobileStyleSheet.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="assets/js/functionality.js"></script>
    <script src="assets/js/form.js"></script>

  </head>
  <body>
    <div class="loading_screen">
<img src="<?php echo BASE_URL . '/assets/img/Rolling.svg' ?>">
    </div>
    <!-- Navigation bar -->
<?php include(ROOT_PATH . "/app/includes/menuBarContent.php"); ?>
    <!-- Navigation bar -->


    <!-- Navigation bar -->
<?php include(ROOT_PATH . "/app/includes/headerContent.php"); ?>

<?php include(ROOT_PATH . "/app/includes/mobileHeaderContent.php"); ?>
    <!-- Navigation bar -->

    <!-- registration Form Content -->
<?php include(ROOT_PATH . "/app/includes/accountRecoveryContent.php"); ?>
    <!-- registration Form Content -->

    <!-- filtered vehicles section -->
<?php include(ROOT_PATH . "/app/includes/footerContent.php"); ?>
    <!-- filtered vehicles section -->
  </body>
</html>
