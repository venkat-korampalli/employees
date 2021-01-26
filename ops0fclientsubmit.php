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
$clientname = $_POST['clientname'];
$clientcontact = $_POST['clientcontact'];
$clientemail = $_POST['clientemail'];
$clientdesignation = $_POST['clientdesignation'];
$clientlocation = $_POST['clientlocation'];
$clientcontactaccount = $_POST['clientcontactaccount'];
$feedback = $_POST['feedback'];
$clientcontactid = $_POST['clientcontactid'];
//$feedback = $_POST['feedback'];

    $sql = "INSERT INTO `ops0futureclients` (`empid`, `timestamp`, `succoremployee`, `clientname`, `clientcontact`, `clientemail`, `clientdesignation`, `clientlocation`,  `clientcontactaccount`, `feedback`, `clientcontactid`) VALUES ('$id', '$currentTime', '$succoremployee', '$clientname', '$clientcontact', '$clientemail', '$clientdesignation', '$clientlocation', '$clientcontactaccount', '$feedback', '$clientcontactid')";

$result = mysqli_query($conn, $sql);

if($result){
    
    echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Succesfully Registered');
    </SCRIPT>");
    header("Location: ops0fclient.php?id=$id");
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