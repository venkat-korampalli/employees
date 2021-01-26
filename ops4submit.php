<?php
session_start();
require_once ('process/dbh.php');
require_once ('process/session.php');

if(isset($_POST['send'])){

$id = (isset($_GET['id']) ? $_GET['id'] : '');
$id = $_GET['id'];
 $sql3 = "SELECT * FROM `employee` WHERE id = '$id'";
 $result3 = mysqli_query($conn, $sql1);
     $employee = mysqli_fetch_array($result3);
     $empname = $employee['firstName'];
date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'Y-m-d H:i:s', time () );
$date = date('Y-m-d');

$cpid = $_POST['cprojectid'];
$succorrecruiter = $_POST['succorrecruiter'];
$ccandidatename = $_POST['ccandidatename'];
$ctechnology = $_POST['ctechnology'];
$ccandidatelocation = $_POST['ccandidatelocation'];
$ccandidatevisastatus = $_POST['ccandidatevisastatus'];
$crate = $_POST['crate'];
$cemail =$_POST['cemail'];
$cnumber =$_POST['cnumber'];
$csubmissiondate =$_POST['csubmissiondate'];

    $sql = "INSERT INTO `ops4data`(`empid`, `timestamp`, `cprojectid`, `succorrecruiter`, `ccandidatename`, `ctechnology`, `ccandidatelocation`, `ccandidatevisastatus`, `crate`, `cemail`, `cnumber`, `csubmissiondate`) VALUES ('$id', '$currentTime', '$cpid', '$succorrecruiter', '$ccandidatename', '$ctechnology', '$ccandidatelocation', '$ccandidatevisastatus', '$crate', '$cemail', '$cnumber', '$csubmissiondate')";
    $sql2 = "INSERT INTO `subcount2` (`empid`, `date`, `name`,`count`) VALUES ('$id', '$date', '$empname', '0')";
    $result = mysqli_query($conn, $sql);
    $result2 = mysqli_query($conn, $sql2);

if($result){
    
    echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Succesfully Registered')
    </SCRIPT>");
     header("Location: map-googleops4.php?id=$id");
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