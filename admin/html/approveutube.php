<?php
//including the database connection file
include("process/dbh.php");

//getting id of the data from url
$id1 = $_GET['id1'];
$id = $_GET['id'];


//deleting the row from table
$result = mysqli_query($conn, "UPDATE `youtube` SET `status`='Approved' WHERE id = $id1;");

//redirecting to the display page (index.php in our case)
header("Location: utube.php?id=$id");
?>

