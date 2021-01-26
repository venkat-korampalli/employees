<?php
session_start();
require_once ('dbh.php');
require_once ('session.php');

if(isset($_POST['submit'])){
$email = $_POST['mailuid'];
$password = sha1($_POST['pwd']);

$sql = "SELECT * FROM `employee` WHERE email = '$email' AND password = '$password'";

$result = mysqli_query($conn, $sql);

$empid = "";
if(mysqli_num_rows($result) == 1){
	
	$employee = mysqli_fetch_array($result);
	$id = ($employee['id']);
    $empid = ($employee['empid']);
   // $dept = ($employee['id']);
   // $ops = ($employee['ops']);
	$_SESSION['id'] = $id;
    $_SESSION['empid'] = $empid;
   // $_SESSION['dept'] = $dept;
    //$_SESSION['ops'] = $ops;
    header("location: ../index.php?id=$id");
    message("You are now successfully login!","success");

	//echo ("logged in");
	//echo ("$empid");
	
}

else{
	echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Invalid Email or Password')
    window.location.href='javascript:history.go(-1)';
    </SCRIPT>");
}
}

?>