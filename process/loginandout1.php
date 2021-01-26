<?php
session_start();
require_once ('dbh.php');
require_once ('session.php');

date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentDate = date( 'Y-m-d');
$currentTime = date('H:i:s', time ()); 

$id = (isset($_GET['id']) ? $_GET['id'] : '');
//$pid = $_GET['pid'];
$id = $_GET['id'];
//$date = date('Y-m-d h:i:sA');
//echo "$date";
$sql = "INSERT INTO `userlog1`(`empid`, `logindate`, `logintime`) VALUES ('$id','$currentDate', '$currentTime')";
$result = mysqli_query($conn , $sql);
header("Location: ../index.php?id=$id");
message($msg="Your Work has been started!", $msgtype="info");



?>