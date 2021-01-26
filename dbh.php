<?php

$servername = "localhost";
$dBUsername = "mysqluser";
$dbPassword = "Cvl-123$";
$dBName = "employees";

$conn = mysqli_connect($servername, $dBUsername, $dbPassword, $dBName);

if(!$conn){
	echo "Databese Connection Failed";
}

?>
