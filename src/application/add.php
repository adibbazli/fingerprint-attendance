<?php
# Add Staff

$NRIC = $_POST["NRIC"];
$sql = "SELECT * FROM activestaff WHERE NRIC='$NRIC'";
$qry = mysqli_query($con, $sql);
$_qry = mysqli_num_rows($qry);
$registerOk = true;
$uploadOk = 1;

if($_qry != 0){
	$registerOk = false;
	require("doneregister.php");
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

$sql = "INSERT INTO activestaff (`NRIC`, `first_name`, `last_name`, `line1`, `line2`, `line3`, `city`, `zip`, `country`, `mobile`, `mobile2`, `email`, `bankName`, `bankDetail`, `jobTitle`)
		VALUES ('$NRIC', '$fname', '$lname', '$line1', '$line2', '$line3', '$city', '$zip', '$country', '$mobile', '$mobile2', '$email', '$bankName', '$bankDetail', '$job')";
		
		if ($con->query($sql) === FALSE) {
			echo "DB_UPDATE_ERR<br>";
			echo $con->error;
			exit;
		}

require("upload.php");
require("doneregister.php");
?>