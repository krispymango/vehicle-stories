<div class="rulesContentWrapper">
<h2>Rules</h2>
<div class="rulesContent">
<?php
$sql = "SELECT * FROM vw_rules WHERE id = 1";
$sql_exec = mysqli_query($conn,$sql);
$sql_fetch = mysqli_fetch_assoc($sql_exec);
if ($sql_fetch)
{
  echo $sql_fetch['rules'];
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
