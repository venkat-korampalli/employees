<?php
session_start();
require_once ('dbh.php');
date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'Y-m-d H:i:s', time () );

$id = (isset($_GET['id']) ? $_GET['id'] : '');
//$pid = $_GET['pid'];
$id = $_GET['id'];
//$date = date('Y-m-d h:i:sA');
//echo "$date";
$sql = "INSERT INTO `userlog`(`id`, `empid`, `logintime`) VALUES ('','$id','$currentTime')";
$result = mysqli_query($conn , $sql);
header("Location: ../index.php?id=$id");


?>