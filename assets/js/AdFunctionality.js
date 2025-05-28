$(document).ready(function()
{


let editHomepageAd = false;
let editVehicleDisplayAd = false;
let editGalleryAd = false;


// Show Homepage edit div
$('#edt_hp_btn').click(function()
{
if (editHomepageAd == false)
{
  $('.edit_homepage_ad').show();
  editHomepageAd = true;
}
else if (editHomepageAd == true)
{
  $('.edit_homepage_ad').hide();
  editHomepageAd = false;
}
});



// Show Vehicle Display edit div
$('#edt_vd_btn').click(function()
{
if (editVehicleDisplayAd == false)
{
  $('.edit_vehicle_display_ad').show();
  editVehicleDisplayAd = true;
}
else if (editVehicleDisplayAd == true)
{
  $('.edit_vehicle_display_ad').hide();
  editVehicleDisplayAd = false;
}
});



// Show Gallery edit div
$('#edt_g_btn').click(function()
{
if (editGalleryAd == false)
{
  $('.edit_gallery_ad').show();
  editGalleryAd = true;
}
else if (editGalleryAd == true)
{
  $('.edit_gallery_ad').hide();
  editGalleryAd = false;
}
});
















});
