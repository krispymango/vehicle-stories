<div class="cookieConsentContentWrapper">
<h2>Cookie Consent</h2>
<div class="cookieConsentContent">
<?php
$sql = "SELECT * FROM vs_cookie_consent WHERE id = 1";
$sql_exec = mysqli_query($conn,$sql);
$sql_fetch = mysqli_fetch_assoc($sql_exec);
if ($sql_fetch)
{
  echo $sql_fetch['cookie'];
}
 ?>
</div>
</div>


<script type="text/javascript">
$(document).ready(function()
{
  $('#hideHeader').hide();
  $('#hideHeaderTwo').hide();
});
</script>
