<?php

if (isset($_SESSION['status']) && ($_SESSION['status'] == 1) && ($_GET['admin_allow'] =='yes'))
{

}
elseif (isset($_SESSION['status']) && ($_SESSION['status'] != 0))
{
header('location:'.BASE_URL);
}

 ?>
