<?php
include '../../path.php';
include(ROOT_PATH . '/app/database/connection/conn.php');


if (isset($_POST['news_submit']))
{
  $text = mysqli_real_escape_string($conn,str_replace("'", "''", trim($_POST['text'])));
  $heading = $_POST['heading'];
  $sql = "INSERT INTO vs_news(heading, news) VALUES('$heading','$text')";
  $sql_exec = mysqli_query($conn,$sql);

  //die($sql);
  if ($sql_exec)
  {
    echo "
    <script>
    $(document).ready(function()
    {
    $('.pop_up_box').show();
    $('#pop_up_icon').show();
    $('.pop_up_box').css('box-shadow','0px 2px 5px green');
    $('.pop_up_box').html('<h4> Changes have been applied</h4>');
    $('.pop_up_box').delay(2000).fadeOut();
  });
    </script>
    ";
  }
  else
  {
    echo "
    <script>
    $(document).ready(function()
    {
    $('.pop_up_box').show();
    $('#pop_up_icon').show();
    $('.pop_up_box').css('box-shadow','0px 2px 5px red');
    $('.pop_up_box').html('<h4>Could not make changes</h4>');
    $('.pop_up_box').delay(2000).fadeOut();
  });
    </script>
    ";
  }
}

?>
