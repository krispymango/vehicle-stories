<?php
include '../../path.php';
include(ROOT_PATH . '/app/database/connection/conn.php');
include(ROOT_PATH . "/app/database/db/userDb.php");
if (isset($_POST['entries']))
{
  $rpp = $_POST['entries'];
}
elseif (isset($_GET['entries']))
{
  $rpp = $_GET['entries'];
}
else
{
    $rpp = 10;
}


  if(empty($_POST['search']))
  {
    $search = "WHERE user_id =".$_SESSION['user_idd']." AND verified = 1";
  }
  else
  {
    $keyword =  trim($_POST['search']);
    $search = "WHERE verified = 1 AND (type_of_vehicle LIKE '%$keyword%') OR (brand LIKE '%$keyword%') OR (model LIKE '%$keyword%') OR (year_of_production LIKE '%$keyword%') OR (date_added LIKE '%$keyword%') OR (last_modification LIKE '%$keyword%') AND user_id =".$_SESSION['user_idd']."";
  }


$resultSet = "SELECT * FROM vw_vehicle_details $search  ORDER BY brand ASC";
$resultSetExec = mysqli_query($conn,$resultSet);
$numRows = mysqli_num_rows($resultSetExec);
$totalPages = round($numRows / $rpp);
//die($resultSet);
//die($totalPages);


// Look for a GET variable page if not found default is 1.
if (isset($_GET["page"]))
{
$a = $_GET["page"];
$page  = $_GET["page"];
}
else
{
$a = 1;
$page=1;
}


if($page>=2)
{
 echo "<a href='?page=".($page-1)."&entries=".$rpp."'>  Prev </a>";
}
for($a; $a <= $totalPages; $a++)
{
  echo "<a href='?page=".$a."&entries=".$rpp."'>".$a."</a>";

}
if($page < $totalPages)
{
 echo "<a href='?page=".($page+1)."&entries=".$rpp."'>  Next </a>";
}
//echo $val+1;


 ?>
