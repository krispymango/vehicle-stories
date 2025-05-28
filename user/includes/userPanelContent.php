<?php
unset($_SESSION['user_idd']);
if (isset($_SESSION['add_success']))
{
  echo "
  <script>
  $(document).ready(function()
  {
  $('.pop_up_box').show(function()
{
  $('#pop_up_icon').show();
  $('.pop_up_box').css('box-shadow','0px 2px 5px green');
  $('.pop_up_box').html('<h4> Vehicle was successfully added</h4>');
  $('.pop_up_box').delay(2000).fadeOut();
});
});
  </script>
  ";
  unset($_SESSION['add_success']);
  unset($_SESSION['error_three']);
  unset($_SESSION['error_one']);
  unset($_SESSION['error_two']);
}
elseif (isset($_SESSION['add_success_two']))
{
  echo "
  <script>
  $(document).ready(function()
  {
  $('.pop_up_box').show(function()
{
  $('#pop_up_icon').show();
  $('.pop_up_box').css('box-shadow','0px 2px 5px green');
  $('.pop_up_box').html('<h4> Vehicle was successfully modified</h4>');
  $('.pop_up_box').delay(2000).fadeOut();
});
});
  </script>
  ";
  unset($_SESSION['add_success_two']);
  unset($_SESSION['add_success']);
  unset($_SESSION['error_three']);
  unset($_SESSION['error_one']);
  unset($_SESSION['error_two']);
}
elseif (isset($_SESSION['delete_error']))
{
  echo "
  <script>
  $(document).ready(function()
  {
  $('.pop_up_box').show(function()
{
  $('#pop_up_icon').show();
  $('.pop_up_box').css('box-shadow','0px 2px 5px green');
  $('.pop_up_box').html('<h4> Could not delete your entry!</h4>');
  $('.pop_up_box').delay(2000).fadeOut();
});
});
  </script>
  ";
  unset($_SESSION['delete_error']);
  unset($_SESSION['add_success_two']);
  unset($_SESSION['add_success']);
  unset($_SESSION['error_three']);
  unset($_SESSION['error_one']);
  unset($_SESSION['error_two']);
}

 ?>
 <div id="pop_up_change" class="pop_up_box">
 <i id="pop_up_icon" class="fas fa-2x fa-times-circle" onclick="hidePopUpModal()"></i>
 </div>

<div class="deleteModal_wrapper">
  <div class="deleteModal">
    <h3>Are you sure you want to delete this entry!</h3>
  <a id="yes_btn_wrapper">Yes</a>
  <a id="no_btn" onclick="hideDeleteModal()">No</a>
  </div>
</div>

<?php
if (isset($_SESSION['email']) && $_SESSION['username'])
{
  $sql_as = "SELECT * FROM vs_user WHERE email = '$_SESSION[email]' AND username = '$_SESSION[username]' AND registration_key_active_status = 1";
  $sql_as_exec = mysqli_query($conn,$sql_as);
  $sql_as_fetch = mysqli_fetch_assoc($sql_as_exec);
  $sql_as_num_rows = mysqli_num_rows($sql_as_exec);
  if ($sql_as_num_rows >0)
  {
  header('location:'.BASE_URL);
  }
}
?>



<section class="user_panel_wrapper">

<div class="user_panel">
    <h3>User Panel</h3>
<div class="user_details">

<div class="left_user_details">
<?php UserPanelLeftDetails(); ?>
</div>
<div class="right_user_details">
<?php UserPanelRightDetails(); ?>
</div>
</div>

    <h4>List Of Added Vehicles</h4>
<div class="vehicle_list">
<div class="vehicle_tb_list ">
  <div class="table">
    <input type="hidden" id="usr_page" name="page"
    <?php
    if (isset($_GET['page']))
    {
      echo "value='".$_GET['page']."'";
    }
    ?>>
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
      </a>
      <a>
        <span id="search_boxx">Search:<input type="text" name="search" id="usrr_search"></span>
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


<?php VehicleDetails(); ?>

</div>

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
                $search = "WHERE user_id =".$_SESSION['id']." AND verified = 1";
              }
              else
              {
                $keyword =  trim($_POST['search']);
                $search = "WHERE verified = 1 AND (type_of_vehicle LIKE '%$keyword%') OR (brand LIKE '%$keyword%)' OR (model LIKE '%$keyword%') OR (year_of_production LIKE '%$keyword%') OR (date_added LIKE '%$keyword%') OR (last_modification LIKE '%$keyword%') AND user_id ='$_SESSION[id]'";
              }

            $rpp = 10;
            $resultSet = "SELECT * FROM vw_vehicle_details $search ORDER BY id";
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
    <a href="<?php echo BASE_URL . '/user/add_vehicle'; ?>"><i class="fas fa-plus"></i></a>
        </div>

  </div>
</div>

</div>
</section>


<script type="text/javascript">
$(document).on('click','#del_btn',function() {

let tr = $(this).closest('.myclass');
var user_id = "<?php Print(bin2hex(base64_encode($_SESSION['id']))); ?>";
let deleteVal = tr.find('#del_btn').val();
$('.deleteModal_wrapper').show();
$('#yes_btn_wrapper').html("<a href='delete?id="+deleteVal+"&u_id="+user_id+"' id='yes_btn'>Yes</a>");
});
</script>

<script type="text/javascript">
$(document).ready(function()
{
  $('#hideHeader').hide();
  $('#hideHeaderTwo').hide();
});
</script>
