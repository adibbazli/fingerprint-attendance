<!DOCTYPE html>
<html>
<head>
<style>

body{
	margin: 0;
	padding: 0;
	background: url(http://iktihad-malaysia.com.my/images/ara.jpg) no-repeat;
	background-size: cover;
}

.box{
	width: 450px;
	background: rgba(0, 0, 0, 0.4);
	padding: 40px;
	text-align: center;
	margin:auto;
	margin-top: 5%;
	color: white;
	font-family: 'Century Gothic', sans-serif;
	}

.box-img{
	border-radius:50%;
	width:200px;
	height: 200px;
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
	font-weight: bold;
    margin: 2px 2px;
    cursor: pointer;
	
}
.btn1 {
    background-color: skyblue;
    border: none;
    color: white;
    padding: 10px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
	font-weight: bold;
    margin: 2px 2px;
    cursor: pointer;
	
}
.btn:hover  {
    background-color: #45a049;
}

.btn1:hover{
	background-color: #13288B;
}



</style>
</head>
<script>
function loaded() {window.setTimeout(function(){ window.location = "/"; },10000);}
</script>
<body onload="loaded()">

<div class="box">

	<?php
	$fname = $qry['first_name'];
	$name = $qry['first_name']." ".$qry['last_name'];
	$NRIC = $qry['NRIC'];
	$timenow = date("H:i:s", $time);
	$datenow = date("D d M", $time);
	echo "
			<h1>Hello $name.</h1>
			<img src ='http://iktihad-malaysia.com.my/photo/$NRIC' alt='profile' class ='box-img'><br>
			<b> Name: </b> $name <br>
			<b> NRIC: </b> $NRIC <br>
			<b> Type: </b> $type <br>
			<b> Time Start: </b> $timenow <br>
			<b> Date: </b> $datenow <br><br>
			<p>Welcome Back!</p>
	";
	?>
</div>
</body>
</html>