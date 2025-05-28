
//User Table Entries function
$(document).ready(function()
{
$('#usr_entry').change(function()
{
  var entries = $("#usr_entry").val();
  $('#view_table').load("../app/helpers/vehicleDetailsTabl",
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
  $('#pgg').load("../app/helpers/vehicleDetailsTablPagination",
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
  $('#view_table').load("../app/helpers/vehicleDetailsTabl",
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
  $('#pgg').load("../app/helpers/vehicleDetailsTablPagination",
 {
    search: search
});
});
});
