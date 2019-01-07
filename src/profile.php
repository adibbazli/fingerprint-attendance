<?php
session_start();
if(!isset($_SESSION["user"])){
	header("refresh:0; url=index.php");
	return;
}

require('dbconnect.php');
//if(isset())

$admin = $_SESSION["user"];

$sql = "SELECT * FROM login WHERE Id='$admin'";
$qry = mysqli_query($con, $sql);
$qry = mysqli_fetch_assoc($qry);

$username = $qry["username"];
$email = $qry["email"];

$changed = false;
if(isset($_POST["button"]))
		switch ($_POST["button"]){
			case 'Save':
			require("application/editAdmin.php");
			$changed = true;
				break;
			default:
				echo "Illegal Entry";
				exit;
				break;
		}


?>
<!DOCTYPE html>
<html>
<style>
input[type=text], input[type=password], input[type=email] {
    width: 100%;
    padding: 15px;
    margin: 5px 0 22px 0;
    display: inline-block;
    border: groove;
    background: #f1f1f1;
}

.btn {
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 10px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 2px 2px;
    cursor: pointer;
}
.btn:hover {
    background-color: #45a049;
}
.btnn{
	position: center;
	background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
    opacity: 0.9;
}
input[type=text], input[type=password], input[type=email], select {
    width: 100%;
	text-align: left;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
.inDiv {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
}
label {
	display: inline-block;
	text-align: left;
	width: 100%;
}
</style>
<head>
	<title>Edit Info</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script>
		function loaded(){
		<?php echo "
			document.getElementById('username').value = '$username';
			document.getElementById('email').value = '$email';
			";?>
		}
	</script>
</head>
<body onload="loaded()">
	<div class="header">
		<h1><a style="text-decoration:none; color:white;" href="dashboard.php">Fingerprint Attendance System </a></h1>
	</div>
	
	<div class="clearfix">
		<div class="column menu">
			<ul>
				<a href="dashboard.php"><li>Back</li></a>
			</ul>
		</div>
		<div class="column content">
		<form action="" method="POST">
			<h1> Hello Admin </h1>

			<?php
			if ($changed === false)
			echo "<p>You can change your password and email here.</p>";
			else
			echo "<p>Saved!</p>";
			?>


			<label> Username: </label>
			<input type ="text" name ="name" id="username" disabled><br>
			
			<label> Password: </label>
			<input type ="password" name ="pass"
					placeholder ="••••••"><br>
		
			<label> Confirm Password: </label>
			<input type ="password" name ="cpass"
					placeholder ="••••••"><br>
		
			<label> Email: </label><br>
			<input type ="email" name ="email" id="email" ><br><br>
			<input type="submit" class="btn"  name="button" value="Save">
		</form>
		</div>
	</div>
		
	<div class="footer">
		<center><p>The system was developed by Iktihad Team | 2018 | All Right Reserved </p></center>
	</div>
</body>
</html>