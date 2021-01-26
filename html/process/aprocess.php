<?php
require_once ('dbh.php');

if(isset($_POST['submit'])){

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * from `alogin` WHERE email = '$email' AND password = '$password'";

//echo "$sql";

$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) == 1){
	

	//echo ("logged in");
	$_SESSION['email']= $email;
	header("location: ../index.php");
	
}

else{
	echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Invalid Email or Password')
    window.location.href='javascript:history.go(-1)';
    </SCRIPT>");
}
}
?>