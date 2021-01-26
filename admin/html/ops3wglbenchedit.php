<?php

require_once ('process/dbh.php');
//$sql = "SELECT * FROM `alogin` WHERE 1";

//echo "$sql";
//$result = mysqli_query($conn, $sql);
$id = (isset($_GET['id']) ? $_GET['id'] : '');
$id1 = (isset($_GET['id1']) ? $_GET['id1'] : '');
if(isset($_POST['update']))
{
    $startdate = mysqli_real_escape_string($conn, $_POST['startdate']);
	$name = mysqli_real_escape_string($conn, $_POST['name']);
	$technology = mysqli_real_escape_string($conn, $_POST['technology']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$number = mysqli_real_escape_string($conn, $_POST['number']);
	$visa = mysqli_real_escape_string($conn, $_POST['visa']);
	$reference = mysqli_real_escape_string($conn, $_POST['reference']);
	$assigned = mysqli_real_escape_string($conn, $_POST['assigned']);
	//$gender = mysqli_real_escape_string($conn, $_POST['gender']);
	//$nid = mysqli_real_escape_string($conn, $_POST['nid']);
	//$dept = mysqli_real_escape_string($conn, $_POST['dept']);
	//$degree = mysqli_real_escape_string($conn, $_POST['degree']);
	//$salary = mysqli_real_escape_string($conn, $_POST['salary']);





	// $result = mysqli_query($conn, "UPDATE `employee` SET `firstName`='$firstname',`lastName`='$lastname',`email`='$email',`password`='$email',`gender`='$gender',`contact`='$contact',`nid`='$nid',`salary`='$salary',`address`='$address',`dept`='$dept',`degree`='$degree' WHERE id=$id");


$result = mysqli_query($conn, "UPDATE `ops3wglbenchdata` SET `startdate`='$startdate', `name`='$name',`technology`='$technology',`email`='$email',`number`='$number',`visa`='$visa', `reference`='$reference',`assigned`='$assigned' WHERE id=$id1");
	echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Succesfully Updated')
    window.location.href='javascript:history.go(-2)';
    </SCRIPT>");


	
}
?>




<?php
	$id = (isset($_GET['id']) ? $_GET['id'] : '');
    $id1 = (isset($_GET['id1']) ? $_GET['id1'] : '');
	$sql = "SELECT * from `ops3wglbenchdata` WHERE id=$id1";
	$result = mysqli_query($conn, $sql);
	if($result){
	while($res = mysqli_fetch_assoc($result)){
	$startdate = $res['startdate'];     
	$name = $res['name'];
	$technology = $res['technology'];
	$email = $res['email'];
	$number = $res['number'];
	$visa = $res['visa'];
	$reference = $res['reference'];
	$assigned = $res['assigned'];
	
}
}

?>

<html>
<head>
	<title>View Employee |  Admin Panel | Succor</title>
	<!-- Icons font CSS-->
    <link href="../../vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="../../vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="../../vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="../../vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css2/main.css" rel="stylesheet" media="all">
</head>
<body>

	

		<!-- <form id = "registration" action="edit.php" method="POST"> -->
	<div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">UPDATE WGL OPS3 BENCH INFO</h2>
                    <form id = "registration" action="ops3wglbenchedit.php?id1=<?php echo $id1;?>&id=<?php echo $id;?>" method="POST">
                        <div class="input-group">
                                    <label for="" class="col-md-12">Start Date</label>
                                    <input class="input--style-1" type="text" name="startdate" value="<?php echo $startdate;?>">
                                </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                     <input class="input--style-1" type="text" name="name" value="<?php echo $name;?>" >
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="text" name="technology" value="<?php echo $technology;?>">
                                </div>
                            </div>
                        </div>

                        <div class="input-group">
                            <input class="input--style-1" type="email"  name="email" value="<?php echo $email;?>">
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="text" name="number" value="<?php echo $number;?>">
                                   
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
									<input class="input--style-1" type="text" name="visa" value="<?php echo $visa;?>">
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                     <input class="input--style-1" type="text" name="reference" value="<?php echo $reference;?>" >
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="text" name="assigned" value="<?php echo $assigned;?>">
                                </div>
                            </div>
                        </div>
                        
                        <input type="hidden" name="id" id="textField" value="<?php echo $id;?>" required="required"><br><br>
                        <div class="p-t-20">
                            <button class="btn btn--radius btn--green" type="submit" name="update">Submit</button>
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
