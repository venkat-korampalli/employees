<?php

require_once ('process/dbh.php');
//$sql = "SELECT * FROM `employee` WHERE 1";
$id = (isset($_GET['id']) ? $_GET['id'] : '');
$id1 = (isset($_GET['id1']) ? $_GET['id1'] : '');

//echo "$sql";
//$result = mysqli_query($conn, $sql);
if(isset($_POST['update']))
{

	$date = mysqli_real_escape_string($conn, $_POST['date']);
	$client = mysqli_real_escape_string($conn, $_POST['client']);
	$requirement = mysqli_real_escape_string($conn, $_POST['requirement']);
	$location = mysqli_real_escape_string($conn, $_POST['location']);
	$candidatename = mysqli_real_escape_string($conn, $_POST['candidatename']);
	$candidatenumber = mysqli_real_escape_string($conn, $_POST['candidatenumber']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$status = mysqli_real_escape_string($conn, $_POST['status']);
	$feedback = mysqli_real_escape_string($conn, $_POST['feedback']);
//	$visitedby = mysqli_real_escape_string($conn, $_POST['visitedby']);
//	$value = mysqli_real_escape_string($conn, $_POST['value']);
//	$status = mysqli_real_escape_string($conn, $_POST['status']);





	// $result = mysqli_query($conn, "UPDATE `employee` SET `firstName`='$firstname',`lastName`='$lastname',`email`='$email',`password`='$email',`gender`='$gender',`contact`='$contact',`nid`='$nid',`salary`='$salary',`address`='$address',`dept`='$dept',`degree`='$degree' WHERE id=$id");


$result = mysqli_query($conn, "UPDATE `ops2form2` SET `date`='$date',`client`='$client',`requirement`='$requirement',`location`='$location',`candidatename`='$candidatename',`candidatenumber`='$candidatenumber',`email`='$email',`status`='$status',`feedback`='$feedback' WHERE id=$id1");
	echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Succesfully Updated')
    window.location.href='javascript:history.go(-2)';
    </SCRIPT>");


	
}
?>




<?php
	$id1 = (isset($_GET['id1']) ? $_GET['id1'] : '');
    $id = (isset($_GET['id']) ? $_GET['id'] : '');
	$sql = "SELECT * from `ops2form2` WHERE id=$id1";
	$result = mysqli_query($conn, $sql);
	if($result){
	while($res = mysqli_fetch_assoc($result)){
	$date = $res['date'];
	$client = $res['client'];
	$requirement = $res['requirement'];
	$location = $res['location'];
	$candidatename = $res['candidatename'];
	$candidatenumber = $res['candidatenumber'];
	$email = $res['email'];
	$status = $res['status'];
	$feedback = $res['feedback'];
//	$visitedby = $res['visitedby'];
//	$value = $res['value'];
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
                    <h2 class="title">Update OPS2 Profiles Info</h2>
                    <form id = "registration" action="ops2data2edit.php?id1=<?php echo $id1;?>&id=<?php echo $id;?>" method="POST">

                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                     <input class="input--style-1" type="text" name="date" value="<?php echo $date;?>">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="text" name="client" value="<?php echo $client;?>">
                                </div>
                            </div>
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="text"  name="requirement" value="<?php echo $requirement;?>">
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="text" name="location" value="<?php echo $location;?>">
                                   
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
									<input class="input--style-1" type="text" name="candidatename" value="<?php echo $candidatename;?>">
                                </div>
                            </div>
                        </div>
                        
                        <div class="input-group">
                            <input class="input--style-1" type="text" name="candidatenumber" value="<?php echo $candidatenumber;?>">
                        </div>

                        <div class="input-group">
                            <input class="input--style-1" type="text" name="email" value="<?php echo $email;?>">
                        </div>

                        
                         <div class="input-group">
                            <input class="input--style-1" type="text"  name="status" value="<?php echo $status;?>" >
                        </div>

                        <div class="input-group">
                            <input class="input--style-1" type="text" name="feedback" value="<?php echo $feedback;?>" >
                        </div>

                  <!--      <div class="input-group">
                            <input class="input--style-1" type="text" name="visitedby" value="<?php echo $visitedby;?>" readonly>
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="text" name="value" value="<?php echo $value;?>" readonly>
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="text" name="status" value="<?php echo $status;?>">
                        </div> -->
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
