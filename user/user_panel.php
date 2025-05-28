<?php
include("../path.php");
include("../controllers/notLoggedMiddleware.php");
include("../controllers/userMiddleware.php");
include("../app/database/db/userDb.php");
include("../app/database/db/db.php");
include(ROOT_PATH . '/controllers/UserActivity.php');
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Vehicle Stories | User Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;1,100;1,300;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo BASE_URL . "/assets/css/desktopStyleSheet"; ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL . "/assets/css/userStyleSheet"; ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL . "/assets/css/tableStylesheet.css"; ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL . "/assets/css/yearpicker.css"; ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL . "/assets/css/fontawesome.min.css"; ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL . "/assets/css/all.min.css"; ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL . "/assets/css/mobileStyleSheet.css"; ?>">
    <script src="<?php echo BASE_URL . "/assets/js/jquery-3.6.0.min.js";?>"></script>
    <script src="<?php echo BASE_URL . "/assets/js/form.js";?>"></script>
    <script src="<?php echo BASE_URL . "/assets/js/sort_userPanel.js";?>"></script>
  </head>
  <body>
    <!-- Navigation bar -->
<?php include(ROOT_PATH . "/app/includes/menuBarContent.php"); ?>
    <!-- Navigation bar -->


    <!-- Navigation bar -->
<?php include(ROOT_PATH . "/app/includes/headerContent.php"); ?>

<?php include(ROOT_PATH . "/app/includes/mobileHeaderContent.php"); ?>
    <!-- Navigation bar -->
    <!--slider carousel-->
<?php include(ROOT_PATH . "/user/includes/userPanelContent.php"); ?>
    <!--slider carousel-->

    <!-- filtered vehicles section -->
<?php include(ROOT_PATH . "/app/includes/footerContent.php"); ?>
    <!-- filtered vehicles section -->
  </body>
</html>
