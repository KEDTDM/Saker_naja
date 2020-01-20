<?php

if(!empty($_FILES['csv_file']['name']))
{
 $file_data = fopen($_FILES['csv_file']['name'], 'r');
 fgetcsv($file_data);
 while($row = fgetcsv($file_data))
 {
  $data[] = array(
   'room_name' => $row[0],
   'open_time'  => date("y-M-d H:m:s",strtotime($row[1])),
   'close_time' => date("y-M-d H:m:s",strtotime($row[2])), 
  );
 }
 echo json_encode($data);
}

?>
<?php

if(isset($_POST["room_name"]))
{
  
 $connect = new PDO("mysql:host=localhost;dbname=roomtest", "root", "");
 $room_name = $_POST["room_name"];
 $open_time = $_POST["open_time"];
 $close_time = $_POST["close_time"];
 for($count = 0; $count < count($room_name); $count++)
 {
  $query .= "
  INSERT INTO roomtest1(room_name,open_time,close_time) 
  VALUES ('".$room_name[$count]."','".$open_time[$count]."', '".$close_time[$count]."');
  ";
 }
 $statement = $connect->prepare($query);
 $statement->execute();
}

?>