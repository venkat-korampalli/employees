<?php

require_once ('process/dbh.php');
$id = (isset($_GET['id']) ? $_GET['id'] : '');
$id1 = (isset($_GET['id1']) ? $_GET['id1'] : '');
$sql = "SELECT * FROM `ops0data2` WHERE 1";

//echo "$sql";

$result = mysqli_query($conn, $sql);
if(isset($_POST['update'])){

	
	$succoremployee = mysqli_real_escape_string($conn, $_POST['succoremployee']);
	$consultantname = mysqli_real_escape_string($conn, $_POST['consultantname']);
	$consultantemailid = mysqli_real_escape_string($conn, $_POST['consultantemailid']);
	$consultantcontactnumber = mysqli_real_escape_string($conn, $_POST['consultantcontactnumber']);
	$visastatus = mysqli_real_escape_string($conn, $_POST['visastatus']);
	$contract = mysqli_real_escape_string($conn, $_POST['contract']);
	$certification = mysqli_real_escape_string($conn, $_POST['certification']);
	$consultantlinkedin = mysqli_real_escape_string($conn, $_POST['consultantlinkedin']);
	$status = mysqli_real_escape_string($conn, $_POST['status']);
	//$salary = mysqli_real_escape_string($conn, $_POST['salary']);





	// $result = mysqli_query($conn, "UPDATE `employee` SET `firstName`='$firstname',`lastName`='$lastname',`email`='$email',`password`='$email',`gender`='$gender',`contact`='$contact',`nid`='$nid',`salary`='$salary',`address`='$address',`dept`='$dept',`degree`='$degree' WHERE id=$id");


$result = mysqli_query($conn, "UPDATE `ops0data2` SET `succoremployee`='$succoremployee',`consultantname`='$consultantname',`consultantemailid`='$consultantemailid',`consultantcontactnumber`='$consultantcontactnumber',`visastatus`='$visastatus',`contract`='$contract',`certification`='$certification',`consultantlinkedin`='$consultantlinkedin',`status`='$status' WHERE id=$id1");
	echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Succesfully Updated')
    window.location.href='ops0data2.php?id=$id';
    </SCRIPT>");


	
}
?>




<?php
	$id1 = (isset($_GET['id1']) ? $_GET['id1'] : '');
    $id = (isset($_GET['id']) ? $_GET['id'] : '');
	$sql = "SELECT * from `ops0data2` WHERE id=$id1";
	$result = mysqli_query($conn, $sql);
	if($result){
	while($res = mysqli_fetch_assoc($result)){
	$succoremployee = $res['succoremployee'];
	$consultantname = $res['consultantname'];
	$consultantemailid = $res['consultantemailid'];
	$consultantcontactnumber = $res['consultantcontactnumber'];
	$visastatus = $res['visastatus'];
	$contract = $res['contract'];
	$certification = $res['certification'];
	$consultantlinkedin = $res['consultantlinkedin'];
	$status = $res['status'];
	
	
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
                    <h2 class="title">Update OPS0 data</h2>
                    <form id = "registration" action="ops0data2edit.php?id1=<?php echo $id1;?>&id=<?php echo $id;?>" method="POST">

                        <div class="row row-space">
                            <div class="col-6">
                                <div class="input-group">
                                     <input class="input--style-1" type="text" placeholder="Enter Succoremployee" name="succoremployee" value="<?php echo $succoremployee;?>" >
                                </div>
                            </div> 
                        <div class="input-group">
                            <input class="input--style-1" type="text"  name="consultantname" placeholder="Enter Consultantname" value="<?php echo $consultantname;?>">
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="text"  name="consultantemailid" placeholder="Enter Consultant Email" value="<?php echo $consultantemailid;?>">
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="text" name="consultantcontactnumber" placeholder="Enter Consultant Contact Number" value="<?php echo $consultantcontactnumber;?>">
                                   
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
									<input class="input--style-1" type="text" name="visastatus" placeholder="Enter Visa Status" value="<?php echo $visastatus;?>">
                                </div>
                            </div>
                        </div>
                        
                        <div class="input-group">
                            <input class="input--style-1" type="text" name="contract" placeholder="Enter Contract" value="<?php echo $contract;?>">
                        </div>

                        <div class="input-group">
                            <input class="input--style-1" type="text" name="certification" placeholder="Enter Certification" value="<?php echo $certification;?>">
                        </div>

                        
                         <div class="input-group">
                            <input class="input--style-1" type="text"  name="consultantlinkedin" placeholder="Enter Consultant Linkedin" value="<?php echo $consultantlinkedin;?>">
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="text"  name="status" placeholder="Enter Status" value="<?php echo $status;?>">
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
    </div>


     <!-- Jquery JS-->
    <!-- <script src="vendor/jquery/jquery.min.js"></script>
   
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

   
    <script src="js/global.js"></script> -->
</body>
</html>
