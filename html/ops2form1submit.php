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
$jd = $_POST['jd'];
$clientname = $_POST['clientname'];
$contactperson = $_POST['contactperson'];
$contactnumber = $_POST['contactnumber'];
$requirement = $_POST['requirement'];
$quality = $_POST['quality'];
$sentprofiles = $_POST['sentprofiles'];
$shortlisted = $_POST['shortlisted'];
$selectedprofiles = $_POST['selectedprofiles'];


    $sql = "INSERT INTO `ops2form1` (`id`, `empid`, `timestamp`, `projectid`, `clientname`, `contactperson`, `contactnumber`, `requirement`, `quality`, `sentprofiles`,  `shortlisted`, `selectedprofiles`) VALUES ('', '$id', '$currentTime', '$pid', '$clientname', '$contactperson', '$contactnumber', '$requirement', '$quality', '$sentprofiles', '$shortlisted', '$selectedprofiles')";

$result = mysqli_query($conn, $sql);

if($result){
    
    echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Succesfully Registered')
    </SCRIPT>");
    header("Location: map-googleops2form1.php?id=$id");
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