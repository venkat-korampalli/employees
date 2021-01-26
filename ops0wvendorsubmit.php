<?php
session_start();
require_once ('process/dbh.php');
require_once ('process/session.php');


if(isset($_POST['send'])){

$id = (isset($_GET['id']) ? $_GET['id'] : '');
$id = $_GET['id'];
date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'Y-m-d H:i:s', time () );

$succoremployee = $_POST['succoremployee'];
$vendorname = $_POST['vendorname'];
$vendorcontact = $_POST['vendorcontact'];
$vendoremail = $_POST['vendoremail'];
$company = $_POST['company'];
$location = $_POST['location'];
$designation = $_POST['designation'];
$feedback = $_POST['feedback'];
//$clientlocation = $_POST['clientlocation'];
//$feedback = $_POST['feedback'];

    $sql = "INSERT INTO `ops0wvendors` (`empid`, `timestamp`, `succoremployee`, `vendorname`, `vendorcontact`, `vendoremail`, `company`, `location`,  `designation`, `feedback`) VALUES ('$id', '$currentTime', '$succoremployee', '$vendorname', '$vendorcontact', '$vendoremail', '$company', '$location', '$designation', '$feedback')";

$result = mysqli_query($conn, $sql);

if($result){
    
    echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Succesfully Registered');
    </SCRIPT>");
    header("Location: ops0wvendor.php?id=$id");
    message($msg="You're Succesfully submitted!", $msgtype="success");

 }

else{
    echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Failed to Register')
    window.location.href='javascript:history.go(-1)';
    </SCRIPT>");
}



}else{
    echo "Unable to insert data";
}
?>