<?php
include '../../path.php';
include(ROOT_PATH . '/app/database/connection/conn.php');

if (isset($_POST['main_row_1']))
{
  $por = $_POST['phrase_on_ribbon_1'];
  $data = file_get_contents(ROOT_PATH .'/app/helpers/api/properties.json');
  $json_arr = json_decode($data, true);

  foreach ($json_arr as $key => $value)
  {
    if ($value['Name'] == 'Highlighted')
    {
      $json_arr[$key]['sd'] = '';
      $json_arr[$key]['cd'] = '';
      $json_arr[$key]['por'] = $por;
      $json_arr[$key]['slv'] = '';
      $json_arr[$key]['sqv'] = '';
      $json_arr[$key]['highlighted_type'] = 'row_1';
    }
  }
  file_put_contents(ROOT_PATH .'/app/helpers/api/properties.json', json_encode($json_arr));
}




elseif (isset($_POST['main_row_2']))
{
  $por = $_POST['phrase_on_ribbon_2'];
  $sd = $_POST['start_date_2'];
  $cd = $_POST['close_date_2'];

  if (empty($sd) || empty($cd))
  {
  $sd_convert = 0;
  $cd_convert = 0;
  $data = file_get_contents(ROOT_PATH .'/app/helpers/api/properties.json');
  $json_arr = json_decode($data, true);

  foreach ($json_arr as $key => $value)
  {
    if ($value['Name'] == 'Highlighted')
    {
        $json_arr[$key]['sd'] = $sd_convert;
        $json_arr[$key]['cd'] = $cd_convert;
        $json_arr[$key]['por'] = $por;
        $json_arr[$key]['slv'] = '';
        $json_arr[$key]['sqv'] = '';
        $json_arr[$key]['highlighted_type'] = 'row_2';
    }
  }
  file_put_contents(ROOT_PATH .'/app/helpers/api/properties.json', json_encode($json_arr));

  }
  else
  {
    $sd_convert =  strtotime($sd);
    $cd_convert =  strtotime($cd);
    $data = file_get_contents(ROOT_PATH .'/app/helpers/api/properties.json');
    $json_arr = json_decode($data, true);

    foreach ($json_arr as $key => $value)
    {
      if ($value['Name'] == 'Highlighted')
      {
          $json_arr[$key]['sd'] = $sd_convert;
          $json_arr[$key]['cd'] = $cd_convert;
          $json_arr[$key]['por'] = $por;
          $json_arr[$key]['slv'] = '';
          $json_arr[$key]['sqv'] = '';
          $json_arr[$key]['highlighted_type'] = 'row_2';
      }
    }
    file_put_contents(ROOT_PATH .'/app/helpers/api/properties.json', json_encode($json_arr));
  }
}







elseif (isset($_POST['main_row_3']))
{
  $sd = $_POST['start_date_3'];
  $cd = $_POST['close_date_3'];
  $por = $_POST['phrase_on_ribbon_3'];
if (empty($sd) || empty($cd))
{
$sd_convert = 0;
$cd_convert = 0;
$data = file_get_contents(ROOT_PATH .'/app/helpers/api/properties.json');
$json_arr = json_decode($data, true);

foreach ($json_arr as $key => $value)
{
  if ($value['Name'] == 'Highlighted')
  {
      $json_arr[$key]['sd'] = $sd_convert;
      $json_arr[$key]['cd'] = $cd_convert;
      $json_arr[$key]['por'] = '';
      $json_arr[$key]['slv'] = '';
      $json_arr[$key]['sqv'] = '';
      $json_arr[$key]['highlighted_type'] = 'row_3';
  }
}
file_put_contents(ROOT_PATH .'/app/helpers/api/properties.json', json_encode($json_arr));

}
else
{
  $sd_convert =  strtotime($sd);
  $cd_convert =  strtotime($cd);
  $data = file_get_contents(ROOT_PATH .'/app/helpers/api/properties.json');
  $json_arr = json_decode($data, true);

  foreach ($json_arr as $key => $value)
  {
    if ($value['Name'] == 'Highlighted')
    {
        $json_arr[$key]['sd'] = $sd_convert;
        $json_arr[$key]['cd'] = $cd_convert;
        $json_arr[$key]['por'] = $por;
        $json_arr[$key]['slv'] = '';
        $json_arr[$key]['sqv'] = '';
        $json_arr[$key]['highlighted_type'] = 'row_3';
    }
  }
  file_put_contents(ROOT_PATH .'/app/helpers/api/properties.json', json_encode($json_arr));
}
}






elseif (isset($_POST['main_row_4']))
{
  $sd = $_POST['start_date_4'];
  $cd = $_POST['close_date_4'];
  $sqv = $_POST['close_date_4'];
  $slv = $_POST['close_date_4'];
  $por = $_POST['phrase_on_ribbon_4'];
if (empty($sd) || empty($cd))
{
$sd_convert = 0;
$cd_convert = 0;
$data = file_get_contents(ROOT_PATH .'/app/helpers/api/properties.json');
$json_arr = json_decode($data, true);

foreach ($json_arr as $key => $value)
{
  if ($value['Name'] == 'Highlighted')
  {
      $json_arr[$key]['sd'] = $sd_convert;
      $json_arr[$key]['cd'] = $cd_convert;
      $json_arr[$key]['por'] = $por;
      $json_arr[$key]['slv'] = '';
      $json_arr[$key]['sqv'] = '';
      $json_arr[$key]['highlighted_type'] = 'row_4';
  }
}
file_put_contents(ROOT_PATH .'/app/helpers/api/properties.json', json_encode($json_arr));

}
else
{
  $sd_convert =  strtotime($sd);
  $cd_convert =  strtotime($cd);
  $data = file_get_contents(ROOT_PATH .'/app/helpers/api/properties.json');
  $json_arr = json_decode($data, true);

  foreach ($json_arr as $key => $value)
  {
    if ($value['Name'] == 'Highlighted')
    {
        $json_arr[$key]['sd'] = $sd_convert;
        $json_arr[$key]['cd'] = $cd_convert;
        $json_arr[$key]['por'] = $por;
        $json_arr[$key]['slv'] = '';
        $json_arr[$key]['sqv'] = '';
        $json_arr[$key]['highlighted_type'] = 'row_4';
    }
  }
  file_put_contents(ROOT_PATH .'/app/helpers/api/properties.json', json_encode($json_arr));
}
}


elseif (isset($_POST['hgh_back_color']))
{
  $hgh_back_color = $_POST['hgh_back_color'];
  $data = file_get_contents(ROOT_PATH .'/app/helpers/api/properties.json');
  $json_arr = json_decode($data, true);

  foreach ($json_arr as $key => $value)
  {
    if ($value['Name'] == 'Ribbon_Background_Color')
    {
        $json_arr[$key]['Value'] = $hgh_back_color;

    }
  }
  file_put_contents(ROOT_PATH .'/app/helpers/api/properties.json', json_encode($json_arr));

}
elseif (isset($_POST['hgh_text_color']))
{
  $hgh_text_color = $_POST['hgh_text_color'];
  $data = file_get_contents(ROOT_PATH .'/app/helpers/api/properties.json');
  $json_arr = json_decode($data, true);

  foreach ($json_arr as $key => $value)
  {
    if ($value['Name'] == 'Ribbon_Text_Color')
    {
        $json_arr[$key]['Value'] = $hgh_text_color;

    }
  }
  file_put_contents(ROOT_PATH .'/app/helpers/api/properties.json', json_encode($json_arr));

}
elseif (isset($_POST['no_of_rows']))
{
  $no_of_rows = $_POST['no_of_rows'];
  $data = file_get_contents(ROOT_PATH .'/app/helpers/api/properties.json');
  $json_arr = json_decode($data, true);

  foreach ($json_arr as $key => $value)
  {
    if ($value['Name'] == 'Highlighted_rows')
    {
        $json_arr[$key]['Value'] = $no_of_rows;

    }
  }
  file_put_contents(ROOT_PATH .'/app/helpers/api/properties.json', json_encode($json_arr));

}
elseif (isset($_POST['news_on_of']))
{
  $news_on_of = $_POST['news_on_of'];
  $data = file_get_contents(ROOT_PATH .'/app/helpers/api/properties.json');
  $json_arr = json_decode($data, true);

  foreach ($json_arr as $key => $value)
  {
    if ($value['Name'] == 'News_Pop_Up')
    {
        $json_arr[$key]['Value'] = $news_on_of;
    }
  }
  file_put_contents(ROOT_PATH .'/app/helpers/api/properties.json', json_encode($json_arr));

}

elseif (isset($_POST['sel_highlight']) && isset($_POST['sel_hidden']))
{
$sel_hidden = $_POST['sel_hidden'];
$sel_highlight = $_POST['sel_highlight'];
$data = file_get_contents(ROOT_PATH .'/app/helpers/api/hghProperties.json');
$json_arr = json_decode($data, true);

foreach ($json_arr as $key => $value)
{
  $json_arr[$key]['select_one'] = '';
  $json_arr[$key]['select_two'] = '';
  $json_arr[$key]['select_three'] = '';
  $json_arr[$key]['select_four'] = '';
  $json_arr[$key]['select_five'] = '';
  $json_arr[$key]['select_six'] = '';
  $json_arr[$key]['select_seven'] = '';
  $json_arr[$key]['select_eight'] = '';
  
  if ($value['Name'] == 'Highlight_user_id')
  {
    if ($_POST['sel_hidden'] == 1)
    {
      $json_arr[$key]['select_one'] = $sel_highlight;
    }
    elseif ($_POST['sel_hidden'] == 2)
    {
      $json_arr[$key]['select_two'] = $sel_highlight;
    }
    elseif ($_POST['sel_hidden'] == 3)
    {
      $json_arr[$key]['select_three'] = $sel_highlight;
    }
    elseif ($_POST['sel_hidden'] == 4)
    {
      $json_arr[$key]['select_four'] = $sel_highlight;
    }
    elseif ($_POST['sel_hidden'] == 5)
    {
      $json_arr[$key]['select_five'] = $sel_highlight;
    }
    elseif ($_POST['sel_hidden'] == 6)
    {
      $json_arr[$key]['select_six'] = $sel_highlight;
    }
    elseif ($_POST['sel_hidden'] == 7)
    {
      $json_arr[$key]['select_seven'] = $sel_highlight;
    }
    elseif ($_POST['sel_hidden'] == 8)
    {
      $json_arr[$key]['select_eight'] = $sel_highlight;
    }
  }
}
file_put_contents(ROOT_PATH .'/app/helpers/api/hghProperties.json', json_encode($json_arr));

}

?>
