
<?php
include("../../path.php");
include( ROOT_PATH . "/app/database/db/userDb.php");





if (isset($_SESSION['sender_id']))
{
  $sql_msg = "SELECT * FROM vw_messages WHERE sender_id = '$_SESSION[sender_id]' AND receiver_id = '$_SESSION[id]' OR  receiver_id = '$_SESSION[sender_id]' AND sender_id = '$_SESSION[id]' ORDER BY date_posted";
  $sql_msg_exec = mysqli_query($conn,$sql_msg);

  if ($sql_msg_exec)
  {

    while ($sql_msg_fetch = mysqli_fetch_assoc($sql_msg_exec))
    {
      if($sql_msg_fetch['sender_id'] != $_SESSION['id'])
      {
        if ($sql_msg_fetch['sender_status'] == 1)
        {
          $name = $sql_msg_fetch['sender_username'] . ' (Administrator)';
        }
        else {
          $name = $sql_msg_fetch['sender_username'];
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
      <img src='".BASE_URL."/assets/img/avatar/".$sql_msg_fetch['sender_avatar']."'>
      <span><a href='".BASE_URL."/".bin2hex(base64_encode($sql_msg_fetch['sender_id']))."/".$sql_msg_fetch['sender_username']."'><strong>";
      if($sql_msg_fetch['sender_id'] == $_SESSION['id'])
      {
      echo "Me";
      }
      else {
      echo $sql_msg_fetch['sender_username'];
      }
      echo "</strong> &bull; ".$sql_msg_fetch['date_posted']." &bull; ".$sql_msg_fetch['time_posted']."</a>
      <p>".$sql_msg_fetch['message']."</p></span>
      </div>
      ";
    }
  }
  else
  {
    echo "<h5 style='color:red;'>Could not Load messages!</h5>";
  }
}



elseif(isset($_POST['sender_id']))
{
  $sql_msg = "SELECT * FROM vw_messages WHERE sender_id = '$_POST[sender_id]' AND receiver_id = '$_SESSION[id]' OR  receiver_id = '$_POST[sender_id]' AND sender_id = '$_SESSION[id]' ORDER BY date_posted";
  $sql_msg_exec = mysqli_query($conn,$sql_msg);
  //$sql_ed_fetch = mysqli_fetch_assoc($sql_ed_exec);
  if ($sql_msg_exec)
  {
    while ($sql_msg_fetch = mysqli_fetch_assoc($sql_msg_exec))
    {
      echo "
      <div class='text_user_box'>
      <img src='".BASE_URL."/assets/img/avatar/".$sql_msg_fetch['sender_avatar']."'>
      <span><a href='".BASE_URL."/".base64_decode(hex2bin($sql_msg_fetch['sender_id']))."/".$sql_msg_fetch['sender_username']."'><strong>";
      if($sql_msg_fetch['sender_id'] == $_SESSION['id'])
      {
      echo "Me";
      }
      else {
      echo $sql_msg_fetch['sender_username'];
      }
      echo "</strong> &bull; ".$sql_msg_fetch['date_posted']." &bull; ".$sql_msg_fetch['time_posted']."</a>
      <p>".$sql_msg_fetch['message']."</p></span>
      </div>
      ";
    }
  }
  else
  {
        echo "<h5 style='color:red;'>Could not Load messages!</h5>";
  }
}


 ?>
