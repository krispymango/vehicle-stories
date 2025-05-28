
<div class="mobileHeader" class="mobileNav">
  <div style="display:flex;">
    <div style="flex:8;width:100%;">
      <a href="<?php echo BASE_URL; ?>" style="text-decoration:none;height:60px;">
        <img style="height:60px;width:60px;" src="<?php echo BASE_URL . '/assets/img/vs1.png'; ?>">
        <a style="width: 100%;display: block;line-height:60px;"></a>
      </a>
    </div>
    <div onclick="ShowMenuBar()" style="flex:2; text-align:center;line-height:60px;">
    Menu   <i class="fas fa-lg fa-bars"></i>
    </div>
  </div>

</div>

<script type="text/javascript">
function ShowMenuBar()
{
$('.menuBar_wrapper').show();
}

$('div.menuBar_wrapper').click(function() { $(this).hide() });
$('div.menuBar').click(function(e) {
    e.stopPropagation();
});
function HideMenuBar()
{
$('.menuBar_wrapper').hide();
}
</script>
