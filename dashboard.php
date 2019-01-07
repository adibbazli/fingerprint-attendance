<?php
session_start();
	if(!isSet($_SESSION['user'])){
		header("refresh:0; url=index.php");
		return;
		}
require "dbconnect.php";
$alert = false;
	if(isset($_POST["button"]))
		switch ($_POST["button"]){
			case 'Send Report':
				$nric = $_POST["NRIC"];
				$alert = true;
				require("application/genreport.php");
				
				break;
			case 'Edit':
				$_SESSION["NRIC"] = $_POST["NRIC"];
				header("refresh:0; url=staff.php");
				exit;
			default:
				echo "Illegal Entry";
				exit;
				break;
		}


// ------------------- Query Admin Name ---------------
$sql = "SELECT * FROM login";
$qry = mysqli_query($con, $sql);
$qry = mysqli_fetch_assoc($qry);
$admin = $qry["username"];

// ----------- Query Staff List ------------
$sql = "SELECT * FROM activestaff ORDER BY first_name";
$qry = mysqli_query($con, $sql);
$noStaff = mysqli_num_rows($qry);
?>
<!DOCTYPE html>
<html>
<style>
#staff {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#staff td, #staff th {
    border: 1px solid #ddd;
    padding: 8px;
}

#staff tr:nth-child(even){background-color: #f2f2f2;}

#staff tr:hover {background-color: #ddd;}

#staff th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
    color: white;
}

.inDiv {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
}

p {
	color:white;
	font-family: Arial, Helvetica, sans-serif;
}
</style>
<head>
	<title>Staff List</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="header">
		<h1><a style="text-decoration:none; color:white;" href="dashboard.php">Fingerprint Attendance System </a></h1>
	</div>

	
	
	<div class="clearfix">
		<div class="column menu">
			<ul>
				<a href="profile.php"><li>Profile</li></a>
				<a href="register.php"><li>Add Staff</li></a> <br><br>
				<?php echo "<p>Hello, $admin</p>"; 
				if($alert === true) echo "<p>Staff report has been processed.</p><br>";
				?>
				<a href="logout.php" class = "logout" >Logout</a>
			</ul>
		</div>
		<div class="column content">

		
		<table id="staff">
			<tr>
				<th>IC No</th>
				<th>Name</th>
				<th>Info</th>
			</tr>
			<?php
				while($row = mysqli_fetch_assoc($qry))
				echo "
				<tr>
					
				<form action='' method='POST'>	
					<input type='hidden' name='NRIC' value='".$row["NRIC"]."'>
					<td>".$row["NRIC"]."</td>
					<td>".$row["first_name"]." ".$row["last_name"]."</td>
					<td><input type='submit' name='button' value='Send Report'>
					<input type='submit' name='button' value='Edit'></td>
				</form>	
				</tr>
				";
				//  onclick='alert(\"The report is being processed.\")
			?>
		</table>
		

		</div>
	</div>

	<div class="footer">
		<center><p>The system was developed by Iktihad Team | 2018 | All Right Reserved </p></center>
	</div>
</body>
</html>