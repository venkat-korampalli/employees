<?php
//including the database connection file
include("process/dbh.php");

//getting id of the data from url
$id = (isset($_GET['id']) ? $_GET['id'] : '');
$id1 = (isset($_GET['id1']) ? $_GET['id1'] : '');

//deleting the row from table
$result = mysqli_query($conn, "DELETE FROM youtube WHERE id=$id1");

//redirecting to the display page (index.php in our case)
 echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Succesfully Registered')
    window.location.href='javascript:history.go(-1)';
    </SCRIPT>");
?>

