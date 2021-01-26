<?php
session_start();
require_once ('process/dbh.php');
require_once ('process/session.php');


if(isset($_POST['send'])){

$id = (isset($_GET['id']) ? $_GET['id'] : '');
$id = $_GET['id'];
date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'Y-m-d H:i:s', time () );
$requirement = $_POST['requirement'];
$service = $_POST['service'];
$technology = $_POST['technology'];
$candidatename = $_POST['candidatename'];
$candidateemail = $_POST['email'];
$candidatenumber = $_POST['candidatenumber'];
$dealamount = $_POST['dealamount'];
$resourceamount = $_POST['resourceamount'];
$status = $_POST['status'];


    $sql = "INSERT INTO `ops1data`(`empid`, `timestamp`, `requirement`, `service`, `technology`, `candidatename`, `candidateemail`, `candidatenumber`, `dealamount`, `resourceamount`, `status`) VALUES ('$id', '$currentTime', '$requirement', '$service', '$technology', '$candidatename', '$candidateemail', '$candidatenumber', '$dealamount', '$resourceamount', '$status')";

$result = mysqli_query($conn, $sql);

if($result){
    
    echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Succesfully Registered')
    window.location.href='javascript:history.go(-1)';
    </SCRIPT>");
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