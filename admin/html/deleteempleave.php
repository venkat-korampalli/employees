<?php
//including the database connection file
include("process/dbh.php");
require_once ('process/session.php');

//getting id of the data from url
$token = $_GET['token'];
$id = $_GET['id'];
//deleting the row from table
$result = mysqli_query($conn, "DELETE FROM employee_leave WHERE token=$token");

//redirecting to the display page (index.php in our case)
 echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Succesfully Removed!')
    window.location.href='javascript:history.go(-1)';
    </SCRIPT>");
    message("Oops! You Successfully Removed","danger");
?>