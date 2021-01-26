<?php

require_once ('dbh.php');
require_once ('session.php');

$sql = "SELECT * FROM `employee` WHERE 1";

//echo "$sql";
$result = mysqli_query($conn, $sql);
if(isset($_POST['update']))
{

	$id = mysqli_real_escape_string($conn, $_POST['id']);
	$jdate = mysqli_real_escape_string($conn, $_POST['jdate']);
	$firstname = mysqli_real_escape_string($conn, $_POST['firstName']);
	$lastname = mysqli_real_escape_string($conn, $_POST['lastName']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = sha1(mysqli_real_escape_string($conn, $_POST['password']));
	$birthday = mysqli_real_escape_string($conn, $_POST['birthday']);
	$contact = mysqli_real_escape_string($conn, $_POST['contact']);
	$address = mysqli_real_escape_string($conn, $_POST['address']);
	$gender = mysqli_real_escape_string($conn, $_POST['gender']);
	$nid = mysqli_real_escape_string($conn, $_POST['nid']);
	$dept = mysqli_real_escape_string($conn, $_POST['dept']);
    $ops = mysqli_real_escape_string($conn, $_POST['ops']);
	$degree = mysqli_real_escape_string($conn, $_POST['degree']);
	$salary = mysqli_real_escape_string($conn, $_POST['salary']);
	$files = $_FILES['pic'];
    $filename = $files['name'];
    $filrerror = $files['error'];
    $filetemp = $files['tmp_name'];
    $fileext = explode('.', $filename);
    $filecheck = strtolower(end($fileext));
    $fileextstored = array('png' , 'jpg' , 'jpeg');

if(in_array($filecheck, $fileextstored)){

    $destinationfile = 'images/'.$filename;
    move_uploaded_file($filetemp, $destinationfile);


	// $result = mysqli_query($conn, "UPDATE `employee` SET `firstName`='$firstname',`lastName`='$lastname',`email`='$email',`password`='$email',`gender`='$gender',`contact`='$contact',`nid`='$nid',`salary`='$salary',`address`='$address',`dept`='$dept',`degree`='$degree' WHERE id=$id");


$result = mysqli_query($conn, "UPDATE `employee` SET `joiningdate`='$jdate',`firstName`='$firstname',`lastName`='$lastname',`email`='$email',`password`='$password',`birthday`='$birthday',`gender`='$gender',`contact`='$contact',`nid`='$nid',`address`='$address',`dept`='$dept',`ops`='$ops',`degree`='$degree',`pic`='$destinationfile' WHERE id=$id");
$last_id = $conn->insert_id;

$sqlS = mysqli_query($conn, "UPDATE `salary` SET `base`='$salary',`total`='$salary' WHERE id=$id");
//$sqlS = "INSERT INTO `salary`(`id`, `base`, `bonus`, `total`) VALUES ('$last_id','$salary',0,'$salary')";
$salaryQ = mysqli_query($conn, $sqlS);
//$rank = mysqli_query($conn, "INSERT INTO `rank`(`eid`) VALUES ('$last_id')");
if($result){
    echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Succesfully Updated');
    window.location.href='javascript:history.go(-1)';
    </SCRIPT>");

message("Updated Successfully!","success");
        }
   }
}
?>




<?php
	$id = (isset($_GET['id']) ? $_GET['id'] : '');
	$sql = "SELECT * from `employee` WHERE id=$id";
	$result = mysqli_query($conn, $sql);
	$sql2 = "SELECT total from `salary` WHERE id = $id";
	$result2 = mysqli_query($conn , $sql2);
    $mysalary = mysqli_fetch_array($result2);
    $empS = ($mysalary['total']);
	if($result){
	while($res = mysqli_fetch_assoc($result)){
	$jdate = $res['joiningdate'];
	$firstname = $res['firstName'];
	$lastname = $res['lastName'];
	$email = $res['email'];
    $password = $res['password'];
	$contact = $res['contact'];
	$address = $res['address'];
	$gender = $res['gender'];
	$birthday = $res['birthday'];
	$nid = $res['nid'];
	$dept = $res['dept'];
    $ops = $res['ops'];
	$degree = $res['degree'];
	$pic = $res['pic'];
	
}
}

?>

<html>
<head>
	<title>View Employee |  Admin Panel | Succor</title>
	<!-- Icons font CSS-->
    <link href="../vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="../vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="../vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="../vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="../css2/main.css" rel="stylesheet" media="all">
    <style>
    /* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}  
    </style>
</head>
<body>
	
	

		<!-- <form id = "registration" action="edit.php" method="POST"> -->
	<div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading"></div>
                <div class="card-body">
                    <?php echo check_message(); ?>
                    <h2 class="title">Update Employee Info</h2>
                    <form id = "registration" action="edit.php?id=<?php echo $id ?>" enctype="multipart/form-data" method="POST">
                        
                        <div class="input-group">
                            <input class="input--style-1" type="text"  name="jdate" value="<?php echo $jdate;?>">
                        </div> 
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                     <input class="input--style-1" type="text" name="firstName" value="<?php echo $firstname;?>" >
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="text" name="lastName" value="<?php echo $lastname;?>">
                                </div>
                            </div>
                        </div>





                        <div class="input-group">
                            <input class="input--style-1" type="email"  name="email" value="<?php echo $email;?>">
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="text"  name="password" value="<?php echo $password;?>">
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="text" name="birthday" value="<?php echo $birthday;?>">
                                   
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
									<input class="input--style-1" type="text" name="gender" value="<?php echo $gender;?>">
                                </div>
                            </div>
                        </div>
                        
                        <div class="input-group">
                            <input class="input--style-1" type="number" name="contact" value="<?php echo $contact;?>">
                        </div>

                        <div class="input-group">
                            <input class="input--style-1" type="number" name="nid" value="<?php echo $nid;?>">
                        </div>

                        
                         <div class="input-group">
                            <input class="input--style-1" type="text"  name="address" value="<?php echo $address;?>">
                        </div>

                        <div class="input-group">
                            <input class="input--style-1" type="text" name="dept" value="<?php echo $dept;?>">
                        </div>

                        <div class="input-group">
                            <input class="input--style-1" type="text" name="ops" value="<?php echo $ops;?>">
                        </div>

                        <div class="input-group">
                            <input class="input--style-1" type="text" name="degree" value="<?php echo $degree;?>">
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="text" name="salary" value="<?php echo $empS;?>">
                        </div>
                        <div class="input-group">
                                        <label class="col-md-12">Image</label>
                                        <div class="col-md-12">
                                            <input type="file" name="pic" value="<?php echo $pic;?>">
                                            <img src="<?php echo $pic ?>" width="50">
                                        </div>
                                    </div>
                        <input type="hidden" name="id" id="textField" value="<?php echo $id;?>" required="required"><br><br>
                        <div class="p-t-20">
                            <button class="btn btn--radius btn--green" type="submit" name="update">Update</button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>


     <!-- Jquery JS-->
    <!-- <script src="vendor/jquery/jquery.min.js"></script>
   
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

   
    <script src="js/global.js"></script> -->
</body>
</html>