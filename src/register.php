<?php
session_start();
	if(!isSet($_SESSION['user'])){
		header("refresh:0; url=index.php");
		return;
		}

		if(isset($_POST["button"])){
		require("dbconnect.php");
		require("application/add.php");
		return;
		}
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

.signupbtn{
	padding: 0px 20px;
	color: white;
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

@media screen and (max-width: 300px) {
    .resetbtn, .signupbtn {
       width: 100%;
	   }
    }

</style>
<head>
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="header">
		<h1><a style="text-decoration:none; color:white;" href="">Fingerprint Attendance System</a></h1>
	</div>
	
	<div class="clearfix">
		<div class="column menu">
			<ul>
				<a href=""><li>Back</li></a>
			</ul>
		</div>
		<div class="column content2">

			<!------------ att ---------------------->
			<form action="" method="POST" enctype="multipart/form-data" style="border:1px solid #ccc">
				<div class="container">
					<h1>Staff Registration</h1>
					<hr>

					<label for="fname"><b>First Name</b></label>
					<input type="text" placeholder="Enter First Name" name="fname" required>

					<label for="lname"><b>Last Name</b></label>
					<input type="text" placeholder="Enter Last Name" name="lname" required>
    
					<label for="NRIC"><b>NRIC</b></label>
					<input type="text" placeholder="Enter IC NO" name="NRIC" required>

					<label for="email"><b>Email</b></label>
					<input type="email" placeholder="Enter Email" name="emailaddress" required>

					<label for="contact"><b>Contact No</b></label>
					<input type="text" placeholder="Enter Contact No" name="contact" >
	
					<label for="contact2"><b>Contact No2</b></label>
					<input type="text" placeholder="Enter Home Contact No" name="contact2">

					<fieldset><legend>Address:</legend>
						line1: <input name="line1" type="text"><br>
						line2: <input name="line2" type="text"><br>
						line3: <input name="line3" type="text"><br>
						city: <input name="city" type="text"><br>
						zip: <input name="zip" type="text"><br>
						country: <input name="country" type="text"><br>
					</fieldset><br>
 
 					<label for="bank"><b>Bank Name</b></label>
					<input type="text" placeholder="Enter Name of Bank used" name="bankName">
	
					<label for="bank"><b>Bank Details</b></label>
					<input type="text" placeholder="Enter Bank Account No" name="bankDetail">
	
					<label for="job"><b>Job Title</b></label>
					<input type="text" placeholder="Enter Job Title" name="job">
	
					<b>Upload Profile Picture</b><br>
					<br><input type="file" name="fileToUpload" id="myFile"><br>
    
					<div class="clearfix">
					
						
						<input type="submit" name="button" class ="buttonx" value="Register">
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