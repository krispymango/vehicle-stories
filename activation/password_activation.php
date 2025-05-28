<?php
include("../path.php");
include("../app/database/db/db.php");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Vehicle Stories | Registration Activation</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;1,100;1,300;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/desktopStyleSheet">
    <link rel="stylesheet" href="../assets/css/carouselStyleSheet">
    <link rel="stylesheet" href="../assets/css/fontawesome.min.css">
    <link rel="stylesheet" href="../assets/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/mobileStyleSheet.css">
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

        <!-- Navigation bar -->
    <?php include(ROOT_PATH . "/app/includes/menuBarContent.php"); ?>
        <!-- Navigation bar -->


        <!-- Navigation bar -->
    <?php include(ROOT_PATH . "/app/includes/headerContent.php"); ?>

    <?php include(ROOT_PATH . "/app/includes/mobileHeaderContent.php"); ?>
        <!-- Navigation bar -->


<?php
if (isset($_GET['acc_key']) && isset($_GET['u_id']))
{
  $u_iid = base64_decode(hex2bin($_GET['u_id']));
  $sql = "SELECT * FROM vs_user WHERE id = '$u_iid' AND password_activation_key = '$_GET[acc_key]' AND password_key_active_status = 1";
  $sql_exec = mysqli_query($conn,$sql);
  $sql_fetch = mysqli_fetch_assoc($sql_exec);
  $sql_num_row = mysqli_num_rows($sql_exec);



  if ($sql_num_row && $sql_fetch)
  {
    $name = $sql_fetch['username'];
    $email = $sql_fetch['email'];
    $sql_upd = "UPDATE vs_user SET password_key_active_status = 0 WHERE id = '$u_iid' AND password_activation_key = '$_GET[acc_key]'";
    $sql_upd_exec = mysqli_query($conn,$sql_upd);

    if ($sql_upd_exec)
    {
      include(ROOT_PATH . '/controllers/emailTemplates/successRegistrationActivation.php');
      echo "
      <div style='text-align: center;width:80%; margin:0px auto; margin-top:10vh;'>
        <h1><i style='color:green;' class='fas fa-lg fa-check-circle'></i> Your Password has been successfully activated!</h1>
        <h4>Click here to return to the main page <a style='color:blue; 'href='".BASE_URL."'>Home.</a> </h4>
      </div>
      ";
    }
      else
      {
        echo "
        <div style='text-align: center;width:80%; margin:0px auto; margin-top:10vh;'>
          <h1><i style='color:red;' class='fas fa-lg fa-exclamation-circle'></i> Error could not activate your password!</h1>
          <h4>Click <a style='color:blue; 'href=' ".BASE_URL."/contact' >here</a> to contact the administrator or try re-activating your account. </h4>
        </div>
    ";
      }

  }
  else
  {
    echo "
    <div style='text-align: center;width:80%; margin:0px auto; margin-top:10vh;'>
      <h1><i style='color:red;' class='fas fa-lg fa-exclamation-circle'></i> Error could not activate your password!</h1>
      <h4>Click <a style='color:blue; 'href=' ".BASE_URL."/contact' >here</a> to contact the administrator or try re-activating your account. </h4>
    </div>
";
  }
}
else
{
  header('location:'.BASE_URL);
}
 ?>




  </body>
</html>
