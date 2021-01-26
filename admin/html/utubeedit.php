<?php

require_once ('process/dbh.php');
$id = (isset($_GET['id']) ? $_GET['id'] : '');
$id1 = (isset($_GET['id1']) ? $_GET['id1'] : '');
$sql = "SELECT * FROM `youtube` WHERE 1";

//echo "$sql";

$result = mysqli_query($conn, $sql);
if(isset($_POST['update'])){

	
	$utubevideo = mysqli_real_escape_string($conn, $_POST['videolink']);
	$utubelink = mysqli_real_escape_string($conn, $_POST['utubelink']);
	$title = mysqli_real_escape_string($conn, $_POST['title']);
	$description = mysqli_real_escape_string($conn, $_POST['description']);
	$thoughts = mysqli_real_escape_string($conn, $_POST['thoughts']);
	$status = mysqli_real_escape_string($conn, $_POST['status']);
	//$clientlocation = mysqli_real_escape_string($conn, $_POST['clientlocation']);
	//$feedback = mysqli_real_escape_string($conn, $_POST['feedback']);
	//$feedback = mysqli_real_escape_string($conn, $_POST['feedback']);
	//$salary = mysqli_real_escape_string($conn, $_POST['salary']);





	// $result = mysqli_query($conn, "UPDATE `employee` SET `firstName`='$firstname',`lastName`='$lastname',`email`='$email',`password`='$email',`gender`='$gender',`contact`='$contact',`nid`='$nid',`salary`='$salary',`address`='$address',`dept`='$dept',`degree`='$degree' WHERE id=$id");


$result = mysqli_query($conn, "UPDATE `youtube` SET `videolink`='$utubevideo',`utubelink`='$utubelink',`title`='$title',`description`='$description',`thoughts`='$thoughts',`status`='$status' WHERE id=$id1");
	echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Succesfully Updated')
    window.location.href='utube.php?id=$id';
    </SCRIPT>");


	
}
?>




<?php
	$id1 = (isset($_GET['id1']) ? $_GET['id1'] : '');
    $id = (isset($_GET['id']) ? $_GET['id'] : '');
	$sql = "SELECT * from `youtube` WHERE id=$id1";
	$result = mysqli_query($conn, $sql);
	if($result){
	while($res = mysqli_fetch_assoc($result)){
	$utubevideo = $res['videolink'];
	$utubelink = $res['utubelink'];
	$title = $res['title'];
	$description = $res['description'];
	$thoughts = $res['thoughts'];
	$status = $res['status'];
//	$clientlocation = $res['clientlocation'];
//	$feedback = $res['feedback'];
	
	
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
                    <h2 class="title">UPDATE YOUTUBE OPERATION DATA</h2>
                    <form id = "registration" action="utubeedit.php?id1=<?php echo $id1;?>&id=<?php echo $id;?>" method="POST">

                    <!--    <div class="row row-space">
                            <div class="col-6">
                                <div class="input-group">
                                     <input class="input--style-1" type="text" placeholder="Feedback" name="feedback" value="<?php echo $feedback;?>" >
                                </div>
                            </div> -->
                        <div class="input-group">
                            <input class="input--style-1" type="text"  name="videolink" placeholder="Enter 11 character Youtube Link" value="<?php echo $utubevideo;?>">
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="text"  name="utubelink" placeholder="Enter Youtube Link" value="<?php echo $utubelink;?>">
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="text" name="title" placeholder="Enter Title" value="<?php echo $title;?>">
                                   
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
									<input class="input--style-1" type="text" name="description" placeholder="Enter Description" value="<?php echo $description;?>">
                                </div>
                            </div>
                        </div>
                        
                        <div class="input-group">
                            <input class="input--style-1" type="text" name="thoughts" placeholder="Enter Thoughts" value="<?php echo $thoughts;?>">
                        </div>

                        <div class="input-group">
                            <input class="input--style-1" type="text" name="status" placeholder="Enter Status" value="<?php echo $status;?>">
                        </div>

                      <!--
                         <div class="input-group">
                            <input class="input--style-1" type="text"  name="clientlocation" placeholder="Enter Vendor Name" value="<?php echo $clientlocation;?>">
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="text"  name="feedback" placeholder="Enter Vendor Name" value="<?php echo $feedback;?>">
                        </div> -->
    

                        <input type="hidden" name="id" id="textField" value="<?php echo $id;?>" required="required"><br><br>
                        <div class="p-t-20">
                            <button class="btn btn--radius btn--green" type="submit" name="update">Submit</button>
                            <button class="btn btn--radius btn--green" onclick="goBack()" type="submit">Cancel</button>
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
    <script src="vendor/datepicker/daterangepicker.js"></script> -->

   
    <script src="js/global.js"></script>
     <script LANGUAGE='JavaScript'>
function goBack() {
  window.history.back();
}
</script>
</body>
</html>
