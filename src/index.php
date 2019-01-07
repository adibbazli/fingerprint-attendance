<?php
##################################################################
#																 #		
#		PROJECT - ATTENDANCE FINGERPRINT IKTIHAD ENGINEERING	 #
#		SOFTWARE DESIGN - AIMAN NUR HAZIQ						 #
#		FRONTEND AND FRONTEND DESIGN - SYAHIR RUSYAIDI			 #
#		BACKEND AND TECHNICAL - ADIB BAZLI						 #
#		GUIDIANCE AND SPECIAL THANKS - EN FAIZUL AZLI			 #
#		PRODUCT OF MALAYSIA										 #
#																 #
##################################################################
session_start();
	if(isSet($_SESSION['user'])){
		header("refresh:0; url=dashboard.php");
		return;
	}
		
include "dbconnect.php";

// --- Variable to be expect if our guest is index.php
$user = $_POST['username'];
$pass = sha1($_POST['password']);
$passwrong = false;

	if(isSet($_POST["button"]))	
		switch($_POST["button"]){
		case "Login" : 
			$passwrong = login($con, $user, $pass); //echo "Login";
			break;
		} // ----------------- Inside if(isSet($_POST["button"]))----------------

	function login($con, $user, $pass)
	{
		$sql = "SELECT * FROM login WHERE username ='".$user."'";
		$qry = mysqli_query($con, $sql);
		$qry = mysqli_fetch_assoc($qry);
		
			if (password_verify($pass, $qry['password'])) {
				$_SESSION['user'] = $qry['Id'];
				$_SESSION['time'] = time();
				header("refresh:0; url=dashboard.php"); 
				exit; // Prevent everything else from loaded
				} 	else return true;
	}
?>
<!DOCTYPE html>
<html>
<style>
body{
	margin: 0;
	padding: 0;
	font-family: sans-serif;
	background: url(images/ara.jpg) no-repeat;
	background-size: cover;

}
.login-box{
	width: 300px;
	background: rgba(0, 0, 0, 0.4);
	padding: 40px;
	text-align: center;
	margin:auto;
	margin-top: 5%;
	color: white;

}
.login-box h1{
	float: left;
	font-size:40px;
	border-bottom: 6px solid #4caf50;
	margin-bottom: 50px;
	padding: 13px 0
}

.textbox{
	width: 100%;
	overflow:hidden;
	font-size:20px;
	padding: 8px 0;
	margin: 8px 0;
	border-bottom: 1px solid #4caf50;
}
.textbox i{
	width: 26px;
	float: left;
	text-align: center;
}
.textbox input{
	border:none;
	outline: none;
	background: none;
	color: white;
	font-size: 18px;
	width: 80%;
	float:left;
	margin: 0 10px;
}
.btn{
	width: 100%;
	background: none;
	border: 2px solid #4caf50;
	color: white;
	padding: 5px;
	font-size: 18px;
	cursor: pointer;
	margin: 12px 0;
	
}
checkbox{
	position:left;
}

.btn1 {
	color: white;
	padding: 5px;
	font-size: 15px;
	font-weight: bold;
	cursor: pointer;
    float: center;
	background-color: red;
    text-decoration: none;
    display: inline-block;

}

</style>
<head>
	<meta charset = "utf-8">
	<title>Login Form</title>
	</head>
<body>
	<div class= "login-box">
		<form action="" method="POST">
			<h1>Login</h1>
			<div class ="textbox">
				<i class="fa fa-user" aria-hidden="true"></i>
				<input type ="text" placeholder ="Username" name ="username" value ="">
			</div>
	
			<div class ="textbox">
				<i class="fa fa-lock" aria-hidden="true"></i>
				<input type ="password" placeholder ="Password" name ="password" value ="">
			</div>
	<?php
		if($passwrong === true)
	echo '<p style="color:red;">Incorrect Username or Password !</p>';
	?>

			<input class ="btn" type ="submit" name ="button" value="Login"><br><br>
	
			<a href="reset/" class ="btn1" >Forget Password?</a>
		</form>
	</div>
</body>
</html>