<?php
if(!empty($_FILES['csv_file']['name']))
{
 $file_data = fopen($_FILES['csv_file']['tmp_name'],'r');
 $column = fgetcsv($file_data);
 while($row = fgetcsv($file_data))
 {
  $row_data[] = array(
    'room_name'  => $row[0],  
    'open_time'  => strtotime(date($row[1])),
    'close_time' => strtotime(date($row[2])),
  );
 }
 $output = array(
  'column'  => $column,
  'row_data'  => $row_data
 );
 echo json_encode($output);
}
?>