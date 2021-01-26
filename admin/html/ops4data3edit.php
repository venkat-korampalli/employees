<?php

require_once ('process/dbh.php');
//$sql = "SELECT * FROM `employee` WHERE 1";
$id = (isset($_GET['id']) ? $_GET['id'] : '');
$id1 = (isset($_GET['id1']) ? $_GET['id1'] : '');

//echo "$sql";
//$result = mysqli_query($conn, $sql);
if(isset($_POST['update']))
{

	$name = mysqli_real_escape_string($conn, $_POST['name']);
	$technology = mysqli_real_escape_string($conn, $_POST['technology']);
	$visa = mysqli_real_escape_string($conn, $_POST['visa']);
	$contract = mysqli_real_escape_string($conn, $_POST['contract']);
	$certification = mysqli_real_escape_string($conn, $_POST['certification']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$number = mysqli_real_escape_string($conn, $_POST['number']);
	$linkedin = mysqli_real_escape_string($conn, $_POST['linkedin']);
	$consultantname = mysqli_real_escape_string($conn, $_POST['consultantname']);
	$recruitername = mysqli_real_escape_string($conn, $_POST['recruitername']);
	$experience = mysqli_real_escape_string($conn, $_POST['experience']);
//	$status = mysqli_real_escape_string($conn, $_POST['status']);





	// $result = mysqli_query($conn, "UPDATE `employee` SET `firstName`='$firstname',`lastName`='$lastname',`email`='$email',`password`='$email',`gender`='$gender',`contact`='$contact',`nid`='$nid',`salary`='$salary',`address`='$address',`dept`='$dept',`degree`='$degree' WHERE id=$id");


$result = mysqli_query($conn, "UPDATE `ops4consultantdata` SET `name`='$name',`technology`='$technology',`visa`='$visa',`contract`='$contract',`certification`='$certification',`email`='$email',`number`='$number',`linkedin`='$linkedin',`consultantname`='$consultantname',`recruitername`='$recruitername',`experience`='$experience' WHERE id=$id1");
	echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Succesfully Updated')
    window.location.href='javascript:history.go(-2)';
    </SCRIPT>");


	
}
?>




<?php
	$id1 = (isset($_GET['id1']) ? $_GET['id1'] : '');
    $id = (isset($_GET['id']) ? $_GET['id'] : '');
	$sql = "SELECT * from `ops4consultantdata` WHERE id=$id1";
	$result = mysqli_query($conn, $sql);
	if($result){
	while($res = mysqli_fetch_assoc($result)){
	$name = $res['name'];
	$technology = $res['technology'];
	$visa = $res['visa'];
	$contract = $res['contract'];
	$certification = $res['certification'];
	$email = $res['email'];
	$number = $res['number'];
	$linkedin = $res['linkedin'];
	$consultantname = $res['consultantname'];
	$recruitername = $res['recruitername'];
	$experience = $res['experience'];
//	$status = $res['status'];
	
}
}

?>

<html>
<head>
	<title>View Employee |  Admin Panel | Succor</title>
	<!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

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
                    <h2 class="title">UPDATE OPS4 CONSULTANT INFO</h2>
                    <form id = "registration" action="ops4data3edit.php?id1=<?php echo $id1;?>&id=<?php echo $id;?>" method="POST">

                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                     <input class="input--style-1" type="text" name="name" value="<?php echo $name;?>">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="text" name="technology" value="<?php echo $technology;?>">
                                </div>
                            </div>
                        </div>





                        <div class="input-group">
                            <input class="input--style-1" type="text"  name="visa" value="<?php echo $visa;?>">
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="text" name="contract" value="<?php echo $contract;?>">
                                   
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
									<input class="input--style-1" type="text" name="certification" value="<?php echo $certification;?>">
                                </div>
                            </div>
                        </div>
                        
                        <div class="input-group">
                            <input class="input--style-1" type="text" name="email" value="<?php echo $email;?>">
                        </div>

                        <div class="input-group">
                            <input class="input--style-1" type="text" name="number" value="<?php echo $number;?>">
                        </div>

                        
                         <div class="input-group">
                            <input class="input--style-1" type="text"  name="linkedin" value="<?php echo $linkedin;?>">
                        </div>

                        <div class="input-group">
                            <input class="input--style-1" type="text" name="consultantname" value="<?php echo $consultantname;?>">
                        </div>

                       <div class="input-group">
                            <input class="input--style-1" type="text" name="recruitername" value="<?php echo $recruitername;?>">
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="text" name="experience" value="<?php echo $experience;?>">
                        </div>
                     <!--    <div class="input-group">
                            <input class="input--style-1" type="text" name="status" value="<?php echo $status;?>">
                        </div> -->
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
