<?php
# Edit Staff

$sql = "SELECT * FROM activestaff WHERE NRIC='$nric'";
$qry = mysqli_query($con, $sql);
$_qry = mysqli_num_rows($qry);
$registerOk = true;
$uploadOk = 1;

if($_qry == 0){
	$registerOk = false;
	require("doneedit.php");
	return;
}

$fname = $_POST["fname"];
$lname = $_POST["lname"];
$line1 = $_POST["line1"];
$line2 = $_POST["line2"];
$line3 = $_POST["line3"];
$city = $_POST["city"];
$zip = $_POST["zip"];
$country = $_POST["country"];
$mobile = $_POST["contact"];
$mobile2 = $_POST["contact2"];
$email = $_POST["emailaddress"];
$bankName = $_POST["bankName"];
$bankDetail = $_POST["bankDetail"];
$job = $_POST["job"];

		$sql = "UPDATE activestaff SET `first_name`='$fname', `last_name`='$lname', 
		`line1`='$line1', `line2`='$line2', `line3`='$line3', `city`='$city', `zip`='$zip', `country`='$country',
		`mobile`='$mobile', `mobile2`='$mobile2', `email`='$email', `bankName`='$bankName', `bankDetail`='$bankDetail', `jobTitle`='$job' WHERE `NRIC`='$nric'";

		if ($con->query($sql) === FALSE) {
			echo "DB_UPDATE_ERR<br>";
			echo $con->error;
			exit;
		}

require("doneedit.php");
?>