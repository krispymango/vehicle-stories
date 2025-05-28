<?php
if (empty($_GET['u_id']) || !isset($_SESSION['id']))
{
header('location:'.BASE_URL);
}
$u_idd = base64_decode(hex2bin($_GET['u_id']));
$_SESSION['user_idd'] = $u_idd;
 ?>

<section class="user_panel_wrapper">

<div class="profile_user">
  <div class="profile_details_heading">
<?php

$u_idd = base64_decode(hex2bin($_GET['u_id']));
        $sql_left_vw = "SELECT * FROM vw_user WHERE id = '$u_idd'";
        $sql_left_vw_exec = mysqli_query($conn,$sql_left_vw);

      if ($sql_left_vw_exec)
      {
        while ($sql_left_vw_fetch = mysqli_fetch_assoc($sql_left_vw_exec))
        {
          echo "<h2><img src='".BASE_URL."/assets/img/avatar/".$sql_left_vw_fetch['avatar']."'>  ".$sql_left_vw_fetch['username']."</h2>";
        }
      } ?>
      <?php
      $u_idd = base64_decode(hex2bin($_GET['u_id']));
       if (isset($_SESSION['id']) && $_SESSION['id'] != base64_decode(hex2bin($_GET['u_id']))): ?>
        <h3><span><a href="<?php echo BASE_URL . '/user/inbox?snd_id='.$_GET['u_id']; ?>">write to <?php
        $sql_vw = "SELECT * FROM vw_user WHERE id = '$u_idd'";
        $sql_vw_exec = mysqli_query($conn,$sql_vw);
        $sql_vw_fetch = mysqli_fetch_assoc($sql_vw_exec);
         echo $sql_vw_fetch['username'] ?></a></span></h3>
      <?php endif; ?>

  </div>
<div class="profile_user_details">

<div class="left_user_details">
<?php profileLeftPane(); ?>
</div>
<div class="left_user_details">
<?php profileMiddlePane(); ?>
</div>
<div class="left_user_details">
<?php profileRightPane(); ?>
</div>
</div>

<div class="vehicle_list_heading">
    <h4>List Of Added Vehicles</h4>
    <?php
    $u_idd = base64_decode(hex2bin($_GET['u_id']));
    $sql_left_vw = "SELECT * FROM vw_vehicle_details WHERE user_id = '$u_idd'";
    $sql_left_vw_exec = mysqli_query($conn,$sql_left_vw);

  if ($sql_left_vw_fetch = mysqli_fetch_assoc($sql_left_vw_exec))
  {
      echo "<h4><span><a href='".BASE_URL."/index?u_id=".bin2hex(base64_encode($sql_left_vw_fetch['user_id']))."'>view all</a></span></h4>";
  }


     ?>
</div>
<div class="vehicle_list">
<div class="vehicle_tb_list ">
  <div class="table">
<p id="demo"></p>
<div id="table_arr">

  <a>Show
  <select id="usr_entry" name="entries">
    <?php
    if (isset($_GET['entries']))
    {
      $rpp = $_GET['entries'];
      echo "<option value='".$rpp."'>--".$rpp."--</option>";
    }
    ?>
  <option value="10">10</option>
  <option value="9">9</option>
  </select> entries
  <input type="hidden" name="p_id" id="profile_id" value="<?php echo $_GET['u_id']; ?>">
  </a>
  <a>
    <span id="search_boxx">Search:<input type="text" name="search" id="usrrr_search"></span>
  </a>
</div>

    <div id="table_wrapper">
        <table id="table_content">
            <thead id="table_heading">
              <th><span>#</span></th>
              <th><span>type of vehicle</span><button style="background:white;border:none;" type="button" value="type_of_vehicle" name="sort" id="all_tov"><span><i class="fas fa-sort"></i><span></button></th>
              <th><span>brand</span><button style="background:white;border:none;" type="button" value="brand" name="sort" id="all_brand"><span ><i class="fas fa-sort"></i><span></button></th>
              <th><span>model</span><button style="background:white;border:none;" type="button" value="model" name="sort" id="all_model"><span><i class="fas fa-sort"></i><span></button></th>
              <th><span>year of production</span><button style="background:white;border:none;" type="button" value="year_of_production" name="sort" id="all_year_of_production"><span><i class="fas fa-sort"></i><span></button></th>
              <th><span>date added</span><button style="background:white;border:none;" type="button" value="date_added" name="sort" id="all_date_added"><span><i class="fas fa-sort"></i><span></button></th>
              <th><span>last modification</span><button style="background:white;border:none;" type="button" value="last_modification" name="sort" id="all_last_modification"><span><i class="fas fa-sort"></i><span></button></th>
              <th><span>announcement expire</span><button style="background:white;border:none;" type="button" value="announcement_expire_date" name="sort" id="all_announcement_expire"><span><i class="fas fa-sort"></i><span></button></th>
              <th><span>modification of added</span></th>
            </thead>
            <tbody id="view_table">


<?php ProfileVehicleDetails(); ?>



            </tbody>
          </table>
        </div>

        <div id="table_pagination">
          <a></a>
          <div id="pgg" class="pagination_no">
            <?php
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
                $search = "WHERE user_id =".$_SESSION['user_idd']." AND verified = 1";
              }
              else
              {
                $keyword =  trim($_POST['search']);
                $search = "WHERE verified = 1 AND (type_of_vehicle LIKE '%$keyword%') OR (brand LIKE '%$keyword%)' OR (model LIKE '%$keyword%') OR (year_of_production LIKE '%$keyword%') OR (date_added LIKE '%$keyword%') OR (last_modification LIKE '%$keyword%') AND user_id ='$_SESSION[user_idd]'";
              }

            $rpp = 10;
            $resultSet = "SELECT * FROM vw_vehicle_details $search  ORDER BY brand";
            $resultSetExec = mysqli_query($conn,$resultSet);
            $numRows = mysqli_num_rows($resultSetExec);
            $totalPages = round($numRows / $rpp);
//die($resultSet);
            //die($totalPages);


            // Look for a GET variable page if not found default is 1.
         if (isset($_GET["page"]))
         {
           $a = $_GET["page"];
           $page  = $_GET["page"];
         }
         else
         {
           $a = 1;
           $page=1;
         }


            if($page>=2)
            {
             echo "<a href='?page=".($page-1)."'>  Prev </a>";
            }
            for($a; $a <= $totalPages; $a++)
            {
              echo "<a href='?page=".$a."'>".$a."</a>";
            }
            if($page < $totalPages)
            {
             echo "<a href='?page=".($page+1)."'>  Next </a>";
            }
            //echo $val+1;




             ?>
           </div>
          </a>
        </div>
        </div>

  </div>
</div>

</div>
</section>
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



<script type="text/javascript">
$(document).ready(function()
{
  $('#hideHeader').hide();
  $('#hideHeaderTwo').hide();
});
</script>
