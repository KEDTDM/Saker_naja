<?php include("class.php");
$db = new CnnSCV();
$controllers_id = isset($_POST['controllers']) ? $_POST['controllers'] : "1";
//print_r($_POST);
$query = "SELECT * FROM devices WHERE id_board ='{$controllers_id}'";
$sql = $db->query($query);
//echo "$query";
$result = $sql->num_rows;
if ($result > 0) {
    while ($data = $sql->fetch_array()) {
        echo "<option value=\"" . $data['ch_num'] . "\">" . $data['install_dest'] . "</option>";
    }
}else{
    echo "<option value=\"\">ไม่มีสินค้าในหมวดหมู่ที่เลือก</option>";

}
$sql->free();
$db->close();
?>