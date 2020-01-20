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
                    <li class="breadcrumb-item active" aria-current="page">Setting</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class = "container-fluid mt--7">
      <div class = "row">
        <div class = "col">
          <div class = "card shadow">
            <div class = "card-header bg-transparent">
              <h3 class = "mb-0">Setting</h3>
            </div>
            <div class="card-body">
              	<div class= "row icon-examples text-center">
           			<div class = "col-sm">
			            <div class ="card shadow"><br>
			            	<i class="fas fa-plus-circle fa-5x text-center text-success"></i>
				  			<div class="card-body">
				    			<p class="card-text">หากต้องการเพิ่มอุปกรณ์บอร์ดคลิกที่ปุ่มด้านล่าง</p>
				    			<a href="add-board.php" class="btn btn-outline-success">Add Board</a>
				  			</div>
						</div>
						<br>
					</div>
					<div class = "col-sm">
			          	<div class="card shadow"><br>
			            	<i class="fas fa-edit fa-5x text-center text-warning"></i>
			  				<div class="card-body">
								<p class="card-text">หากต้องการแก้ไขข้อมูลบอร์ดต่าง ๆ คลิกที่ปุ่มด้านล่าง</p>
								<a href="list-edit-board.php" class="btn btn-outline-warning">Edit Board</a>
							</div>
						</div>
						<br>
					</div>
					<div class = "col-sm">
						<div class="card shadow"><br>
							<i class="fas fa-trash-alt fa-5x text-center text-danger"></i>
							<div class="card-body">
								<p class="card-text">หากต้องการลบข้อมูลบอร์ด คลิดที่ปุ่มด้านล่าง</p>
								<a href="list-del-board.php" class="btn btn-outline-danger">Delete Board</a>
							</div>
						</div>
					</div>
				</div>
			</div>
          </div>
        </div>
      </div>
<!----------------------------------------------------------------------->      
<?php include("tem-bot.php") ?>