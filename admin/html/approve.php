<?php
//including the database connection file
include("process/dbh.php");

//getting id of the data from url
$id1 = $_GET['id1'];
$id = $_GET['id'];

$token = $_GET['token'];

//deleting the row from table
$result = mysqli_query($conn, "UPDATE `employee_leave` SET `status`='Approved' WHERE id = $id1 AND token = $token;");

//redirecting to the display page (index.php in our case)
header("Location: empleave.php?id=$id");
?>

