$(document).ready(function()
{
  let announcement_order = false;
  let brand_order = false;
  let type_of_vehicle_order = false;
  let model_order = false;
  let year_of_production_order = false;
  let date_added_order = false;
  let last_modification_order = false;
  //brand
$('#all_brand').click(function()
{
  //alert($('#all_brand').val());
  //alert($('#usrr_search').val());
  var sort = $('#all_brand').val();
  var search = $('#usrr_search').val();
  if (brand_order == true)
  {
    order = 'ASC';
    brand_order = false;
  }
  else if(brand_order == false)
  {
    order = 'DESC';
    brand_order = true;
  }

  $('#view_table').load("../app/helpers/profilevehicleDetailsTable",
 {
   search:search,
   sort: sort,
   order:order
});
});


// type_of_vehicle
$('#all_tov').click(function()
{
  //alert($('#all_brand').val());
  //alert($('#usrr_search').val());
  var sort = $('#all_tov').val();
  var search = $('#usrr_search').val();
  if (type_of_vehicle_order == true)
  {
    order = 'ASC';
    type_of_vehicle_order = false;
  }
  else if(type_of_vehicle_order == false)
  {
    order = 'DESC';
    type_of_vehicle_order = true;
  }

  $('#view_table').load("../app/helpers/profilevehicleDetailsTable",
 {
   search:search,
   sort: sort,
   order:order
});
});


//model
$('#all_model').click(function()
{
  //alert($('#all_brand').val());
  //alert($('#usrr_search').val());
  var sort = $('#all_model').val();
  var search = $('#usrr_search').val();
  if (model_order == true)
  {
    order = 'ASC';
    model_order = false;
  }
  else if(model_order == false)
  {
    order = 'DESC';
    model_order = true;
  }
  $('#view_table').load("../app/helpers/profilevehicleDetailsTable",
 {
   search:search,
   sort: sort,
   order:order
});
});


//year_of_production
$('#all_year_of_production').click(function()
{
  //alert($('#all_brand').val());
  //alert($('#usrr_search').val());
  var sort = $('#all_year_of_production').val();
  var search = $('#usrr_search').val();
  if (year_of_production_order == true)
  {
    order = 'ASC';
    year_of_production_order = false;
  }
  else if(year_of_production_order == false)
  {
    order = 'DESC';
    year_of_production_order = true;
  }
  $('#view_table').load("../app/helpers/profilevehicleDetailsTable",
 {
   search:search,
   sort: sort,
   order:order
});
});



//date_added
$('#all_date_added').click(function()
{
  //alert($('#all_brand').val());
  //alert($('#usrr_search').val());
  var sort = $('#all_date_added').val();
  var search = $('#usrr_search').val();
  if (date_added_order == true)
  {
    order = 'ASC';
    date_added_order = false;
  }
  else if(date_added_order == false)
  {
    order = 'DESC';
    date_added_order = true;
  }
  $('#view_table').load("../app/helpers/profilevehicleDetailsTable",
 {
   search:search,
   sort: sort,
   order:order
});
});



//last_modification
$('#all_last_modification').click(function()
{
  //alert($('#all_brand').val());
  //alert($('#usrr_search').val());
  var sort = $('#all_last_modification').val();
  var search = $('#usrr_search').val();
  if (last_modification_order == true)
  {
    order = 'ASC';
    last_modification_order = false;
  }
  else if(last_modification_order == false)
  {
    order = 'DESC';
    last_modification_order = true;
  }

  $('#view_table').load("../app/helpers/profilevehicleDetailsTable",
 {
   search:search,
   sort: sort,
   order:order
});
});


//announcement_expire_date
$('#all_announcement_expire').click(function()
{
  //alert($('#all_brand').val());
  //alert($('#usrr_search').val());
  var sort = $('#all_announcement_expire').val();
  var search = $('#usrr_search').val();
  if (announcement_order == true)
  {
    order = 'ASC';
    announcement_order = false;
  }
  else if(announcement_order == false)
  {
    order = 'DESC';
    announcement_order = true;
  }

  $('#view_table').load("../app/helpers/profilevehicleDetailsTable",
 {
   search:search,
   sort: sort,
   order:order
});
});


});
