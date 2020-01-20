<?php include("tem-top.php") ?>
<!----------------------------------------------------------------------->
<?php   include("class.php");?>
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
                    <li class="breadcrumb-item active" aria-current="page">Add Board</li>
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
                <h3 class="mb-0">Add Controller</h3>
              </div>
              <!-- Card body -->
              <div class="card-body">
                <form method="post">
                  <div class="form-group row">
                    <label for="example-text-input" class="col-md-2 col-form-label form-control-label">Name</label>
                    <div class="col-md-10">
                      <input class="form-control form-control-alternative" placeholder="Please enter your device name." type="text" name="name">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="example-search-input" class="col-md-2 col-form-label form-control-label">IP</label>
                    <div class="col-md-10">
                      <input class="form-control form-control-alternative" type="text" placeholder="Please enter your IP Address." name="ip">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="example-email-input" class="col-md-2 col-form-label form-control-label">Install location</label>
                    <div class="col-md-10">
                      <input class="form-control form-control-alternative" type="text" placeholder="Please enter your Install location." name="install_location">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="example-url-input" class="col-md-2 col-form-label form-control-label">Detail</label>
                    <div class="col-md-10">
                      <textarea class="form-control form-control-alternative" name="detail" rows="3" style="margin-top: 0px; margin-bottom: 0px; height: 100px;"></textarea>
                    </div>
                  </div>
                  <div class="text-center">
                  <button class="btn btn-primary" type="submit" name="insert" onclick="return confirm('คุณต้องการบันทึกข้อมูลหรือไม่')">Save</button>
                </div>
                </form>
              </div>
            </div>    
<?php

  $status = 0;
  if(isset($_POST["insert"])){
      $sql = "INSERT INTO controllers (dt_inform, name, ip, install_location, detail, status)
          VALUES ('".date("Y-m-d H:i:s")."',
          '".$_POST["name"]."',
          '".$_POST["ip"]."',
          '".$_POST["install_location"]."',
          '".$_POST["detail"]."',
          '".$status."')";
      
      $db = new CnnSCV();

      $db->query("set names utf8");
    
      $error = $db->query($sql);

      $last_id = $db->insert_id;

      $sql2 = "INSERT INTO controllers_last_status (id_board, dt_update, status)
          VALUES ('".$last_id."',
          '".date("Y-m-d H:i:s")."', 
          '".$status."')";
      
      $db2 = new CnnSCV();

      $db2->query("set names utf8");
    
      $error2 = $db2->query($sql2);

      if($error2){
        
        $db->close();
        echo "<meta http-equiv=refresh content=0;url=add-boards.php?id=$last_id>";     

      }
  }
?>
<!----------------------------------------------------------------------->      
<?php include("tem-bot.php") ?>