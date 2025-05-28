<?php

$conn = new mysqli('hostname','username','password','database');
if (!$conn)
{
die('Connection Failed' . $conn->connect_error);
}

 ?>
