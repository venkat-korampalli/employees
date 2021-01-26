<?php
session_start();
require_once ('dbh.php');
require_once ('session.php');


if(isset($_POST['submit'])){

$email = $_POST['email'];
$password = sha1($_POST['password']);

$sql = "SELECT * from `alogin` WHERE email = '$email' AND password = '$password'";
$sqlid = "SELECT userid from `alogin` WHERE email = '$email' AND password = '$password'";


//echo "$sql";
$userid = "";
$result = mysqli_query($conn, $sql);
$id = mysqli_query($conn , $sqlid);

if(mysqli_num_rows($result) == 1){

	$admin = mysqli_fetch_array($id);
	$userid = ($admin['userid']);
	$_SESSION['userid'] = $userid;

	   message("You are now successfully login!","success");
	

	//echo ("logged in");
	//$_SESSION['email']= $email;
	header("location: ../index.php?id=$userid");
	
}

else{
	echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Invalid Email or Password')
    window.location.href='javascript:history.go(-1)';
    </SCRIPT>");
}
}
?>