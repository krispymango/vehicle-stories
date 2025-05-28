<?php
include '../../path.php'; ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="<?php echo BASE_URL . "/assets/css/fontawesome.min.css"; ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL . "/assets/css/all.min.css"; ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL . "/assets/css/tableStyleSheet.css"; ?>">
    <link
      rel="stylesheet"
      href="https://unpkg.com/swiper/swiper-bundle.min.css"
    />
    <link rel="stylesheet" href="../../assets/css/galleryStyleSheet.css">

  </head>
  <body>
    <div class="table">
      <div id="table_arr">
        <a>Show
        <select class="" name="">
        <option value="">1</option>
        <option value="">2</option>
        </select> entries
        </a>
        <a>
          <span>Search:<input type="text" name="" value=""></span>
        </a>
      </div>

      <div id="table_wrapper">
          <div id="table_content">
            <div id="table_heading">
              <a><span>title</span> <span><i class="fas fa-sort"></i><span></a>
              <a><span>title</span> <span><i class="fas fa-sort"></i><span></a>
              <a><span>title</span> <span><i class="fas fa-sort"></i><span></a>
              <a><span>title</span> <span><i class="fas fa-sort"></i><span></a>
              <a><span>title</span> <span><i class="fas fa-sort"></i><span></a>
            </div>
            <div>
              <a><span>jjj</span></a>
              <a><span>jjj</span></a>
              <a><span>jjj</span></a>
              <a><span>jjj</span></a>
              <a><span>jjj</span></a>
            </div>
            <div>
              <a> <span>jjj</span></a>
              <a> <span>jjj</span></a>
              <a> <span>jjj</span></a>
              <a> <span>jjj</span></a>
              <a> <span>jjj</span></a>
            </div>
            <div>
              <a> <span>jjj</span></a>
              <a> <span>jjj</span></a>
              <a> <span>jjj</span></a>
              <a> <span>jjj</span></a>
              <a> <span>jjj</span></a>
            </div>
            <div>
              <a> <span>jjj</span></a>
              <a> <span>jjj</span></a>
              <a> <span>jjj</span></a>
              <a> <span>jjj</span></a>
              <a> <span>jjj</span></a>
            </div>
          </div>
      </div>

      <div id="table_pagination">
        <a>Showing 1 to 3 of 3 entries<a>
        <div class=""></div>
        </a>
      </div>
    </div>





    <!-- Swiper -->

     <div
       style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff"
       class="swiper mySwiper2"
     >
       <div class="swiper-wrapper">
         <div class="swiper-slide">
           <img src="https://swiperjs.com/demos/images/nature-1.jpg" />
         </div>
         <div class="swiper-slide">
           <img src="https://swiperjs.com/demos/images/nature-2.jpg" />
         </div>
         <div class="swiper-slide">
           <img src="https://swiperjs.com/demos/images/nature-3.jpg" />
         </div>
         <div class="swiper-slide">
           <img src="https://swiperjs.com/demos/images/nature-4.jpg" />
         </div>
         <div class="swiper-slide">
           <img src="https://swiperjs.com/demos/images/nature-5.jpg" />
         </div>
         <div class="swiper-slide">
           <img src="https://swiperjs.com/demos/images/nature-6.jpg" />
         </div>
         <div class="swiper-slide">
           <img src="https://swiperjs.com/demos/images/nature-7.jpg" />
         </div>
         <div class="swiper-slide">
           <img src="https://swiperjs.com/demos/images/nature-8.jpg" />
         </div>
         <div class="swiper-slide">
           <img src="https://swiperjs.com/demos/images/nature-9.jpg" />
         </div>
         <div class="swiper-slide">
           <img src="https://swiperjs.com/demos/images/nature-10.jpg" />
         </div>
       </div>
       <div class="swiper-button-next"></div>
       <div class="swiper-button-prev"></div>
     </div>
     <div thumbsSlider="" class="swiper mySwiper">
       <div class="swiper-wrapper">
         <div class="swiper-slide">
           <img src="https://swiperjs.com/demos/images/nature-1.jpg" />
         </div>
         <div class="swiper-slide">
           <img src="https://swiperjs.com/demos/images/nature-2.jpg" />
         </div>
         <div class="swiper-slide">
           <img src="https://swiperjs.com/demos/images/nature-3.jpg" />
         </div>
         <div class="swiper-slide">
           <img src="https://swiperjs.com/demos/images/nature-4.jpg" />
         </div>
         <div class="swiper-slide">
           <img src="https://swiperjs.com/demos/images/nature-5.jpg" />
         </div>
         <div class="swiper-slide">
           <img src="https://swiperjs.com/demos/images/nature-6.jpg" />
         </div>
         <div class="swiper-slide">
           <img src="https://swiperjs.com/demos/images/nature-7.jpg" />
         </div>
         <div class="swiper-slide">
           <img src="https://swiperjs.com/demos/images/nature-8.jpg" />
         </div>
         <div class="swiper-slide">
           <img src="https://swiperjs.com/demos/images/nature-9.jpg" />
         </div>
         <div class="swiper-slide">
           <img src="https://swiperjs.com/demos/images/nature-10.jpg" />
         </div>
       </div>
     </div>

     <!-- Swiper JS -->
     <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

     <!-- Initialize Swiper -->
     <script>
       var swiper = new Swiper(".mySwiper", {
         loop: true,
         spaceBetween: 10,
         slidesPerView: 4,
         freeMode: true,
         watchSlidesProgress: true,
       });
       var swiper2 = new Swiper(".mySwiper2", {
         loop: true,
         spaceBetween: 10,
         navigation: {
           nextEl: ".swiper-button-next",
           prevEl: ".swiper-button-prev",
         },
         thumbs: {
           swiper: swiper,
         },
       });
     </script>

  </body>
</html>
