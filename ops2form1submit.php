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
$clientlocation = $_POST['clientlocation'];
$contactperson = $_POST['contactperson'];
$contactnumber = $_POST['contactnumber'];
$email = $_POST['email'];
$weblink = $_POST['weblink'];
$requirement = $_POST['requirement'];
$requirementlocation = $_POST['requirementlocation'];
$quantity = $_POST['quantity'];
$visitedby = $_POST['visitedby'];
$value = $_POST['value'];
$status = $_POST['status'];


    $sql = "INSERT INTO `ops2form1` (`empid`, `timestamp`, `projectid`, `clientname`, `clientlocation`, `contactperson`, `contactnumber`, `email`, `weblink`, `requirement`, `requirementlocation`, `quantity`, `visitedby`, `value`, `status`) VALUES ('$id', '$currentTime', '$pid', '$clientname', '$clientlocation', '$contactperson', '$contactnumber', '$email', '$weblink', '$requirement', '$requirementlocation', '$quantity', '$visitedby', '$value', '$status')";

$result = mysqli_query($conn, $sql);

if($result){
    
    echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Succesfully Registered')
    window.location.href='javascript:history.go(-1)';
    </SCRIPT>");
  //  header("Location: map-googleops2form1.php?id=$id");
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