<?php
$pass = $_POST["pass"];
$cpass = $_POST["cpass"];

require("reset/password.php");

$email = $_POST["email"];
$sql = "UPDATE login SET `email`='$email' WHERE `username`='$username'";

$con->query($sql);
?>