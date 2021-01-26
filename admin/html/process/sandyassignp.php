<?php

require_once ('dbh.php');
date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'Y-m-d H:i:s', time () );
$id = $_GET['id'];
$pname = $_POST['pname'];
$eid = $_POST['eid'];
$subdate = $_POST['duedate'];
 $ops = $_POST['ops'];

 $sql = "INSERT INTO `project`(`eid`, `timestamp`, `pname`, `duedate` , `ops`, `status`) VALUES ('$eid' , '$currentTime', '$pname' , '$subdate', '$ops', 'Due')";

$result = mysqli_query($conn, $sql);


if(($result) == 1){
    
    
    echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Successfully Assigned')
    window.location.href='javascript:history.go(-2)';
    </SCRIPT>");
}

else{
    echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Failed to Assign')
    window.location.href='javascript:history.go(-1)';
    </SCRIPT>");
}




?>