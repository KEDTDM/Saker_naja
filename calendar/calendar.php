<?php

require_once('connect.php');

$sql = "SELECT id, title, start, end, color FROM events ";

$req = $bdd->prepare($sql);
$req->execute();

$events = $req->fetchAll();


?>

<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">

	<title>Full calendar </title>

	<!-- Favicon -->
	<link href="../assets/img/brand/favicon.png" rel="icon" type="image/png">
	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
	<!-- Icons -->
	<link href="../assets/js/plugins/nucleo/css/nucleo.css" rel="stylesheet" />
	<link href="../assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" />

	<!-- CSS Files -->
	<link href="../assets/css/argon-dashboard.css?v=1.1.0" rel="stylesheet" />
	<!-- Bootstrap Core CSS -->

	<link href="../css_calendar/css/bootstrap.min.css" rel="stylesheet">

	<!-- Icon Files -->
	<link href="../path/font-awesome/css/font-awesome.min.css" rel="stylesheet" />

	<!-- fullcalendarCore CSS -->
	<link href='../css_calendar/lib/fullcalendar.min.css' rel='stylesheet' />

	<!--   jquery-ui-timepicker  -->
	<link rel="stylesheet" media="all" type="text/css" href="../css_calendar/jquerydatepicker/jquery-ui.css" />
	<link rel="stylesheet" media="all" type="text/css" href="../css_calendar/jquerydatepicker/jquery-ui-timepicker-addon.css" />

</head>

<body>
	<!--css  -->
	<style>
		body {
			height: 100%;
			margin: 0;
			padding-top: 10px;

		}

		.le {
			margin-left: 200px;
			margin-bottom: 20px;


		}

		#calendar {
			max-width: 800px;
		}

		.col-centered {
			float: none;
			margin: 0 auto;
		}
	</style>



	<?php include('../includes/navbar.php');   ?>






	<!-- Page Content -->
	<div class="container">

		<div class="row">

			<div class="col-md col-lg-12 ">

				<button type="button" class="btn btn-primary btn-sm le" data-toggle="modal" data-target="#ModalAdd"> เพิ่มข้อมูล </button>
				</button>
				<!-- calendar -->
				<div id="calendar" class="col-centered">

				</div>
			</div>

		</div>

		<!-- /.row -->

		<!-- Modal -->
		<div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<!-- addEvent.php -->
					<form class="form-horizontal" method="POST" action="addEvent.php">

						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true"> &times;</span>
							</button>
							<h4 class="modal-title" id="myModalLabel"> เพิ่มข้อมูล </h4>
						</div>

						<!-- modal-body-->
						<div class="modal-body">

							<!-- Room-->
							<div class="form-group" id="myform1">

								<label for="title" class="col-sm-2 control-label">Room</label>
								<div class="col-sm-10">
									<input type="text" name="title" class="form-control form-control-alternative" id="title" placeholder="Room" required>

								</div>
							</div>

							<!-- Color -->
							<div class="form-group">
								<label for="color" class="col-sm-2 control-label">Color</label>
								<div class="col-sm-10">
									<select name="color" class="form-control" id="color">
										<option value="">Choose</option>
										<option style="color:#0071c5;" value="#0071c5">&#9724; Dark blue</option>
										<option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquoise</option>
										<option style="color:#008000;" value="#008000">&#9724; Green</option>
										<option style="color:#FFD700;" value="#FFD700">&#9724; Yellow</option>
										<option style="color:#FF8C00;" value="#FF8C00">&#9724; Orange</option>
										<option style="color:#FF0000;" value="#FF0000">&#9724; Red</option>
										<option style="color:#000;" value="#000">&#9724; Black</option>

									</select>
								</div>
							</div>

							<!-- Start date -->
							<div class="form-group">
								<label for="start" class="col- control-label">Start date</label>
								<div class="col-sm-10">


									<input class="form-control form-control-alternative " type="text" name="start" id="start" required>

								</div>
							</div>

							<!-- End date -->
							<div class="form-group">
								<label for="end" class="col- control-label">End date</label>
								<div class="col-sm-10">

									<input class="form-control form-control-alternative " type="text" name="end" id="end" required>
								</div>
							</div>

						</div>




						<!-- modal-footer Save changes กับ Close -->
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Save changes</button>
						</div>
					</form>
				</div>
			</div>
		</div>

		<!-- Modal แก้ไขฟอม-->
		<div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<!-- Modal editEventTitle.php-->
					<form class="form-horizontal" method="POST" action="editEventTitle.php">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
							<h4 class="modal-title" id="myModalLabel">Edit Event</h4>
						</div>
						<div class="modal-body">

							<div class="form-group">
								<label for="title" class="col-sm-2 control-label">Title</label>
								<div class="col-sm-10">
									<input type="text" name="title" class="form-control" id="title" placeholder="Title">
								</div>
							</div>
							<div class="form-group">
								<label for="color" class="col-sm-2 control-label">Color</label>
								<div class="col-sm-10">
									<select name="color" class="form-control" id="color">
										<option value="">Choose</option>
										<option style="color:#0071c5;" value="#0071c5">&#9724; Dark blue</option>
										<option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquoise</option>
										<option style="color:#008000;" value="#008000">&#9724; Green</option>
										<option style="color:#FFD700;" value="#FFD700">&#9724; Yellow</option>
										<option style="color:#FF8C00;" value="#FF8C00">&#9724; Orange</option>
										<option style="color:#FF0000;" value="#FF0000">&#9724; Red</option>
										<option style="color:#000;" value="#000">&#9724; Black</option>

									</select>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
									<div class="checkbox">
										<label class="text-danger">
											<input type="checkbox" name="delete"> Delete event</label>
									</div>
								</div>
							</div>

							<input type="hidden" name="id" class="form-control" id="id">


						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Save changes</button>
						</div>
					</form>
				</div>
			</div>
		</div>

	</div>

	<!-- /.container -->

	<!-- Section Footer -->
	<footer class=" mt-2 p-3 text-center text-md-left">
		<div class="row ">

			<div class="col-md">
				<div class="copyright text-center">
					&copy; 2019 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">Creative Tim</a>
				</div>




				<!--  date_default_timezone -->

				<?php date_default_timezone_set("Asia/Bangkok");
				$date = date("Y-m-d");
				?>



















				<!-- -------------------------------------------------------------------------------------------------------------------------------->

				<script src="../assets/js/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
				<!--   Core   -->
				<script src="../assets/js/plugins/jquery/dist/jquery.min.js"></script>
				<script src="../assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
				<!--   Optional JS   -->
				<script src="../assets/js/plugins/chart.js/dist/Chart.min.js"></script>
				<script src="../assets/js/plugins/chart.js/dist/Chart.extension.js"></script>
				<!--   Argon JS   -->
				<script src="../assets/js/argon-dashboard.min.js?v=1.1.0"></script>
				<script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>

				<!--  function  calendar -->

				<script src="../assets/js/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

				<!--   fullcalendarCore jquery.min -->
				<script src='../css_calendar/lib/jquery.min.js'></script>

				<!-- jQuery Version 1.11.1 -->
				<script src="../css_calendar/js/jquery.js"></script>

				<!-- Bootstrap Core JavaScript -->
				<script src="../css_calendar/js/bootstrap.min.js"></script>

				<!-- FullCalendar -->
				<script src='../css_calendar/lib/moment.min.js'></script>
				<script src='../css_calendar/lib/fullcalendar.min.js'></script>

				<!--   jquery-ui.-timepicker-addon   -->
				<script type="text/javascript" src="../css_calendar/jquerydatepicker/jquery-ui.min.js"></script>
				<script type="text/javascript" src="../css_calendar/jquerydatepicker/jquery-ui-timepicker-addon.js"></script>
				<script type="text/javascript" src="css_calendar/jquerydatepicker/jquery-ui-sliderAccess.js"></script>







				<script>
					$(document).ready(function() {

						$('#calendar').fullCalendar({

							header: {

								left: ' prevYear,prev,next,nextYear,next today',
								center: 'title',
								//right: 'month,basicWeek,basicDay'
								right: 'month,agendaWeek,agendaDay,listMonth'
							},

							navLinks: true,
							defaultDate: '<?php echo $date ?>',
							minTime: '00:00:00',
							maxTime: '24:00:00',
							editable: true,

							eventLimit: true, // allow "more" link when too many events
							selectable: true,
							selectHelper: true,
							select: function(start, end) {

								$('#ModalAdd #start').val(moment(start).format('YYYY-MM-DD HH:mm:ss'));
								$('#ModalAdd #end').val(moment(end).format('YYYY-MM-DD HH:mm:ss'));
								$('#ModalAdd').modal('show');
							},
							eventRender: function(event, element) {
								element.bind('dblclick', function() {
									$('#ModalEdit #id').val(event.id);
									$('#ModalEdit #title').val(event.title);
									$('#ModalEdit #color').val(event.color);
									$('#ModalEdit').modal('show');
								});
							},
							eventDrop: function(event, delta, revertFunc) { // si changement de position
								edit(event);
							},
							eventResize: function(event, dayDelta, minuteDelta, revertFunc) { // si changement de longueur
								edit(event);
							},
							events: [
								<?php foreach ($events as $event) :

									$start = explode(" ", $event['start']);
									$end = explode(" ", $event['end']);
									if ($start[1] == '00:00:00') {
										$start = $start[0];
									} else {
										$start = $event['start'];
									}
									if ($end[1] == '00:00:00') {
										$end = $end[0];
									} else {
										$end = $event['end'];
									}
								?> {
										id: '<?php echo $event['id']; ?>',
										title: '<?php echo $event['title']; ?>',
										start: '<?php echo $start; ?>',
										end: '<?php echo $end; ?>',
										color: '<?php echo $event['color']; ?>',
									},
								<?php endforeach; ?>
							]
						});

						function edit(event) {

							start = event.start.format('YYYY-MM-DD HH:mm:ss');
							if (event.end) {
								end = event.end.format('YYYY-MM-DD HH:mm:ss');
							} else {
								end = start;
							}

							id = event.id;

							Event = [];
							Event[0] = id;
							Event[1] = start;
							Event[2] = end;

							$.ajax({
								url: 'editEventDate.php',
								type: "POST",
								data: {
									Event: Event
								},
								success: function(rep) {
									if (rep == 'OK') {
										alert('Saved');
									} else {
										alert('Could not be saved. try again.');
									}
								}
							});
						}

					});
				</script>

				<script src="../assets/js/main.js"></script>




</body>

</html>