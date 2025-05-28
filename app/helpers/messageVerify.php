<?php
include("../../path.php");
//include( ROOT_PATH . "app/database/db/db.php");
include( ROOT_PATH . "/app/database/db/userDb.php");


if(isset($_SESSION['sender_id']))
{
$_SESSION['sender_id'] = mysqli_real_escape_string($conn,trim($_POST['sender_id']));
$sql = "SELECT * FROM vw_messages WHERE sender_id = '$_SESSION[sender_id]' AND receiver_id = '$_SESSION[id]' OR  receiver_id = '$_SESSION[sender_id]' AND sender_id = '$_SESSION[id]' ORDER BY date_posted";
$sql_exec = mysqli_query($conn,$sql);
//$sql_ed_fetch = mysqli_fetch_assoc($sql_ed_exec);
//die($sql);
if ($sql_exec)
{

  while ($sql_fetch = mysqli_fetch_assoc($sql_exec))
  {
    if($sql_fetch['sender_id'] != $_SESSION['id'])
    {
      if ($sql_fetch['sender_status'] == 1)
      {
        $name = $sql_fetch['sender_username'] . ' (Administrator)';
      }
      else {
        $name = $sql_fetch['sender_username'];
      }
     echo
     "<script>
     $(document).ready(function()
     {
     $('#recepient_name').html('<a>".$name."</a>')
     });
     </script>";
    }

    echo "
    <div class='text_user_box'>
    <img src='".BASE_URL."/assets/img/avatar/".$sql_fetch['sender_avatar']."'>
    <span><a href='".BASE_URL."/".bin2hex(base64_encode($sql_fetch['sender_id']))."/".$sql_fetch['sender_username']."'><strong>";
    if($sql_fetch['sender_id'] == $_SESSION['id'])
    {
    echo "Me";
    }
    else {
    echo $sql_fetch['sender_username'];
    }
    echo "</strong> &bull; ".$sql_fetch['date_posted']." &bull; ".$sql_fetch['time_posted']."</a><p>".$sql_fetch['message']."</p></span>
    </div>
    ";
  }
}
}

elseif (isset($_POST['sender_id']))
{

  $_SESSION['sender_id'] = mysqli_real_escape_string($conn,trim($_POST['sender_id']));
  $_SESSION['rcv_id'] = mysqli_real_escape_string($conn,trim($_POST['receiverr']));
  $sql = "SELECT * FROM vw_messages WHERE sender_id = '$_SESSION[sender_id]' AND receiver_id = '$_SESSION[id]' OR  receiver_id = '$_SESSION[sender_id]' AND sender_id = '$_SESSION[id]' ORDER BY date_posted";
  $sql_exec = mysqli_query($conn,$sql);
  //$sql_ed_fetch = mysqli_fetch_assoc($sql_ed_exec);
  //die($sql);
  if ($sql_exec)
  {

    while ($sql_fetch = mysqli_fetch_assoc($sql_exec))
    {
      if($sql_fetch['sender_id'] != $_SESSION['id'])
      {
        if ($sql_fetch['sender_status'] == 1)
        {
          $name = $sql_fetch['sender_username'] . ' (Administrator)';
        }
        else {
          $name = $sql_fetch['sender_username'];
        }
       echo
       "<script>
       $(document).ready(function()
       {
       $('#recepient_name').html('<a>".$name."</a>')
       });
       </script>";
      }

      echo "
      <div class='text_user_box'>
      <img src='".BASE_URL."/assets/img/avatar/".$sql_fetch['sender_avatar']."'>
      <span><a href='".BASE_URL."/".bin2hex(base64_encode($sql_fetch['sender_id']))."/".$sql_fetch['sender_username']."'><strong>";
      if($sql_fetch['sender_id'] == $_SESSION['id'])
      {
      echo "Me";
      }
      else {
      echo $sql_fetch['sender_username'];
      }
      echo "</strong> &bull; ".$sql_fetch['date_posted']." &bull; ".$sql_fetch['time_posted']."</a><p>".$sql_fetch['message']."</p></span>
      </div>
      ";
    }
  }
}
?>
