<?php

require_once ('dbh.php');
date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'Y-m-d H:i:s', time () );
$id = $_GET['id'];
$pname = $_POST['pname'];
$eid = $_POST['eid'];
$subdate = $_POST['duedate'];
$action = $_POST['action'];
//$filename = $_FILES['myfile']['name'];
//$idcard = $_FILES['idcard']['name'];

    // destination of the file on the server
  //  $destination = '../../../uploads/' . $filename;
//    $destination = '../../../uploads/' . $idcard;

    // get the file extension
   // $extension = pathinfo($filename, PATHINFO_EXTENSION);
    //$extension = pathinfo($idcard, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    //$file = $_FILES['myfile']['tmp_name'];
    //$file = $_FILES['idcard']['tmp_name'];
    //$size = $_FILES['myfile']['size'];
    //$size = $_FILES['idcard']['size'];
     //if (!in_array($extension, ['zip', 'pdf', 'docx', 'png', 'jpg', 'jpeg', ''])) {
      //  echo "You file extension must be .zip, .pdf or .docx";
    //} elseif (($_FILES['myfile']['size'] > 1000000) && ($_FILES['idcard']['size'] > 1000000)) { // file shouldn't be larger than 20Megabyte
      //  echo "File too large!";
    //} else {
        // move the uploaded (temporary) file to the specified destination
      //  if (move_uploaded_file($file, $destination)) {
          //  $sql = "INSERT INTO files (name, size, downloads) VALUES ('$filename', $size, 0)";
          //   $sql = "INSERT INTO `project` (`eid`, `timestamp`, `pname`, `duedate` , `status`, `filename`, `idcard`, `size`, `downloads`) VALUES ('$eid', '$currentTime', '$pname', '$subdate', 'Due', '$filename', '$idcard', $size, 0)";
        //     $sql1 = "INSERT INTO `quickfiles` (`empid`, `timestamp`, `cresume`, `cid`, `size`, `downloads`) VALUES ('$eid', '$currentTime', '$filename', '$idcard', $size, 0)";
         //   $result = mysqli_query($conn, $sql);
          //  $result1 = mysqli_query($conn,$sql1);
        //    if (($result) && ($result1)) {
          //      echo "File uploaded successfully";
            //     echo ("<SCRIPT LANGUAGE='JavaScript'>
            // window.alert('Successfully Assigned')
            // window.location.href='javascript:history.go(-1)';
        //    </SCRIPT>");
          //  }
    //    } else {
      //      echo "Failed to upload file.";
        //     $sql2 = "INSERT INTO `project` (`eid`, `timestamp`, `pname`, `duedate`, `status`) VALUES ('$eid', '$currentTime', '$pname', '$subdate', 'Due')";
          //   $result2 = mysqli_query($conn, $sql2);
        //     echo ("<SCRIPT LANGUAGE='JavaScript'>
         //    window.alert('Failed to Assign')
          //  </SCRIPT>");
    //    }
//    }


  $sql = "INSERT INTO `project`(`eid`, `timestamp`, `pname`, `duedate` , `action`, `status`) VALUES ('$eid' , '$currentTime', '$pname' , '$subdate' , '$action', 'Due')";
 $result = mysqli_query($conn, $sql);


if(($result) == 1){
    
    ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Successfully Assigned!')
    </SCRIPT>");
    header("Location: ../empassignproject.php?id=$id");
}

else{
   ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Failed to Assign')
    window.location.href='javascript:history.go(-1)';
    </SCRIPT>");
}

?>