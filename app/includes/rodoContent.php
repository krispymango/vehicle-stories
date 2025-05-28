<div class="rodoContentWrapper">
<h2>RODO</h2>
<div class="rodoContent">
  <?php
  $sql = "SELECT * FROM vw_rodo WHERE id = 1";
  $sql_exec = mysqli_query($conn,$sql);
  $sql_fetch = mysqli_fetch_assoc($sql_exec);
  if ($sql_fetch)
  {
    echo $sql_fetch['rodo'];
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
