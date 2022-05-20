<?php
	// add in the db connection details using require_once
	require_once 'db.php';
	//create a new connection to the db
	$conn = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);
	//create SQL query to run
	$sql = "SELECT * FROM incident_type";
	//create var result to contain the result-set from SQL query
	$result = $conn ->query($sql);
	//create array var incidentTypes
	$incidentTypes = [];
	//use while loop to extract each row of the result-set to var row
	while($row = $result->fetch_assoc()){
		//assign the column value for incident_type_id to var id
		$id = $row['incident_type_id'];
		//assign the column value for incident_type_desc to var id
		$type = $row['incident_type_desc'];
		//create array var incidentType to hold the column values of each row
		$incidentType = ["id" => $id, "type" => $type];
		//using the array_push function to assign all rows of the result-set into array var incidentTypes
		array_push($incidentTypes, $incidentType);
	}
	$conn->close();
?>

<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Log Call</title>
		<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<div class="container" style="width: 80%;">
			<!--Use php require_once expression to include header image and navigation bar from nav.php-->
			<?php require_once 'nav.php' ?>
			<!--Create section container to place web form-->
			<section style="margin-top: 20px;">

			<!--Create web form with Caller Name, Contact Number, Location Of Incident, Type of Incident, Description Of Incident input fields-->
			<form action="dispatch.php" method="post">

				<!--Row for caller Name Lable and textbox input-->
				<div class="form-group row">
					<label for="callerName" class="col-lg-4 col-form-label">Caller's Name</label>
					<div class="col-lg-8">
						<input type="text" name="callerName" class="form-control" id="callerName" size="30" maxlength="50" pattern="[A-Za-z_]+">
					</div>
				</div>


				<!--Row for Contact Number Label and textbox input-->
				<div class="form-group row">
					<label for="contactNo" class="col-lg-4 col-form-label">Contact Number (Require)</label>
					<div class="col-lg-8">
						<input type="text" name="contactNo" class="form-control" id="contactNo" pattern="[0-9]{8}" required>
						
					</div>
				</div>

				<!--Row for Location Of Incident Label and textbox input-->
				<div class="form-group row">
					<label for="locationofIncident" class="col-lg-4 col-form-label">Location of Incident (Required)</label>
					<div class="col-lg-8">
						<input type="text" name="locationofIncident" class="form-control" id="locationofIncident" required>
					</div>
				</div>

				<!--Row for Type Of Incident Label and dropdown input-->
				<div class="form-group row">
					<label for="typeofIncident" class="col-lg-4 col-form-label">Type of Incident (Required)</label>
					<div class="
					col-lg-8">
						<select name="typeofIncident" class="form-control" id="typeofIncident">
							<option>Select</option>
							<?php 
							/*using for loop to retrieve the data from array var IncidentTypes*/
							for ($i = 0; $i < count($incidentTypes); $i++){
								$incidentType = $incidentTypes[$i];
								echo "<option value ='". $incidentType['id']."'>" . $incidentType['type'] . "</option>";
							}
							?>
							<script type="text/javascript">
								function Validate() {
						        var $typeofIncident = document.getElementById("typeofIncident");
						        if ($typeofIncident.value == "") {
						            //If the "Please Select" option is selected display error.
						            alert("Please select Type of Incident!");
						            return false;
						        }
							</script>
						</select>
					</div>
				</div>

				<!--Row for Description Of Incident Label and large textbox input-->
				<div class="form-group row">
					<label for="descriptionofIncident" class="col-lg-4 col-form-label">Description of Incident (Required)</label>
					<div class="col-lg-8">
						<textarea rows="5" type="text" name="descriptionofIncident" class="form-control" id="descriptionofIncident" required></textarea> 
					</div>
				</div>


				<!--Row for Processing Call and Reset buttons-->
				<div class="form-group row">
					<div class="col-lg-4"></div>
					<div class="col-lg-8" style="text-align: center;">
						<input type="submit" name="btnProcessCall" class="btn btn-primary" value="Process Call">
						<input type="reset" name="btnReset" class="btn btn-primary" value="Reset">
					</div>
				</div>
				<!--End of web form-->
			</form>
			<!--end of section-->
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