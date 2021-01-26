<?php
session_start();
require_once ('process/dbh.php');
require_once ('process/session.php');


if(isset($_POST['send'])){

$id = (isset($_GET['id']) ? $_GET['id'] : '');
$id = $_GET['id'];
date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'Y-m-d H:i:s', time () );

$succoremployee = $_POST['succoremployee'];
$consultantname = $_POST['consultantname'];
$consultantemailid = $_POST['consultantemailid'];
$consultantcontactnumber = $_POST['consultantcontactnumber'];
$technology = $_POST['technology'];
$visastatus = $_POST['visastatus'];
$contract = $_POST['contract'];
$certification = $_POST['certification'];
$consultantlinkedin = $_POST['consultantlinkedin'];
$status = $_POST['status'];

    $sql = "INSERT INTO `ops0data2` (`empid`, `timestamp`, `succoremployee`, `consultantname`, `consultantemailid`, `consultantcontactnumber`, `technology`, `visastatus`, `contract`, `certification`, `consultantlinkedin`, `status`) VALUES ('$id', '$currentTime', '$succoremployee', '$consultantname', '$consultantemailid', '$consultantcontactnumber', '$technology', '$visastatus', '$contract', '$certification', '$consultantlinkedin', '$status')";

$result = mysqli_query($conn, $sql);

if($result){
    
    echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Succesfully Registered')
    window.location.href='javascript:history.go(-1)';
    </SCRIPT>");
   // header("Location: ops0form2.php?id=$id");
    message($msg="You're Succesfully submitted!", $msgtype="success");

 }

else{
    echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Failed to Register')
    window.location.href='javascript:history.go(-1)';
    </SCRIPT>");
}



}else{
    echo "Unable to insert data";
}
?>