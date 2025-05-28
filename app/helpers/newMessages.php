<?php
include("../../path.php");
include( ROOT_PATH . "/app/database/db/userDb.php");

if (isset($_POST['receiverr']))
{
  $u_id = mysqli_real_escape_string($conn,trim($_POST['receiverr']));
  $sql_ed = "SELECT
sender_id,
receiver_id,receiver_username,receiver_avatar,sender_avatar,sender_username,message,
COUNT(sender_id) AS duplicate_key
FROM
vw_messages
WHERE receiver_id = '$_SESSION[id]' AND sender_id != '$_SESSION[id]'
GROUP BY sender_id DESC
HAVING COUNT(sender_id) > 0";
  $sql_ed_exec = mysqli_query($conn,$sql_ed);
  //$sql_ed_fetch = mysqli_fetch_assoc($sql_ed_exec);
//die($sql_ed);
  if ($sql_ed_exec)
  {
    while ($sql_ed_fetch = mysqli_fetch_assoc($sql_ed_exec))
    {
      echo "
      <div class='message_container'>
      <button class='message_user_box' id='sndr_val' type='button' name='button' value='".$sql_ed_fetch['sender_id']."'>
      <input type='hidden' id='rcv_val'  name='receiverr' value='".$sql_ed_fetch['receiver_id']."'>
      <img src='".BASE_URL." /assets/img/avatar/";
      if ($sql_ed_fetch['sender_id'] == $_SESSION['id'])
      {
      echo $sql_ed_fetch['receiver_avatar'];
      }
      else
      {
      echo $sql_ed_fetch['sender_avatar'];
      }
      echo "
      '>
      <span><a id='msg_usrnme'>".$sql_ed_fetch['sender_username']."</a><a>".substr($sql_ed_fetch['message'],0,12)."...</a></span>
      </button>
      </div>
      ";
    }
  }

}
elseif (isset($_SESSION['rcv_id']))
{

  $u_id = mysqli_real_escape_string($conn,trim($_SESSION['rcv_id']));
  $sql_ed = "SELECT
sender_id,
receiver_id,receiver_username,receiver_avatar,sender_avatar,sender_username,message,
COUNT(sender_id) AS duplicate_key
FROM
vw_messages
WHERE receiver_id = '$_SESSION[id]' AND sender_id != '$_SESSION[id]'
GROUP BY sender_id DESC
HAVING COUNT(sender_id) > 0";
  $sql_ed_exec = mysqli_query($conn,$sql_ed);
  //$sql_ed_fetch = mysqli_fetch_assoc($sql_ed_exec);
//die($sql_ed);
  if ($sql_ed_exec)
  {
    while ($sql_ed_fetch = mysqli_fetch_assoc($sql_ed_exec))
    {
      echo "
      <div class='message_container'>
      <button class='message_user_box' id='sndr_val' type='button' name='button' value='".$sql_ed_fetch['sender_id']."'>
      <input type='hidden' id='rcv_val'  name='receiverr' value='".$sql_ed_fetch['receiver_id']."'>
      <img src='".BASE_URL." /assets/img/avatar/";
      if ($sql_ed_fetch['sender_id'] == $_SESSION['id'])
      {
      echo $sql_ed_fetch['receiver_avatar'];
      }
      else
      {
      echo $sql_ed_fetch['sender_avatar'];
      }
      echo "
      '>
      <span><a id='msg_usrnme'>".$sql_ed_fetch['sender_username']."</a><a>".substr($sql_ed_fetch['message'],0,12)."...</a></span>
      </button>
      </div>
      ";
    }
  }

}
else {
  $sql_ed = "SELECT
sender_id,
receiver_id,receiver_username,receiver_avatar,sender_avatar,sender_username,message,
COUNT(sender_id) AS duplicate_key
FROM
vw_messages
WHERE receiver_id = '$_SESSION[id]' AND sender_id != '$_SESSION[id]'
GROUP BY sender_id DESC
HAVING COUNT(sender_id) > 0";
  $sql_ed_exec = mysqli_query($conn,$sql_ed);
  //$sql_ed_fetch = mysqli_fetch_assoc($sql_ed_exec);
//die($sql_ed);
  if ($sql_ed_exec)
  {
    while ($sql_ed_fetch = mysqli_fetch_assoc($sql_ed_exec))
    {
      echo "
      <div class='message_container'>
      <button class='message_user_box' id='sndr_val' type='button' name='button' value='".$sql_ed_fetch['sender_id']."'>
      <input type='hidden' id='rcv_val'  name='receiverr' value='".$sql_ed_fetch['receiver_id']."'>
      <img src='".BASE_URL." /assets/img/avatar/";
      if ($sql_ed_fetch['sender_id'] == $_SESSION['id'])
      {
      echo $sql_ed_fetch['receiver_avatar'];
      }
      else
      {
      echo $sql_ed_fetch['sender_avatar'];
      }
      echo "
      '>
      <span><a id='msg_usrnme'>".$sql_ed_fetch['sender_username']."</a><a>".$sql_ed_fetch['message']."</a></span>
      </button>
      </div>
      ";
    }
  }

}



?>
