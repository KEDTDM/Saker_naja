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
<?php include("class.php");?>

      <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header border-0">
              <h3 class="mb-0">Add Device</h3>
            </div>
            <form method="post">
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
                  <tr>
                    <td>1
                      <input class="form-control form-control-alternative" type="text" name="id_board1" value="<?php echo $_GET["id"]; ?>">
                      <input class="form-control form-control-alternative" type="hidden" value="1" name="ch_num1"></td>
                    <td><input class="form-control form-control-alternative" type="text" name="install_dest1"></td>
                    <td><input class="form-control form-control-alternative" type="text" name="dvc_type1"></td>
                    <td><textarea class="form-control form-control-alternative" name="detail1" rows="3" style="margin-top: 0px; margin-bottom: 0px; height: 100px;"></textarea></td>
                  </tr>
                  <tr>
                    <td>2
                      
                      <input class="form-control form-control-alternative" type="hidden" value="2" name="ch_num2"></td>
                    <td><input class="form-control form-control-alternative" type="text" name="install_dest2"></td>
                    <td><input class="form-control form-control-alternative" type="text" name="dvc_type2"></td>
                    <td><textarea class="form-control form-control-alternative" name="detail2" rows="3" style="margin-top: 0px; margin-bottom: 0px; height: 100px;"></textarea></td>
                  </tr>
                  <tr>
                    <td>3
                      
                      <input class="form-control form-control-alternative" type="hidden" value="3" name="ch_num3"></td>
                    <td><input class="form-control form-control-alternative" type="text" name="install_dest3"></td>
                    <td><input class="form-control form-control-alternative" type="text" name="dvc_type3"></td>
                    <td><textarea class="form-control form-control-alternative" name="detail3" rows="3" style="margin-top: 0px; margin-bottom: 0px; height: 100px;"></textarea></td>
                  </tr>
                  <tr>
                    <td>4
                                           <input class="form-control form-control-alternative" type="hidden" value="4" name="ch_num4"></td></td>
                    <td><input class="form-control form-control-alternative" type="text" name="install_dest4"></td>
                    <td><input class="form-control form-control-alternative" type="text" name="dvc_type4"></td>
                    <td><textarea class="form-control form-control-alternative" name="detail4" rows="3" style="margin-top: 0px; margin-bottom: 0px; height: 100px;"></textarea></td>
                  </tr>
                  <tr>
                    <td>5
                     
                      <input class="form-control form-control-alternative" type="hidden" value="5" name="ch_num5"></td></td>
                    <td><input class="form-control form-control-alternative" type="text" name="install_dest5"></td>
                    <td><input class="form-control form-control-alternative" type="text" name="dvc_type5"></td>
                    <td><textarea class="form-control form-control-alternative" name="detail5" rows="3" style="margin-top: 0px; margin-bottom: 0px; height: 100px;"></textarea></td>
                  </tr>
                  <tr>
                    <td>6
                      
                      <input class="form-control form-control-alternative" type="hidden" value="6" name="ch_num6"></td></td>
                    <td><input class="form-control form-control-alternative" type="text" name="install_dest6"></td>
                    <td><input class="form-control form-control-alternative" type="text" name="dvc_type6"></td>
                    <td><textarea class="form-control form-control-alternative" name="detail6" rows="3" style="margin-top: 0px; margin-bottom: 0px; height: 100px;"></textarea></td>
                  </tr>
                  <tr>
                    <td>7
                   
                      <input class="form-control form-control-alternative" type="hidden" value="7" name="ch_num7"></td></td>
                    <td><input class="form-control form-control-alternative" type="text" name="install_dest7"></td>
                    <td><input class="form-control form-control-alternative" type="text" name="dvc_type7"></td>
                    <td><textarea class="form-control form-control-alternative" name="detail7" rows="3" style="margin-top: 0px; margin-bottom: 0px; height: 100px;"></textarea></td>
                  </tr>
                  <tr>
                    <td>8
                      <input class="form-control form-control-alternative" type="hidden" value="8" name="ch_num8"></td></td>
                    <td><input class="form-control form-control-alternative" type="text" name="install_dest8"></td>
                    <td><input class="form-control form-control-alternative" type="text" name="dvc_type8"></td>
                    <td><textarea class="form-control form-control-alternative" name="detail8" rows="3" style="margin-top: 0px; margin-bottom: 0px; height: 100px;"></textarea></td>
                  </tr>
                </tbody>
              </table>
            </div>
                    <div class="card-footer border-0">
                      <div class="row">
                        <div class="col-12 text-center">
                          
                          <button class="btn btn-primary" type="submit" name="insert" onclick="return confirm('คุณต้องการบันทึกข้อมูลหรือไม่')">Save</button>
                        </div>
                      </div>
                    </div>
            </form>
          </div>
        </div>
      </div>

    </div>
<?php

  $status = 0;
 if(isset($_POST["insert"])){
  
  $db = new CnnSCV();

  $db->query("set names utf8");
  
  $ary = array();
  
  for ($i = 1; $i<=8; $i++){
      { 
        $temp = "('".$_POST["id_board1"]."',
          '".$_POST["ch_num$i"]."',
          '".$_POST["install_dest$i"]."',
          '".$_POST["dvc_type$i"]."',
          '".$_POST["detail$i"]."',
          '".$status."')";
        
        $ary[]= $temp;
      }
  }
  
  $sql = sprintf("INSERT INTO devices (id_board, ch_num, install_dest, dvc_type, detail, status)
          VALUES %s", implode(",",$ary)); 
  
  $error = $db->query($sql);
  
  $db2 = new CnnSCV();

  $db2->query("set names utf8");
  
  $ary2 = array();
  
  for ($i = 1; $i<=8; $i++){
      { 
        $temp2 = "('".$_POST["id_board1"]."',
          '".$_POST["ch_num$i"]."',
          '".date("Y-m-d H:i:s")."',
          '".$status."')";
        
        $ary2[]= $temp2;   
      }
  }
  
  $sql2 = sprintf("INSERT INTO devices_last_status (id_board, ch_num, dt_poll, status)
          VALUES %s", implode(",",$ary2));

  $error2 = $db->query($sql2);
      
      if($error2){
        $db->close();
        echo "<meta http-equiv=refresh content=0;url=device.php>";      
        }
}
?>
         
<!----------------------------------------------------------------------->      
<?php include("tem-bot.php") ?>
