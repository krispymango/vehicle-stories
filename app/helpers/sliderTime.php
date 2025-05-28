<?php
include '../../path.php';
include(ROOT_PATH . '/app/database/connection/conn.php');

if (isset($_POST['slider_time']))
{
$slider_time = $_POST['slider_time'];
}
else
{
  $slider_time = 4000;
}

$data = file_get_contents(ROOT_PATH .'/app/helpers/api/properties.json');
$json_arr = json_decode($data, true);

foreach ($json_arr as $key => $value)
{
  if ($value['Name'] == 'Carousel_Timer')
  {
      $json_arr[$key]['Value'] = $slider_time;

  }
}
file_put_contents(ROOT_PATH .'/app/helpers/api/properties.json', json_encode($json_arr));
?>
