<section class="slider_carousel">
  <div class="swiper mySwiper">
        <div class="swiper-wrapper">
          <?php
SliderConfig();

            ?>
        </div>
        <!--
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
      -->
        <div class="swiper-pagination"></div>
      </div>

      <!-- Swiper JS -->
      <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

      <!-- Initialize Swiper -->
      <script>
        var swiper = new Swiper(".mySwiper", {
          spaceBetween: 5,
          centeredSlides: true,
          autoplay: {
            delay: <?php
            $data = file_get_contents(ROOT_PATH .'/app/helpers/api/properties.json');
            $json_arr = json_decode($data, true);
            echo  $json_arr[1]['Value'];
            ?>,
            disableOnInteraction: false,
          },
          pagination: {
            el: ".swiper-pagination",
            clickable: true,
          },
          navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
          },
        });
      </script>
</section>
