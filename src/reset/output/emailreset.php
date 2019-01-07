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
.reset-box{
	width: 300px;
	background: rgba(0, 0, 0, 0.4);
	padding: 40px;
	text-align: center;
	margin:auto;
	margin-top: 5%;
	color: white;

	
	
}
.reset-box h1{
	float: center;
	font-size:40px;
	margin-bottom: 25px;
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
</style>
<script>
function loaded() {window.setTimeout(function(){ window.location = ""; },5000);}
</script>
	<head>
		<meta charset = "utf-8">
		<title>Reset Password</title>
	</head>
	<body onload= "loaded()">
		<div class= "reset-box">
		<?php echo "
			<h1>Email Found</h1>
			<p>Please check your email inbox, or spam folder. We will send you reset instruction to <b>".$_SESSION["email"]."</b>.</p>
		";?>
	</body>
</html>