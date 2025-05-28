/* styling for slider carousel */
<?php
    header('Content-type: text/css');
    //include("../database/connection.php");
?>

.slider_carousel
{
  position:relative;
  width:100%;
  height:25vh;
}

.slider_carousel img
{
  width:100%;
  height:100%;
  object-fit:cover;
}

.slider_carousel_text
{
  z-index:30;
  position:absolute;
  width:60%;
  margin:0px auto;
  top:50%;
  left:0px;
  right:0px;
  text-align:center;
  transform:translatey(-50%);
  color: var(--sliderCarouselTextColor);
}

.swiper
{
  width: 100%;
  height: 100%;
}

.swiper-slide
{
  text-align: center;
  font-size: 18px;
  background: #fff;
  /* Center slide text vertically */
  display: -webkit-box;
  display: -ms-flexbox;
  display: -webkit-flex;
  display: flex;
  -webkit-box-pack: center;
  -ms-flex-pack: center;
  -webkit-justify-content: center;
  justify-content: center;
  -webkit-box-align: center;
  -ms-flex-align: center;
  -webkit-align-items: center;
  align-items: center;
}

.swiper-slide img
{
  display: block;
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.slider_caption
{
  position: absolute;
  z-index:1000;
  top:50%;
  transform:translateY(-50%);
  display:grid;
  grid-template-columns:repeat(1,1fr);
  grid-row-gap:20px;
  left: 0px;
  right: 0px;
}

/* styling for slider carousel */
