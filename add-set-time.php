<?php include("tem-top.php") ?>
<!----------------------------------------------------------------------->
<script src="jquery-1.11.1.min.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#controllers').change(function() {
                    $.ajax({
                        type: 'POST',
                        data: {controllers: $(this).val()},
                        url: 'select-add.php',
                        success: function(data) {
                        	//alert(data);
                            $('#devices').html(data);
                        }
                    });
                    return false;
                });
            });
        </script>
<?php include("class.php");
/*select * from devices inner join controllers on devices.id_board = controllers.id*/
$sql = "select * from devices";
$db = new CnnSCV();
$db->query("set names utf8");
$result = $db->query($sql);

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
                    <li class="breadcrumb-item"><a href="set.php"> Set time</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add Set time</li>
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
              <h3 class="col text-left" class="mb-0">Add Set time</h3>
                <div class="col text-right">
                  <a href="add-set-time.php" class="btn btn-sm btn-outline-success">Upload</a>
                </div>
              </div>
              
              <!-- Card body -->
              <div class="card-body">
                <form method="post">
                  <div class="form-group row">
                    <label for="example-text-input" class="col-md-2 col-form-label form-control-label">ROOM</label>
                    <div class="col-md-10">
                        <select class="form-control form-control-alternative" name="controllers" id="controllers">
                  	    	<option value="">เลือกห้อง</option>
                  	    <?php
							    while($data = mysqli_fetch_array($result)) 
							    {
				  		?>
                      		<option value="<?php echo $data["id"]; ?>"><?php echo $data["install_dest"]; ?></option>
                        <?php
							    }
						?>
                    	</select>
                    </div>
                  </div>
                  <div class="form-group row">
                       <label for="example-search-input" class="col-md-2 col-form-label form-control-label">OPEN</label>
                      <div class="col-md-10">
                      <div class="input-group input-group-alternative">
                          <div class="input-group-prepend">
                              <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                          </div>
                          <input class="form-control form-control-alternative" type="datetime-local" value="" name="open_time" id="open_time">
                      </div>
                      </div>
                  </div>
                  <div class="form-group row">
                       <label for="example-search-input" class="col-md-2 col-form-label form-control-label">CLOSE</label>
                      <div class="col-md-10">
                      <div class="input-group input-group-alternative">
                          <div class="input-group-prepend">
                              <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                          </div>
                          <input class="form-control form-control-alternative" type="datetime-local" value="" name="close_time" id="close_time">
                      </div>
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
      $sql = "INSERT INTO set_time (id_board, ch_num, open_time, close_time)
          VALUES ('".$_POST["controllers"]."',
          '".$_POST["devices"]."',
          '".$_POST["open_time"]."',
          '".$_POST["close_time"]."')";
      echo "$sql";
      $db = new CnnSCV();

      $db->query("set names utf8");
    
      $error = $db->query($sql);

      if($error){
        
        $db->close();
        echo "<script language=\"JavaScript\">";
        echo "alert('เพิ่มข้อมูลเรียบร้อยแล้ว')";
        echo "</script>";
        echo "<meta http-equiv=refresh content=0;url=set.php>";     

      }
  }
?>
<!----------------------------------------------------------------------->      
<?php include("tem-bot.php") ?>
