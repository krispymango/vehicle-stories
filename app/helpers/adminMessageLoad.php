<?php
include '../../path.php';
include( ROOT_PATH . "/app/database/db/adminDb.php");

$user_id = mysqli_real_escape_string($conn,$_POST['user_id']);
  $sql_f = "SELECT * FROM vw_contact_form WHERE user_id = '$user_id' ";
  $sql_f_exec = mysqli_query($conn,$sql_f);

  if ($sql_f_exec)
  {
    while ($sql_f_fetch = mysqli_fetch_assoc($sql_f_exec))
    {
      echo "
      <div class='user_box_wrapper'>
          <div class='user_box_description'>
            <strong>".$sql_f_fetch['username']." &bull; ".$sql_f_fetch['date_posted']." ".$sql_f_fetch['time_posted']."</strong>
            <p>".$sql_f_fetch['message']."</p>
          </div>
        </div>
        ";
    }
  }


 ?>
