<?php
require_once ('dbh.php');

$empid = $_POST['empid'];
$jdate = $_POST['jdate'];
$firstname = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$pass = sha1($_POST['password']);
$contact = $_POST['contact'];
$address = $_POST['address'];
$gender = $_POST['gender'];
$nid = $_POST['nid'];
$dept = $_POST['dept'];
$ops = $_POST['ops'];
$degree = $_POST['degree'];
$salary = $_POST['salary'];
$birthday =$_POST['birthday'];
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

     $sql = "INSERT INTO `employee`(`empid`,`joiningdate`,`firstName`, `lastName`, `email`, `password`, `birthday`, `gender`, `contact`, `nid`,  `address`, `dept`,`ops`, `degree`, `pic`) VALUES ('$empid','$jdate','$firstname','$lastName','$email','$pass','$birthday','$gender','$contact','$nid','$address','$dept','$ops','$degree','$destinationfile')";

$result = mysqli_query($conn, $sql);

$last_id = $conn->insert_id;

$sqlS = "INSERT INTO `salary`(`id`, `base`, `bonus`, `total`) VALUES ('$last_id','$salary',0,'$salary')";
$salaryQ = mysqli_query($conn, $sqlS);
$rank = mysqli_query($conn, "INSERT INTO `rank`(`eid`) VALUES ('$last_id')");

if(($result) == 1){
    
    echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Succesfully Registered')
    window.location.href='javascript:history.go(-1)';
    </SCRIPT>");
    //header("Location: ..//aloginwel.php");
}

else{
    echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Failed to Register')
    window.location.href='javascript:history.go(-1)';
    </SCRIPT>");
}

}

else{

    $sql = "INSERT INTO `employee`(`empid`,`firstName`, `lastName`, `email`, `password`, `birthday`, `gender`, `contact`, `nid`,  `address`, `dept`,`ops`, `degree`, `pic`) VALUES ('$empid','$firstname','$lastName','$email','$pass','$birthday','$gender','$contact','$nid','$address','$dept','$ops','$degree','$destinationfile')";

$result = mysqli_query($conn, $sql);

$last_id = $conn->insert_id;

$sqlS = "INSERT INTO `salary`(`id`, `base`, `bonus`, `total`) VALUES ('$last_id','$salary',0,'$salary')";
$salaryQ = mysqli_query($conn, $sqlS);
$rank = mysqli_query($conn, "INSERT INTO `rank`(`eid`) VALUES ('$last_id')");

if(($result) == 1){
    
    echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Succesfully Registered')
    window.location.href='..//viewemp.php';
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