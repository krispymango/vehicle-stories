<?php
include("../../path.php");
//include( ROOT_PATH . "app/database/db/db.php");
include( ROOT_PATH . "/app/database/db/userDb.php");




if (isset($_POST['sender_id']) && isset($_POST['submit']) && isset($_POST['message']))
{

  if (isset($_POST['sender_id']))
  {
    $_SESSION['sender_id'] = mysqli_real_escape_string($conn,trim($_POST['sender_id']));
    $rcv_msg = mysqli_real_escape_string($conn,trim(str_replace("'", "''", trim($_POST['message']))));
    //$rcv_username = $_POST['receiver_username'];
    $date_posted = date('M d,Y');
    $time_posted = date('h:ia');

    $sql_check_admin = "SELECT * FROM vw_user WHERE id = '$_SESSION[sender_id]' AND status = 1";
    $sql_check_admin_exe = mysqli_query($conn,$sql_check_admin);
    $sql_check_admin_fetch = mysqli_fetch_assoc($sql_check_admin_exe);
    if ($sql_check_admin_exe && $sql_check_admin_fetch )
    {
      $sql_cf = "INSERT INTO vs_contact_form(username,message,email,date_posted,time_posted,read_msg,user_id)
      VALUES('$_SESSION[username]','$rcv_msg','$_SESSION[email]','$date_posted','$time_posted',0,'$_SESSION[id]')";
      $sql_cf_exec = mysqli_query($conn,$sql_cf);
    }

    $sql = "INSERT INTO vs_messages(sender_id,receiver_id,message,date_posted,time_posted)
    VALUES('$_SESSION[id]','$_SESSION[sender_id]','$rcv_msg','$date_posted',
  '$time_posted')";
    $sql_exec = mysqli_query($conn,$sql);
    //die($sql);

    if ($sql_exec)
    {//$_GET['u_id'];
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
        echo "<h5 style='color:red;'>Could not send message!</h5>";
      }
    }
    else
    {
          echo "<h5 style='color:red;'>Could not send message!</h5>";
    }

  }




}
?>
<script type="text/javascript">
$('.text_box_wrapper').scrollTop($('.text_box_wrapper')[0].scrollHeight);
</script>
