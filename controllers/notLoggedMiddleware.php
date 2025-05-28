<?php
if (!isset($_SESSION['id']) && !isset($_SESSION['username']) && !isset($_SESSION['user_image']))
{
session_destroy();
header('location:'.BASE_URL);
}
 ?>
