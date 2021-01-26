<?php
session_start();
require_once ('process/dbh.php');
require_once ('process/session.php');


if(isset($_POST['submit'])){

$id = (isset($_GET['id']) ? $_GET['id'] : '');
$id = $_GET['id'];
date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'Y-m-d H:i:s', time () );

$name = $_POST['name'];
$technology = $_POST['technology'];
$visa = $_POST['visa'];
$contract = $_POST['contract'];
$certification = $_POST['certification'];
$email = $_POST['email'];
$number = $_POST['contact'];
$linkedin = $_POST['linkedin'];
$consultantname = $_POST['consultantname'];
$recruitername = $_POST['recruitername'];
$experience = $_POST['experience'];
//$vendornumber = $_POST['vendornumber'];
//$submissionstatus =$_POST['submissionstatus'];
  
  
    $sql = "INSERT INTO `ops4wglconsultantdata` (`empid`, `timestamp`, `name`, `technology`, `visa`, `contract`, `certification`, `email`, `number`,  `linkedin`, `consultantname`,`recruitername`, `experience`) VALUES ('$id', '$currentTime', '$name', '$technology', '$visa', '$contract', '$certification', '$email', '$number', '$linkedin', '$consultantname', '$recruitername', '$experience')";
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