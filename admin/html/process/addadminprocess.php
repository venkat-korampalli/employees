<?php

require_once ('dbh.php');

$userid = $_POST['userid'];
$name = $_POST['name'];
$email = $_POST['email'];
$password = sha1($_POST['password']);
$role = $_POST['role'];

//echo "$birthday";
$files = $_FILES['file'];
$filename = $files['name'];
$filrerror = $files['error'];
$filetemp = $files['tmp_name'];
$fileext = explode('.', $filename);
$filecheck = strtolower(end($fileext));
$fileextstored = array('png' , 'jpg' , 'jpeg');

if(in_array($filecheck, $fileextstored)){

    $destinationfile = 'images/'.$filename;
    move_uploaded_file($filetemp, $destinationfile);

    $sql = "INSERT INTO `alogin`(`userid`, `name`, `email`, `password`, `role`, `pic`) VALUES ('$userid','$name','$email','$password','$role','$destinationfile')";

$result = mysqli_query($conn, $sql);

if(($result) == 1){
    
    echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Succesfully Registered')
    window.location.href='javascript:history.go(-1)';
    </SCRIPT>");
    //header("Location: ..//aloginwel.php");
}

else{
    echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Failed to Registere')
    window.location.href='javascript:history.go(-1)';
    </SCRIPT>");
}

}

else{

       $sql = "INSERT INTO `alogin`(`id`,`userid`, `name`, `email`, `password`, `role`, `pic`) VALUES ('','$userid','$name','$email','$password','$role','$destinationfile')";

$result = mysqli_query($conn, $sql);

if(($result) == 1){
    
    echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Succesfully Registered')
    window.location.href='../manageusers.php?id=$userid';
    </SCRIPT>");
    //header("Location: ..//aloginwel.php");
}

// else{
//     echo ("<SCRIPT LANGUAGE='JavaScript'>
//     window.alert('Failed to Registere')
//     window.location.href='javascript:history.go(-1)';
//     </SCRIPT>");
// }
}






?>