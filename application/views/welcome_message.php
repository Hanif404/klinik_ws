<!DOCTYPE html>
<html>
<title></title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link href="<?php echo base_url('assets/vendors/iCheck/flat/blue.css') ?>" rel="stylesheet" type="text/css" />
<!-- Morris chart -->
<link href="<?php echo base_url('assets/vendors/morris/morris.css') ?>" rel="stylesheet" type="text/css" />
<!-- jvectormap -->
<link href="<?php echo base_url('assets/vendors/jvectormap/jquery-jvectormap-1.2.2.css') ?>" rel="stylesheet" type="text/css" />
<!-- Date Picker -->
<link href="<?php echo base_url('assets/vendors/datepicker/datepicker3.css') ?>" rel="stylesheet" type="text/css" />

<link href="<?php echo base_url('assets/vendors/datatables/datatables.bootstrap.css') ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url('assets/vendors/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<body>

	<!-- Navbar (sit on top) -->
	<div  style="margin-top: 50px; height: 12px">
		<div class="w3-bar w3-white w3-wide w3-padding w3-card">
			<a href="#home" class="w3-bar-item w3-button"><b>SCCI</b></a>
			<!-- Float links to the right. Hide them on small screens -->
			<div class="w3-right w3-hide-small">
				<a href="<?php ?>" class="w3-bar-item w3-button">Event</a>
				<a  data-toggle="modal" data-target="#myModal" class="w3-bar-item w3-button">Login</a>
			</div>
		</div>
	</div>

	<!-- Header -->
	<!-- Page one -->
	<header class="w3-display-container w3-content w3-wide" style="max-width:1500px;" id="home">
		<img class="w3-image" src="assets/img/music.jpg" alt="Architecture" width="1500" height="800">
		<div class="w3-display-middle w3-margin-top w3-center">
			<!-- <h1 class="w3-xxlarge w3-text-white"><span class="w3-padding w3-black w3-opacity-min"><b>BR</b></span> <span class="w3-hide-small w3-text-light-grey">Architects</span></h1> -->
		</div>	
	</header>

	<!-- Page content -->
	<div class="w3-content w3-padding" style="max-width:1564px">

		<!-- Project Section -->
		<div class="w3-container w3-padding-32" id="projects">
			<h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">Event- Events</h3>
		</div>

		<div class="w3-row-padding">
			<div class="w3-col l3 m6 w3-margin-bottom">
				<div class="w3-display-container">
					<div class="w3-display-topleft w3-black w3-padding">Summer House</div>
					<img src="/w3images/house5.jpg" alt="House" style="width:100%">
				</div>
			</div>
			<div class="w3-col l3 m6 w3-margin-bottom">
				<div class="w3-display-container">
					<div class="w3-display-topleft w3-black w3-padding">Brick House</div>
					<img src="/w3images/house2.jpg" alt="House" style="width:100%">
				</div>
			</div>
			<div class="w3-col l3 m6 w3-margin-bottom">
				<div class="w3-display-container">
					<div class="w3-display-topleft w3-black w3-padding">Renovated</div>
					<img src="/w3images/house3.jpg" alt="House" style="width:100%">
				</div>
			</div>
			<div class="w3-col l3 m6 w3-margin-bottom">
				<div class="w3-display-container">
					<div class="w3-display-topleft w3-black w3-padding">Barn House</div>
					<img src="/w3images/house4.jpg" alt="House" style="width:100%">
				</div>
			</div>
		</div>

		<div class="w3-row-padding">
			<div class="w3-col l3 m6 w3-margin-bottom">
				<div class="w3-display-container">
					<div class="w3-display-topleft w3-black w3-padding">Summer House</div>
					<img src="/w3images/house2.jpg" alt="House" style="width:99%">
				</div>
			</div>
			<div class="w3-col l3 m6 w3-margin-bottom">
				<div class="w3-display-container">
					<div class="w3-display-topleft w3-black w3-padding">Brick House</div>
					<img src="/w3images/house5.jpg" alt="House" style="width:99%">
				</div>
			</div>
			<div class="w3-col l3 m6 w3-margin-bottom">
				<div class="w3-display-container">
					<div class="w3-display-topleft w3-black w3-padding">Renovated</div>
					<img src="/w3images/house4.jpg" alt="House" style="width:99%">
				</div>
			</div>
			<div class="w3-col l3 m6 w3-margin-bottom">
				<div class="w3-display-container">
					<div class="w3-display-topleft w3-black w3-padding">Barn House</div>
					<img src="/w3images/house3.jpg" alt="House" style="width:99%">
				</div>
			</div>
		</div>
	</div>
	<!-- Modal Login -->
	<div id="myModal" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Modal Header</h4>
				</div>
				<div class="modal-body">
					<p>Some text in the modal.</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>

		</div>
	</div>

	<!-- Footer -->
	<footer class="w3-center w3-black w3-padding-16">
		<p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="w3-hover-text-green">SCCI</a></p>
	</footer>

<!-- JavaScript -->
<script src="<?php echo base_url('assets/vendors/jQuery/jQuery-2.2.3.min.js') ?>"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="<?php echo base_url('assets/vendors/bootstrap/js/bootstrap.min.js') ?>" type="text/javascript"></script>
<!-- Datatables -->
<script src="<?php echo base_url('assets/vendors/datatables/datatables.min.js') ?>" type="text/javascript"></script>
<!-- jQuery UI 1.11.2 -->
<script src="<?php echo base_url('assets/js/jquery-ui.min.js') ?>" type="text/javascript"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Sparkline -->
<script src="<?php echo base_url('assets/vendor11s/sparkline/jquery.sparkline.min.js') ?>" type="text/javascript"></script>
<!-- jvectormap -->
<script src="<?php echo base_url('assets/vendors/jvectormap/jquery-jvectormap-1.2.2.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js') ?>" type="text/javascript"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url('assets/vendors/knob/jquery.knob.js') ?>" type="text/javascript"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url('assets/vendors/moment.js/moment.min.js')?>"></script>
<script src="<?php echo base_url('assets/vendors/daterangepicker/daterangepicker.js') ?>" type="text/javascript"></script>
<!-- datepicker -->
<script src="<?php echo base_url('assets/vendors/datepicker/bootstrap-datepicker.js') ?>" type="text/javascript"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url('assets/vendors/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') ?>" type="text/javascript"></script>
<!-- iCheck -->
<script src="<?php echo base_url('assets/vendors/iCheck/icheck.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/vendors/durc/durc_menu.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/vendors/durc/durc_script.js') ?>" type="text/javascript"></script>
</body>

</html>
