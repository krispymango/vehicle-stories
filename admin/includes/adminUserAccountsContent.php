<!-- this is the file directory which has the administrator panel Navigation -->
<?php include ROOT_PATH . '/admin/includes/adminPanelNavWrapper.php'; ?>
<!-- this is the file directory which has the administrator panel Navigation -->




<section class="admin_panel_wrapper">
  <h3>All User Accounts</h3>
  <div class="table">

    <div id="table_arr">
      <a>Show
      <select id="usr_entry" name="entries">
      <option value="">10</option>
      <option value="">9</option>
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
              <th><span>username</span><button style="background:white;border:none;" type="button" value="username" name="sort" id="all_username"> <span><i class="fas fa-sort"></i><span></button></th>
              <th><span>email</span><button style="background:white;border:none;" type="button" value="email" name="sort" id="all_email"><span><i class="fas fa-sort"></i><span></button></th>
              <th><span>date of registration</span><button style="background:white;border:none;" type="button" value="date_of_registration" name="sort" id="all_date_of_registration"><span><i class="fas fa-sort"></i><span></button></th>
              <th><span>last login date</span><button style="background:white;border:none;" type="button" value="last_login_date" name="sort" id="all_last_login_date"><span><i class="fas fa-sort"></i><span></button></th>
              <th><span>ip of registration</span><button style="background:white;border:none;" type="button" value="ip_of_registration" name="sort" id="all_ip_of_registration"><span><i class="fas fa-sort"></i><span></button></th>
              <th><span>ip of last login</span><button style="background:white;border:none;" type="button" value="ip_of_last_login" name="sort" id="all_ip_of_last_login"><span><i class="fas fa-sort"></i><span></button></th>
              <th><span>number of vehicles</span><span><span></th>
            </thead>
            <tbody id="u_a_table">


<?php UserAccounts(); ?>



            </tbody>
          </table>
        </div>

    <div id="table_pagination">
      <a></a>
      <div id="pgg" class="pagination_no">
        <?php

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

        $resultSet = "SELECT * FROM vw_user WHERE status = 0 ORDER BY username ASC";
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
$('#usr_search').keyup(function()
{
  //alert('ddd');
  var search = $("#usr_search").val();
  $('#u_a_table').load("../app/helpers/adminUserAccountTable",
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
  $('#pgg').load("../app/helpers/adminUserAccountTablePagination",
 {
    search: search
});
});
});



$(document).ready(function()
{
$('#usr_entry').change(function()
{
  var entries = $("#usr_entry").val();
  $('#pgg').load("../app/helpers/adminUserAccountTablePagination",
 {
    entries: entries
});
});
});

</script>
