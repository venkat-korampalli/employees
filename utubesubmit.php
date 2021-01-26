<?php
session_start();
require_once ('process/dbh.php');
require_once ('process/session.php');


if(isset($_POST['submit'])){

$id = (isset($_GET['id']) ? $_GET['id'] : '');
$id = $_GET['id'];
date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'Y-m-d H:i:s', time () );

$videolink = $_POST['videolink'];
$utubelink = $_POST['utubelink'];
$title = $_POST['title'];
//$recruitername = $_POST['recruitername'];
$description = $_POST['description'];
$thoughts = $_POST['thoughts'];
//$biddingamount = $_POST['biddingamount'];
//$skills = $_POST['skills'];
//$clientname = $_POST['clientname'];
//$clientlocation = $_POST['clientlocation'];
//$feedback = $_POST['feedback'];

    $sql = "INSERT INTO `youtube` (`empid`, `timestamp`, `videolink`, `utubelink`, `title`, `description`, `thoughts`, `status`) VALUES ('$id', '$currentTime', '$videolink', '$utubelink', '$title', '$description', '$thoughts', 'Pending')";

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