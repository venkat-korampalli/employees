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
$clientname = $_POST['clientname'];
$location = $_POST['location'];
$contactedperson = $_POST['contactedperson'];
$number = $_POST['number'];
$emailid = $_POST['emailid'];
$source = $_POST['source'];
$status = $_POST['status'];
$callstatus = $_POST['callstatus'];
$feedback = $_POST['feedback'];
$weblink = $_POST['weblink'];
$sourcedprofiles = $_POST['sourcedprofiles'];

    $sql = "INSERT INTO `ops2form2` (`id`, `empid`, `timestamp`, `projectid`, `clientname`, `location`, `contactedperson`, `number`, `emailid`, `source`, `status`, `callstatus`,`feedback`, `weblink`, `sourcedprofiles`) VALUES ('', '$id', '$currentTime', '$pid', '$clientname', '$location', '$contactedperson', '$number', '$emailid', '$source', '$status', '$callstatus', '$feedback', '$weblink', '$sourcedprofiles')";

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