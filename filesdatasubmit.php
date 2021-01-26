<?php
session_start();
require_once ('process/dbh.php');
require_once ('process/session.php');

if(isset($_POST['submit'])){

$id = (isset($_GET['id']) ? $_GET['id'] : '');
$id = $_GET['id'];
date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'Y-m-d H:i:s', time () );

$fullname = $_POST['name'];
$technology = $_POST['technology'];
$email = $_POST['email'];
$contact = $_POST['contact'];
$visa = $_POST['visa'];
$birthday = $_POST['birthday'];
$gender = $_POST['gender'];
$resume = $_FILES['resume']['name'];


    // destination of the file on the server
    $destination = 'uploads/' . $resume;
   
    // get the file extension
    $extension = pathinfo($resume, PATHINFO_EXTENSION);
    
    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['resume']['tmp_name'];
    $size = $_FILES['resume']['size'];
    

    if (!in_array($extension, ['zip', 'pdf', 'docx'])) {
        echo "You file extension must be .zip, .pdf or .docx";
    } elseif (($_FILES['resume']['size'] > 10485760)) { // file shouldn't be larger than 1Megabyte
        echo "File too large!";
    } else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {
              $sql = "INSERT INTO `quickfiles`(`empid`, `timestamp`, `name`, `technology`, `emailid`, `contactnumber`, `visastatus`, `birthday`, `gender`, `cresume`, `size`, `downloads`) VALUES ('$id', '$currentTime', '$fullname', '$technology', '$email', '$contact', '$visa', '$birthday', '$gender', '$resume', $size, 0)";
              $result = mysqli_query($conn, $sql);
            if ($result) {
                echo "File uploaded successfully";
            }
        } else {
            echo "Failed to upload file.";
        }
    }




if($result){
    
    echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Succesfully Registered')
    </SCRIPT>");
    header("Location: filesdata.php?id=$id");
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