<?php
    header('Content-type: text/css');
    include("../../path.php");
?>

/* general styling for website html tags */

/* color variables */
:root
{
  --defaultFontColor:#000000;
  --defaultBackgroundColor:#ffffff;
  --sliderCarouselTextColor:#ffffff;
  --filterBoxBorderColor:#CACFD2;
  --filterBoxFormInputBorderColor:#5499C7;
  --footerBorderTopColor:#5499C7;
  --RibbonBackgroundColor:<?php
  $data = file_get_contents(ROOT_PATH .'/app/helpers/api/properties.json');
  $json_arr = json_decode($data, true);
  echo  $json_arr[3]['Value'].';';
  ?>
  --RibbbonTextColor:<?php
  $data = file_get_contents(ROOT_PATH .'/app/helpers/api/properties.json');
  $json_arr = json_decode($data, true);
  echo  $json_arr[2]['Value'].';';
  ?>
}
/* color variables */

input[type='text'],
input[type='number'],
input[list]
{
  font-family: 'Roboto', sans-serif;
  font-size:15px;
  background:white;
  -webkit-border-radius: 1px;
-moz-border-radius: 1px;
border:1px solid grey;
}

select
{
  font-family: 'Roboto', sans-serif;
  font-size:15px;
  background:white;
  -webkit-border-radius: 1px;
-moz-border-radius: 1px;
border:1px solid grey;
}

a
{
  color:var(--defaultFontColor);
}

textarea
{
  background:white;
  font-family: 'Roboto', sans-serif;
}

#pf_link
{
  font-weight:bold;
  text-decoration:none;
  z-index:10;
  position:absolute;
  bottom:12px;
  left:50%;
  text-align:left;
  right:0px;
}



body
{
  margin:0px;
  padding:0px;
  font-family: 'Roboto', sans-serif;
  background:var(--defaultBackgroundColor);
  font-size:15px;
  color:var(--defaultFontColor);
  -webkit-font-smoothing: antialiased;
  text-rendering: optimizeLegibility;
}

@font-face {
  font-family: 'Roboto', sans-serif;
}

/* general styling for website html tags */






/* styling for header */

.admin_nav
{
  z-index:100;
  position:sticky;
  width:100%;
  border-bottom:2px solid #2471A3;
  display:flex;
}

.cookie_box
{
  box-shadow: 0px 2px 5px rgba(0,0,0,0.8);
  border-radius:5px;
  padding: 20px;
  background: white;
  width: 50%;
  margin:0px auto;
  position:fixed;
  top:50%;
  left:0px;
  right:0px;
  transform:translateY(-50%);
}

nav
{
  z-index:100;
  position:sticky;
  width:100%;
  border-bottom:2px solid #2471A3;
  display:flex;
}

.admin_nav a
{
  text-decoration:none;
  line-height:8vh;
}

nav a
{
  text-decoration:none;
}

.header_logo_wrapper
{
  flex-basis:20%;
  height:100%;
  width:100%;
}

.admin_header_logo
{
  margin:0px auto;
  width:90%;
  height:100%;
}

.admin_header_logo a
{
  margin:0px;
  height:8vh;
  line-height:8vh;
  text-decoration:none;
}

.admin_header_logo img
{
  width:30%;
  height:100%;
}

.header_navigation_bar_wrapper
{
  width:100%;
  flex-basis:80%;
  height:8vh;
}

.header_navigation_bar
{
  font-size:13px;
  width:50%;
  margin:0px auto;
  display:grid;
  grid-template-columns:repeat(3,1fr);
  text-align:center;
  float:right;
  padding-right:20px;
}
#recepient_name
{
  padding-left:10px;
}

.mobileHeader
{
  display: none;
  border-bottom: 3px solid #2471A3;
  height:60px;
}

.header_navigation_bar a
{
  height:8vh;
  line-height:8vh;
}

.account_dropdown_wrapper
{
  position:relative;
  height:8vh;
  line-height:8vh;
}

.account_dropdown_wrapper:hover
{
  background:#E5E7E9;
}

.account_dropdown
{
  display: none;
z-index: 1000;
background:white;
}

.account_dropdwn
{
  position:absolute;
  top:8vh;
  width:100%;
  background:white;
  border:1px solid rgba(0,0,0,0.3);
  border-radius:5px;
  overflow:hidden;
  box-shadow:0px 2px 2px rgba(0,0,0,0.3);
}

#notification_btn
{
  position:absolute;
  bottom:5px;
  left:5px;
  background:red;
  height:19px;
  width:19px;
  border-radius:50%;
  line-height:19px;
  text-align:center;
  color:white;
  font-size:11px;
  box-shadow:0px 2px 2px rgba(0,0,0,0.5);
}

#nav_profile_pic
{
  display:flex;
  border-left:1px solid #EAEDED;
  border-right:1px solid #EAEDED;
  position:relative;
}

#nav_profile_pic i
{
flex:4;
line-height:8vh;
text-align:center;
}

#nav_profile_pic i img
{
  width:100%;
  height:100%;
  transform:scale(0.7);
  border-radius:50%;
}

#nav_profile_pic span
{
flex:6;
line-height:8vh;
text-align:left;
}

.account_dropdown_wrapper:hover .account_dropdown
{
  display:block;
}

.account_dropdown:hover .header_navigation_bar a
{
 background:white;
}

.account_dropdown a
{
  display:block;
   width:100%;
}

#lgt
{
  border-top:1px solid grey;
}

.header_navigation_bar a:hover
{
  background:#E5E7E9;
}


.header_announcement
{
  flex-basis:50%;
  height:8vh;
}

.admin_header_navigation_bar
{
  margin:0px auto;
  width:100%;
  height:8vh;
  display:flex;
  float:right;
  border-left:2px solid #EAEDED;
}

#admin_header_icon
{
  text-align:center;
  flex-basis:30%;
  line-height:8vh;
}

#admin_header_icon i
{
  border-radius:50%;
}

#admin_header_icon i img
{
  width:100%;
  height:100%;
    transform:scale(0.7);
    border-radius:50%;
}

#admin_header_details
{
  margin-left:5px;
  flex-basis:70%;
  display:grid;
  grid-template-columns:repeat(1,1fr);
}

#admin_header_details span:nth-child(1)
{
  font-weight:bold;
  line-height:3.5vh;
}

#admin_header_details span:nth-child(2)
{
  font-size:13px;
  line-height:3.5vh;
}

.admin_header_navigation_bar_grid
{
  float:right;
  width:25%;
  display:grid;
  grid-template-columns:repeat(1,1fr);
}

.admin_header_navigation_bar_dropdown_wrapper
{
  display:none;
}

.admin_header_navigation_bar_grid:hover .admin_header_navigation_bar_dropdown_wrapper
{
  display:block;
}

.admin_header_navigation_bar_dropdown
{
  margin:0px;
  margin-top:2px;
  display:grid;
  grid-template-columns:repeat(1,1fr);
  width:85%;
  border-radius:3px;
  height:auto;
  overflow:hidden;
  text-align:center;
  box-shadow:0px 2px 5px rgba(0,0,0,0.5);
}

.admin_header_navigation_bar_dropdown a
{
  height:7vh;
  line-height:7vh;
  background:white;
}

.admin_header_navigation_bar_dropdown a:nth-child(3)
{
  border-top:1px solid grey;
}


.admin_header_navigation_bar_dropdown a:hover
{
  background:#D7DBDD;
}

#hideHeader,#hideHeaderTwo
{
  cursor:pointer;
}

#hideHeader:hover,
#hideHeaderTwo:hover
{
  background:#E5E7E9;
}

.admin_header_navigation_bar_wrapper
{
  flex-basis:80%;
  height:8vh;
  width:100%;
  margin-right:5px;
}


.header_logo
{
  width:90%;
  margin:0px auto;
  height:8vh;
  line-height:8vh;
  display: grid;
  grid-template-columns:repeat(3,1fr);
}

.header_logo a
{
  margin:0px;
  height:8vh;
  line-height:8vh;
  text-align:center;
  text-decoration:none;
}

  .header_logo a img
  {
    width:90%;
    height:100%;

  }
/* styling for header */












/* styling for slider filter box */

.filter_box_wrapper
{
  width:65%;
  margin:0px auto;
  padding:10px;
  margin-top: 2vh;
  border:1px solid var(--filterBoxBorderColor);
  border-radius:5px;
}

.filter_box
{
  display:grid;
  grid-template-columns:repeat(4,1fr);
  grid-column-gap:15px;
}

.filter_box label
{
  font-weight:bold;
}

.filter_box select
{
  border-radius:3px;
  height:4vh;
  width:100%;
  border-bottom:2px solid var(--filterBoxFormInputBorderColor);
}

.filter_box input
{
  height:3.3vh;
  width:100%;
  border: 1px solid grey;
  border-radius:3px;
  border-bottom:2px solid var(--filterBoxFormInputBorderColor);
  outline:none;
}


.filter_box input[type="submit"]
{
  display:block;
  margin:0px auto;
  width:70%;
  border-radius:3px;
  border:none;
  color:white;
  background:green;
  box-shadow:0px 2px 5px rgba(0,0,0,0.6);
}

.y_o_p
{
  display:grid;
  grid-template-columns:repeat(2,1fr);
  grid-column-gap:10px;
}

/* styling for slider filter box */







/* styling for vehicle filter display */

.filtered_vehicles_wrapper
{
  margin-top:2vh;
  width:100%;
  display:flex;
}

.left_advertisement
{
  width:100%;
  flex-basis:17.5%;
}

.right_avert
{
  width:100%;
  flex-basis:17.5%;
  position:sticky;
  top:10px;
  margin-bottom:2vh;
}

.vehicle_display
{
  flex-basis:70%;
  display:grid;
  grid-template-columns:repeat(4,1fr);
  grid-column-gap:20px;
  grid-row-gap:20px;
  height:auto;
  margin-bottom:3vh;
}


#vehicle_displayy
{
  margin:0px;
  position:relative;
  overflow:hidden;
  text-decoration:none;
  border:1px solid #D7DBDD;
  border-radius:5px;
  width:100%;
  box-shadow: 0px 2px 5px rgba(0,0,0,0.3);
}

.vehicle_display img
{
  image-resolution: inherit;
  margin:0px auto;
}

.vehicle_display_img
{
  display: flex;
  justify-content: center;
  align-items: center;
  background:#111133;
  height:calc(0.60*40vh);
  opacity:0.91;
}

.vehicle_display_bottom_img
{
  top:0px;
  bottom:0px;
  right:0px;
  left:0px;
  position:absolute;
  display: flex;
  justify-content: center;
  align-items: center;
  height:calc(0.60*40vh);
  width:100%;
}

.vehicle_display_description_wrapper
{
  letter-spacing:1px;
  margin:0px;
  padding:0px;
  width:100%;
  text-decoration:none;
}

.vehicle_display_description
{
  width:95%;
  margin:10px auto;
}

.vehicle_display_description h4
{
  margin-top:-1vh;
  font-weight:bold;
}

.vehicle_display_description h4 span
{
  font-weight:lighter;
}

.vehicle_display_description_details_grid
{
  margin:0px;
  width:100%;
  margin-top:-3vh;
  display:grid;
  grid-template-columns:repeat(2,1fr);
  grid-column-gap:5px;
  grid-row-gap:5px;
  text-align:left;
}

.post_profile
{
  position:relative;
}

.post_profile:hover
{
  text-decoration:underline;
}

.vehicle_display_description_details
{
  display:grid;
  grid-template-columns:repeat(1,1fr);
}

.vehicle_display_description_details a
{
  text-decoration:none;
}

#details_heading
{
  color:grey;
  font-size:12px;
}

.first_flex
{
  display:flex;
}

.second_grid
{
  display:flex;
}

#details
{
  font-size:13px;
  font-weight:bold;
  text-decoration:none;
  overflow-wrap: break-word;
  text-align:left;
}

#details_heading
{
  color:grey;
  font-size:12px;
  text-align:left;
}




.left_advertisement,
.right_aver
{
  margin:0px;
  padding:0px;
  width:100%;
}

.left_ad_wrapper,
.right_ad_wrapper
{
  top:10px;
  z-index:20;
  position:sticky;
  top:10px;
  margin-bottom:2vh;
  max-height:40vh;
}

.left_add,
.right_add
{
  margin:0px auto;
  width:90%;
  height:100%;
}

.left_add img,
.right_add img
{
  width:100%;
  height:100%;
  object-fit:canvas;
}


.car_content_left_ad
{
  position:sticky;
}


#vehicle_display_tag
{
  width:100%;
  text-align:center;
  background:var(--RibbonBackgroundColor);
  color:var(--RibbbonTextColor);
  position:absolute;
  top:10%;
  left:-32%;
  transform:rotate(-40deg);
}

/* styling for vehicle filter display */


.contact_content_wrapper
{
  width:60%;
  margin:0px auto;
  margin-top:5vh;
  border-radius:5px;
  background:white;
  box-shadow:0px 2px 5px rgba(0,0,0,0.4);
}

#login_error_msg
{
  margin-top:1vh;
  text-align:center;
  color:red;
  height:4vh;
  line-height:4vh;
}

.contact_form
{
  margin:10px auto;
  padding:10px;
  width:90%;
  display:grid;
  grid-template-columns:repeat(1,1fr);
}

.contact_form label
{
  margin-top:1vh;
  margin-bottom:1vh;
}


.contact_form input
{
  border:1px solid grey;
  border-radius:3px;
  height:4vh;
  width:100%;
}

.contact_form select
{
  border:1px solid grey;
  border-radius:3px;
  height:5vh;
  width:100%;
}

.contact_form textarea
{
  border-radius:3px;
  width:100%;
  resize:none;
}
#search_boxx
{
  float:right;
}
.contact_form input[type="submit"]
{
  display:block;
  margin:0px auto;
  margin-top:2vh;
  width:50%;
  border-radius:3px;
  border:none;
  color:white;
  background:green;
  height:5vh;
  box-shadow:0px 2px 5px rgba(0,0,0,0.6);
}

.contact_form h2
{
  border-bottom:2px solid grey;
  padding-bottom:10px;
}

.registration_content_wrapper
{
  margin:0px auto;
  margin-top:5vh;
  margin-bottom:35vh;
  width:90%;
  display:grid;
  grid-template-columns:repeat(2,1fr);
}

.registration_login_button
{
  width:100%;
  display:grid;
  grid-template-columns:repeat(2,1fr);
  background:#D7DBDD;
  text-align:center;
  height:9vh;
  justify-content:center;
}

.news_box
{
  border-radius: 5px;
  background: white;
  position:absolute;
  left:0px;
  right:0px;
  top:50%;
  padding:10px;
  transform: translateY(-50%);
  width:70%;
  margin:0px auto;
  height:40vh;
}

.news_even div:nth-child(even)
{
background:#D7DBDD;
}


.registration_login_button a
{
  cursor:pointer;
  line-height:9vh;
  font-size:18px;
  font-weight:bold;
}

.registration_login_form_wrapper
{
  overflow:hidden;
  box-shadow:0px 2px 5px rgba(0,0,0,0.4);
  border-radius:5px;
  padding-bottom:1vh;
}

.registration_form
{
  margin:0px auto;
  padding-top:10px;
  padding-bottom:10px;
  width:80%;
  display:grid;
  grid-template-columns:repeat(1,1fr);
}

.registration_form input
{
  border:1px solid grey;
  border-radius:3px;
  height:4vh;
}

.aggrement_form_wrapper
{
  width:100%;
  display:flex;
}

.aggrement_form_wrapper input[type="checkbox"]
{
  flex:10%;
  display:block;
  border:none;
  border-radius:5px;
  margin-top:3vh;
}

.aggrement_form_wrapper p
{
  flex:90%;
}

.registration_form input[type="submit"]
{
  display:block;
  margin:0px auto;
  margin-top:2vh;
  width:50%;
  border-radius:3px;
  border:none;
  color:white;
  background:green;
  height:5vh;
  box-shadow:0px 2px 5px rgba(0,0,0,0.6);
}

.registration_form label
{
  margin-top:1vh;
  margin-bottom:1vh;
}

.registration_form input[type="submit"]
{
  display:block;
  margin:0px auto;
  margin-top:2vh;
  width:50%;
  border-radius:3px;
  border:none;
  color:white;
  background:green;
  height:5vh;
  box-shadow:0px 2px 5px rgba(0,0,0,0.6);
}

.login_form
{
  margin:0px auto;
  padding-top:10px;
  padding-bottom:10px;
  width:80%;
  display:grid;
  grid-template-columns:repeat(1,1fr);
}

.login_form input
{
  border:1px solid grey;
  border-radius:3px;
  height:4vh;
}

.login_form label
{
  margin-top:1vh;
  margin-bottom:1vh;
}

.login_form input[type="submit"]
{
  display:block;
  margin:0px auto;
  margin-top:2vh;
  width:50%;
  border-radius:3px;
  border:none;
  color:white;
  background:green;
  height:5vh;
  box-shadow:0px 2px 5px rgba(0,0,0,0.6);
}
#registration_error_msg
{
  color:red;
  margin-top:1vh;
  text-align:center;
}

#pop_up_change
{
  text-align:center;
}

.registration_form_toggle
{
  display:none;
}

#lgn_btn
{
  background:white;
  height:100%;
}


/* styling for vehicle details page */
.car_content_wrapper
{
  padding:0px;
  margin:0px;
  margin-top:5vh;
  display:flex;
  width:100%;
}

.car_content_left_advertisement
{
  margin:0px;
  padding:0px;
  width:100%;
  flex-basis:17.5%;
}

.car_content_left_wrapper,
.car_content_right_wrapper
{
  top:10px;
  z-index:20;
  position:sticky;
  top:10px;
  margin-bottom:2vh;
}

.car_content_left_ad
{
  margin:0px auto;
  width:90%;
  height:40vh;
  margin-top:4vh;
}

.car_content_right_ad
{
  margin:0px auto;
  width:90%;
  height:40vh;
  margin-top:4vh;
}

.car_content_left_ad img,
.car_content_right_ad img
{
  width:100%;
  height:100%;
  object-fit:canvas;
}

.car_content_details
{
  flex-basis:70%;
  display:flex;
  width:100%;
}

.car_gallery_and_comment
{
  margin:0px auto;
  width:90%;
  flex:6;
}

.car_description_wrapper
{
  flex:4;
  width:100%;
}

.car_description
{
  width:100%;
  border: 1px solid blue;
  padding-bottom:2vh;
  border-radius:4px;
}

#TempReturnBox
{
  display:none;
}

.car_description_details
{
  width:90%;
  margin:0px auto;
}
.car_description_details_text
{
  display:grid;
  grid-template-columns:repeat(2,1fr);
width:100%;
}

.car_description_details_text a:nth-child(even)
{
  text-align:right;
}

.car_description_details_text a
{
  width:100%;
  padding-top:5px;
  padding-bottom:5px;
  border-bottom:1px solid blue;
  font-size:13px;
  text-decoration:none;
}

.car_content_right_advertisement
{
  margin:0px;
  padding:0px;
  width:100%;
  flex-basis:17.5%;
}

.car_announcement
{
  width:100%;
  border-radius:4px;
  border:1px solid blue;
  margin-bottom:2vh;
}

.car_details
{
  width:100%;
  border-radius:4px;
  border:1px solid blue;
  margin-bottom:2vh;
}

.car_details_wrapper
{
  width:90%;
  margin:0px auto;
}

.car_details_wrapper h4
{
  margin:0px auto;
  margin-top:1vh;
  margin-bottom:1vh;
  width:95%;
  color:blue;
}

.car_details_wrapper p
{
  margin:0px auto;
  margin-bottom:2vh;
  width:90%;
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


.gallery_container
{
  margin:0px auto;
  margin-bottom:5vh;
  width:90%;
  background:black;
}

.return_box
{
  width:90%;
  margin:0px auto;
}

.car_comments
{
  width:100%;
  border-radius:4px;
  border:1px solid pink;
  margin-bottom:2vh;
}

/* styling for vehicle details page */


.loading_screen
{
  display:none;
  margin:0px auto;
  z-index:5000;
  top:0px;
  position:fixed;
  width:100%;
  height:100vh;
  background:rgba(0,0,0,0.1);
}

.loading_screen img
{
  margin:0px auto;
  position:absolute;
  left:0px;
  right:0px;
  top:50%;
  transform:translateY(-50%);
}







/* styling for footer */

.footer_wrapper
{
  margin:0px;
  margin-top:13vh;
  padding:0px;
  width:100%;
  height:6vh;
  background:black;
  color:white;
  text-align:center;
  border-top:3px solid var(--footerBorderTopColor);
}

.footer_wrapper a
{
  font-size:13px;
  color: white;
  line-height:6vh;
}


.aboutContentWrapper
{
  margin:0px auto;
  width:90%;
}

.aboutContentWrapper h2
{
  text-transform:uppercase;
}

.rodoContentWrapper
{
  margin:0px auto;
  width:90%;
}

.rodoContentWrapper h2
{
  text-transform:uppercase;
}

.cookieConsentContentWrapper
{
  margin:0px auto;
  width:90%;
}

.cookieConsentContent
{
    padding:10px;
}

.cookieConsentContentWrapper h2
{
  text-transform:uppercase;
}

.newsContentWrapper
{
  margin:0px auto;
  width:90%;
}

.newsContent
{
    padding:10px;
}

.newsContentWrapper h2
{
  text-transform:uppercase;
}
.newsContent div
{
  padding:10px;
}

.newsContent div:nth-child(even)
{
  background:#D7DBDD;
}

.rulesContentWrapper
{
  margin:0px auto;
  width:90%;
}

.rulesContentWrapper h2
{
  text-transform:uppercase;
}


.acc_recov_wrapper
{
  width:40%;
  margin:0px auto;
  margin-top:10vh;
  margin-bottom:37vh;
  box-shadow:0px 2px 5px rgba(0,0,0,0.4);
  padding:10px;
  border-radius:3px;
}

.acc_recov
{
  display:grid;
  grid-template-columns:repeat(1,1fr);
  height:40vh;
  text-align:center;
}

.acc_recov h3
{
text-align:center;
text-decoration:underline;
}

.acc_recov input[type="submit"]
{
  display:block;
  margin:0px auto;
  margin-top:2vh;
  width:50%;
  border-radius:3px;
  border:none;
  color:white;
  background:green;
  height:7vh;
  box-shadow:0px 2px 5px rgba(0,0,0,0.6);
}

.acc_recov input[type='email']
{
  margin:0px auto;
  height:4vh;
  border:1px solid grey;
  border-radius:3px;
  width:70%;
  outline:none;
}

#slider_www
{
  width:470px;
  margin:30px auto;
}

.homepage_search
{
  margin:0px auto;
  margin-top:1.5vh;
  width:100%;
  height:5vh;
  display:flex;
  background:white;
}

.homepage_sort_popup_wrapper
{
  display:none;
  background:white;
  width:100%;
}


.homepage_sort_popup
{
  margin:5px auto;
  background:white;
  width:95%;
  padding-bottom:3vh;
}

.homepage_sort_popup input[type='submit']
{
  display:block;
  margin:0px auto;
  margin-top:3vh;
  width:30%;
  background:green;
  height:6vh;
  color:white;
}

.homepage_sort_popup select
{
  border-radius:3px;
  height:4vh;
  width:100%;
  border-bottom:2px solid var(--filterBoxFormInputBorderColor);
}


.homepage_sort_popup input[type='text']
{
  height:3.3vh;
  width:100%;
  border: 1px solid grey;
  border-radius:3px;
  border-bottom:2px solid var(--filterBoxFormInputBorderColor);
  outline:none;
}

.homepage_sort_popup input[list]
{
  height:3.3vh;
  width:100%;
  border: 1px solid grey;
  border-radius:3px;
  border-bottom:2px solid var(--filterBoxFormInputBorderColor);
  outline:none;
}

.homepage_sort_popup input[type='date']
{
  height:3.3vh;
  width:100%;
  border: 1px solid grey;
  border-radius:3px;
  border-bottom:2px solid var(--filterBoxFormInputBorderColor);
  outline:none;
}



.homepage_search input[type='text']
{
  outline:none;
  height:auto;
  width:100%;
  border-radius:3px;
}

#clear_sort
{
  border:none;
  border-radius:5px;
  cursor:pointer;
}

#clear_sort:hover
{
  background:#086104;
}


/* styling for footer */
