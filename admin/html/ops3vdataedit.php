<?php

require_once ('process/dbh.php');
$id = (isset($_GET['id']) ? $_GET['id'] : '');
$id1 = (isset($_GET['id1']) ? $_GET['id1'] : '');
$sql = "SELECT * FROM `ops3vendordata` WHERE 1";

//echo "$sql";

$result = mysqli_query($conn, $sql);
if(isset($_POST['update'])){

	
	$vendorname = mysqli_real_escape_string($conn, $_POST['vendorname']);
	$vendoremail = mysqli_real_escape_string($conn, $_POST['vendoremail']);
	$vendorcontact = mysqli_real_escape_string($conn, $_POST['vendorcontact']);
	$vendorcompany = mysqli_real_escape_string($conn, $_POST['vendorcompany']);
	$vendorstatus = mysqli_real_escape_string($conn, $_POST['vendorstatus']);
	//$vendorstatus = mysqli_real_escape_string($conn, $_POST['vendorstatus']);
	//$salary = mysqli_real_escape_string($conn, $_POST['salary']);





	// $result = mysqli_query($conn, "UPDATE `employee` SET `firstName`='$firstname',`lastName`='$lastname',`email`='$email',`password`='$email',`gender`='$gender',`contact`='$contact',`nid`='$nid',`salary`='$salary',`address`='$address',`dept`='$dept',`degree`='$degree' WHERE id=$id");


$result = mysqli_query($conn, "UPDATE `ops3vendordata` SET `vendorname`='$vendorname',`vendoremail`='$vendoremail',`vendorcontact`='$vendorcontact',`vendorcompany`='$vendorcompany',`vendorstatus`='$vendorstatus' WHERE id=$id1");
	echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Succesfully Updated')
    window.location.href='ops3vdata.php?id=$id';
    </SCRIPT>");


	
}
?>




<?php
	$id1 = (isset($_GET['id1']) ? $_GET['id1'] : '');
    $id = (isset($_GET['id']) ? $_GET['id'] : '');
	$sql = "SELECT * from `ops3vendordata` WHERE id=$id1";
	$result = mysqli_query($conn, $sql);
	if($result){
	while($res = mysqli_fetch_assoc($result)){
	$vendorname = $res['vendorname'];
	$vendoremail = $res['vendoremail'];
	$vendorcontact = $res['vendorcontact'];
	$vendorcompany = $res['vendorcompany'];
	$vendorstatus = $res['vendorstatus'];
	
	
}
}

?>

<html>
<head>
	<title>View Employee |  Employee Panel | Succor</title>
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
                    <h2 class="title">UPDATE OPS3 VENDOR DATA</h2>
                    <form id = "registration" action="ops3vdataedit.php?id1=<?php echo $id1;?>&id=<?php echo $id;?>" method="POST">
                        <div class="input-group">
                            <input class="input--style-1" type="text" name="vendorname" value="<?php echo $vendorname;?>" >
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="text" name="vendoremail" value="<?php echo $vendoremail;?>" >
                        </div>
                        <div class="row row-space">
                            <div class="col-6">
                                <div class="input-group">
                                     <input class="input--style-1" type="text" name="vendorcontact" value="<?php echo $vendorcontact;?>" >
                                </div>
                            </div>
                        
                            <div class="col-6">
                                <div class="input-group">
                                     <input class="input--style-1" type="text" name="vendorcompany" value="<?php echo $vendorcompany;?>" >
                                </div>
                            </div>
                        </div>    
                            <div class="input-group">
                            <input class="input--style-1" type="text" name="vendorstatus" value="<?php echo $vendorstatus;?>" >
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
