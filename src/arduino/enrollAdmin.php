<?php 
include "dbconnect.php";
$NRIC = $_SESSION["NRIC"];

$sql = "SELECT * FROM activestaff WHERE NRIC='$NRIC'";
$qry = mysqli_query($con, $sql);
$_qry = mysqli_fetch_assoc($qry);

if($_qry == 0){
    echo "NRIC_NOT_MATCH"; // Verify fail, in actual product, this is not user input
    exit; // , please advised
}

$id = $_qry["StaffID"];
$key = 123456;
$hash = $id * $key;
$hash = sha1($hash);

$url = 'http://iktihad.com/enroll'; // URL always Changing
$data = array('hash'=>$hash, 'id'=>$id);
$opts = array(
    'http'=>array(
        'header'=>"Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($data)
    )
);
$context  = stream_context_create($opts);
$result = file_get_contents($url, false, $context);
if ($result === FALSE) { /* Handle error */ }
echo $result;
?>