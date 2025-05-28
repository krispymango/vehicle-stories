<!-- this is the file directory which has the administrator panel Navigation -->
<?php include(ROOT_PATH . '/admin/includes/adminPanelNavWrapper.php'); ?>
<!-- this is the file directory which has the administrator panel Navigation -->




<section class="admin_panel_wrapper">
  <h3>Statistics</h3>
<div class="table_container">
  <div style="display: grid;
  grid-template-columns: repeat(3,1fr);" id="table_arr">
    <a>Show
    <select style="width:15%;" id="usr_entry" name="entries">
    <?php for ($i=10; $i > 0; $i--)
    {
      echo "<option value='".$i."'>".$i."</option>";
    } ?>
    </select> entries
    </a>

    <a>
      <span id="search_boxx">Search:<input type="text" name="search" id="usr_search"></span>
    </a>
    <span ><a style="float:right; background:green;" href="exportData">Export csv</a></span>
  </div>
  <div class="table">



    <div id="table_wrapper">
        <table id="table_content">
            <thead id="table_heading">
              <th><span>#</span> <span><i class="fas fa-sort"></i><span></th>
              <th><span>username</span> <span><i class="fas fa-sort"></i><span></th>
              <th><span>email</span> <span><i class="fas fa-sort"></i><span></th>
              <th><span>date of user registration</span> <span><i class="fas fa-sort"></i><span></th>
              <th><span>date of last user login</span> <span><i class="fas fa-sort"></i><span></th>
              <th><span>ip of registration</span> <span><i class="fas fa-sort"></i><span></th>
              <th><span>ip of last login</span> <span><i class="fas fa-sort"></i><span></th>
              <th><span>vehicle type</span> <span><i class="fas fa-sort"></i><span></th>
              <th><span>brand</span> <span><i class="fas fa-sort"></i><span></th>
              <th><span>model</span> <span><i class="fas fa-sort"></i><span></th>
              <th><span>year of production</span> <span><i class="fas fa-sort"></i><span></th>
              <th><span>engine capacity</span> <span><i class="fas fa-sort"></i><span></th>
              <th><span>power</span> <span><i class="fas fa-sort"></i><span></th>
              <th><span>fuel type</span> <span><i class="fas fa-sort"></i><span></th>
              <th><span>transmission</span> <span><i class="fas fa-sort"></i><span></th>
              <th><span>drive</span> <span><i class="fas fa-sort"></i><span></th>
                <th><span>max speed</span> <span><i class="fas fa-sort"></i><span></th>
                <th><span>number of doors</span> <span><i class="fas fa-sort"></i><span></th>
                <th><span>number of seats</span> <span><i class="fas fa-sort"></i><span></th>
                <th><span>mileage</span> <span><i class="fas fa-sort"></i><span></th>
                <th><span>country of origin</span> <span><i class="fas fa-sort"></i><span></th>
                <th><span>estimated value</span> <span><i class="fas fa-sort"></i><span></th>
                  <th><span>year of purchase by current owner</span> <span><i class="fas fa-sort"></i><span></th>
                  <th><span>place of parking - vovoidship</span> <span><i class="fas fa-sort"></i><span></th>
                  <th><span>place of parking - poviat</span> <span><i class="fas fa-sort"></i><span></th>
                  <th><span>announcement</span> <span><i class="fas fa-sort"></i><span></th>
                  <th><span>Number of days until the end of announcement emission</span> <span><i class="fas fa-sort"></i><span></th>
                  <th><span>Number of added images</span> <span><i class="fas fa-sort"></i><span></th>
                    <th><span>Date of vehicle addition</span> <span><i class="fas fa-sort"></i><span></th>
                    <th><span>Date of last modification of the vehicle</span> <span><i class="fas fa-sort"></i><span></th>
                    <th><span>Number of visits in a defined time period</span> <span><i class="fas fa-sort"></i><span></th>
            </thead>
            <tbody id="view_table">

<?php Statistics(); ?>

            </tbody>
          </table>
        </div>
        </div>
        <div id="table_pagination">
          <a></a>
          <div id="pgg" class="pagination_no">
            <?php
            $rpp = 10;
            $resultSet = "SELECT * FROM vw_vehicle_details";
            $resultSetExec = mysqli_query($conn,$resultSet);
            $numRows = mysqli_num_rows($resultSetExec);
            $totalPages = round($numRows / $rpp);

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
</section>


<script type="text/javascript">


$(document).ready(function()
{
$('#usr_entry').change(function()
{
  var entries = $("#usr_entry").val();
  $('#view_table').load("../app/helpers/statsTable",
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
  $('#pgg').load("../app/helpers/statsTablePagination",
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
  $('#view_table').load("../app/helpers/statsTable",
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
  $('#pgg').load("../app/helpers/statsTablePagination",
 {
    search: search
});
});
});

</script>
