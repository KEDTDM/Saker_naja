<?php
?>

<div class="container-fluid mt--7">
<?php include("class.php");
                                
$sql = "select set_time.*, controllers.name, devices.install_dest from set_time
left join devices on set_time.id_board = devices.id_board and set_time.ch_num = devices.ch_num
left join controllers on set_time.id_board = controllers.id";
$db = new CnnSCV();
$db->query("set names utf8");
$result = $db->query($sql);

?>
      <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Set time</h3>
                </div>
                <div class="col text-right">
                  <a href="add-set-time.php" class="btn btn-sm btn-outline-success">Add Set time</a>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">ชื่อ</th>
                    <th scope="col">ปลายทาง</th>
                    <th scope="col">วันที่และเวลาเปิด</th>
                    <th scope="col">วันที่และเวลาปิด</th>
                    <th scope="col">แก้ไข</th>
                    <th scope="col">ลบ</th>
                  </tr>
                </thead>
                <tbody>
<?php

if ($result)
  {
    while($data = mysqli_fetch_array($result)) 
    {

?>
                  <tr>
                    <td><?php echo $data["name"]; ?></td>
                    <td><?php echo $data["install_dest"]; ?></td>
                    <td><?php echo $data["open_time"]; ?></td>
                    <td><?php echo $data["close_time"]; ?></td>
                    <td>
                      <form role="form" method="post" action="edit-set.php?id=<?php echo $data["id"]; ?>">
                      <button type="submit" class="btn btn-outline-warning btn-sm" name="edit" id="edit" value="" onclick="return confirm('คุณต้องการแก้ไขข้อมูลหรือไม่')">แก้ไข</button>                              
                    </td></form>                   
                    <td>
                      <form role="form" method="post" action="del-set.php?id=<?php echo $data["id"]; ?>">
                      <button type="submit" class="btn btn-outline-danger btn-sm" name="delete" id="delete" value="" onclick="return confirm('คุณต้องการลบข้อมูลหรือไม่')">ลบ</button>                              
                    </td></form>
                  </tr>
<?php
    }
  }
$db->close();
?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>




