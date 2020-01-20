<?php include("tem-top.php") ?>
<!----------------------------------------------------------------------->
    <!-- Header -->
    <div class="header bg-default pb-6 pt-5">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <nav aria-label="breadcrumb" class="d-none d-lg-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home text-white"></i> Home</a></li>
                    <li class="breadcrumb-item"><a href="setting.php"> Setting</a></li>
                    <li class="breadcrumb-item active" aria-current="page">List Edit Boards</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid mt--7">
<?php include("class.php");
                                
$sql = "select * from controllers
        ";
$db = new CnnSCV();
$db->query("set names utf8");
$result = $db->query($sql);

?>
      <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header border-0">
              <h3 class="mb-0">List Edit Boards</h3>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">ชื่อ</th>
                    <th scope="col">หมาเลยIP</th>
                    <th scope="col">สถานที่ติดตั้ง</th>
                    <th scope="col">วันเวลาที่ติดตั้ง</th>
                    <th scope="col">รายละเอียด</th>
                    <th scope="col">สถานะ</th>
                    <th scope="col">แก้ไขข้อมูล</th>
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
                    <td><?php echo $data["ip"]; ?></td>
                    <td><?php echo $data["install_location"]; ?></td>
                    <td><?php echo $data["dt_inform"]; ?></td>
                    <td><?php echo $data["detail"]; ?></td>                    
                    <td>
                      <?php  $status = $data["status"]; ?>
                      <label class="custom-toggle custom-toggle-success">
                      <?php if($status == "1") {?>
                      <input type="checkbox" checked>
                      <span class="custom-toggle-slider rounded-circle" data-label-on="Yes"></span></label>
                      <?php } else {?>
                      <input type="checkbox">
                      <span class="custom-toggle-slider rounded-circle" data-label-off="No"></span></label>
                      <?php } ?>
                    </td>
                    <form role="form" method="post" action="edit-board.php?id=<?php echo $data["id"]; ?>">
                    <td class="table-actions">
                      <button type="submit" class="btn btn-outline-warning btn-sm" name="btnSend" id="btnSend" value="" onclick="return confirm('คุณต้องการแก้ไขข้อมูลหรือไม่')">แก้ไข</button>                              
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
<!----------------------------------------------------------------------->      
<?php include("tem-bot.php") ?>