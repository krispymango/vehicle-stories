<?php
include("path.php");
include("app/database/db/userDb.php");
include("app/database/db/db.php");
include(ROOT_PATH . '/controllers/UserActivity.php');
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Vehicle Stories | Contact</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;1,100;1,300;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/desktopStyleSheet">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/css/all.min.css">
          <link rel="stylesheet" href="assets/css/mobileStyleSheet.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="assets/js/form.js"></script>
  </head>
  <body>

    <!-- Navigation bar -->
<?php include(ROOT_PATH . "/app/includes/menuBarContent.php"); ?>
    <!-- Navigation bar -->


    <!-- Navigation bar -->
<?php include(ROOT_PATH . "/app/includes/headerContent.php"); ?>

<?php include(ROOT_PATH . "/app/includes/mobileHeaderContent.php"); ?>
    <!-- Navigation bar -->

    <!-- contact Form Content -->
<?php include(ROOT_PATH . "/app/includes/contactContent.php"); ?>
    <!-- contact Form Content -->

    <!-- filtered vehicles section -->
<?php include(ROOT_PATH . "/app/includes/footerContent.php"); ?>
    <!-- filtered vehicles section -->
  </body>
</html>
