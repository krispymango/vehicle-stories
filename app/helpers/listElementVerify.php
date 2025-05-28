<?php
include '../../path.php';
include(ROOT_PATH . '/app/database/connection/conn.php');


if (isset($_POST['about_submit']))
{
  $text = $_POST['text'];
  $sql = "INSERT INTO vs_about(id, about) VALUES(1, '$text') ON DUPLICATE KEY UPDATE about = '$text'";
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

elseif (isset($_POST['rules_submit']))
{
  $text = $_POST['text'];
  $sql = "INSERT INTO vs_rules(id, rules) VALUES(1, '$text') ON DUPLICATE KEY UPDATE rules = '$text'";
  $sql_exec = mysqli_query($conn,$sql);

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

elseif (isset($_POST['cookie_submit']))
{
  $text = $_POST['text'];
  $sql = "INSERT INTO vs_cookie_consent(id, cookie) VALUES(1, '$text') ON DUPLICATE KEY UPDATE cookie = '$text'";
  $sql_exec = mysqli_query($conn,$sql);

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

elseif (isset($_POST['rodo_submit']))
{
  $text = $_POST['text'];
  $sql = "INSERT INTO vs_rodo(id, rodo) VALUES(1, '$text') ON DUPLICATE KEY UPDATE rodo = '$text'";
  $sql_exec = mysqli_query($conn,$sql);

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
    $('.pop_up_box').html('<h4>Could not make changes</h4
    $('.pop_up_box').delay(2000).fadeOut();
  });
    </script>
    ";
  }
}
 ?>
