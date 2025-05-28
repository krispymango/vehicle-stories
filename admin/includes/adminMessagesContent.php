<!-- this is the file directory which has the administrator panel Navigation -->
<?php include(ROOT_PATH . '/admin/includes/adminPanelNavWrapper.php'); ?>
<!-- this is the file directory which has the administrator panel Navigation -->





<section class="admin_panel_wrapper">
<h3>Messages</h3>

  <div class="admin_messages_wrapper">


<div class="nw_message_wrapper">

<div class="new_message_table">
  <div class="send_message_wrapper">
    <span style="float:left;">
      Show
      <select style="border-radius:3px;width:10%;" id="usr_entry" name="entries">
        <?php
        if (isset($_GET['entries']))
        {
          $rpp = $_GET['entries'];
          echo "<option value='".$rpp."'>--".$rpp."--</option>";
        }
        ?>
      <?php
  for ($i=10; $i > 4 ; $i--) {
  echo "<option value='".$i."'>".$i."</option>";
  }
       ?>

      </select> entries
    </span>
  <span >
<!--     <a id="msg_send"  style="background: green;box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);" href="send_message">Write to marked</a> -->
  <a style="float:right;">Search:<input style="border:1px solid grey;border-radius:3px;width:60%;" type="text" name="search" id="usr_search"></a>
</span>
  </div>
  <table>
    <thead>
      <th>#</th>
      <th>username</th>
      <th>login status</th>
      <th>last unread messages</th>
      <th>number of unread messages</th>
      <th colspan="1">read/write</th>
    </thead>

    <tbody id="u_a_table">
      <?php AdminMessageDetails(); ?>
    </tbody>
  </table>
</div>
<div id="table_pagination">
  <a></a>
  <div id="pgg" class="pagination_no">
    <?php
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
    $rpp = 10;

    $resultSet = "
    SELECT
  	* $count
  FROM
  	vw_contact_form
  $search";
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
  </div>
</section>


<script type="text/javascript">
$(document).ready(function()
{
  $("#p_lan").on('click',function(){
  var pro_lan= [];
  $.each($('input[name="p_lan"]:checked'),
  function()
  {

  });
  pro_lan.push($(this).val());
  var all_pro_lan=pro_lan.join(", ");
  alert(all_pro_lan);
});
  let checkk = true;
  $('#chck_all').click(function(){
    if (checkk == true)
    {

$(".checkboxes").prop('checked',true);
checkk = false;
    }
    else if (checkk == false) {
      $(".checkboxes").prop('checked',false);
      checkk = true;
    }
  });
});



$(document).ready(function()
{
$('#usr_search').keyup(function()
{
  //alert('ddd');
  var search = $("#usr_search").val();
  $('#u_a_table').load("../app/helpers/StatisticsAccountTable",
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
  $('#pgg').load("../app/helpers/StatisticsAccountTablePagination",
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
  $('#pgg').load("../app/helpers/StatisticsAccountTablePagination",
 {
    entries: entries
});
});
});

</script>
