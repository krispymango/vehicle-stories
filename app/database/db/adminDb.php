<?php
include(ROOT_PATH . '/app/database/connection/conn.php');

function UserAccounts()
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

  if(empty($_POST['search']))
  {
    $search = "WHERE status = 0";
  }
  else
  {
    $keyword =  trim($_POST['search']);
    $search = "WHERE status = 0 AND (id LIKE '%$keyword%') OR (username LIKE '%$keyword%') OR (email LIKE '%$keyword%') OR (date_of_registration LIKE '%$keyword%') OR (ip_of_registration LIKE '%$keyword%') OR (ip_of_last_login LIKE '%$keyword%')";
  }

  $sql_ua = "SELECT * FROM vw_user $search  ORDER BY $sort $order LIMIT $start, $rpp";
  $sql_ua_exec = mysqli_query($conn,$sql_ua);
  //die($sql_ua);
if ($sql_ua_exec)
{
  while ($sql_ua_fetch = mysqli_fetch_assoc($sql_ua_exec))
  {
    $sql_nr = "SELECT * FROM vw_vehicle_details WHERE user_id = '$sql_ua_fetch[id]'";
    $sql_nr_exec = mysqli_query($conn,$sql_nr);
    $sql_nr_num_rows = mysqli_num_rows($sql_nr_exec);

    echo"
<tr onclick=window.location='".BASE_URL."/admin/user_accounts_details?id=".$sql_ua_fetch['id']."' style='cursor: pointer;' class='myclass'>
      <td><span>".$a++."</span></td>
      <td><span>".$sql_ua_fetch['username']."</span></td>
      <td><span>".$sql_ua_fetch['email']."</span></td>
      <td><span>".$sql_ua_fetch['date_of_registration']."</span></td>
      <td><span>".$sql_ua_fetch['last_login_date']."</span></td>
      <td><span>".$sql_ua_fetch['ip_of_registration']."</span></td>
      <td><span>".$sql_ua_fetch['ip_of_last_login']."</span></td>
      <td><span>".$sql_nr_num_rows."</span></td>
</tr>

    ";
  }
}
else
{
  echo
  " ";
}

}













function Statistics()
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
  $search = " ";
}
else
{
  $keyword =  trim($_POST['search']);
  $search = "WHERE (type_of_vehicle LIKE '%$keyword%') OR (brand LIKE '%$keyword%') OR (email LIKE '%$keyword%') OR (model LIKE '%$keyword%') OR (year_of_production LIKE '%$keyword%') OR (date_added LIKE '%$keyword%') OR (last_modification LIKE '%$keyword%') OR (username LIKE '%$keyword%')";
}

  $sql_st = "SELECT * FROM vw_vehicle_details $search ORDER BY id ASC LIMIT $start, $rpp";
  $sql_st_exec = mysqli_query($conn,$sql_st);
//die($sql_vd);
if ($sql_st_exec)
{
  while ($sql_st_fetch = mysqli_fetch_assoc($sql_st_exec))
  {
    $no_of_photos = 0;
    if (!empty($sql_st_fetch['main_photo']))
    {
      $no_of_photos = $no_of_photos+1;
    }
    if (!empty($sql_st_fetch['photo_one']))
    {
      $no_of_photos = $no_of_photos+1;
    }
    if (!empty($sql_st_fetch['photo_two']))
    {
      $no_of_photos = $no_of_photos+1;
    }
    if (!empty($sql_st_fetch['photo_three']))
    {
      $no_of_photos = $no_of_photos+1;
    }
    if (!empty($sql_st_fetch['photo_four']))
    {
      $no_of_photos = $no_of_photos+1;
    }
    if (!empty($sql_st_fetch['photo_five']))
    {
      $no_of_photos = $no_of_photos+1;
    }
    if (!empty($sql_st_fetch['photo_six']))
    {
      $no_of_photos = $no_of_photos+1;
    }
    if (!empty($sql_st_fetch['photo_seven']))
    {
      $no_of_photos = $no_of_photos+1;
    }
    if (!empty($sql_st_fetch['photo_eight']))
    {
      $no_of_photos = $no_of_photos+1;
    }
    if (!empty($sql_st_fetch['photo_nine']))
    {
      $no_of_photos = $no_of_photos+1;
    }
    if (!empty($sql_st_fetch['photo_ten']))
    {
      $no_of_photos = $no_of_photos+1;
    }
    if (!empty($sql_st_fetch['photo_eleven']))
    {
      $no_of_photos = $no_of_photos+1;
    }
    if (!empty($sql_st_fetch['photo_twelve']))
    {
      $no_of_photos = $no_of_photos+1;
    }
    if (!empty($sql_st_fetch['photo_thirteen']))
    {
      $no_of_photos = $no_of_photos+1;
    }
    if (!empty($sql_st_fetch['photo_fourteen']))
    {
      $no_of_photos = $no_of_photos+1;
    }
    if (!empty($sql_st_fetch['photo_fifteen']))
    {
      $no_of_photos = $no_of_photos+1;
    }
    if (!empty($sql_st_fetch['photo_sixteen']))
    {
      $no_of_photos = $no_of_photos+1;
    }
    if (!empty($sql_st_fetch['photo_seventeen']))
    {
      $no_of_photos = $no_of_photos+1;
    }
    if (!empty($sql_st_fetch['photo_eighteen']))
    {
      $no_of_photos = $no_of_photos+1;
    }
    if (!empty($sql_st_fetch['photo_nineteen']))
    {
      $no_of_photos = $no_of_photos+1;
    }
    if (!empty($sql_st_fetch['photo_twenty']))
    {
      $no_of_photos = $no_of_photos+1;
    }



    echo"
<tr>
      <td><span>".$a++."</span></td>
      <td><span>".$sql_st_fetch['username']."</span></td>
      <td><span>".$sql_st_fetch['email']."</span></td>
      <td><span>".$sql_st_fetch['date_of_registration']."  ".$sql_st_fetch['time_of_registration']."</span></td>
      <td><span>".$sql_st_fetch['last_login_date']."  ".$sql_st_fetch['last_login_time']."</span></td>
      <td><span>".$sql_st_fetch['ip_of_registration']."</span></td>
      <td><span>".$sql_st_fetch['ip_of_last_login']."</span></td>
      <td><span>".$sql_st_fetch['type_of_vehicle']."</span></td>
      <td><span>".$sql_st_fetch['brand']."</span></td>
      <td><span>".$sql_st_fetch['model']."</span></td>
      <td><span>".$sql_st_fetch['year_of_production']."</span></td>
      <td><span>".$sql_st_fetch['engine_capacity']."</span></td>
      <td><span>".$sql_st_fetch['engine_power']."</span></td>
      <td><span>".$sql_st_fetch['fuel_type']."</span></td>
      <td><span>".$sql_st_fetch['transmission']."</span></td>
      <td><span>".$sql_st_fetch['drive']."</span></td>
      <td><span>".$sql_st_fetch['max_speed']."</span></td>
      <td><span>".$sql_st_fetch['no_of_doors']."</span></td>
      <td><span>".$sql_st_fetch['no_of_seats']."</span></td>
      <td><span>".$sql_st_fetch['mileage']."</span></td>
      <td><span>".$sql_st_fetch['country_of_origin']."</span></td>
      <td><span>".$sql_st_fetch['estimated_value']."</span></td>
      <td><span>".$sql_st_fetch['y_o_p_b_c_o']."</span></td>
      <td><span>".$sql_st_fetch['location_voivodship']."</span></td>
      <td><span>".$sql_st_fetch['location_district']."</span></td>
      <td><span>".substr($sql_st_fetch['announcement'],0,20)."...</span></td>
      <td><span>";
      $date1 = date('Y-m-d');
      $date2 = $sql_st_fetch['announcement_expire_date'];

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
      <td><span>".$no_of_photos."</span></td>
      <td><span>".$sql_st_fetch['date_added']." ".$sql_st_fetch['time_added']."</span></td>
      <td><span>".$sql_st_fetch['last_modification']."</span></td>
      <td><span>5</span></td>
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

function AdminPanelLeftDetails()
{
  global $conn;

  $sql_left_vw = "SELECT * FROM vw_user WHERE id = '$_GET[id]'";
  $sql_left_vw_exec = mysqli_query($conn,$sql_left_vw);

if ($sql_left_vw_exec)
{
  while ($sql_left_vw_fetch = mysqli_fetch_assoc($sql_left_vw_exec))
  {
    echo
    "
    <div><span>username</span> <span>".$sql_left_vw_fetch['username']."</span></div>
    <div><span>date of registration</span> <span>".$sql_left_vw_fetch['date_of_registration']."</span></div>
    <div><span>last login date</span> <span>".$sql_left_vw_fetch['last_login_date']."</span></div>
    <div><span>ip of registration</span> <span>".$sql_left_vw_fetch['ip_of_registration']."</span></div>
    <div><span>ip of last login</span> <span>".$sql_left_vw_fetch['ip_of_last_login']."</span></div>
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





function AdminPanelRightDetails()
{
  global $conn;

  $sql_right_vw = "SELECT * FROM vw_user WHERE id = '$_GET[id]'";
  $sql_right_vw_exec = mysqli_query($conn,$sql_right_vw);

  $sql_right_vd = "SELECT * FROM vw_vehicle_details WHERE user_id = '$_GET[id]'";
  $sql_right_vd_exec = mysqli_query($conn,$sql_right_vd);
  $sql_right_vd_num_rows = mysqli_num_rows($sql_right_vd_exec);

//die($sql_right_vd);
if ($sql_right_vw_exec)
{
  while ($sql_right_vw_fetch = mysqli_fetch_assoc($sql_right_vw_exec))
  {
    echo
    "
    <div><a>number of added vehicles</a> <a>  </a> <a>".$sql_right_vd_num_rows."</a></div>
    <div><a>email name</a> <a style='text-decoration:none;'href='change_user_details?u_id=".$sql_right_vw_fetch['id']."'> <span>change</span> </a> <a>".$sql_right_vw_fetch['email']."</a></div>
    <div><a>email status</a> <a style='text-decoration:none;'href='change_user_details?u_id=".$sql_right_vw_fetch['id']."'> <span>change</span> </a> <a>";
    if ($sql_right_vw_fetch['email_active'] == 0)
    {
      echo 'active';
    }
    else
    {
      echo "inactive";
    }
    echo "</a></div>
    <div><a>blocked to</a> <a style='text-decoration:none;'href='change_user_details?u_id=".$sql_right_vw_fetch['id']."'> <span>change</span> </a> <a>";
    if ($sql_right_vw_fetch['blocked'] == 0)
    {
      echo 'no blocked';
    }
    else
    {
      echo "blocked";
    }
    echo "</a></div>
    <div><a>delete account</a> <a> <span onclick='DeleteAccount()' style='background:red;'>delete</span> </a></div>";
  }
}
else
{
  echo
  "
  <div></div>
  <div></div>
  <div></div>
  <div></div>
  <div></div>
  ";
}
}




function AdminVehicleDetails()
{
  global $conn;

  if (isset($_POST['entries']))
  {
    $entries = $_POST['entries'];
  }
  else
  {
      $entries = 10;
  }


  if(empty($_POST['search']))
  {
    $search = "WHERE user_id =".$_GET['id']." AND verified = 1";
  }
  else
  {
    $keyword =  trim($_POST['search']);
    $search = "WHERE verified = 1 AND (type_of_vehicle LIKE '%$keyword%') OR (brand LIKE '%$keyword%)' OR (model LIKE '%$keyword%') OR (year_of_production LIKE '%$keyword%') OR (date_added LIKE '%$keyword%') OR (last_modification LIKE '%$keyword%') AND user_id =".$_GET['id']."";
  }

  $a = 1;
  $sql_vd = "SELECT * FROM vw_vehicle_details $search  ORDER BY brand ASC LIMIT $entries";
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
      <td><span>#</span></td>
      <td id='action_btns'><a id='edt_btn' href='".BASE_URL."/user/edit?id=".bin2hex(base64_encode($sql_vd_fetch['id']))."&u_id=".bin2hex(base64_encode($sql_vd_fetch['user_id']))."&email=".$sql_vd_fetch['email']."&admin_allow=yes'>Edit</a><button id='del_btn' type='button' onclick='DelelteVehicle()' name='button' value='".$sql_vd_fetch['id']."''>Delete</button></td>
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




function AdminMessageDetails()
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
    $search = "WHERE user_id != '13'  GROUP BY
    	user_id ASC
    HAVING
    	COUNT( read_msg ) > 0";
      $count = ',
    	SUM(read_msg) AS duplicate_key';
  }
  else
  {
    $keyword =  trim($_POST['search']);
    $search = "WHERE (username LIKE '%$keyword%') OR (date_posted LIKE '%$keyword%') OR (time_posted LIKE '%$keyword%') GROUP BY
    	user_id ASC";
      $count = ',
      COUNT(read_msg ) > 0 AS duplicate_key';
  }


  $sql_vd = "
  SELECT
	* $count
FROM
	vw_contact_form
$search
 LIMIT 0,$rpp";
  $sql_vd_exec = mysqli_query($conn,$sql_vd);
//die($sql_vd);
if ($sql_vd_exec)
{
  while ($sql_vd_fetch = mysqli_fetch_assoc($sql_vd_exec))
  {

    echo"
    <tr>
      <td>".$a++."</td>
      <td>".$sql_vd_fetch['username']."</td>
      <td>";
    $user_date_conv = strtotime($sql_vd_fetch['user_activity']);
    $curr_date_conv = strtotime(date('Y-m-d') . date('H:i:s'));
    $minutes = ($curr_date_conv - $user_date_conv) /60;
    //echo $minutes;
if (!empty($sql_vd_fetch['user_activity']) && ($minutes < 11)) {
  echo "<i style='color:green' class='fas fa-circle'></i>";
}
else {
  echo "<i class='fas fa-circle'></i>";
}
//die();
echo "
       </td>
      <td>".$sql_vd_fetch['date_posted']." ".$sql_vd_fetch['time_posted']."</td>
      <td>
        ".$sql_vd_fetch['duplicate_key']."
    </td>
    <td><a id='edt_btn' href='send_message?u_id=".$sql_vd_fetch['user_id']."&email=".$sql_vd_fetch['email']."&read=true'>show</a> </td>
    </tr>
    ";
  }
}
else
{
  echo
  "
  <tr>
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



function ConfigurationEmailTemplates()
{
  global $conn;
  for ($m=1; $m < 16; $m++)
  {

    if (isset($_POST['submit'.$m]))
    {
      if (isset($_POST['message'.$m]) && ($m == 1))
      {
        $message_template1 = str_replace("'", "''", trim($_POST['message'.$m]));
        $sql_et = "UPDATE vs_email_templates SET account_registration_activation_link = '$message_template1'";
        $sql_et_exec = mysqli_query($conn,$sql_et);

        if ($sql_et_exec)
        {
          echo "
          <script>
          $(document).ready(function()
          {
          $('.pop_up_box').show();
          $('#pop_up_icon').show();
          $('.pop_up_box').css('box-shadow','0px 2px 5px green');
          $('.pop_up_box').html('<h4> Changes have been applied</h4>');
        });
          </script>
          ";
        }
        else
        {
          echo "
          <script>
          $(document).ready(function()
          {
          $('.pop_up_box').show();
          $('#pop_up_icon').show();
          $('.pop_up_box').css('box-shadow','0px 2px 5px red');
          $('.pop_up_box').html('<h4>Could not make changes</h4>');
        });
          </script>
          ";
        }
      }
      elseif (isset($_POST['message'.$m]) && ($m == 2))
      {
        $message_template2 = str_replace("'", "''", trim($_POST['message'.$m]));
        $sql_et = "UPDATE vs_email_templates SET successful_activation = '$message_template2'";
        $sql_et_exec = mysqli_query($conn,$sql_et);

        if ($sql_et_exec)
        {
          echo "
          <script>
          $(document).ready(function()
          {
          $('.pop_up_box').show();
          $('#pop_up_icon').show();
          $('.pop_up_box').css('box-shadow','0px 2px 5px green');
          $('.pop_up_box').html('<h4> Changes have been applied</h4>');
        });
          </script>
          ";
        }
        else
        {
          echo "
          <script>
          $(document).ready(function()
          {
          $('.pop_up_box').show();
          $('#pop_up_icon').show();
          $('.pop_up_box').css('box-shadow','0px 2px 5px red');
          $('.pop_up_box').html('<h4>Could not make changes</h4>');
        });
          </script>
          ";
        }
      }
      elseif (isset($_POST['message'.$m]) && ($m ==3))
      {
        $message_template3 = str_replace("'", "''", trim($_POST['message'.$m]));
        $sql_et = "UPDATE vs_email_templates SET change_of_email_activation_link = '$message_template3'";
        $sql_et_exec = mysqli_query($conn,$sql_et);

        if ($sql_et_exec)
        {
          echo "
          <script>
          $(document).ready(function()
          {
          $('.pop_up_box').show();
          $('#pop_up_icon').show();
          $('.pop_up_box').css('box-shadow','0px 2px 5px green');
          $('.pop_up_box').html('<h4> Changes have been applied</h4>');
        });
          </script>
          ";
        }
        else
        {
          echo "
          <script>
          $(document).ready(function()
          {
          $('.pop_up_box').show();
          $('#pop_up_icon').show();
          $('.pop_up_box').css('box-shadow','0px 2px 5px red');
          $('.pop_up_box').html('<h4>Could not make changes</h4>');
        });
          </script>
          ";
        }
      }
      elseif (isset($_POST['message'.$m]) && ($m ==4))
      {
        $message_template4 = str_replace("'", "''", trim($_POST['message'.$m]));
        $sql_et = "UPDATE vs_email_templates SET success_email_change_new = '$message_template4'";
        $sql_et_exec = mysqli_query($conn,$sql_et);

        if ($sql_et_exec)
        {
          echo "
          <script>
          $(document).ready(function()
          {
          $('.pop_up_box').show();
          $('#pop_up_icon').show();
          $('.pop_up_box').css('box-shadow','0px 2px 5px green');
          $('.pop_up_box').html('<h4> Changes have been applied</h4>');
        });
          </script>
          ";
        }
        else
        {
          echo "
          <script>
          $(document).ready(function()
          {
          $('.pop_up_box').show();
          $('#pop_up_icon').show();
          $('.pop_up_box').css('box-shadow','0px 2px 5px red');
          $('.pop_up_box').html('<h4>Could not make changes</h4>');
        });
          </script>
          ";
        }
      }
      elseif (isset($_POST['message'.$m]) && ($m ==5))
      {
        $message_template5 = str_replace("'", "''", trim($_POST['message'.$m]));
        $sql_et = "UPDATE vs_email_templates SET success_email_change_old = '$message_template5'";
        $sql_et_exec = mysqli_query($conn,$sql_et);

        if ($sql_et_exec)
        {
          echo "
          <script>
          $(document).ready(function()
          {
          $('.pop_up_box').show();
          $('#pop_up_icon').show();
          $('.pop_up_box').css('box-shadow','0px 2px 5px green');
          $('.pop_up_box').html('<h4> Changes have been applied</h4>');
        });
          </script>
          ";
        }
        else
        {
          echo "
          <script>
          $(document).ready(function()
          {
          $('.pop_up_box').show();
          $('#pop_up_icon').show();
          $('.pop_up_box').css('box-shadow','0px 2px 5px red');
          $('.pop_up_box').html('<h4>Could not make changes</h4>');
        });
          </script>
          ";
        }
      }
      elseif (isset($_POST['message'.$m]) && ($m ==6))
      {
        $message_template6 = str_replace("'", "''", trim($_POST['message'.$m]));
        $sql_et = "UPDATE vs_email_templates SET change_password_activation_link = '$message_template6'";
        $sql_et_exec = mysqli_query($conn,$sql_et);

        if ($sql_et_exec)
        {
          echo "
          <script>
          $(document).ready(function()
          {
          $('.pop_up_box').show();
          $('#pop_up_icon').show();
          $('.pop_up_box').css('box-shadow','0px 2px 5px green');
          $('.pop_up_box').html('<h4> Changes have been applied</h4>');
        });
          </script>
          ";
        }
        else
        {
          echo "
          <script>
          $(document).ready(function()
          {
          $('.pop_up_box').show();
          $('#pop_up_icon').show();
          $('.pop_up_box').css('box-shadow','0px 2px 5px red');
          $('.pop_up_box').html('<h4>Could not make changes</h4>');
        });
          </script>
          ";
        }
      }
      elseif (isset($_POST['message'.$m]) && ($m ==7))
      {
        $message_template7 = str_replace("'", "''", trim($_POST['message'.$m]));
        $sql_et = "UPDATE vs_email_templates SET success_password_change = '$message_template7'";
        $sql_et_exec = mysqli_query($conn,$sql_et);

        if ($sql_et_exec)
        {
          echo "
          <script>
          $(document).ready(function()
          {
          $('.pop_up_box').show();
          $('#pop_up_icon').show();
          $('.pop_up_box').css('box-shadow','0px 2px 5px green');
          $('.pop_up_box').html('<h4> Changes have been applied</h4>');
        });
          </script>
          ";
        }
        else
        {
          echo "
          <script>
          $(document).ready(function()
          {
          $('.pop_up_box').show();
          $('#pop_up_icon').show();
          $('.pop_up_box').css('box-shadow','0px 2px 5px red');
          $('.pop_up_box').html('<h4>Could not make changes</h4>');
        });
          </script>
          ";
        }
      }
      elseif (isset($_POST['message'.$m]) && ($m ==8))
      {
        $message_template8 = str_replace("'", "''", trim($_POST['message'.$m]));
        $sql_et = "UPDATE vs_email_templates SET vehicle_additions = '$message_template8'";
        $sql_et_exec = mysqli_query($conn,$sql_et);

        if ($sql_et_exec)
        {
          echo "
          <script>
          $(document).ready(function()
          {
          $('.pop_up_box').show();
          $('#pop_up_icon').show();
          $('.pop_up_box').css('box-shadow','0px 2px 5px green');
          $('.pop_up_box').html('<h4> Changes have been applied</h4>');
        });
          </script>
          ";
        }
        else
        {
          echo "
          <script>
          $(document).ready(function()
          {
          $('.pop_up_box').show();
          $('#pop_up_icon').show();
          $('.pop_up_box').css('box-shadow','0px 2px 5px red');
          $('.pop_up_box').html('<h4>Could not make changes</h4>');
        });
          </script>
          ";
        }
      }
      elseif (isset($_POST['message'.$m]) && ($m == 9))
      {
        $message_template9 = str_replace("'", "''", trim($_POST['message'.$m]));
        $sql_et = "UPDATE vs_email_templates SET vehicle_modifications = '$message_template9'";
        $sql_et_exec = mysqli_query($conn,$sql_et);

        if ($sql_et_exec)
        {
          echo "
          <script>
          $(document).ready(function()
          {
          $('.pop_up_box').show();
          $('#pop_up_icon').show();
          $('.pop_up_box').css('box-shadow','0px 2px 5px green');
          $('.pop_up_box').html('<h4> Changes have been applied</h4>');
        });
          </script>
          ";
        }
        else
        {
          echo "
          <script>
          $(document).ready(function()
          {
          $('.pop_up_box').show();
          $('#pop_up_icon').show();
          $('.pop_up_box').css('box-shadow','0px 2px 5px red');
          $('.pop_up_box').html('<h4>Could not make changes</h4>');
        });
          </script>
          ";
        }
      }
      elseif (isset($_POST['message'.$m]) && ($m == 10))
      {
        $message_template10 = str_replace("'", "''", trim($_POST['message'.$m]));
        $sql_et = "UPDATE vs_email_templates SET user_request = '$message_template10'";
        $sql_et_exec = mysqli_query($conn,$sql_et);

        if ($sql_et_exec)
        {
          echo "
          <script>
          $(document).ready(function()
          {
          $('.pop_up_box').show();
          $('#pop_up_icon').show();
          $('.pop_up_box').css('box-shadow','0px 2px 5px green');
          $('.pop_up_box').html('<h4> Changes have been applied</h4>');
        });
          </script>
          ";
        }
        else
        {
          echo "
          <script>
          $(document).ready(function()
          {
          $('.pop_up_box').show();
          $('#pop_up_icon').show();
          $('.pop_up_box').css('box-shadow','0px 2px 5px red');
          $('.pop_up_box').html('<h4>Could not make changes</h4>');
        });
          </script>
          ";
        }
      }
      elseif (isset($_POST['message'.$m]) && ($m == 11))
      {
        $message_template11 = str_replace("'", "''", trim($_POST['message'.$m]));
        $sql_et = "UPDATE vs_email_templates SET receipt_of_user_request = '$message_template11'";
        $sql_et_exec = mysqli_query($conn,$sql_et);

        if ($sql_et_exec)
        {
          echo "
          <script>
          $(document).ready(function()
          {
          $('.pop_up_box').show();
          $('#pop_up_icon').show();
          $('.pop_up_box').css('box-shadow','0px 2px 5px green');
          $('.pop_up_box').html('<h4> Changes have been applied</h4>');
        });
          </script>
          ";
        }
        else
        {
          echo "
          <script>
          $(document).ready(function()
          {
          $('.pop_up_box').show();
          $('#pop_up_icon').show();
          $('.pop_up_box').css('box-shadow','0px 2px 5px red');
          $('.pop_up_box').html('<h4>Could not make changes</h4>');
        });
          </script>
          ";
        }
      }
      elseif (isset($_POST['message'.$m]) && ($m == 12))
      {
        $message_template12 = str_replace("'", "''", trim($_POST['message'.$m]));
        $sql_et = "UPDATE vs_email_templates SET account_blockage = '$message_template12'";
        $sql_et_exec = mysqli_query($conn,$sql_et);

        if ($sql_et_exec)
        {
          echo "
          <script>
          $(document).ready(function()
          {
          $('.pop_up_box').show();
          $('#pop_up_icon').show();
          $('.pop_up_box').css('box-shadow','0px 2px 5px green');
          $('.pop_up_box').html('<h4> Changes have been applied</h4>');
        });
          </script>
          ";
        }
        else
        {
          echo "
          <script>
          $(document).ready(function()
          {
          $('.pop_up_box').show();
          $('#pop_up_icon').show();
          $('.pop_up_box').css('box-shadow','0px 2px 5px red');
          $('.pop_up_box').html('<h4>Could not make changes</h4>');
        });
          </script>
          ";
        }
      }
      elseif (isset($_POST['message'.$m]) && ($m == 13))
      {
        $message_template13 = str_replace("'", "''", trim($_POST['message'.$m]));
        $sql_et = "UPDATE vs_email_templates SET admin_changes_list = '$message_template13'";
        $sql_et_exec = mysqli_query($conn,$sql_et);

        if ($sql_et_exec)
        {
          echo "
          <script>
          $(document).ready(function()
          {
          $('.pop_up_box').show();
          $('#pop_up_icon').show();
          $('.pop_up_box').css('box-shadow','0px 2px 5px green');
          $('.pop_up_box').html('<h4> Changes have been applied</h4>');
        });
          </script>
          ";
        }
        else
        {
          echo "
          <script>
          $(document).ready(function()
          {
          $('.pop_up_box').show();
          $('#pop_up_icon').show();
          $('.pop_up_box').css('box-shadow','0px 2px 5px red');
          $('.pop_up_box').html('<h4>Could not make changes</h4>');
        });
          </script>
          ";
        }
      }
      elseif (isset($_POST['message'.$m]) && ($m == 14))
      {
        $message_template14 = str_replace("'", "''", trim($_POST['message'.$m]));
        $sql_et = "UPDATE vs_email_templates SET decision_on_user_request = '$message_template14'";
        $sql_et_exec = mysqli_query($conn,$sql_et);

        if ($sql_et_exec)
        {
          echo "
          <script>
          $(document).ready(function()
          {
          $('.pop_up_box').show();
          $('#pop_up_icon').show();
          $('.pop_up_box').css('box-shadow','0px 2px 5px green');
          $('.pop_up_box').html('<h4> Changes have been applied</h4>');
        });
          </script>
          ";
        }
        else
        {
          echo "
          <script>
          $(document).ready(function()
          {
          $('.pop_up_box').show();
          $('#pop_up_icon').show();
          $('.pop_up_box').css('box-shadow','0px 2px 5px red');
          $('.pop_up_box').html('<h4>Could not make changes</h4>');
        });
          </script>
          ";
        }
      }
      elseif (isset($_POST['message'.$m]) && ($m == 15))
      {
        $message_template15 = str_replace("'", "''", trim($_POST['message'.$m]));
        $sql_et = "UPDATE vs_email_templates SET daily_report = '$message_template15'";
        $sql_et_exec = mysqli_query($conn,$sql_et);

        if ($sql_et_exec)
        {
          echo "
          <script>
          $(document).ready(function()
          {
          $('.pop_up_box').show();
          $('#pop_up_icon').show();
          $('.pop_up_box').css('box-shadow','0px 2px 5px green');
          $('.pop_up_box').html('<h4> Changes have been applied</h4>');
        });
          </script>
          ";
        }
        else
        {
          echo "
          <script>
          $(document).ready(function()
          {
          $('.pop_up_box').show();
          $('#pop_up_icon').show();
          $('.pop_up_box').css('box-shadow','0px 2px 5px red');
          $('.pop_up_box').html('<h4>Could not make changes</h4>');
        });
          </script>
          ";
        }
      }
    }
  }

}

?>
