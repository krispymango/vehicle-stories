<?php
include("../path.php");
include("../controllers/adminMiddleware.php");
include("../controllers/notLoggedMiddleware.php");
include("../app/database/db/adminDb.php");
include("../app/database/db/db.php");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Admin Panel | User Account Details</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;1,100;1,300;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo BASE_URL . "/assets/css/desktopStyleSheet"; ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL . "/assets/css/adminStyleSheet.css"; ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL . "/assets/css/yearpicker.css"; ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL . "/assets/css/fontawesome.min.css"; ?>">
        <link rel="stylesheet" href="<?php echo BASE_URL . "/assets/css/tableStylesheet.css"; ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL . "/assets/css/all.min.css"; ?>">
    <script src="<?php echo BASE_URL . "/assets/js/jquery.min.js";?>"></script>
        <script src="<?php echo BASE_URL . "/assets/js/sort_userPanel.js";?>"></script>
  </head>
  <body>
    <!-- Navigation bar -->
<?php include(ROOT_PATH . "/admin/includes/adminHeaderContent.php"); ?>
    <!-- Navigation bar -->

    <!--slider carousel-->
<?php include(ROOT_PATH . "/admin/includes/adminUserAccountDetailsContent.php"); ?>
    <!--slider carousel-->

    <!-- filtered vehicles section -->
<?php include(ROOT_PATH . "/app/includes/footerContent.php"); ?>
    <!-- filtered vehicles section -->
  </body>
</html>
