
<div class="fullscreen_modal_wrapper">
  <div class="name_of_vehicle">
  <span>name of vehicle</span>
  </div>
<div class="fullscreen_modal">
<div class="fullscreen_left_ad">
<div class="fs_left_ad">

</div>
</div>
<div class="fullscreen_gallery">
  <!-- Insert to your webpage where you want to display the slider -->
  <div class="amazingslider-wrapper" id="amazingslider-wrapper-2" style="display:block;position:relative;max-width:600px;padding-left:0px; padding-right:83px;margin:0px auto 0px;">
      <div class="amazingslider" id="amazingslider-2" style="display:block;position:relative;margin:0 auto;">
        <?php GalleryThumbnail(); ?></div>
  </div>
  <!-- End of body section HTML codes -->

</div>
<div class="fullscreen_right_ad">
  <div class="fs_right_ad">

  </div>
</div>
<i class="fas fa-lg fa-times"></i>
</div>
</div>

<script type="text/javascript">
  document.querySelector('.fullscreen_modal .fa-times').addEventListener('click',hideFullscreenModal);
  function hideFullscreenModal()
  {
    let personName = sessionStorage.getItem("lastname");
    window.location.href = personName;
  }
</script>
