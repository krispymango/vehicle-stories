<?php
if (isset($_SESSION['status']) && ($_SESSION['status'] != 1))
{
header('location:'.BASE_URL);
}
 ?>
