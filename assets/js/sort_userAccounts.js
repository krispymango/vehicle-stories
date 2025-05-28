$(document).ready(function()
{
  let username_order = false;
  let email_order = false;
  let date_of_registration_order = false;
  let last_login_date_order = false;
  let ip_of_registration_order = false;
  let ip_of_last_login_order = false;

  //username
$('#all_username').click(function()
{
  //alert($('#all_username').val());
  //alert($('#usr_search').val());
  var sort = $('#all_username').val();
  var search = $('#usr_search').val();
  if (username_order == true)
  {
    order = 'ASC';
    username_order = false;
  }
  else if(username_order == false)
  {
    order = 'DESC';
    username_order = true;
  }

  $('#u_a_table').load("../app/helpers/adminUserAccountTable",
 {
   search:search,
   sort: sort,
   order:order
});
});


// email
$('#all_email').click(function()
{
  //alert($('#all_brand').val());
  //alert($('#usr_search').val());
  var sort = $('#all_email').val();
  var search = $('#usr_search').val();
  if (email_order == true)
  {
    order = 'ASC';
    email_order = false;
  }
  else if(email_order == false)
  {
    order = 'DESC';
    email_order = true;
  }

  $('#u_a_table').load("../app/helpers/adminUserAccountTable",
 {
   search:search,
   sort: sort,
   order:order
});
});


//date_of_registration
$('#all_date_of_registration').click(function()
{

  var sort = $('#all_date_of_registration').val();
  var search = $('#usr_search').val();
  if (date_of_registration_order == true)
  {
    order = 'ASC';
    date_of_registration_order = false;
  }
  else if(date_of_registration_order == false)
  {
    order = 'DESC';
    date_of_registration_order = true;
  }
  $('#u_a_table').load("../app/helpers/adminUserAccountTable",
 {
   search:search,
   sort: sort,
   order:order
});
});


//last_login_date
$('#all_last_login_date').click(function()
{
  //alert($('#all_brand').val());
  //alert($('#usr_search').val());
  var sort = $('#all_year_of_production').val();
  var search = $('#usr_search').val();
  if (last_login_date_order == true)
  {
    order = 'ASC';
    last_login_date_order = false;
  }
  else if(last_login_date_order == false)
  {
    order = 'DESC';
    last_login_date_order = true;
  }
  $('#u_a_table').load("../app/helpers/adminUserAccountTable",
 {
   search:search,
   sort: sort,
   order:order
});
});



//ip_of_registration
$('#all_ip_of_registration').click(function()
{
  //alert($('#all_brand').val());
  //alert($('#usr_search').val());
  var sort = $('#all_ip_of_registration').val();
  var search = $('#usr_search').val();
  if (ip_of_registration_order == true)
  {
    order = 'ASC';
    ip_of_registration_order = false;
  }
  else if(ip_of_registration_order == false)
  {
    order = 'DESC';
    ip_of_registration_order = true;
  }
  $('#u_a_table').load("../app/helpers/adminUserAccountTable",
 {
   search:search,
   sort: sort,
   order:order
});
});



//ip_of_last_login
$('#all_ip_of_last_login').click(function()
{
  //alert($('#all_brand').val());
  //alert($('#usr_search').val());
  var sort = $('#ip_of_last_login').val();
  var search = $('#usr_search').val();
  if (ip_of_last_login_order == true)
  {
    order = 'ASC';
    ip_of_last_login_order = false;
  }
  else if(ip_of_last_login_order == false)
  {
    order = 'DESC';
    ip_of_last_login_order = true;
  }

  $('#u_a_table').load("../app/helpers/adminUserAccountTable",
 {
   search:search,
   sort: sort,
   order:order
});
});

});
