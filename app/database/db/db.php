<?php


include(ROOT_PATH . '/app/database/connection/conn.php');

function userSession()
{
global $conn;
if (isset($_SESSION['id']))
{
  $sql = "SELECT SUM(read_msg) AS total FROM vs_messages WHERE receiver_id = '$_SESSION[id]'";
  $sql_query = mysqli_query($conn,$sql);
  $total = mysqli_fetch_assoc($sql_query);
  $sql_as = "SELECT * FROM vs_user WHERE email = '$_SESSION[email]' AND username = '$_SESSION[username]'";
  $sql_as_exec = mysqli_query($conn,$sql_as);
  $sql_as_fetch = mysqli_fetch_assoc($sql_as_exec);
}


//$sql_as_num_rows = mysqli_num_rows($sql_as_exec);

  $logout = BASE_URL . '/logout';

if (isset($_SESSION['status']))
{
  $_SESSION['status'];
}
else
{
  $_SESSION['status'] = 2;
}

switch ($_SESSION['status'])
{
  case 0:
  $panel = BASE_URL . '/user/user_panel';
  //$profile = BASE_URL . '/profile';
  $messages = BASE_URL . '/user/inbox?read=true';
    break;

  case 1:
  $panel = BASE_URL . '/admin/user_accounts';
//  $profile = BASE_URL . '/profile';
    break;

    case 2:
    $link = BASE_URL . '/accounts';
      break;

  default:
  $link = BASE_URL . '/user/user_panel';
}

if (isset($_SESSION['id']) && isset($_SESSION['username']))
{
  //echo "<a href='$link'><i class='fas fa-user'></i>".$_SESSION['username']."</a>";
  echo "
  <div class='account_dropdown_wrapper'>
  <a id='nav_profile_pic'><i><img src='".BASE_URL."/assets/img/avatar/".$_SESSION['user_image']."'></i><span>".substr($_SESSION['username'],0,8)."...</span>";
if (isset($total) && $total['total'] != 0)
{
  echo "<a id='notification_btn'>".$total['total']."</a>";
}
  echo "</a>
  <div class='account_dropdown'>
    <div class='account_dropdwn'>
  <a href='$panel'>  <i class='far fa-user'></i>  Panel</a>";

  if (isset($_SESSION['id']) && $_SESSION['status'] == 0)
  {
    echo "<a href='$messages'>  <i class='fas fa-comment-dots'></i>  Message</a>";
  }
echo "
  <a id='lgt' href='$logout'>  <i class='fas fa-eye'></i>  Logout</a>
    </div>
  </div>
  </div>";
}
else
{
  echo "<a href='".BASE_URL."/account'><i class='fas fa-user'></i> Register/login</a>";
}

}




function ContactForm()
{
  global $conn;

    $date_posted = date('d.m.Y');
    $time_posted = date("H:i:s");
    $read = 1;
    if (isset($_POST['user_id']))
    {
      $user_id = stripcslashes($_POST['user_id']);
      $user_id = mysqli_real_escape_string($conn,$user_id);
    }
    else
    {
      $user_id = '';
    }

  $cnt_usrnme = stripcslashes($_POST['username']);
  $cnt_sbjct = stripcslashes($_POST['subject']);
  $cnt_email = stripcslashes($_POST['email']);
  $cnt_msg = stripcslashes($_POST['message']);

  $cnt_usrnme = mysqli_real_escape_string($conn,$cnt_usrnme);
  $cnt_sbjct = mysqli_real_escape_string($conn,$cnt_sbjct);
  $cnt_email = mysqli_real_escape_string($conn,$cnt_email);
  $cnt_msg = mysqli_real_escape_string($conn,$cnt_msg);

if (isset($_POST['submit']))
{
  $sql_cf = "INSERT INTO vs_contact_form(username,subject,message,email,date_posted,time_posted,read_msg,user_id)
  VALUES('$cnt_usrnme','$cnt_sbjct','$cnt_msg','$cnt_email','$date_posted','$time_posted','$read','$user_id')";
  $sql_cf_exec = mysqli_query($conn,$sql_cf);
//die($sql_cf);
  if ($sql_cf_exec)
  {
    echo "Thank you for your message";
  }
  else
  {
    echo "Unfortunately your message was not sent";
  }
}

}


function VehicleFilterDisplay()
{
  global $conn;

  if (!empty($_POST['flt_typ_vehicle']))
  {
    $tov_keyword = $_POST['flt_typ_vehicle'];
    $tov = "AND type_of_vehicle LIKE '%$tov_keyword%'";
  }
  else
  {
      $tov = '';
  }

  if (!empty($_POST['flt_brand']))
  {
    $brand_keyword = $_POST['flt_brand'];
    $brand = "AND brand LIKE '%$brand_keyword%'";
  }
  else
  {
      $brand = '';
  }

  if (!empty($_POST['flt_from']))
  {
    $from =  trim($_POST['flt_from']);
  }
  else
  {
      $from = '';
  }

  if (!empty($_POST['flt_to']))
  {
    $to =  trim($_POST['flt_to']);
  }
  else
  {
      $to = '';
  }

  if (!empty($_POST['flt_location']))
  {
    $location_keyword = $_POST['flt_location'];
    $location = "AND location_voivodship LIKE '%$location_keyword%'";
  }
  else
  {
      $location = '';
  }







  $data = file_get_contents(ROOT_PATH .'/app/helpers/api/properties.json');
    $json_arr = json_decode($data, true);
    if (isset($json_arr))
    {
      $end = ($json_arr[7]['Value']);
    }
    else {
        $end = 4;
    }
  if (isset($_GET['u_id']) && isset($_GET['id']))
  {
    //die($sql_fv);
    $u_idd = base64_decode(hex2bin($_GET['u_id']));
    $sql_fv = "SELECT * FROM vw_vehicle_details WHERE (year_of_production BETWEEN '$from' AND '$to') $tov $brand $location AND user_id = '$u_idd'";
    $sql_fv_exec = mysqli_query($conn,$sql_fv);

  if ($sql_fv_exec)
  {
    while ($sql_fv_fetch = mysqli_fetch_assoc($sql_fv_exec))
    {
          $vehicle_link = 'vehicle_details/'.bin2hex(base64_encode($sql_fv_fetch['id'])).'/'.$sql_fv_fetch['brand'].','.$sql_fv_fetch['model'];
      echo"
      <div id='vehicle_displayy'>
      <img src='assets/img/CarPhotos/".$sql_fv_fetch['main_photo']."' class='vehicle_display_bottom_img'>
        <a href='$vehicle_link' class='vehicle_display_img'>
          <img src='assets/img/CarPhotos/".$sql_fv_fetch['main_photo']."' style='";
           $link = ROOT_PATH .'/assets/img/CarPhotos/'.$sql_fv_fetch['main_photo'];
          list($width,$height,$type,$attr) = getimagesize($link);
          $aspectRatio = $width/$height;
          if ($aspectRatio >= 1.28 && $aspectRatio <=1.38)
          {
              echo 'height:100%;';
              echo 'width:100%;';
              echo 'object-fit:cover;';
          }
          elseif ($aspectRatio <= 1.28)
          {
            echo 'height:100%;';
          }
          else {
            if ($width > $height)
            {
            //  echo 'height:80%;';
            echo 'width:100%;';
            }
            else {
              echo 'height:100%;';
              //echo 'width:80%;';
            }
          }echo " '>
        </a>
        <div class='vehicle_display_description_wrapper'>
          <div class='vehicle_display_description'>
            <h4>".$sql_fv_fetch['brand']." ".substr($sql_fv_fetch['model'],0,12)."</h4>
            <div class='vehicle_display_description_details_grid'>
              <div class='vehicle_display_description_details'>
                <span id='details_heading'>Year</span>
                <span id='details'>".$sql_fv_fetch['year_of_production']."</span>
              </div>
              <div class='vehicle_display_description_details'>
                <span id='details_heading'>Location</span>
                <span id='details'>".$sql_fv_fetch['location_voivodship']."</span>
              </div>
              ";
              if (isset($_SESSION['id']))
              {
                echo "
                <div class='vehicle_display_description_details'>
                  <span id='details_heading'>Date Added</span>
                  <span id='details'>".$sql_fv_fetch['date_added']."</span>
                </div>
                <div class='vehicle_display_description_details'>
                  <span id='details_heading' class='usr_det'>Username</span>";

              if (isset($_SESSION['id']))
              {
              echo "<span id='details'><a href='".BASE_URL."/".bin2hex(base64_encode($sql_fv_fetch['user_id']))."/".$sql_fv_fetch['username']."'> ".$sql_fv_fetch['username']."</a></span>";
              }

                  echo "

              </div> ";
              }
              echo "

            </div>
          </div>
        </div>
        ";
        $data = file_get_contents(ROOT_PATH .'/app/helpers/api/properties.json');
        $json_arr = json_decode($data, true);

        if ($json_arr[4]['highlighted_type'] == "row_1")
        {
          echo "<span id='vehicle_display_tag'>".$json_arr[4]['por']."</span>";
        }
        elseif ($json_arr[4]['highlighted_type'] == "row_2")
        {

          if (($curr_date >= $json_arr[4]['sd']) && ($curr_date <= $json_arr[4]['cd']))
          {
            echo "<span id='vehicle_display_tag'>".$json_arr[4]['por']."</span>";
          }
          else
          {
          echo "<span id='vehicle_display_tag'>".$json_arr[4]['por']."</span>";
          }
        }
        elseif ($json_arr[4]['highlighted_type'] == "row_3")
        {

          if (($curr_date >= $json_arr[4]['sd']) && ($curr_date <= $json_arr[4]['cd']))
          {
            echo "<span id='vehicle_display_tag'>".$json_arr[4]['por']."</span>";
          }
          else
          {
          echo "<span id='vehicle_display_tag'>last added</span>";
          }
        }
        elseif ($json_arr[4]['highlighted_type'] == "row_4")
        {

          if (($curr_date >= $json_arr[4]['sd']) && ($curr_date <= $json_arr[4]['cd']))
          {
            $dat = file_get_contents(ROOT_PATH .'/app/helpers/api/hghProperties.json');
            $json_ar = json_decode($dat, true);
            $curr_date = date('Y-m-d');

        if ($json_ar[0]['select_one'] == $sql_fv_fetch['id'])
        {
          echo "<span id='vehicle_display_tag'>".$json_arr[4]['por']."</span>";
        }
        elseif ($json_ar[0]['select_two'] == $sql_fv_fetch['id'])
        {
          echo "<span id='vehicle_display_tag'>".$json_arr[4]['por']."</span>";
        }
        elseif ($json_ar[0]['select_three'] == $sql_fv_fetch['id'])
        {
          echo "<span id='vehicle_display_tag'>".$json_arr[4]['por']."</span>";
        }
        elseif ($json_ar[0]['select_four'] == $sql_fv_fetch['id'])
        {
          echo "<span id='vehicle_display_tag'>".$json_arr[4]['por']."</span>";
        }
        elseif ($json_ar[0]['select_five'] == $sql_fv_fetch['id'])
        {
          echo "<span id='vehicle_display_tag'>".$json_arr[4]['por']."</span>";
        }
        elseif ($json_ar[0]['select_six'] == $sql_fv_fetch['id'])
        {
          echo "<span id='vehicle_display_tag'>".$json_arr[4]['por']."</span>";
        }
        elseif ($json_ar[0]['select_seven'] == $sql_fv_fetch['id'])
        {
          echo "<span id='vehicle_display_tag'>".$json_arr[4]['por']."</span>";
        }
        elseif ($json_ar[0]['select_eight'] == $sql_fv_fetch['id'])
        {
          echo "<span id='vehicle_display_tag'>".$json_arr[4]['por']."</span>";
        }

        }
        }
        echo "
    </div>
      ";
    }
  }
  else
  {
    echo " ";
  }

  }
  else
  {
    $sql_fv = "SELECT * FROM vw_vehicle_details WHERE (year_of_production BETWEEN '$from' AND '$to') $tov $brand $location LIMIT 0,$end";
    $sql_fv_exec = mysqli_query($conn,$sql_fv);
  //die($sql_fv);

  if ($sql_fv_exec)
  {
    while ($sql_fv_fetch = mysqli_fetch_assoc($sql_fv_exec))
    {
                $vehicle_link = 'vehicle_details/'.bin2hex(base64_encode($sql_fv_fetch['id'])).'/'.$sql_fv_fetch['brand'].','.$sql_fv_fetch['model'];
      echo"
      <div  id='vehicle_displayy'>
      <img src='assets/img/CarPhotos/".$sql_fv_fetch['main_photo']."' class='vehicle_display_bottom_img'>
        <a href='$vehicle_link' class='vehicle_display_img'>
          <img src='assets/img/CarPhotos/".$sql_fv_fetch['main_photo']."' style='";
           $link = ROOT_PATH .'/assets/img/CarPhotos/'.$sql_fv_fetch['main_photo'];
          list($width,$height,$type,$attr) = getimagesize($link);
          $aspectRatio = $width/$height;
          if ($aspectRatio >= 1.28 && $aspectRatio <=1.38)
          {
              echo 'height:100%;';
              echo 'width:100%;';
              echo 'object-fit:cover;';
          }
          elseif ($aspectRatio <= 1.28)
          {
            echo 'height:100%;';
          }
          else {
            if ($width > $height)
            {
            //  echo 'height:80%;';
            echo 'width:100%;';
            }
            else {
              echo 'height:100%;';
              //echo 'width:80%;';
            }
          }echo " '>
        </a>
        <div class='vehicle_display_description_wrapper'>
          <div class='vehicle_display_description'>
            <h4>".$sql_fv_fetch['brand']." ".substr($sql_fv_fetch['model'],0,12)."</h4>
            <div class='vehicle_display_description_details_grid'>
              <div class='vehicle_display_description_details'>
                <span id='details_heading'>Year</span>
                <span id='details'>".$sql_fv_fetch['year_of_production']."</span>
              </div>
              <div class='vehicle_display_description_details'>
                <span id='details_heading'>Location</span>
                <span id='details'>".$sql_fv_fetch['location_voivodship']."</span>
              </div>";
              if (isset($_SESSION['id']))
              {
                echo "
                <div class='vehicle_display_description_details'>
                  <span id='details_heading'>Date Added</span>
                  <span id='details'>".$sql_fv_fetch['date_added']."</span>
                </div>
                <div class='vehicle_display_description_details'>
                  <span id='details_heading' class='usr_det'>Username</span>
                  ";

              if (isset($_SESSION['id']))
              {
              echo "<span id='details'><a href='".BASE_URL."/".bin2hex(base64_encode($sql_fv_fetch['user_id']))."/".$sql_fv_fetch['username']."'> ".$sql_fv_fetch['username']."</a></span>";
              }

                  echo "
              </div> ";
              }
              echo "
            </div>
          </div>
        </div>
        ";
        $data = file_get_contents(ROOT_PATH .'/app/helpers/api/properties.json');
        $json_arr = json_decode($data, true);

        if ($json_arr[4]['highlighted_type'] == "row_1")
        {
          echo "<span id='vehicle_display_tag'>".$json_arr[4]['por']."</span>";
        }
        elseif ($json_arr[4]['highlighted_type'] == "row_2")
        {

          if (($curr_date >= $json_arr[4]['sd']) && ($curr_date <= $json_arr[4]['cd']))
          {
            echo "<span id='vehicle_display_tag'>".$json_arr[4]['por']."</span>";
          }
          else
          {
          echo "<span id='vehicle_display_tag'>".$json_arr[4]['por']."</span>";
          }
        }
        elseif ($json_arr[4]['highlighted_type'] == "row_3")
        {

          if (($curr_date >= $json_arr[4]['sd']) && ($curr_date <= $json_arr[4]['cd']))
          {
            echo "<span id='vehicle_display_tag'>".$json_arr[4]['por']."</span>";
          }
          else
          {
          echo "<span id='vehicle_display_tag'>last added</span>";
          }
        }
        elseif ($json_arr[4]['highlighted_type'] == "row_4")
        {

          if (($curr_date >= $json_arr[4]['sd']) && ($curr_date <= $json_arr[4]['cd']))
          {
            $dat = file_get_contents(ROOT_PATH .'/app/helpers/api/hghProperties.json');
            $json_ar = json_decode($dat, true);
            $curr_date = date('Y-m-d');

        if ($json_ar[0]['select_one'] == $sql_fv_fetch['id'])
        {
          echo "<span id='vehicle_display_tag'>".$json_arr[4]['por']."</span>";
        }
        elseif ($json_ar[0]['select_two'] == $sql_fv_fetch['id'])
        {
          echo "<span id='vehicle_display_tag'>".$json_arr[4]['por']."</span>";
        }
        elseif ($json_ar[0]['select_three'] == $sql_fv_fetch['id'])
        {
          echo "<span id='vehicle_display_tag'>".$json_arr[4]['por']."</span>";
        }
        elseif ($json_ar[0]['select_four'] == $sql_fv_fetch['id'])
        {
          echo "<span id='vehicle_display_tag'>".$json_arr[4]['por']."</span>";
        }
        elseif ($json_ar[0]['select_five'] == $sql_fv_fetch['id'])
        {
          echo "<span id='vehicle_display_tag'>".$json_arr[4]['por']."</span>";
        }
        elseif ($json_ar[0]['select_six'] == $sql_fv_fetch['id'])
        {
          echo "<span id='vehicle_display_tag'>".$json_arr[4]['por']."</span>";
        }
        elseif ($json_ar[0]['select_seven'] == $sql_fv_fetch['id'])
        {
          echo "<span id='vehicle_display_tag'>".$json_arr[4]['por']."</span>";
        }
        elseif ($json_ar[0]['select_eight'] == $sql_fv_fetch['id'])
        {
          echo "<span id='vehicle_display_tag'>".$json_arr[4]['por']."</span>";
        }

        }
        }
        echo "
           </div>
      ";
    }
  }
  else
  {
    $sql_fv = "SELECT * FROM vw_vehicle_details WHERE (year_of_production BETWEEN '$from' AND '$to') $tov $brand $location%";
    $sql_fv_exec = mysqli_query($conn,$sql_fv);
//die($sql_fv);

  if ($sql_fv_exec)
  {
    while ($sql_fv_fetch = mysqli_fetch_assoc($sql_fv_exec))
    {
                $vehicle_link = 'vehicle_details/'.bin2hex(base64_encode($sql_fv_fetch['id'])).'/'.$sql_fv_fetch['brand'].','.$sql_fv_fetch['model'];
      echo"
      <div  id='vehicle_displayy'>
      <img src='assets/img/CarPhotos/".$sql_fv_fetch['main_photo']."' class='vehicle_display_bottom_img'>
        <a href='$vehicle_link' class='vehicle_display_img'>
          <img src='assets/img/CarPhotos/".$sql_fv_fetch['main_photo']."' style='";
           $link = ROOT_PATH .'/assets/img/CarPhotos/'.$sql_fv_fetch['main_photo'];
          list($width,$height,$type,$attr) = getimagesize($link);
          $aspectRatio = $width/$height;
          if ($aspectRatio >= 1.28 && $aspectRatio <=1.38)
          {
              echo 'height:100%;';
              echo 'width:100%;';
              echo 'object-fit:cover;';
          }
          elseif ($aspectRatio <= 1.28)
          {
            echo 'height:100%;';
          }
          else {
            if ($width > $height)
            {
              //echo 'height:80%;';
            echo 'width:100%;';
            }
            else {
              echo 'height:100%;';
              //echo 'width:80%;';
            }
          }echo " '>
        </a>
        <div class='vehicle_display_description_wrapper'>
          <div class='vehicle_display_description'>
            <h4>".$sql_fv_fetch['brand']." ".substr($sql_fv_fetch['model'],0,12)."</h4>
            <div class='vehicle_display_description_details_grid'>
              <div class='vehicle_display_description_details'>
                <span id='details_heading'>Year</span>
                <span id='details'>".$sql_fv_fetch['year_of_production']."</span>
              </div>
              <div class='vehicle_display_description_details'>
                <span id='details_heading'>Location</span>
                <span id='details'>".$sql_fv_fetch['location_voivodship']."</span>
              </div>";
              if (isset($_SESSION['id']))
              {
                echo "
                <div class='vehicle_display_description_details'>
                  <span id='details_heading'>Date Added</span>
                  <span id='details'>".$sql_fv_fetch['date_added']."</span>
                </div>
                <div class='vehicle_display_description_details'>
                  <span id='details_heading' class='usr_det'>Username</span>
                  ";

              if (isset($_SESSION['id']))
              {
              echo "<span id='details'><a href='".BASE_URL."/".bin2hex(base64_encode($sql_fv_fetch['user_id']))."/".$sql_fv_fetch['username']."'> ".$sql_fv_fetch['username']."</a></span>";
              }

                  echo "
              </div> ";
              }
              echo "
            </div>
          </div>
        </div>
        ";
        $data = file_get_contents(ROOT_PATH .'/app/helpers/api/properties.json');
        $json_arr = json_decode($data, true);
        $curr_date = date('Y-m-d');

        if ($json_arr[4]['highlighted_type'] == "row_1")
        {
          echo "<span id='vehicle_display_tag'>".$json_arr[4]['por']."</span>";
        }
        elseif ($json_arr[4]['highlighted_type'] == "row_2")
        {

          if (($curr_date >= $json_arr[4]['sd']) && ($curr_date <= $json_arr[4]['cd']))
          {
            echo "<span id='vehicle_display_tag'>".$json_arr[4]['por']."</span>";
          }
          else
          {
          echo "<span id='vehicle_display_tag'>".$json_arr[4]['por']."</span>";
          }
        }
        elseif ($json_arr[4]['highlighted_type'] == "row_3")
        {

          if (($curr_date >= $json_arr[4]['sd']) && ($curr_date <= $json_arr[4]['cd']))
          {
            echo "<span id='vehicle_display_tag'>".$json_arr[4]['por']."</span>";
          }
          else
          {
          echo "<span id='vehicle_display_tag'>last added</span>";
          }
        }
        elseif ($json_arr[4]['highlighted_type'] == "row_4")
        {

          if (($curr_date >= $json_arr[4]['sd']) && ($curr_date <= $json_arr[4]['cd']))
          {
            $dat = file_get_contents(ROOT_PATH .'/app/helpers/api/hghProperties.json');
            $json_ar = json_decode($dat, true);

        if ($json_ar[0]['select_one'] == $sql_fv_fetch['id'])
        {
          echo "<span id='vehicle_display_tag'>".$json_arr[4]['por']."</span>";
        }
        elseif ($json_ar[0]['select_two'] == $sql_fv_fetch['id'])
        {
          echo "<span id='vehicle_display_tag'>".$json_arr[4]['por']."</span>";
        }
        elseif ($json_ar[0]['select_three'] == $sql_fv_fetch['id'])
        {
          echo "<span id='vehicle_display_tag'>".$json_arr[4]['por']."</span>";
        }
        elseif ($json_ar[0]['select_four'] == $sql_fv_fetch['id'])
        {
          echo "<span id='vehicle_display_tag'>".$json_arr[4]['por']."</span>";
        }
        elseif ($json_ar[0]['select_five'] == $sql_fv_fetch['id'])
        {
          echo "<span id='vehicle_display_tag'>".$json_arr[4]['por']."</span>";
        }
        elseif ($json_ar[0]['select_six'] == $sql_fv_fetch['id'])
        {
          echo "<span id='vehicle_display_tag'>".$json_arr[4]['por']."</span>";
        }
        elseif ($json_ar[0]['select_seven'] == $sql_fv_fetch['id'])
        {
          echo "<span id='vehicle_display_tag'>".$json_arr[4]['por']."</span>";
        }
        elseif ($json_ar[0]['select_eight'] == $sql_fv_fetch['id'])
        {
          echo "<span id='vehicle_display_tag'>".$json_arr[4]['por']."</span>";
        }

        }
        }
        echo "
           </div>
      ";
    }
  }
  }

  }


}



function HomepageSearchEngine()
{
  global $conn;


      if (!empty($_POST['flt_typ_vehicle_order']))
      {
        $order = 'ORDER BY ';
        $tov_order = $_POST['flt_typ_vehicle_order'];
        $tov = "type_of_vehicle  $tov_order,";
      }
      else
      {
          $tov = '';
      }

      if (!empty($_POST['flt_brand_order']))
      {
        $order = 'ORDER BY ';
        $brand_order = $_POST['flt_brand_order'];
        $brand = "brand $brand_order,";
      }
      else
      {
          $brand = '';
      }

      if (!empty($_POST['flt_date_added_order']))
      {
        $order = 'ORDER BY ';
        $date_added_order = $_POST['flt_date_added_order'];
        $date_added = "date_added $date_added_order,";
      }
      else
      {
          $date_added = '';
      }

      if (!empty($_POST['flt_year_of_production_order']))
      {
        $order = 'ORDER BY ';
        $year_of_production_order = $_POST['flt_year_of_production_order'];
        $year_of_production = "year_of_production $year_of_production_order,";
      }
      else
      {
          $year_of_production = '';
      }

      if (!empty($_POST['flt_location_order']))
      {
        $order = 'ORDER BY ';
        $location_order = $_POST['flt_location_order'];
        $location = "location_voivodship $location_order,";
      }
      else
      {
          $location = '';
      }

      if (!empty($_POST['flt_username_order']))
      {
        $order = 'ORDER BY ';
        $username_order = $_POST['flt_username_order'];
        $username = "username $username_order,";
      }
      else
      {
          $username = '';
      }




      if (!empty($_POST['flt_typ_vehicle']))
      {
        $tov_filter_keyword = $_POST['flt_typ_vehicle'];
        $tov_filter = "AND type_of_vehicle LIKE '%$tov_filter_keyword%'";
      }
      else
      {
          $tov_filter = '';
      }

      if (!empty($_POST['flt_brand']))
      {
        $brand_filter_keyword = $_POST['flt_brand'];
        $brand_filter = "AND brand LIKE '%$brand_filter_keyword%'";
      }
      else
      {
          $brand_filter = '';
      }


      if (!empty($_POST['flt_to']) && !empty($_POST['flt_from']))
      {
        $to_filter_keyword =  trim($_POST['flt_to']);
        $from_filter_keyword =  trim($_POST['flt_from']);
        $from_to_filter = "AND year_of_production BETWEEN $from_filter_keyword AND $to_filter_keyword";
      }
      else
      {
        $from_to_filter = '';
      }

      if (!empty($_POST['flt_location']))
      {
        $location_filter_keyword = $_POST['flt_location'];
        $location_filter = "AND location_voivodship LIKE '%$location_filter_keyword%'";
      }
      else
      {
          $location_filter = '';
      }


      $data = file_get_contents(ROOT_PATH .'/app/helpers/api/properties.json');
        $json_arr = json_decode($data, true);
        if (isset($json_arr))
        {
          $end = ($json_arr[7]['Value']);
        }
        else {
            $end = 4;
        }

  if(empty($_POST['search']) AND !empty($_POST['flt_typ_vehicle_order']) ||
!empty($_POST['flt_brand_order']) ||
!empty($_POST['flt_date_added_order']) ||
!empty($_POST['flt_year_of_production_order']) ||
!empty($_POST['flt_location_order']) ||
!empty($_POST['flt_username_order']))
  {
    $order = 'ORDER BY ';
    $search = "WHERE verified = 1";
  }
  elseif (!empty($_POST['search']) AND !empty($_POST['flt_typ_vehicle_order']) ||
!empty($_POST['flt_brand_order']) ||
!empty($_POST['flt_date_added_order']) ||
!empty($_POST['flt_year_of_production_order']) ||
!empty($_POST['flt_location_order']) ||
!empty($_POST['flt_username_order']))
  {
    $order = 'ORDER BY ';
    $keyword =  trim($_POST['search']);
    $search = "WHERE (type_of_vehicle LIKE '%$keyword%') OR (brand LIKE '%$keyword%') OR (model LIKE '%$keyword%') OR (fuel_type LIKE '%$keyword%') OR (transmission LIKE '%$keyword%') OR (drive LIKE '%$keyword%') OR (country_of_origin LIKE '%$keyword%') OR (location_voivodship LIKE '%$keyword%') OR (location_district LIKE '%$keyword%')";
  }
  else
  {
    $order = '';
    $keyword =  trim($_POST['search']);
    $search = "WHERE (type_of_vehicle LIKE '%$keyword%') OR (brand LIKE '%$keyword%') OR (model LIKE '%$keyword%') OR (fuel_type LIKE '%$keyword%') OR (transmission LIKE '%$keyword%') OR (drive LIKE '%$keyword%') OR (country_of_origin LIKE '%$keyword%') OR (location_voivodship LIKE '%$keyword%') OR (location_district LIKE '%$keyword%')";
  }

  $sql_fv = "SELECT * FROM vw_vehicle_details $search $tov_filter $from_to_filter $brand_filter $location_filter $order $tov $year_of_production $location $date_added $username $brand sa LIMIT 0,$end";
  $sql_fv = str_replace(",      sa","",$sql_fv);
  $sql_fv = str_replace(",     sa","",$sql_fv);
  $sql_fv = str_replace(",    sa","",$sql_fv);
  $sql_fv = str_replace(",   sa","",$sql_fv);
  $sql_fv = str_replace(",  sa","",$sql_fv);
  $sql_fv = str_replace(", sa","",$sql_fv);
  $sql_fv = str_replace(",sa","",$sql_fv);
  $sql_fv = str_replace("sa","",$sql_fv);
   //$sql_fv = "SELECT * FROM vw_vehicle_details $search $order $tov $year_of_production $location $date_added $username $brand";
  //echo $sql_fv;
    $sql_fv_exec = mysqli_query($conn,$sql_fv);
  //die($sql_fv);
  if ($sql_fv_exec)
  {
    while ($sql_fv_fetch = mysqli_fetch_assoc($sql_fv_exec))
    {
          $vehicle_link = 'vehicle_details/'.bin2hex(base64_encode($sql_fv_fetch['id'])).'/'.$sql_fv_fetch['brand'].','.$sql_fv_fetch['model'];
      echo"
      <div id='vehicle_displayy'>
        <a href='$vehicle_link' class='vehicle_display_img'>
          <img src='assets/img/CarPhotos/".$sql_fv_fetch['main_photo']."' style='";
           $link = ROOT_PATH .'/assets/img/CarPhotos/'.$sql_fv_fetch['main_photo'];
          list($width,$height,$type,$attr) = getimagesize($link);
          $aspectRatio = $width/$height;
          if ($aspectRatio >= 1.28 && $aspectRatio <=1.38)
          {
              echo 'height:100%;';
              echo 'width:100%;';
              echo 'object-fit:cover;';
          }
          elseif ($aspectRatio <= 1.28)
          {
            echo 'height:100%;';
          }
          else {
            if ($width > $height)
            {
              //echo 'height:80%;';
            echo 'width:100%;';
            }
            else {
              echo 'height:100%;';
              //echo 'width:80%;';
            }
          }echo " '>
        </a>
        <div class='vehicle_display_description_wrapper'>
          <div class='vehicle_display_description'>
            <h4>".$sql_fv_fetch['brand']." ".substr($sql_fv_fetch['model'],0,12)."</h4>
            <div class='vehicle_display_description_details_grid'>
              <div class='vehicle_display_description_details'>
                <span id='details_heading'>Year</span>
                <span id='details'>".$sql_fv_fetch['year_of_production']."</span>
              </div>
              <div class='vehicle_display_description_details'>
                <span id='details_heading'>Location</span>
                <span id='details'>".$sql_fv_fetch['location_voivodship']."</span>
              </div>
              ";
              if (isset($_SESSION['id']))
              {
                echo "
                <div class='vehicle_display_description_details'>
                  <span id='details_heading'>Date Added</span>
                  <span id='details'>".$sql_fv_fetch['date_added']."</span>
                </div>
                <div class='vehicle_display_description_details'>
                  <span id='details_heading' class='usr_det'>Username</span>
                  ";

              if (isset($_SESSION['id']))
              {
              echo "<span id='details'><a href='".BASE_URL."/".bin2hex(base64_encode($sql_fv_fetch['user_id']))."/".$sql_fv_fetch['username']."'> ".$sql_fv_fetch['username']."</a></span>";
              }

                  echo "
              </div> ";
              }
              echo "

            </div>
          </div>
        </div>
        ";
        $data = file_get_contents(ROOT_PATH .'/app/helpers/api/properties.json');
        $json_arr = json_decode($data, true);
        $curr_date = date('Y-m-d');

        if ($json_arr[4]['highlighted_type'] == "row_1")
        {
          echo "<span id='vehicle_display_tag'>".$json_arr[4]['por']."</span>";
        }
        elseif ($json_arr[4]['highlighted_type'] == "row_2")
        {

          if (($curr_date >= $json_arr[4]['sd']) && ($curr_date <= $json_arr[4]['cd']))
          {
            echo "<span id='vehicle_display_tag'>".$json_arr[4]['por']."</span>";
          }
          else
          {
          echo "<span id='vehicle_display_tag'>".$json_arr[4]['por']."</span>";
          }
        }
        elseif ($json_arr[4]['highlighted_type'] == "row_3")
        {

          if (($curr_date >= $json_arr[4]['sd']) && ($curr_date <= $json_arr[4]['cd']))
          {
            echo "<span id='vehicle_display_tag'>".$json_arr[4]['por']."</span>";
          }
          else
          {
          echo "<span id='vehicle_display_tag'>last added</span>";
          }
        }
        elseif ($json_arr[4]['highlighted_type'] == "row_4")
        {

          if (($curr_date >= $json_arr[4]['sd']) && ($curr_date <= $json_arr[4]['cd']))
          {
            $dat = file_get_contents(ROOT_PATH .'/app/helpers/api/hghProperties.json');
            $json_ar = json_decode($dat, true);

        if ($json_ar[0]['select_one'] == $sql_fv_fetch['id'])
        {
          echo "<span id='vehicle_display_tag'>".$json_arr[4]['por']."</span>";
        }
        elseif ($json_ar[0]['select_two'] == $sql_fv_fetch['id'])
        {
          echo "<span id='vehicle_display_tag'>".$json_arr[4]['por']."</span>";
        }
        elseif ($json_ar[0]['select_three'] == $sql_fv_fetch['id'])
        {
          echo "<span id='vehicle_display_tag'>".$json_arr[4]['por']."</span>";
        }
        elseif ($json_ar[0]['select_four'] == $sql_fv_fetch['id'])
        {
          echo "<span id='vehicle_display_tag'>".$json_arr[4]['por']."</span>";
        }
        elseif ($json_ar[0]['select_five'] == $sql_fv_fetch['id'])
        {
          echo "<span id='vehicle_display_tag'>".$json_arr[4]['por']."</span>";
        }
        elseif ($json_ar[0]['select_six'] == $sql_fv_fetch['id'])
        {
          echo "<span id='vehicle_display_tag'>".$json_arr[4]['por']."</span>";
        }
        elseif ($json_ar[0]['select_seven'] == $sql_fv_fetch['id'])
        {
          echo "<span id='vehicle_display_tag'>".$json_arr[4]['por']."</span>";
        }
        elseif ($json_ar[0]['select_eight'] == $sql_fv_fetch['id'])
        {
          echo "<span id='vehicle_display_tag'>".$json_arr[4]['por']."</span>";
        }

        }
        }
        echo "
    </div>
      ";
    }
  }
  else
  {
    echo " ";
  }
}






function VehicleFilterResults()
{
  global $conn;

  if (isset($_GET['u_id']))
  {
    $u_idd = base64_decode(hex2bin($_GET['u_id']));
    $sql_fv = "SELECT * FROM vw_vehicle_details WHERE user_id = '$u_idd' ORDER BY date_added DESC";
    $sql_fv_exec = mysqli_query($conn,$sql_fv);

  if ($sql_fv_exec)
  {
    while ($sql_fv_fetch = mysqli_fetch_assoc($sql_fv_exec))
    {
      $vehicle_link = 'vehicle_details/'.bin2hex(base64_encode($sql_fv_fetch['id'])).'/'.$sql_fv_fetch['brand'].','.$sql_fv_fetch['model'];
      echo"
      <div id='vehicle_displayy'>
      <img src='assets/img/CarPhotos/".$sql_fv_fetch['main_photo']."' class='vehicle_display_bottom_img'>
        <a href='$vehicle_link' class='vehicle_display_img'>
          <img src='assets/img/CarPhotos/".$sql_fv_fetch['main_photo']."' style='";
           $link = ROOT_PATH .'/assets/img/CarPhotos/'.$sql_fv_fetch['main_photo'];
          list($width,$height,$type,$attr) = getimagesize($link); $aspectRatio = $width/$height;
          if ($aspectRatio >= 1.28 && $aspectRatio <=1.38)
          {
              echo 'height:100%;';
              echo 'width:100%;';
              echo 'object-fit:cover;';
          }
          elseif ($aspectRatio <= 1.28)
          {
            echo 'height:100%;';
          }
          else {
            if ($width > $height)
            {
              //echo 'height:80%;';
            echo 'width:100%;';
            }
            else {
              echo 'height:100%;';
              //echo 'width:80%;';
            }
          }echo " '>
        </a>
        <div class='vehicle_display_description_wrapper'>
          <div class='vehicle_display_description'>
            <h4>".$sql_fv_fetch['brand']." ".substr($sql_fv_fetch['model'],0,12)."</h4>
            <div class='vehicle_display_description_details_grid'>
              <div class='vehicle_display_description_details'>
                <span id='details_heading'>Year</span>
                <span id='details'>".$sql_fv_fetch['year_of_production']."</span>
              </div>
              <div class='vehicle_display_description_details'>
                <span id='details_heading'>Location</span>
                <span id='details'>".$sql_fv_fetch['location_voivodship']."</span>
              </div>
              ";
              if (isset($_SESSION['id']))
              {
                echo "
                <div class='vehicle_display_description_details'>
                  <span id='details_heading'>Date Added</span>
                  <span id='details'>".$sql_fv_fetch['date_added']."</span>
                </div>
                <div class='vehicle_display_description_details'>
                  <span id='details_heading' class='usr_det'>Username</span>
                  ";

              if (isset($_SESSION['id']))
              {
              echo "<span id='details'><a href='".BASE_URL."/".bin2hex(base64_encode($sql_fv_fetch['user_id']))."/".$sql_fv_fetch['username']."'> ".$sql_fv_fetch['username']."</a></span>";
              }

                  echo "
                </div> ";
              }
              echo "
            </div>
          </div>
        </div>
        ";

          $data = file_get_contents(ROOT_PATH .'/app/helpers/api/properties.json');
          $json_arr = json_decode($data, true);

          if ($json_arr[4]['highlighted_type'] == "row_1")
          {
            echo "<span id='vehicle_display_tag'>".$json_arr[4]['por']."</span>";
          }
          elseif ($json_arr[4]['highlighted_type'] == "row_2")
          {

            if (($curr_date >= $json_arr[4]['sd']) && ($curr_date <= $json_arr[4]['cd']))
            {
              echo "<span id='vehicle_display_tag'>".$json_arr[4]['por']."</span>";
            }
            else
            {
            echo "<span id='vehicle_display_tag'>".$json_arr[4]['por']."</span>";
            }
          }
          elseif ($json_arr[4]['highlighted_type'] == "row_3")
          {

            if (($curr_date >= $json_arr[4]['sd']) && ($curr_date <= $json_arr[4]['cd']))
            {
              echo "<span id='vehicle_display_tag'>".$json_arr[4]['por']."</span>";
            }
            else
            {
            echo "<span id='vehicle_display_tag'>last added</span>";
            }
          }
          elseif ($json_arr[4]['highlighted_type'] == "row_4")
          {

            if (($curr_date >= $json_arr[4]['sd']) && ($curr_date <= $json_arr[4]['cd']))
            {
              $dat = file_get_contents(ROOT_PATH .'/app/helpers/api/hghProperties.json');
              $json_ar = json_decode($dat, true);
              $curr_date = date('Y-m-d');

          if ($json_ar[0]['select_one'] == $sql_fv_fetch['id'])
          {
            echo "<span id='vehicle_display_tag'>".$json_arr[4]['por']."</span>";
          }
          elseif ($json_ar[0]['select_two'] == $sql_fv_fetch['id'])
          {
            echo "<span id='vehicle_display_tag'>".$json_arr[4]['por']."</span>";
          }
          elseif ($json_ar[0]['select_three'] == $sql_fv_fetch['id'])
          {
            echo "<span id='vehicle_display_tag'>".$json_arr[4]['por']."</span>";
          }
          elseif ($json_ar[0]['select_four'] == $sql_fv_fetch['id'])
          {
            echo "<span id='vehicle_display_tag'>".$json_arr[4]['por']."</span>";
          }
          elseif ($json_ar[0]['select_five'] == $sql_fv_fetch['id'])
          {
            echo "<span id='vehicle_display_tag'>".$json_arr[4]['por']."</span>";
          }
          elseif ($json_ar[0]['select_six'] == $sql_fv_fetch['id'])
          {
            echo "<span id='vehicle_display_tag'>".$json_arr[4]['por']."</span>";
          }
          elseif ($json_ar[0]['select_seven'] == $sql_fv_fetch['id'])
          {
            echo "<span id='vehicle_display_tag'>".$json_arr[4]['por']."</span>";
          }
          elseif ($json_ar[0]['select_eight'] == $sql_fv_fetch['id'])
          {
            echo "<span id='vehicle_display_tag'>".$json_arr[4]['por']."</span>";
          }


        }

        }
        echo "
      </div>      ";
    }
  }
  else
  {
    echo " ";
  }

  }
  else {
    $data = file_get_contents(ROOT_PATH .'/app/helpers/api/properties.json');
      $json_arr = json_decode($data, true);
      if (isset($json_arr))
      {
        $end = ($json_arr[7]['Value']);
      }
      else {
          $end = 4;
      }

    $sql_fv = "SELECT * FROM vw_vehicle_details ORDER BY date_added DESC LIMIT 0,$end ";
    $sql_fv_exec = mysqli_query($conn,$sql_fv);

  if ($sql_fv_exec)
  {
    $a = 1;


    while($sql_fv_fetch = mysqli_fetch_assoc($sql_fv_exec))
    {
            $vehicle_link = 'vehicle_details/'.bin2hex(base64_encode($sql_fv_fetch['id'])).'/'.$sql_fv_fetch['brand'].','.$sql_fv_fetch['model'];
  //die($locationn);
      echo"
      <div id='vehicle_displayy'>
      <img src='assets/img/CarPhotos/".$sql_fv_fetch['main_photo']."' class='vehicle_display_bottom_img'>
        <a href='$vehicle_link' class='vehicle_display_img'>

          <img src='assets/img/CarPhotos/".$sql_fv_fetch['main_photo']."' style='";
           $link = ROOT_PATH .'/assets/img/CarPhotos/'.$sql_fv_fetch['main_photo'];
          list($width,$height,$type,$attr) = getimagesize($link); $aspectRatio = $width/$height;

            if ($aspectRatio >= 1.28 && $aspectRatio <=1.38)
            {
                echo 'height:100%;';
                echo 'width:100%;';
                echo 'object-fit:cover;';
            }
            elseif ($aspectRatio <= 1.28)
            {
              echo 'height:100%;';
            }
            else {
              if ($width > $height)
              {
                //echo 'height:80%;';
              echo 'width:100%;';
              }
              else {
                echo 'height:100%;';
              //  echo 'width:80%;';
              }
            }echo " '>
        </a>
        <div class='vehicle_display_description_wrapper'>
          <div class='vehicle_display_description'>
            <h4>".$sql_fv_fetch['brand']." ".substr($sql_fv_fetch['model'],0,12)."</h4>
            <div class='vehicle_display_description_details_grid'>
              <div class='vehicle_display_description_details'>
                <span id='details_heading'>Year</span>
                <span id='details'>".$sql_fv_fetch['year_of_production']."</span>
              </div>
              <div class='vehicle_display_description_details'>
                <span id='details_heading'>Location</span>
                <span id='details'>".$sql_fv_fetch['location_voivodship']."</span>
              </div>
              ";
              if (isset($_SESSION['id']))
              {
                echo "
                <div class='vehicle_display_description_details'>
                  <span id='details_heading'>Date Added</span>
                  <span id='details'>".$sql_fv_fetch['date_added']."</span>
                </div>
                <div class='vehicle_display_description_details'>
                  <span id='details_heading' class='usr_det'>Username</span>
                  ";

              if (isset($_SESSION['id']))
              {
              echo "<span style='flex:5;' id='details'><a href='".BASE_URL."/".bin2hex(base64_encode($sql_fv_fetch['user_id']))."/".$sql_fv_fetch['username']."'> ".$sql_fv_fetch['username']."</a></span>";
              }

                  echo "
                </div> ";
              }
              echo "
            </div>

          </div>
        </div>
";

  $data = file_get_contents(ROOT_PATH .'/app/helpers/api/properties.json');
  $json_arr = json_decode($data, true);
  $curr_date = date('Y-m-d');

  if ($json_arr[4]['highlighted_type'] == "row_1")
  {
    echo "<span id='vehicle_display_tag'>".$json_arr[4]['por']."</span>";
  }
  elseif ($json_arr[4]['highlighted_type'] == "row_2")
  {

    if (($curr_date >= $json_arr[4]['sd']) && ($curr_date <= $json_arr[4]['cd']))
    {
      echo "<span id='vehicle_display_tag'>".$json_arr[4]['por']."</span>";
    }
    else
    {
    echo "<span id='vehicle_display_tag'>".$json_arr[4]['por']."</span>";
    }
  }
  elseif ($json_arr[4]['highlighted_type'] == "row_3")
  {

    if (($curr_date >= $json_arr[4]['sd']) && ($curr_date <= $json_arr[4]['cd']))
    {
      echo "<span id='vehicle_display_tag'>".$json_arr[4]['por']."</span>";
    }
    else
    {
    echo "<span id='vehicle_display_tag'>last added</span>";
    }
  }
  elseif ($json_arr[4]['highlighted_type'] == "row_4")
  {

    if (($curr_date >= $json_arr[4]['sd']) && ($curr_date <= $json_arr[4]['cd']))
    {
      $dat = file_get_contents(ROOT_PATH .'/app/helpers/api/hghProperties.json');
      $json_ar = json_decode($dat, true);
      $curr_date = date('Y-m-d');

  if ($json_ar[0]['select_one'] == $sql_fv_fetch['id'])
  {
    echo "<span id='vehicle_display_tag'>".$json_arr[4]['por']."</span>";
  }
  elseif ($json_ar[0]['select_two'] == $sql_fv_fetch['id'])
  {
    echo "<span id='vehicle_display_tag'>".$json_arr[4]['por']."</span>";
  }
  elseif ($json_ar[0]['select_three'] == $sql_fv_fetch['id'])
  {
    echo "<span id='vehicle_display_tag'>".$json_arr[4]['por']."</span>";
  }
  elseif ($json_ar[0]['select_four'] == $sql_fv_fetch['id'])
  {
    echo "<span id='vehicle_display_tag'>".$json_arr[4]['por']."</span>";
  }
  elseif ($json_ar[0]['select_five'] == $sql_fv_fetch['id'])
  {
    echo "<span id='vehicle_display_tag'>".$json_arr[4]['por']."</span>";
  }
  elseif ($json_ar[0]['select_six'] == $sql_fv_fetch['id'])
  {
    echo "<span id='vehicle_display_tag'>".$json_arr[4]['por']."</span>";
  }
  elseif ($json_ar[0]['select_seven'] == $sql_fv_fetch['id'])
  {
    echo "<span id='vehicle_display_tag'>".$json_arr[4]['por']."</span>";
  }
  elseif ($json_ar[0]['select_eight'] == $sql_fv_fetch['id'])
  {
    echo "<span id='vehicle_display_tag'>".$json_arr[4]['por']."</span>";
  }



}
}
/*
$data = file_get_contents(ROOT_PATH .'/app/helpers/api/properties.json');
$json_arr = json_decode($data, true);
$days_left = ($json_arr[4]['cd'] - $json_arr[4]['sd']) / 86400;
if ($days_left >= 1 && !empty($json_arr[4]['cd']) || $json_arr[4]['sd'])
{
  echo "<span id='vehicle_display_tag'>".$json_arr[4]['por']."</span>";
}
else
{
echo "<span id='vehicle_display_tag'>".$json_arr[4]['por']."</span>";
}*/

echo "

        </div>";
    }
  }
  else
  {
    echo " ";
  }

  }


}



function VehicleSpecs()
{
  global $conn;

  $vehicle_id = base64_decode(hex2bin($_GET['id']));
  $sql_vs = "SELECT * FROM vw_vehicle_details WHERE id = $vehicle_id";
  $sql_vs_exec = mysqli_query($conn,$sql_vs);


  if ($sql_vs_exec)
  {
    while ($sql_vs_fetch = mysqli_fetch_assoc($sql_vs_exec))
    {

  echo "
  <h3>".$sql_vs_fetch['year_of_production']." ".$sql_vs_fetch['brand']."</h3>
  <div class='car_description_details_text'>
  <a>Engine capacity in cm³</a><a>".$sql_vs_fetch['engine_capacity']."</a>
  <a>Engine power in kW</a> <a>".$sql_vs_fetch['engine_power']."</a>
  <a>Fuel Type</a> <a>".$sql_vs_fetch['fuel_type']."</a>
  <a>Transmission</a> <a>".$sql_vs_fetch['transmission']."</a>
  <a>Drive</a> <a>".$sql_vs_fetch['drive']."</a>
  <a>Max speed in km/h</a> <a>".$sql_vs_fetch['max_speed']."</a>
  <a>Number of doors</a><a>".$sql_vs_fetch['no_of_doors']."</a>
  <a>Number of Seats</a><a>".$sql_vs_fetch['no_of_seats']."</a>
  <a>Mileage in km</a><a>".$sql_vs_fetch['mileage']."</a>
  <a>Contry of origin</a><a>".$sql_vs_fetch['country_of_origin']."</a>
";
if (isset($_SESSION['id']))
{
  echo "
  <a>Estimated value in $</a><a>".$sql_vs_fetch['estimated_value']."</a>
  <a>Year of purchase by current owner</a><a>".$sql_vs_fetch['y_o_p_b_c_o']."</a>
  <a>Parking place - voivodship</a><a>".$sql_vs_fetch['location_voivodship']."</a>
  <a>Parking place - poviat</a><a>".$sql_vs_fetch['location_district']."</a>
  <a>Author</a><a href='".BASE_URL."/".bin2hex(base64_encode($sql_vs_fetch['user_id']))."/".$sql_vs_fetch['username']."'><i class='fas fa-user'></i>  ".$sql_vs_fetch['username']."</a>
  <a>Date added</a><a>".$sql_vs_fetch['date_added']."</a>
  <a>Last modified</a><a>".$sql_vs_fetch['last_modification']."</a>
  ";
}
echo "
  </div>

  ";
}
}


}





function VehicleDescription()
{
  global $conn;

  $vehicle_id = base64_decode(hex2bin($_GET['id']));
  $sql_vd = "SELECT * FROM vw_vehicle_details WHERE id = $vehicle_id";
  $sql_vd_exec = mysqli_query($conn,$sql_vd);


  if ($sql_vd_exec)
  {
    while ($sql_vd_fetch = mysqli_fetch_assoc($sql_vd_exec))
    {

  echo "
    <h4>Description of vehicle characteristics, equipment and performance</h4>
    <p>
".$sql_vd_fetch['d_o_v_c']."
  </p>
  <h4>History and origin of the vehicle</h4>
  <p>
".$sql_vd_fetch['h_a_o_o_v']."
</p>
  <h4>Problems with the vehicle, repairs, maintenance</h4>
  <p>
  ".$sql_vd_fetch['problems_with_vehicle']."
</p>
";
}
}
else {
  echo "
  <p>
    <h4>Description of vehicle characteristics, equipment and performance</h4>


  <h4>History and origin of the vehicle</h4>


  <h4>Problems with the vehicle, repairs, maintenance</h4>
  </p>
";
}


}







function VehicleAnnouncement()
{
  global $conn;

  $vehicle_id = base64_decode(hex2bin($_GET['id']));
  $sql_va = "SELECT * FROM vw_vehicle_details WHERE id = $vehicle_id";
  $sql_va_exec = mysqli_query($conn,$sql_va);


  if ($sql_va_exec)
  {

    while ($sql_va_fetch = mysqli_fetch_assoc($sql_va_exec))
    {
      $date1 = $date1 = date('Y-m-d');
      $date2 = $sql_va_fetch['announcement_expire_date'];

      $diff = strtotime($date2) - strtotime($date1);

      $days = $diff / (60*60*24);
      if ($days > 0)
      {
          echo "
          <div class='car_announcement'>
          <h4>Announcements</h4>
          <p>".$sql_va_fetch['announcement']."</p>
          </div>
        ";
      }
}

}


}









function Brand()
{
  global $conn;
  $sql_b = "SELECT * FROM vw_select_list";
  $sql_b_exec = mysqli_query($conn,$sql_b);

  if ($sql_b_exec)
  {
    while ($sql_b_fetch = mysqli_fetch_assoc($sql_b_exec))
    {
      echo "<option vlaue='".$sql_b_fetch['brand']."'>".$sql_b_fetch['brand']."</option>";
    }
  }
}


function FuelType()
{
  global $conn;
  $sql_ft = "SELECT * FROM vw_select_list";
  $sql_ft_exec = mysqli_query($conn,$sql_ft);

  if ($sql_ft_exec)
  {
    while ($sql_ft_fetch = mysqli_fetch_assoc($sql_ft_exec))
    {
      echo "<option vlaue='".$sql_ft_fetch['fuel_type']."'>".$sql_ft_fetch['fuel_type']."</option>";
    }
  }
}



function Model()
{
  global $conn;
  $sql_m = "SELECT * FROM vw_select_list";
  $sql_m_exec = mysqli_query($conn,$sql_m);

  if ($sql_m_exec)
  {
    while ($sql_m_fetch = mysqli_fetch_assoc($sql_m_exec))
    {
      echo "<option vlaue='".$sql_m_fetch['model']."'>".$sql_m_fetch['model']."</option>";
    }
  }
}


function NoofDoors()
{
  global $conn;
  $sql_nd = "SELECT * FROM vw_select_list";
  $sql_nd_exec = mysqli_query($conn,$sql_nd);

  if ($sql_nd_exec)
  {
    while ($sql_nd_fetch = mysqli_fetch_assoc($sql_nd_exec))
    {
      echo "<option vlaue='".$sql_nd_fetch['no_of_doors']."'>".$sql_nd_fetch['no_of_doors']."</option>";
    }
  }
}



function NoofSeats()
{
  global $conn;
  $sql_ns = "SELECT * FROM vw_select_list";
  $sql_ns_exec = mysqli_query($conn,$sql_ns);

  if ($sql_ns_exec)
  {
    while ($sql_ns_fetch = mysqli_fetch_assoc($sql_ns_exec))
    {
      echo "<option vlaue='".$sql_ns_fetch['no_of_seats']."'>".$sql_ns_fetch['no_of_seats']."</option>";
    }
  }
}





function TypeOfVehicle()
{
  global $conn;
  $sql_tov = "SELECT * FROM vw_select_list";
  $sql_tov_exec = mysqli_query($conn,$sql_tov);

  if ($sql_tov_exec)
  {
    while ($sql_tov_fetch = mysqli_fetch_assoc($sql_tov_exec))
    {
      echo "<option vlaue='".$sql_tov_fetch['type_of_vehicle']."'>".$sql_tov_fetch['type_of_vehicle']."</option>";
    }
  }
}




function Transmission()
{
  global $conn;
  $sql_tm = "SELECT * FROM vw_select_list";
  $sql_tm_exec = mysqli_query($conn,$sql_tm);

  if ($sql_tm_exec)
  {
    while ($sql_tm_fetch = mysqli_fetch_assoc($sql_tm_exec))
    {
      echo "<option vlaue='".$sql_tm_fetch['transmission']."'>".$sql_tm_fetch['transmission']."</option>";
    }
  }
}



function Location()
{
  global $conn;
  $sql_ld = "SELECT * FROM vw_select_list";
  $sql_ld_exec = mysqli_query($conn,$sql_ld);

  if ($sql_ld_exec)
  {
    while ($sql_ld_fetch = mysqli_fetch_assoc($sql_ld_exec))
    {
      echo "<option vlaue='".$sql_ld_fetch['location']."'>".$sql_ld_fetch['location']."</option>";
    }
  }
}



function Drive()
{
  global $conn;
  $sql_d = "SELECT * FROM vw_select_list";
  $sql_d_exec = mysqli_query($conn,$sql_d);

  if ($sql_d_exec)
  {
    while ($sql_d_fetch = mysqli_fetch_assoc($sql_d_exec))
    {
      echo "<option vlaue='".$sql_d_fetch['drive']."'>".$sql_d_fetch['drive']."</option>";
    }
  }
}




function GalleryThumbnail()
{
  global $conn;
  $idd = base64_decode(hex2bin($_GET['id']));
  $sql_d = "SELECT * FROM vw_vehicle_details WHERE id = '$idd'";
  $sql_d_exec = mysqli_query($conn,$sql_d);
  $sql_d_fetch = mysqli_fetch_assoc($sql_d_exec);
  if ($sql_d_exec && $sql_d_fetch)
  {
  echo "
  <div id='slider_www' style=''>
      <div id='ninja-slider' style='float:left;'>
          <div class='slider-inner'>
              <ul>";
              if(!empty($sql_d_fetch['main_photo']))
              {
              echo "
              <li>
                <a class='ns-img' href='".BASE_URL."/assets/img/CarPhotos/".$sql_d_fetch['main_photo']."'></a>";
                if (!empty($sql_d_fetch['caption_main_photo']))
                {
                echo "  <h3 style='height:5vh;line-height:5vh;background:rgba(0,0,0,0.8);position:absolute;color:white;bottom:0px;right:0px;left:0px;text-align:center;'>".$sql_d_fetch['caption_main_photo']."</h3>";
                }
                echo "
              </li>
              ";
              }


              if(!empty($sql_d_fetch['photo_one']))
              {
              echo "
              <li>
                <a class='ns-img' href='".BASE_URL."/assets/img/CarPhotos/".$sql_d_fetch['photo_one']."'></a>";
                if (!empty($sql_d_fetch['caption_photo_one']))
                {
                echo "  <h3 style='height:5vh;line-height:5vh;background:rgba(0,0,0,0.8);position:absolute;color:white;bottom:0px;right:0px;left:0px;text-align:center;'>".$sql_d_fetch['caption_photo_one']."</h3>";
                }
                echo "
              </li>
              ";
              }


              if(!empty($sql_d_fetch['photo_two']))
              {
              echo "
              <li>
                <a class='ns-img' href='".BASE_URL."/assets/img/CarPhotos/".$sql_d_fetch['photo_two']."'></a>";
                if (!empty($sql_d_fetch['caption_photo_two']))
                {
                echo "  <h3 style='height:5vh;line-height:5vh;background:rgba(0,0,0,0.8);position:absolute;color:white;bottom:0px;right:0px;left:0px;text-align:center;'>".$sql_d_fetch['caption_photo_two']."</h3>";
                }
                echo "
              </li>
              ";
              }


              if(!empty($sql_d_fetch['photo_three']))
              {
              echo "
              <li>
                <a class='ns-img' href='".BASE_URL."/assets/img/CarPhotos/".$sql_d_fetch['photo_three']."'></a>";
                if (!empty($sql_d_fetch['caption_photo_three']))
                {
                echo "  <h3 style='height:5vh;line-height:5vh;background:rgba(0,0,0,0.8);position:absolute;color:white;bottom:0px;right:0px;left:0px;text-align:center;'>".$sql_d_fetch['caption_photo_three']."</h3>";
                }
                echo "
              </li>
              ";
              }


              if(!empty($sql_d_fetch['photo_four']))
              {
              echo "
              <li>
                <a class='ns-img' href='".BASE_URL."/assets/img/CarPhotos/".$sql_d_fetch['photo_four']."'></a>";
                if (!empty($sql_d_fetch['caption_photo_four']))
                {
                echo "  <h3 style='height:5vh;line-height:5vh;background:rgba(0,0,0,0.8);position:absolute;color:white;bottom:0px;right:0px;left:0px;text-align:center;'>".$sql_d_fetch['caption_photo_four']."</h3>";
                }
                echo "
              </li>
              ";
              }


              if(!empty($sql_d_fetch['photo_five']))
              {
              echo "
              <li>
                <a class='ns-img' href='".BASE_URL."/assets/img/CarPhotos/".$sql_d_fetch['photo_five']."'></a>";
                if (!empty($sql_d_fetch['caption_photo_five']))
                {
                echo "  <h3 style='height:5vh;line-height:5vh;background:rgba(0,0,0,0.8);position:absolute;color:white;bottom:0px;right:0px;left:0px;text-align:center;'>".$sql_d_fetch['caption_photo_five']."</h3>";
                }
                echo "
              </li>
              ";
              }


              if(!empty($sql_d_fetch['photo_six']))
              {
              echo "
              <li>
                <a class='ns-img' href='".BASE_URL."/assets/img/CarPhotos/".$sql_d_fetch['photo_six']."'></a>";
                if (!empty($sql_d_fetch['caption_photo_six']))
                {
                echo "  <h3 style='height:5vh;line-height:5vh;background:rgba(0,0,0,0.8);position:absolute;color:white;bottom:0px;right:0px;left:0px;text-align:center;'>".$sql_d_fetch['caption_photo_six']."</h3>";
                }
                echo "
              </li>
              ";
              }

              if(!empty($sql_d_fetch['photo_seven']))
              {
              echo "
              <li>
                <a class='ns-img' href='".BASE_URL."/assets/img/CarPhotos/".$sql_d_fetch['photo_seven']."'></a>";
                if (!empty($sql_d_fetch['caption_photo_seven']))
                {
                echo "  <h3 style='height:5vh;line-height:5vh;background:rgba(0,0,0,0.8);position:absolute;color:white;bottom:0px;right:0px;left:0px;text-align:center;'>".$sql_d_fetch['caption_photo_seven']."</h3>";
                }
                echo "
              </li>
              ";
              }

              if(!empty($sql_d_fetch['photo_eight']))
              {
              echo "
              <li>
                <a class='ns-img' href='".BASE_URL."/assets/img/CarPhotos/".$sql_d_fetch['photo_eight']."'></a>";
                if (!empty($sql_d_fetch['caption_photo_eight']))
                {
                echo "  <h3 style='height:5vh;line-height:5vh;background:rgba(0,0,0,0.8);position:absolute;color:white;bottom:0px;right:0px;left:0px;text-align:center;'>".$sql_d_fetch['caption_photo_eight']."</h3>";
                }
                echo "
              </li>
              ";
              }

              if(!empty($sql_d_fetch['photo_nine']))
              {
              echo "
              <li>
                <a class='ns-img' href='".BASE_URL."/assets/img/CarPhotos/".$sql_d_fetch['photo_nine']."'></a>";
                if (!empty($sql_d_fetch['caption_photo_nine']))
                {
                echo "  <h3 style='height:5vh;line-height:5vh;background:rgba(0,0,0,0.8);position:absolute;color:white;bottom:0px;right:0px;left:0px;text-align:center;'>".$sql_d_fetch['caption_photo_nine']."</h3>";
                }
                echo "
              </li>
              ";
              }

              if(!empty($sql_d_fetch['photo_ten']))
              {
              echo "
              <li>
                <a class='ns-img' href='".BASE_URL."/assets/img/CarPhotos/".$sql_d_fetch['photo_ten']."'></a>";
                if (!empty($sql_d_fetch['caption_photo_ten']))
                {
                echo "  <h3 style='height:5vh;line-height:5vh;background:rgba(0,0,0,0.8);position:absolute;color:white;bottom:0px;right:0px;left:0px;text-align:center;'>".$sql_d_fetch['caption_photo_ten']."</h3>";
                }
                echo "
              </li>
              ";
              }

              if(!empty($sql_d_fetch['photo_eleven']))
              {
              echo "
              <li>
                <a class='ns-img' href='".BASE_URL."/assets/img/CarPhotos/".$sql_d_fetch['photo_eleven']."'></a>";
                if (!empty($sql_d_fetch['caption_photo_eleven']))
                {
                echo "  <h3 style='height:5vh;line-height:5vh;background:rgba(0,0,0,0.8);position:absolute;color:white;bottom:0px;right:0px;left:0px;text-align:center;'>".$sql_d_fetch['caption_photo_eleven']."</h3>";
                }
                echo "
              </li>
              ";
              }

              if(!empty($sql_d_fetch['photo_twelve']))
              {
              echo "
              <li>
                <a class='ns-img' href='".BASE_URL."/assets/img/CarPhotos/".$sql_d_fetch['photo_twelve']."'></a>";
                if (!empty($sql_d_fetch['caption_photo_twelve']))
                {
                echo "  <h3 style='height:5vh;line-height:5vh;background:rgba(0,0,0,0.8);position:absolute;color:white;bottom:0px;right:0px;left:0px;text-align:center;'>".$sql_d_fetch['caption_photo_twelve']."</h3>";
                }
                echo "
              </li>
              ";
              }

              if(!empty($sql_d_fetch['photo_thirteen']))
              {
              echo "
              <li>
                <a class='ns-img' href='".BASE_URL."/assets/img/CarPhotos/".$sql_d_fetch['photo_thirteen']."'></a>";
                if (!empty($sql_d_fetch['caption_photo_thirteen']))
                {
                echo "  <h3 style='height:5vh;line-height:5vh;background:rgba(0,0,0,0.8);position:absolute;color:white;bottom:0px;right:0px;left:0px;text-align:center;'>".$sql_d_fetch['caption_photo_thirteen']."</h3>";
                }
                echo "
              </li>
              ";
              }

              if(!empty($sql_d_fetch['photo_fourteen']))
              {
              echo "
              <li>
                <a class='ns-img' href='".BASE_URL."/assets/img/CarPhotos/".$sql_d_fetch['photo_fourteen']."'></a>";
                if (!empty($sql_d_fetch['caption_photo_fourteen']))
                {
                echo "  <h3 style='height:5vh;line-height:5vh;background:rgba(0,0,0,0.8);position:absolute;color:white;bottom:0px;right:0px;left:0px;text-align:center;'>".$sql_d_fetch['caption_photo_fourteen']."</h3>";
                }
                echo "
              </li>
              ";
              }


              if(!empty($sql_d_fetch['photo_fifteen']))
              {
              echo "
              <li>
                <a class='ns-img' href='".BASE_URL."/assets/img/CarPhotos/".$sql_d_fetch['photo_fifteen']."'></a>";
                if (!empty($sql_d_fetch['caption_photo_fifteen']))
                {
                echo "  <h3 style='height:5vh;line-height:5vh;background:rgba(0,0,0,0.8);position:absolute;color:white;bottom:0px;right:0px;left:0px;text-align:center;'>".$sql_d_fetch['caption_photo_fifteen']."</h3>";
                }
                echo "
              </li>
              ";
              }

              if(!empty($sql_d_fetch['photo_sixteen']))
              {
              echo "
              <li>
                <a class='ns-img' href='".BASE_URL."/assets/img/CarPhotos/".$sql_d_fetch['photo_sixteen']."'></a>";
                if (!empty($sql_d_fetch['caption_photo_sixteen']))
                {
                echo "  <h3 style='height:5vh;line-height:5vh;background:rgba(0,0,0,0.8);position:absolute;color:white;bottom:0px;right:0px;left:0px;text-align:center;'>".$sql_d_fetch['caption_photo_sixteen']."</h3>";
                }
                echo "
              </li>
              ";
              }

              if(!empty($sql_d_fetch['photo_seventeen']))
              {
              echo "
              <li>
                <a class='ns-img' href='".BASE_URL."/assets/img/CarPhotos/".$sql_d_fetch['photo_seventeen']."'></a>";
                if (!empty($sql_d_fetch['caption_photo_seventeen']))
                {
                echo "  <h3 style='height:5vh;line-height:5vh;background:rgba(0,0,0,0.8);position:absolute;color:white;bottom:0px;right:0px;left:0px;text-align:center;'>".$sql_d_fetch['caption_photo_seventeen']."</h3>";
                }
                echo "
              </li>
              ";
              }


              if(!empty($sql_d_fetch['photo_eighteen']))
              {
              echo "
              <li>
                <a class='ns-img' href='".BASE_URL."/assets/img/CarPhotos/".$sql_d_fetch['photo_eighteen']."'></a>";
                if (!empty($sql_d_fetch['caption_photo_eighteen']))
                {
                echo "  <h3 style='height:5vh;line-height:5vh;background:rgba(0,0,0,0.8);position:absolute;color:white;bottom:0px;right:0px;left:0px;text-align:center;'>".$sql_d_fetch['caption_photo_eighteen']."</h3>";
                }
                echo "
              </li>
              ";
              }

              if(!empty($sql_d_fetch['photo_nineteen']))
              {
              echo "
              <li>
                <a class='ns-img' href='".BASE_URL."/assets/img/CarPhotos/".$sql_d_fetch['photo_nineteen']."'></a>";
                if (!empty($sql_d_fetch['caption_photo_nineteen']))
                {
                echo "  <h3 style='height:5vh;line-height:5vh;background:rgba(0,0,0,0.8);position:absolute;color:white;bottom:0px;right:0px;left:0px;text-align:center;'>".$sql_d_fetch['caption_photo_nineteen']."</h3>";
                }
                echo "
              </li>
              ";
              }

              echo "
              </ul>
              <div class='fs-icon' title='Expand/Close'></div>
          </div>
      </div>
      <div id='thumbnail-slider' style='float:left;'>
          <div class='inner'>
          <ul>";
          if(!empty($sql_d_fetch['main_photo']))
          {
          echo "
        <li>
            <a class='thumb' href='".BASE_URL."/assets/img/CarPhotos/".$sql_d_fetch['main_photo']."'></a>
        </li>
        ";
          }

        if(!empty($sql_d_fetch['photo_one']))
        {
        echo "
      <li>
          <a class='thumb' href='".BASE_URL."/assets/img/CarPhotos/".$sql_d_fetch['photo_one']."'></a>
      </li>
      ";
         }


         if(!empty($sql_d_fetch['photo_two']))
         {
         echo "
       <li>
           <a class='thumb' href='".BASE_URL."/assets/img/CarPhotos/".$sql_d_fetch['photo_two']."'></a>
       </li>
       ";
          }


          if(!empty($sql_d_fetch['photo_three']))
          {
          echo "
        <li>
            <a class='thumb' href='".BASE_URL."/assets/img/CarPhotos/".$sql_d_fetch['photo_three']."'></a>
        </li>
        ";
           }


           if(!empty($sql_d_fetch['photo_four']))
           {
           echo "
         <li>
             <a class='thumb' href='".BASE_URL."/assets/img/CarPhotos/".$sql_d_fetch['photo_four']."'></a>
         </li>
         ";
            }


            if(!empty($sql_d_fetch['photo_five']))
            {
            echo "
          <li>
              <a class='thumb' href='".BASE_URL."/assets/img/CarPhotos/".$sql_d_fetch['photo_five']."'></a>
          </li>
          ";
             }


             if(!empty($sql_d_fetch['photo_six']))
             {
             echo "
           <li>
               <a class='thumb' href='".BASE_URL."/assets/img/CarPhotos/".$sql_d_fetch['photo_six']."'></a>
           </li>
           ";
              }


              if(!empty($sql_d_fetch['photo_seven']))
              {
              echo "
            <li>
                <a class='thumb' href='".BASE_URL."/assets/img/CarPhotos/".$sql_d_fetch['photo_seven']."'></a>
            </li>
            ";
               }


               if(!empty($sql_d_fetch['photo_eight']))
               {
               echo "
             <li>
                 <a class='thumb' href='".BASE_URL."/assets/img/CarPhotos/".$sql_d_fetch['photo_eight']."'></a>
             </li>
             ";
                }


                if(!empty($sql_d_fetch['photo_nine']))
                {
                echo "
              <li>
                  <a class='thumb' href='".BASE_URL."/assets/img/CarPhotos/".$sql_d_fetch['photo_nine']."'></a>
              </li>
              ";
                 }


                 if(!empty($sql_d_fetch['photo_ten']))
                 {
                 echo "
               <li>
                   <a class='thumb' href='".BASE_URL."/assets/img/CarPhotos/".$sql_d_fetch['photo_ten']."'></a>
               </li>
               ";
                  }

                  if(!empty($sql_d_fetch['photo_eleven']))
                  {
                  echo "
                <li>
                    <a class='thumb' href='".BASE_URL."/assets/img/CarPhotos/".$sql_d_fetch['photo_eleven']."'></a>
                </li>
                ";
                   }

                   if(!empty($sql_d_fetch['photo_twelve']))
                   {
                   echo "
                 <li>
                     <a class='thumb' href='".BASE_URL."/assets/img/CarPhotos/".$sql_d_fetch['photo_twelve']."'></a>
                 </li>
                 ";
                    }

                    if(!empty($sql_d_fetch['photo_thirteen']))
                    {
                    echo "
                  <li>
                      <a class='thumb' href='".BASE_URL."/assets/img/CarPhotos/".$sql_d_fetch['photo_thirteen']."'></a>
                  </li>
                  ";
                     }

                     if(!empty($sql_d_fetch['photo_fourteen']))
                     {
                     echo "
                   <li>
                       <a class='thumb' href='".BASE_URL."/assets/img/CarPhotos/".$sql_d_fetch['photo_fourteen']."'></a>
                   </li>
                   ";
                      }

                      if(!empty($sql_d_fetch['photo_fifteen']))
                      {
                      echo "
                    <li>
                        <a class='thumb' href='".BASE_URL."/assets/img/CarPhotos/".$sql_d_fetch['photo_fifteen']."'></a>
                    </li>
                    ";
                       }

                       if(!empty($sql_d_fetch['photo_sixteen']))
                       {
                       echo "
                     <li>
                         <a class='thumb' href='".BASE_URL."/assets/img/CarPhotos/".$sql_d_fetch['photo_sixteen']."'></a>
                     </li>
                     ";
                        }


                        if(!empty($sql_d_fetch['photo_seventeen']))
                        {
                        echo "
                      <li>
                          <a class='thumb' href='".BASE_URL."/assets/img/CarPhotos/".$sql_d_fetch['photo_seventeen']."'></a>
                      </li>
                      ";
                         }

                         if(!empty($sql_d_fetch['photo_eighteen']))
                         {
                         echo "
                       <li>
                           <a class='thumb' href='".BASE_URL."/assets/img/CarPhotos/".$sql_d_fetch['photo_eighteen']."'></a>
                       </li>
                       ";
                          }

                          if(!empty($sql_d_fetch['photo_nineteen']))
                          {
                          echo "
                        <li>
                            <a class='thumb' href='".BASE_URL."/assets/img/CarPhotos/".$sql_d_fetch['photo_nineteen']."'></a>
                        </li>
                        ";
                           }

                  echo "
              </ul>
          </div>
      </div>
      <div style='clear:both;'></div>
  </div>";
  }
  /*
  if ($sql_d_exec && $sql_d_fetch)
  {
      echo "
      <ul class='amazingslider-slides' style='display:none;'>
          <li>
          <img style='";
           $link = ROOT_PATH .'/assets/img/CarPhotos/'.$sql_d_fetch['main_photo'];
          list($width,$height,$type,$attr) = getimagesize($link);
          $aspectRatio = $width/$height;
            if ($aspectRatio >= 1.28 && $aspectRatio <=1.38)
            {
                echo 'height:100%;';
                echo 'width:100%;';
                echo 'object-fit:cover;';
            }
            else {
              if ($width > $height)
              {
                echo 'height:80%;';
              echo 'width:100%;';
              }
              else {
                echo 'height:100%;';
                echo 'width:80%;';
              }
            }echo " 'class ='gallery_img_container' src='".BASE_URL ." /assets/img/CarPhotos/".$sql_d_fetch['main_photo']."' alt='".$sql_d_fetch['main_photo']."'/>
          </li>
          ";
if (!empty($sql_d_fetch['photo_one']))
{
     echo "
          <li>
          <img src='".BASE_URL ." /assets/img/CarPhotos/".$sql_d_fetch['photo_one']."' alt='".$sql_d_fetch['photo_one']."'/>
          </li>";
}
if (!empty($sql_d_fetch['photo_two']))
{
  echo "
       <li>
       <img style='";
        $link = ROOT_PATH .'/assets/img/CarPhotos/'.$sql_fv_fetch['main_photo'];
       list($width,$height,$type,$attr) = getimagesize($link);
       $aspectRatio = $width/$height;
         if ($aspectRatio >= 1.28 && $aspectRatio <=1.38)
         {
             echo 'height:100%;';
             echo 'width:100%;';
             echo 'object-fit:cover;';
         }
         else {
           if ($width > $height)
           {
             echo 'height:80%;';
           echo 'width:100%;';
           }
           else {
             echo 'height:100%;';
             echo 'width:80%;';
           }
         }echo " 'src='".BASE_URL ." /assets/img/CarPhotos/".$sql_d_fetch['photo_two']."' alt='".$sql_d_fetch['photo_two']."'/>
       </li>";
}
if (!empty($sql_d_fetch['photo_three']))
{
  echo "
       <li>
       <img style='";
        $link = ROOT_PATH .'/assets/img/CarPhotos/'.$sql_fv_fetch['main_photo'];
       list($width,$height,$type,$attr) = getimagesize($link);
       $aspectRatio = $width/$height;
         if ($aspectRatio >= 1.28 && $aspectRatio <=1.38)
         {
             echo 'height:100%;';
             echo 'width:100%;';
             echo 'object-fit:cover;';
         }
         else {
           if ($width > $height)
           {
             echo 'height:80%;';
           echo 'width:100%;';
           }
           else {
             echo 'height:100%;';
             echo 'width:80%;';
           }
         }echo " 'src='".BASE_URL ." /assets/img/CarPhotos/".$sql_d_fetch['photo_three']."' alt='".$sql_d_fetch['photo_three']."'/>
       </li>";
}
if (!empty($sql_d_fetch['photo_four']))
{
  echo "
       <li>
       <img style='";
        $link = ROOT_PATH .'/assets/img/CarPhotos/'.$sql_fv_fetch['main_photo'];
       list($width,$height,$type,$attr) = getimagesize($link);
       $aspectRatio = $width/$height;
         if ($aspectRatio >= 1.28 && $aspectRatio <=1.38)
         {
             echo 'height:100%;';
             echo 'width:100%;';
             echo 'object-fit:cover;';
         }
         else {
           if ($width > $height)
           {
             echo 'height:80%;';
           echo 'width:100%;';
           }
           else {
             echo 'height:100%;';
             echo 'width:80%;';
           }
         }echo " 'src='".BASE_URL ." /assets/img/CarPhotos/".$sql_d_fetch['photo_four']."' alt='".$sql_d_fetch['photo_four']."'/>
       </li>";
}
if (!empty($sql_d_fetch['photo_five']))
{
  echo "
       <li>
       <img style='";
        $link = ROOT_PATH .'/assets/img/CarPhotos/'.$sql_fv_fetch['main_photo'];
       list($width,$height,$type,$attr) = getimagesize($link);
       $aspectRatio = $width/$height;
         if ($aspectRatio >= 1.28 && $aspectRatio <=1.38)
         {
             echo 'height:100%;';
             echo 'width:100%;';
             echo 'object-fit:cover;';
         }
         else {
           if ($width > $height)
           {
             echo 'height:80%;';
           echo 'width:100%;';
           }
           else {
             echo 'height:100%;';
             echo 'width:80%;';
           }
         }echo " 'src='".BASE_URL ." /assets/img/CarPhotos/".$sql_d_fetch['photo_five']."' alt='".$sql_d_fetch['photo_five']."'/>
       </li>";
}
if (!empty($sql_d_fetch['photo_six']))
{
  echo "
       <li>
       <img style='";
        $link = ROOT_PATH .'/assets/img/CarPhotos/'.$sql_fv_fetch['main_photo'];
       list($width,$height,$type,$attr) = getimagesize($link);
       $aspectRatio = $width/$height;
         if ($aspectRatio >= 1.28 && $aspectRatio <=1.38)
         {
             echo 'height:100%;';
             echo 'width:100%;';
             echo 'object-fit:cover;';
         }
         else {
           if ($width > $height)
           {
             echo 'height:80%;';
           echo 'width:100%;';
           }
           else {
             echo 'height:100%;';
             echo 'width:80%;';
           }
         }echo " 'src='".BASE_URL ." /assets/img/CarPhotos/".$sql_d_fetch['photo_six']."' alt='".$sql_d_fetch['photo_six']."'/>
       </li>";
}
if (!empty($sql_d_fetch['photo_seven']))
{
  echo "
       <li>
       <img style='";
        $link = ROOT_PATH .'/assets/img/CarPhotos/'.$sql_fv_fetch['main_photo'];
       list($width,$height,$type,$attr) = getimagesize($link);
       $aspectRatio = $width/$height;
         if ($aspectRatio >= 1.28 && $aspectRatio <=1.38)
         {
             echo 'height:100%;';
             echo 'width:100%;';
             echo 'object-fit:cover;';
         }
         else {
           if ($width > $height)
           {
             echo 'height:80%;';
           echo 'width:100%;';
           }
           else {
             echo 'height:100%;';
             echo 'width:80%;';
           }
         }echo " 'src='".BASE_URL ." /assets/img/CarPhotos/".$sql_d_fetch['photo_seven']."' alt='".$sql_d_fetch['photo_seven']."'/>
       </li>";
}
if (!empty($sql_d_fetch['photo_eight']))
{
  echo "
       <li>
       <img style='";
        $link = ROOT_PATH .'/assets/img/CarPhotos/'.$sql_fv_fetch['main_photo'];
       list($width,$height,$type,$attr) = getimagesize($link);
       $aspectRatio = $width/$height;
         if ($aspectRatio >= 1.28 && $aspectRatio <=1.38)
         {
             echo 'height:100%;';
             echo 'width:100%;';
             echo 'object-fit:cover;';
         }
         else {
           if ($width > $height)
           {
             echo 'height:80%;';
           echo 'width:100%;';
           }
           else {
             echo 'height:100%;';
             echo 'width:80%;';
           }
         }echo " 'src='".BASE_URL ." /assets/img/CarPhotos/".$sql_d_fetch['photo_eight']."' alt='".$sql_d_fetch['photo_eight']."'/>
       </li>";
}
if (!empty($sql_d_fetch['photo_nine']))
{
  echo "
       <li>
       <img style='";
        $link = ROOT_PATH .'/assets/img/CarPhotos/'.$sql_fv_fetch['main_photo'];
       list($width,$height,$type,$attr) = getimagesize($link);
       $aspectRatio = $width/$height;
         if ($aspectRatio >= 1.28 && $aspectRatio <=1.38)
         {
             echo 'height:100%;';
             echo 'width:100%;';
             echo 'object-fit:cover;';
         }
         else {
           if ($width > $height)
           {
             echo 'height:80%;';
           echo 'width:100%;';
           }
           else {
             echo 'height:100%;';
             echo 'width:80%;';
           }
         }echo " 'src='".BASE_URL ." /assets/img/CarPhotos/".$sql_d_fetch['photo_nine']."' alt='".$sql_d_fetch['photo_nine']."'/>
       </li>";
}
if (!empty($sql_d_fetch['photo_ten']))
{
  echo "
       <li>
       <img style='";
        $link = ROOT_PATH .'/assets/img/CarPhotos/'.$sql_fv_fetch['main_photo'];
       list($width,$height,$type,$attr) = getimagesize($link);
       $aspectRatio = $width/$height;
         if ($aspectRatio >= 1.28 && $aspectRatio <=1.38)
         {
             echo 'height:100%;';
             echo 'width:100%;';
             echo 'object-fit:cover;';
         }
         else {
           if ($width > $height)
           {
             echo 'height:80%;';
           echo 'width:100%;';
           }
           else {
             echo 'height:100%;';
             echo 'width:80%;';
           }
         }echo " 'src='".BASE_URL ." /assets/img/CarPhotos/".$sql_d_fetch['photo_ten']."' alt='".$sql_d_fetch['photo_ten']."'/>
       </li>";
}
if (!empty($sql_d_fetch['photo_eleven']))
{
  echo "
       <li>
       <img style='";
        $link = ROOT_PATH .'/assets/img/CarPhotos/'.$sql_fv_fetch['main_photo'];
       list($width,$height,$type,$attr) = getimagesize($link);
       $aspectRatio = $width/$height;
         if ($aspectRatio >= 1.28 && $aspectRatio <=1.38)
         {
             echo 'height:100%;';
             echo 'width:100%;';
             echo 'object-fit:cover;';
         }
         else {
           if ($width > $height)
           {
             echo 'height:80%;';
           echo 'width:100%;';
           }
           else {
             echo 'height:100%;';
             echo 'width:80%;';
           }
         }echo " 'src='".BASE_URL ." /assets/img/CarPhotos/".$sql_d_fetch['photo_eleven']."' alt='".$sql_d_fetch['photo_eleven']."'/>
       </li>";
}
if (!empty($sql_d_fetch['photo_twelve']))
{
  echo "
       <li>
       <img style='";
        $link = ROOT_PATH .'/assets/img/CarPhotos/'.$sql_fv_fetch['main_photo'];
       list($width,$height,$type,$attr) = getimagesize($link);
       $aspectRatio = $width/$height;
         if ($aspectRatio >= 1.28 && $aspectRatio <=1.38)
         {
             echo 'height:100%;';
             echo 'width:100%;';
             echo 'object-fit:cover;';
         }
         else {
           if ($width > $height)
           {
             echo 'height:80%;';
           echo 'width:100%;';
           }
           else {
             echo 'height:100%;';
             echo 'width:80%;';
           }
         }echo " 'src='".BASE_URL ." /assets/img/CarPhotos/".$sql_d_fetch['photo_twelve']."' alt='".$sql_d_fetch['photo_twelve']."'/>
       </li>";
}
if (!empty($sql_d_fetch['photo_thirteen']))
{
  echo "
       <li>
       <img style='";
        $link = ROOT_PATH .'/assets/img/CarPhotos/'.$sql_fv_fetch['main_photo'];
       list($width,$height,$type,$attr) = getimagesize($link);
       $aspectRatio = $width/$height;
         if ($aspectRatio >= 1.28 && $aspectRatio <=1.38)
         {
             echo 'height:100%;';
             echo 'width:100%;';
             echo 'object-fit:cover;';
         }
         else {
           if ($width > $height)
           {
             echo 'height:80%;';
           echo 'width:100%;';
           }
           else {
             echo 'height:100%;';
             echo 'width:80%;';
           }
         }echo " 'src='".BASE_URL ." /assets/img/CarPhotos/".$sql_d_fetch['photo_thirteen']."' alt='".$sql_d_fetch['photo_thirteen']."'/>
       </li>";
}
if (!empty($sql_d_fetch['photo_fourteen']))
{
  echo "
       <li>
       <img style='";
        $link = ROOT_PATH .'/assets/img/CarPhotos/'.$sql_fv_fetch['main_photo'];
       list($width,$height,$type,$attr) = getimagesize($link);
       $aspectRatio = $width/$height;
         if ($aspectRatio >= 1.28 && $aspectRatio <=1.38)
         {
             echo 'height:100%;';
             echo 'width:100%;';
             echo 'object-fit:cover;';
         }
         else {
           if ($width > $height)
           {
             echo 'height:80%;';
           echo 'width:100%;';
           }
           else {
             echo 'height:100%;';
             echo 'width:80%;';
           }
         }echo " 'src='".BASE_URL ." /assets/img/CarPhotos/".$sql_d_fetch['photo_fourteen']."' alt='".$sql_d_fetch['photo_fourteen']."'/>
       </li>";
}
if (!empty($sql_d_fetch['photo_fifteen']))
{
  echo "
       <li>
       <img style='";
        $link = ROOT_PATH .'/assets/img/CarPhotos/'.$sql_fv_fetch['main_photo'];
       list($width,$height,$type,$attr) = getimagesize($link);
       $aspectRatio = $width/$height;
         if ($aspectRatio >= 1.28 && $aspectRatio <=1.38)
         {
             echo 'height:100%;';
             echo 'width:100%;';
             echo 'object-fit:cover;';
         }
         else {
           if ($width > $height)
           {
             echo 'height:80%;';
           echo 'width:100%;';
           }
           else {
             echo 'height:100%;';
             echo 'width:80%;';
           }
         }echo " 'src='".BASE_URL ." /assets/img/CarPhotos/".$sql_d_fetch['photo_fifteen']."' alt='".$sql_d_fetch['photo_fifteen']."'/>
       </li>";
}
if (!empty($sql_d_fetch['photo_sixteen']))
{
  echo "
       <li>
       <img style='";
        $link = ROOT_PATH .'/assets/img/CarPhotos/'.$sql_fv_fetch['main_photo'];
       list($width,$height,$type,$attr) = getimagesize($link);
       $aspectRatio = $width/$height;
         if ($aspectRatio >= 1.28 && $aspectRatio <=1.38)
         {
             echo 'height:100%;';
             echo 'width:100%;';
             echo 'object-fit:cover;';
         }
         else {
           if ($width > $height)
           {
             echo 'height:80%;';
           echo 'width:100%;';
           }
           else {
             echo 'height:100%;';
             echo 'width:80%;';
           }
         }echo " 'src='".BASE_URL ." /assets/img/CarPhotos/".$sql_d_fetch['photo_sixteen']."' alt='".$sql_d_fetch['photo_sixteen']."'/>
       </li>";
}
if (!empty($sql_d_fetch['photo_seventeen']))
{
  echo "
       <li>
       <img style='";
        $link = ROOT_PATH .'/assets/img/CarPhotos/'.$sql_fv_fetch['main_photo'];
       list($width,$height,$type,$attr) = getimagesize($link);
       $aspectRatio = $width/$height;
         if ($aspectRatio >= 1.28 && $aspectRatio <=1.38)
         {
             echo 'height:100%;';
             echo 'width:100%;';
             echo 'object-fit:cover;';
         }
         else {
           if ($width > $height)
           {
             echo 'height:80%;';
           echo 'width:100%;';
           }
           else {
             echo 'height:100%;';
             echo 'width:80%;';
           }
         }echo " 'src='".BASE_URL ." /assets/img/CarPhotos/".$sql_d_fetch['photo_seventeen']."' alt='".$sql_d_fetch['photo_seventeen']."'/>
       </li>";
}
if (!empty($sql_d_fetch['photo_eighteen']))
{
  echo "
       <li>
       <img style='";
        $link = ROOT_PATH .'/assets/img/CarPhotos/'.$sql_fv_fetch['main_photo'];
       list($width,$height,$type,$attr) = getimagesize($link);
       $aspectRatio = $width/$height;
         if ($aspectRatio >= 1.28 && $aspectRatio <=1.38)
         {
             echo 'height:100%;';
             echo 'width:100%;';
             echo 'object-fit:cover;';
         }
         else {
           if ($width > $height)
           {
             echo 'height:80%;';
           echo 'width:100%;';
           }
           else {
             echo 'height:100%;';
             echo 'width:80%;';
           }
         }echo " 'src='".BASE_URL ." /assets/img/CarPhotos/".$sql_d_fetch['photo_eighteen']."' alt='".$sql_d_fetch['photo_eighteen']."'/>
       </li>";
}
if (!empty($sql_d_fetch['photo_nineteen']))
{
  echo "
       <li>
       <img style='";
        $link = ROOT_PATH .'/assets/img/CarPhotos/'.$sql_fv_fetch['main_photo'];
       list($width,$height,$type,$attr) = getimagesize($link);
       $aspectRatio = $width/$height;
         if ($aspectRatio >= 1.28 && $aspectRatio <=1.38)
         {
             echo 'height:100%;';
             echo 'width:100%;';
             echo 'object-fit:cover;';
         }
         else {
           if ($width > $height)
           {
             echo 'height:80%;';
           echo 'width:100%;';
           }
           else {
             echo 'height:100%;';
             echo 'width:80%;';
           }
         }echo " 'src='".BASE_URL ." /assets/img/CarPhotos/".$sql_d_fetch['photo_nineteen']."' alt='".$sql_d_fetch['photo_nineteen']."'/>
       </li>";
}
echo "
      </ul>
      <ul class='amazingslider-thumbnails' style='display:none;'>
          <li>
          <img style='";
           $link = ROOT_PATH .'/assets/img/CarPhotos/'.$sql_fv_fetch['main_photo'];
          list($width,$height,$type,$attr) = getimagesize($link);
          $aspectRatio = $width/$height;
            if ($aspectRatio >= 1.28 && $aspectRatio <=1.38)
            {
                echo 'height:100%;';
                echo 'width:100%;';
                echo 'object-fit:cover;';
            }
            else {
              if ($width > $height)
              {
                echo 'height:80%;';
              echo 'width:100%;';
              }
              else {
                echo 'height:100%;';
                echo 'width:80%;';
              }
            }echo " 'src='".BASE_URL ." /assets/img/CarPhotos/".$sql_d_fetch['main_photo']."' alt='".$sql_d_fetch['main_photo']."'/>
          </li>
";
if (!empty($sql_d_fetch['photo_one']))
{
     echo "
          <li>
          <img style='";
           $link = ROOT_PATH .'/assets/img/CarPhotos/'.$sql_fv_fetch['main_photo'];
          list($width,$height,$type,$attr) = getimagesize($link);
          $aspectRatio = $width/$height;
            if ($aspectRatio >= 1.28 && $aspectRatio <=1.38)
            {
                echo 'height:100%;';
                echo 'width:100%;';
                echo 'object-fit:cover;';
            }
            else {
              if ($width > $height)
              {
                echo 'height:80%;';
              echo 'width:100%;';
              }
              else {
                echo 'height:100%;';
                echo 'width:80%;';
              }
            }echo " 'src='".BASE_URL ." /assets/img/CarPhotos/".$sql_d_fetch['photo_one']."' alt='".$sql_d_fetch['photo_one']."'/>
          </li>";
}
if (!empty($sql_d_fetch['photo_two']))
{
  echo "
       <li>
       <img style='";
        $link = ROOT_PATH .'/assets/img/CarPhotos/'.$sql_fv_fetch['main_photo'];
       list($width,$height,$type,$attr) = getimagesize($link);
       $aspectRatio = $width/$height;
         if ($aspectRatio >= 1.28 && $aspectRatio <=1.38)
         {
             echo 'height:100%;';
             echo 'width:100%;';
             echo 'object-fit:cover;';
         }
         else {
           if ($width > $height)
           {
             echo 'height:80%;';
           echo 'width:100%;';
           }
           else {
             echo 'height:100%;';
             echo 'width:80%;';
           }
         }echo " 'src='".BASE_URL ." /assets/img/CarPhotos/".$sql_d_fetch['photo_two']."' alt='".$sql_d_fetch['photo_two']."'/>
       </li>";
}
if (!empty($sql_d_fetch['photo_three']))
{
  echo "
       <li>
       <img style='";
        $link = ROOT_PATH .'/assets/img/CarPhotos/'.$sql_fv_fetch['main_photo'];
       list($width,$height,$type,$attr) = getimagesize($link);
       $aspectRatio = $width/$height;
         if ($aspectRatio >= 1.28 && $aspectRatio <=1.38)
         {
             echo 'height:100%;';
             echo 'width:100%;';
             echo 'object-fit:cover;';
         }
         else {
           if ($width > $height)
           {
             echo 'height:80%;';
           echo 'width:100%;';
           }
           else {
             echo 'height:100%;';
             echo 'width:80%;';
           }
         }echo " 'src='".BASE_URL ." /assets/img/CarPhotos/".$sql_d_fetch['photo_three']."' alt='".$sql_d_fetch['photo_three']."'/>
       </li>";
}
if (!empty($sql_d_fetch['photo_four']))
{
  echo "
       <li>
       <img style='";
        $link = ROOT_PATH .'/assets/img/CarPhotos/'.$sql_fv_fetch['main_photo'];
       list($width,$height,$type,$attr) = getimagesize($link);
       $aspectRatio = $width/$height;
         if ($aspectRatio >= 1.28 && $aspectRatio <=1.38)
         {
             echo 'height:100%;';
             echo 'width:100%;';
             echo 'object-fit:cover;';
         }
         else {
           if ($width > $height)
           {
             echo 'height:80%;';
           echo 'width:100%;';
           }
           else {
             echo 'height:100%;';
             echo 'width:80%;';
           }
         }echo " 'src='".BASE_URL ." /assets/img/CarPhotos/".$sql_d_fetch['photo_four']."' alt='".$sql_d_fetch['photo_four']."'/>
       </li>";
}
if (!empty($sql_d_fetch['photo_five']))
{
  echo "
       <li>
       <img style='";
        $link = ROOT_PATH .'/assets/img/CarPhotos/'.$sql_fv_fetch['main_photo'];
       list($width,$height,$type,$attr) = getimagesize($link);
       $aspectRatio = $width/$height;
         if ($aspectRatio >= 1.28 && $aspectRatio <=1.38)
         {
             echo 'height:100%;';
             echo 'width:100%;';
             echo 'object-fit:cover;';
         }
         else {
           if ($width > $height)
           {
             echo 'height:80%;';
           echo 'width:100%;';
           }
           else {
             echo 'height:100%;';
             echo 'width:80%;';
           }
         }echo " 'src='".BASE_URL ." /assets/img/CarPhotos/".$sql_d_fetch['photo_five']."' alt='".$sql_d_fetch['photo_five']."'/>
       </li>";
}
if (!empty($sql_d_fetch['photo_six']))
{
  echo "
       <li>
       <img style='";
        $link = ROOT_PATH .'/assets/img/CarPhotos/'.$sql_fv_fetch['main_photo'];
       list($width,$height,$type,$attr) = getimagesize($link);
       $aspectRatio = $width/$height;
         if ($aspectRatio >= 1.28 && $aspectRatio <=1.38)
         {
             echo 'height:100%;';
             echo 'width:100%;';
             echo 'object-fit:cover;';
         }
         else {
           if ($width > $height)
           {
             echo 'height:80%;';
           echo 'width:100%;';
           }
           else {
             echo 'height:100%;';
             echo 'width:80%;';
           }
         }echo " 'src='".BASE_URL ." /assets/img/CarPhotos/".$sql_d_fetch['photo_six']."' alt='".$sql_d_fetch['photo_six']."'/>
       </li>";
}
if (!empty($sql_d_fetch['photo_seven']))
{
  echo "
       <li>
       <img style='";
        $link = ROOT_PATH .'/assets/img/CarPhotos/'.$sql_fv_fetch['main_photo'];
       list($width,$height,$type,$attr) = getimagesize($link);
       $aspectRatio = $width/$height;
         if ($aspectRatio >= 1.28 && $aspectRatio <=1.38)
         {
             echo 'height:100%;';
             echo 'width:100%;';
             echo 'object-fit:cover;';
         }
         else {
           if ($width > $height)
           {
             echo 'height:80%;';
           echo 'width:100%;';
           }
           else {
             echo 'height:100%;';
             echo 'width:80%;';
           }
         }echo " 'src='".BASE_URL ." /assets/img/CarPhotos/".$sql_d_fetch['photo_seven']."' alt='".$sql_d_fetch['photo_seven']."'/>
       </li>";
}
if (!empty($sql_d_fetch['photo_eight']))
{
  echo "
       <li>
       <img style='";
        $link = ROOT_PATH .'/assets/img/CarPhotos/'.$sql_d_fetch['photo_eight'];
       list($width,$height,$type,$attr) = getimagesize($link);
       $aspectRatio = $width/$height;
         if ($aspectRatio >= 1.28 && $aspectRatio <=1.38)
         {
             echo 'height:100%;';
             echo 'width:100%;';
             echo 'object-fit:cover;';
         }
         else {
           if ($width > $height)
           {
             echo 'height:80%;';
           echo 'width:100%;';
           }
           else {
             echo 'height:100%;';
             echo 'width:80%;';
           }
         }echo " 'src='".BASE_URL ." /assets/img/CarPhotos/".$sql_d_fetch['photo_eight']."' alt='".$sql_d_fetch['photo_eight']."'/>
       </li>";
}
if (!empty($sql_d_fetch['photo_nine']))
{
  echo "
       <li>
       <img style='";
        $link = ROOT_PATH .'/assets/img/CarPhotos/'.$sql_d_fetch['photo_nine'];
       list($width,$height,$type,$attr) = getimagesize($link);
       $aspectRatio = $width/$height;
         if ($aspectRatio >= 1.28 && $aspectRatio <=1.38)
         {
             echo 'height:100%;';
             echo 'width:100%;';
             echo 'object-fit:cover;';
         }
         else {
           if ($width > $height)
           {
             echo 'height:80%;';
           echo 'width:100%;';
           }
           else {
             echo 'height:100%;';
             echo 'width:80%;';
           }
         }echo " 'src='".BASE_URL ." /assets/img/CarPhotos/".$sql_d_fetch['photo_nine']."' alt='".$sql_d_fetch['photo_nine']."'/>
       </li>";
}
if (!empty($sql_d_fetch['photo_ten']))
{
  echo "
       <li>
       <img style='";
        $link = ROOT_PATH .'/assets/img/CarPhotos/'.$sql_d_fetch['photo_ten'];
       list($width,$height,$type,$attr) = getimagesize($link);
       $aspectRatio = $width/$height;
         if ($aspectRatio >= 1.28 && $aspectRatio <=1.38)
         {
             echo 'height:100%;';
             echo 'width:100%;';
             echo 'object-fit:cover;';
         }
         else {
           if ($width > $height)
           {
             echo 'height:80%;';
           echo 'width:100%;';
           }
           else {
             echo 'height:100%;';
             echo 'width:80%;';
           }
         }echo " 'src='".BASE_URL ." /assets/img/CarPhotos/".$sql_d_fetch['photo_ten']."' alt='".$sql_d_fetch['photo_ten']."'/>
       </li>";
}
if (!empty($sql_d_fetch['photo_eleven']))
{
  echo "
       <li>
       <img style='";
        $link = ROOT_PATH .'/assets/img/CarPhotos/'.$sql_d_fetch['photo_eleven'];
       list($width,$height,$type,$attr) = getimagesize($link);
       $aspectRatio = $width/$height;
         if ($aspectRatio >= 1.28 && $aspectRatio <=1.38)
         {
             echo 'height:100%;';
             echo 'width:100%;';
             echo 'object-fit:cover;';
         }
         else {
           if ($width > $height)
           {
             echo 'height:80%;';
           echo 'width:100%;';
           }
           else {
             echo 'height:100%;';
             echo 'width:80%;';
           }
         }echo " 'src='".BASE_URL ." /assets/img/CarPhotos/".$sql_d_fetch['photo_eleven']."' alt='".$sql_d_fetch['photo_eleven']."'/>
       </li>";
}
if (!empty($sql_d_fetch['photo_twelve']))
{
  echo "
       <li>
       <img style='";
        $link = ROOT_PATH .'/assets/img/CarPhotos/'.$sql_d_fetch['photo_twelve'];
       list($width,$height,$type,$attr) = getimagesize($link);
       $aspectRatio = $width/$height;
         if ($aspectRatio >= 1.28 && $aspectRatio <=1.38)
         {
             echo 'height:100%;';
             echo 'width:100%;';
             echo 'object-fit:cover;';
         }
         else {
           if ($width > $height)
           {
             echo 'height:80%;';
           echo 'width:100%;';
           }
           else {
             echo 'height:100%;';
             echo 'width:80%;';
           }
         }echo " 'src='".BASE_URL ." /assets/img/CarPhotos/".$sql_d_fetch['photo_twelve']."' alt='".$sql_d_fetch['photo_twelve']."'/>
       </li>";
}
if (!empty($sql_d_fetch['photo_thirteen']))
{
  echo "
       <li>
       <img style='";
        $link = ROOT_PATH .'/assets/img/CarPhotos/'.$sql_d_fetch['photo_thirteen'];
       list($width,$height,$type,$attr) = getimagesize($link);
       $aspectRatio = $width/$height;
         if ($aspectRatio >= 1.28 && $aspectRatio <=1.38)
         {
             echo 'height:100%;';
             echo 'width:100%;';
             echo 'object-fit:cover;';
         }
         else {
           if ($width > $height)
           {
             echo 'height:80%;';
           echo 'width:100%;';
           }
           else {
             echo 'height:100%;';
             echo 'width:80%;';
           }
         }echo " 'src='".BASE_URL ." /assets/img/CarPhotos/".$sql_d_fetch['photo_thirteen']."' alt='".$sql_d_fetch['photo_thirteen']."'/>
       </li>";
}
if (!empty($sql_d_fetch['photo_fourteen']))
{
  echo "
       <li>
       <img style='";
        $link = ROOT_PATH .'/assets/img/CarPhotos/'.$sql_d_fetch['photo_fourteen'];
       list($width,$height,$type,$attr) = getimagesize($link);
       $aspectRatio = $width/$height;
         if ($aspectRatio >= 1.28 && $aspectRatio <=1.38)
         {
             echo 'height:100%;';
             echo 'width:100%;';
             echo 'object-fit:cover;';
         }
         else {
           if ($width > $height)
           {
             echo 'height:80%;';
           echo 'width:100%;';
           }
           else {
             echo 'height:100%;';
             echo 'width:80%;';
           }
         }echo " 'src='".BASE_URL ." /assets/img/CarPhotos/".$sql_d_fetch['photo_fourteen']."' alt='".$sql_d_fetch['photo_fourteen']."'/>
       </li>";
}
if (!empty($sql_d_fetch['photo_fifteen']))
{
  echo "
       <li>
       <img style='";
        $link = ROOT_PATH .'/assets/img/CarPhotos/'.$sql_d_fetch['photo_fifteen'];
       list($width,$height,$type,$attr) = getimagesize($link);
       $aspectRatio = $width/$height;
         if ($aspectRatio >= 1.28 && $aspectRatio <=1.38)
         {
             echo 'height:100%;';
             echo 'width:100%;';
             echo 'object-fit:cover;';
         }
         else {
           if ($width > $height)
           {
             echo 'height:80%;';
           echo 'width:100%;';
           }
           else {
             echo 'height:100%;';
             echo 'width:80%;';
           }
         }echo " 'src='".BASE_URL ." /assets/img/CarPhotos/".$sql_d_fetch['photo_fifteen']."' alt='".$sql_d_fetch['photo_fifteen']."'/>
       </li>";
}
if (!empty($sql_d_fetch['photo_sixteen']))
{
  echo "
       <li>
       <img style='";
        $link = ROOT_PATH .'/assets/img/CarPhotos/'.$sql_d_fetch['photo_sixteen'];
       list($width,$height,$type,$attr) = getimagesize($link);
       $aspectRatio = $width/$height;
         if ($aspectRatio >= 1.28 && $aspectRatio <=1.38)
         {
             echo 'height:100%;';
             echo 'width:100%;';
             echo 'object-fit:cover;';
         }
         else {
           if ($width > $height)
           {
             echo 'height:80%;';
           echo 'width:100%;';
           }
           else {
             echo 'height:100%;';
             echo 'width:80%;';
           }
         }echo " 'src='".BASE_URL ." /assets/img/CarPhotos/".$sql_d_fetch['photo_sixteen']."' alt='".$sql_d_fetch['photo_sixteen']."'/>
       </li>";
}
if (!empty($sql_d_fetch['photo_seventeen']))
{
  echo "
       <li>
       <img style='";
        $link = ROOT_PATH .'/assets/img/CarPhotos/'.$sql_d_fetch['photo_seventeen'];
       list($width,$height,$type,$attr) = getimagesize($link);
       $aspectRatio = $width/$height;
         if ($aspectRatio >= 1.28 && $aspectRatio <=1.38)
         {
             echo 'height:100%;';
             echo 'width:100%;';
             echo 'object-fit:cover;';
         }
         else {
           if ($width > $height)
           {
             echo 'height:80%;';
           echo 'width:100%;';
           }
           else {
             echo 'height:100%;';
             echo 'width:80%;';
           }
         }echo " 'src='".BASE_URL ." /assets/img/CarPhotos/".$sql_d_fetch['photo_seventeen']."' alt='".$sql_d_fetch['photo_seventeen']."'/>
       </li>";
}
if (!empty($sql_d_fetch['photo_eighteen']))
{
  echo "
       <li>
       <img style='";
        $link = ROOT_PATH .'/assets/img/CarPhotos/'.$sql_d_fetch['photo_eighteen'];
       list($width,$height,$type,$attr) = getimagesize($link);
       $aspectRatio = $width/$height;
         if ($aspectRatio >= 1.28 && $aspectRatio <=1.38)
         {
             echo 'height:100%;';
             echo 'width:100%;';
             echo 'object-fit:cover;';
         }
         else {
           if ($width > $height)
           {
             echo 'height:80%;';
           echo 'width:100%;';
           }
           else {
             echo 'height:100%;';
             echo 'width:80%;';
           }
         }echo " 'src='".BASE_URL ." /assets/img/CarPhotos/".$sql_d_fetch['photo_eighteen']."' alt='".$sql_d_fetch['photo_eighteen']."'/>
       </li>";
}
if (!empty($sql_d_fetch['photo_nineteen']))
{
  echo "
       <li>
       <img style='";
        $link = ROOT_PATH .'/assets/img/CarPhotos/'.$sql_d_fetch['photo_nineteen'];
       list($width,$height,$type,$attr) = getimagesize($link);
       $aspectRatio = $width/$height;
         if ($aspectRatio >= 1.28 && $aspectRatio <=1.38)
         {
             echo 'height:100%;';
             echo 'width:100%;';
             echo 'object-fit:cover;';
         }
         else {
           if ($width > $height)
           {
             echo 'height:80%;';
           echo 'width:100%;';
           }
           else {
             echo 'height:100%;';
             echo 'width:80%;';
           }
         }echo " 'src='".BASE_URL ." /assets/img/CarPhotos/".$sql_d_fetch['photo_nineteen']."' alt='".$sql_d_fetch['photo_nineteen']."'/>
       </li>";
}
echo "
          </ul>

";
  }*/
}



function profileLeftPane()
{
  global $conn;
$u_idd = base64_decode(hex2bin($_GET['u_id']));
  $sql_left_vw = "SELECT * FROM vw_vehicle_details WHERE user_id = '$u_idd'";
  $sql_left_vw_exec = mysqli_query($conn,$sql_left_vw);
  $sql_num_rows = mysqli_num_rows($sql_left_vw_exec);

if ($sql_left_vw_exec)
{
    echo
    "
    <div><span>number of added vehicles</span> <span>".$sql_num_rows."</span></div>
    ";
}
else
{
  echo
  "
  <div></div>
  ";
}
}



function profileMiddlePane()
{
  global $conn;
$u_idd = base64_decode(hex2bin($_GET['u_id']));
  $sql_left_vw = "SELECT * FROM vw_user WHERE id = '$u_idd'";
  $sql_left_vw_exec = mysqli_query($conn,$sql_left_vw);

if ($sql_left_vw_exec)
{
  while ($sql_left_vw_fetch = mysqli_fetch_assoc($sql_left_vw_exec))
  {
    echo
    "
    <div><span>date of registration</span> <span>".$sql_left_vw_fetch['date_of_registration']."  ".$sql_left_vw_fetch['time_of_registration']."</span></div>
    ";
  }
}
else
{
  echo
  "
  <div></div>
  ";
}
}



function profileRightPane()
{
  global $conn;
$u_idd = base64_decode(hex2bin($_GET['u_id']));
  $sql_left_vw = "SELECT * FROM vw_user WHERE id = '$u_idd'";
  $sql_left_vw_exec = mysqli_query($conn,$sql_left_vw);

if ($sql_left_vw_exec)
{
  while ($sql_left_vw_fetch = mysqli_fetch_assoc($sql_left_vw_exec))
  {
    echo
    "
    <div><span>last seen</span> <span>".$sql_left_vw_fetch['last_login_date']."  ".$sql_left_vw_fetch['last_login_time']."</span></div>
    ";
  }
}
else
{
  echo
  "
  <div></div>
  ";
}
}






function SliderConfig()
{
  global $conn;
  $sql = "SELECT * FROM vw_slider_config";
  $sql_exec = mysqli_query($conn,$sql);

  if ($sql_exec)
  {
    while ($sql_exec_fetch = mysqli_fetch_assoc($sql_exec))
    {
      echo "
      <div class='swiper-slide'><img src='".BASE_URL."/assets/img/CarPhotos/".$sql_exec_fetch['image']."'>
        <div class='slider_caption'>
         <a style='color:".$sql_exec_fetch['font_color']."; font-size:".$sql_exec_fetch['font_size']."px;'>".$sql_exec_fetch['line_one']."</a>
         <a style='color:".$sql_exec_fetch['font_color']."; font-size:".$sql_exec_fetch['font_size']."px;'>".$sql_exec_fetch['line_two']."</a>
        </div>
      </div>
      ";
    }
  }
}



function HomepageLeftAd()
{
  global $conn;
$sql_ad = "SELECT * FROM vw_advertisement_left WHERE type_of_ad = 1";
$sql_ad_exec = mysqli_query($conn,$sql_ad);
if ($sql_ad_exec)
{
while ($sql_ad_fetch = mysqli_fetch_assoc($sql_ad_exec))
{
echo "
<div class='left_add'>
<a ";
if (!empty($sql_ad_fetch['advertising_left_link']))
{
  echo "href='".$sql_ad_fetch['advertising_left_link']."' target='_blank'";
}
echo ">";
if (!empty($sql_ad_fetch['homepage_left_ad']))
{
  echo "<img src='".BASE_URL."/assets/img/CarPhotos/".$sql_ad_fetch['homepage_left_ad']."'>";

}

echo "
</a>
</div>
";
}

}

}




function HomepageRightAd()
{
  global $conn;
$sql_ad = "SELECT * FROM vw_advertisement_right WHERE type_of_ad = 1";
$sql_ad_exec = mysqli_query($conn,$sql_ad);
if ($sql_ad_exec)
{
while ($sql_ad_fetch = mysqli_fetch_assoc($sql_ad_exec))
{
echo "
<div class='right_add'>
<a ";
if (!empty($sql_ad_fetch['advertising_right_link']))
{
  echo "href='".$sql_ad_fetch['advertising_right_link']."' target='_blank'";
}
echo ">";
if (!empty($sql_ad_fetch['homepage_right_ad']))
{
  echo "<img src='".BASE_URL."/assets/img/CarPhotos/".$sql_ad_fetch['homepage_right_ad']."'>";
}
echo "
</a>
</div>
";

}

}

}






function GalleryLeftAd()
{
  global $conn;
$sql_gd = "SELECT * FROM vw_advertisement_left WHERE type_of_ad = 3";
$sql_gd_exec = mysqli_query($conn,$sql_gd);
if ($sql_gd_exec)
{
while ($sql_gd_fetch = mysqli_fetch_assoc($sql_gd_exec))
{
echo "
<div class='fs_left_ad'>
<a ";
if (!empty($sql_gd_fetch['advertising_left_link']))
{
  echo "href='".$sql_gd_fetch['advertising_left_link']."' target='_blank'";
}
echo ">";
if (!empty($sql_gd_fetch['gallery_left_ad']))
{
  echo "<img src='".BASE_URL."/assets/img/CarPhotos/".$sql_gd_fetch['gallery_left_ad']."'>";
}
echo "
</a>
</div>
";
}

}

}






function GalleryRightAd()
{
  global $conn;
$sql_ad = "SELECT * FROM vw_advertisement_right WHERE type_of_ad = 3";
$sql_ad_exec = mysqli_query($conn,$sql_ad);
if ($sql_ad_exec)
{
while ($sql_ad_fetch = mysqli_fetch_assoc($sql_ad_exec))
{
echo "
<div class='fs_right_ad'>
<a ";
if (!empty($sql_ad_fetch['advertising_right_link']))
{
  echo "href='".$sql_ad_fetch['advertising_right_link']."' target='_blank'";
}
echo ">";
if (!empty($sql_ad_fetch['gallery_right_ad']))
{
  echo "<img src='".BASE_URL."/assets/img/CarPhotos/".$sql_ad_fetch['gallery_right_ad']."'>";
}
echo "
</a>
</div>
";

}

}

}





function VehicleDetailsLeftAd()
{
  global $conn;
$sql_ad = "SELECT * FROM vw_advertisement_left WHERE type_of_ad = 2";
$sql_ad_exec = mysqli_query($conn,$sql_ad);
if ($sql_ad_exec)
{
while ($sql_ad_fetch = mysqli_fetch_assoc($sql_ad_exec))
{
echo "
<div class='car_content_left_ad'>
<a ";
if (!empty($sql_ad_fetch['advertising_left_link']))
{
  echo "href='".$sql_ad_fetch['advertising_left_link']."' target='_blank'";
}
echo ">";
if (!empty($sql_ad_fetch['vehicle_details_left_ad']))
{
  echo "<img src='".BASE_URL."/assets/img/CarPhotos/".$sql_ad_fetch['vehicle_details_left_ad']."'>";
}
echo "
</a>
</div>
";
}

}

}




function VehicleDetailsRightAd()
{
  global $conn;
$sql_ad = "SELECT * FROM vw_advertisement_right WHERE type_of_ad = 2";
$sql_ad_exec = mysqli_query($conn,$sql_ad);
if ($sql_ad_exec)
{
while ($sql_ad_fetch = mysqli_fetch_assoc($sql_ad_exec))
{
echo "
<div class='car_content_right_ad'>
<a ";
if (!empty($sql_ad_fetch['advertising_right_link']))
{
  echo "href='".$sql_ad_fetch['advertising_right_link']."' target='_blank'";
}
echo ">";
if (!empty($sql_ad_fetch['vehicle_details_right_ad']))
{
  echo "<img src='".BASE_URL."/assets/img/CarPhotos/".$sql_ad_fetch['vehicle_details_right_ad']."'>";
}
echo "
</a>
</div>
";

}

}

}
?>
