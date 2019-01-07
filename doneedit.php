<!DOCTYPE html>
<html>
<style>
p1{
	font-family: Times New Roman;
	font-size: 20px;
}
</style>
<head>
	<title>Edit Staff </title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="header">
		<h1><a style="text-decoration:none; color:white;" href="dashboard.php">Fingerprint Attendance System</a></h1>
	</div>
	
	<div class="clearfix">
		<div class="column menu">
			<ul>
				<a href="dashboard.php"><li>Home</li></a>
			</ul>
		</div>
		
		<div class="column content">
		<?php
		if($registerOk === true)
		echo "
			<h1>Edit Successful</h1>
			<p1>Your change has been saved</p1>
		";
		else 
		echo "
			<h1>Edit Fail</h1>
			<p1>Unknown Error Occured</p1>
		";
			
		?>
		</div>
	</div>
	
	<div class="footer">
		<center><p>The system was developed by Iktihad Team | 2018 | All Right Reserved </p></center>
	</div>
</body>
</html>