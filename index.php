
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


  <?php
  $curr_date = date('Y-m-d');
  $f_sql = "SELECT * FROM vs_news WHERE heading = '$curr_date' ORDER BY id ASC";
  $f_sql_exec = mysqli_query($conn,$f_sql);
  //$f_sql_fetch = mysqli_fetch_assoc($f_sql_exec);
  //$f_sql_num = mysqli_num_rows($f_sql_exec);
  if ($f_sql_exec)
  {
    while ($f_sql_fetch = mysqli_fetch_assoc($f_sql_exec))
    {
      echo "
      <div class='neews_wrapper' style='display: none;z-index: 4000; background: rgba(0,0,0,0.5); position:fixed;width:100%;height:100vh;'>

      <div class='news_box'>
      <h3 style='text-align:center;text-decoration:underline;'>NEWS</h3>
      <div class='news_even' style='height: 30vh;overflow-y: scroll;'>

<div style='padding:5px;'>
    <h3>".$f_sql_fetch['heading']."</h3>
    <p>".$f_sql_fetch['news']."</p>
      </div>
      </div>
      <i onclick='DenyNews()' style='cursor:pointer;color: black;position:absolute; right:10px;top:10px;' class='fas fa-times'></i>

   </div>

   </div>";
    }
  }
   ?>





<div class="cokkie_cons" style=" display: none;z-index: 5000; background: rgba(0,0,0,0.5); position:fixed;width:100%;height:100vh;">
  <div class="cookie_box" >
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
    <?php
    if (isset($_SESSION['unactive_msg']))
    {
      echo "
      <div style='background:orange;text-align:center;'>
        <a style='font-weight: bold;color:white;'><i class='fas fa-exclamation-triangle'></i>  Please click on the link in your email to activate your account!</a>
      </div>
      ";
      unset($_SESSION['unactive_msg']);
  }

    ?>
    <!--slider carousel-->
<?php include(ROOT_PATH . "/app/includes/sliderCarouselContent.php"); ?>
    <!--slider carousel-->

    <!-- filter section -->
<?php include(ROOT_PATH . "/app/includes/filterBoxContent.php"); ?>
    <!-- filter section -->

    <!-- filtered vehicles section -->
<?php include(ROOT_PATH . "/app/includes/filteredVehiclesContent.php"); ?>
    <!-- filtered vehicles section -->

    <!-- filtered vehicles section -->
<?php include(ROOT_PATH . "/app/includes/footerContent.php"); ?>
    <!-- filtered vehicles section -->


    <?php
if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
         $url = "https://";
    else
         $url = "http://";
    // Append the host(domain name, ip) to the URL.
    $url.= $_SERVER['HTTP_HOST'];

    // Append the requested resource location to the URL
    $url.= $_SERVER['REQUEST_URI'];
 $_SESSION['page'] = $url;  ?>

  </body>
</html>

<?php
$data = file_get_contents(ROOT_PATH .'/app/helpers/api/properties.json');
$json_arr = json_decode($data, true);
$cokie_val = $json_arr[6]['Value'];
$news_val = $json_arr[5]['Value'];
 ?>

<script type="text/javascript">


if (sessionStorage.getItem("Cookie") == "Accepted")
{
document.querySelector('.cokkie_cons').style.display = "none";
}
else if(sessionStorage.getItem("Cookie") == "0")
{
document.querySelector('.cokkie_cons').style.display = "none";
}
else
{
  var coki_value = <?php echo $cokie_val; ?>;
  sessionStorage.setItem("Cookie", coki_value);
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


<script type="text/javascript">

if (sessionStorage.getItem("News_pop") == "Accepted")
{
document.querySelector('.neews_wrapper').style.display = "none";
}
else if(sessionStorage.getItem("News_pop") == "0")
{
document.querySelector('.neews_wrapper').style.display = "none";
}
else
{
  var news_value = <?php echo $cokie_val; ?>;
  sessionStorage.setItem("News_pop", news_value);
  setTimeout(function ()
  {
    document.querySelector('.neews_wrapper').style.display = "block";
  }, 3000);
}


function DenyNews()
{
  document.querySelector('.neews_wrapper').style.display = "none";
  sessionStorage.setItem("News_pop", "Accepted");
}



</script>
