<?php
include 'path.php';
session_start();
unset($_SESSION['id']);
unset($_SESSION['email']);
unset($_SESSION['username']);
unset($_SESSION['user']);
unset($_SESSION['status']);
unset($_SESSION['user_image']);
unset($_SESSION['sender_id']);
unset($_SESSION['avatar']);
session_destroy();
header("location:" .BASE_URL);
 ?>
