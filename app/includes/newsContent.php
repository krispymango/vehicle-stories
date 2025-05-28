<div class="newsContentWrapper">
<h2>News</h2>
<div class="newsContent">
  <?php
  $f_sql = "SELECT * FROM vs_news ORDER BY id DESC";
  $f_sql_exec = mysqli_query($conn,$f_sql);
  $f_sql_num = mysqli_num_rows($f_sql_exec);
  if ($f_sql_exec)
  {
    while ($f_sql_fetch = mysqli_fetch_assoc($f_sql_exec))
    {
      echo "<div>
    <h3>".$f_sql_fetch['heading']."</h3>
    <p>".$f_sql_fetch['news']."</p>
      </div>";
    }
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
