<?php
session_start();
require_once ('process/dbh.php');
require_once ('process/session.php');


if(isset($_POST['submit'])){

$id = (isset($_GET['id']) ? $_GET['id'] : '');
$id = $_GET['id'];
date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'Y-m-d H:i:s', time () );

$startdate = $_POST['startdate'];
$name = $_POST['name'];
$technology = $_POST['technology'];
$email = $_POST['email'];
$number = $_POST['number'];
$visa = $_POST['visa'];
$reference = $_POST['reference'];
$assigned = $_POST['assigned'];
//$candidatevisastatus = $_POST['candidatevisastatus'];
//$rate = $_POST['rate'];
//$client = $_POST['client'];
//$implementation = $_POST['implementation'];
//$vendorname = $_POST['vendorname'];
//$vendoremail = $_POST['vendoremail'];
//$vendornumber = $_POST['vendornumber'];
//$submissionstatus =$_POST['submissionstatus'];
  
  
    $sql = "INSERT INTO `ops3benchdata` (`admin`, `timestamp`, `startdate`, `name`, `technology`, `email`, `number`, `visa`, `reference`, `assigned`) VALUES ('$id', '$currentTime', '$startdate', '$name', '$technology', '$email', '$number', '$visa', '$reference', '$assigned')";
    $result = mysqli_query($conn, $sql);


if($result){
    
    echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Succesfully Registered');
    window.location.href='javascript:history.go(-1)';
    </SCRIPT>");
   // header("Location: map-google.php?id=$id");
    message($msg="You're Succesfully submitted!", $msgtype="success");

 }

else{
    echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Failed to Register');
    window.location.href='javascript:history.go(-1)';
    </SCRIPT>");
}



}else{
    echo "Unable to insert data";
}
?>