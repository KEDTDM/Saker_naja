<?php
	include("class.php");
	
	$id = $_GET["id"];
	$sql = "delete from set_time where id = $id";
	$db = new CnnSCV();
	$db->query("set names utf8");
	$result = $db->query($sql);

	if($result){
		echo "<script language=\"JavaScript\">";
        echo "alert('ข้อมูลถูกลบเรียบร้อยแล้ว')";
        echo "</script>";
		echo "<meta http-equiv=refresh content=0;url=set.php>";
		}
		else $error = $db->query($sql);
$db->close();
?>