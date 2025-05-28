<div class="aboutContentWrapper">
<h2>About Vehicle Stories</h2>
<div class="aboutContent">
<?php
$sql = "SELECT * FROM vw_about WHERE id = 1";
$sql_exec = mysqli_query($conn,$sql);
$sql_fetch = mysqli_fetch_assoc($sql_exec);
if ($sql_fetch)
{
  echo $sql_fetch['about'];
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
