<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Search Patrol Car</title>
		<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<div class="container" style="width: 80%;">
			<!--Use php require_once expression to include header image and navigation bar from nav.php-->
			<?php require_once 'nav.php' ?>
			<!--Create section container to place web form-->
			<section style="margin-top: 20px;">

			<!--Create web form with Patrol car number input field-->
			<form action="update.php" method="post">

				<!--Row for Patrol Car Number Lable and textbox input-->
				<div class="form-group row">
					<label for="patrolCarId" class="col-lg-4 col-form-label">Enter Patrol Car's Number</label>
					<div class="col-lg-8">
						<input type="text" name="patrolCarId" class="form-control" id="patrolCarId">
					</div>
				</div>

				<!--Row for Search button-->
				<div class="form-group row">
					<div class="col-lg-4"></div>
					<div class="col-lg-8">
						<input class="btn btn-primary" type="submit" name="btnSearch" value="Search">
					</div>
				</div>

			</form>
		</section>
		<!--Footer-->
			<footer class="page-footer font-small blue pt-4 footer-copyright text-center py-3">
				&copy;2021 Copyright
				<a href="www.ite.edu.sg">ITE</a>
			</footer>
		</div>
	<script type="text/javascript" src="js/jquery-3.5.0.min.js"></script>
	<script type="text/javascript" src="js/popper.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
		
	</body>
</html>
