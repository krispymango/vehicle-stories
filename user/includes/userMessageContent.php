<?php

if (isset($_GET['snd_id']))
{
echo "
<script>
$(document).ready(function()
{
if (window.matchMedia('(max-width: 430px)').matches )
      {
        $('.message_users_wrapper').hide();
        $('.message_box').show();
        $('.recepient_name_heading').show();
    }
  });
</script>";
}


 ?>

<section class="user_panel_wrapper">

<div class="user_panel">
    <h3>Message</h3>
</div>
<div class="user_message_content">
<div class="message_users_wrapper">
  <div class="message_heading">
<span>All Conversations</span>
  </div>
  <div id="new_message_box" class="message_users">
    <?php
    if (isset($_GET['snd_id']))
    {
      $dec_snd_id = mysqli_real_escape_string($conn,trim(base64_decode(hex2bin($_GET['snd_id']))));
      $u_id = $dec_snd_id;
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

    elseif (isset($_SESSION['sender_id']))
    {
      $u_id = mysqli_real_escape_string($conn,trim($_SESSION['sender_id']));
      $sql_ed = "SELECT
    sender_id,
    receiver_id,receiver_username,receiver_avatar,sender_avatar,sender_username,message,
    COUNT(sender_id) AS duplicate_key
    FROM
    vw_messages
    WHERE receiver_id = '$_SESSION[id]' AND sender_id != '$_SESSION[id]'
      GROUP BY sender_id
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
    HAVING COUNT(sender_id) > 0 ";
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
          if ($sql_ed_fetch['sender_id'] != $_SESSION['id'])
          {
          echo $sql_ed_fetch['sender_avatar'];
          }
          else
          {
            echo $sql_ed_fetch['receiver_avatar'];
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

 ?>

  </div>
</div>

<div class="message_box">
  <div class="recepient_name_heading">
<i id="mobile_message_return" onclick="mobileReturnBox()" class="fas fa-lg fa-arrow-left"></i>
<span id="recepient_name">
  <?php
  if(isset($_GET['snd_id']) && ($_GET['snd_id'] != $_SESSION['id']))
  {
    $dec_snd_id = mysqli_real_escape_string($conn,trim(base64_decode(hex2bin($_GET['snd_id']))));
    $sql_msg = "SELECT * FROM vw_user WHERE id = '$dec_snd_id'";
    $sql_msg_exec = mysqli_query($conn,$sql_msg);
    $sql_msg_fetch = mysqli_fetch_assoc($sql_msg_exec);
    if ($sql_msg_fetch['status'] == 1)
    {
      $name = $sql_msg_fetch['username'] . ' (Administrator)';
    }
    else {
      $name = $sql_msg_fetch['username'];
    }
    //die(  $sql_msg);
   echo
   "<script>
   $(document).ready(function()
   {
   $('#recepient_name').html('<a>".$name."</a>')
   });
   </script>";
  }
  elseif(isset($_SESSION['sender_id']) && $_SESSION['sender_id'] != $_SESSION['id'])
  {
    $sql_msg = "SELECT * FROM vw_user WHERE id = '$_SESSION[sender_id]'";
    $sql_msg_exec = mysqli_query($conn,$sql_msg);
    $sql_msg_fetch = mysqli_fetch_assoc($sql_msg_exec);
    if ($sql_msg_fetch['status'] == 1)
    {
      $name = $sql_msg_fetch['username'] . ' (Administrator)';
    }
    else {
      $name = $sql_msg_fetch['username'];
    }

   echo
   "<script>
   $(document).ready(function()
   {
   $('#recepient_name').html('<a>".$name."</a>')
   });
   </script>";
  } ?>
</span>

  </div>
  <div class="text_box_wrapper">
    <div class="text_box" id="msg_box">
      <?php
      if (isset($_GET['snd_id']))
      {
        $dec_snd_id = mysqli_real_escape_string($conn,trim(base64_decode(hex2bin($_GET['snd_id']))));
        $sql_msg = "SELECT * FROM vw_messages WHERE sender_id = '$dec_snd_id' AND receiver_id = '$_SESSION[id]' OR  receiver_id = '$dec_snd_id' AND sender_id = '$_SESSION[id]' ORDER BY date_posted";
        $sql_msg_exec = mysqli_query($conn,$sql_msg);
        //$sql_ed_fetch = mysqli_fetch_assoc($sql_ed_exec);
        if ($sql_msg_exec)
        {
          while ($sql_msg_fetch = mysqli_fetch_assoc($sql_msg_exec))
          {
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
      }
      elseif (isset($_SESSION['sender_id']))
      {
        $sql_msg = "SELECT * FROM vw_messages WHERE sender_id = '$_SESSION[sender_id]' AND receiver_id = '$_SESSION[id]' OR  receiver_id = '$_SESSION[sender_id]' AND sender_id = '$_SESSION[id]' ORDER BY date_posted";
        $sql_msg_exec = mysqli_query($conn,$sql_msg);
        //$sql_ed_fetch = mysqli_fetch_assoc($sql_ed_exec);
        if ($sql_msg_exec)
        {
          while ($sql_msg_fetch = mysqli_fetch_assoc($sql_msg_exec))
          {
            echo "
            <div class='text_user_box'>
            <img src='".BASE_URL."/assets/img/avatar/".$sql_msg_fetch['sender_avatar']."'>
            <span><a ";
if ($sql_msg_fetch['sender_status'] == 0)
{
echo "href='".BASE_URL."/".bin2hex(base64_encode($sql_msg_fetch['sender_id']))."/".$sql_msg_fetch['sender_username']."'";
}
            echo "><strong>";
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
      } ?>
      <!-- This is where the chat messages are displayed -->

    </div>
  </div>
  <form class="text_box_form" action="#" method="post">
<input type="hidden" name="sender_id" id="msg_sndr" value="
<?php
if (isset($_GET['snd_id']))
{
$dec_snd_id = mysqli_real_escape_string($conn,trim(base64_decode(hex2bin($_GET['snd_id']))));
echo $dec_snd_id;
}
elseif (isset($_SESSION['sender_id']))
{
echo $_SESSION['sender_id'];
}
?>">
<input type="hidden" name="receiver_username" id="msg_rcv_usrnme" value="<?php echo $_SESSION['username'];?>">
<input type="hidden" name="receiver_id" id="msg_rcv" value="<?php echo $_SESSION['id'];?>">
<input type="text" name="message" id="msg_message" placeholder="Type Message..." required>
<input type="submit" name="submit" id="msg_sbmt"value="Send" >
  </form>
</div>
</div>
</section>

<script type="text/javascript">
$(document).ready(function()
{
  $('#hideHeader').hide();
  $('#hideHeaderTwo').hide();
});
</script>
