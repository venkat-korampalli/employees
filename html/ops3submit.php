<?php
session_start();
require_once ('process/dbh.php');
require_once ('process/session.php');


if(isset($_POST['send'])){

$id = (isset($_GET['id']) ? $_GET['id'] : '');
$id = $_GET['id'];
date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'Y-m-d H:i:s', time () );

$pid = $_POST['projectid'];
$recruitername = $_POST['recruitername'];
$candidatename = $_POST['candidatename'];
$technology = $_POST['technology'];
$clientlocation = $_POST['clientlocation'];
$candidatevisastatus = $_POST['candidatevisastatus'];
$rate = $_POST['rate'];
$client = $_POST['client'];
$implementation = $_POST['implementation'];
$vendorname = $_POST['vendorname'];
$vendoremail = $_POST['vendoremail'];
$vendornumber = $_POST['vendornumber'];
$submissionstatus =$_POST['submissionstatus'];

    $sql = "INSERT INTO `ops12345` (`id`, `empid`, `timestamp`, `projectid`, `recruitername`, `candidatename`, `technology`, `clientlocation`, `candidatevisastatus`, `rate`,  `client`, `implementation`,`vendorname`, `vendoremail`, `vendornumber`, `submissionstatus`) VALUES ('', '$id', '$currentTime', '$pid', '$recruitername', '$candidatename', '$technology', '$clientlocation', '$candidatevisastatus', '$rate', '$client', '$implementation', '$vendorname', '$vendoremail', '$vendornumber', '$submissionstatus')";

$result = mysqli_query($conn, $sql);

if($result){
    
    echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Succesfully Registered')
    </SCRIPT>");
    header("Location: map-google.php?id=$id");
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