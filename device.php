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
                    <li class="breadcrumb-item active" aria-current="page">Devices</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid mt--7">
<?php include("class.php");
                                
$sql = "select * from devices
        inner join devices_last_status 
        on devices.id_board = devices_last_status.id_board
        and devices.ch_num = devices_last_status.ch_num";
$db = new CnnSCV();
$db->query("set names utf8");
$result = $db->query($sql);

?>
      <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header border-0">
              <h3 class="mb-0">Devices</h3>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">ปลายทาง</th>
                    <th scope="col">อุปกรณ์</th>
                    <th scope="col">รายละเอียด</th>
                    <th scope="col">เวลาสถานะล่าสุด</th>
                    <th scope="col">สถานะ</th>
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
                    <td><?php echo $data["install_dest"]; ?></td>
                    <td><?php echo $data["dvc_type"]; ?></td>
                    <td><?php echo $data["detail"]; ?></td>
                    <td><?php echo $data["dt_poll"]; ?></td>                    
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