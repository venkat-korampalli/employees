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
$succoremployee = $_POST['succoremployee'];
//$recruitername = $_POST['recruitername'];
$accountname = $_POST['accountname'];
$projectdetails = $_POST['projectdetails'];
$biddingamount = $_POST['biddingamount'];
$skills = $_POST['skills'];
$clientname = $_POST['clientname'];
$clientlocation = $_POST['clientlocation'];
$feedback = $_POST['feedback'];

    $sql = "INSERT INTO `ops0data1` (`empid`, `timestamp`, `projectid`, `succoremployee`, `accountname`, `projectdetails`, `biddingamount`, `skills`,  `clientname`, `clientlocation`,`feedback`) VALUES ('$id', '$currentTime', '$pid', '$succoremployee', '$accountname', '$projectdetails', '$biddingamount', '$skills', '$clientname', '$clientlocation', '$feedback')";

$result = mysqli_query($conn, $sql);

if($result){
    
    echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Succesfully Registered')
    window.location.href='javascript:history.go(-1)';
    </SCRIPT>");
   // header("Location: ops0form1.php?id=$id");
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