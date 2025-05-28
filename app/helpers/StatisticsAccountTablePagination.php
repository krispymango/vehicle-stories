<?php
include '../../path.php';
include(ROOT_PATH . '/app/database/connection/conn.php');
include(ROOT_PATH . "/app/database/db/adminDb.php");

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

      if (isset($_GET['page']))
      {
        $a =  (ltrim(($_GET['page']-1), "0")).$_GET['page'];
        $page = $_GET['page'];
      }
      else
      {
        $a = 1;
        $page = 0;
      }

      if ($page > 1)
      {
        $start = ($page * $rpp) - $rpp;
      }
      else
      {
        $start = 0;
      }



  if(empty($_POST['search']))
  {
    $search = "WHERE read_msg > 0 AND user_id != '13'  GROUP BY
    	user_id ASC
    HAVING
    	COUNT( read_msg ) > 0";
      $count = ',
    	COUNT(read_msg ) > 0 AS duplicate_key';
  }
  else
  {
    $keyword =  trim($_POST['search']);
    $search = "WHERE (username LIKE '%$keyword%') OR (date_posted LIKE '%$keyword%') OR (time_posted LIKE '%$keyword%') GROUP BY
    	user_id ASC";
      $count = ',
      COUNT(read_msg ) > 0 AS duplicate_key';
  }

$resultSet =  "
SELECT
* $count
FROM
vw_contact_form
$search
LIMIT 0,$rpp";
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
