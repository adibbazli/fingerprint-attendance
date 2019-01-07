<?php 
// User-side Interface for record attendance
// Design Concept is for Arduino to send id and security string to this page
// This page will process it and return output value (Server to server)
// This page will receive POST data which is staffid(id), hash(static_based) and type (add, leave, break)
// This demo version will only work at standard office

$staffid = $_GET["id"];
$hash = $_GET["hash"];
$type = $_GET["type"];

if (verify($staffid, $hash) == true)
    verify_ok($staffid, $type);
else verify_fail();

// We use simple verification algorithm
function verify($id, $hash) {
    $key = 123456;
    $res = $id * $key; // 123456 is key, can be change
	
    $res = sha1($res);
	//echo $res;
    if( strcasecmp($res, $hash) == 0)
        return true;
    return false;
}

function verify_ok($staffid, $type){
    include "../dbconnect.php";
    $sql = "SELECT * FROM activestaff WHERE staffID=$staffid";
    $qry = mysqli_query($con, $sql);
    $qry = mysqli_fetch_assoc($qry);
    
    if ($qry != 0){
        date_default_timezone_set('Asia/Kuala_Lumpur');
        $time = time();
        $dates = date("Ddm", $time);
        $NRIC = $qry['NRIC'];
        
        switch($type){
            // Start Case is generally easy however Stop Case is quite complex since there is a lot of factor
            
            case "Start" :
                if(verify_db($con, $NRIC, $dates) != 0){
                    //echo "<p>You've check in earlier<p>";
					require("output/already.html");
                    exit;
                }
        
                $sql = "INSERT INTO attendance (NRIC, dates, start) VALUES ('$NRIC', '$dates', '$time')";
                break;
            case "Stop" :
                // Check if User has record the attendance before
                if(verify_db($con, $NRIC, $dates) == 0){
					$checkin = true;
                    require("output/otherfailsafe.php");
                    exit;
                }
                // Check if User has checkout before
                if(verify_db_end($con, $NRIC, $dates) != null){
                    $checkin = false;
                    require("output/otherfailsafe.php");
                    exit;
                }
                $sql = "Update attendance SET end='$time' WHERE NRIC='$NRIC' AND dates='$dates'";
                break;
            case "eStop" : // Emergency early leave
                // Check if User has record the attendance before
                if(verify_db($con, $NRIC, $dates) == 0){
                    $checkin = true;
                    require("output/otherfailsafe.php");
                    exit;
                }
                // Check if User has checkout before
                if(verify_db_end($con, $NRIC, $dates) != null){
                    $checkin = false;
                    require("output/otherfailsafe.php");
                    exit;
                }
                $sql = "Update attendance SET end='$time', note='emergency' WHERE NRIC='$NRIC' AND dates='$dates'";
                break;
            default :
                echo "<p>TYPE_ERR<p>";
                exit;
                break;
    }
        
        if ($con->query($sql) === TRUE) {
            Switch($type){
                case "Start" : 
				//echo "<p>Welcome Back!</p>";
				require("output/start.php");
                    break;
                case "Stop" :
				//echo "<p>Goodbye, have a save journey!</p>";
				require("output/stop.php");
                    break;
                case "eStop" :
				//echo "<p><b>Emergency early leave</b><br>All the best from us</p>";
				require("output/emergency.php");
                    break;
            }
        } else echo "DB_UPDATE_ERR";
        
    }
        else verify_fail();
} // End function verify_ok

function verify_fail(){
    //echo "<p>No Match Found</p>";
	require("output/notrecognize.html");
}

function verify_db($con, $NRIC, $dates){
    $sql = "SELECT * FROM attendance WHERE NRIC='$NRIC' AND dates='$dates'";
    $qry = mysqli_query($con, $sql);
    $_qry = mysqli_num_rows($qry);
    
    return $_qry;
}

function verify_db_end($con, $NRIC, $dates){
    
    $sql = "SELECT * FROM attendance WHERE NRIC='$NRIC' AND dates='$dates'";
    $qry = mysqli_query($con, $sql);
    $qry = mysqli_fetch_assoc($qry);
    
    return $qry["end"];
}
?>