<?php
    header('Content-type: text/css');
    //include("../database/connection.php");
?>

/* general styling for user page html tags */

/* color variables */
:root
{
  --defaultFontColor:#000000;
  --defaultBackgroundColor:#ffffff;
}
/* color variables */

textarea
{
  font-family: 'Roboto', sans-serif;
}

.user_panel_wrapper
{
  margin:0px auto;
  margin-top:5vh;
  margin-bottom: 12vh;
  width:90%;
  border-radius:5px;
  background:white;
}

.profile_user
{
  margin:0px auto;
  margin-top:2vh;
  width:95%;
}

.profile_user h2
{
  width:100%;
  text-transform:capitalize;
  padding-bottom:5px;
}

.profile_user h4
{
  width:100%;
  text-transform:uppercase;
  padding-bottom:10px;
  border-bottom:1px solid grey;
}


.user_panel
{
  margin:0px auto;
  margin-top:2vh;
  width:95%;
}

.user_panel h3
{
  width:100%;
  text-transform:uppercase;
  padding-bottom:15px;
  border-bottom:1px solid grey;
  margin-bottom:2vh;
}

.user_panel h4
{
  width:100%;
  text-transform:uppercase;
  padding-bottom:10px;
  border-bottom:1px solid grey;
}

.profile_user h4
{
  width:100%;
  padding-bottom:none;
  border-bottom:none;
}

.profile_user h3
{
  width:100%;
  padding-bottom:none;
  border-bottom:none;
}

.vehicle_list
{
  margin:0px auto;
  margin-top:2vh;
}

.vehicle_list_heading
{
  height:7vh;
  width:100%;
  text-transform:uppercase;
  padding-bottom:10px;
  border-bottom:1px solid grey;
  display:grid;
  grid-template-columns:repeat(2,1fr);
}

.vehicle_list_heading span
{
  background:green;
  padding:10px;
  border-radius:5px;
  box-shadow:0px 2px 5px rgba(0,0,0,0.3);
}

.vehicle_list_heading span a
{
  color:white;
  text-decoration:none;
}


.profile_details_heading
{
  margin:0px auto;
  margin-top:2vh;
  margin-bottom:2vh;
  position:relative;
  height:9vh;
  width:100%;
  padding-bottom:10px;
  border-bottom:1px solid grey;
  display:grid;
  grid-template-columns:repeat(2,1fr);
}

.profile_details_heading span
{
  top:50%;
  right:0px;
  transform:translateY(-50%);
  position:absolute;
  background:orange;
  padding:10px;
  border-radius:5px;
  box-shadow:0px 2px 5px rgba(0,0,0,0.3);
}

.profile_details_heading span a
{
  text-decoration:none;
}

.profile_details_heading img
{
  height:40px;
  width:40px;
  border-radius:50%;
}


.user_details
{
  display:grid;
  grid-template-columns:repeat(2,1fr);
  grid-column-gap:10px;
  margin-bottom:5vh;
}

.profile_user_details
{
  display:grid;
  grid-template-columns:repeat(3,1fr);
  grid-column-gap:10px;
  margin-bottom:5vh;
}

.profile_user_details div
{
  padding:5px;
}

.user_details div
{
  padding:5px;
}

.left_user_details
{
  display:grid;
  border-radius:2px;
  grid-template-rows:repeat(1,1fr);
  box-shadow:0px 2px 2px rgba(0,0,0,0.4);
  border:1px solid grey;
}

.middle_user_details
{
  display:grid;
  border-radius:2px;
  grid-template-rows:repeat(1,1fr);
  box-shadow:0px 2px 2px rgba(0,0,0,0.4);
  border:1px solid grey;
}

.left_user_details div:nth-child(2)
{
  border-top:1px solid grey;
  border-bottom:1px solid grey;
}

.left_user_details div
{
  display:grid;
  grid-template-columns:repeat(2,1fr);
  text-align:left;
}

.left_user_details div span:nth-child(2)
{
  text-align:right;
  font-weight:bold;
}

.right_user_details
{
  display:grid;
  border-radius:2px;
  grid-template-columns:repeat(1,1fr);
  box-shadow:0px 2px 2px rgba(0,0,0,0.4);
  border:1px solid grey;
}

.right_user_details div
{
  display:grid;
  grid-template-columns:repeat(3,1fr);
}

.right_user_details div a:nth-child(2)
{
  text-align:left;
}

.right_user_details div a
{
  text-decoration:none;
}


.right_user_details div a span
{
  background:orange;
  padding:2px;
  padding-left:5px;
  padding-right:5px;
  border-radius:5px;
  color:white;
}

.right_user_details div img
{
  height:20px;
  width:20px;
  border-radius:50%;
  object-fit:cover;
}

.right_user_details div a:nth-child(3)
{
  text-align:right;
  font-weight:bold;
}

.right_user_details div:nth-child(2)
{
  border-top:1px solid grey;
  border-bottom:1px solid grey;
}



.vehicle_tb_list
{
  position:relative;
  margin:0px auto;
  width:100%;
  box-shadow:0px 2px 5px rgba(0,0,0,0.5);
  border-radius:2px;
  padding:10px;
  padding-bottom:15vh;
}


.vehicle_tb_list .fa-plus
{
  z-index:20;
  position:absolute;
  left:20px;
  bottom:20px;
  height:50px;
  width:50px;
  border-radius:50%;
  background:green;
  line-height:50px;
  text-align:center;
  color:white;
  box-shadow:0px 2px 5px rgba(0,0,0,0.4);
  cursor:pointer;
}

.message_heading
{
  text-align:center;
  height:10vh;
  line-height:10vh;
  border-bottom:1px solid grey;
  font-weight:bold;
  font-size:20px;
}

.recepient_name_heading
{
  width:100%;
  height:10vh;
  line-height:10vh;
  border-bottom:1px solid grey;
}

#recepient_name
{
  padding-left:50px;
  text-transform:capitalize;
  font-weight:bold;
  font-size:20px;
  line-height:10vh;
}

.user_message_content
{
  width:100%;
  display:flex;
  height:65vh;
  border-radius:5px;
  box-shadow:0px 2px 6px rgba(0,0,0,0.6);
}

.message_users_wrapper
{
  flex:2;
  margin:0px auto;
  width:100%;
}

.message_users
{
  overflow-y:scroll;
  margin:0px auto;
  width:100%;
  height:55vh;
}

.message_box
{
  flex:6;
  margin:0px auto;
  height:10vh;
  width:100%;
  border-left:1px solid grey;
}

.message_user_box
{
  font-family: 'Roboto', sans-serif;
  margin:0px auto;
  margin-top:1vh;
  margin-bottom:1vh;
  width:90%;
  display:flex;
  height:9vh;
  border:none;
  background:white;
  border-bottom:1px solid grey;
  padding-bottom:2px;
  text-align:left;
  font-size:15px;
  cursor:pointer;
}

#msg_usrnme
{
  text-transform:capitalize;
  font-weight:bold;
}

.message_user_box img
{
  flex:2;
  height:100%;
  width:100%;
  border-radius:50%;
}

.message_user_box a
{
  text-decoration:none;
  width:100%;
}

.message_user_box span
{
  flex:8;
  height:100%;
  width:90%;
  display:grid;
  grid-template-columns:repeat(1,1fr);
  padding-left:5px;
  padding-right:5px;
}

.text_box_wrapper
{
  height:50vh;
  overflow-y:scroll
}

.text_box
{
  width:90%;
  margin:0px auto;
  height:100%;

}

.text_box_form
{
  height:5vh;
  display:flex;
}

.text_box_form input[type='submit']
{
  flex:2;
  background:none;
  border:none;
  color:green;
  font-weight:bold;
  letter-spacing: 1px;
}

.text_box_form input[type='submit']:focus
{
  background:green;
  color:white;
  cursor:pointer;
}

.text_box_form input[type='text']
{
  flex:8;
  width:90%;
  padding-left:10px;
  padding-right:10px;
  border:none;
  background:#D7DBDD;
  outline:none;
}

.text_user_box
{
  margin:0px;
  margin-top:3vh;
  margin-bottom:5vh;
  width:40%;
  display:flex;
  height:9vh;
  padding-bottom:2px;
  border-radius:5px;
}

.text_user_box img
{
  flex:2;
  height:100%;
  width:100%;
  border-radius:50%;
}

.text_user_box span
{
  flex:8;
  height:100%;
  width:90%;
  display:grid;
  grid-template-columns:repeat(1,1fr);
  padding-left:5px;
  padding-right:5px;
    overflow-wrap: break-word;
}

.text_user_box span p
{
  width:100%;
  overflow-wrap: break-word;
}

.text_user_box span a
{
  text-decoration:none;
}
#mobile_message_return
{
  display:none;
}
.add_vehicle_form
{
  margin:0px auto;
  width:95%;
}

.add_vehicle_form_grid
{
  display:grid;
  grid-template-columns:repeat(3,1fr);
  grid-column-gap:30px;
  grid-row-gap:2vh;
}


.add_vehicle_form select
{
  border:1px solid grey;
  border-radius:3px;
  height:4vh;
  width:100%;
  outline:none;
  border-bottom:2px solid var(--filterBoxFormInputBorderColor);
}

.add_vehicle_form input[type='text'],
.add_vehicle_form input[type='tel'],
.add_vehicle_form input[type='number'],
.add_vehicle_form input[list]
{
  border:1px solid grey;
  border-radius:3px;
  width:100%;
  outline:none;
  border-bottom:2px solid var(--filterBoxFormInputBorderColor);
}

.add_vehicle_form textarea
{
  border:1px solid grey;
  border-radius:3px;
  width:100%;
  resize:none;
}

.add_vehicle_form input[type='submit']
{
  display:block;
  margin:0px auto;
  margin-top:2vh;
  width:20%;
  border-radius:3px;
  border:none;
  color:white;
  background:green;
  height:8vh;
  box-shadow:0px 2px 5px rgba(0,0,0,0.6);
}

#other_photos
{
  width:auto;
  display:grid;
  grid-template-columns:repeat(4,1fr);
  grid-column-gap:10px;
  grid-row-gap:1vh;
  margin-top:3vh;
  margin-bottom:3vh;
}

#other_photos input[type='file']
{
  width:80%;
}

#other_photos span
{
  color:red;
  font-weight:bold;
}

#mn_photo span
{
  color:red;
}



.add_vehicle_form label
{
  font-size:14px;
  font-weight:bold;
}

.form_description
{
  margin-top:5vh;
  display:grid;
  grid-template-columns:repeat(2,1fr);
  grid-column-gap:50px;
  grid-row-gap:2vh;
}

.custom-file-input {
  color: transparent;
}
.custom-file-input::-webkit-file-upload-button {
  visibility: hidden;
}
.custom-file-input::before {
  content: 'Choose image';
  color: black;
  display: inline-block;
  background: -webkit-linear-gradient(top, #f9f9f9, #e3e3e3);
  border: 1px solid #999;
  border-radius: 3px;
  padding: 5px 8px;
  outline: none;
  white-space: nowrap;
  -webkit-user-select: none;
  cursor: pointer;
  text-shadow: 1px 1px #fff;
  font-weight: 700;
  font-size: 10pt;
}
.custom-file-input:hover::before {
  border-color: black;
}
.custom-file-input:active {
  outline: 0;
}
.custom-file-input:active::before {
  background: -webkit-linear-gradient(top, #e3e3e3, #f9f9f9);
}

.checkbox_wrapper
{
  width:50%;
  display:flex;
}

.checkbox_wrapper input
{
  flex:1;
  height:5vh;
  margin-top:4vh;
}

.checkbox_wrapper p
{
  display:flex;
  flex:9;
}

#action_btns
{
  display:grid;
  grid-template-columns:repeat(3,1fr);
  grid-column-gap:10px;
  text-align:center;
}

#del_btn
{
  border-radius:5px;
  background:orange;
  color:white;
  box-shadow:0px 2px 2px rgba(0,0,0,0.4);
  cursor:pointer;
  border:none;
}

#edt_btn
{
  border-radius:5px;
  color:white;
  background:green;
  box-shadow:0px 2px 2px rgba(0,0,0,0.4);

  text-decoration:none;
}

#edt_btn_two
{
  margin:0px auto;
  border-radius:5px;
  color:white;
  background:green;
  box-shadow:0px 2px 2px rgba(0,0,0,0.4);
  width:60%;
  text-decoration:none;
}

.edit_vehicle_form
{
  margin:0px auto;
  margin-top:5vh;
  width:95%;
}


.edit_vehicle_form select
{
  border:1px solid grey;
  border-radius:3px;
  height:4vh;
  width:100%;
  outline:none;
  border-bottom:2px solid var(--filterBoxFormInputBorderColor);
}

.edit_vehicle_form input[type='text'],
.edit_vehicle_form input[type='tel'],
.edit_vehicle_form input[type='number'],
.edit_vehicle_form [list]
{
  border:1px solid grey;
  border-radius:3px;
  width:100%;
  outline:none;
  border-bottom:2px solid var(--filterBoxFormInputBorderColor);
}

.edit_vehicle_form textarea
{
  border:1px solid grey;
  border-radius:3px;
  width:100%;
  resize:none;
}

.edit_vehicle_form input[type='submit']
{
  display:block;
  margin:0px auto;
  margin-top:2vh;
  width:20%;
  border-radius:3px;
  border:none;
  color:white;
  background:green;
  height:8vh;
  box-shadow:0px 2px 5px rgba(0,0,0,0.6);
}
.edit_vehicle_form label
{
  font-size:14px;
  font-weight:bold;
}

.return_box
{
  margin:0px auto;
  padding:0px;
  height:5vh;
  width:95%;
}

.return_box a
{
  font-weight:bold;
    line-height:5vh;
    text-decoration:none;
    color:blue;
}

.deleteModal_wrapper
{
  display:none;
  z-index:100;
  top:0px;
  left0px;
  right:0px;
  width:100%;
  bottom:0px;
  position:fixed;
  background:rgba(0,0,0,0.3);
  text-align:center;
}

.deleteModal
{
  margin:0px auto;
  position:absolute;
  padding-bottom:2vh;
  top:50%;
  left:0px;
  right:0px;
  transform:translateY(-50%);
  width:40%;
  background:white;
  box-shadow:0px 2px 2px rgba(0,0,0,0.6);
  border-radius:5px;
}

.deleteModal a
{
  margin:0px;
  text-decoration:none;
  border-radius:5px;
  width:50%;
  padding:10px;
}

.deleteModal #yes_btn
{
  background:green;
  color:white;
}

.deleteModal #no_btn
{
  background:red;
  color:white;
  cursor:pointer;
}

.edit_div img
{
  margin-top:2vh;
  object-fit:cover;
  width:100px;
  height:100px;
}


#changeForm
{
  margin:0px;
  width:40%;
  display:grid;
  grid-template-columns:repeat(1,1fr);
  grid-row-gap:10px;
  padding-bottom:5vh;
}


#changeForm input[type="submit"]
{
  display:block;
  width:30%;
  border-radius:3px;
  border:none;
  color:white;
  background:green;
  box-shadow:0px 2px 5px rgba(0,0,0,0.6);
  height:6vh;
}

#changeForm input[type='text'],
#changeForm input[type='email'],
#changeForm input[type='password']
{
  border: 1px solid grey;
  border-radius:3px;
  border-bottom:2px solid var(--filterBoxFormInputBorderColor);
  outline:none;
  height:4vh;
}


#change_heading
{
  margin-top:7vh;
}


#changeForm img
{
  width:200px;
  height:200px;
  border-radius:50%;
  object-fit:cover;
}

.pop_up_box
{
  animation:PopUptransition 1.0s;
  display:none;
  margin:0px auto;
  z-index:600;
  position:fixed;
  top:5vh;
  left:0px;
  right:0px;
  text-align:center;
  width:40%;
  border-radius:5px;
  background:white;
}

.pop_up_box .fa-times-circle
{
  position:absolute;
  z-index:600;
  right:-10px;
  top:-10px;
  cursor:pointer;
  background:white;
  border-radius:50%;
}


#table_pagination
{
  display: grid;
  grid-template-columns: repeat(2,1fr);
  align-items: center;
}

.pagination_no
{
  text-align: right;
  margin: 10px auto;
  width: 100%;
}

.pagination_no a
{
  text-align: center;
  background: #2471A3;
  padding: 5px;
  color:white;
  text-decoration: none;
  border-radius: 3px;
  margin-left:2px;
  margin-right:2px;
  padding-left:5px;
  padding-right:5px;
}

/* general styling for user page html tags */
