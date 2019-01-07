<?php
session_start();
include "test.php";
require "../dbconnect.php";

// Make email link as priority
if(isset($_GET["hash"]) and isset($_GET["code"])){
    $hash = $_GET["hash"];
    $code = $_GET["code"];
	$res = verify($con, $hash, $code);
    if($res === true){
		$sql = "SELECT * FROM login WHERE hash='$hash'";
		$qry = mysqli_query($con, $sql);
		$qry = mysqli_fetch_assoc($qry);

		$_SESSION["user"] = $qry["Id"];
		header("refresh:0; url=profile.php");
		return;
		}
		exit;
}

if (isset($_GET["button"])){
	$email=$_GET["email"];
	switch ($_GET["button"]) {
	case 'Check':
	
			$sql = "SELECT * FROM login WHERE email='$email'";
            $qry = mysqli_query($con, $sql);
            $num = mysqli_num_rows($qry);
            $_qry = mysqli_fetch_assoc($qry);
            $_SESSION["email"] = $_qry["email"];
            $_SESSION["name"] = $_qry["username"];

			if($num == 0){
			//echo'imhere';
                require("output/notfound.php");
                session_destroy();
                exit;
            }
			else {
				require("generator.php");
				require("mail.php");
				require("output/emailreset.php");
				}
			exit;
		break;
	}
}

require("output/reset.html");


	
?>