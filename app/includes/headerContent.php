<nav>
  <section class="header_logo_wrapper">
    <section class="header_logo">
      <a href="<?php echo BASE_URL; ?>"><img src="<?php echo BASE_URL . "/assets/img/vs1.png"; ?>"></a>
      <a id="hideHeader" onclick="ShowHomepageSearch()">Search</a>
      <a id="hideHeaderTwo" onclick="ShowHomepageSort()">Sort</a>
    </section>
  </section>
  <section  class="header_announcement">
<form style="display:none;" class="homepage_search" action="process.html" method="post">
<input type="text" name="search" id="usr_search" placeholder="Search...">
</form>
  </section>
  <section class="header_navigation_bar_wrapper">
    <section class="header_navigation_bar">
      <a href="<?php echo BASE_URL . '/contact';?>"><i class="fas fa-phone"></i>  Contact</a>
      <?php userSession(); ?>
      <div class='account_dropdown_wrapper'>
      <a>Others  <i class="fas fa-caret-down"></i></a>
      <div class='account_dropdown'>
        <div class='account_dropdwn'>
      <a href='<?php echo BASE_URL . "/news" ?>'>News</a>
      <a href="<?php echo BASE_URL . "/rules" ?>">Rules</a>
      <a href="<?php echo BASE_URL . "/rodo" ?>">Rodo</a>
      <a href="<?php echo BASE_URL . "/cookie_consent" ?>">Cookie consent</a>
      <a href="<?php echo BASE_URL . "/about" ?>">About</a>
        </div>
      </div>
      </div>
    </section>
  </section>
</nav>
<div class="homepage_sort_popup_wrapper">
<div class="homepage_sort_popup">
  <h3 style="text-align:center;">Sort</h3>
  <div id="sort_msg">

  </div>
  <div style="display:grid;grid-template-columns:repeat(3,1fr); grid-column-gap:20px; grid-row-gap:20px;">
    <div style="display:grid;grid-template-columns:repeat(1,1fr);">
  <label>type of vehicle: <span style="color:green;font-weight:bold" id="tov_level"></span> </label>
  <div style="display:flex;">
  <select style="flex:2" name="flt_typ_vehicle_order" id="tov_sort_order">
    <option value="">Select the sorting order</option>
    <option value="ASC">ASC</option>
    <option value="DESC">DESC</option>
  </select>
  </div>
    </div>

    <div style="display:grid;grid-template-columns:repeat(1,1fr);">
  <label>Brand: <span style="color:green;font-weight:bold" id="brand_level"></span></label>
    <div style="display:flex;">
  <select style="flex:2;" name="flt_brand_order" id="brand_sort_order">
<option value="">Select the sorting order</option>
<option value="ASC">ASC</option>
<option value="DESC">DESC</option>
  </select>
    </div>
    </div>

    <div style="display:grid;grid-template-columns:repeat(1,1fr);">
  <label>Year of production: <span style="color:green;font-weight:bold" id="yop_level"></span></label>
  <div style="display:flex;">
<select style="flex:2;" name="flt_year_of_production_order" id="year_of_production_sort_order">
<option value="">Select the sorting order</option>
<option value="ASC">ASC</option>
<option value="DESC">DESC</option>
  </select>
  </div>
</div>
    <div style="display:grid;grid-template-columns:repeat(1,1fr);">
  <label>Location: <span style="color:green;font-weight:bold" id="location_level"></span></label>
  <div style="display:flex;">
  <select style="flex:2;" name="flt_location_order" id="location_sort_order">
<option value="">Select the sorting order</option>
<option value="ASC">ASC</option>
<option value="DESC">DESC</option>
  </select>
</div>
</div>
<?php
 if (isset($_SESSION['id'])):?>
<div style="display:grid;grid-template-columns:repeat(1,1fr);">
<label>username: <span style="color:green;font-weight:bold" id="username_level"></span></label>
<div style="display:flex;">
<select style="flex:2;" name="flt_username_order" id="username_sort_order">
<option value="">Select the sorting order</option>
<option value="ASC">ASC</option>
<option value="DESC">DESC</option>
</select>
</div>
</div>


<div style="display:grid;grid-template-columns:repeat(1,1fr);">
<label>date added: <span style="color:green;font-weight:bold" id="date_added_level"></span> </label>
<div style="display:flex;">
  <select style="flex:2;" name="flt_date_added_orderflt_date_added" id="date_added_sort_order">
  <option value="">Select the sorting order</option>
<option value="ASC">ASC</option>
<option value="DESC">DESC</option>
</select>
</div>
</div>
<?php endif; ?>

    </div>
    <input type="submit" id="clear_sort" value="Clear">
  </div>
</div>

<script type="text/javascript">
let a = 0;
let tov_levelState = true;
let location_levelState = true;
let brand_levelState = true;
let yop_levelState = true;
let username_levelState = true;
let date_added_levelState = true;

$(document).ready(function()
{
$('#usr_search').keyup(function()
{
  var search = $("#usr_search").val();
  $('#fb').load("app/helpers/HomepageSearch",
 {
    search: search
});
});
});


$(document).ready(function()
{
$('.homepage_search').submit(function(event)
{
event.preventDefault();
var submit = $('#smt').val();
$('#login_error_msg').load("app/helpers/accountVerify",
{
  username: username,
  email: email,
  password: password,
  submit: submit
});
});
});


//username sort
$(document).ready(function()
{
  $('#clear_sort').click(function()
  {
    $('#tov_level').html('');
    $('#brand_level').html('');
    $('#location_level').html('');
    $('#yop_level').html('');
    $('#username_level').html('');
    $('#date_added_level').html('');
    a = 0;
    tov_levelState = true;
    location_levelState = true;
    brand_levelState = true;
    yop_levelState = true;
    username_levelState = true;
    date_added_levelState = true;
    var flt_typ_vehicle_order = $("#tov_sort_order").val('');
    var search = $("#usr_search").val('');
    var flt_year_of_production_order = $('#year_of_production_sort_order').val('');
    var flt_location_order = $('#location_sort_order').val('');
    var flt_brand_order = $('#brand_sort_order').val('');
    var flt_username_order = $('#username_sort_order').val('');
    var flt_date_added_order = $('#date_added_sort_order').val('');
    var tov = $("#tov").val();
    var to = $("#flt_t").val();
    var from = $("#flt_f").val();
    var brand = $("#brnd").val();
    var location = $("#lction").val();
    $('#fb').load("app/helpers/HomepageSearch",
   {
      search:search,
      flt_typ_vehicle_order: flt_typ_vehicle_order,
      flt_brand_order:flt_brand_order,
      flt_year_of_production_order:flt_year_of_production_order,
      flt_location_order:flt_location_order,
      flt_username_order:flt_username_order,
      flt_date_added_order:flt_date_added_order,
      flt_typ_vehicle: tov,
      flt_brand: brand,
      flt_to:to,
      flt_from:from,
      flt_location: location
  });
  });
});


//username sort
$(document).ready(function()
{


  $('#username_sort_order').change(function()
  {
    if (username_levelState == true)
    {
      var sort_level = a+1;
      $("#username_level").html(sort_level+' level');
      a = sort_level;
      username_levelState = false;
    }
    var search = $("#usr_search").val();
    var flt_typ_vehicle_order = $("#tov_sort_order").val();
    var flt_brand_order = $('#brand_sort_order').val();
    var flt_year_of_production_order = $('#year_of_production_sort_order').val();
    var flt_location_order = $('#location_sort_order').val();
    var flt_username_order = $('#username_sort_order').val();
    var flt_date_added_order = $('#date_added_sort_order').val();
    var tov = $("#tov").val();
    var to = $("#flt_t").val();
    var from = $("#flt_f").val();
    var brand = $("#brnd").val();
    var location = $("#lction").val();
    $('#fb').load("app/helpers/HomepageSearch",
   {
     search:search,
     flt_typ_vehicle_order:flt_typ_vehicle_order,
     flt_brand_order:flt_brand_order,
     flt_year_of_production_order:flt_year_of_production_order,
     flt_location_order:flt_location_order,
     flt_username_order:flt_username_order,
     flt_date_added_order:flt_date_added_order,
     flt_typ_vehicle: tov,
     flt_brand: brand,
     flt_to:to,
     flt_from:from,
     flt_location: location
  });
  });

//Location(voivodship) sort

  $('#location_sort_order').change(function()
  {
    if (location_levelState == true)
    {
      var sort_level = a+1;
      $("#location_level").html(sort_level+' level');
      a = sort_level;
      location_levelState = false;
    }
    var search = $("#usr_search").val();
    var flt_typ_vehicle_order = $("#tov_sort_order").val();
    var flt_brand_order = $('#brand_sort_order').val();
    var flt_year_of_production_order = $('#year_of_production_sort_order').val();
    var flt_location_order = $('#location_sort_order').val();
    var flt_username_order = $('#username_sort_order').val();
    var flt_date_added_order = $('#date_added_sort_order').val();
    var tov = $("#tov").val();
    var to = $("#flt_t").val();
    var from = $("#flt_f").val();
    var brand = $("#brnd").val();
    var location = $("#lction").val();
    $('#fb').load("app/helpers/HomepageSearch",
   {
     search:search,
     flt_typ_vehicle_order:flt_typ_vehicle_order,
     flt_brand_order:flt_brand_order,
     flt_year_of_production_order:flt_year_of_production_order,
     flt_location_order:flt_location_order,
     flt_username_order:flt_username_order,
     flt_date_added_order:flt_date_added_order,
     flt_typ_vehicle: tov,
     flt_brand: brand,
     flt_to:to,
     flt_from:from,
     flt_location: location
  });
  });

//Year of production sort


  $('#year_of_production_sort_order').change(function()
  {
    if (yop_levelState == true)
    {
      var sort_level = a+1;
      $("#yop_level").html(sort_level+' level');
      a = sort_level;
      yop_levelState = false;
    }
    var search = $("#usr_search").val();
    var flt_typ_vehicle_order = $("#tov_sort_order").val();
    var flt_brand_order = $('#brand_sort_order').val();
    var flt_year_of_production_order = $('#year_of_production_sort_order').val();
    var flt_location_order = $('#location_sort_order').val();
    var flt_username_order = $('#username_sort_order').val();
    var flt_date_added_order = $('#date_added_sort_order').val();
    var tov = $("#tov").val();
    var to = $("#flt_t").val();
    var from = $("#flt_f").val();
    var brand = $("#brnd").val();
    var location = $("#lction").val();
    $('#fb').load("app/helpers/HomepageSearch",
   {
     search:search,
     flt_typ_vehicle_order:flt_typ_vehicle_order,
     flt_brand_order:flt_brand_order,
     flt_year_of_production_order:flt_year_of_production_order,
     flt_location_order:flt_location_order,
     flt_username_order:flt_username_order,
     flt_date_added_order:flt_date_added_order,
     flt_typ_vehicle: tov,
     flt_brand: brand,
     flt_to:to,
     flt_from:from,
     flt_location: location
  });
  });


//Brand sort



  $('#brand_sort_order').change(function()
  {
    if (brand_levelState == true)
    {
      var sort_level = a+1;
      $("#brand_level").html(sort_level+' level');
      a = sort_level;
      brand_levelState = false;
    }
    var search = $("#usr_search").val();
    var flt_typ_vehicle_order = $("#tov_sort_order").val();
    var flt_brand_order = $('#brand_sort_order').val();
    var flt_year_of_production_order = $('#year_of_production_sort_order').val();
    var flt_location_order = $('#location_sort_order').val();
    var flt_username_order = $('#username_sort_order').val();
    var flt_date_added_order = $('#date_added_sort_order').val();
    var tov = $("#tov").val();
    var to = $("#flt_t").val();
    var from = $("#flt_f").val();
    var brand = $("#brnd").val();
    var location = $("#lction").val();
    $('#fb').load("app/helpers/HomepageSearch",
   {
     search:search,
     flt_typ_vehicle_order:flt_typ_vehicle_order,
     flt_brand_order:flt_brand_order,
     flt_year_of_production_order:flt_year_of_production_order,
     flt_location_order:flt_location_order,
     flt_username_order:flt_username_order,
     flt_date_added_order:flt_date_added_order,
     flt_typ_vehicle: tov,
     flt_brand: brand,
     flt_to:to,
     flt_from:from,
     flt_location: location
  });
  });


//Type of vehicle sort

  $('#tov_sort_order').change(function()
  {
    if (tov_levelState == true)
    {
      var sort_level = a+1;
      $("#tov_level").html(sort_level+' level');
      a = sort_level;
      tov_levelState = false;
    }
    var search = $("#usr_search").val();
    var flt_typ_vehicle_order = $("#tov_sort_order").val();
    var flt_brand_order = $('#brand_sort_order').val();
    var flt_year_of_production_order = $('#year_of_production_sort_order').val();
    var flt_location_order = $('#location_sort_order').val();
    var flt_username_order = $('#username_sort_order').val();
    var flt_date_added_order = $('#date_added_sort_order').val();
    var tov = $("#tov").val();
    var to = $("#flt_t").val();
    var from = $("#flt_f").val();
    var brand = $("#brnd").val();
    var location = $("#lction").val();
    $('#fb').load("app/helpers/HomepageSearch",
   {
     search:search,
     flt_typ_vehicle_order:flt_typ_vehicle_order,
     flt_brand_order:flt_brand_order,
     flt_year_of_production_order:flt_year_of_production_order,
     flt_location_order:flt_location_order,
     flt_username_order:flt_username_order,
     flt_date_added_order:flt_date_added_order,
     flt_typ_vehicle: tov,
     flt_brand: brand,
     flt_to:to,
     flt_from:from,
     flt_location: location
  });
  });



//Order sort(Ascending/Descending)

  $('#date_added_sort_order').change(function()
  {
    if (date_added_levelState == true)
    {
      var sort_level = a+1;
      $("#date_added_level").html(sort_level+' level');
      a = sort_level;
      date_added_levelState = false;
    }
    var search = $("#usr_search").val();
    var flt_typ_vehicle_order = $("#tov_sort_order").val();
    var flt_brand_order = $('#brand_sort_order').val();
    var flt_year_of_production_order = $('#year_of_production_sort_order').val();
    var flt_location_order = $('#location_sort_order').val();
    var flt_username_order = $('#username_sort_order').val();
    var flt_date_added_order = $('#date_added_sort_order').val();
    var tov = $("#tov").val();
    var to = $("#flt_t").val();
    var from = $("#flt_f").val();
    var brand = $("#brnd").val();
    var location = $("#lction").val();
    $('#fb').load("app/helpers/HomepageSearch",
   {
     search:search,
     flt_typ_vehicle_order:flt_typ_vehicle_order,
     flt_brand_order:flt_brand_order,
     flt_year_of_production_order:flt_year_of_production_order,
     flt_location_order:flt_location_order,
     flt_username_order:flt_username_order,
     flt_date_added_order:flt_date_added_order,
     flt_typ_vehicle: tov,
     flt_brand: brand,
     flt_to:to,
     flt_from:from,
     flt_location: location
  });
  });



});


$(document).ready(function()
{
$('#usr_search').keyup(function()
{
  var search = $("#usr_search").val();
  var flt_typ_vehicle = $("#tov_sort").val();
  var flt_typ_vehicle_order = $("#tov_sort_order").val();
  var flt_brand = $('#brand_sort').val();
  var flt_brand_order = $('#brand_sort_order').val();
  var flt_year_of_production = $('#year_of_production_sort').val();
  var flt_year_of_production_order = $('#year_of_production_sort_order').val();
  var flt_location = $('#location_sort').val();
  var flt_location_order = $('#location_sort_order').val();
  var flt_username = $('#username_sort').val();
  var flt_username_order = $('#username_sort_order').val();
  var flt_date_added = $('#date_added_sort').val();
  var flt_date_added_order = $('#date_added_sort_order').val();
  $('#fb').load("app/helpers/HomepageSearch",
 {
    search: search,
    flt_typ_vehicle: flt_typ_vehicle,
    flt_typ_vehicle_order:flt_typ_vehicle_order,
    flt_brand:flt_brand,
    flt_brand_order:flt_brand_order,
    flt_year_of_production:flt_year_of_production,
    flt_year_of_production_order:flt_year_of_production_order,
    flt_location:flt_location,
    flt_location_order:flt_location_order,
    flt_username:flt_username,
    flt_username_order:flt_username_order,
    flt_date_added:flt_date_added,
    flt_date_added_order:flt_date_added_order
});
});
});



let searchShow = true;
let sortShow = true;

function ShowHomepageSearch()
{
  $(document).ready(function()
  {
    if (searchShow == true)
    {
   $('.homepage_search').show();
   searchShow = false;
    }
    else if (searchShow == false)
    {
   $('.homepage_search').hide();
   searchShow = true;
    }
  });
}



function ShowHomepageSort()
{
  $(document).ready(function()
  {
    if (sortShow == true)
    {
   $('.homepage_sort_popup_wrapper').show();
   sortShow = false;
    }
    else if (sortShow == false)
    {
   $('.homepage_sort_popup_wrapper').hide();
   sortShow = true;
    }
  });
}

</script>
