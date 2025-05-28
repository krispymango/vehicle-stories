<!-- this is the file directory which has the administrator panel Navigation -->
<?php include(ROOT_PATH . '/admin/includes/adminPanelNavWrapper.php'); ?>
<!-- this is the file directory which has the administrator panel Navigation -->

<section id="selection_table_pop_up">
<div class="selection_table">
  <div id="sel_msg">

  </div>
  <div style="padding: 10px;" class="table">
    <input type="hidden" id="usr_page" name="page"
    <?php
    if (isset($_GET['page']))
    {
      echo "value='".$_GET['page']."'";
    }
    ?>>
<p id="demo"></p>
    <div id="table_arr">

      <a >
        <span style="float:left;">
          Show
          <select id="usr_entry" name="entries">
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
      </a>
      <a>
        <span style="float:left;" id="out_off"></span> <span id="search_boxx">Search:<input type="text" name="search" id="usr_search"></span>
      </a>
    </div>

    <div id="table_wrapper">
        <table id="table_content">
            <thead id="table_heading">
              <th><span>#</span></th>
              <th><span>type of vehicle</span> <span><i class="fas fa-sort"></i><span></th>
              <th><span>brand</span> <span><i class="fas fa-sort"></i><span></th>
              <th><span>model</span> <span><i class="fas fa-sort"></i><span></th>
              <th><span>year of production</span> <span><i class="fas fa-sort"></i><span></th>
              <th><span>date added</span> <span><i class="fas fa-sort"></i><span></th>
              <th><span>last modification</span> <span><i class="fas fa-sort"></i><span></th>
              <th><span><input type="checkbox">select/clear all </span> <span><i class="fas fa-sort"></i><span></th>
              <th><span>sequence</span></th>
            </thead>
            <tbody id="view_table">

<div class="user_table_container">


<?php VehicleDetailsHighlighted(); ?>

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
            $resultSet = "SELECT * FROM vw_vehicle_details ORDER BY id ASC";
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
        <i onclick="hideHighModal()" style="cursor:pointer;position:absolute;right:-10px; top:10px;" class="fas fa-lg fa-times"></i>
</div>

</section>

<section class="admin_panel_wrapper">
  <h3>Highlighted</h3>


<div class="higlighted_wrapper">
  <div class="higlighted">
<h3>Configuring the display of vehicles on the homepage</h3>
<div id="higlighted_error">

</div>
        <form class="byAdministrator" action="#" method="post">
<table>
  <thead>
    <th>method of viewing</th>
    <th>with the phrase on ribbon</th>
    <th>start date</th>
    <th>closing date</th>
    <th>selection/sequence of vehicles</th>
  </thead>
  <tbody>
    <tr>
        <td><input
          <?php $data = file_get_contents(ROOT_PATH .'/app/helpers/api/properties.json');
        $json_arr = json_decode($data, true);
        if ($json_arr[4]['highlighted_type'] == 'row_1')
        {
          echo "checked";
        }
          ?>
  type="radio" id="hl_row_1" name="main_row_1">last added (default)</td>
        <td><input type="text" id="por_1" name="phrase_on_ribbon_1" value="last added" disabled></td>
    </tr>
    <tr>
        <td><input
          <?php $data = file_get_contents(ROOT_PATH .'/app/helpers/api/properties.json');
        $json_arr = json_decode($data, true);
        if ($json_arr[4]['highlighted_type'] == 'row_2')
        {
          echo "checked";
        }
          ?>
           type="radio" id="hl_row_2" name="main_row_2">random</td>
        <td><input type="checkbox" id="por_2" name="phrase_on_ribbon_2" value="highlighted">HIGHLIGHTED</td>
        <td><input type="date" name="start_date_2"
          <?php $data = file_get_contents(ROOT_PATH .'/app/helpers/api/properties.json');
        $json_arr = json_decode($data, true);
        if ($json_arr[4]['highlighted_type'] == 'row_2')
        {
          $conv = date("Y-m-d",$json_arr[4]['sd']);
          echo "value='".$conv."'";
        }
          ?> class="date_input " id="sd_2" placeholder="dd.mm.rrrr"></td>
        <td><input type="date"
          <?php $data = file_get_contents(ROOT_PATH .'/app/helpers/api/properties.json');
        $json_arr = json_decode($data, true);
        if ($json_arr[4]['highlighted_type'] == 'row_2')
        {
          $conv = date("Y-m-d",$json_arr[4]['cd']);
          echo "value='".$conv."'";
        }
          ?> name="close_date_2" class="date_input " id="cd_2" placeholder="dd.mm.rrrr"></td>
        <td></td>
    </tr>
    <tr>
        <td><input
          <?php $data = file_get_contents(ROOT_PATH .'/app/helpers/api/properties.json');
        $json_arr = json_decode($data, true);
        if ($json_arr[4]['highlighted_type'] == 'row_3')
        {
          echo "checked";
        }
          ?>
           type="radio" id="hl_row_3" name="main_row_3">last added</td>
        <td><input type="text" id="por_3" name="phrase_on_ribbon_3" value="without ribbon and text" disabled></td>
        <td><input type="date" <?php $data = file_get_contents(ROOT_PATH .'/app/helpers/api/properties.json');
      $json_arr = json_decode($data, true);
      if ($json_arr[4]['highlighted_type'] == 'row_3')
      {
        $conv = date("Y-m-d",$json_arr[4]['sd']);
        echo "value='".$conv."'";
      }
        ?>name="start_date_3" class="date_input" value="0000-00-00" id="sd_3" placeholder="dd.mm.rrrr"></td>
        <td><input type="date" <?php $data = file_get_contents(ROOT_PATH .'/app/helpers/api/properties.json');
      $json_arr = json_decode($data, true);
      if ($json_arr[4]['highlighted_type'] == 'row_3')
      {
        $conv = date("Y-m-d",$json_arr[4]['cd']);
        echo "value='".$conv."'";
      }
        ?>
        name="close_date_3" class="date_input" value="0000-00-00" id="cd_3" placeholder="dd.mm.rrrr"></td>
    </tr>
    <tr>
        <td><input
          <?php $data = file_get_contents(ROOT_PATH .'/app/helpers/api/properties.json');
        $json_arr = json_decode($data, true);
        if ($json_arr[4]['highlighted_type'] == 'row_4')
        {
          echo "checked";
        }
          ?>
           type="radio" id="hl_row_4" name="main_row_4" value="">selected by administrator</td>
        <td><input type="checkbox" id="por_4" name="phrase_on_ribbon_4" value="highlighted">HIGHLIGHTED</td>
        <td><input id="sd_4" type="date" <?php $data = file_get_contents(ROOT_PATH .'/app/helpers/api/properties.json');
      $json_arr = json_decode($data, true);
      if ($json_arr[4]['highlighted_type'] == 'row_4')
      {
        $conv = date("Y-m-d",$json_arr[4]['sd']);
        echo "value='".$conv."'";
      }
        ?>  class="date_input" name="start_date_4" placeholder="dd.mm.rrrr"></td>
        <td><input id="cd_4"  <?php $data = file_get_contents(ROOT_PATH .'/app/helpers/api/properties.json');
      $json_arr = json_decode($data, true);
      if ($json_arr[4]['highlighted_type'] == 'row_4')
      {
        $conv = date("Y-m-d",$json_arr[4]['cd']);
        echo "value='".$conv."'";
      }
        ?> type="date" class="date_input" name="close_date_4" placeholder="dd.mm.rrrr"></td>
        <td><a onclick="showHighModal()" id="edt_btn_two">Selection to highlighted</a></td>
    </tr>
  </tbody>

</table>
        </form>


<form class="ribbonModification" action="index.html" method="post">
<label>number of rows of vehicles shown</label>
<div>
<select id='n_o_r' name="no_of_rows">
<?php
$data = file_get_contents(ROOT_PATH .'/app/helpers/api/properties.json');
$json_arr = json_decode($data, true);
echo "<option value=".$json_arr[7]['Value'].">--".$json_arr[7]['Value']."--</option>";
 ?>
<option value="4">4</option>
<option value="8">8</option>
<option value="12">12</option>
<option value="16">16</option>
<option value="20">20</option>
</select>
</div>

<label>color of ribbon</label>
<div>
<input type="color" id="h_b_c" name="hgh_back_color" value="<?php
$data = file_get_contents(ROOT_PATH .'/app/helpers/api/properties.json');
$json_arr = json_decode($data, true);
echo  $json_arr[2]['Value'];
?>">
</div>

<label>color of text on ribbon</label>
<div>
<input type="color" id="h_t_c" name="hgh_text_color" value="<?php
$data = file_get_contents(ROOT_PATH .'/app/helpers/api/properties.json');
$json_arr = json_decode($data, true);
echo  $json_arr[3]['Value'];
?>">
</div>
</form>

  </div>
</div>
</section>


<script type="text/javascript">


$(document).ready(function()
{

  //highlighted background color
$('#h_b_c').change(function()
{
var hgh_back_color = $('#h_b_c').val();
$('#higlighted_error').load("../app/helpers/highlightedVerify",
{
  hgh_back_color: hgh_back_color
});
});


// number of rows
$('#n_o_r').change(function()
{
var no_of_rows = $('#n_o_r').val();
$('#higlighted_error').load("../app/helpers/highlightedVerify",
{
  no_of_rows:no_of_rows
});
});


// highlighted text color
$('#h_t_c').change(function()
{
var hgh_text_color = $('#h_t_c').val();
$('#higlighted_error').load("../app/helpers/highlightedVerify",
{
   hgh_text_color:hgh_text_color
});
});


});





//row one
$(document).ready(function()
{
$('#hl_row_1').click(function()
{
  if ($('#hl_row_1').prop('checked'))
  {
  alert('Change was successful');
  $('#hl_row_2').prop('checked', false);
  $('#hl_row_3').prop('checked', false);
  $('#hl_row_4').prop('checked', false);
  var main_row_1 = $("#hl_row_1").val();
  var phrase_on_ribbon_1 = $('#por_1').val();
    $('#higlighted_error').load("../app/helpers/highlightedVerify",
   {
      main_row_1: main_row_1,
      phrase_on_ribbon_1:phrase_on_ribbon_1
  });
  }
  });


//row 2
  $('#hl_row_2').click(function()
  {

    if ($('#hl_row_2').prop('checked'))
    {
    alert('Change was successful');
    $('#hl_row_1').prop('checked', false);
    $('#hl_row_3').prop('checked', false);
    $('#hl_row_4').prop('checked', false);
    var main_row_2 = $("#hl_row_2").val();
    var phrase_on_ribbon_2 = $('#por_2').val();
    var start_date_2_full = $('#sd_2').val();
    var close_date_2_full = $('#cd_2').val();
    $('#higlighted_error').load("../app/helpers/highlightedVerify",
     {
        main_row_2: main_row_2,
        phrase_on_ribbon_2:phrase_on_ribbon_2,
        start_date_2:start_date_2_full,
        close_date_2:close_date_2_full
    });
    }

    });





    //row 3
      $('#hl_row_3').click(function()
      {

        if ($('#hl_row_3').prop('checked'))
        {
        alert('Change was successful');
        $('#hl_row_1').prop('checked', false);
        $('#hl_row_2').prop('checked', false);
        $('#hl_row_4').prop('checked', false);
        var main_row_3 = $("#hl_row_3").val();
        var phrase_on_ribbon_3 = ' ';
        var start_date_3_full = $('#sd_3').val();
        var close_date_3_full = $('#cd_3').val();

        $('#higlighted_error').load("../app/helpers/highlightedVerify",
         {
            main_row_3: main_row_3,
            phrase_on_ribbon_3:phrase_on_ribbon_3,
            start_date_3:start_date_3_full,
            close_date_3:close_date_3_full
        });
        }

        });


        $('#hl_row_4').click(function()
        {

          if ($('#hl_row_4').prop('checked'))
          {
          alert('Change was successful');
          $('#hl_row_1').prop('checked', false);
          $('#hl_row_2').prop('checked', false);
          $('#hl_row_3').prop('checked', false);
          var main_row_4 = $("#hl_row_4").val();
          var phrase_on_ribbon_4 = $('#por_4').val();
          var start_date_4_full = $('#sd_4').val();
          var close_date_4_full = $('#cd_4').val();

          $('#higlighted_error').load("../app/helpers/highlightedVerify",
           {
              main_row_4: main_row_4,
              phrase_on_ribbon_4:phrase_on_ribbon_4,
              start_date_4:start_date_4_full,
              close_date_4:close_date_4_full
          });
          }

          });
  });

</script>


<script type="text/javascript">
  function hideHighModal()
  {
    $('#selection_table_pop_up').hide();
  }

  function showHighModal()
  {
    $('#selection_table_pop_up').show();
  }

  let a = 1;
  $(document).on('click','#chkbx_high_val',function()
  {
  let tr = $(this).closest('.myclass');
  let checkbox_high = tr.find('#chkbx_high_val');
  let checkbox_high_val = tr.find('#chkbx_high_val').val();
   tr.find('#chkbx_high_val_hidden').val(a);
  let checkbox_high_val_hidden = tr.find('#chkbx_high_val_hidden').val() ;
    //alert(checkbox_high_val_hidden);
  let checkbox_high_seq = tr.find('#chkbx_high_seq');

    checkbox_high_seq.html(a);

    if (a <= 8)
    {
    $('#out_off').html(a+'/8');
      $('#sel_msg').load('../app/helpers/highlightedVerify',
    {
      sel_highlight:checkbox_high_val,
      sel_hidden:checkbox_high_val_hidden
    });
  a++;
    }
//alert(checkbox_high_val);
  });
</script>
