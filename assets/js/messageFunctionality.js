function mobileReturnBox()
{
$('.message_users_wrapper').show();
$('.message_box').hide();
$('.recepient_name_heading').hide();
}


$(document).on('click','#sndr_val',function()
{
  if (window.matchMedia("(max-width: 430px)").matches)
        {
          $('.message_users_wrapper').hide();
          $('.message_box').show();
          $('.recepient_name_heading').show();
        }

let tr = $(this).closest('.message_container');
let a = tr.find('#sndr_val').val();
let b = tr.find('#rcv_val').val();
$('#msg_sndr').val(a);
  $('.text_box_wrapper').scrollTop( $('.text_box_wrapper')[0].scrollHeight );
$('#msg_box').load('../app/helpers/messageVerify',
{
sender_id:a,
receiverr:b
});
});


var auto_refresh = setInterval(
function ()
{
var sender_id = $('#msg_sndr').val();

$('#msg_box').load('../app/helpers/loadMessages',
{
  sender_id:sender_id

});
}, 10000);

var auto_refresh = setInterval(
function ()
{
  var sender_id = $('#msg_sndr').val();
  let b = $('#rcv_val').val();
$('#new_message_box').load('../app/helpers/newMessages',
{
  sender_id:sender_id,
  receiverr:b
});
}, 10000);


/*

$(document).ready(function()
{
var auto_refresh = setInterval(
function ()
{
$('#msg_box').load('../app/helpers/loadMessages');
}, 10000);
});
*/

$(document).ready(function()
{
$('.text_box_form').submit(function(event)
{
event.preventDefault();
var sender_id = $('#msg_sndr').val();
var receiver_id = $('#msg_rcv').val();
//var receiver_username = $('#msg_rcv_usrnme').val();
var message = $('#msg_message').val();
var submit = $('#msg_sbmt').val();


$('#msg_box').load("../app/helpers/sendMessageVerify",
{
  sender_id:sender_id,
  receiver_id:receiver_id,
  //receiver_username:receiver_username,
  message:message,
  submit:submit
});
$('#msg_message').val() = '';
});
});
