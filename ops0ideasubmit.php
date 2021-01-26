<?php
session_start();
require_once ('process/dbh.php');
require_once ('process/session.php');


if(isset($_POST['send'])){

$id = (isset($_GET['id']) ? $_GET['id'] : '');
$id = $_GET['id'];
date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'Y-m-d H:i:s', time () );

//$pid = $_POST['projectid'];
$country = $_POST['country'];
//$recruitername = $_POST['recruitername'];
$project = $_POST['project'];
$technology = $_POST['technology'];
$idea = $_POST['idea'];
//$skills = $_POST['skills'];
//$clientname = $_POST['clientname'];
//$clientlocation = $_POST['clientlocation'];
//$feedback = $_POST['feedback'];

    $sql = "INSERT INTO `ops0idea` (`empid`, `timestamp`, `country`, `project`, `technology`, `idea`) VALUES ('$id', '$currentTime', '$country', '$project', '$technology', '$idea')";

$result = mysqli_query($conn, $sql);

if($result){
    
    echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Succesfully Registered')
    </SCRIPT>");
    header("Location: ops0idea.php?id=$id");
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