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
                    <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home text-white"></i>Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">CSV</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class = "container-fluid mt--7">
      <div class = "row">
        <div class = "col">
          <div class = "card shadow">
    <div class = "card-header bg-transparent">
              <h3 class = "mb-0">CSV File</h3>
              </div>
              <!----------------------------------------------------------------------->
    <!-- code -->
    <!DOCTYPE html>
<html>
 <head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <style>
  .box
  {
   max-width:600px;
   width:100%;
   margin: 0 auto;;
  }
  </style>
 </head>
 
 <body>
  <div class="container">
   <form id="upload_csv" method="post" enctype="multipart/form-data">
   <br/>
          <div class="form-group "> 
            <div class="col"> 
              <input type="file" class="form-control-file" name="csv_file" id="csv_file" accept=".csv" onchange="validate()" required>
              <input type="submit" name="upload" id="upload" value="Upload" style="margin-top:10px;" class="btn btn-info" />  
            </div> 
          </div>  
          <div style="clear:both"></div>
   </form>
  
   <div id="csv_file_data"></div>
  </div>
 </body>
</html>
<br />
</div>
<script>
  function validate(errorThrown) {
  var fileName = document.getElementById("csv_file").value;
  var dot = fileName.lastIndexOf(".") + 1;
  var extFile = fileName.substr(dot, fileName.length).toLowerCase();
  if (extFile == "csv") {
  } else {
   alert("Error: " + errorThrown);
  }
  
 }
$(document).ready(function(){
 $('#upload_csv').on('submit', function(event){
  event.preventDefault();
  $.ajax({
   url:"fetch.php",
   method:"POST",
   data:new FormData(this),
   dataType:'json',
   contentType:false,
   cache:false,
   processData:false,
   
   success:function(data)
   {
    var html = '<table class="table table-striped table-bordered">';
    if(data.column)
    {
     html += '<tr>';
     for(var count = 0; count < data.column.length; count++)
     {
      html += '<th>'+data.column[count]+'</th>';
     }
     html += '</tr>';
    }

    if(data.row_data)
    {
     for(var count = 0; count < data.row_data.length; count++)
     {
      html += '<tr>';
      html += '<td class="room_name" contenteditable>'+data.row_data[count].room_name+'</td>';
      html += '<td class="open_time" contenteditable>'+data.row_data[count].open_time+'</td>';
      html += '<td class="close_time" contenteditable>'+data.row_data[count].close_time+'</td>';
      html += '<td class="check"contenteditable></td></tr>';
      
     }
    }


    html += '<table><br />';
    html += '<div align="center"><button type="button" id="import_data" class="btn btn-success">Import</button></div>';

    $('#csv_file_data').html(html);
    $('#upload_csv')[0].reset();
    
   }

   
  })
 });

 $(document).on('click', '#import_data', function(){
  var room_name = [];
  var open_time = [];
  var close_time = [];
  $('.room_name').each(function(){
    room_name.push($(this).text());
  });
  $('.open_time').each(function(){
    open_time.push($(this).text());
  });
  $('.close_time').each(function(){
    close_time.push($(this).text());
  });
  $.ajax({
   url:"import.php",
   method:"post",
   data:{room_name:room_name, open_time:open_time, close_time:close_time},
   success:function(data)
   {
    $('#csv_file_data').html('<div class="alert alert-success">Data Imported Successfully</div>');
   }

  })
 });
});

</script>
<!----------------------------------------------------------------------->
    <!-- footer -->      
<?php include("tem-bot.php") ?>
