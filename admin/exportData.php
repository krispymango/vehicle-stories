<?php
// Load the database configuration file
include("../path.php");
include("../app/database/connection/conn.php");
include("../controllers/adminMiddleware.php");


// Fetch records from database
$query = $conn->query("SELECT * FROM vw_vehicle_details ORDER BY id ASC");

if($query->num_rows > 0){
    $delimiter = ",";
    $filename = "vehicle-stories-data_" . date('Y-m-d') . ".csv";

    // Create a file pointer
    $f = fopen('php://memory', 'w');
    // Set column headers
    $fields = array('id',
    'username',
  'email',
  'date of user registration',
  'date of last user login',
  'ip of registration',
  'ip of last login',
  'vehicle type',
  'brand',
  'model',
  'year of production',
  'engine capacity',
  'power',
  'fuel type',
  'transmission',
  'drive',
  'max speed',
  'number of doors',
  'number of seats',
  'mileage',
  'country of origin',
  'estimated value',
  'year of purchase by current owner',
  'place of parking - vovoidship',
  'place of parking - poviat',
  'announcement',
  'Number of days until the end of announcement emission',
  'Number of added images',
  'Date of vehicle addition',
  'Date of last modification of the vehicle',
  'Number of visits in a defined time period');
    fputcsv($f, $fields, $delimiter);

    // Output each row of the data, format line as csv and write to file pointer
    while($row = $query->fetch_assoc())
    {
      $no_of_photos = 0;
      if (!empty($row['main_photo']))
      {
        $no_of_photos = $no_of_photos+1;
      }
      if (!empty($row['photo_one']))
      {
        $no_of_photos = $no_of_photos+1;
      }
      if (!empty($row['photo_two']))
      {
        $no_of_photos = $no_of_photos+1;
      }
      if (!empty($row['photo_three']))
      {
        $no_of_photos = $no_of_photos+1;
      }
      if (!empty($row['photo_four']))
      {
        $no_of_photos = $no_of_photos+1;
      }
      if (!empty($row['photo_five']))
      {
        $no_of_photos = $no_of_photos+1;
      }
      if (!empty($row['photo_six']))
      {
        $no_of_photos = $no_of_photos+1;
      }
      if (!empty($row['photo_seven']))
      {
        $no_of_photos = $no_of_photos+1;
      }
      if (!empty($row['photo_eight']))
      {
        $no_of_photos = $no_of_photos+1;
      }
      if (!empty($row['photo_nine']))
      {
        $no_of_photos = $no_of_photos+1;
      }
      if (!empty($row['photo_ten']))
      {
        $no_of_photos = $no_of_photos+1;
      }
      if (!empty($row['photo_eleven']))
      {
        $no_of_photos = $no_of_photos+1;
      }
      if (!empty($row['photo_twelve']))
      {
        $no_of_photos = $no_of_photos+1;
      }
      if (!empty($row['photo_thirteen']))
      {
        $no_of_photos = $no_of_photos+1;
      }
      if (!empty($row['photo_fourteen']))
      {
        $no_of_photos = $no_of_photos+1;
      }
      if (!empty($row['photo_fifteen']))
      {
        $no_of_photos = $no_of_photos+1;
      }
      if (!empty($row['photo_sixteen']))
      {
        $no_of_photos = $no_of_photos+1;
      }
      if (!empty($row['photo_seventeen']))
      {
        $no_of_photos = $no_of_photos+1;
      }
      if (!empty($row['photo_eighteen']))
      {
        $no_of_photos = $no_of_photos+1;
      }
      if (!empty($row['photo_nineteen']))
      {
        $no_of_photos = $no_of_photos+1;
      }
      if (!empty($row['photo_twenty']))
      {
        $no_of_photos = $no_of_photos+1;
      }
      $date1 = date('Y-m-d');
      $date2 = $row['announcement_expire_date'];

$diff = strtotime($date2) - strtotime($date1);

$days = $diff / (60*60*24);


        //$status = ($row['status'] == 1)?'Active':'Inactive';
        $lineData = array
        (
         $row['id'],
         $row['username'],
         $row['email'],
         $row['date_of_registration'],
         $row['last_login_date'],
         $row['ip_of_registration'],
         $row['ip_of_last_login'],
         $row['type_of_vehicle'],
         $row['brand'],
         $row['model'],
         $row['year_of_production'],
         $row['engine_capacity'],
         $row['engine_power'],
         $row['fuel_type'],
         $row['transmission'],
         $row['drive'],
         $row['max_speed'],
         $row['no_of_doors'],
         $row['no_of_seats'],
         $row['mileage'],
         $row['country_of_origin'],
         $row['estimated_value'],
         $row['y_o_p_b_c_o'],
         $row['location_voivodship'],
         $row['location_district'],
         $row['announcement'],
         $days,
         $no_of_photos,
         $row['date_added'].$row['time_added'],
         $row['last_modification'],
         '5'
         //$status
       );
        fputcsv($f, $lineData, $delimiter);
    }

    // Move back to beginning of file
    fseek($f, 0);

    // Set headers to download file rather than displayed
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '";');

    //output all remaining data on a file pointer
    fpassthru($f);
}
exit;

?>
