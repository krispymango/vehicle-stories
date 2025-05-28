

<?php

if (isset($_SESSION['error_three']))
{
  echo "
  <script>
  $(document).ready(function()
  {
    $('.loading_screen').hide();
  $('.pop_up_box').show();
  $('#pop_up_icon').show();
  $('.pop_up_box').css('box-shadow','0px 2px 5px red');
  $('.pop_up_box').html('<h4> There was an issue!</h4>');
  $('.pop_up_box').delay(2000).fadeOut();
});
  </script>
  ";
  unset($_SESSION['error_three']);
  unset($_SESSION['error_one']);
  unset($_SESSION['error_two']);
}
elseif (isset($_SESSION['error_two']))
{
  echo "
  <script>
  $(document).ready(function()
  {
    $('.loading_screen').hide();
  $('.pop_up_box').show();
    $('#pop_up_icon').show();
  $('.pop_up_box').css('box-shadow','0px 2px 5px red');
  $('.pop_up_box').html('<h4> Please upload the required amount of images</h4>');
  $('.pop_up_box').delay(2000).fadeOut();
});
  </script>
  ";
  unset($_SESSION['error_three']);
  unset($_SESSION['error_one']);
  unset($_SESSION['error_two']);
}
elseif (isset($_SESSION['error_one']))
{
  echo "
  <script>
  $(document).ready(function()
  {
    $('.loading_screen').hide();
  $('.pop_up_box').show();
    $('#pop_up_icon').show();
  $('.pop_up_box').css('box-shadow','0px 2px 5px red');
  $('.pop_up_box').html('<h4> Please click on the checkbox </h4>');
  $('.pop_up_box').delay(2000).fadeOut();
});
  </script>
  ";
  unset($_SESSION['error_three']);
  unset($_SESSION['error_one']);
  unset($_SESSION['error_two']);
}
 ?>
 <div class="loading_screen">
<img src="<?php echo BASE_URL . '/assets/img/Rolling.svg' ?>">
 </div>
 <div id="pop_up_change" class="pop_up_box">
 <i id="pop_up_icon" class="fas fa-2x fa-times-circle" onclick="hidePopUpModal()"></i>
 </div>
<section class="user_panel_wrapper">
  <div class="return_box">
<?php if (isset($_GET['admin_allow'])): ?>
  <a href="<?php echo BASE_URL . '/admin/user_accounts_details?id='.base64_decode(hex2bin($_GET['u_id'])); ?>"><i class="fas fa-lg fa-long-arrow-alt-left"></i>    Return to User Panel</a>

<?php else: ?>
  <a href="<?php echo BASE_URL . '/user/user_panel'; ?>"><i class="fas fa-lg fa-long-arrow-alt-left"></i>    Return to User Panel</a>

<?php endif; ?>
</div>
<div class="user_panel">
    <h3>Add Vehicle</h3>
</div>

<form class="add_vehicle_form" action="<?php echo BASE_URL . '/app/helpers/addVehicle'; ?>" method="post" enctype="multipart/form-data">
<input type="hidden" name="u_id" value="<?php
if (isset($_GET['u_id']))
{
  echo $_GET['u_id'];
} ?>">
<input type="hidden" name="admin_allow" value="<?php
if (isset($_GET['admin_allow']))
{
  echo $_GET['admin_allow'];
} ?>">
<input type="hidden" name="email" value="<?php
if (isset($_GET['email']))
{
  echo $_GET['email'];
} ?>">
<div class="add_vehicle_form_grid">

<!-- first row -->
<div>
<label><span style="color:red;">*</span> Type of vehicle:</label>
<select id="tov_cat" name="type_of_vehicle"  required>
  <?php// TypeOfVehicle(); ?>
  <option value=""></option>
  <option value="cars">cars</option>
  <option value="vans">vans</option>
  <option value="motorbikes">motorbikes</option>
  <option value="quads">quads</option>
  <option value="lorries">lorries</option>
  <option value="buses">buses</option>
  <option value="agricultural">agricultural</option>
  <option value="specials">specials</option>
  <option value="water">water</option>
  <option value="aerial">aerial</option>
  <option value="others">others</option>
</select>
</div>

<div>
<label><span style="color:red;">*</span> Brand:</label>
<select id="brand_cat"  name="brand"  required>
  <?php //Brand(); ?>
  <option value=""></option>
  <optgroup id="tv_cars" label="Car">
<option value="Abarth">Abarth</option>
<option value="Alfa Romeo">Alfa Romeo</option>
<option value="Aston Martin">Aston Martin</option>
<option value="Audi">Audi</option>
<option value="Bentley">Bentley</option>
<option value="BMW">BMW</option>
<option value="Buick">Buick</option>
<option value="Cadillac">Cadillac</option>
<option value="Chevrolet">Chevrolet</option>
<option value="Chrysler">Chrysler</option>
<option value="Citroen">Citroen</option>
<option value="Dacia">Dacia</option>
<option value="Daewoo">Daewoo</option>
<option value="Daihatsu">Daihatsu</option>
<option value="Datsun">Datsun</option>
<option value="Dodge">Dodge</option>
<option value="Ferrari">Ferrari</option>
<option value="Fiat">Fiat</option>
<option value="Ford">Ford</option>
<option value="Honda">Honda</option>
<option value="Hyundai">Hyundai</option>
<option value="Infiniti">Infiniti</option>
<option value="Isuzu">Isuzu</option>
<option value="Jaguar">Jaguar</option>
<option value="Jeep">Jeep</option>
<option value="Kia">Kia</option>
<option value="Lada">Lada</option>
<option value="Lamborghini">Lamborghini</option>
<option value="Lancia">Lancia</option>
<option value="Land Rover">Land Rover</option>
<option value="Lexus">Lexus</option>
<option value="Lotus">Lotus</option>
<option value="Maserati">Maserati</option>
<option value="Mazda">Mazda</option>
<option value="Mercedes">Mercedes</option>
<option value="MG">MG</option>
<option value="Mikrus">Mikrus</option>
<option value="Mini">Mini</option>
<option value="Mitsubishi">Mitsubishi</option>
<option value="Moskwicz">Moskwicz</option>
<option value="Nissan">Nissan</option>
<option value="Oldsmobile">Oldsmobile</option>
<option value="Opel">Opel</option>
<option value="Peugeot">Peugeot</option>
<option value="Polonez">Polonez</option>
<option value="Pontiac">Pontiac</option>
<option value="Porsche">Porsche</option>
<option value="Renault">Renault</option>
<option value="Rolls-Royce">Rolls-Royce</option>
<option value="Rover">Rover</option>
<option value="Saab">Saab</option>
<option value="San">San</option>
<option value="Seat">Seat</option>
<option value="Skoda">Skoda</option>
<option value="Smart">Smart</option>
<option value="Subaru">Subaru</option>
<option value="Suzuki">Suzuki</option>
<option value="Syrena">Syrena</option>
<option value="Tata">Tata</option>
<option value="Tatra">Tatra</option>
<option value="Tesla">Tesla</option>
<option value="Toyota">Toyota</option>
<option value="Trabant">Trabant</option>
<option value="Vauxhall">Vauxhall</option>
<option value="Volkswagen">Volkswagen</option>
<option value="Volvo">Volvo</option>
<option value="Warszawa">Warszawa</option>
<option value="Wartburg">Wartburg</option>
<option value="Wołga">Wołga</option>
<option value="Zaporożec">Zaporożec</option>
  </optgroup>




  <optgroup id="tv_vans" label="Vans">
    <option value='Citroen'>Citroen</option>
    <option value='Fiat'>Fiat</option>
    <option value='Ford'>Ford</option>
    <option value='Iveco'>Iveco</option>
    <option value='Lublin'>Lublin</option>
    <option value='Mercedes'>Mercedes</option>
    <option value='Mitsubishi'>Mitsubishi</option>
    <option value='Moskwicz'>Moskwicz</option>
    <option value='Nissan'>Nissan</option>
    <option value='Nysa'>Nysa</option>
    <option value='Peugeot'>Peugeot</option>
    <option value='Polonez'>Polonez</option>
    <option value='Renault'>Renault</option>
    <option value='Syrena'>Syrena</option>
    <option value='Tarpan'>Tarpan</option>
    <option value='Toyota'>Toyota</option>
    <option value='Vauxhall'>Vauxhall</option>
    <option value='Volkswagen'>Volkswagen</option>
    <option value='Warszawa'>Warszawa</option>
    <option value='Żuk'>Żuk</option>
  </optgroup>

  <optgroup id="tv_motorbikes" label="motorbikes">
    <option value='Accura'>Accura</option>
    <option value='Aprilia'>Aprilia</option>
    <option value='Bajaj'>Bajaj</option>
    <option value='BMW'>BMW</option>
    <option value='Dniepr'>Dniepr</option>
    <option value='Ducati'>Ducati</option>
    <option value='Harley-Davidson'>Harley-Davidson</option>
    <option value='Honda'>Honda</option>
    <option value='Husqvarna'>Husqvarna</option>
    <option value='Indian'>Indian</option>
    <option value='Jawa'>Jawa</option>
    <option value='Junak'>Junak</option>
    <option value='Kawasaki'>Kawasaki</option>
    <option value='Komaki'>Komaki</option>
    <option value='KTM'>KTM</option>
    <option value='Moto Guzzi'>Moto Guzzi</option>
    <option value='MZ'>MZ</option>
    <option value='Okinawa'>Okinawa</option>
    <option value='TVS'>TVS</option>
    <option value='Peugeot'>Peugeot</option>
    <option value='Piaggio'>Piaggio</option>
    <option value='Sokół'>Sokół</option>
    <option value='Suzuki'>Suzuki</option>
    <option value='SVM'>SVM</option>
    <option value='Triumph'>Triumph</option>
    <option value='Vespa'>Vespa</option>
    <option value='Yamaha'>Yamaha</option>
    <option value='Yukie'>Yukie</option>
    <option value='WSK'>WSK</option>
  </optgroup>


  <optgroup id="tv_quads" label="quads">
    <option value"Arctic">Arctic</option>
    <option value"Honda">Honda</option>
    <option value"Inca">Inca</option>
    <option value"Kingway">Kingway</option>
    <option value"KTM">KTM</option>
    <option value"Kymco">Kymco</option>
    <option value"Linhai">Linhai</option>
    <option value"Romet">Romet</option>
    <option value"Polaris">Polaris</option>
    <option value"Suzuki">Suzuki</option>
    <option value"WSK">WSK</option>
    <option value"Yamaha">Yamaha</option>
    <option value"Zumico">Zumico</option>
  </optgroup>


  <optgroup id="tv_lorries" label="lorries">
<option value="Avia">Avia</option>
<option value="Belaz">Belaz</option>
<option value="Berliet">Berliet</option>
<option value="DAF">DAF</option>
<option value="Fiat">Fiat</option>
<option value="Ford">Ford</option>
<option value="GMC">GMC</option>
<option value="Hyundai">Hyundai</option>
<option value="Isuzu">Isuzu</option>
<option value="Iveco">Iveco</option>
<option value="Jelcz">Jelcz</option>
<option value="Kalmar">Kalmar</option>
<option value="Kamaz">Kamaz</option>
<option value="Kenworth">Kenworth</option>
<option value="LIAZ">LIAZ</option>
<option value="Magirus">Magirus</option>
<option value="MAN">MAN</option>
<option value="Mercedes">Mercedes</option>
<option value="Opel">Opel</option>
<option value="Pegaso">Pegaso</option>
<option value="Peugeot">Peugeot</option>
<option value="Renault">Renault</option>
<option value="Scania">Scania</option>
<option value="Skoda">Skoda</option>
<option value="Star">Star</option>
<option value="Steyr">Steyr</option>
<option value="Tata">Tata</option>
<option value="Tatra">Tatra</option>
<option value="TVS">TVS</option>
<option value="Ural">Ural</option>
<option value="Volvo">Volvo</option>
<option value="ZIL">ZIL</option>
  </optgroup>

<optgroup id="tv_buses" label="buses">
  <option value="Autosan">Autosan</option>
  <option value="Avia">Avia</option>
  <option value="Berliet">Berliet</option>
  <option value="Daewoo">Daewoo</option>
  <option value="DAF">DAF</option>
  <option value="Fiat">Fiat</option>
  <option value="GMC">GMC</option>
  <option value="Hyundai">Hyundai</option>
  <option value="Ikarus">Ikarus</option>
  <option value="Isuzu">Isuzu</option>
  <option value="Iveco">Iveco</option>
  <option value="Jelcz">Jelcz</option>
  <option value="Kia">Kia</option>
  <option value="Leyland Motors">Leyland Motors</option>
  <option value="LIAZ">LIAZ</option>
  <option value="MAN">MAN</option>
  <option value="MAZ">MAZ</option>
  <option value="Mercedes">Mercedes</option>
  <option value="Neoplan">Neoplan</option>
  <option value="Nissan">Nissan</option>
  <option value="Pegaso">Pegaso</option>
  <option value="Renault">Renault</option>
  <option value="San">San</option>
  <option value="Sanos">Sanos</option>
  <option value="Scania">Scania</option>
  <option value="Solaris">Solaris</option>
  <option value="Steyr-Daimler-Puch">Steyr-Daimler-Puch</option>
  <option value="Tata">Tata</option>
  <option value="Toyota">Toyota</option>
  <option value="Ursus">Ursus</option>
  <option value="Volvo">Volvo</option>
</optgroup>


<optgroup id="tv_agricultural" label="agricultural">
  <option value="AGCO">AGCO</option>
  <option value="Allis Chalmers">Allis Chalmers</option>
  <option value="Belarus">Belarus</option>
  <option value="Bobcat">Bobcat</option>
  <option value="Branson">Branson</option>
  <option value="Case">Case</option>
  <option value="CaseIH">CaseIH</option>
  <option value="Caterpillar">Caterpillar</option>
  <option value="Challenger">Challenger</option>
  <option value="Chamberlain">Chamberlain</option>
  <option value="Chery">Chery</option>
  <option value="Claas">Claas</option>
  <option value="Deere">Deere</option>
  <option value="Deutz">Deutz</option>
  <option value="Deutz-Fahr">Deutz-Fahr</option>
  <option value="Fiat">Fiat</option>
  <option value="Ford">Ford</option>
  <option value="Hitachi">Hitachi</option>
  <option value="International Harvester">International Harvester</option>
  <option value="Iseki">Iseki</option>
  <option value="John Deere">John Deere</option>
  <option value="Kubota">Kubota</option>
  <option value="LS">LS</option>
  <option value="Lamborghini">Lamborghini</option>
  <option value="Landini">Landini</option>
  <option value="Massey Ferguson">Massey Ferguson</option>
  <option value="Mercedes">Mercedes</option>
  <option value="Mitsubishi">Mitsubishi</option>
  <option value="Renault">Renault</option>
  <option value="Steyr">Steyr</option>
  <option value="Terrion">Terrion</option>
  <option value="Ursus">Ursus</option>
  <option value="Zetor">Zetor</option>

</optgroup>

</select>
</div>

<div>
  <label>Model:</label>
  <select  name="model">
    <?php //Model(); ?>
    <option value=""></option>

    <optgroup id="m_cars_fiat" label="cars (Fiat)">
      <option value="1100/103">1100/103</option>
      <option value="1200">1200</option>
      <option value="1200/1500/1600 Cabriolet">1200/1500/1600 Cabriolet</option>
      <option value="124">124</option>
      <option value="124 Spider">124 Spider</option>
      <option value="124 Sport Coupé">124 Sport Coupé</option>
      <option value="124 Sport Spider">124 Sport Spider</option>
      <option value="125">125</option>
      <option value="126">126</option>
      <option value="127">127</option>
      <option value="128">128</option>
      <option value="130">130</option>
      <option value="1300">1300</option>
      <option value="131">131</option>
      <option value="132">132</option>
      <option value="133">133</option>
      <option value="1400">1400</option>
      <option value="147">147</option>
      <option value="1500">1500</option>
      <option value="1800">1800</option>
      <option value="1900">1900</option>
      <option value="2100">2100</option>
      <option value="2300">2300</option>
      <option value="500">500</option>
      <option value="600">600</option>
      <option value="850">850</option>
      <option value="8V">8V</option>
      <option value="Albea">Albea</option>
      <option value="Argenta">Argenta</option>
      <option value="Barchetta">Barchetta</option>
      <option value="Bravo">Bravo</option>
      <option value="Bravo/Brava">Bravo/Brava</option>
      <option value="Campagnola">Campagnola</option>
      <option value="Cinquecento">Cinquecento</option>
      <option value="Coupé">Coupé</option>
      <option value="Croma">Croma</option>
      <option value="Croma II">Croma II</option>
      <option value="Dino">Dino</option>
      <option value="Duna/Prêmio/Elba">Duna/Prêmio/Elba</option>
      <option value="Fullback">Fullback</option>
      <option value="Grand Siena">Grand Siena</option>
      <option value="Idea">Idea</option>
      <option value="Linea">Linea</option>
      <option value="Marea">Marea</option>
      <option value="Multipla">Multipla</option>
      <option value="Oggi">Oggi</option>
      <option value="Palio">Palio</option>
      <option value="Panda">Panda</option>
      <option value="Panorama">Panorama</option>
      <option value="Punto">Punto</option>
      <option value="Punto">Punto</option>
      <option value="Regata">Regata</option>
      <option value="Ritmo/Strada">Ritmo/Strada</option>
      <option value="Scudo">Scudo</option>
      <option value="Sedici">Sedici</option>
      <option value="Seicento">Seicento</option>
      <option value="Siena">Siena</option>
      <option value="Stilo">Stilo</option>
      <option value="Tempra">Tempra</option>
      <option value="Tipo">Tipo</option>
      <option value="Ulysse">Ulysse</option>
      <option value="Uno">Uno</option>
      <option value="Viaggio">Viaggio</option>
      <option value="X1/9">X1/9</option>
    </optgroup>

    <optgroup id="m_cars_mercedes" label="Cars (Mercedes)">
      <option value="C Coupe">C Coupe</option>
      <option value="CL">CL</option>
      <option value="CLA">CLA</option>
      <option value="CLC">CLC</option>
      <option value="CLS">CLS</option>
      <option value="E Coupe">E Coupe</option>
      <option value="EQ*">EQ*</option>
      <option value="GL">GL</option>
      <option value="GLA">GLA</option>
      <option value="GLB">GLB</option>
      <option value="GLC">GLC</option>
      <option value="GLE">GLE</option>
      <option value="GLK">GLK</option>
      <option value="GLS">GLS</option>
      <option value="Klasa A">Klasa A</option>
      <option value="Klasa B">Klasa B</option>
      <option value="Klasa C">Klasa C</option>
      <option value="Klasa E">Klasa E</option>
      <option value="Klasa G">Klasa G</option>
      <option value="Klasa S">Klasa S</option>
      <option value="Klasa R">Klasa R</option>
      <option value="ML">ML</option>
      <option value="S Coupe">S Coupe</option>
      <option value="SLC">SLC</option>
      <option value="SLK">SLK</option>
    </optgroup>

    <optgroup id="m_vans_mercedes" label="Vans (Mercedes)">
<option value="Citan">Citan</option>
<option value="MB100">MB100</option>
<option value="Sprinter">Sprinter</option>
<option value="TN">TN</option>
<option value="Vito">Vito</option>
    </optgroup>


    <optgroup id="m_vans_peugeot"  label="Vans (Peugeot)">
      <option value="J5">J5</option>
      <option value="J7">J7</option>
      <option value="J9">J9</option>
      <option value="Bipper">Bipper</option>
      <option value="Partner I">Partner I</option>
      <option value="Partner II">Partner II</option>
      <option value="Partner III">Partner III</option>
      <option value="Expert I">Expert I</option>
      <option value="Expert II">Expert II</option>
      <option value="Expert III">Expert III</option>
      <option value="Boxer I">Boxer I</option>
      <option value="Boxer II">Boxer II</option>
    </optgroup>


    <optgroup id="m_motorbikes_suzuki" label="motorbikes (Suzuki)">
      <option value"A 100">A 100</option>
      <option value"DL 1000">DL 1000</option>
      <option value"DL 650">DL 650</option>
      <option value"EN 125">EN 125</option>
      <option value"FXR 150">FXR 150</option>
      <option value"GSF Bandit">GSF Bandit</option>
      <option value"GSX1100F Katana">GSX1100F Katana</option>
      <option value"GN 125">GN 125</option>
      <option value"GN 250">GN 250</option>
      <option value"GN 400">GN 400</option>
      <option value"Goose 350">Goose 350</option>
      <option value"GP 100">GP 100</option>
      <option value"GR Tempter">GR Tempter</option>
      <option value"GS 1000">GS 1000</option>
      <option value"GS 1100">GS 1100</option>
      <option value"GS 1150">GS 1150</option>
      <option value"GS 125">GS 125</option>
      <option value"GS 250">GS 250</option>
      <option value"GS 300">GS 300</option>
      <option value"GS 400">GS 400</option>
      <option value"GS 450">GS 450</option>
      <option value"GS 500">GS 500</option>
      <option value"GS 550">GS 550</option>
      <option value"GS 650">GS 650</option>
      <option value"GS 700">GS 700</option>
      <option value"GS 750">GS 750</option>
      <option value"GS 850">GS 850</option>
      <option value"GSV-R">GSV-R</option>
      <option value"GSX 1100">GSX 1100</option>
      <option value"GSX 1100G">GSX 1100G</option>
      <option value"GSX 1200">GSX 1200</option>
      <option value"GSX 1400">GSX 1400</option>
      <option value"GSX 250 Across">GSX 250 Across</option>
      <option value"GSX 400">GSX 400</option>
      <option value"GSX 400 F">GSX 400 F</option>
      <option value"GSX 550">GSX 550</option>
      <option value"GSX 600F">GSX 600F</option>
      <option value"GSX 750">GSX 750</option>
      <option value"GSX 750F">GSX 750F</option>
      <option value"GSX-R 1000">GSX-R 1000</option>
      <option value"GSX-R 1100">GSX-R 1100</option>
      <option value"GSX-R 250">GSX-R 250</option>
      <option value"GSX-R 400">GSX-R 400</option>
      <option value"GSX-R 50">GSX-R 50</option>
      <option value"GSX-R 600">GSX-R 600</option>
      <option value"GSX-R 750">GSX-R 750</option>
      <option value"GSX-R 1300 Hayabusa">GSX-R 1300 Hayabusa</option>
      <option value"GT 125">GT 125</option>
      <option value"GT 185">GT 185</option>
      <option value"GT 200">GT 200</option>
      <option value"GT 250">GT 250</option>
      <option value"GT 380">GT 380</option>
      <option value"GT 500">GT 500</option>
      <option value"GT 550">GT 550</option>
      <option value"GT 750">GT 750</option>
      <option value"GT 80">GT 80</option>
      <option value"GW 250">GW 250</option>
      <option value"GV 1400">GV 1400</option>
    </optgroup>


    <optgroup id="m_motorbikes_wsk" label="motorbikes (WSK)">
      <option value"Barron 125">Barron 125</option>
      <option value"M06">M06</option>
      <option value"M06 B1">M06 B1</option>
      <option value"M06 B3">M06 B3</option>
      <option value"M06 B3 Bąk">M06 B3 Bąk</option>
      <option value"M06 B3 Gil">M06 B3 Gil</option>
      <option value"M06 B3 Kos">M06 B3 Kos</option>
      <option value"M06 B3 Kraska">M06 B3 Kraska</option>
      <option value"M06 B3 Lelek">M06 B3 Lelek</option>
      <option value"M06 L">M06 L</option>
      <option value"M06 Z">M06 Z</option>
      <option value"M06 Z2">M06 Z2</option>
      <option value"M06-64">M06-64</option>
      <option value"M21W2">M21W2</option>
      <option value"M21W2 Dudek">M21W2 Dudek</option>
      <option value"M21W2 Ex">M21W2 Ex</option>
      <option value"M21W2 Kobuz">M21W2 Kobuz</option>
      <option value"M21W2 Perkoz">  M21W2 Perkoz</option>
      <option value"M21W2 S2">M21W2 S2</option>
      <option value"M21W2 Sport">M21W2 Sport</option>
      <option value"M21W2 Sport Ex">M21W2 Sport Ex</option>
    </optgroup>


    <optgroup id="m_quads_honda" label="quads (Honda)">
      <option value"TRX 250 TM">TRX 250 TM</option>
      <option value"TRX 680FA">TRX 680FA</option>
      <option value"TRX 500 FA Foreman">TRX 500 FA Foreman</option>
      <option value"TRX 680 Rincon">TRX 680 Rincon</option>
      <option value"TRX 90">TRX 90</option>
      <option value"TRX 420FA">TRX 420FA</option>
    </optgroup>


    <optgroup id="m_quads_suzuki" label="quads (Suzuki)">
      <option value"Eiger 400 4X4">Eiger 400 4X4</option>
      <option value"KingQuad 400AS">KingQuad 400AS</option>
      <option value"KingQuad 400AS Camo">KingQuad 400AS Camo</option>
      <option value"KingQuad 400FS">KingQuad 400FS</option>
      <option value"KingQuad 400FS Camo">KingQuad 400FS Camo</option>
      <option value"KingQuad 450AXi">KingQuad 450AXi</option>
      <option value"KingQuad 450AXi 4x4 Camo">KingQuad 450AXi 4x4 Camo</option>
      <option value"KingQuad 500AXi">KingQuad 500AXi</option>
      <option value"KingQuad 500AXi Power Steering">KingQuad 500AXi Power Steering</option>
      <option value"KingQuad 700">KingQuad 700</option>
      <option value"KingQuad 750AXi">KingQuad 750AXi</option>
      <option value"KingQuad 750AXi Camo">KingQuad 750AXi Camo</option>
      <option value"KingQuad 750AXi Limited">KingQuad 750AXi Limited</option>
      <option value"KingQuad 750AXi Power Steering">KingQuad 750AXi Power Steering</option>
      <option value"KingQuad 750AXi Rockstar">KingQuad 750AXi Rockstar</option>
      <option value"LT-R 450 QuadRacer">LT-R 450 QuadRacer</option>
      <option value"Ozark 250">Ozark 250</option>
      <option value"QuadRacer R450">QuadRacer R450</option>
      <option value"QuadRacer R450 Limited Edition">QuadRacer R450 Limited Edition</option>
      <option value"QuadSport Z250">QuadSport Z250</option>
      <option value"QuadSport Z400">QuadSport Z400</option>
      <option value"QuadSport Z400 Limited">  QuadSport Z400 Limited</option>
      <option value"QuadSport Z50">  QuadSport Z50</option>
      <option value"QuadSport Z50 Special Edition">QuadSport Z50 Special Edition</option>
      <option value"QuadSport Z90">QuadSport Z90</option>
      <option value"QuadSport Z90 Special Edition">QuadSport Z90 Special Edition</option>
    </optgroup>


    <optgroup id="m_lorries_jelcz" label="lorries (Jelcz)">
      <option value"315">315</option>
      <option value"316">316</option>
      <option value"317">317</option>
      <option value"325">325</option>
      <option value"415">415</option>
      <option value"416">416</option>
      <option value"417">417</option>
      <option value"420">420</option>
      <option value"422">422</option>
      <option value"423">423</option>
      <option value"620">620</option>
      <option value"622">622</option>
      <option value"640">640</option>
      <option value"842">842</option>
      <option value"Żubr A80">Żubr A80</option>
    </optgroup>


    <optgroup id="m_lorries_mercedes" label="lorries (Mercedes)">
      <option value"Actros">Actros</option>
      <option value"Antos">Antos</option>
      <option value"Atego">Atego</option>
      <option value"Arocs">Arocs</option>
      <option value"Axor">Axor</option>
      <option value"Econic">  Econic</option>
      <option value"L3000">L3000</option>
      <option value"T2">T2</option>
      <option value"Unimog">Unimog</option>
      <option value"Vario">Vario</option>
      <option value"Zetros">Zetros</option>
    </optgroup>


    <optgroup id="m_buses_jelcz" label="buses (Jelcz)">
      <option value"014 Lux">014 Lux</option>
      <option value"021">021</option>
      <option value"039">039</option>
      <option value"043">043</option>
      <option value"080">080</option>
      <option value"120M">120M</option>
      <option value"120M">120M</option>
      <option value"120M/3">120M/3</option>
      <option value"120MB">120MB</option>
      <option value"120MD">120MD</option>
      <option value"120MM">120MM</option>
      <option value"120MM/1">120MM/1</option>
      <option value"120MM/1">120MM/1</option>
      <option value"120MM/2">120MM/2</option>
      <option value"120MV">120MV</option>
      <option value"272 MEX">272 MEX</option>
      <option value"AP-02">AP-02</option>
      <option value"D120">D120</option>
      <option value"L081MB Vero">L081MB Vero</option>
      <option value"L11">L11</option>
      <option value"L11">L11</option>
      <option value"L120">L120</option>
      <option value"M070">M070</option>
      <option value"M081MB Vero">M081MB Vero</option>
      <option value"M083C Libero">M083C Libero</option>
      <option value"M101I Salus">M101I Salus</option>
      <option value"M11">M11</option>
      <option value"M120I Supero">M120I Supero</option>
      <option value"M120M/4 Supero CNG">M120M/4 Supero CNG</option>
      <option value"M120NM">M120NM</option>
      <option value"M121I Mastero">M121I Mastero</option>
      <option value"M121M">M121M</option>
      <option value"M121MB">M121MB</option>
      <option value"M125M Vecto">M125M Vecto</option>
      <option value"M125M/4 CNG Vecto">M125M/4 CNG Vecto</option>
      <option value"M180">M180</option>
      <option value"M181M">M181M</option>
      <option value"M181MB">M181MB</option>
      <option value"M181MB3 Tantus">M181MB3 Tantus</option>
      <option value"M182MB">M182MB</option>
      <option value"MAT Oławka">MAT Oławka</option>
      <option value"PR100">  PR100</option>
      <option value"PR110">PR110</option>
      <option value"PR110D">PR110D</option>
      <option value"PR110D">PR110D</option>
      <option value"PR110MM">PR110MM</option>
      <option value"T081MB Vero	">T081MB Vero	</option>
      <option value"T120">T120</option>
      <option value"T120">T120</option>
      <option value"T120/3">T120/3</option>
      <option value"T120M">T120M</option>
      <option value"T120MB">T120MB</option>
    </optgroup>


    <optgroup id="m_buses_mercedes" label="buses (Mercedes)">
      <option value="O302">O302</option>
      <option value="O303">O303</option>
      <option value="O305">O305</option>
      <option value="O350">O350</option>
      <option value="O404">O404</option>
      <option value="O407">O407</option>
      <option value="O408">O408</option>
      <option value="O560">O560</option>
      <option value="O580">O580</option>
    </optgroup>

    <optgroup id="m_agricultural_mercedes" label="agricultural (Mercedes)">
      <option value="Trac 65/70">Trac 65/70</option>
      <option value="Trac 700">Trac 700</option>
      <option value="Trac 800">Trac 800</option>
      <option value="Trac 900">Trac 900</option>
      <option value="Trac 1000">Trac 1000</option>
      <option value="Trac 1100">Trac 1100</option>
      <option value="Trac 1300">Trac 1300</option>
      <option value="Trac 1400">Trac 1400</option>
      <option value="Trac 1500">Trac 1500</option>
      <option value="Trac 1600">Trac 1600</option>
      <option value="Trac 1800">Trac 1800</option>
    </optgroup>

    <optgroup id="m_agricultural_urses" label="agricultural (Ursus)">
      <option value="1002">1002</option>
      <option value="1004">1004</option>
      <option value="1012">1012</option>
      <option value="1014">1014</option>
      <option value="1032">1032</option>
      <option value="1034">1034</option>
      <option value="1132">1132</option>
      <option value="1134">1134</option>
      <option value="1201">1201</option>
      <option value="1204">1204</option>
      <option value="1222">1222</option>
      <option value="1224">1224</option>
      <option value="1234">1234</option>
      <option value="1434">1434</option>
      <option value="1604">1604</option>
      <option value="1614">1614</option>
      <option value="1634">1634</option>
      <option value="1674 Forte">1674 Forte</option>
      <option value="2812">2812</option>
      <option value="3512">3512</option>
      <option value="3514">3514</option>
      <option value="3702">3702</option>
      <option value="3702 Piko">3702 Piko</option>
      <option value="3722">3722</option>
      <option value="3724">3724</option>
      <option value="3724 Piko">3724 Piko</option>
      <option value="4512">4512</option>
      <option value="4514">4514</option>
      <option value="5312">5312</option>
      <option value="5314">5314</option>
      <option value="532">532</option>
      <option value="534">534</option>
      <option value="5524 Mido">5524 Mido</option>
      <option value="5712">5712</option>
      <option value="5714">5714</option>
      <option value="6012">6012</option>
      <option value="6014">6014</option>
      <option value="6614">6614</option>
      <option value="6824 Mido">6824 Mido</option>
      <option value="912">912</option>
      <option value="914">914</option>
      <option value="932">932</option>
      <option value="934">934</option>
      <option value="C-308">C-308</option>
      <option value="C-3110">C-3110</option>
      <option value="C-325">C-325</option>
      <option value="C-328">C-328</option>
      <option value="C-330">C-330</option>
      <option value="C-330M">C-330M</option>
      <option value="C-335">C-335</option>
      <option value="C-335M">C-335M</option>
      <option value="C-350">C-350</option>
      <option value="C-355">C-355</option>
      <option value="C-355M">C-355M</option>
      <option value="C-360">C-360</option>
      <option value="C-360-3P">C-360-3P</option>
      <option value="C-362">C-362</option>
      <option value="C-385">C-385</option>
      <option value="C-385A">C-385A</option>
      <option value="C-4011">C-4011</option>
      <option value="C-45">C-45</option>
      <option value="C-451">C-451</option>
      <option value="M87U">M87U</option>
      <option value="MF 235">MF 235</option>
      <option value="MF 255">MF 255</option>
      <option value="MF 265">MF 265</option>
      <option value="MF 275">MF 275</option>
      <option value="MF 535">MF 535</option>
      <option value="MF 555">MF 555</option>
      <option value="MF 565">MF 565</option>
      <option value="MF 575">MF 575</option>
      <option value="MF 590">MF 590</option>
    </optgroup>
  </select>
</div>

<div>
<label><span style="color:red;">*</span> Year of Production:</label>
<input id="yr_of_production" type="number" name="year_of_production" class="yearpicker" maxlength="5"  required>
</div>

<div>
<label>Engine Capacity:</label>
<input type="text" name="engine_capacity">
</div>

<div>
<label>Power:</label>
<input type="text" name="engine_power" >
</div>
<!-- first row -->






<!-- second row -->
<div>
<label>Fuel Type:</label>
<select  name="fuel_type">
  <?php //FuelType(); ?>
  <option value=""></option>
  <option value="petrol">petrol</option>
<option value="diesel">diesel</option>
<option value="hybrid petrol">hybrid petrol</option>
<option value="hybrid diesel">hybrid diesel</option>
<option value="gasoline">gasoline</option>
<option value="electric">electric</option>
</select>
</div>


<div>
<label>Transmission:</label>
  <select  name="transmission">
    <?php //Transmission(); ?>
    <option value=""></option>
    <option value="automatic">automatic</option>
    <option value="manual">manual</option>
</select>
</div>

<div>
  <label>Drive:</label>
  <select  name="drive">
    <?php //Drive(); ?>
    <option value=""></option>
    <option value="AWD/4WD">AWD/4WD</option>
<option value="Front Wheel Drive">Front Wheel Drive</option>
<option value="Rear Wheel Drive">Rear Wheel Drive</option>
  </select>
</div>

<div>
<label>Max Speed in km/h:</label>
<input type="number" name="max_speed" min="0" maxlength="11" >
</div>

<div>
<label>Number of Doors:</label>
  <select  name="no_of_doors">
    <?php// NoofDoors(); ?>
    <option value=""></option>
    <option value="0">0</option>
    <option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6 and more">6 and more</option>

</select>
</div>

<div>
<label>Number of Seats:</label>
  <select  name="no_of_seats">
    <?php //NoofSeats(); ?>
    <option value=""></option>
    <?php for ($i=0; $i < 101; $i++)
    {
      echo "<option value='".$i."'>".$i."</option>";
    } ?>
</select>
</div>
<!-- second row -->














<div >
<label>Mileage in km/h:</label>
<input type="number" name="mileage" min="0" maxlength="11">
</div>


<div>
<label>Country of Origin:</label>
<select name="country_of_origin" >
<option value=""></option>
<option value="Albania">Albania</option>
<option value="Andorra">Andorra</option>
<option value="Armenia">Armenia</option>
<option value="Austria">Austria</option>
<option value="Azerbaijan">Azerbaijan</option>
<option value="Belarus">Belarus</option>
<option value="Belgium">Belgium</option>
<option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
<option value="Bulgaria">Bulgaria</option>
<option value="Croatia">Croatia</option>
<option value="Cyprus">Cyprus</option>
<option value="Czechia">Czechia</option>
<option value="Denmark">Denmark</option>
<option value="Estonia">Estonia</option>
<option value="Finland">Finland</option>
<option value="France">France</option>
<option value="Georgia">Georgia</option>
<option value="Germany">Germany</option>
<option value="Greece">Greece</option>
<option value="Hungary">Hungary</option>
<option value="Iceland">Iceland</option>
<option value="Ireland">Ireland</option>
<option value="Israel">Israel</option>
<option value="Italy">Italy</option>
<option value="Kazakhstan">Kazakhstan</option>
<option value="Kyrgyzstan">Kyrgyzstan</option>
<option value="Latvia">Latvia</option>
<option value="Lithuania">Lithuania</option>
<option value="Luxembourg">Luxembourg</option>
<option value="Malta">Malta</option>
<option value="Monaco">Monaco</option>
<option value="Montenegro">Montenegro</option>
<option value="Netherlands">Netherlands</option>
<option value="North Macedonia">North Macedonia</option>
<option value="Norway">Norway</option>
<option value="Poland">Poland</option>
<option value="Portugal">Portugal</option>
<option value="Republic of Moldova">Republic of Moldova</option>
<option value="Romania">Romania</option>
<option value="Russian Federation">Russian Federation</option>
<option value="San Marino">San Marino</option>
<option value="Serbia">Serbia</option>
<option value="Slovakia">Slovakia</option>
<option value="Slovenia">Slovenia</option>
<option value="Spain">Spain</option>
<option value="Sweden">Sweden</option>
<option value="Switzerland">Switzerland</option>
<option value="Tajikistan">Tajikistan</option>
<option value="Turkey">Turkey</option>
<option value="Turkmenistan">Turkmenistan</option>
<option value="Ukraine">Ukraine</option>
<option value="United Kingdom">United Kingdom</option>
<option value="Uzbekistan">Uzbekistan</option>
</select>
</div>
<div>
<label>Estimated Value in $(dollars):</label>
<input type="number" name="estimated_value" min="0" maxlength="10">
</div>
<div>
<label>Year of Purchase by current owner:</label>
<input type="number" name="y_o_p_b_c_o" class="yearpicker">
</div>
<div>
<label><span style="color:red;">*</span> Location - voivodship:</label>
<select id="loc_voivodship" name="location_voivodship" required>
<option value=""></option>
<option value="dolnośląskie">dolnośląskie</option>
<option value="kujawsko-pomorskie">kujawsko-pomorskie</option>
<option value="lubelskie">lubelskie</option>
<option value="lubuskie">lubuskie</option>
<option value="łódzkie">łódzkie</option>
<option value="małopolskie">małopolskie</option>
<option value="mazowieckie">mazowieckie</option>
<option value="opolskie">opolskie</option>
<option value="podkarpackie">podkarpackie</option>
<option value="podlaskie">podlaskie</option>
<option value="pomorskie">pomorskie</option>
<option value="śląskie">śląskie</option>
<option value="świętokrzyskie">świętokrzyskie</option>
<option value="warmińsko-mazurskie">warmińsko-mazurskie</option>
<option value="wielkopolskie">wielkopolskie</option>
<option value="zachodnio-pomorskie">zachodnio-pomorskie</option>
</select>
</div>
<div>
<label>Location - district:</label>
<select name="location_district">
<option value=""></option>
<option value="bolesławiecki">bolesławiecki</option>
<option value="dzierżoniowski">dzierżoniowski</option>
<option value="głogowski">głogowski</option>
<option value="górowski">górowski</option>
<option value="jaworski">jaworski</option>
<option value="Jelenia Góra">Jelenia Góra</option>
<option value="kamiennogórski">kamiennogórski</option>
<option value="karkonoski">karkonoski</option>
<option value="kłodzki">kłodzki</option>
<option value="Legnica">Legnica</option>
<option value="legnicki">legnicki</option>
<option value="lubański">lubański</option>
<option value="lubiński">lubiński</option>
<option value="lwówecki">lwówecki</option>
<option value="milicki">milicki</option>
<option value="oleśnicki">oleśnicki</option>
<option value="oławski">oławski</option>
<option value="polkowicki">polkowicki</option>
<option value="strzeliński">strzeliński</option>
<option value="średzki">średzki</option>
<option value="świdnicki">świdnicki</option>
<option value="trzebnicki">trzebnicki</option>
<option value="Wałbrzych">Wałbrzych</option>
<option value="wałbrzyski">wałbrzyski</option>
<option value="wołowski">wołowski</option>
<option value="Wrocław">Wrocław</option>
<option value="wrocławski">wrocławski</option>
<option value="ząbkowicki">ząbkowicki</option>
<option value="zgorzelecki">zgorzelecki</option>
<option value="złotoryjski">złotoryjski</option>
<option value="aleksandrowski">aleksandrowski</option>
<option value="brodnicki">brodnicki</option>
<option value="bydgoski">bydgoski</option>
<option value="Bydgoszcz">Bydgoszcz</option>
<option value="chełmiński">chełmiński</option>
<option value="golubsko-dobrzyński">golubsko-dobrzyński</option>
<option value="Grudziądz">Grudziądz</option>
<option value="grudziądzki">grudziądzki</option>
<option value="inowrocławski">inowrocławski</option>
<option value="lipnowski">lipnowski</option>
<option value="mogileński">mogileński</option>
<option value="nakielski">nakielski</option>
<option value="radziejowski">radziejowski</option>
<option value="rypiński">rypiński</option>
<option value="sępoleński">sępoleński</option>
<option value="świecki">świecki</option>
<option value="Toruń">Toruń</option>
<option value="toruński">toruński</option>
<option value="tucholski">tucholski</option>
<option value="wąbrzeski">wąbrzeski</option>
<option value="Włocławek">Włocławek</option>
<option value="włocławski">włocławski</option>
<option value="żniński">żniński</option>

<option value="bialski">bialski</option>
<option value="Biała Podlaska">Biała Podlaska</option>
<option value="biłgorajski">biłgorajski</option>
<option value="Chełm">Chełm</option>
<option value="chełmski">chełmski</option>
<option value="hrubieszowski">hrubieszowski</option>
<option value="janowski">janowski</option>
<option value="krasnostawski">krasnostawski</option>
<option value="kraśnicki">kraśnicki</option>
<option value="lubartowski">lubartowski</option>
<option value="lubelski">lubelski</option>
<option value="Lublin">Lublin</option>
<option value="łęczyński">łęczyński</option>
<option value="łukowski">łukowski</option>
<option value="opolski">opolski</option>
<option value="parczewski">parczewski</option>
<option value="puławski">puławski</option>
<option value="radzyński">radzyński</option>
<option value="rycki">rycki</option>
<option value="świdnicki">świdnicki</option>
<option value="tomaszowski">tomaszowski</option>
<option value="włodawski">włodawski</option>
<option value="zamojski">zamojski</option>
<option value="Zamość">Zamość</option>
<option value="gorzowski">gorzowski</option>
<option value="Gorzów Wielkopolski">Gorzów Wielkopolski</option>
<option value="krośnieński">krośnieński</option>
<option value="międzyrzecki">międzyrzecki</option>
<option value="nowosolski">nowosolski</option>
<option value="słubicki">słubicki</option>
<option value="strzelecko-drezdenecki">strzelecko-drezdenecki</option>
<option value="sulęciński">sulęciński</option>
<option value="świebodziński">świebodziński</option>
<option value="wschowski">wschowski</option>
<option value="Zielona Góra">Zielona Góra</option>
<option value="zielonogórski">zielonogórski</option>
<option value="żagański">żagański</option>
<option value="żarski">żarski</option>
<option value="bełchatowski">bełchatowski</option>
<option value="brzeziński">brzeziński</option>
<option value="kutnowski">kutnowski</option>
<option value="łaski">łaski</option>
<option value="łęczycki">łęczycki</option>
<option value="łowicki">łowicki</option>
<option value="łódzki wschodni">łódzki wschodni</option>
<option value="Łódź">Łódź</option>
<option value="opoczyński">opoczyński</option>
<option value="pabianicki">pabianicki</option>
<option value="pajęczański">pajęczański</option>
<option value="piotrkowski">piotrkowski</option>
<option value="Piotrków Trybunalski">Piotrków Trybunalski</option>
<option value="poddębicki">poddębicki</option>
<option value="radomszczański">radomszczański</option>
<option value="rawski">rawski</option>
<option value="sieradzki">sieradzki</option>
<option value="Skierniewice">Skierniewice</option>
<option value="skierniewicki">skierniewicki</option>
<option value="tomaszowski">tomaszowski</option>
<option value="wieluński">wieluński</option>
<option value="wieruszowski">wieruszowski</option>
<option value="zduńskowolski">zduńskowolski</option>
<option value="zgierski">zgierski</option>
<option value="bocheński">bocheński</option>
<option value="brzeski">brzeski</option>
<option value="chrzanowski">chrzanowski</option>
<option value="dąbrowski">dąbrowski</option>
<option value="gorlicki">gorlicki</option>
<option value="krakowski">krakowski</option>
<option value="Kraków">Kraków</option>
<option value="limanowski">limanowski</option>
<option value="miechowski">miechowski</option>
<option value="myślenicki">myślenicki</option>
<option value="nowosądecki">nowosądecki</option>
<option value="nowotarski">nowotarski</option>
<option value="Nowy Sącz">Nowy Sącz</option>
<option value="olkuski">olkuski</option>
<option value="oświęcimski">oświęcimski</option>
<option value="proszowicki">proszowicki</option>
<option value="suski">suski</option>
<option value="tarnowski">tarnowski</option>
<option value="Tarnów">Tarnów</option>
<option value="tatrzański">tatrzański</option>
<option value="wadowicki">wadowicki</option>
<option value="wielicki">wielicki</option>
<option value="białobrzeski">białobrzeski</option>
<option value="ciechanowski">ciechanowski</option>
<option value="garwoliński">garwoliński</option>
<option value="gostyniński">gostyniński</option>
<option value="grodziski">grodziski</option>
<option value="grójecki">grójecki</option>
<option value="kozienicki">kozienicki</option>
<option value="legionowski">legionowski</option>
<option value="lipski">lipski</option>
<option value="łosicki">łosicki</option>
<option value="makowski">makowski</option>
<option value="miński">miński</option>
<option value="mławski">mławski</option>
<option value="nowodworski">nowodworski</option>
<option value="ostrołęcki">ostrołęcki</option>
<option value="Ostrołęka">Ostrołęka</option>
<option value="ostrowski">ostrowski</option>
<option value="otwocki">otwocki</option>
<option value="piaseczyński">piaseczyński</option>
<option value="Płock">Płock</option>
<option value="płocki">płocki</option>
<option value="płoński">płoński</option>
<option value="pruszkowski">pruszkowski</option>
<option value="przasnyski">przasnyski</option>
<option value="przysuski">przysuski</option>
<option value="pułtuski">pułtuski</option>
<option value="Radom">Radom</option>
<option value="radomski">radomski</option>
<option value="Siedlce">Siedlce</option>
<option value="siedlecki">siedlecki</option>
<option value="sierpecki">sierpecki</option>
<option value="sochaczewski">sochaczewski</option>
<option value="sokołowski">sokołowski</option>
<option value="szydłowiecki">szydłowiecki</option>
<option value="Warszawa">Warszawa</option>
<option value="warszawski zachodni">warszawski zachodni</option>
<option value="węgrowski">węgrowski</option>
<option value="wołomiński">wołomiński</option>
<option value="wyszkowski">wyszkowski</option>
<option value="zwoleński">zwoleński</option>
<option value="żuromiński">żuromiński</option>
<option value="żyrardowski">żyrardowski</option>
<option value="brzeski">brzeski</option>
<option value="głubczycki">głubczycki</option>
<option value="kędzierzyńsko-kozielski">kędzierzyńsko-kozielski</option>
<option value="kluczborski">kluczborski</option>
<option value="krapkowicki">krapkowicki</option>
<option value="namysłowski">namysłowski</option>
<option value="nyski">nyski</option>
<option value="oleski">oleski</option>
<option value="Opole">Opole</option>
<option value="opolski">opolski</option>
<option value="prudnicki">prudnicki</option>
<option value="strzelecki">strzelecki</option>
<option value="bieszczadzki">bieszczadzki</option>
<option value="brzozowski">brzozowski</option>
<option value="dębicki">dębicki</option>
<option value="jarosławski">jarosławski</option>
<option value="jasielski">jasielski</option>
<option value="kolbuszowski">kolbuszowski</option>
<option value="Krosno">Krosno</option>
<option value="krośnieński">krośnieński</option>
<option value="leski">leski</option>
<option value="leżajski">leżajski</option>
<option value="lubaczowski">lubaczowski</option>
<option value="łańcucki">łańcucki</option>
<option value="mielecki">mielecki</option>
<option value="niżański">niżański</option>
<option value="przemyski">przemyski</option>
<option value="Przemyśl">Przemyśl</option>
<option value="przeworski">przeworski</option>
<option value="ropczycko-sędziszowski">ropczycko-sędziszowski</option>
<option value="rzeszowski">rzeszowski</option>
<option value="Rzeszów">Rzeszów</option>
<option value="sanocki">sanocki</option>
<option value="stalowowolski">stalowowolski</option>
<option value="strzyżowski">strzyżowski</option>
<option value="Tarnobrzeg">Tarnobrzeg</option>
<option value="tarnobrzeski">tarnobrzeski</option>
<option value="augustowski">augustowski</option>
<option value="białostocki">białostocki</option>
<option value="Białystok">Białystok</option>
<option value="bielski">bielski</option>
<option value="grajewski">grajewski</option>
<option value="hajnowski">hajnowski</option>
<option value="kolneński">kolneński</option>
<option value="Łomża">Łomża</option>
<option value="łomżyński">łomżyński</option>
<option value="moniecki">moniecki</option>
<option value="sejneński">sejneński</option>
<option value="siemiatycki">siemiatycki</option>
<option value="sokólski">sokólski</option>
<option value="suwalski">suwalski</option>
<option value="Suwałki">Suwałki</option>
<option value="wysokomazowiecki">wysokomazowiecki</option>
<option value="zambrowski">zambrowski</option>
<option value="bytowski">bytowski</option>
<option value="chojnicki">chojnicki</option>
<option value="człuchowski">człuchowski</option>
<option value="Gdańsk">Gdańsk</option>
<option value="gdański">gdański</option>
<option value="Gdynia">Gdynia</option>
<option value="kartuski">kartuski</option>
<option value="kościerski">kościerski</option>
<option value="kwidzyński">kwidzyński</option>
<option value="lęborski">lęborski</option>
<option value="malborski">malborski</option>
<option value="nowodworski">nowodworski</option>
<option value="pucki">pucki</option>
<option value="Słupsk">Słupsk</option>
<option value="słupski">słupski</option>
<option value="Sopot">Sopot</option>
<option value="starogardzki">starogardzki</option>
<option value="sztumski">sztumski</option>
<option value="tczewski">tczewski</option>
<option value="wejherowski">wejherowski</option>
<option value="będziński">będziński</option>
<option value="bielski">bielski</option>
<option value="Bielsko-Biała">Bielsko-Biała</option>
<option value="bieruńsko-lędziński">bieruńsko-lędziński</option>
<option value="Bytom">Bytom</option>
<option value="Chorzów">Chorzów</option>
<option value="cieszyński">cieszyński</option>
<option value="Częstochowa">Częstochowa</option>
<option value="częstochowski">częstochowski</option>
<option value="Dąbrowa Górnicza">Dąbrowa Górnicza</option>
<option value="Gliwice">Gliwice</option>
<option value="gliwicki">gliwicki</option>
<option value="Jastrzębie-Zdrój">Jastrzębie-Zdrój</option>
<option value="Jaworzno">Jaworzno</option>
<option value="Katowice">Katowice</option>
<option value="kłobucki">kłobucki</option>
<option value="lubliniecki">lubliniecki</option>
<option value="mikołowski">mikołowski</option>
<option value="Mysłowice">Mysłowice</option>
<option value="myszkowski">myszkowski</option>
<option value="Piekary Śląskie">Piekary Śląskie</option>
<option value="pszczyński">pszczyński</option>
<option value="raciborski">raciborski</option>
<option value="Ruda Śląska">Ruda Śląska</option>
<option value="rybnicki">rybnicki</option>
<option value="Rybnik">Rybnik</option>
<option value="Siemianowice Śląskie">Siemianowice Śląskie</option>
<option value="Sosnowiec">Sosnowiec</option>
<option value="Świętochłowice">Świętochłowice</option>
<option value="tarnogórski">tarnogórski</option>
<option value="Tychy">Tychy</option>
<option value="wodzisławski">wodzisławski</option>
<option value="Zabrze">Zabrze</option>
<option value="zawierciański">zawierciański</option>
<option value="Żory">Żory</option>
<option value="żywiecki">żywiecki</option>
<option value="buski">buski</option>
<option value="jędrzejowski">jędrzejowski</option>
<option value="kazimierski">kazimierski</option>
<option value="Kielce">Kielce</option>
<option value="kielecki">kielecki</option>
<option value="konecki">konecki</option>
<option value="opatowski">opatowski</option>
<option value="ostrowiecki">ostrowiecki</option>
<option value="pińczowski">pińczowski</option>
<option value="sandomierski">sandomierski</option>
<option value="skarżyski">skarżyski</option>
<option value="starachowicki">starachowicki</option>
<option value="staszowski">staszowski</option>
<option value="włoszczowski">włoszczowski</option>
<option value="bartoszycki">bartoszycki</option>
<option value="braniewski">braniewski</option>
<option value="działdowski">działdowski</option>
<option value="Elbląg">Elbląg</option>
<option value="elbląski">elbląski</option>
<option value="ełcki">ełcki</option>
<option value="giżycki">giżycki</option>
<option value="gołdapski">gołdapski</option>
<option value="iławski">iławski</option>
<option value="kętrzyński">kętrzyński</option>
<option value="lidzbarski">lidzbarski</option>
<option value="mrągowski">mrągowski</option>
<option value="nidzicki">nidzicki</option>
<option value="nowomiejski">nowomiejski</option>
<option value="olecki">olecki</option>
<option value="Olsztyn">Olsztyn</option>
<option value="olsztyński">olsztyński</option>
<option value="ostródzki">ostródzki</option>
<option value="piski">piski</option>
<option value="szczycieński">szczycieński</option>
<option value="węgorzewski">węgorzewski</option>
<option value="chodzieski">chodzieski</option>
<option value="czarnkowsko-trzcianecki">czarnkowsko-trzcianecki</option>
<option value="gnieźnieński">gnieźnieński</option>
<option value="gostyński">gostyński</option>
<option value="grodziski">grodziski</option>
<option value="jarociński">jarociński</option>
<option value="kaliski">kaliski</option>
<option value="Kalisz">Kalisz</option>
<option value="kępiński">kępiński</option>
<option value="kolski">kolski</option>
<option value="Konin">Konin</option>
<option value="koniński">koniński</option>
<option value="kościański">kościański</option>
<option value="krotoszyński">krotoszyński</option>
<option value="leszczyński">leszczyński</option>
<option value="Leszno">Leszno</option>
<option value="międzychodzki">międzychodzki</option>
<option value="nowotomyski">nowotomyski</option>
<option value="obornicki">obornicki</option>
<option value="ostrowski">ostrowski</option>
<option value="ostrzeszowski">ostrzeszowski</option>
<option value="pilski">pilski</option>
<option value="pleszewski">pleszewski</option>
<option value="Poznań">Poznań</option>
<option value="poznański">poznański</option>
<option value="rawicki">rawicki</option>
<option value="słupecki">słupecki</option>
<option value="szamotulski">szamotulski</option>
<option value="średzki">średzki</option>
<option value="śremski">śremski</option>
<option value="turecki">turecki</option>
<option value="wągrowiecki">wągrowiecki</option>
<option value="wolsztyński">wolsztyński</option>
<option value="wrzesiński">wrzesiński</option>
<option value="złotowski">złotowski</option>
<option value="białogardzki">białogardzki</option>
<option value="choszczeński">choszczeński</option>
<option value="drawski">drawski</option>
<option value="goleniowski">goleniowski</option>
<option value="gryficki">gryficki</option>
<option value="gryfiński">gryfiński</option>
<option value="kamieński">kamieński</option>
<option value="kołobrzeski">kołobrzeski</option>
<option value="Koszalin">Koszalin</option>
<option value="koszaliński">koszaliński</option>
<option value="łobeski">łobeski</option>
<option value="myśliborski">myśliborski</option>
<option value="policki">policki</option>
<option value="pyrzycki">pyrzycki</option>
<option value="sławieński">sławieński</option>
<option value="stargardzki">stargardzki</option>
<option value="Szczecin">Szczecin</option>
<option value="szczecinecki">szczecinecki</option>
<option value="świdwiński">świdwiński</option>
<option value="Świnoujście">Świnoujście</option>
<option value="wałecki">wałecki</option>
</select>
</div>
</div>

<div class="form_description">
<div>
  <label>Description of vehicle characteristics:</label>
  <textarea name="d_o_v_c" rows="8" cols="80"></textarea>
</div>

<div>
<label>History and origin of the vehicle:</label>
<textarea name="h_a_o_o_v" rows="8" cols="80"></textarea>
</div>


<div>
<label>Shows, events, rallies, races the vehicle has taken part in:</label>
<textarea name="s_v_h_t_p" rows="8" cols="80"></textarea>
</div>

<div>
<label>Everyday life, use and exploitation of the vehicle, repairs:</label>
<textarea name="u_a_e_o_v" rows="8" cols="80"></textarea>
</div>
<div>
<label>Interesting or pleasant events linked to the vehicle:</label>
<textarea name="i_e_l_t_t_v" rows="8" cols="80"></textarea>
</div>
<div>
<label>The advantages of the vehicle:</label>
<textarea name="advantages_of_vehicle" rows="8" cols="80"></textarea>
</div>
<div>
<label>Problems with the vehicle, repairs, maintenance:</label>
<textarea name="problems_with_vehicle" rows="8" cols="80"></textarea>
</div>
<div>
<label>Announcement - buy, sell, trade, give away:</label>
<textarea name="announcement" rows="8" cols="80"></textarea>
</div>
<div id="mn_photo">
<label>Add the thumbnail photo of the vehicle:</label>
<br>
<span style="color:red;">*</span>
<input class="custom-file-input" type="file" onchange="readURLMainPhoto(this);" name="main_photo" accept="image/png, image/gif, image/jpeg" required>
<br>
<img style="margin-top:1vh;display:none;width:200px;height:200px;object-fit:contain;"id="imgMainPhoto">
<input name="caption_main_photo" style="width:90%;height:4vh;margin-top:1vh;margin-bottom:2vh;" type="text" placeholder="Add a Caption to image (optional)">
</div>
</div>


<div style="margin-top:7vh;">
  <label>Add other photos of the vehicle:(minimum 4)</label>
</div>
<div id="other_photos">
<label></label>
<label></label>
<label></label>
<label></label>
<div class="edit_div">
<span style="color:red;">*</span>
<input  class="custom-file-input" type="file" onchange="readURLOne(this);" accept="image/png, image/gif, image/jpeg" name="photo_one" required>
<div style="display: none;" id="imggOne">
  <img id="imgOne" style="width:200px;height:200px;object-fit:contain;">
  <input name="caption_photo_one" style="width: 90%;margin-top:1vh;margin-bottom:4vh;" type="text" placeholder="Add a Caption to image (optional)">
</div>
</div>

<div class="edit_div">
<span style="color:red;">*</span>
  <input class="custom-file-input" type="file" onchange="readURLTwo(this);" accept="image/png, image/gif, image/jpeg" name="photo_two" required>
  <div style="display: none;" id="imggTwo">
    <img style="display: none;width:200px;height:200px;object-fit:contain;"id="imgTwo">
    <input name="caption_photo_two" style="width: 90%;margin-top:1vh;margin-bottom:4vh;" type="text" placeholder="Add a Caption to image (optional)">
  </div>
</div>
<div class="edit_div">
<span style="color:red;">*</span>
  <input class="custom-file-input" type="file" name="photo_three" onchange="readURLThree(this);" accept="image/png, image/gif, image/jpeg" required>
  <div style=" display: none;" id="imggThree">
<img style="display: none;width:200px;height:200px;object-fit:contain;"id="imgThree">
<input name="caption_photo_three" style="width: 90%;margin-top:1vh;margin-bottom:4vh;" type="text" placeholder="Add a Caption to image (optional)">
  </div>
</div>
<div class="edit_div">
<span style="color:red;">*</span>
  <input class="custom-file-input" type="file" name="photo_four" onchange="readURLFour(this);"
  accept="image/png, image/gif, image/jpeg" required>
<div style="display: none;" id="imggFour">
<img style="display: none;width:200px;height:200px;object-fit:contain;"id="imgFour">
<input name="caption_photo_four" style="width: 90%;margin-top:1vh;margin-bottom:4vh;" type="text" placeholder="Add a Caption to image (optional)">
</div>
</div>
<div class="edit_div" >
<input class="custom-file-input" type="file" name="photo_five" onchange="readURLFive(this);"
accept="image/png, image/gif, image/jpeg">
<div style="display: none;" id="imggFive">
<img style="display: none;width:200px;height:200px;object-fit:contain;"id="imgFive">
<input name="caption_photo_five" style="width: 90%;margin-top:1vh;margin-bottom:4vh;" type="text" placeholder="Add a Caption to image (optional)">
</div>
</div>

<div class="edit_div">
<input class="custom-file-input" type="file" name="photo_six" onchange="readURLSix(this);"
accept="image/png, image/gif, image/jpeg">
<div style="display: none;" id="imggSix">
<img style="display: none;width:200px;height:200px;object-fit:contain;"id="imgSix">
<input name="caption_photo_six" style="width: 90%;margin-top:1vh;margin-bottom:4vh;" type="text" placeholder="Add a Caption to image (optional)">
</div>
</div>

<div class="edit_div">
  <input class="custom-file-input" type="file" name="photo_seven" onchange="readURLSeven(this);"
  accept="image/png, image/gif, image/jpeg">
  <div style="display: none;" id="imggSeven">
<img style="display: none;width:200px;height:200px;object-fit:contain;"id="imgSeven">
<input name="caption_photo_seven" style="width: 90%;margin-top:1vh;margin-bottom:4vh;" type="text" placeholder="Add a Caption to image (optional)">
</div>
  </div>

<div class="edit_div">
<input class="custom-file-input" type="file" name="photo_eight" onchange="readURLEight(this);"
accept="image/png, image/gif, image/jpeg">
  <div style="display: none;" id="imggEight">
<img style="display: none;width:200px;height:200px;object-fit:contain;"id="imgEight">
<input name="caption_photo_eight" style="width: 90%;margin-top:1vh;margin-bottom:4vh;" type="text" placeholder="Add a Caption to image (optional)">
</div>
</div>

<div class="edit_div">
<input class="custom-file-input" type="file" name="photo_nine" onchange="readURLNine(this);"
accept="image/png, image/gif, image/jpeg">
<div style="display: none;" id="imggNine">
  <img style="display: none;width:200px;height:200px;object-fit:contain;"id="imgNine">
<input name="caption_photo_nine" style="width: 90%;margin-top:1vh;margin-bottom:4vh;" type="text" placeholder="Add a Caption to image (optional)">
</div>
</div>

<div class="edit_div">
<input class="custom-file-input" type="file" name="photo_ten" onchange="readURLTen(this);"
accept="image/png, image/gif, image/jpeg">
<div style="display: none;" id="imggTen">
  <img style="display: none;width:200px;height:200px;object-fit:contain;"id="imgTen">
<input name="caption_photo_ten" style="width: 90%;margin-top:1vh;margin-bottom:4vh;" type="text" placeholder="Add a Caption to image (optional)">
</div>
</div>


<div class="edit_div">
<input class="custom-file-input" type="file" name="photo_eleven" onchange="readURLEleven(this);"
accept="image/png, image/gif, image/jpeg">
<div style="display: none;" id="imggEleven">
<img style="display: none;width:200px;height:200px;object-fit:contain;"id="imgEleven">
<input name="caption_photo_eleven" style="width: 90%;margin-top:1vh;margin-bottom:4vh;" type="text" placeholder="Add a Caption to image (optional)">
</div>
</div>

<div class="edit_div">
<input class="custom-file-input" type="file" name="photo_twelve" onchange="readURLTwelve(this);"
accept="image/png, image/gif, image/jpeg">
<div style="display: none;" id="imggTwelve">
<img style="display: none;width:200px;height:200px;object-fit:contain;"id="imgTwelve">
<input name="caption_photo_twelve" style="width: 90%;margin-top:1vh;margin-bottom:4vh;" type="text" placeholder="Add a Caption to image (optional)">
</div>
</div>

<div class="edit_div">
<input class="custom-file-input" type="file" name="photo_thirteen" onchange="readURLThirteen(this);"
accept="image/png, image/gif, image/jpeg">
<div style="display: none;" id="imggThirteen">
<img style="display: none;width:200px;height:200px;object-fit:contain;"id="imgThirteen">
<input name="caption_photo_thirteen" style="width: 90%;margin-top:1vh;margin-bottom:4vh;" type="text" placeholder="Add a Caption to image (optional)">
</div>
</div>


<div class="edit_div">
<input class="custom-file-input" type="file" name="photo_fourteen" onchange="readURLFourteen(this);"
accept="image/png, image/gif, image/jpeg">
<div style="display: none;" id="imggFourteen">
<img style="display: none;width:200px;height:200px;object-fit:contain;"id="imgFourteen">
<input name="caption_photo_fourteen" style="width: 90%;margin-top:1vh;margin-bottom:4vh;" type="text" placeholder="Add a Caption to image (optional)">
</div>
</div>


<div class="edit_div">
<input class="custom-file-input" type="file" name="photo_fifteen" onchange="readURLFifteen(this);"
accept="image/png, image/gif, image/jpeg">
<div style="display: none;" id="imggFifteen">
<img style="display: none;width:200px;height:200px;object-fit:contain;"id="imgFifteen">
<input name="caption_photo_fifteen" style="width: 90%;margin-top:1vh;margin-bottom:4vh;" type="text" placeholder="Add a Caption to image (optional)">
</div>
</div>


  <div class="edit_div">
<input class="custom-file-input" type="file" name="photo_sixteen" onchange="readURLSixteen(this);"
accept="image/png, image/gif, image/jpeg">
<div style="display: none;" id="imggSixteen">
<img style="display: none;width:200px;height:200px;object-fit:contain;"id="imgSixteen">
<input name="caption_photo_sixteen" style="width: 90%;margin-top:1vh;margin-bottom:4vh;" type="text" placeholder="Add a Caption to image (optional)">
</div>
</div>


  <div class="edit_div">
<input class="custom-file-input" type="file" name="photo_seventeen" onchange="readURLSeventeen(this);"
accept="image/png, image/gif, image/jpeg">
<div style="display: none;" id="imggSeventeen">
<img style="display: none;width:200px;height:200px;object-fit:contain;"id="imgSeventeen">
<input name="caption_photo_seventeen" style="width: 90%;margin-top:1vh;margin-bottom:4vh;" type="text" placeholder="Add a Caption to image (optional)">
</div>
</div>



  <div class="edit_div">
<input class="custom-file-input" type="file" name="photo_eighteen" onchange="readURLEighteen(this);" accept="image/png, image/gif, image/jpeg"/>
<div style="display: none;" id="imggEighteen">
<img style="display: none;width:200px;height:200px;object-fit:contain;"id="imgEighteen">
<input name="caption_photo_eighteen" style="width: 90%;margin-top:1vh;margin-bottom:4vh;" type="text" placeholder="Add a Caption to image (optional)">
</div>
</div>


  <div class="edit_div">
<input class="custom-file-input" type="file" name="photo_nineteen" accept="image/png, image/gif, image/jpeg" onchange="readURLNineteen(this);"/>
<div style="display: none;" id="imggNineteen">
<img style="display: none;width:200px;height:200px;object-fit:contain;"id="imgNineteen">
<input name="caption_photo_nineteen" style="width: 90%;margin-top:1vh;margin-bottom:4vh;" type="text" placeholder="Add a Caption to image (optional)">
</div>
</div>

<div class="edit_div">
<input class="custom-file-input" type="file" name="photo_twenty" accept="image/png, image/gif, image/jpeg" onchange="readURLNineteen(this);"/>
<div style="display: none;" id="imggTwenty">
<img style="display: none;width:200px;height:200px;object-fit:contain;"id="imgTwenty">
<input name="caption_photo_twenty" style="width: 90%;margin-top:1vh;margin-bottom:4vh;" type="text" placeholder="Add a Caption to image (optional)">
</div>
</div>


</div>


<div class="checkbox_wrapper">

  <input type="checkbox" name="checkbox" required>
  <p>I declare that the published information does not violate the welfare of other persons. If images of people
  are included in the photos. I declare that I have received their permission for publication
  </p>
</div>
<input class="sss" type="submit" name="submit" value="Submit">
</form>
</section>

<script type="text/javascript">

$('.sss').submit(function()
{
//  if ($('#tov_cat') == '' && $('#brand_cat').val() == '' && $('#yr_of_production').val() == '' && $('#loc_voivodship').val() == '' &&
//$('#imgOne').val() == '')
    $('.loading_screen').show();
});
function readURLMainPhoto(input)
{
  $('#imgMainPhoto').show();
     if (input.files && input.files[0]) {
         var reader = new FileReader();

         reader.onload = function (e) {
             $('#imgMainPhoto')
                 .attr('src', e.target.result);
         };

         reader.readAsDataURL(input.files[0]);
     }
 }


function readURLOne(input)
{
  $('#imgOne').show();
  $('#imggOne').show();
     if (input.files && input.files[0]) {
         var reader = new FileReader();

         reader.onload = function (e) {
             $('#imgOne')
                 .attr('src', e.target.result);
         };

         reader.readAsDataURL(input.files[0]);
     }
 }


function readURLTwo(input)
{
  $('#imgTwo').show();
  $('#imggTwo').show();
     if (input.files && input.files[0]) {
         var reader = new FileReader();

         reader.onload = function (e) {
             $('#imgTwo')
                 .attr('src', e.target.result);
         };

         reader.readAsDataURL(input.files[0]);
     }
 }


function readURLThree(input)
{
  $('#imgThree').show();
  $('#imggThree').show();
     if (input.files && input.files[0]) {
         var reader = new FileReader();

         reader.onload = function (e) {
             $('#imgThree')
                 .attr('src', e.target.result);
         };

         reader.readAsDataURL(input.files[0]);
     }
 }


function readURLFour(input)
{
  $('#imgFour').show();
  $('#imggFour').show();
     if (input.files && input.files[0]) {
         var reader = new FileReader();

         reader.onload = function (e) {
             $('#imgFour')
                 .attr('src', e.target.result);
         };

         reader.readAsDataURL(input.files[0]);
     }
 }


function readURLFive(input)
{
  $('#imgFive').show();
  $('#imggFive').show();
     if (input.files && input.files[0]) {
         var reader = new FileReader();

         reader.onload = function (e) {
             $('#imgFive')
                 .attr('src', e.target.result);
         };

         reader.readAsDataURL(input.files[0]);
     }
 }


function readURLSix(input)
{
  $('#imgSix').show();
  $('#imggSix').show();
     if (input.files && input.files[0]) {
         var reader = new FileReader();

         reader.onload = function (e) {
             $('#imgSix')
                 .attr('src', e.target.result);
         };

         reader.readAsDataURL(input.files[0]);
     }
 }


function readURLSeven(input)
{
  $('#imgSeven').show();
  $('#imggSeven').show();
     if (input.files && input.files[0]) {
         var reader = new FileReader();

         reader.onload = function (e) {
             $('#imgSeven')
                 .attr('src', e.target.result);
         };

         reader.readAsDataURL(input.files[0]);
     }
 }


function readURLEight(input)
{
  $('#imgEight').show();
  $('#imggEight').show();
     if (input.files && input.files[0]) {
         var reader = new FileReader();

         reader.onload = function (e) {
             $('#imgEight')
                 .attr('src', e.target.result);
         };

         reader.readAsDataURL(input.files[0]);
     }
 }


function readURLNine(input)
{
  $('#imgNine').show();
  $('#imggNine').show();
     if (input.files && input.files[0]) {
         var reader = new FileReader();

         reader.onload = function (e) {
             $('#imgNine')
                 .attr('src', e.target.result);
         };

         reader.readAsDataURL(input.files[0]);
     }
 }


function readURLTen(input)
{
  $('#imgTen').show();
  $('#imggTen').show();
     if (input.files && input.files[0]) {
         var reader = new FileReader();

         reader.onload = function (e) {
             $('#imgTen')
                 .attr('src', e.target.result);
         };

         reader.readAsDataURL(input.files[0]);
     }
 }


function readURLEleven(input)
{
  $('#imgEleven').show();
  $('#imggEleven').show();
     if (input.files && input.files[0]) {
         var reader = new FileReader();

         reader.onload = function (e) {
             $('#imgEleven')
                 .attr('src', e.target.result);
         };

         reader.readAsDataURL(input.files[0]);
     }
 }


function readURLTwelve(input)
{
  $('#imgTwelve').show();
  $('#imggTwelve').show();
     if (input.files && input.files[0]) {
         var reader = new FileReader();

         reader.onload = function (e) {
             $('#imgTwelve')
                 .attr('src', e.target.result);
         };

         reader.readAsDataURL(input.files[0]);
     }
 }


function readURLThirteen(input)
{
  $('#imgThirteen').show();
  $('#imggThirteen').show();
     if (input.files && input.files[0]) {
         var reader = new FileReader();

         reader.onload = function (e) {
             $('#imgThirteen')
                 .attr('src', e.target.result);
         };

         reader.readAsDataURL(input.files[0]);
     }
 }


function readURLFourteen(input)
{
  $('#imgFourteen').show();
  $('#imggFourteen').show();
     if (input.files && input.files[0]) {
         var reader = new FileReader();

         reader.onload = function (e) {
             $('#imgFourteen')
                 .attr('src', e.target.result);
         };

         reader.readAsDataURL(input.files[0]);
     }
 }


function readURLFifteen(input)
{
  $('#imgFifteen').show();
  $('#imggFifteen').show();
     if (input.files && input.files[0]) {
         var reader = new FileReader();

         reader.onload = function (e) {
             $('#imgFifteen')
                 .attr('src', e.target.result);
         };

         reader.readAsDataURL(input.files[0]);
     }
 }


function readURLSixteen(input)
{
  $('#imgSixteen').show();
  $('#imggSixteen').show();
     if (input.files && input.files[0]) {
         var reader = new FileReader();

         reader.onload = function (e) {
             $('#imgSixteen')
                 .attr('src', e.target.result);
         };

         reader.readAsDataURL(input.files[0]);
     }
 }


function readURLSevnteen(input)
{
  $('#imgSeventeen').show();
  $('#imggSeventeen').show();
     if (input.files && input.files[0]) {
         var reader = new FileReader();

         reader.onload = function (e) {
             $('#imgSeventeen')
                 .attr('src', e.target.result);
         };

         reader.readAsDataURL(input.files[0]);
     }
 }

 function readURLEighteen(input)
 {
   $('#imgEighteen').show();
   $('#imggEighteen').show();
      if (input.files && input.files[0]) {
          var reader = new FileReader();

          reader.onload = function (e) {
              $('#imgEighteen')
                  .attr('src', e.target.result);
          };

          reader.readAsDataURL(input.files[0]);
      }
  }


function readURLNineteen(input)
{
  $('#imgNineteen').show();
  $('#imggNineteen').show();
     if (input.files && input.files[0]) {
         var reader = new FileReader();

         reader.onload = function (e) {
             $('#imgNineteen')
                 .attr('src', e.target.result);
         };

         reader.readAsDataURL(input.files[0]);
     }
 }


 function readURLNineteen(input)
 {
   $('#imgTwenty').show();
   $('#imggTwenty').show();
      if (input.files && input.files[0]) {
          var reader = new FileReader();

          reader.onload = function (e) {
              $('#imgTwenty')
                  .attr('src', e.target.result);
          };

          reader.readAsDataURL(input.files[0]);
      }
  }




 $('#tov_cat').change(function()
 {

   //cars
if ($('#tov_cat').val() == 'cars')
{
  $('#tv_cars').show();
  $('#tv_vans').hide();
  $('#tv_motorbikes').hide();
  $('#tv_quads').hide();
  $('#tv_lorries').hide();
  $('#tv_buses').hide();
  $('#tv_agricultural').hide();
}
  //vans
else if ($('#tov_cat').val() == 'vans')
{
  $('#tv_cars').hide();
  $('#tv_vans').show();
  $('#tv_motorbikes').hide();
  $('#tv_quads').hide();
  $('#tv_lorries').hide();
  $('#tv_buses').hide();
  $('#tv_agricultural').hide();
}
//motorbikes
else if ($('#tov_cat').val() == 'motorbikes')
{
  $('#tv_cars').hide();
  $('#tv_vans').hide();
  $('#tv_motorbikes').show();
  $('#tv_quads').hide();
  $('#tv_lorries').hide();
  $('#tv_buses').hide();
  $('#tv_agricultural').hide();
}
//quads
else if ($('#tov_cat').val() == 'quads')
{
  $('#tv_cars').hide();
  $('#tv_vans').hide();
  $('#tv_motorbikes').hide();
  $('#tv_quads').show();
  $('#tv_lorries').hide();
  $('#tv_buses').hide();
  $('#tv_agricultural').hide();
}
//lorries
else if ($('#tov_cat').val() == 'lorries')
{
  $('#tv_cars').hide();
  $('#tv_vans').hide();
  $('#tv_motorbikes').hide();
  $('#tv_quads').hide();
  $('#tv_lorries').show();
  $('#tv_buses').hide();
  $('#tv_agricultural').hide();
}
//buses
else if ($('#tov_cat').val() == 'buses')
{
  $('#tv_cars').hide();
  $('#tv_vans').hide();
  $('#tv_motorbikes').hide();
  $('#tv_quads').hide();
  $('#tv_lorries').hide();
  $('#tv_buses').show();
  $('#tv_agricultural').hide();
}
//agricultural
else if ($('#tov_cat').val() == 'agricultural')
{
  $('#tv_cars').hide();
  $('#tv_vans').hide();
  $('#tv_motorbikes').hide();
  $('#tv_quads').hide();
  $('#tv_lorries').hide();
  $('#tv_buses').hide();
  $('#tv_agricultural').show();
}
else
{
  $('#tv_cars').show();
  $('#tv_vans').show();
  $('#tv_motorbikes').show();
  $('#tv_quads').show();
  $('#tv_lorries').show();
  $('#tv_buses').show();
  $('#tv_agricultural').show();
}
});


//models

$('#brand_cat').change(function()
{
  if ($('#tov_cat').val() == 'cars' && $('#brand_cat').val() == 'Fiat')
  {
    $('#m_cars_fiat').show();
    $('#m_cars_mercedes').hide();
    $('#m_vans_mercedes').hide();
    $('#m_vans_peugeot').hide();
    $('#m_motorbikes_suzuki').hide();
    $('#m_motorbikes_wsk').hide();
    $('#m_quads_honda').hide();
    $('#m_quads_suzuki').hide();
    $('#m_lorries_jelcz').hide();
    $('#m_lorries_mercedes').hide();
    $('#m_buses_jelcz').hide();
    $('#m_buses_mercedes').hide();
    $('#m_agricultural_mercedes').hide();
    $('#m_agricultural_urses').hide();
  }
  else if ($('#tov_cat').val() == 'cars' && $('#brand_cat').val() == 'Mercedes')
  {
    $('#m_cars_fiat').hide();
    $('#m_cars_mercedes').show();
    $('#m_vans_mercedes').hide();
    $('#m_vans_peugeot').hide();
    $('#m_motorbikes_suzuki').hide();
    $('#m_motorbikes_wsk').hide();
    $('#m_quads_honda').hide();
    $('#m_quads_suzuki').hide();
    $('#m_lorries_jelcz').hide();
    $('#m_lorries_mercedes').hide();
    $('#m_buses_jelcz').hide();
    $('#m_buses_mercedes').hide();
    $('#m_agricultural_mercedes').hide();
    $('#m_agricultural_urses').hide();
  }
  else if ($('#tov_cat').val() == 'vans' && $('#brand_cat').val() == 'Mercedes')
  {
    $('#m_cars_fiat').hide();
    $('#m_cars_mercedes').hide();
    $('#m_vans_mercedes').show();
    $('#m_vans_peugeot').hide();
    $('#m_motorbikes_suzuki').hide();
    $('#m_motorbikes_wsk').hide();
    $('#m_quads_honda').hide();
    $('#m_quads_suzuki').hide();
    $('#m_lorries_jelcz').hide();
    $('#m_lorries_mercedes').hide();
    $('#m_buses_jelcz').hide();
    $('#m_buses_mercedes').hide();
    $('#m_agricultural_mercedes').hide();
    $('#m_agricultural_urses').hide();
  }
  else if ($('#tov_cat').val() == 'vans' && $('#brand_cat').val() == 'Peugeot')
  {
    $('#m_cars_fiat').hide();
    $('#m_cars_mercedes').hide();
    $('#m_vans_mercedes').hide();
    $('#m_vans_peugeot').show();
    $('#m_motorbikes_suzuki').hide();
    $('#m_motorbikes_wsk').hide();
    $('#m_quads_honda').hide();
    $('#m_quads_suzuki').hide();
    $('#m_lorries_jelcz').hide();
    $('#m_lorries_mercedes').hide();
    $('#m_buses_jelcz').hide();
    $('#m_buses_mercedes').hide();
    $('#m_agricultural_mercedes').hide();
    $('#m_agricultural_urses').hide();
  }
  else if ($('#tov_cat').val() == 'motorbikes' && $('#brand_cat').val() == 'Suzuki')
  {
    $('#m_cars_fiat').hide();
    $('#m_cars_mercedes').hide();
    $('#m_vans_mercedes').hide();
    $('#m_vans_peugeot').hide();
    $('#m_motorbikes_suzuki').show();
    $('#m_motorbikes_wsk').hide();
    $('#m_quads_honda').hide();
    $('#m_quads_suzuki').hide();
    $('#m_lorries_jelcz').hide();
    $('#m_lorries_mercedes').hide();
    $('#m_buses_jelcz').hide();
    $('#m_buses_mercedes').hide();
    $('#m_agricultural_mercedes').hide();
    $('#m_agricultural_urses').hide();
  }
  else if ($('#tov_cat').val() == 'motorbikes' && $('#brand_cat').val() == 'Wsk')
  {
    $('#m_cars_fiat').hide();
    $('#m_cars_mercedes').hide();
    $('#m_vans_mercedes').hide();
    $('#m_vans_peugeot').hide();
    $('#m_motorbikes_suzuki').hide();
    $('#m_motorbikes_wsk').show();
    $('#m_quads_honda').hide();
    $('#m_quads_suzuki').hide();
    $('#m_lorries_jelcz').hide();
    $('#m_lorries_mercedes').hide();
    $('#m_buses_jelcz').hide();
    $('#m_buses_mercedes').hide();
    $('#m_agricultural_mercedes').hide();
    $('#m_agricultural_urses').hide();
  }
  else if ($('#tov_cat').val() == 'quads' && $('#brand_cat').val() == 'Honda')
  {
    $('#m_cars_fiat').hide();
    $('#m_cars_mercedes').hide();
    $('#m_vans_mercedes').hide();
    $('#m_vans_peugeot').hide();
    $('#m_motorbikes_suzuki').hide();
    $('#m_motorbikes_wsk').hide();
    $('#m_quads_honda').show();
    $('#m_quads_suzuki').hide();
    $('#m_lorries_jelcz').hide();
    $('#m_lorries_mercedes').hide();
    $('#m_buses_jelcz').hide();
    $('#m_buses_mercedes').hide();
    $('#m_agricultural_mercedes').hide();
    $('#m_agricultural_urses').hide();
  }
  else if ($('#tov_cat').val() == 'quads' && $('#brand_cat').val() == 'Suzuki')
  {
    $('#m_cars_fiat').hide();
    $('#m_cars_mercedes').hide();
    $('#m_vans_mercedes').hide();
    $('#m_vans_peugeot').hide();
    $('#m_motorbikes_suzuki').hide();
    $('#m_motorbikes_wsk').hide();
    $('#m_quads_honda').hide();
    $('#m_quads_suzuki').show();
    $('#m_lorries_jelcz').hide();
    $('#m_lorries_mercedes').hide();
    $('#m_buses_jelcz').hide();
    $('#m_buses_mercedes').hide();
    $('#m_agricultural_mercedes').hide();
    $('#m_agricultural_urses').hide();
  }
  else if ($('#tov_cat').val() == 'lorries' && $('#brand_cat').val() == 'Jelcz')
  {
    $('#m_cars_fiat').hide();
    $('#m_cars_mercedes').hide();
    $('#m_vans_mercedes').hide();
    $('#m_vans_peugeot').hide();
    $('#m_motorbikes_suzuki').hide();
    $('#m_motorbikes_wsk').hide();
    $('#m_quads_honda').hide();
    $('#m_quads_suzuki').hide();
    $('#m_lorries_jelcz').show();
    $('#m_lorries_mercedes').hide();
    $('#m_buses_jelcz').hide();
    $('#m_buses_mercedes').hide();
    $('#m_agricultural_mercedes').hide();
    $('#m_agricultural_urses').hide();
  }
  else if ($('#tov_cat').val() == 'lorries' && $('#brand_cat').val() == 'Mercedes')
  {
    $('#m_cars_fiat').hide();
    $('#m_cars_mercedes').hide();
    $('#m_vans_mercedes').hide();
    $('#m_vans_peugeot').hide();
    $('#m_motorbikes_suzuki').hide();
    $('#m_motorbikes_wsk').hide();
    $('#m_quads_honda').hide();
    $('#m_quads_suzuki').hide();
    $('#m_lorries_jelcz').hide();
    $('#m_lorries_mercedes').show();
    $('#m_buses_jelcz').hide();
    $('#m_buses_mercedes').hide();
    $('#m_agricultural_mercedes').hide();
    $('#m_agricultural_urses').hide();
  }
  else if ($('#tov_cat').val() == 'buses' && $('#brand_cat').val() == 'Jelcz')
  {
    $('#m_cars_fiat').hide();
    $('#m_cars_mercedes').hide();
    $('#m_vans_mercedes').hide();
    $('#m_vans_peugeot').hide();
    $('#m_motorbikes_suzuki').hide();
    $('#m_motorbikes_wsk').hide();
    $('#m_quads_honda').hide();
    $('#m_quads_suzuki').hide();
    $('#m_lorries_jelcz').hide();
    $('#m_lorries_mercedes').hide();
    $('#m_buses_jelcz').show();
    $('#m_buses_mercedes').hide();
    $('#m_agricultural_mercedes').hide();
    $('#m_agricultural_urses').hide();
  }
  else if ($('#tov_cat').val() == 'buses' && $('#brand_cat').val() == 'Mercedes')
  {
    $('#m_cars_fiat').hide();
    $('#m_cars_mercedes').hide();
    $('#m_vans_mercedes').hide();
    $('#m_vans_peugeot').hide();
    $('#m_motorbikes_suzuki').hide();
    $('#m_motorbikes_wsk').hide();
    $('#m_quads_honda').hide();
    $('#m_quads_suzuki').hide();
    $('#m_lorries_jelcz').hide();
    $('#m_lorries_mercedes').hide();
    $('#m_buses_jelcz').hide();
    $('#m_buses_mercedes').show();
    $('#m_agricultural_mercedes').hide();
    $('#m_agricultural_urses').hide();
  }
  else if ($('#tov_cat').val() == 'agricultural' && $('#brand_cat').val() == 'Mercedes')
  {
    $('#m_cars_fiat').hide();
    $('#m_cars_mercedes').hide();
    $('#m_vans_mercedes').hide();
    $('#m_vans_peugeot').hide();
    $('#m_motorbikes_suzuki').hide();
    $('#m_motorbikes_wsk').hide();
    $('#m_quads_honda').hide();
    $('#m_quads_suzuki').hide();
    $('#m_lorries_jelcz').hide();
    $('#m_lorries_mercedes').hide();
    $('#m_buses_jelcz').hide();
    $('#m_buses_mercedes').hide();
    $('#m_agricultural_mercedes').show();
    $('#m_agricultural_urses').hide();
  }
  else if ($('#tov_cat').val() == 'agricultural' && $('#brand_cat').val() == 'Ursus')
  {
    $('#m_cars_fiat').hide();
    $('#m_cars_mercedes').hide();
    $('#m_vans_mercedes').hide();
    $('#m_vans_peugeot').hide();
    $('#m_motorbikes_suzuki').hide();
    $('#m_motorbikes_wsk').hide();
    $('#m_quads_honda').hide();
    $('#m_quads_suzuki').hide();
    $('#m_lorries_jelcz').hide();
    $('#m_lorries_mercedes').hide();
    $('#m_buses_jelcz').hide();
    $('#m_buses_mercedes').hide();
    $('#m_agricultural_mercedes').hide();
    $('#m_agricultural_urses').show();
  }
  else
  {
    $('#m_cars_fiat').show();
    $('#m_cars_mercedes').show();
    $('#m_vans_mercedes').show();
    $('#m_vans_peugeot').show();
    $('#m_motorbikes_suzuki').show();
    $('#m_motorbikes_wsk').show();
    $('#m_quads_honda').show();
    $('#m_quads_suzuki').show();
    $('#m_lorries_jelcz').show();
    $('#m_lorries_mercedes').show();
    $('#m_buses_jelcz').show();
    $('#m_buses_mercedes').show();
    $('#m_agricultural_mercedes').show();
    $('#m_agricultural_urses').show();
  }
});


</script>


<script>
$(document).ready(function () {
$(".yearpicker").yearpicker();
});
</script>


<script type="text/javascript">
$(document).ready(function()
{
  $('#hideHeader').hide();
  $('#hideHeaderTwo').hide();
});
</script>
