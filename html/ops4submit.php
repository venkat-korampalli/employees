<?php
session_start();
require_once ('process/dbh.php');

if(isset($_POST['send'])){

$id = (isset($_GET['id']) ? $_GET['id'] : '');
$id = $_GET['id'];
date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'Y-m-d H:i:s', time () );

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

    $sql = "INSERT INTO `ops4` (`id`, `empid`, `timestamp`, `cprojectid`, `succorrecruiter`, `ccandidatename`, `ctechnology`, `ccandidatelocation`, `ccandidatevisastatus`, `crate`, `cemail`, `cnumber`, `csubmissiondate`) VALUES ('', '$id', '$currentTime', '$cpid', '$succorrecruiter', '$ccandidatename', '$ctechnology', '$ccandidatelocation', '$ccandidatevisastatus', '$crate', '$cemail', '$cnumber', '$csubmissiondate')";

$result = mysqli_query($conn, $sql);

if($result){
    
    echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Succesfully Registered')
    </SCRIPT>");
     header("Location: map-googleops4.php?id=$id");
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