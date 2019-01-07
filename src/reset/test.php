<?php 
// Test and Verify given code and hash
// Bonus : This code also will check the code health, if more than 5 min 15 seconds

function verify($con, $hash, $code){

$codefalse = false;
$sql = "SELECT * FROM login WHERE hash='$hash' and code='$code'";
$qry = mysqli_query($con, $sql);
$num = mysqli_num_rows($qry);
$qry = mysqli_fetch_assoc($qry);

$resettime = $qry["resettime"];
$time = time();

$second = $time - $resettime;

if($num == 1){
    if ($second < 315)
    return true;
    else 
        require("output/notFound.php");
    return false;
    }
	$codefalse = true;
	require("output/notFound.php");
return false;
}
?>