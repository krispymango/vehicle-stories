  //Login Form function
  $(document).ready(function()
{
$('.login_form').submit(function(event)
{
  event.preventDefault();
  var username = $('#usrnme').val();
  var email = $('#emil').val();
  var password = $('#psswrd').val();
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






  //register Form function
$(document).ready(function()
{
$('.registration_form').submit(function(event)
{
  event.preventDefault();
  $('.loading_screen').show();
  var username = $('#rg_usrnme').val();
  var email = $('#rg_emil').val();
  var password = $('#rg_psswrd').val();
  var conf_password = $('#rg_conf_psswrd').val();
  var submit = $('#rg_smt').val();
  $('#registration_error_msg').load("app/helpers/registerAccountVerify",
 {
    username: username,
    email: email,
    password: password,
    conf_password: conf_password,
    submit: submit
});
});
});




//change Password function
$(document).ready(function()
{
$('.changePasswordForm').submit(function(event)
{
  event.preventDefault();
    $('.loading_screen').show();
  var old_password = $('#old_pswd').val();
  var new_password = $('#new_pswd').val();
  var submit = $('#pswd_smt').val();
  $('#pop_up_text').load("../app/helpers/changeAccountDetailsVerify",
 {
    old_password: old_password,
    new_password: new_password,
    password_submit: submit
});
});
});


//change Password function
$(document).ready(function()
{
$('.changeUsernameForm').submit(function(event)
{
  //alert('yy');
  event.preventDefault();
    $('.loading_screen').show();
  var new_username = $('#new_usrnme').val();
  var submit = $('#usrnme_smt').val();
  $('#pop_up_text').load("../app/helpers/changeAccountDetailsVerify",
 {
    new_username: new_username,
    username_submit: submit
  });
  });
  });



  $(document).ready(function()
  {
    $('#usrnme_smt').click(function(event)
    {
    var objDiv = document.getElementById('msg_box');
    objDiv.scrollTop = objDiv.scrollHeight;
});
});


//change Email function
$(document).ready(function()
{
$('.changeEmailForm').submit(function(event)
{
  event.preventDefault();
    $('.loading_screen').show();
  var new_email = $('#new_eml').val();
  var password = $('#pswd').val();
  var submit = $('#eml_smt').val();
  $('#pop_up_text').load("../app/helpers/changeAccountDetailsVerify",
 {
    new_email: new_email,
    password: password,
    email_submit: submit
});
});
});


//change Email function
/*
$(document).ready(function()
{
$('.changeAvatarForm').submit(function(event)
{
  event.preventDefault();
  var new_email = $('#new_eml').val();
  var submit = $('#eml_smt').val();
  $('#pop_up_text').load("app/helpers/changeAccountDetailsVerify",
 {
    new_username: new_username,
    email_submit: submit
});
});
});
*/


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
$('#usrr_search').keyup(function()
{
  var search = $("#usrr_search").val();
  $('#view_table').load("../app/helpers/vehicleDetailsTable",
 {
    search: search
});
});
});


$(document).ready(function()
{
$('#usrr_search').keyup(function()
{
  var search = $("#usrr_search").val();
  $('#pgg').load("../app/helpers/vehicleDetailsTablePagination",
 {
    search: search
});
});
});


$(document).ready(function()
{
$('#usrrr_search').keyup(function()
{

  var search = $("#usrrr_search").val();
  $('#view_table').load("../app/helpers/vehicleDetailsTable",
 {
    search: search

});
});
});


$(document).ready(function()
{
$('#usrrr_search').keyup(function()
{
  var search = $("#usrrr_search").val();
  $('#pgg').load("../app/helpers/vehicleDetailsTablePagination",
 {
    search: search
});
});
});


//filter box wrapper Search function
$(document).ready(function()
{
$('.filter_box_wrapper').change(function()
{
  var tov = $("#tov").val();
  var to = $("#flt_t").val();
  var from = $("#flt_f").val();
  var brand = $("#brnd").val();
  var location = $("#lction").val();
  $('#fb').load("app/helpers/filterVehicleCheck",
 {
    flt_typ_vehicle: tov,
    flt_brand: brand,
    flt_to:to,
    flt_from:from,
    flt_location: location
});
});
});


//Contact Form function
$(document).ready(function()
{

$('.contact_form').submit(function(event)
{
event.preventDefault();
if ($('#cct_usrnme').val() == '' || $('#cct_message').val() == '' || $('#cct_subject').val() == '')
{
alert('Please Fill all fields');
}
else
{
  var username = $('#cct_usrnme').val();
  var email = $('#cct_email').val();
  var message = $('#cct_message').val();
  var subject = $('#cct_subject').val();
  var submit = $('#cct_submit').val();
  var user_name = $('#cct_user_name').val();
  var user_email = $('#cct_user_email').val();
  var user_id = $('#cct_user_id').val();
  $('#pop_up_change').load("app/helpers/contactVerify",
  {
    username: username,
    email: email,
    subject: subject,
    message: message,
    submit: submit,
    user_name: user_name,
    user_email: user_email,
    user_id: user_id
  });
}
});
});





function hideDeleteModal()
{
  $(document).ready(function()
  {
    $('.deleteModal_wrapper').hide();
  });
}


function hidePopUpModal()
{
  $(document).ready(function()
  {
    $('#pop_up_change').hide();
  });
}
