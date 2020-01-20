<?php include("tem-top.php") ?>
<!----------------------------------------------------------------------->
<?php   include("class.php");
  $id = $_GET["id"];
  
  $sql = "select * from controllers where id = $id";
  $db = new CnnSCV();
  $db->query("set names utf8");
  $result = $db->query($sql);

  $sql2 = "select * from devices where id_board = $id";
  $db2 = new CnnSCV();
  $db2->query("set names utf8");
  $result2 = $db2->query($sql2);

  $data = mysqli_fetch_array($result);
?>
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
                    <li class="breadcrumb-item"><a href="list-edit-board.php"> List Edit Boards</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Board</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
<div class="container-fluid mt--7">
<div class="card shadow">
              

              <!-- Card header -->
              <div class="card-header">
                <h3 class="mb-0">Edit Board</h3>
              </div>
              <!-- Card body -->
              <div class="card-body">
                <div class="nav-wrapper">
                  <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                      <li class="nav-item">
                          <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab" href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true"><i class="ni ni-support-16 mr-2"></i>Controller</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab" href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false"><i class="ni ni-briefcase-24 mr-2"></i>Devices</a>
                      </li>
                  </ul>
              </div>
              <form method="post">
              <div class="card shadow">
                  <div class="card-body">
                      <div class="tab-content" id="myTabContent">
                          <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">
                              <div class="form-group row">
                                <label for="example-text-input" class="col-md-2 col-form-label form-control-label">Name</label>
                                <div class="col-md-10">
                                  <input class="form-control form-control-alternative" value ="<?php echo $data["name"]; ?>" type="text" name="name">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="example-text-input" class="col-md-2 col-form-label form-control-label">IP</label>
                                <div class="col-md-10">
                                  <input class="form-control form-control-alternative" type="text" value ="<?php echo $data["ip"]; ?>" name="ip">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="example-text-input" class="col-md-2 col-form-label form-control-label">Install location</label>
                                <div class="col-md-10">
                                  <input class="form-control form-control-alternative" type="text" value ="<?php echo $data["install_location"]; ?>" name="install_location">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="example-url-input" class="col-md-2 col-form-label form-control-label">Detail</label>
                                <div class="col-md-10">
                                  <textarea class="form-control form-control-alternative" name="detail" rows="3" style="margin-top: 0px; margin-bottom: 0px; height: 100px;"><?php echo $data["detail"]; ?></textarea>
                                </div>
                              </div>
                          </div>
                          <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel" aria-labelledby="tabs-icons-text-2-tab">
                              <div class="table-responsive">
                                <table class="table align-items-center table-flush">
                                  <thead class="thead-light">
                                    <tr>
                                      <th scope="col" width="1">Channel</th>
                                      <th scope="col">Destination</th>
                                      <th scope="col">type</th>
                                      <th scope="col">detail</th>
                                    </tr>
                                  </thead>
                                  <tbody> 
                                    <?php

                                    if ($result2)
                                      {
                                        $i =0;
                                        while($data2 = mysqli_fetch_array($result2)) 
                                        {
                                          $i = $i + 1;
                                    ?>
                                    <tr>
                                      <td><input class="form-control form-control-alternative" type="hidden" name="id<?php echo $i;?>" value="<?php echo $data2["id"];?>" name="ch_num6"><?php echo $data2["ch_num"]; ?></td>
                                      <td><input class="form-control form-control-alternative" type="text" name="install_dest<?php echo $i;?>" value="<?php echo $data2["install_dest"]; ?>"></td>
                                      <td><input class="form-control form-control-alternative" type="text" name="dvc_type<?php echo $i;?>" value="<?php echo $data2["dvc_type"]; ?>"></td>
                                      <td><textarea class="form-control form-control-alternative" name="details<?php echo $i;?>" rows="3" style="margin-top: 0px; margin-bottom: 0px; height: 100px;"><?php echo $data2["detail"]; ?></textarea></td>
                                    </tr>
                                    <?php
                                        }
                                      }
                                    ?>
                                  </tbody>
                                </table>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
                
                  <br>
                  <div class="text-center">
                  <button class="btn btn-primary" type="submit" name="update" onclick="return confirm('คุณต้องการบันทึกแก้ไขข้อมูลหรือไม่')">Save</button>
                  <input type="hidden" name="hdnLine" value="<?php echo $i;?>">
                  <button class="btn btn-secondary" type="submit" name="cancel" onclick="return confirm('คุณต้องการยกเลิกแก้ไขข้อมูลหรือไม่')">Cancel</button>
                </div>
                </form>
              </div>
            </div>    
<?php

  $status = 0;
if(isset($_POST["update"])){
    $name = $_POST["name"];
    $ip = $_POST["ip"];
    $install_location = $_POST["install_location"];
    $detail = $_POST["detail"];

    $sql = "update controllers
            set name = '$name',
            ip = '$ip',
            install_location = '$install_location',
            detail = '$detail'
            where id = $id";

    $db = new CnnSCV();
    $db->query("set names utf8");
    $result = $db->query($sql);

    for($i=1;$i<=$_POST["hdnLine"];$i++)
  {
    $sql2 = "UPDATE devices SET ";
    $sql2 .="install_dest = '".$_POST["install_dest$i"]."' ";
    $sql2 .=",dvc_type = '".$_POST["dvc_type$i"]."' ";
    $sql2 .=",detail = '".$_POST["details$i"]."' ";
    $sql2 .="WHERE id = '".$_POST["id$i"]."' ";
    $db2 = new CnnSCV();
    $db2->query("set names utf8");
    $result2 = $db2->query($sql2);
  }
    if($result2){
      echo "<script language=\"JavaScript\">";
      echo "alert('แก้ไขข้อมูลเรียบร้อยแล้ว')";
      echo "</script>";
      echo "<meta http-equiv=refresh content=0;url=list-edit-board.php>";
    }
    else $error = $db->query($sql);
}
    if(isset($_POST["cancel"])){
      echo "<meta http-equiv=refresh content=0;url=list-edit-board.php>"; 
    }   
    $db->close();
?>
<!----------------------------------------------------------------------->      
<?php include("tem-bot.php") ?>