<?php

require_once ('process/dbh.php');
//$id = (isset($_GET['id']) ? $_GET['id'] : '');
$pid = $_GET['pid'];
$id = $_GET['id'];
$date = date('Y-m-d');
//echo "$date";
$sql = "UPDATE `project` SET `subdate`='$date',`status`='Submitted' WHERE pid = '$pid';";
$result = mysqli_query($conn , $sql);
header("Location: table-basic.php?id=$id");
 if($result){
    
    ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Successfully Submitted!')
    window.location.href='javascript:history.go(-1)';
    </SCRIPT>");
}

else{
   ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Failed to Submit')
    window.location.href='javascript:history.go(-1)';
    </SCRIPT>");
}

?>