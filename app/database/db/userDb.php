<?php
include(ROOT_PATH . '/app/database/connection/conn.php');

/* login database connection */

function Login()
{

global $conn;
$login_usrname = stripcslashes($_POST['username']);
$login_pswd = stripcslashes($_POST['password']);
$login_sbmt = stripcslashes($_POST['submit']);

$login_usrname = mysqli_real_escape_string($conn,$login_usrname);
$login_pswd = mysqli_real_escape_string($conn,$login_pswd);
$login_sbmt = mysqli_real_escape_string($conn,$login_sbmt);


$lgn_sql = "SELECT * FROM vs_user WHERE username = '$login_usrname' AND blocked != 1";
$lgn_sql_execute = mysqli_query($conn,$lgn_sql);
$lgn_sql_fetch = mysqli_fetch_assoc($lgn_sql_execute);


$login_ip = $_SERVER['REMOTE_ADDR'];
$login_date = date('d.m.Y');
$login_time = date('h:i:s');



//die($lgn_sql);
echo "
<script>
$('.loading_screen').show();
</script>
";

if(isset($login_sbmt) && $lgn_sql_fetch && password_verify($login_pswd,$lgn_sql_fetch['password']))
{
  $upd_lgn_sql = "UPDATE vs_user SET ip_of_last_login = '$login_ip', last_login_date = '$login_date', last_login_time = '$login_time' WHERE id = '$lgn_sql_fetch[id]'";
  $upd_lgn_sql_execute = mysqli_query($conn,$upd_lgn_sql);
//die($upd_lgn_sql);
  /*&& (password_verify($login_pswd,$lgn_sql_fetch['password']))*/
if ($lgn_sql_fetch && $upd_lgn_sql_execute)
{
  //echo "string";
//$sql_lgn_status = "UPDATE vs_user SET status='0', current_date_online='$curr_date', current_time_online='$curr_time' WHERE email='$login_email'";
//$sql_execute_lgn_status = mysqli_query($conn,$sql_lgn_status);
if ($lgn_sql_fetch['registration_key_active_status'] == 0)
{
  $_SESSION['id'] = $lgn_sql_fetch['id'];
  $_SESSION['username'] = $lgn_sql_fetch['username'];
  $_SESSION['email'] = $lgn_sql_fetch['email'];
  $_SESSION['status'] = $lgn_sql_fetch['status'];
  $_SESSION['user'] = 'logged';
  $_SESSION['user_image'] = $lgn_sql_fetch['avatar'];
  echo "<script>
  $(document).ready(function() {
  window.location.href ='" . BASE_URL . "';
  });</script>";
}
elseif($lgn_sql_fetch['registration_key_active_status'] == 1)
{
$_SESSION['unactive_msg'] = 1;
echo "<script>
$(document).ready(function() {
window.location.href ='" . BASE_URL . "';
});</script>";
}
else
{
  echo "<script>
  $(document).ready(function() {
  window.location.href ='" . BASE_URL . "';
  });</script>";
}

}
else
{
  echo "
  <script>
  $('.loading_screen').hide();
  </script>
  ";
echo "* Wrong credentials *";
}

}

else
{

  echo "
  <script>
  $('.loading_screen').hide();
  </script>
  ";
echo "Could not Login User";
}

}



function Signup()
{
global $conn;
echo "
<script>
$('.loading_screen').show();
</script>
";
       /* stripcslashes */
$username = stripcslashes($_POST['username']);
$emal = stripcslashes($_POST['email']);
$pswd = stripcslashes($_POST['password']);
$pswd_conf = stripcslashes($_POST['conf_password']);
$user_ip = $_SERVER['REMOTE_ADDR'];
$curr_on_date = date('d.m.y');
$curr_on_date_two = date('Y-m-d');
$curr_on_time = date('h:i:s');
$profile_pic = 'p_icon.png';
       /* stripcslashes */

       /* mysqli real escape string(prevent sql injection) */
$username = mysqli_real_escape_string($conn,$username);
$pswd = mysqli_real_escape_string($conn,$pswd);
$pswd_conf = mysqli_real_escape_string($conn,$pswd_conf);
$emal = filter_var($emal, FILTER_SANITIZE_EMAIL);
$emal = mysqli_real_escape_string($conn,$emal);
$user_ip = mysqli_real_escape_string($conn,$user_ip);
$curr_on_date =  mysqli_real_escape_string($conn,$curr_on_date);
$curr_on_time =  mysqli_real_escape_string($conn,$curr_on_time);
       /* mysqli real escape string(prevent sql injection) */


$existing_user = ValidateSignup();

if ($pswd != $pswd_conf)
{
  echo "
  <script>
  $('.loading_screen').hide();
  </script>
  ";
  echo "Passwords do not match";
}

elseif (strlen($username) <= 0 || strlen($pswd) <= 0 || strlen($pswd_conf) <= 0 || strlen($emal) <= 0)
{
  echo "
  <script>
  $('.loading_screen').hide();
  </script>
  ";
  echo "Please fill all fields";
}

elseif (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $username))
{
  echo "
  <script>
  $('.loading_screen').hide();
  </script>
  ";
  echo "Please use non special characters(#$%^&*?/)";
}
elseif (!filter_var($emal, FILTER_VALIDATE_EMAIL))
{
  echo "
  <script>
  $('.loading_screen').hide();
  </script>
  ";
  echo "Please make sure you are using the appropriate email";
}
elseif ($existing_user > 0)
{
  echo "
  <script>
  $('.loading_screen').hide();
  </script>
  ";
  echo "User with this e-mail already exist";
}

else
{
  echo " ";
  $hashedPassword = password_hash($pswd,PASSWORD_DEFAULT);
  $sgn_sql = "INSERT INTO vs_user(username,password,email,ip_of_registration,date_of_registration,date_of_registration_report,time_of_registration,avatar,registration_key_active_status) VALUES('$username','$hashedPassword','$emal','$user_ip','$curr_on_date','$curr_on_date_two','$curr_on_time','$profile_pic',1)";
  $sgn_sql_execute = mysqli_query($conn,$sgn_sql);
  //die($sgn_sql);
  if ($sgn_sql_execute)
  {
LoginSignup();
    echo "<script> window.location.href ='" . BASE_URL . "';</script>";
  }
  else
  {
    echo "**Error Could not Signup**";
  }
}

}


function ValidateSignup()
{
global $conn;
$emal = stripcslashes($_POST['email']);
$emal = mysqli_real_escape_string($conn,$emal);
$usernamm = stripcslashes($_POST['username']);
$usernamm = mysqli_real_escape_string($conn,$usernamm);
$sgn_sql_select = "SELECT * FROM vw_user WHERE email = '$emal' AND username = '$usernamm'";
$sgn_sql_execute_select = mysqli_query($conn,$sgn_sql_select);
$sgn_sql_fetch_select = mysqli_fetch_assoc($sgn_sql_execute_select);
$sgn_num_rows = mysqli_num_rows($sgn_sql_execute_select);
return $sgn_num_rows;
}

function LoginSignup()
{
global $conn;
$usernam = stripcslashes($_POST['username']);
$usernam = mysqli_real_escape_string($conn,$usernam);
$eml = stripcslashes($_POST['email']);
$eml = mysqli_real_escape_string($conn,$eml);
//echo $phone_no;
$lgn_sgn_sql_select = "SELECT * FROM vw_user WHERE email = '$eml' AND username = '$usernam'";
$lgn_sgn_sql_execute_select = mysqli_query($conn,$lgn_sgn_sql_select);
$lgn_sgn_sql_fetch_select = mysqli_fetch_assoc($lgn_sgn_sql_execute_select);
$lgn_sgn_sql_num_rows_select = mysqli_num_rows($lgn_sgn_sql_execute_select);
if (($lgn_sgn_sql_num_rows_select > 0) && ($lgn_sgn_sql_fetch_select['registration_key_active_status'] == 0))
{
  $_SESSION['id'] = $lgn_sgn_sql_fetch_select['id'];
  $_SESSION['username'] = $lgn_sgn_sql_fetch_select['username'];
  $_SESSION['email'] = $lgn_sgn_sql_fetch_select['email'];
  $_SESSION['status'] = $lgn_sgn_sql_fetch_select['status'];
  $_SESSION['user_image'] = $lgn_sgn_sql_fetch_select['avatar'];
  include(ROOT_PATH . '/controllers/emailTemplates/newRegistrationMail.php');
}
elseif (($lgn_sgn_sql_num_rows_select > 0) && ($lgn_sgn_sql_fetch_select['registration_key_active_status'] == 1))
{
include(ROOT_PATH . '/controllers/emailTemplates/newRegistrationMail.php');
setcookie('unactive_msg', 1, time() + 3600);
}


}



function UserPanelLeftDetails()
{
  global $conn;

  $sql_left_vw = "SELECT * FROM vw_user WHERE id = '$_SESSION[id]'";
  $sql_left_vw_exec = mysqli_query($conn,$sql_left_vw);

  $sql_left_nmr = "SELECT * FROM vw_vehicle_details WHERE user_id = '$_SESSION[id]'";
  $sql_left_nmr_exec = mysqli_query($conn,$sql_left_nmr);
  $sql_left_nmr_num_rows = mysqli_num_rows($sql_left_nmr_exec);

if ($sql_left_vw_exec)
{
  while ($sql_left_vw_fetch = mysqli_fetch_assoc($sql_left_vw_exec))
  {
    echo
    "
    <div><span>username</span> <span>".$sql_left_vw_fetch['username']."</span></div>
    <div><span>number of vehicles</span> <span>".$sql_left_nmr_num_rows."</span></div>
    <div><span>date of registration</span> <span>".$sql_left_vw_fetch['date_of_registration']."</span></div>
    ";
  }
}
else
{
  echo
  "
  <div><span>username</span> <span></span></div>
  <div><span>number of vehicles</span> <span></span></div>
  <div><span>date of registration</span> <span></span></div>
  ";
}

}



function UserPanelRightDetails()
{
  global $conn;

  $sql_right_vw = "SELECT * FROM vw_user WHERE id = '$_SESSION[id]'";
  $sql_right_vw_exec = mysqli_query($conn,$sql_right_vw);

if ($sql_right_vw_exec)
{
  while ($sql_right_vw_fetch = mysqli_fetch_assoc($sql_right_vw_exec))
  {
    echo
    "
    <div><a>email</a> <a href='".BASE_URL."/user/change_details'><span> <span>change</span> </a> <a>".substr($sql_right_vw_fetch['email'],0,8)."...</a></div>
    <div><a>password</a> <a href='".BASE_URL."/user/change_details'><span> <span>change</span> </a> <a>***</a></div>
    <div><a>avatar</a> <a href='".BASE_URL."/user/change_details'><span> <span>change</span> </a> <a><img src='".BASE_URL."/assets/img/avatar/".$sql_right_vw_fetch['avatar']."'></a></a></div>
    ";
  }
}
else
{
  echo
  "
  <div><a>email</a></div>
  <div><a>password</a></div>
  <div><a>avatar</a></div>
  ";
}



}


function VehicleDetails()
{
  global $conn;

  if (isset($_POST['order']))
  {
  $order = $_POST['order'];
  }
  else
  {
  $order = 'ASC';
  }


  if (isset($_POST['sort']))
  {
  $sort = $_POST['sort'];
  }
  else
  {
  $sort = 'id';
  }

    if (isset($_POST['entries']))
    {
      $rpp = $_POST['entries'];
    }
    elseif (isset($_GET['entries']))
    {
      $rpp = $_GET['entries'];
    }
    else
    {
        $rpp = 10;
    }

  if (isset($_GET['page']))
  {
    $a =  (ltrim(($_GET['page']-1), "0")).$_GET['page'];
    $page = $_GET['page'];
  }
  else
  {
    $a = 1;
    $page = 0;
  }

  if ($page > 1)
  {
    $start = ($page * $rpp) - $rpp;
  }
  else
  {
    $start = 0;
  }




if (!empty($_SESSION['user_idd']) && isset($_SESSION['user_idd']))
{
  $id = $_SESSION['user_idd'];
}
elseif (isset($_POST['user_idd']))
{
$id = $_POST['user_idd'];
}
else
{
  $id = $_SESSION['id'];
}
  if(empty($_POST['search']))
  {
    $search = "WHERE user_id =".$id." AND verified = 1";
  }
  else
  {
    $keyword =  trim($_POST['search']);
    $search = "WHERE user_id =".$id." AND (type_of_vehicle LIKE '%$keyword%') AND (brand LIKE '%$keyword%') OR (model LIKE '%$keyword%') OR (year_of_production LIKE '%$keyword%') OR (date_added LIKE '%$keyword%') OR (last_modification LIKE '%$keyword%')";
  }

  $sql_vd = "SELECT * FROM vw_vehicle_details $search  ORDER BY $sort $order LIMIT $start, $rpp";
  $sql_vd_exec = mysqli_query($conn,$sql_vd);
  //die($sql_vd);
if ($sql_vd_exec)
{
  while ($sql_vd_fetch = mysqli_fetch_assoc($sql_vd_exec))
  {

    echo"
<tr class='myclass'>
      <td><span>".$a++."</span></td>
      <td><span>".$sql_vd_fetch['type_of_vehicle']."</span></td>
      <td><span>".$sql_vd_fetch['brand']."</span></td>
      <td><span>".$sql_vd_fetch['model']."</span></td>
      <td><span>".$sql_vd_fetch['year_of_production']."</span></td>
      <td><span>".$sql_vd_fetch['date_added']."</span></td>
      <td><span>".$sql_vd_fetch['last_modification']."</span></td>
      <td><span>";
       $date1 = date('Y-m-d');
       $date2 = $sql_vd_fetch['announcement_expire_date'];

      $diff = strtotime($date2) - strtotime($date1);
      $days = $diff / (60*60*24);

      if ($days <= 0)
      {
        echo "0";
      }
      else {
        echo $days;
      }
      echo "</span></td>
      <td id='action_btns'><a id='edt_btn' href='edit?id=".bin2hex(base64_encode($sql_vd_fetch['id']))."&u_id=".bin2hex(base64_encode($sql_vd_fetch['user_id']))."'>Edit</a><button id='del_btn' type='button' name='button' value='".bin2hex(base64_encode($sql_vd_fetch['id']))."''>Delete</button></td>
</tr>

    ";
  }
}
else
{
  echo
  "
  <tr class='myclass'>
        <td><span></span></td>
        <td><span></span></td>
        <td><span></span></td>
        <td><span></span></td>
        <td><span></span></td>
        <td><span></span></td>
        <td><span></span></td>
        <td><span></span></td>
  </tr>
  ";
}

}





function VehicleDetailsHighlighted()
{
  global $conn;

    if (isset($_POST['entries']))
    {
      $rpp = $_POST['entries'];
    }
    elseif (isset($_GET['entries']))
    {
      $rpp = $_GET['entries'];
    }
    else
    {
        $rpp = 10;
    }

  if (isset($_GET['page']))
  {
    $a =  (ltrim(($_GET['page']-1), "0")).$_GET['page'];
    $page = $_GET['page'];
  }
  else
  {
    $a = 1;
    $page = 0;
  }

  if ($page > 1)
  {
    $start = ($page * $rpp) - $rpp;
  }
  else
  {
    $start = 0;
  }

  if(empty($_POST['search']))
  {
    $search = "WHERE verified = 1";
  }
  else
  {
    $keyword =  trim($_POST['search']);
    $search = "WHERE verified = 1 AND (type_of_vehicle LIKE '%$keyword%') OR (brand LIKE '%$keyword%') OR (model LIKE '%$keyword%') OR (year_of_production LIKE '%$keyword%') OR (date_added LIKE '%$keyword%') OR (last_modification LIKE '%$keyword%')";
  }

  $sql_vd = "SELECT * FROM vw_vehicle_details $search  ORDER BY id ASC LIMIT $start, $rpp";
  $sql_vd_exec = mysqli_query($conn,$sql_vd);
//die($sql_vd);
if ($sql_vd_exec)
{
  while ($sql_vd_fetch = mysqli_fetch_assoc($sql_vd_exec))
  {

    echo"
<tr class='myclass'>
      <td><span>".$a++."</span></td>
      <td><span>".$sql_vd_fetch['type_of_vehicle']."</span></td>
      <td><span>".$sql_vd_fetch['brand']."</span></td>
      <td><span>".$sql_vd_fetch['model']."</span></td>
      <td><span>".$sql_vd_fetch['year_of_production']."</span></td>
      <td><span>".$sql_vd_fetch['date_added']."</span></td>
      <td><span>".$sql_vd_fetch['last_modification']."</span></td>
      <td><input type='checkbox' name='sel_highlight' id='chkbx_high_val' value='".$sql_vd_fetch['id']."'></td>
      <td><input type='hidden' name='sel_hidden' id='chkbx_high_val_hidden'><span id='chkbx_high_seq'></span></td>
</tr>

    ";
  }
}
else
{
  echo
  "
  <tr class='myclass'>
        <td><span></span></td>
        <td><span></span></td>
        <td><span></span></td>
        <td><span></span></td>
        <td><span></span></td>
        <td><span></span></td>
        <td><span></span></td>
        <td><span></span></td>
  </tr>
  ";
}

}





function ProfileVehicleDetails()
{
  global $conn;


    if (isset($_POST['order']))
    {
    $order = $_POST['order'];
    }
    else
    {
    $order = 'ASC';
    }


    if (isset($_POST['sort']))
    {
    $sort = $_POST['sort'];
    }
    else
    {
    $sort = 'id';
    }

      if (isset($_POST['entries']))
      {
        $rpp = $_POST['entries'];
      }
      elseif (isset($_GET['entries']))
      {
        $rpp = $_GET['entries'];
      }
      else
      {
          $rpp = 10;
      }

    if (isset($_GET['page']))
    {
      $a =  (ltrim(($_GET['page']-1), "0")).$_GET['page'];
      $page = $_GET['page'];
    }
    else
    {
      $a = 1;
      $page = 0;
    }

    if ($page > 1)
    {
      $start = ($page * $rpp) - $rpp;
    }
    else
    {
      $start = 0;
    }




if (isset($_SESSION['user_idd']))
{
$u_idd = $_SESSION['user_idd'];
}
else
{
$u_idd = base64_decode(hex2bin($_GET['u_id']));
}




    if(empty($_POST['search']))
    {
      $search = "WHERE user_id =".$u_idd." AND verified = 1";
    }
    else
    {
      $keyword =  trim($_POST['search']);
      $search = "WHERE user_id =".$u_idd." AND (type_of_vehicle LIKE '%$keyword%') AND (brand LIKE '%$keyword%') OR (model LIKE '%$keyword%') OR (year_of_production LIKE '%$keyword%') OR (date_added LIKE '%$keyword%') OR (last_modification LIKE '%$keyword%')";
    }

    $sql_vd = "SELECT * FROM vw_vehicle_details $search  ORDER BY $sort $order LIMIT $start, $rpp";
    $sql_vd_exec = mysqli_query($conn,$sql_vd);
  //die($sql_vd);
//die($sql_vd);
if ($sql_vd_exec)
{
  while ($sql_vd_fetch = mysqli_fetch_assoc($sql_vd_exec))
  {

    echo"
<tr class='myclass'>
      <td><span>".$a++."</span></td>
      <td><span>".$sql_vd_fetch['type_of_vehicle']."</span></td>
      <td><span>".$sql_vd_fetch['brand']."</span></td>
      <td><span>".$sql_vd_fetch['model']."</span></td>
      <td><span>".$sql_vd_fetch['year_of_production']."</span></td>
      <td><span>".$sql_vd_fetch['date_added']."</span></td>
      <td><span>".$sql_vd_fetch['last_modification']."</span></td>
      <td><span>";
      $date1 = date('Y-m-d');
      $date2 = $sql_vd_fetch['announcement_expire_date'];

$diff = strtotime($date2) - strtotime($date1);

$days = $diff / (60*60*24);

      if ($days <= 0)
      {
        echo "0";
      }
      else {
        echo $days;
      }
      echo "</span></td>

      <td id='action_btns'><a id='edt_btn' href='".BASE_URL."/vehicle_details/".bin2hex(base64_encode($sql_vd_fetch['id']))."/".$sql_vd_fetch['brand'].",".$sql_vd_fetch['model']."'>show</a></td>
</tr>

    ";
  }
}
else
{
  echo
  "
  <tr class='myclass'>
        <td><span></span></td>
        <td><span></span></td>
        <td><span></span></td>
        <td><span></span></td>
        <td><span></span></td>
        <td><span></span></td>
        <td><span></span></td>
        <td><span></span></td>
  </tr>
  ";
}

}






function InsertVehicle()
{

  global $conn;

  $brand = mysqli_real_escape_string($conn,trim($_POST['brand']));
  $model = mysqli_real_escape_string($conn,trim($_POST['model']));
  $year_of_production = mysqli_real_escape_string($conn,trim($_POST['year_of_production']));
  $type_of_vehicle = mysqli_real_escape_string($conn,trim($_POST['type_of_vehicle']));
  $engine_capacity = mysqli_real_escape_string($conn,trim($_POST['engine_capacity']));
  $engine_power = mysqli_real_escape_string($conn,trim($_POST['engine_power']));
  $fuel_type = mysqli_real_escape_string($conn,trim($_POST['fuel_type']));
  $transmission = mysqli_real_escape_string($conn,trim($_POST['transmission']));
  $drive = mysqli_real_escape_string($conn,trim($_POST['drive']));
  $max_speed = mysqli_real_escape_string($conn,trim($_POST['max_speed']));
  $no_of_doors = mysqli_real_escape_string($conn,trim($_POST['no_of_doors']));
  $no_of_seats = mysqli_real_escape_string($conn,trim($_POST['no_of_seats']));
  $mileage = mysqli_real_escape_string($conn,trim($_POST['mileage']));
  $country_of_origin = mysqli_real_escape_string($conn,trim($_POST['country_of_origin']));
  $estimated_value = mysqli_real_escape_string($conn,trim($_POST['estimated_value']));
  $y_o_p_b_c_o = mysqli_real_escape_string($conn,trim($_POST['y_o_p_b_c_o']));
  $location_voivodship = mysqli_real_escape_string($conn,trim($_POST['location_voivodship']));
  $location_district = mysqli_real_escape_string($conn,trim($_POST['location_district']));
  $date_added = date("Y.m.d");
  $time_added = date('H:i:s');
  $s_v_h_t_p = mysqli_real_escape_string($conn,str_replace("'", "''", trim($_POST['s_v_h_t_p'])));
  $u_a_e_o_v = mysqli_real_escape_string($conn,str_replace("'", "''", trim($_POST['u_a_e_o_v'])));
  $i_e_l_t_t_v = mysqli_real_escape_string($conn,str_replace("'", "''", trim($_POST['i_e_l_t_t_v'])));
  $advantages_of_vehicle = mysqli_real_escape_string($conn,str_replace("'", "''", trim($_POST['advantages_of_vehicle'])));
  $d_o_v_c = mysqli_real_escape_string($conn,str_replace("'", "''", trim($_POST['d_o_v_c'])));
  $h_a_o_o_v = mysqli_real_escape_string($conn,str_replace("'", "''", trim($_POST['h_a_o_o_v'])));
  $problems_with_vehicle = mysqli_real_escape_string($conn,str_replace("'", "''", trim($_POST['problems_with_vehicle'])));
  $announcement = mysqli_real_escape_string($conn,str_replace("'", "''", trim($_POST['announcement'])));
$date_added_announcement = date('Y-m-d');
$announcement_expire_date = date('Y-m-d', strtotime($date_added_announcement. ' + 6 days'));
//die($_POST['admin_allow']);
  if (!empty($_POST['admin_allow']) && !empty($_POST['u_id']) && !empty($_POST['email']))
  {
    $user_id = mysqli_real_escape_string($conn,trim(base64_decode(hex2bin($_POST['u_id']))));
    $email = mysqli_real_escape_string($conn,trim($_POST['email']));
  }
  else
  {
    $email =  mysqli_real_escape_string($conn,trim($_SESSION['email']));
    $user_id = mysqli_real_escape_string($conn,trim($_SESSION['id']));
  }
  $submit = mysqli_real_escape_string($conn,trim($_POST['submit']));


  $cp_main_image = mysqli_real_escape_string($conn,$_POST['caption_main_photo']);
  $cp_image_one = mysqli_real_escape_string($conn,$_POST['caption_photo_one']);
  $cp_image_two = mysqli_real_escape_string($conn,$_POST['caption_photo_two']);
  $cp_image_three = mysqli_real_escape_string($conn,$_POST['caption_photo_three']);
  $cp_image_four = mysqli_real_escape_string($conn,$_POST['caption_photo_four']);
  $cp_image_five = mysqli_real_escape_string($conn,$_POST['caption_photo_five']);
  $cp_image_six = mysqli_real_escape_string($conn,$_POST['caption_photo_six']);
  $cp_image_seven = mysqli_real_escape_string($conn,$_POST['caption_photo_seven']);
  $cp_image_eight = mysqli_real_escape_string($conn,$_POST['caption_photo_eight']);
  $cp_image_nine = mysqli_real_escape_string($conn,$_POST['caption_photo_nine']);
  $cp_image_ten = mysqli_real_escape_string($conn,$_POST['caption_photo_ten']);
  $cp_image_eleven = mysqli_real_escape_string($conn,$_POST['caption_photo_eleven']);
  $cp_image_twelve = mysqli_real_escape_string($conn,$_POST['caption_photo_twelve']);
  $cp_image_thirteen = mysqli_real_escape_string($conn,$_POST['caption_photo_thirteen']);
  $cp_image_fourteen = mysqli_real_escape_string($conn,$_POST['caption_photo_fourteen']);
  $cp_image_fifteen = mysqli_real_escape_string($conn,$_POST['caption_photo_fifteen']);
  $cp_image_sixteen = mysqli_real_escape_string($conn,$_POST['caption_photo_sixteen']);
  $cp_image_seventeen = mysqli_real_escape_string($conn,$_POST['caption_photo_seventeen']);
  $cp_image_eighteen = mysqli_real_escape_string($conn,$_POST['caption_photo_eighteen']);
  $cp_image_nineteen = mysqli_real_escape_string($conn,$_POST['caption_photo_nineteen']);
  $cp_image_twenty = mysqli_real_escape_string($conn,$_POST['caption_photo_twenty']);

  $main_image = mysqli_real_escape_string($conn,$_FILES['main_photo']['name']);
  $image_one = mysqli_real_escape_string($conn,$_FILES['photo_one']['name']);
  $image_two = mysqli_real_escape_string($conn,$_FILES['photo_two']['name']);
  $image_three = mysqli_real_escape_string($conn,$_FILES['photo_three']['name']);
  $image_four = mysqli_real_escape_string($conn,$_FILES['photo_four']['name']);
  $image_five = mysqli_real_escape_string($conn,$_FILES['photo_five']['name']);
  $image_six = mysqli_real_escape_string($conn,$_FILES['photo_six']['name']);
  $image_seven = mysqli_real_escape_string($conn,$_FILES['photo_seven']['name']);
  $image_eight = mysqli_real_escape_string($conn,$_FILES['photo_eight']['name']);
  $image_nine = mysqli_real_escape_string($conn,$_FILES['photo_nine']['name']);
  $image_ten = mysqli_real_escape_string($conn,$_FILES['photo_ten']['name']);
  $image_eleven = mysqli_real_escape_string($conn,$_FILES['photo_eleven']['name']);
  $image_twelve = mysqli_real_escape_string($conn,$_FILES['photo_twelve']['name']);
  $image_thirteen = mysqli_real_escape_string($conn,$_FILES['photo_thirteen']['name']);
  $image_fourteen = mysqli_real_escape_string($conn,$_FILES['photo_fourteen']['name']);
  $image_fifteen = mysqli_real_escape_string($conn,$_FILES['photo_fifteen']['name']);
  $image_sixteen = mysqli_real_escape_string($conn,$_FILES['photo_sixteen']['name']);
  $image_seventeen = mysqli_real_escape_string($conn,$_FILES['photo_seventeen']['name']);
  $image_eighteen = mysqli_real_escape_string($conn,$_FILES['photo_eighteen']['name']);
  $image_nineteen = mysqli_real_escape_string($conn,$_FILES['photo_nineteen']['name']);
  $image_twenty = mysqli_real_escape_string($conn,$_FILES['photo_twenty']['name']);


  $tempmainphoto = $_FILES["main_photo"]["tmp_name"];
  $temp_image_one = $_FILES["photo_one"]["tmp_name"];
  $temp_image_two = $_FILES["photo_two"]["tmp_name"];
  $temp_image_three = $_FILES["photo_three"]["tmp_name"];
  $temp_image_four = $_FILES["photo_four"]["tmp_name"];
  $temp_image_five = $_FILES['photo_five']['name'];
  $temp_image_six = $_FILES['photo_six']['name'];
  $temp_image_seven = $_FILES['photo_seven']['name'];
  $temp_image_eight = $_FILES['photo_eight']['name'];
  $temp_image_nine = $_FILES['photo_nine']['name'];
  $temp_image_ten = $_FILES['photo_ten']['name'];
  $temp_image_eleven = $_FILES['photo_eleven']['name'];
  $temp_image_twelve = $_FILES['photo_twelve']['name'];
  $temp_image_thirteen = $_FILES['photo_thirteen']['name'];
  $temp_image_fourteen = $_FILES['photo_fourteen']['name'];
  $temp_image_fifteen = $_FILES['photo_fifteen']['name'];
  $temp_image_sixteen = $_FILES['photo_sixteen']['name'];
  $temp_image_seventeen = $_FILES['photo_seventeen']['name'];
  $temp_image_eighteen = $_FILES['photo_eighteen']['name'];
  $temp_image_nineteen = $_FILES['photo_nineteen']['name'];
  $temp_image_twenty = $_FILES['photo_twenty']['name'];




  $folder = ROOT_PATH . "/assets/img/CarPhotos/".$main_image;
  $additional_folder_one = ROOT_PATH . "/assets/img/CarPhotos/".$image_one;
  $additional_folder_two = ROOT_PATH . "/assets/img/CarPhotos/".$image_two;
  $additional_folder_three = ROOT_PATH . "/assets/img/CarPhotos/".$image_three;
  $additional_folder_four = ROOT_PATH . "/assets/img/CarPhotos/".$image_four;
  $additional_folder_one = ROOT_PATH . "/assets/img/CarPhotos/".$image_one;
  $additional_folder_two = ROOT_PATH . "/assets/img/CarPhotos/".$image_two;
  $additional_folder_three = ROOT_PATH . "/assets/img/CarPhotos/".$image_three;
  $additional_folder_four = ROOT_PATH . "/assets/img/CarPhotos/".$image_four;
  $additional_folder_five = ROOT_PATH . "/assets/img/CarPhotos/".$image_five;
  $additional_folder_six = ROOT_PATH . "/assets/img/CarPhotos/".$image_six;
  $additional_folder_seven = ROOT_PATH . "/assets/img/CarPhotos/".$image_seven;
  $additional_folder_eight = ROOT_PATH . "/assets/img/CarPhotos/".$image_eight;
  $additional_folder_nine = ROOT_PATH . "/assets/img/CarPhotos/".$image_nine;
  $additional_folder_ten = ROOT_PATH . "/assets/img/CarPhotos/".$image_ten;
  $additional_folder_eleven = ROOT_PATH . "/assets/img/CarPhotos/".$image_eleven;
  $additional_folder_twelve = ROOT_PATH . "/assets/img/CarPhotos/".$image_twelve;
  $additional_folder_thirteen = ROOT_PATH . "/assets/img/CarPhotos/".$image_thirteen;
  $additional_folder_fourteen = ROOT_PATH . "/assets/img/CarPhotos/".$image_fourteen;
  $additional_folder_fifteen = ROOT_PATH . "/assets/img/CarPhotos/".$image_fifteen;
  $additional_folder_sixteen = ROOT_PATH . "/assets/img/CarPhotos/".$image_sixteen;
  $additional_folder_seventeen = ROOT_PATH . "/assets/img/CarPhotos/".$image_seventeen;
  $additional_folder_eighteen = ROOT_PATH . "/assets/img/CarPhotos/".$image_eighteen;
  $additional_folder_nineteen = ROOT_PATH . "/assets/img/CarPhotos/".$image_nineteen;
  $additional_folder_twenty = ROOT_PATH . "/assets/img/CarPhotos/".$image_twenty;


  if (isset($_POST['submit']) && isset($_POST['checkbox']))
  {
  if (move_uploaded_file($tempmainphoto,$folder) && move_uploaded_file($temp_image_one,$additional_folder_one) && move_uploaded_file($temp_image_two,$additional_folder_two)
&& move_uploaded_file($temp_image_three,$additional_folder_three)
&& move_uploaded_file($temp_image_four,$additional_folder_four)
|| move_uploaded_file($temp_image_five,$additional_folder_five)
|| move_uploaded_file($temp_image_six,$additional_folder_six)
|| move_uploaded_file($temp_image_seven,$additional_folder_seven)
|| move_uploaded_file($temp_image_eight,$additional_folder_eight)
|| move_uploaded_file($temp_image_nine,$additional_folder_nine)
|| move_uploaded_file($temp_image_ten,$additional_folder_ten)
|| move_uploaded_file($temp_image_eleven,$additional_folder_eleven)
|| move_uploaded_file($temp_image_twelve,$additional_folder_twelve)
|| move_uploaded_file($temp_image_thirteen,$additional_folder_thirteen)
|| move_uploaded_file($temp_image_fourteen,$additional_folder_fourteen)
|| move_uploaded_file($temp_image_fifteen,$additional_folder_fifteen)
|| move_uploaded_file($temp_image_sixteen,$additional_folder_sixteen)
|| move_uploaded_file($temp_image_seventeen,$additional_folder_seventeen)
|| move_uploaded_file($temp_image_eighteen,$additional_folder_eighteen)
|| move_uploaded_file($temp_image_nineteen,$additional_folder_nineteen)
|| move_uploaded_file($temp_image_twenty,$additional_folder_twenty))
  {
    $sql_vv = "INSERT INTO vs_vehicle_details
    (brand,
      model,
      year_of_production,
      type_of_vehicle,
      engine_capacity,
      engine_power,
      fuel_type,
      transmission,
      drive,
      max_speed,
      no_of_doors,
      no_of_seats,
      mileage,
      country_of_origin,
      estimated_value,
      y_o_p_b_c_o,
      location_voivodship,
      location_district,
      date_added,
      time_added,
      s_v_h_t_p,
      u_a_e_o_v,
      i_e_l_t_t_v,
      advantages_of_vehicle,
      d_o_v_c,
      h_a_o_o_v,
      problems_with_vehicle,
      announcement,
      main_photo,
      user_id,
      photo_one,photo_two,photo_three,
    photo_four,
    photo_five,
    photo_six,
    photo_seven,
    photo_eight,
    photo_nine,
    photo_ten,
    photo_eleven,
    photo_twelve,
    photo_thirteen,
    photo_fourteen,
    photo_fifteen,
    photo_sixteen,
    photo_seventeen,
    photo_eighteen,
    photo_nineteen,
    photo_twenty,
    caption_main_photo,
  caption_photo_one,
  caption_photo_two,
  caption_photo_three,
  caption_photo_four,
  caption_photo_five,
  caption_photo_six,
  caption_photo_seven,
  caption_photo_eight,
  caption_photo_nine,
  caption_photo_ten,
  caption_photo_eleven,
  caption_photo_twelve,
  caption_photo_thirteen,
  caption_photo_fourteen,
  caption_photo_fifteen,
  caption_photo_sixteen,
  caption_photo_seventeen,
  caption_photo_eighteen,
  caption_photo_nineteen,
  caption_photo_twenty,
  date_added_announcement,
  announcement_expire_date
    ) VALUES(
      '$brand',
      '$model',
        '$year_of_production',
        '$type_of_vehicle',
        '$engine_capacity',
        '$engine_power',
        '$fuel_type',
        '$transmission',
        '$drive',
        '$max_speed',
        '$no_of_doors',
        '$no_of_seats',
        '$mileage',
        '$country_of_origin',
        '$estimated_value',
        '$y_o_p_b_c_o',
        '$location_voivodship',
        '$location_district',
        '$date_added',
        '$time_added',
        '$s_v_h_t_p',
        '$u_a_e_o_v',
        '$i_e_l_t_t_v',
        '$advantages_of_vehicle',
        '$d_o_v_c',
        '$h_a_o_o_v',
        '$problems_with_vehicle',
        '$announcement',
        '$main_image',
        '$user_id',
        '$image_one',
        '$image_two',
        '$image_three',
        '$image_four',
        '$image_five',
        '$image_six',
        '$image_seven',
        '$image_eight',
        '$image_nine',
        '$image_ten',
        '$image_eleven',
        '$image_twelve',
        '$image_thirteen',
        '$image_fourteen',
        '$image_fifteen',
        '$image_sixteen',
        '$image_seventeen',
        '$image_eighteen',
        '$image_nineteen',
        '$image_twenty',
        '$cp_main_image',
      '$cp_image_one',
      '$cp_image_two',
      '$cp_image_three',
      '$cp_image_four',
      '$cp_image_five',
      '$cp_image_six',
      '$cp_image_seven',
      '$cp_image_eight',
      '$cp_image_nine',
      '$cp_image_ten',
      '$cp_image_eleven',
      '$cp_image_twelve',
      '$cp_image_thirteen',
      '$cp_image_fourteen',
      '$cp_image_fifteen',
      '$cp_image_sixteen',
      '$cp_image_seventeen',
      '$cp_image_eighteen',
      '$cp_image_nineteen',
      '$cp_image_twenty',
      '$date_added_announcement',
      '$announcement_expire_date'
      )";
      $sql_vv_exec = mysqli_query($conn,$sql_vv);
      //die($sql_vv);
      if ($sql_vv_exec)
      {
        if (isset($_POST['admin_allow']) && isset($_POST['u_id']) && !empty($_POST['u_id']) && !empty($_POST['admin_allow']))
        {
          include(ROOT_PATH . '/controllers/emailTemplates/additionVehicleMail.php');
          $_SESSION['add_success'] = 4;
          header('location:' . BASE_URL . '/admin/user_accounts_details?id='.base64_decode(hex2bin($_POST['u_id'])));
        }
        else
        {
          include(ROOT_PATH . '/controllers/emailTemplates/additionVehicleMail.php');
          $_SESSION['add_success'] = 4;
          header('location:' . BASE_URL . '/user/user_panel');
        }
      }
      else
      {
        if (isset($_POST['admin_allow']) && isset($_POST['u_id']))
        {
          $_SESSION['error_three'] = 3;
          header('location:' . BASE_URL . '/user/add_vehicle?u_id='.$_POST['u_id'].'&admin_allow='.$_POST['admin_allow']);
        }
        else
        {
          $_SESSION['error_three'] = 3;
          header('location:' . BASE_URL . '/user/add_vehicle');
        }
      }
      }
      else
      {

      $_SESSION['error_two'] = 2;
      header('location:' . BASE_URL . '/user/add_vehicle');
      }
  }
  else
  {

      $_SESSION['error_one'] = 1;
  header('location:' . BASE_URL . '/user/add_vehicle');
  }
}




function DelelteVehicle()
{
  global $conn;
  $edit_id = base64_decode(hex2bin($_GET['id']));
  $u_id = base64_decode(hex2bin($_GET['u_id']));//base64_decode();
  $sql_dv = "DELETE FROM vs_vehicle_details WHERE id = '$edit_id' AND user_id = '$u_id'";
  $sql_dv_exec = mysqli_query($conn,$sql_dv);

  if ($sql_dv_exec && isset($_GET['id']) && isset($_GET['u_id']))
  {
    header('location:' . BASE_URL . '/user/user_panel');
  }
  else
  {
    $_SESSION['delete_error'] =  '<h3> Could not delete your entry!</h3>';
    header('location:' . BASE_URL . '/user/user_panel');
  }
}










function EditVehicle()
{

    global $conn;

    $brand = mysqli_real_escape_string($conn,trim($_POST['brand']));
    $model = mysqli_real_escape_string($conn,trim($_POST['model']));
    $year_of_production = mysqli_real_escape_string($conn,trim($_POST['year_of_production']));
    $type_of_vehicle = mysqli_real_escape_string($conn,trim($_POST['type_of_vehicle']));
    $engine_capacity = mysqli_real_escape_string($conn,trim($_POST['engine_capacity']));
    $engine_power = mysqli_real_escape_string($conn,trim($_POST['engine_power']));
    $fuel_type = mysqli_real_escape_string($conn,trim($_POST['fuel_type']));
    $transmission = mysqli_real_escape_string($conn,trim($_POST['transmission']));
    $drive = mysqli_real_escape_string($conn,trim($_POST['drive']));
    $max_speed = mysqli_real_escape_string($conn,trim($_POST['max_speed']));
    $no_of_doors = mysqli_real_escape_string($conn,trim($_POST['no_of_doors']));
    $no_of_seats = mysqli_real_escape_string($conn,trim($_POST['no_of_seats']));
    $mileage = mysqli_real_escape_string($conn,trim($_POST['mileage']));
    $country_of_origin = mysqli_real_escape_string($conn,trim($_POST['country_of_origin']));
    $estimated_value = mysqli_real_escape_string($conn,trim($_POST['estimated_value']));
    $y_o_p_b_c_o = mysqli_real_escape_string($conn,trim($_POST['y_o_p_b_c_o']));
    $location_voivodship = mysqli_real_escape_string($conn,trim($_POST['location_voivodship']));
    $location_district = mysqli_real_escape_string($conn,trim($_POST['location_district']));
    $last_modification = date("Y.m.d") .' '. date('H:i:s');
    $s_v_h_t_p = mysqli_real_escape_string($conn,str_replace("'", "''", trim($_POST['s_v_h_t_p'])));
    $u_a_e_o_v = mysqli_real_escape_string($conn,str_replace("'", "''", trim($_POST['u_a_e_o_v'])));
    $i_e_l_t_t_v = mysqli_real_escape_string($conn,str_replace("'", "''", trim($_POST['i_e_l_t_t_v'])));
    $advantages_of_vehicle = mysqli_real_escape_string($conn,str_replace("'", "''", trim($_POST['advantages_of_vehicle'])));
    $d_o_v_c = mysqli_real_escape_string($conn,str_replace("'", "''", trim($_POST['d_o_v_c'])));
    $h_a_o_o_v = mysqli_real_escape_string($conn,str_replace("'", "''", trim($_POST['h_a_o_o_v'])));
    $problems_with_vehicle = mysqli_real_escape_string($conn,str_replace("'", "''", trim($_POST['problems_with_vehicle'])));
    $announcement = mysqli_real_escape_string($conn,str_replace("'", "''", trim($_POST['announcement'])));
    $last_modification_report = date('Y-m-d');

    if (isset($_POST['admin_allow']) && isset($_POST['u_id']) && isset($_POST['email']))
    {
      $user_id = mysqli_real_escape_string($conn,trim(base64_decode(hex2bin($_POST['u_id']))));
      $email = mysqli_real_escape_string($conn,trim($_POST['email']));
    }
    else
    {
      $email =  mysqli_real_escape_string($conn,trim($_SESSION['email']));
      $user_id = mysqli_real_escape_string($conn,trim($_SESSION['id']));
    }
    $submit = mysqli_real_escape_string($conn,$_POST['submit']);


    $main_image = mysqli_real_escape_string($conn,$_FILES['main_photo']['name']);
    $image_one = mysqli_real_escape_string($conn,$_FILES['photo_one']['name']);
    $image_two = mysqli_real_escape_string($conn,$_FILES['photo_two']['name']);
    $image_three = mysqli_real_escape_string($conn,$_FILES['photo_three']['name']);
    $image_four = mysqli_real_escape_string($conn,$_FILES['photo_four']['name']);
    $image_five = mysqli_real_escape_string($conn,$_FILES['photo_five']['name']);
    $image_six = mysqli_real_escape_string($conn,$_FILES['photo_six']['name']);
    $image_seven = mysqli_real_escape_string($conn,$_FILES['photo_seven']['name']);
    $image_eight = mysqli_real_escape_string($conn,$_FILES['photo_eight']['name']);
    $image_nine = mysqli_real_escape_string($conn,$_FILES['photo_nine']['name']);
    $image_ten = mysqli_real_escape_string($conn,$_FILES['photo_ten']['name']);
    $image_eleven = mysqli_real_escape_string($conn,$_FILES['photo_eleven']['name']);
    $image_twelve = mysqli_real_escape_string($conn,$_FILES['photo_twelve']['name']);
    $image_thirteen = mysqli_real_escape_string($conn,$_FILES['photo_thirteen']['name']);
    $image_fourteen = mysqli_real_escape_string($conn,$_FILES['photo_fourteen']['name']);
    $image_fifteen = mysqli_real_escape_string($conn,$_FILES['photo_fifteen']['name']);
    $image_sixteen = mysqli_real_escape_string($conn,$_FILES['photo_sixteen']['name']);
    $image_seventeen = mysqli_real_escape_string($conn,$_FILES['photo_seventeen']['name']);
    $image_eighteen = mysqli_real_escape_string($conn,$_FILES['photo_eighteen']['name']);
    $image_nineteen = mysqli_real_escape_string($conn,$_FILES['photo_nineteen']['name']);
$image_twenty = mysqli_real_escape_string($conn,$_FILES['photo_twenty']['name']);

    $tempmainphoto = $_FILES["main_photo"]["tmp_name"];
    $temp_image_one = $_FILES["photo_one"]["tmp_name"];
    $temp_image_two = $_FILES["photo_two"]["tmp_name"];
    $temp_image_three = $_FILES["photo_three"]["tmp_name"];
    $temp_image_four = $_FILES["photo_four"]["tmp_name"];
    $temp_image_five = $_FILES['photo_five']['name'];
    $temp_image_six = $_FILES['photo_six']['name'];
    $temp_image_seven = $_FILES['photo_seven']['name'];
    $temp_image_eight = $_FILES['photo_eight']['name'];
    $temp_image_nine = $_FILES['photo_nine']['name'];
    $temp_image_ten = $_FILES['photo_ten']['name'];
    $temp_image_eleven = $_FILES['photo_eleven']['name'];
    $temp_image_twelve = $_FILES['photo_twelve']['name'];
    $temp_image_thirteen = $_FILES['photo_thirteen']['name'];
    $temp_image_fourteen = $_FILES['photo_fourteen']['name'];
    $temp_image_fifteen = $_FILES['photo_fifteen']['name'];
    $temp_image_sixteen = $_FILES['photo_sixteen']['name'];
    $temp_image_seventeen = $_FILES['photo_seventeen']['name'];
    $temp_image_eighteen = $_FILES['photo_eighteen']['name'];
    $temp_image_nineteen = $_FILES['photo_nineteen']['name'];
    $temp_image_twenty = $_FILES['photo_twenty']['name'];


      $cp_main_image = mysqli_real_escape_string($conn,$_POST['caption_main_photo']);
      $cp_image_one = mysqli_real_escape_string($conn,$_POST['caption_photo_one']);
      $cp_image_two = mysqli_real_escape_string($conn,$_POST['caption_photo_two']);
      $cp_image_three = mysqli_real_escape_string($conn,$_POST['caption_photo_three']);
      $cp_image_four = mysqli_real_escape_string($conn,$_POST['caption_photo_four']);
      $cp_image_five = mysqli_real_escape_string($conn,$_POST['caption_photo_five']);
      $cp_image_six = mysqli_real_escape_string($conn,$_POST['caption_photo_six']);
      $cp_image_seven = mysqli_real_escape_string($conn,$_POST['caption_photo_seven']);
      $cp_image_eight = mysqli_real_escape_string($conn,$_POST['caption_photo_eight']);
      $cp_image_nine = mysqli_real_escape_string($conn,$_POST['caption_photo_nine']);
      $cp_image_ten = mysqli_real_escape_string($conn,$_POST['caption_photo_ten']);
      $cp_image_eleven = mysqli_real_escape_string($conn,$_POST['caption_photo_eleven']);
      $cp_image_twelve = mysqli_real_escape_string($conn,$_POST['caption_photo_twelve']);
      $cp_image_thirteen = mysqli_real_escape_string($conn,$_POST['caption_photo_thirteen']);
      $cp_image_fourteen = mysqli_real_escape_string($conn,$_POST['caption_photo_fourteen']);
      $cp_image_fifteen = mysqli_real_escape_string($conn,$_POST['caption_photo_fifteen']);
      $cp_image_sixteen = mysqli_real_escape_string($conn,$_POST['caption_photo_sixteen']);
      $cp_image_seventeen = mysqli_real_escape_string($conn,$_POST['caption_photo_seventeen']);
      $cp_image_eighteen = mysqli_real_escape_string($conn,$_POST['caption_photo_eighteen']);
      $cp_image_nineteen = mysqli_real_escape_string($conn,$_POST['caption_photo_nineteen']);
      $cp_image_twenty = mysqli_real_escape_string($conn,$_POST['caption_photo_twenty']);


    $folder = ROOT_PATH . "/assets/img/CarPhotos/".$main_image;
    $additional_folder_one = ROOT_PATH . "/assets/img/CarPhotos/".$image_one;
    $additional_folder_two = ROOT_PATH . "/assets/img/CarPhotos/".$image_two;
    $additional_folder_three = ROOT_PATH . "/assets/img/CarPhotos/".$image_three;
    $additional_folder_four = ROOT_PATH . "/assets/img/CarPhotos/".$image_four;
    $additional_folder_one = ROOT_PATH . "/assets/img/CarPhotos/".$image_one;
    $additional_folder_two = ROOT_PATH . "/assets/img/CarPhotos/".$image_two;
    $additional_folder_three = ROOT_PATH . "/assets/img/CarPhotos/".$image_three;
    $additional_folder_four = ROOT_PATH . "/assets/img/CarPhotos/".$image_four;
    $additional_folder_five = ROOT_PATH . "/assets/img/CarPhotos/".$image_five;
    $additional_folder_six = ROOT_PATH . "/assets/img/CarPhotos/".$image_six;
    $additional_folder_seven = ROOT_PATH . "/assets/img/CarPhotos/".$image_seven;
    $additional_folder_eight = ROOT_PATH . "/assets/img/CarPhotos/".$image_eight;
    $additional_folder_nine = ROOT_PATH . "/assets/img/CarPhotos/".$image_nine;
    $additional_folder_ten = ROOT_PATH . "/assets/img/CarPhotos/".$image_ten;
    $additional_folder_eleven = ROOT_PATH . "/assets/img/CarPhotos/".$image_eleven;
    $additional_folder_twelve = ROOT_PATH . "/assets/img/CarPhotos/".$image_twelve;
    $additional_folder_thirteen = ROOT_PATH . "/assets/img/CarPhotos/".$image_thirteen;
    $additional_folder_fourteen = ROOT_PATH . "/assets/img/CarPhotos/".$image_fourteen;
    $additional_folder_fifteen = ROOT_PATH . "/assets/img/CarPhotos/".$image_fifteen;
    $additional_folder_sixteen = ROOT_PATH . "/assets/img/CarPhotos/".$image_sixteen;
    $additional_folder_seventeen = ROOT_PATH . "/assets/img/CarPhotos/".$image_seventeen;
    $additional_folder_eighteen = ROOT_PATH . "/assets/img/CarPhotos/".$image_eighteen;
    $additional_folder_nineteen = ROOT_PATH . "/assets/img/CarPhotos/".$image_nineteen;
    $additional_folder_twenty = ROOT_PATH . "/assets/img/CarPhotos/".$image_twenty;


    if (isset($_POST['submit']) && isset($_POST['checkbox']))
    {

      move_uploaded_file($tempmainphoto,$folder);
      move_uploaded_file($temp_image_one,$additional_folder_one);
      move_uploaded_file($temp_image_two,$additional_folder_two);
      move_uploaded_file($temp_image_three,$additional_folder_three);
      move_uploaded_file($temp_image_four,$additional_folder_four);
      move_uploaded_file($temp_image_five,$additional_folder_five);
      move_uploaded_file($temp_image_six,$additional_folder_six);
      move_uploaded_file($temp_image_seven,$additional_folder_seven);
      move_uploaded_file($temp_image_eight,$additional_folder_eight);
      move_uploaded_file($temp_image_nine,$additional_folder_nine);
      move_uploaded_file($temp_image_ten,$additional_folder_ten);
      move_uploaded_file($temp_image_eleven,$additional_folder_eleven);
      move_uploaded_file($temp_image_twelve,$additional_folder_twelve);
      move_uploaded_file($temp_image_thirteen,$additional_folder_thirteen);
      move_uploaded_file($temp_image_fourteen,$additional_folder_fourteen);
      move_uploaded_file($temp_image_fifteen,$additional_folder_fifteen);
      move_uploaded_file($temp_image_sixteen,$additional_folder_sixteen);
      move_uploaded_file($temp_image_seventeen,$additional_folder_seventeen);
      move_uploaded_file($temp_image_eighteen,$additional_folder_eighteen);
      move_uploaded_file($temp_image_nineteen,$additional_folder_nineteen);
      move_uploaded_file($temp_image_nineteen,$additional_folder_twenty);


      $sql_vv = "UPDATE vs_vehicle_details SET
      brand = '$brand',
        model = '$model',
        year_of_production = '$year_of_production',
        type_of_vehicle = '$type_of_vehicle',
        engine_capacity = '$engine_capacity',
        engine_power = '$engine_power',
        fuel_type = '$fuel_type',
        transmission = '$transmission',
        drive = '$drive',
        max_speed = '$max_speed',
        no_of_doors = '$no_of_doors',
        no_of_seats = '$no_of_seats',
        mileage = '$mileage',
        country_of_origin = '$country_of_origin',
        estimated_value = '$estimated_value',
        y_o_p_b_c_o = '$y_o_p_b_c_o',
        location_voivodship = '$location_voivodship',
        location_district = '$location_district',
        last_modification = '$last_modification',
        s_v_h_t_p = '$s_v_h_t_p',
        u_a_e_o_v = '$u_a_e_o_v',
        i_e_l_t_t_v = '$i_e_l_t_t_v',
        advantages_of_vehicle = '$advantages_of_vehicle',
        d_o_v_c = '$d_o_v_c',
        h_a_o_o_v = '$h_a_o_o_v',
        problems_with_vehicle = '$problems_with_vehicle',
        announcement = '$announcement',
        last_modification_report = '$last_modification_report',
        main_photo = IF(LENGTH('$main_image')=0, main_photo, '$main_image'),
        user_id = '$user_id',
        photo_one = IF(LENGTH('$image_one')=0, photo_one, '$image_one'),
        photo_two = IF(LENGTH('$image_two')=0, photo_two, '$image_two'),
        photo_three = IF(LENGTH('$image_three')=0, photo_three, '$image_three'),
      photo_four = IF(LENGTH('$image_four')=0, photo_four, '$image_four'),
      photo_five = IF(LENGTH('$image_five')=0, photo_five, '$image_five'),
      photo_six = IF(LENGTH('$image_six')=0, photo_six , '$image_six'),
      photo_seven = IF(LENGTH('$image_seven')=0, photo_seven, '$image_seven'),
      photo_eight = IF(LENGTH('$image_eight')=0, photo_eight, '$image_eight'),
      photo_nine = IF(LENGTH('$image_nine')=0, photo_nine, '$image_nine'),
      photo_ten = IF(LENGTH('$image_ten')=0, photo_ten, '$image_ten'),
      photo_eleven = IF(LENGTH('$image_eleven')=0, photo_eleven, '$image_eleven'),
      photo_twelve = IF(LENGTH('$image_twelve')=0, photo_twelve, '$image_twelve'),
      photo_thirteen = IF(LENGTH('$image_thirteen')=0, photo_thirteen, '$image_thirteen'),
      photo_fourteen = IF(LENGTH('$image_fourteen')=0, photo_fourteen, '$image_fourteen'),
      photo_fifteen = IF(LENGTH('$image_fifteen')=0, photo_fifteen, '$image_fifteen'),
      photo_sixteen = IF(LENGTH('$image_sixteen')=0, photo_sixteen, '$image_sixteen'),
      photo_seventeen = IF(LENGTH('$image_seventeen')=0, photo_seventeen, '$image_seventeen'),
      photo_eighteen = IF(LENGTH('$image_eighteen')=0, photo_eighteen, '$image_eighteen'),
      photo_nineteen = IF(LENGTH('$image_nineteen')=0, photo_nineteen, '$image_nineteen'),
      photo_twenty = IF(LENGTH('$image_twenty')=0, photo_twenty, '$image_twenty'),
      caption_main_photo = '$cp_main_image',
    caption_photo_one = '$cp_image_one',
    caption_photo_two = '$cp_image_two',
    caption_photo_three = '$cp_image_three',
    caption_photo_four = '$cp_image_four',
    caption_photo_five = '$cp_image_five',
    caption_photo_six = '$cp_image_six',
    caption_photo_seven = '$cp_image_seven',
    caption_photo_eight = '$cp_image_eight',
    caption_photo_nine = '$cp_image_nine',
    caption_photo_ten = '$cp_image_ten',
    caption_photo_eleven = '$cp_image_eleven',
    caption_photo_twelve = '$cp_image_twelve',
    caption_photo_thirteen = '$cp_image_thirteen',
    caption_photo_fourteen = '$cp_image_fourteen',
    caption_photo_fifteen = '$cp_image_fifteen',
    caption_photo_sixteen = '$cp_image_sixteen',
    caption_photo_seventeen = '$cp_image_seventeen',
    caption_photo_eighteen = '$cp_image_eighteen',
    caption_photo_nineteen = '$cp_image_nineteen',
    caption_photo_twenty = '$cp_image_twenty'
        WHERE id = '$_SESSION[edit_id]'";
        $sql_vv_exec = mysqli_query($conn,$sql_vv);

        if ($sql_vv_exec)
        {
          if (isset($_POST['admin_allow']) && isset($_POST['u_id']) && !empty($_POST['u_id']) && !empty($_POST['admin_allow']))
          {
            include(ROOT_PATH . '/controllers/emailTemplates/modificationVehicleMail.php');
            $_SESSION['add_success_two'] = 5;
            header('location:' . BASE_URL . '/admin/user_accounts_details?id='.base64_decode(hex2bin($_POST['u_id'])));
          }
          else
          {
            include(ROOT_PATH . '/controllers/emailTemplates/modificationVehicleMail.php');
            $_SESSION['add_success_two'] = 5;
            header('location:' . BASE_URL . '/user/user_panel');
          }
}
        else
        {
          if (isset($_POST['admin_allow']) && isset($_POST['u_id']))
          {
            $_SESSION['error_three'] = 3;
            header('location:' . BASE_URL . '/user/add_vehicle?u_id='.$_POST['u_id'].'&admin_allow='.$_POST['admin_allow']);
          }
          else
          {
            $_SESSION['error_three'] = 3;
            header('location:' . BASE_URL . '/user/add_vehicle');
          }
        }
    }
    else
    {
      //die('three');
        $_SESSSION['error_one'] = '<h3> Please click on the checkbox </h3>';
    header('location:' . BASE_URL . '/user/edit?id='.$id.'&u_id='.$user_id_encryp);
    }
}








function EditBrand()
{
  global $conn;
  $edit_id = base64_decode(hex2bin($_GET['id']));
  $u_id = base64_decode(hex2bin($_GET['u_id']));
  $sql_eb = "SELECT * FROM vw_vehicle_details WHERE id = '$edit_id' AND user_id = '$u_id'";
  //die($sql_eb);
  $sql_eb_exec = mysqli_query($conn,$sql_eb);

  if ($sql_eb_exec)
  {
    while ($sql_eb_fetch = mysqli_fetch_assoc($sql_eb_exec))
    {
      echo "<option value='".$sql_eb_fetch['brand']."'>--".$sql_eb_fetch['brand']."--</option>";
    }
  }
}


function EditFuelType()
{
  global $conn;
  $edit_id = base64_decode(hex2bin($_GET['id']));
  $u_id = base64_decode(hex2bin($_GET['u_id']));
  $sql_ft = "SELECT * FROM vw_vehicle_details WHERE id = '$edit_id' AND user_id = '$u_id'";
  $sql_ft_exec = mysqli_query($conn,$sql_ft);

  if ($sql_ft_exec)
  {
    while ($sql_ft_fetch = mysqli_fetch_assoc($sql_ft_exec))
    {
      echo "<option value='".$sql_ft_fetch['fuel_type']."'>--".$sql_ft_fetch['fuel_type']."--</option>";
    }
  }
}



function EditModel()
{
  global $conn;
  $edit_id = base64_decode(hex2bin($_GET['id']));
  $u_id = base64_decode(hex2bin($_GET['u_id']));
  $sql_m = "SELECT * FROM vw_vehicle_details WHERE id = '$edit_id' AND user_id = '$u_id'";
  $sql_m_exec = mysqli_query($conn,$sql_m);

  if ($sql_m_exec)
  {
    while ($sql_m_fetch = mysqli_fetch_assoc($sql_m_exec))
    {
      echo "<option value='".$sql_m_fetch['model']."'>--".$sql_m_fetch['model']."--</option>";
    }
  }
}


function EditNoofDoors()
{
  global $conn;
  $edit_id = base64_decode(hex2bin($_GET['id']));
  $u_id = base64_decode(hex2bin($_GET['u_id']));
  $sql_nd = "SELECT * FROM vw_vehicle_details WHERE id = '$edit_id' AND user_id = '$u_id'";
  $sql_nd_exec = mysqli_query($conn,$sql_nd);

  if ($sql_nd_exec)
  {
    while ($sql_nd_fetch = mysqli_fetch_assoc($sql_nd_exec))
    {
      echo "<option value='".$sql_nd_fetch['no_of_doors']."'>--".$sql_nd_fetch['no_of_doors']."--</option>";
    }
  }
}



function EditNoofSeats()
{
  global $conn;
  $edit_id = base64_decode(hex2bin($_GET['id']));
  $u_id = base64_decode(hex2bin($_GET['u_id']));
  $sql_ns = "SELECT * FROM vw_vehicle_details WHERE id = '$edit_id' AND user_id = '$u_id'";
  $sql_ns_exec = mysqli_query($conn,$sql_ns);

  if ($sql_ns_exec)
  {
    while ($sql_ns_fetch = mysqli_fetch_assoc($sql_ns_exec))
    {
      echo "<option value='".$sql_ns_fetch['no_of_seats']."'>--".$sql_ns_fetch['no_of_seats']."--</option>";
    }
  }
}





function EditTypeOfVehicle()
{
  global $conn;
  $edit_id = base64_decode(hex2bin($_GET['id']));
  $u_id = base64_decode(hex2bin($_GET['u_id']));
  $sql_tov = "SELECT * FROM vw_vehicle_details WHERE id = '$edit_id' AND user_id = '$u_id'";
  $sql_tov_exec = mysqli_query($conn,$sql_tov);

  if ($sql_tov_exec)
  {
    while ($sql_tov_fetch = mysqli_fetch_assoc($sql_tov_exec))
    {
      echo "<option value='".$sql_tov_fetch['type_of_vehicle']."'>--".$sql_tov_fetch['type_of_vehicle']."--</option>";
    }
  }
}




function EditTransmission()
{
  global $conn;
  $edit_id = base64_decode(hex2bin($_GET['id']));
  $u_id = base64_decode(hex2bin($_GET['u_id']));
  $sql_tm = "SELECT * FROM vw_vehicle_details WHERE id = '$edit_id' AND user_id = '$u_id'";
  $sql_tm_exec = mysqli_query($conn,$sql_tm);

  if ($sql_tm_exec)
  {
    while ($sql_tm_fetch = mysqli_fetch_assoc($sql_tm_exec))
    {
      echo "<option value='".$sql_tm_fetch['transmission']."'>--".$sql_tm_fetch['transmission']."--</option>";
    }
  }
}


function EditDrive()
{
  global $conn;
  $edit_id = base64_decode(hex2bin($_GET['id']));
  $u_id = base64_decode(hex2bin($_GET['u_id']));
  $sql_ed = "SELECT * FROM vw_vehicle_details WHERE id = '$edit_id' AND user_id = '$u_id'";
  $sql_ed_exec = mysqli_query($conn,$sql_ed);

  if ($sql_ed_exec)
  {
    while ($sql_ed_fetch = mysqli_fetch_assoc($sql_ed_exec))
    {
      echo "<option value='".$sql_ed_fetch['drive']."'>--".$sql_ed_fetch['drive']."--</option>";
    }
  }
}





function EditMaxSpeed()
{
  global $conn;
  $edit_id = base64_decode(hex2bin($_GET['id']));
  $u_id = base64_decode(hex2bin($_GET['u_id']));
  $sql_ns = "SELECT * FROM vw_vehicle_details WHERE id = '$edit_id' AND user_id = '$u_id'";
  $sql_ns_exec = mysqli_query($conn,$sql_ns);

  if ($sql_ns_exec)
  {
    while ($sql_ns_fetch = mysqli_fetch_assoc($sql_ns_exec))
    {
      echo $sql_ns_fetch['max_speed'];
    }
  }
}




function ChangeAccountInfo()
{
global $conn;
echo "
<script>
$('.loading_screen').show();
</script>
";
if (isset($_POST['password_submit']))
{
  $old_password = $_POST['old_password'];
  $new_password = $_POST['new_password'];
  $hashedPassword = password_hash($new_password,PASSWORD_DEFAULT);
  $curr_date = date('d.m.Y');
  $curr_time = date('H:i:s');
//echo $hashedPassword. '+' .$old_password . '+' .$new_password;
  $sql_srch = "SELECT * FROM vw_user WHERE email = '$_SESSION[email]' AND id = '$_SESSION[id]'";
  $sql_srch_exec = mysqli_query($conn,$sql_srch);
  $sql_srch_fetch = mysqli_fetch_assoc($sql_srch_exec);
  $sql_srch_num = mysqli_num_rows($sql_srch_exec);
//die($sql_srch);
  if ($sql_srch_exec && ($sql_srch_num > 0) && password_verify($old_password,$sql_srch_fetch['password']))
  {
    $sql_upd = "UPDATE vs_user SET password = '$hashedPassword' , password_key_active_status = 1,change_password_date = '$curr_date',change_password_time = '$curr_time' WHERE id = '$_SESSION[id]'";
    $sql_upd_exec = mysqli_query($conn,$sql_upd);
    if ($sql_upd_exec)
    {
      include(ROOT_PATH . '/controllers/emailTemplates/changePasswordMail.php');
      echo "
      <script>
      $('.loading_screen').hide();
      $('.pop_up_box').show();
      $('.pop_up_box').css('box-shadow','0px 2px 5px green');
      </script>
      ";
      echo "<h4> Password has been changed </h4>";
    }
    else
    {
      echo "
      <script>
      $('.loading_screen').hide();
      $('.pop_up_box').show();
      $('.pop_up_box').css('box-shadow','0px 2px 5px red');
      </script>
      ";
      echo "<h4> Could not update password </h4>";
    }
  }
  else
  {
    echo "
    <script>
    $('.loading_screen').hide();
    $('.pop_up_box').show();
    $('.pop_up_box').css('box-shadow','0px 2px 5px red');
    </script>
    ";
    echo "<h4> Old password is incorrect </h4>";
  }
}

elseif (isset($_POST['username_submit']))
{
  $new_username  = stripcslashes(trim($_POST['new_username']));
  $new_username  = mysqli_real_escape_string($conn,$new_username);

  $sql_srch = "SELECT * FROM vw_user WHERE username = '$new_username'";
  $sql_srch_exec = mysqli_query($conn,$sql_srch);
  $sql_srch_num = mysqli_num_rows($sql_srch_exec);

  echo "
  <script>
  $('.loading_screen').hide();
  $('#pop_up_change').show();
  $('#pop_up_change').css('box-shadow','0px 2px 5px red');
  </script>
  ";
  if ($sql_srch_exec && ($sql_srch_num == 0))
  {
    $sql_upd = "UPDATE vs_user SET username = '$new_username' WHERE id = '$_SESSION[id]'";
    $sql_upd_exec = mysqli_query($conn,$sql_upd);
    if ($sql_upd_exec)
    {
      $_SESSION['username'] = $new_username;
      echo "
      <script>
      $('.loading_screen').hide();
      $('#pop_up_change').show();
      $('#pop_up_change').css('box-shadow','0px 2px 5px green');
      </script>
      ";
      echo "<h4> Username has been changed </h4>";
    }
    else
    {
      echo "
      <script>
      $('.loading_screen').hide();
      $('#pop_up_change').show();
      $('#pop_up_change').css('box-shadow','0px 2px 5px red');
      </script>
      ";
      echo "<h4> Could not update username </h4>";
    }
  }
  elseif (empty($new_username))
  {
    echo "
    <script>
    $('.loading_screen').hide();
    $('#pop_up_change').show();
    $('#pop_up_change').css('box-shadow','0px 2px 5px red');
    </script>
    ";
    echo "<h4> Please type a username </h4>";
  }
  else
  {
    echo "
    <script>
    $('.loading_screen').hide();
    $('#pop_up_change').show();
    $('#pop_up_change').css('box-shadow','0px 2px 5px red');
    </script>
    ";
    echo "<h4> Username is taken </h4>";
  }
}

elseif (isset($_POST['email_submit']))
{
  $new_email = $_POST['new_email'];
  $password = $_POST['password'];
  $curr_date = date('d.m.Y');
  $curr_time = date('H:i:s');
  if (isset($_POST['email']) && isset($_POST['id']))
  {
    $email = $_POST['email'];
    $id = $_POST['id'];
  }
  else
  {
    $email = $_SESSION['email'];
    $id = $_SESSION['id'];
  }

  $sql_srch = "SELECT * FROM vw_user WHERE email = '$email' AND id = '$id'";
  $sql_srch_exec = mysqli_query($conn,$sql_srch);
  $sql_srch_fetch = mysqli_fetch_assoc($sql_srch_exec);
  $sql_srch_num = mysqli_num_rows($sql_srch_exec);
//die($sql_srch);
  if ($sql_srch_exec && ($sql_srch_num > 0) && password_verify($password,$sql_srch_fetch['password']))
  {
    $sql_upd = "UPDATE vs_user SET email = '$new_email', change_email_date = '$curr_date',change_email_time = '$curr_time' WHERE id = '$id'";
    $sql_upd_exec = mysqli_query($conn,$sql_upd);
    if ($sql_upd_exec)
    {
      $sql_upd_f = "UPDATE vs_user SET old_email = '$email' WHERE id = '$id'";
      $sql_upd_exec_f = mysqli_query($conn,$sql_upd_f);
  echo "
      <script>
      $('.loading_screen').hide();
      $('#pop_up_change').show();
      $('#pop_up_change').css('box-shadow','0px 2px 5px green');
      </script>
      ";
      echo "<h4> E-mail has been successfully changed </h4>";
      include(ROOT_PATH . '/controllers/emailTemplates/changeEmailMailNew.php');
      //include(ROOT_PATH . '/controllers/emailTemplates/changeEmailMailOld.php');
      if (isset($_POST['email']) && isset($_POST['id']))
      {

      }
      else
      {
        $_SESSION['email'] = $new_email;
      }


    }
    elseif (empty($new_email) || empty($password))
    {
      echo "
      <script>
      $('.loading_screen').hide();
      $('#pop_up_change').show();
      $('#pop_up_change').css('box-shadow','0px 2px 5px red');
      </script>
      ";
      echo "<h4> Please fill in the required fields </h4>";
    }
    else
    {
      echo "
      <script>
      $('.loading_screen').hide();
      $('#pop_up_change').show();
      $('#pop_up_change').css('box-shadow','0px 2px 5px red');
      </script>
      ";
      echo "<h4> Could not update email </h4>";
    }
  }
  else
  {
    echo "
    <script>
    $('.loading_screen').hide();
    $('#pop_up_change').show();
    $('#pop_up_change').css('box-shadow','0px 2px 5px red');
    </script>
    ";
    echo "<h4> Wrong Credentials </h4>";
  }
}

elseif (isset($_POST['avatar_submit']))
{

  $file_size = $_FILES['avatar_file']['size'];
  $main_image = $_FILES['avatar_file']['name'];
  $tempmainphoto = $_FILES["avatar_file"]["tmp_name"];
  $folder = ROOT_PATH . "/assets/img/avatar/".$main_image;
   //$file_type = $_FILES['avatar_file']['type'];

   if(($file_size <= 25000) && (move_uploaded_file($tempmainphoto,$folder)))
   {
     $sql_vv = "UPDATE vs_user SET avatar = '$main_image' WHERE id = '$_SESSION[id]'";
     $sql_vv_exec = mysqli_query($conn,$sql_vv);
     if ($sql_vv_exec)
     {


      if (isset($_POST['admin_allow']))
      {
        $_SESSION['change_error'] = 3;
        $_SESSION['user_image'] = $main_image;
      header('location:'.BASE_URL.'/admin/change_details');
      }
      else
      {
        $_SESSION['change_error'] = 3;
        $_SESSION['user_image'] = $main_image;
      header('location:'.BASE_URL.'/user/change_details');
      }

     }
     else
     {
       if (isset($_POST['admin_allow']))
       {
         $_SESSION['change_error'] = 1;
       header('location:'.BASE_URL.'/admin/change_details');
       }
       else
       {
         $_SESSION['change_error'] = 1;
         header('location:'.BASE_URL.'/user/change_details');
       }

     }
   }
   elseif (empty($_FILES['avatar_file']['name']))
   {
     if (isset($_POST['admin_allow']))
     {
       $_SESSION['change_error'] = 4;
     header('location:'.BASE_URL.'/admin/change_details');
     }
     else
     {
       $_SESSION['change_error'] = 4;
       header('location:'.BASE_URL.'/user/change_details');
     }

   }
   else
   {
     if (isset($_POST['admin_allow']))
     {
           $_SESSION['change_error'] = 2;
     header('location:'.BASE_URL.'/admin/change_details');
     }
     else
     {
       $_SESSION['change_error'] = 2;
    header('location:'.BASE_URL.'/user/change_details');
     }

    }
}
else
{
  echo "
  <script>
  $('.loading_screen').hide();
  $('#pop_up_change').show();
  $('#pop_up_change').css('box-shadow','0px 2px 5px red');
  </script>
  ";
  echo "<h4>incorrect credentials</h4>";
}
}

                 /* login database connection */
?>
