<?php include("tem-top.php") ?>
<!----------------------------------------------------------------------->
<script src="jquery-1.11.1.min.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#controllers').change(function() {
                    $.ajax({
                        type: 'POST',
                        data: {controllers: $(this).val()},
                        url: 'select-edit.php',
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
    $id = $_GET["id"];
    $sql = "select * from set_time inner join controllers on set_time.id_board = controllers.id WHERE set_time.id ='$id'
            ";
    $db = new CnnSCV();
    $db->query("set names utf8");
    $result = $db->query($sql);
    $data = mysqli_fetch_array($result);
    $id1 = $data["id_board"];
    $sql1 = "select * from devices where id_board = $id1";
    $db1 = new CnnSCV();
    $db1->query("set names utf8");
    $result1 = $db->query($sql1);


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
                <h3 class="mb-0">Add Set time</h3>
              </div>
              <!-- Card body -->
              <div class="card-body">
                <form method="post">
                  <div class="form-group row">
                    <label for="example-text-input" class="col-md-2 col-form-label form-control-label">Name</label>
                    <div class="col-md-10">
                        <select class="form-control form-control-alternative" name="controllers" id="controllers" disabled>
                            <option selected value="<?php echo $data["id_board"]; ?>"><?php echo $data["name"]; ?></option>
                        </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="example-search-input" class="col-md-2 col-form-label form-control-label">DESTINATION</label>
                    <div class="col-md-10">
                        <select class="form-control form-control-alternative" name="devices" id="devices">
                        
                        <?php 
                          while($data1 = mysqli_fetch_array($result1)) 
                            {
                              if($data1["ch_num"] == $data["ch_num"])
                              { 
                        ?>
                                <option selected value="<?php echo $data1["ch_num"]; ?>"><?php echo $data1["install_dest"]; ?></option>
                        <?php 
                              }
                              else 
                              {
                        ?>
                                <option value="<?php echo $data1["ch_num"]; ?>"><?php echo $data1["install_dest"]; ?></option>
                        <?php   
                              }
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
                          <input class="form-control form-control-alternative" value ="<?php echo $data["open_time"]; ?>" type="text" name="open_time">
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
                          <input class="form-control form-control-alternative" value ="<?php echo $data["close_time"]; ?>" type="text" name="close_time">
                      </div>
                      </div>
                  </div>
                  <div class="text-center">
                  <button class="btn btn-primary" type="submit" name="update" onclick="return confirm('คุณต้องการบันทึกข้อมูลหรือไม่')">Save</button>
                  <button class="btn btn-secondary" type="submit" name="cancel" onclick="return confirm('คุณต้องการยกเลิกแก้ไขหรือไม่')">cancel</button>
                </div>
                </form>
              </div>     
            </div>
<?php
if(isset($_POST["update"])){
    $ch_num = $_POST["devices"];
    $open_time = $_POST["open_time"];
    $close_time = $_POST["close_time"];

    $sql = "update set_time
    set ch_num = '$ch_num',
    open_time = '$open_time',
    close_time = '$close_time'
    where id = $id";
    echo "$sql";
    $db = new CnnSCV();
    $db->query("set names utf8");
    $result = $db->query($sql);

    if($result){
        echo "<script language=\"JavaScript\">";
        echo "alert('แก้ไขข้อมูลเรียบร้อยแล้ว')";
        echo "</script>";
        echo "<meta http-equiv=refresh content=0;url=set.php>";
    }
    else $error = $db->query($sql); echo "$error";
    }
    if(isset($_POST["cancel"])){
    echo "<meta http-equiv=refresh content=0;url=set.php>"; 
    }   
$db->close();
?>

<!----------------------------------------------------------------------->      
<?php include("tem-bot.php") ?>