<?php
$sql = "SELECT * FROM vw_user WHERE id = '$_GET[id]'";
$sql_exe = mysqli_query($conn,$sql);

if ($sql_fetch = mysqli_fetch_assoc($sql_exe))
{
 $email = $sql_fetch['email'];
}

$_SESSION['user_idd'] = $_GET['id'];
?>

<!-- this is the file directory which has the administrator panel Navigation -->
<?php include(ROOT_PATH . '/admin/includes/adminPanelNavWrapper.php'); ?>
<!-- this is the file directory which has the administrator panel Navigation -->


<section class="admin_panel_wrapper">
<h3>User Account Details</h3>

<div class="user_details">

<div class="left_user_details">
<?php AdminPanelLeftDetails(); ?>
</div>
<div class="right_user_details">
<?php AdminPanelRightDetails(); ?>
</div>
</div>
<h4>List Of Added Vehicles</h4>
<div class="vehicle_list">
<div class="vehicle_tb_list table">
  <div class="table">
<p id="demo"></p>
    <div id="table_arr">
      <a>Show
      <select id="usr_entry" name="entries">
      <option value="10">10</option>
      <option value="9">9</option>
      </select> entries
      </a>
      <a>
        <span style="float:right;">Search:<input type="text" name="search" id="usr_search"></span>
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

<div class="user_table_container">


<?php AdminVehicleDetails(); ?>

</div>

            </tbody>
          </table>
        </div>

        <div id="table_pagination">
          <a>Showing 1 to 3 of 3 entries</a>
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

              if ($_SESSION['status'] == 1)
              {
                $id = $_SESSION['user_idd'];
              }
              else {
                $id = $_SESSION['id'];
              }

              if(empty($_POST['search']))
              {
                $search = "WHERE user_id =".$id." AND verified = 1";
              }
              else
              {
                $keyword =  trim($_POST['search']);
                $search = "WHERE verified = 1 AND (type_of_vehicle LIKE '%$keyword%') OR (brand LIKE '%$keyword%)' OR (model LIKE '%$keyword%') OR (year_of_production LIKE '%$keyword%') OR (date_added LIKE '%$keyword%') OR (last_modification LIKE '%$keyword%') AND user_id ='$id'";
              }

            $rpp = 10;
            $resultSet = "SELECT * FROM vw_vehicle_details $search  ORDER BY brand ASC";
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
    <a href="<?php echo BASE_URL . '/user/add_vehicle?u_id='.bin2hex(base64_encode($_GET['id'])).'&admin_allow=yes&email='.$email; ?>"><i class="fas fa-plus"></i></a>
        </div>

</div>
</div>

</section>


<script>
function DelelteVehicle()
{
  var vehicle_id = $('#del_btn').val();
  $(document).ready(function()
  {
  if (confirm("Are you sure you want to delete this vehicle!") == true)
  {
    window.location.href = "deleteVehicle?id=<?php echo $_GET['id'];?>&v_id="+vehicle_id;
  }
    else
  {

  }
  });
}

function DeleteAccount()
{
  $(document).ready(function()
  {
  if (confirm("Are you sure you want to delete this account!") == true)
  {
    window.location.href = "deleteAccount?id=<?php echo $_GET['id'];?> ";
  }
    else
  {

  }
  });
}



//User Table Entries function
$(document).ready(function()
{
$('#usr_entry').change(function()
{
  var entries = $("#usr_entry").val();
  $('#view_table').load("../app/helpers/vehicleDetailsTable",
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
  $('#pgg').load("../app/helpers/vehicleDetailsTablePagination",
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

  $('#view_table').load("../app/helpers/vehicleDetailsTable",
 {
    search: search,
});
});
});


$(document).ready(function()
{
$('#usr_search').keyup(function()
{
  var search = $("#usr_search").val();
  $('#pgg').load("../app/helpers/vehicleDetailsTablePagination",
 {
    search: search
});
});
});

</script>
