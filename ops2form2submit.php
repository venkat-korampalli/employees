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
$date = $_POST['date'];
$client = $_POST['client'];
$requirement = $_POST['requirement'];
$location = $_POST['location'];
$candidatename = $_POST['candidatename'];
$candidatenumber = $_POST['candidatenumber'];
$email = $_POST['email'];
$status = $_POST['status'];
$feedback = $_POST['feedback'];
//$weblink = $_POST['weblink'];
//$sourcedprofiles = $_POST['sourcedprofiles'];

    $sql = "INSERT INTO `ops2form2` (`empid`, `timestamp`, `date`, `client`, `requirement`, `location`, `candidatename`, `candidatenumber`, `email`, `status`,`feedback`) VALUES ('$id', '$currentTime', '$date', '$client', '$requirement', '$location', '$candidatename', '$candidatenumber', '$email', '$status', '$feedback')";

$result = mysqli_query($conn, $sql);

if($result){
    
    echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Succesfully Registered')
    window.location.href='javascript:history.go(-1)';
    </SCRIPT>");
   // header("Location: map-google.php?id=$id");
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