<?php
session_start();
	if(!isset($_SESSION["NRIC"])){
	header("refresh:0; url=index.php");
		return;
		}

	require("dbconnect.php");
	$nric =  $_SESSION["NRIC"];

		if(isset($_POST["button"])){
		require("application/edit.php");
		exit;
		}

		if(isset($_GET["button"])){
			require("arduino/enrollAdmin.php");
			exit;
		}

	
	//echo $nric;
	$sql = "SELECT * FROM activestaff WHERE NRIC='$nric'";
    $qry = mysqli_query($con, $sql);
    $qry = mysqli_fetch_assoc($qry);

?>
<!DOCTYPE html>
<html>
<style>

* {box-sizing: border-box}

input[type=text], input[type=password], input[type=email] {
    width: 100%;
    padding: 15px;
    margin: 5px 0 22px 0;
    display: inline-block;
    border: groove;
    background: #f1f1f1;
}
.enroll {
    background-color: #4CAF50;
    color: white;
	font: aria;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 50%;
    opacity: 0.9;
}

.footer2 {
	margin-top: 1250px;
    background-color: grey;
    color: white;
    padding: 8px;
	font-family: "Courier New", Courier, "Lucida Sans Typewriter", "Lucida Typewriter", monospace;
	
}
.content2 {
	width: 50%;
}

.end2 {
	width: 35%;
}

.button:hover {
    background-color: #45a049;
}

button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 50%;
    opacity: 0.9;
}
.but2:hover {
    background-color: crimson;
}
label {
	display: inline-block;
	width: 120px;
	text-align: left;
}

input[type=text]:focus, input[type=password]:focus, input[type=email]:focus {
    background-color: #ddd;
    outline: none;
}

.resetbtn {
    padding: 14px 20px;
    background-color: #f44336;
}

.buttonx {
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}

.buttony {
    background-color: red;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}

.resetbtn, .signupbtn {
  float: left;
  width: 50%;
}

.container {
    padding: 16px;
}

.clearfix::after {
    content: "";
    clear: both;
    display: table;
}

@media screen and (max-width: 300px) {
    .resetbtn, .signupbtn {
       width: 100%;
	   }
    }

</style>
<head>
	<title>Edit Info</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script>
	function loaded() { 
	<?php
		echo "document.getElementById('fname').value = '".$qry["first_name"]."';";
		echo "document.getElementById('lname').value = '".$qry["last_name"]."';";

		echo "document.getElementById('NRIC').value = '".$qry["NRIC"]."';";
		echo "document.getElementById('email').value = '".$qry["email"]."';";
		echo "document.getElementById('contact').value = '".$qry["mobile"]."';";
		echo "document.getElementById('contact2').value = '".$qry["mobile2"]."';";

		echo "document.getElementById('line1').value = '".$qry["line1"]."';";
		echo "document.getElementById('line2').value = '".$qry["line2"]."';";
		echo "document.getElementById('line3').value = '".$qry["line3"]."';";
		echo "document.getElementById('city').value = '".$qry["city"]."';";
		echo "document.getElementById('zip').value = '".$qry["zip"]."';";
		echo "document.getElementById('country').value = '".$qry["country"]."';";

		echo "document.getElementById('bankName').value = '".$qry["bankName"]."';";
		echo "document.getElementById('bankDetail').value = '".$qry["bankDetail"]."';";

		echo "document.getElementById('job').value = '".$qry["jobTitle"]."';";
	?>
	}
	</script>
</head>
<body onload="loaded()">
	<div class="header">
		<h1><a style="text-decoration:none; color:white;" href="dashboard.php">Fingerprint Attendance System</a></h1>
	</div>
	
	<div class="clearfix">
		<div class="column menu">
			<ul>
				
				<form>
					<a href="dashboard.php"><li>Home</li></a><br>
					<input type="submit" name="button" class ="enroll" value="Enroll Fingerprint">
				</form>
			</ul>
		</div>
		
		<div class="column content2">

			<form action="staff.php" method="POST" style="border:1px solid #ccc">
				<div class="container">
				<strong>Edit Staff Info</strong><br>
	
				<hr>


				<label for="fname"><b>First Name</b></label>
				<input id="fname" type="text" name="fname">

				<label for="lname"><b>Last Name</b></label>
				<input id="lname" type="text" name="lname" >
    
				<label for="NRIC"><b>NRIC</b></label>
				<input id="NRIC" type="text" disabled>

				<label for="email"><b>Email</b></label>
				<input id="email" type="email" name="emailaddress" required>

				<label for="contact"><b>Contact No</b></label>
				<input id="contact" type="text" name="contact" >
	
				<label for="contact2"><b>Contact No2</b></label>
				<input id="contact2" type="text" name="contact2">

				<fieldset><legend>Address:</legend>
					line1: <input id="line1" name="line1" type="text" ><br>
					line2: <input id="line2" name="line2" type="text" ><br>
					line3: <input id="line3" name="line3" type="text" ><br>
					city: <input id="city" name="city" type="text" ><br>
					zip: <input id="zip" name="zip" type="text" ><br>
					country: <input id="country" name="country" type="text" ><br>
				</fieldset><br>
 
 				<label for="bank"><b>Bank Name</b></label>
				<input type="text" id="bankName" name="bankName">
	
				<label for="bank"><b>Bank Details</b></label>
				<input type="text" id="bankDetail" name="bankDetail">
	
				<label for="job"><b>Job Title</b></label>
				<input type="text" id="job" name="job">
    
				<div class="clearfix">
					<input type="submit" name="button" class ="buttonx" value="Save">
					<input type="reset" class="buttony" value = "Reset" >
				</div>
			</div>
			</form>
		</div>
	</div>
	
	<div class="footer2">
		<center><p>The system was developed by Iktihad Team | 2018 | All Right Reserved </p></center>
	</div>
</body>
</html>