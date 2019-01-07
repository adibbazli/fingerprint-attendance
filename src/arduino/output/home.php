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

<body onload="loaded()">

<div class="box">
	<script>
		function clicked() {document.getElementById('prompt').style = ""};
		function loaded() {window.setTimeout(function(){ window.location = "/"; },30000);}
	</script>
	<h1>Hello There.<br> Choose the options below.</h1>

	<h4 style="display:none;" id="prompt">Please put your finger on the scanner.</h4>
	

    <a onclick="clicked()" href="/start" class = "btn" >Start</a><br> 
	<a onclick="clicked()" href="/stop" class = "btn" >Stop</a><br>
	<a onclick="clicked()" href="/early" class = "btn1" >Emergency Leave</a><br>
	
	<?php
	date_default_timezone_set('Asia/Kuala_Lumpur');
	$hournow = date("G", time());
	$timenow = date("i", time());
	// echo $hournow.$timenow;
		if($hournow == 7)
			if($timenow > 45)
				echo "<p style='color:yellow'><b>Warning, being late will be bad for your record!</b> </p>";
	?>
	
	
	</div>
</body>
</html>