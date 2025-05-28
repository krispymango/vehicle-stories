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
    <title>Vehicle Stories | Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;1,100;1,300;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/desktopStyleSheet">
    <link rel="stylesheet" href="../assets/css/tableStylesheet.css">
    <link rel="stylesheet" href="../assets/css/userStyleSheet">
    <link rel="stylesheet" href="../assets/css/yearpicker.css">
    <link rel="stylesheet" href="../assets/css/fontawesome.min.css">
    <link rel="stylesheet" href="../assets/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/mobileStyleSheet.css">
    <script src="../assets/js/jquery.min.js"></script></head>
    <script src="../assets/js/sort_profile.js"></script></head>
    <script src="../assets/js/form.js"></script></head>
  <body>
    <!-- Navigation bar -->
<?php include(ROOT_PATH . "/app/includes/menuBarContent.php"); ?>
    <!-- Navigation bar -->


    <!-- Navigation bar -->
<?php include(ROOT_PATH . "/app/includes/headerContent.php"); ?>

<?php include(ROOT_PATH . "/app/includes/mobileHeaderContent.php"); ?>
    <!-- Navigation bar -->

    <!--slider carousel-->
<?php include(ROOT_PATH . "/user/includes/profileContent.php"); ?>
    <!--slider carousel-->

    <!-- filtered vehicles section -->
<?php include(ROOT_PATH . "/app/includes/footerContent.php"); ?>
    <!-- filtered vehicles section -->
  </body>

  <script type="text/javascript">


  //User Table Entries function
  $(document).ready(function()
  {
  $('#usr_entry').change(function()
  {
    var entries = $("#usr_entry").val();
    $('#view_table').load("../app/helpers/profilevehicleDetailsTable",
   {
      entries: entries,
  });
  });
  });


  $(document).ready(function()
  {
  $('#usr_entry').change(function()
  {
    var entries = $("#usr_entry").val();
    $('#pgg').load("../app/helpers/profilevehicleDetailsTablePagination",
   {
      entries: entries
  });
  });
  });



  //User Table Search function
  $(document).ready(function()
  {
  $('#usr_search').keyup(function()
  {
    var search = $("#usr_search").val();
    $('#view_table').load("../app/helpers/profilevehicleDetailsTable",
   {
      search: search
  });
  });
  });


  $(document).ready(function()
  {
  $('#usr_search').keyup(function()
  {
    var search = $("#usr_search").val();
    $('#pgg').load("../app/helpers/profilevehicleDetailsTablePagination",
   {
      search: search
  });
  });
  });

  </script>
</html>
