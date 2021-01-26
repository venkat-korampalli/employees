<?php
session_start();
require_once ('dbh.php');
require_once ('session.php');



$email = $_POST['mailuid'];
$password = sha1($_POST['pwd']);

$sql = "SELECT * from `employee` WHERE email = '$email' AND password = '$password'";
$sqlid = "SELECT id from `employee` WHERE email = '$email' AND password = '$password'";

$result = mysqli_query($conn, $sql);
$id = mysqli_query($conn , $sqlid);

$empid = "";
if(mysqli_num_rows($result) == 1){
	
	$employee = mysqli_fetch_array($id);
	$empid = ($employee['id']);
   // $dept = ($employee['id']);
    $ops = ($employee['id']);
	$_SESSION['empid'] = $empid;
   // $_SESSION['dept'] = $dept;
    $_SESSION['ops'] = $ops;
    message("You are now successfully login!","success");



	

	//echo ("logged in");
	//echo ("$empid");
	
	header("Location: ../index.php?id=$empid");
}

else{
	echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Invalid Email or Password')
    window.location.href='javascript:history.go(-1)';
    </SCRIPT>");
}


?>