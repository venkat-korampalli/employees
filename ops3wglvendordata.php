<?php
session_start();
require_once ('process/dbh.php');
require_once ('process/session.php');


if(isset($_POST['submit'])){

$id = (isset($_GET['id']) ? $_GET['id'] : '');
$id = $_GET['id'];
date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'Y-m-d H:i:s', time () );

$vname = $_POST['vname'];
$vemail = $_POST['vemail'];
$vcontact = $_POST['vcontact'];
$vcompany = $_POST['vcompany'];
$vstatus = $_POST['vstatus'];
//$candidatevisastatus = $_POST['candidatevisastatus'];
//$rate = $_POST['rate'];
//$client = $_POST['client'];
//$implementation = $_POST['implementation'];
//$vendorname = $_POST['vendorname'];
//$vendoremail = $_POST['vendoremail'];
//$vendornumber = $_POST['vendornumber'];
//$submissionstatus =$_POST['submissionstatus'];
  
  
    $sql = "INSERT INTO `ops3wglvendordata` (`empid`, `timestamp`, `vendorname`, `vendoremail`, `vendorcontact`, `vendorcompany`, `vendorstatus`) VALUES ('$id', '$currentTime', '$vname', '$vemail', '$vcontact', '$vcompany', '$vstatus')";
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
    window.alert('Failed to Register')
    window.location.href='javascript:history.go(-1)';
    </SCRIPT>");
}



}else{
    echo "Unable to insert data";
}
?>