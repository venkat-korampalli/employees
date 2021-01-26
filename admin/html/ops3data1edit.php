<?php
require_once ('process/dbh.php');
require_once ('process/session.php');

$sql = "SELECT * FROM `employee` WHERE 1";
$id = (isset($_GET['id']) ? $_GET['id'] : '');
//echo "$sql";
$result = mysqli_query($conn, $sql);
if(isset($_POST['update']))
{

	$recruitername = mysqli_real_escape_string($conn, $_POST['recruitername']);
	$candidatename = mysqli_real_escape_string($conn, $_POST['candidatename']);
	$technology = mysqli_real_escape_string($conn, $_POST['technology']);
	$clientlocation = mysqli_real_escape_string($conn, $_POST['clientlocation']);
    $candidatevisastatus = mysqli_real_escape_string($conn, $_POST['candidatevisastatus']);
	$rate = mysqli_real_escape_string($conn, $_POST['rate']);
	$client = mysqli_real_escape_string($conn, $_POST['client']);
	$implementation = mysqli_real_escape_string($conn, $_POST['implementation']);
	$vendorname = mysqli_real_escape_string($conn, $_POST['vendorname']);
	$vendoremail = mysqli_real_escape_string($conn, $_POST['vendoremail']);
	$vendornumber = mysqli_real_escape_string($conn, $_POST['vendornumber']);
    $submissionstatus = mysqli_real_escape_string($conn, $_POST['submissionstatus']);
	//$degree = mysqli_real_escape_string($conn, $_POST['degree']);
	//$salary = mysqli_real_escape_string($conn, $_POST['salary']);





	// $result = mysqli_query($conn, "UPDATE `employee` SET `firstName`='$firstname',`lastName`='$lastname',`email`='$email',`password`='$email',`gender`='$gender',`contact`='$contact',`nid`='$nid',`salary`='$salary',`address`='$address',`dept`='$dept',`degree`='$degree' WHERE id=$id");


$result = mysqli_query($conn, "UPDATE `ops3data` SET `recruitername`='$recruitername',`candidatename`='$candidatename',`technology`='$technology',`clientlocation`='$clientlocation',`candidatevisastatus`='$candidatevisastatus',`rate`='$rate',`client`='$client',`implementation`='$implementation',`vendorname`='$vendorname',`vendoremail`='$vendoremail',`vendornumber`='$vendornumber',`submissionstatus`='$submissionstatus' WHERE id=$id");
	echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Succesfully Updated');
    window.location.href='javascript:history.go(-2)';
    </SCRIPT>");
    message("Updated Successfully!","info");
	
}
?>




<?php
	$id = (isset($_GET['id']) ? $_GET['id'] : '');
	$sql = "SELECT * from `ops3data` WHERE id=$id";
	$result = mysqli_query($conn, $sql);
	if($result){
	while($res = mysqli_fetch_assoc($result)){
	$recruitername = $res['recruitername'];
	$candidatename = $res['candidatename'];
	$technology = $res['technology'];
    $clientlocation = $res['clientlocation'];
	$candidatevisastatus = $res['candidatevisastatus'];
	$rate = $res['rate'];
	$client = $res['client'];
	$implementation = $res['implementation'];
	$vendorname = $res['vendorname'];
	$vendoremail = $res['vendoremail'];
    $vendornumber = $res['vendornumber'];
	$submissionstatus = $res['submissionstatus'];
	
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
                    <?php echo check_message(); ?>
                    <h2 class="title">UPDATE OPS3 SUBMISSION DATA</h2>
                    <form id = "registration" action="ops3data1edit.php?id=<?php echo $id ?>" method="POST">

                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                     <input class="input--style-1" type="text" name="recruitername" placeholder="Enter Recruiter Name" value="<?php echo $recruitername;?>" >
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="text" name="candidatename" placeholder="Enter Candidate Name" value="<?php echo $candidatename;?>">
                                </div>
                            </div>
                        </div>





                        <div class="input-group">
                            <input class="input--style-1" type="text"  name="technology" placeholder="Enter Technology" value="<?php echo $technology;?>">
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="text"  name="clientlocation" placeholder="Enter Client Location" value="<?php echo $clientlocation;?>">
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="text" name="candidatevisastatus" placeholder="Enter Candidate Visa Status" value="<?php echo $candidatevisastatus;?>">
                                   
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
									<input class="input--style-1" type="text" name="rate" placeholder="Enter Rate" value="<?php echo $rate;?>">
                                </div>
                            </div>
                        </div>
                        
                        <div class="input-group">
                            <input class="input--style-1" type="text" name="client" placeholder="Enter Client" value="<?php echo $client;?>">
                        </div>

                        <div class="input-group">
                            <input class="input--style-1" type="text" name="implementation" placeholder="Enter Implementation" value="<?php echo $implementation;?>">
                        </div>

                        
                         <div class="input-group">
                            <input class="input--style-1" type="text"  name="vendorname" placeholder="Enter Vendor Name" value="<?php echo $vendorname;?>">
                        </div>

                        <div class="input-group">
                            <input class="input--style-1" type="text" name="vendoremail" placeholder="Enter Vendor Email" value="<?php echo $vendoremail;?>">
                        </div>

                        <div class="input-group">
                            <input class="input--style-1" type="text" name="vendornumber" placeholder="Enter Vendor Number" value="<?php echo $vendornumber;?>">
                        </div>

                        <div class="input-group">
                            <input class="input--style-1" type="text" name="submissionstatus" placeholder="Enter Submission Status" value="<?php echo $submissionstatus;?>">
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
