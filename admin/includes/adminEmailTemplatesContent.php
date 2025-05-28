<!-- this is the file directory which has the administrator panel Navigation -->
<?php include(ROOT_PATH . '/admin/includes/adminPanelNavWrapper.php'); ?>
<!-- this is the file directory which has the administrator panel Navigation -->

<div id="pop_up" class="pop_up_box">

</div>


<section class="admin_panel_wrapper">
      <h3>Configuration Email Templates</h3>
<div class="emailTemplates">
  <form class="templates1" action="process.html" method="post">
    <h4>1. information for the user on account registration(Activation link)</h4>
  <textarea id="editor1" name="message1" rows="8" cols="80">
  <?php
$sql = "SELECT * FROM vw_email_templates";
$sql_exec = mysqli_query($conn,$sql);
$sql_fetch = mysqli_fetch_assoc($sql_exec);
echo $sql_fetch['account_registration_activation_link'];
   ?>
 </textarea>
  <input type="submit" id="idSmt1"  name="submit1" value="Apply">
  </form>

  <form class="templates2" action="process.html" method="post">
    <h4>2. information for the user on successful activation</h4>
    <textarea id="editor2" name="message2" rows="8" cols="80">
      <?php
    $sql = "SELECT * FROM vw_email_templates";
    $sql_exec = mysqli_query($conn,$sql);
    $sql_fetch = mysqli_fetch_assoc($sql_exec);
    echo $sql_fetch['successful_activation'];
       ?>
     </textarea>
    <input type="submit" id="idSmt2"  name="submit2" value="Apply">
  </form>


  <form class="templates3" action="process.html" method="post">
    <h4>3. information for the user on change of e-mail (activation link)</h4>
  <textarea id="editor3" name="message3" rows="8" cols="80">
    <?php
  $sql = "SELECT * FROM vw_email_templates";
  $sql_exec = mysqli_query($conn,$sql);
  $sql_fetch = mysqli_fetch_assoc($sql_exec);
  echo $sql_fetch['change_of_email_activation_link'];
     ?>
  </textarea>
  <input type="submit" id="idSmt3"  name="submit3" value="Apply">
  </form>

  <form class="templates4" action="process.html" method="post">
    <h4>4. information for the user on the success of an e-mail change (sent to new e-mail)</h4>
    <textarea id="editor4" name="message4" rows="8" cols="80">
      <?php
    $sql = "SELECT * FROM vw_email_templates";
    $sql_exec = mysqli_query($conn,$sql);
    $sql_fetch = mysqli_fetch_assoc($sql_exec);
    echo $sql_fetch['success_email_change_new'];
       ?>
     </textarea>
    <input type="submit" id="idSmt4"  name="submit4" value="Apply">
  </form>


  <form class="templates5" action="process.html" method="post">
    <h4>5. information for the user on the success of an e-mail change (sent to the previous e-mail)</h4>
  <textarea id="editor5" name="message5" rows="8" cols="80">
    <?php
  $sql = "SELECT * FROM vw_email_templates";
  $sql_exec = mysqli_query($conn,$sql);
  $sql_fetch = mysqli_fetch_assoc($sql_exec);
  echo $sql_fetch['success_email_change_old'];
     ?>
   </textarea>
  <input type="submit" id="idSmt5"  name="submit5" value="Apply">
  </form>

  <form class="templates6" action="process.html" method="post">
    <h4>6. information for the user on the change of password (activation link)</h4>
    <textarea id="editor6" name="message6" rows="8" cols="80">
      <?php
    $sql = "SELECT * FROM vw_email_templates";
    $sql_exec = mysqli_query($conn,$sql);
    $sql_fetch = mysqli_fetch_assoc($sql_exec);
    echo $sql_fetch['change_password_activation_link'];
       ?>
     </textarea>

    <input type="submit" id="idSmt6"  name="submit6" value="Apply">
  </form>


  <form class="templates7" action="process.html" method="post">
    <h4>7. information for the user on success of the password change</h4>
    <textarea id="editor7" name="message7" rows="8" cols="80">
      <?php
    $sql = "SELECT * FROM vw_email_templates";
    $sql_exec = mysqli_query($conn,$sql);
    $sql_fetch = mysqli_fetch_assoc($sql_exec);
    echo $sql_fetch['success_password_change'];
       ?>
     </textarea>
    <input type="submit" id="idSmt7"  name="submit7" value="Apply">
  </form>


  <form class="templates8" action="process.html" method="post">
    <h4>8. information for the user on vehicle additions</h4>
  <textarea id="editor8" name="message8" rows="8" cols="80">
    <?php
  $sql = "SELECT * FROM vw_email_templates";
  $sql_exec = mysqli_query($conn,$sql);
  $sql_fetch = mysqli_fetch_assoc($sql_exec);
  echo $sql_fetch['vehicle_additions'];
     ?>
   </textarea>

  <input type="submit" id="idSmt8"  name="submit8" value="Apply">
  </form>

  <form class="templates9" action="process.html" method="post">
    <h4>9. information for the user on vehicle modification</h4>
    <textarea id="editor9" name="message9" rows="8" cols="80">
      <?php
    $sql = "SELECT * FROM vw_email_templates";
    $sql_exec = mysqli_query($conn,$sql);
    $sql_fetch = mysqli_fetch_assoc($sql_exec);
    echo $sql_fetch['vehicle_modifications'];
       ?>
     </textarea>
    <input type="submit" id="idSmt9" name="submit9" value="Apply">
  </form>


  <form class="templates10" action="process.html" method="post">
    <h4>10. information to the user on the acceptance or rejection of his changes to the list brand or model</h4>
  <textarea id="editor10" name="message10" rows="8" cols="80">
    <?php
  $sql = "SELECT * FROM vw_email_templates";
  $sql_exec = mysqli_query($conn,$sql);
  $sql_fetch = mysqli_fetch_assoc($sql_exec);
  echo $sql_fetch['user_request'];
     ?>
   </textarea>
  <input type="submit" id="idSmt10" name="submit10" value="Apply">
  </form>

  <form class="templates11" action="process.html" method="post">
    <h4>11. information for the user about the receipt of the request</h4>
    <textarea id="editor11" name="message11" rows="8" cols="80">
      <?php
    $sql = "SELECT * FROM vw_email_templates";
    $sql_exec = mysqli_query($conn,$sql);
    $sql_fetch = mysqli_fetch_assoc($sql_exec);
    echo $sql_fetch['receipt_of_user_request'];
       ?>
     </textarea>
    <input type="submit" id="idSmt11" name="submit11" value="Apply">
  </form>

  <form class="templates12" action="process.html" method="post">
    <h4>12. information for the user on account blockage</h4>
  <textarea id="editor12" name="message12" rows="8" cols="80">
    <?php
  $sql = "SELECT * FROM vw_email_templates";
  $sql_exec = mysqli_query($conn,$sql);
  $sql_fetch = mysqli_fetch_assoc($sql_exec);
  echo $sql_fetch['account_blockage'];
     ?>
  </textarea>
  <input type="submit" id="idSmt12" name="submit12" value="Apply">
  </form>

  <form class="templates13" action="process.html" method="post">
    <h4>13. information for the administrator about changes on the select list</h4>
    <textarea id="editor13" name="message13" rows="8" cols="80">
      <?php
    $sql = "SELECT * FROM vw_email_templates";
    $sql_exec = mysqli_query($conn,$sql);
    $sql_fetch = mysqli_fetch_assoc($sql_exec);
    echo $sql_fetch['admin_changes_list'];
       ?>
     </textarea>
    <input type="submit" id="idSmt13" name="submit13" value="Apply">
  </form>

  <form class="templates14" action="process.html" method="post">
    <h4>14. information for the administrator about the decision</h4>
  <textarea id="editor14" name="message14" rows="8" cols="80">
    <?php
  $sql = "SELECT * FROM vw_email_templates";
  $sql_exec = mysqli_query($conn,$sql);
  $sql_fetch = mysqli_fetch_assoc($sql_exec);
  echo $sql_fetch['decision_on_user_request'];
     ?>
   </textarea>
  <input type="submit" id="idSmt14" name="submit14" value="Apply">
  </form>


  <form class="templates15" action="process.html" method="post">
    <h4>15. information for the administrator - daily report</h4>
  <textarea id="editor15" name="message15" rows="8" cols="80">
    <?php
  $sql = "SELECT * FROM vw_email_templates";
  $sql_exec = mysqli_query($conn,$sql);
  $sql_fetch = mysqli_fetch_assoc($sql_exec);
  echo $sql_fetch['daily_report'];
     ?>
   </textarea>
  <input type="submit" id="idSmt15" name="submit15" value="Apply">
  </form>



</div>
</section>



<script>
for (var i = 1; i < 16; i++)
{
  CKEDITOR.replace( 'editor'+i);
}

 <?php
 for ($t=1; $t < 16; $t++)
 {
   echo "
   $(document).ready(function()
   {

   $('.templates".$t."').submit(function(event)
   {
     event.preventDefault();
     var message = $('#editor".$t."').val();
     var submit = $('#idSmt".$t."').val();
     $('#pop_up').load('../app/helpers/emailTemplateVerify',
    {
       message".$t.": message,
       submit".$t.": submit
   });
   });
   });";
 }?>


</script>
