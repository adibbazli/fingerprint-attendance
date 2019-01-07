<?php 
// Generate 6-digit code, random hash and secure it in database
//print($_SESSION["email"]);

$pin[1] = rand(0,9);
$pin[2] = rand(0,9);
$pin[3] = rand(0,9);
$pin[4] = rand(0,9);
$pin[5] = rand(0,9);
$pin[6] = rand(0,9);

$code = $pin[1].$pin[2].$pin[3].$pin[4].$pin[5].$pin[6];
$hash = sha1(rand());
$time = time();
$email = $_SESSION["email"];

// --- Save it into database ---
$sql = "UPDATE login SET code='$code', hash='$hash', resettime='$time' WHERE email='$email'";

if ($con->query($sql) === TRUE) {
    //print $front[3];
} else {
    echo "DB_UPDATE_ERR";
}
?>