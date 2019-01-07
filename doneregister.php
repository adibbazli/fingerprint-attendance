<!DOCTYPE html>
<html>
<style>
p1{
	font-family: Times New Roman;
	font-size: 20px;
}
</style>
<head>
	<title>Register Staff </title>
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
		if($uploadOk != 1)
		echo "
			<h1>Staff Register Successful</h1>
			<p1>The staff has been successfully added to the database.</p1>
			<p1>However, we have trouble uploading the photo.</p1>
		";
		else if($registerOk === true)
		echo "
			<h1>Staff Register Successful</h1>
			<p1>The staff has been successfully added to the database.</p1>
		";
		else 
		echo "
			<h1>Staff Register Fail</h1>
			<p1>The staff has already been registered.</p1>
		";
			
		?>
		</div>
	</div>
	
	<div class="footer">
		<center><p>The system was developed by Iktihad Team | 2018 | All Right Reserved </p></center>
	</div>
</body>
</html>