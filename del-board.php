<?php
	include("class.php");
	$id = $_GET["id"];
	$sql = "update controllers
			set status = '0'
			where id = $id";
	$db = new CnnSCV();
	$db->query("set names utf8");
	$result = $db->query($sql);		

	$sql2 = "update devices
			set status = '0'
			where id_board = $id";
	
	$db2 = new CnnSCV();
	$db2->query("set names utf8");
	$result2 = $db2->query($sql2);

	if($result2){
		echo "<script language=\"JavaScript\">";
        echo "alert('ข้อมูลถูกลบเรียบร้อยแล้ว')";
        echo "</script>";
		echo "<meta http-equiv=refresh content=0;url=list-del-board.php>";
		}
		else $error = $db2->query($sql2);		

$db->close();
?>