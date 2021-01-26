<?php
session_start();
if(!isset($_SESSION['empid'])){
        header("location: elogin.php");
    }
require_once ('process/dbh.php');
require_once ('process/session.php');

$sql = "SELECT * FROM `employee` WHERE 1";

//echo "$sql";
$result = mysqli_query($conn, $sql);


  $id = (isset($_GET['id']) ? $_GET['id'] : '');
  $sql = "SELECT * from `employee` WHERE id=$id";
  $sql2 = "SELECT total from `salary` WHERE id = $id";
  $result = mysqli_query($conn, $sql);
  $result2 = mysqli_query($conn , $sql2);
  $salary = mysqli_fetch_array($result2);
  $empS = ($salary['total']);

  $sql4 = "SELECT * FROM `employee` where id = '$id'";
     $result4 = mysqli_query($conn, $sql4);
     $employeen = mysqli_fetch_array($result4);
     $empName = $employeen['firstName'];
     $empops = $employeen['ops'];
     $emppic = $employeen['pic'];
     $_SESSION['ops'] = $empops; 
     $empid = $employeen['id'];
     $_SESSION['id'] = $empid;
 
  if($result){
  while($res = mysqli_fetch_assoc($result)){
  $firstname = $res['firstName'];
  $lastname = $res['lastName'];
  $email = $res['email'];
  $contact = $res['contact'];
  $address = $res['address'];
  $gender = $res['gender'];
  $birthday = $res['birthday'];
  $nid = $res['nid'];
  $dept = $res['dept'];
  $degree = $res['degree'];
  $pic = $res['pic'];
}
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/users/logo.png">
    <title>SuccorTechnologies | Employee Management | Employee Homepage</title>
    <!-- Bootstrap Core CSS -->
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- chartist CSS -->
    <link href="assets/plugins/chartist-js/dist/chartist.min.css" rel="stylesheet">
    <link href="assets/plugins/chartist-js/dist/chartist-init.css" rel="stylesheet">
    <link href="assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <!--This page css - Morris CSS -->
    <link href="assets/plugins/c3-master/c3.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="css/colors/blue.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<style>
    .table tbody tr:hover td, .table tbody tr:hover th {
    background-color: deepskyblue;
    color: white;
    cursor: pointer;
}

.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  position: relative;
  background-color: #fefefe;
  margin: auto;
  padding: 0;
  border: 1px solid #888;
  width: 80%;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
  -webkit-animation-name: animatetop;
  -webkit-animation-duration: 0.4s;
  animation-name: animatetop;
  animation-duration: 0.4s
}

/* Add Animation */
@-webkit-keyframes animatetop {
  from {top:-300px; opacity:0} 
  to {top:0; opacity:1}
}

@keyframes animatetop {
  from {top:-300px; opacity:0}
  to {top:0; opacity:1}
}

/* The Close Button */
.close {
  color: white;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

.modal-header {
  padding: 10px 16px;
  background-color: dodgerblue;
  color: white;
}

.modal-body {padding: 2px 16px;}

.modal-footer {
  padding: 2px 16px;
  background-color: #5cb85c;
  color: white;
}

  /* Button used to open the chat form - fixed at the bottom of the page */
.open-button {
  background-color: #555;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  opacity: 0.8;
  position: fixed;
  bottom: 23px;
  right: 28px;
  width: 280px;
}

/* The popup chat - hidden by default */
.chat-popup {
  display: none;
  position: fixed;
  bottom: 0;
  right: 15px;
  border: 3px solid #f1f1f1;
  z-index: 9;
}

/* Add styles to the form container */
.form-container {
  max-width: 300px;
  padding: 10px;
  background-color: white;
}

/* Full-width textarea */
.form-container textarea {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
  resize: none;
  min-height: 200px;
}

/* When the textarea gets focus, do something */
.form-container textarea:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit/send button */
.form-container .btn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  margin-bottom:10px;
  opacity: 0.8;
}

/* Add a red background color to the cancel button */
.form-container .cancel {
  background-color: red;
}

/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
}
</style>
</head>

<body class="fix-header fix-sidebar card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-toggleable-sm navbar-light">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand text-white" href="index.php">
                         <b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            
                            <!-- Light Logo icon -->
                          <!--  <img src="../assets/images/logo-light-icon.png" alt="homepage" class="light-logo" />-->
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text --><span>
                         <b>SuccorTechnologies</b>
                         <!-- Light Logo text -->    
                        <!-- <img src="../assets/images/logo-light-text.png" class="light-logo" alt="homepage" /></span> --></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <li class="nav-item hidden-sm-down search-box"> <a class="nav-link hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-search"></i></a>
                            <form class="app-search">
                                <input type="text" class="form-control" placeholder="Search & enter"> <a class="srh-btn"><i class="ti-close"></i></a> </form>
                        </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                     
                        <!-- ============================================================== -->
                        <!-- Profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="admin/html/process/<?php echo $emppic;?>" alt="user" class="profile-pic m-r-10" />Howdy <?php echo "$empName"; ?></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li> <a class="waves-effect waves-dark" href="index.php?id=<?php echo $id?>" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">Dashboard</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="pages-profile.php?id=<?php echo $id?>" aria-expanded="false"><i class="mdi mdi-account-check"></i><span class="hide-menu">Profile</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="table-basic.php?id=<?php echo $id?>" aria-expanded="false"><i class="mdi mdi-table"></i><span class="hide-menu">My Projects</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="icon-material.php?id=<?php echo $id?>" aria-expanded="false"><i class="mdi mdi-emoticon"></i><span class="hide-menu">Apply Leave</span></a>
                        </li>
                        <?php if($_SESSION['ops'] == "OPS0"){ ?>
                        <li>
                        <div class="dropdown">
                        <a class=" dropdown-toggle waves-effect waves-dark" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="hide-menu"><i class="mdi mdi-content-duplicate"></i>&nbsp OPS0 Form</span></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <?php if($_SESSION['ops'] == "OPS0"){ ?>
                        <a class="waves-effect waves-dark" href="ops0form1.php?id=<?php echo $id?>" aria-expanded="false"><i class="mdi mdi-content-duplicate"></i><span class="hide-menu">OPS0 Projects</span></a>
                        <?php }else{

                    } ?>
                        <?php if($_SESSION['ops'] == "OPS0"){ ?>
                        <a class="waves-effect waves-dark" href="ops0form2.php?id=<?php echo $id?>" aria-expanded="false"><i class="mdi mdi-content-duplicate"></i><span class="hide-menu">OPS0 Consultants</span></a>
                        <?php }else{

                    } ?> 
                        <?php if($_SESSION['ops'] == "OPS0"){ ?>
                        <a class="waves-effect waves-dark" href="ops0wvendor.php?id=<?php echo $id?>" aria-expanded="false"><i class="mdi mdi-content-duplicate"></i><span class="hide-menu">OPS0 White Vendor</span></a>
                        <?php }else{

                    } ?>
                        <?php if($_SESSION['ops'] == "OPS0"){ ?>
                        <a class="waves-effect waves-dark" href="ops0fclient.php?id=<?php echo $id?>" aria-expanded="false"><i class="mdi mdi-content-duplicate"></i><span class="hide-menu">OPS0 Future Client</span></a>
                        <?php }else{

                    } ?>
                        <?php if($_SESSION['ops'] == "OPS0"){ ?>
                        <a class="waves-effect waves-dark" href="ops0idea.php?id=<?php echo $id?>" aria-expanded="false"><i class="mdi mdi-content-duplicate"></i><span class="hide-menu">OPS0 Ideas</span></a>
                        <?php }else{

                    } ?>
                        </div>
                        </div>
                        </li>
                        <?php }else{

                    } ?>
                        <?php if($_SESSION['ops'] == "OPS1"){ ?>
                        <li> <a class="waves-effect waves-dark" href="ops1form.php?id=<?php echo $id?>" aria-expanded="false"><i class="mdi mdi-content-duplicate"></i><span class="hide-menu">OPS1 Submit</span></a>
                        </li>
                        <?php }else{

                    } ?> 
                    <?php if($_SESSION['ops'] == "OPS2"){ ?>
                        <li>
                        <div class="dropdown">
                        <a class=" dropdown-toggle waves-effect waves-dark" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="hide-menu"><i class="mdi mdi-content-duplicate"></i>&nbsp OPS2 Form</span></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <?php if($_SESSION['ops'] == "OPS2"){ ?>    
                        <a class="waves-effect waves-dark" href="map-googleops2form1.php?id=<?php echo $id?>" aria-expanded="false"><i class="mdi mdi-content-duplicate"></i><span class="hide-menu">OPS2 Client</span></a>
                        <?php }else{

                    } ?>
                        <?php if($_SESSION['ops'] == "OPS2"){ ?>
                        <a class="waves-effect waves-dark" href="map-googleops2form2.php?id=<?php echo $id?>" aria-expanded="false"><i class="mdi mdi-content-duplicate"></i><span class="hide-menu">OPS2 Profiles</span></a>
                        <?php }else{

                    } ?>
                        </div>
                        </div>
                        </li>
                        <?php }else{

                    } ?>
                        <?php if(($_SESSION['ops'] == "OPS3") || ($_SESSION['ops'] == "OPS3-OPS4")){ ?>
                        <li>
                        <div class="dropdown">
                        <a class=" dropdown-toggle waves-effect waves-dark" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="hide-menu"><i class="mdi mdi-content-duplicate"></i>&nbsp OPS3 Form</span></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <?php if(($_SESSION['ops'] == "OPS3") || ($_SESSION['ops'] == "OPS3-OPS4")){ ?>
                        <a class="waves-effect waves-dark" href="map-google.php?id=<?php echo $id?>" aria-expanded="false"><i class="mdi mdi-content-duplicate"></i><span class="hide-menu">OPS3 Submission</span></a>
                        <?php }else{

                    } ?> 
                        <?php if(($_SESSION['ops'] == "OPS3") || ($_SESSION['ops'] == "OPS3-OPS4")){ ?>
                        <a class="waves-effect waves-dark" href="ops3form2.php?id=<?php echo $id?>" aria-expanded="false"><i class="mdi mdi-content-duplicate"></i><span class="hide-menu">OPS3 Vendors</span></a>
                        
                        <?php }else{

                    } ?> 
                        </div>
                        </div>
                        </li>
                        <?php }else{

                    } ?> 
                        <?php if(($_SESSION['ops'] == "OPS3-WGL")){ ?>
                        <li>
                        <div class="dropdown">
                        <a class=" dropdown-toggle waves-effect waves-dark" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="hide-menu"><i class="mdi mdi-database-plus"></i>&nbsp OPS3 Form</span></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <?php if(($_SESSION['ops'] == "OPS3-WGL")){ ?>
                        <a class="waves-effect waves-dark" href="ops3wglform.php?id=<?php echo $id?>" aria-expanded="false"><i class="mdi mdi-content-duplicate"></i><span class="hide-menu">OPS3 Submission </span></a>
                        
                        <?php }else{

                    } ?>
                        <?php if(($_SESSION['ops'] == "OPS3-WGL")){ ?>
                        <a class="waves-effect waves-dark" href="ops3wglform2.php?id=<?php echo $id?>" aria-expanded="false"><i class="mdi mdi-content-duplicate"></i><span class="hide-menu">OPS3 Vendor </span></a>
                        
                        <?php }else{

                    } ?> 
                        <?php if(($_SESSION['ops'] == "OPS3-WGL")){ ?>
                        <a class="waves-effect waves-dark" href="ops4wform3.php?id=<?php echo $id?>" aria-expanded="false"><i class="mdi mdi-content-duplicate"></i><span class="hide-menu">OPS3 Consultant </span></a>
                        
                        <?php }else{

                    } ?> 
                        </div>
                        </div>
                        </li>
                        <?php }else{

                    } ?>
                        <?php if(($_SESSION['ops'] == "OPS4") || ($_SESSION['ops'] == "OPS3-OPS4")){ ?>
                        <li>
                        <div class="dropdown">
                        <a class=" dropdown-toggle waves-effect waves-dark" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="hide-menu"><i class="mdi mdi-content-duplicate"></i>&nbsp OPS4 Form</span></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <?php if(($_SESSION['ops'] == "OPS4") || ($_SESSION['ops'] == "OPS3-OPS4")){ ?>
                        <a class="waves-effect waves-dark" href="map-googleops4.php?id=<?php echo $id?>" aria-expanded="false"><i class="mdi mdi-content-duplicate"></i><span class="hide-menu">OPS4 Submission</span></a>
                        <?php }else{

                    } ?> 
                        <?php if(($_SESSION['ops'] == "OPS4") || ($_SESSION['ops'] == "OPS3-OPS4")){ ?>
                        <a class="waves-effect waves-dark" href="ops4form2.php?id=<?php echo $id?>" aria-expanded="false"><i class="mdi mdi-content-duplicate"></i><span class="hide-menu">OPS4 Vendor </span></a>
                        <?php }else{

                    } ?> 
                        <?php if(($_SESSION['ops'] == "OPS4") || ($_SESSION['ops'] == "OPS3-OPS4")){ ?>
                        <a class="waves-effect waves-dark" href="ops4form3.php?id=<?php echo $id?>" aria-expanded="false"><i class="mdi mdi-content-duplicate"></i><span class="hide-menu">OPS4 Consultant </span></a>
                        
                        <?php }else{

                    } ?> 
                        </div>
                        </div>
                        </li>
                        <?php }else{

                    } ?>
                        <?php if($_SESSION['ops'] == "OPS0"){ ?>
                        <li>
                        <div class="dropdown">
                        <a class=" dropdown-toggle waves-effect waves-dark" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="hide-menu"><i class="mdi mdi-content-duplicate"></i>&nbsp OPS0 Data</span></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <?php if($_SESSION['ops'] == "OPS0"){ ?>    
                        <a class="waves-effect waves-dark" href="ops0data1.php?id=<?php echo $id?>" aria-expanded="false"><i class="mdi mdi-database-plus"></i><span class="hide-menu">OPS0 Projects</span></a>
                        <?php }else{

                    } ?>
                        <?php if($_SESSION['ops'] == "OPS0"){ ?>
                        <a class="waves-effect waves-dark" href="ops0data2.php?id=<?php echo $id?>" aria-expanded="false"><i class="mdi mdi-database-plus"></i><span class="hide-menu">OPS0 Consultants</span></a>
                        
                        <?php }else{

                    } ?> 
                        <?php if($_SESSION['ops'] == "OPS0"){ ?>
                        <a class="waves-effect waves-dark" href="ops0wvendordata.php?id=<?php echo $id?>" aria-expanded="false"><i class="mdi mdi-database-plus"></i><span class="hide-menu">OPS0 White Vendors</span></a>
                        
                        <?php }else{

                    } ?>
                        <?php if($_SESSION['ops'] == "OPS0"){ ?>
                        <a class="waves-effect waves-dark" href="ops0fclientdata.php?id=<?php echo $id?>" aria-expanded="false"><i class="mdi mdi-database-plus"></i><span class="hide-menu">OPS0 Future Client</span></a>
                        
                        <?php }else{

                    } ?>
                        <?php if($_SESSION['ops'] == "OPS0"){ ?>
                        <a class="waves-effect waves-dark" href="ops0ideadata.php?id=<?php echo $id?>" aria-expanded="false"><i class="mdi mdi-database-plus"></i><span class="hide-menu">OPS0 Ideas</span></a>
                        
                        <?php }else{

                    } ?>
                        </div>
                        </div>
                        </li>
                        <?php }else{

                    } ?>
                        <?php if($_SESSION['ops'] == "OPS1"){ ?>
                        <li> <a class="waves-effect waves-dark" href="ops1data.php?id=<?php echo $id?>" aria-expanded="false"><i class="mdi mdi-database-plus"></i><span class="hide-menu">OPS1 Data</span></a>
                        </li>
                        <?php }else{

                    } ?> 
                       <?php if($_SESSION['ops'] == "OPS2"){ ?>
                        <li>
                        <div class="dropdown">
                        <a class=" dropdown-toggle waves-effect waves-dark" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="hide-menu"><i class="mdi mdi-content-duplicate"></i>&nbsp OPS2 Data</span></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <?php if($_SESSION['ops'] == "OPS2"){ ?>    
                        <a class="waves-effect waves-dark" href="ops2form1data.php?id=<?php echo $id?>" aria-expanded="false"><i class="mdi mdi-database-plus"></i><span class="hide-menu">OPS2 Client </span></a>
                        <?php }else{

                    } ?>
                        <?php if($_SESSION['ops'] == "OPS2"){ ?>
                        <a class="waves-effect waves-dark" href="ops2form2data.php?id=<?php echo $id?>" aria-expanded="false"><i class="mdi mdi-database-plus"></i><span class="hide-menu">OPS2 Profiles </span></a>
                        <?php }else{

                    } ?>
                        </div>
                        </div>
                        </li>
                       <?php }else{

                    } ?> 
                        <?php if(($_SESSION['ops'] == "OPS3") || ($_SESSION['ops'] == "OPS3-OPS4")){ ?>
                        <li>
                        <div class="dropdown">
                        <a class=" dropdown-toggle waves-effect waves-dark" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="hide-menu"><i class="mdi mdi-database-plus"></i>&nbsp OPS3 Data</span></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <?php if(($_SESSION['ops'] == "OPS3") || ($_SESSION['ops'] == "OPS3-OPS4")){ ?>
                        <a class="waves-effect waves-dark" href="OPS3data.php?id=<?php echo $id?>" aria-expanded="false"><i class="mdi mdi-database-plus"></i><span class="hide-menu">OPS3 Submission </span></a>
                        <?php }else{

                    } ?>
                        <?php if(($_SESSION['ops'] == "OPS3") || ($_SESSION['ops'] == "OPS3-OPS4")){ ?>
                        <a class="waves-effect waves-dark" href="ops3vdata.php?id=<?php echo $id?>" aria-expanded="false"><i class="mdi mdi-database-plus"></i><span class="hide-menu">OPS3 Vendors </span></a>
                        
                        <?php }else{

                    } ?> 
                        <?php if(($_SESSION['ops'] == "OPS3") || ($_SESSION['ops'] == "OPS3-OPS4")){ ?>
                        <a class="waves-effect waves-dark" href="ops3benchdata.php?id=<?php echo $id?>" aria-expanded="false"><i class="mdi mdi-database-plus"></i><span class="hide-menu">OPS3 Bench</span></a>
                        <?php }else{

                    } ?> 
                       </div>
                       </div>
                       </li>
                       <?php }else{

                    } ?>
                       <?php if(($_SESSION['ops'] == "OPS3-WGL")){ ?>
                        <li>
                        <div class="dropdown">
                        <a class=" dropdown-toggle waves-effect waves-dark" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="hide-menu"><i class="mdi mdi-database-plus"></i>&nbsp OPS3 Data</span></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <?php if(($_SESSION['ops'] == "OPS3-WGL")){ ?>
                        <a class="waves-effect waves-dark" href="ops3wgldata.php?id=<?php echo $id?>" aria-expanded="false"><i class="mdi mdi-database-plus"></i><span class="hide-menu">OPS3 Submission </span></a>
                        
                        <?php }else{

                    } ?>
                        <?php if(($_SESSION['ops'] == "OPS3-WGL")){ ?>
                        <a class="waves-effect waves-dark" href="ops3wglvdata.php?id=<?php echo $id?>" aria-expanded="false"><i class="mdi mdi-database-plus"></i><span class="hide-menu">OPS3 Vendor </span></a>
                        
                        <?php }else{

                    } ?> 
                       <?php if(($_SESSION['ops'] == "OPS3-WGL")){ ?>
                        <a class="waves-effect waves-dark" href="ops3wbenchdata.php?id=<?php echo $id?>" aria-expanded="false"><i class="mdi mdi-database-plus"></i><span class="hide-menu">OPS3 Bench </span></a>
                        
                        <?php }else{

                    } ?>
                       <?php if(($_SESSION['ops'] == "OPS3-WGL")){ ?>
                        <a class="waves-effect waves-dark" href="ops4wdata3.php?id=<?php echo $id?>" aria-expanded="false"><i class="mdi mdi-database-plus"></i><span class="hide-menu">OPS3 Consultant  </span></a>
                        
                        <?php }else{

                    } ?>
                       </div>
                       </div>
                       </li>
                       <?php }else{

                    } ?>
                       <?php if(($_SESSION['ops'] == "OPS4") || ($_SESSION['ops'] == "OPS3-OPS4")){ ?>
                       <li>
                        <div class="dropdown">
                        <a class=" dropdown-toggle waves-effect waves-dark" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="hide-menu"><i class="mdi mdi-database-plus"></i>&nbsp OPS4 Data</span></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                       <?php if(($_SESSION['ops'] == "OPS4") || ($_SESSION['ops'] == "OPS3-OPS4")){ ?>
                        <a class="waves-effect waves-dark" href="OPS4data.php?id=<?php echo $id?>" aria-expanded="false"><i class="mdi mdi-database-plus"></i><span class="hide-menu">OPS4 Submission </span></a>
                        <?php }else{

                    } ?> 
                        <?php if(($_SESSION['ops'] == "OPS4") || ($_SESSION['ops'] == "OPS3-OPS4")){ ?>
                        <a class="waves-effect waves-dark" href="ops4vdata.php?id=<?php echo $id?>" aria-expanded="false"><i class="mdi mdi-database-plus"></i><span class="hide-menu">OPS4 Vendor </span></a>
                        <?php }else{

                    } ?>
                        <?php if(($_SESSION['ops'] == "OPS4") || ($_SESSION['ops'] == "OPS3-OPS4")){ ?>
                        <a class="waves-effect waves-dark" href="ops4data3.php?id=<?php echo $id?>" aria-expanded="false"><i class="mdi mdi-database-plus"></i><span class="hide-menu">OPS4 Consultant </span></a>
                        
                        <?php }else{

                    } ?> 
                       </div>
                       </div>
                       </li>
                       <?php }else{

                    } ?> 
                        <?php if(($_SESSION['ops'] == "OPS0") || ($_SESSION['ops'] == "OPS1") || ($_SESSION['ops'] == "OPS2")){ ?>                       
                        <li> <a class="waves-effect waves-dark" href="pages-blank.php?id=<?php echo $id?>" aria-expanded="false"><i class="mdi mdi-watch-import"></i><span class="hide-menu">Login Timings</span></a>
                        </li>
                        <?php }else{

                    } ?> 
                       <?php if(($_SESSION['ops'] == "OPS0") || ($_SESSION['ops'] == "OPS1") || ($_SESSION['ops'] == "OPS2")){ ?>  
                        <li> <a class="waves-effect waves-dark" href="pages-error-404.php?id=<?php echo $id?>" aria-expanded="false"><i class="mdi mdi-watch-export"></i><span class="hide-menu">Logout Timings</span></a>
                        </li> 
                        <?php }else{

                    } ?>  
                       <?php if(($_SESSION['ops'] == "OPS3") || ($_SESSION['ops'] == "OPS3-WGL") || ($_SESSION['ops'] == "OPS4") || ($_SESSION['ops'] == "OPS3-OPS4")){ ?>                       
                        <li> <a class="waves-effect waves-dark" href="ops4logintimings.php?id=<?php echo $id?>" aria-expanded="false"><i class="mdi mdi-watch-import"></i><span class="hide-menu">Login Timings</span></a>
                        </li>
                        <?php }else{

                    } ?> 
                       <?php if(($_SESSION['ops'] == "OPS3") || ($_SESSION['ops'] == "OPS3-WGL") || ($_SESSION['ops'] == "OPS4") || ($_SESSION['ops'] == "OPS3-OPS4")){ ?>  
                        <li> <a class="waves-effect waves-dark" href="ops4logoutimings.php?id=<?php echo $id?>" aria-expanded="false"><i class="mdi mdi-watch-export"></i><span class="hide-menu">Logout Timings</span></a>
                        </li> 
                        <?php }else{

                    } ?>  
                       <!-- <li> <a class="waves-effect waves-dark" href="livechat/index.php?id=<?php echo $id?>" target="_blank" aria-expanded="false"><i class="mdi mdi-message"></i><span class="hide-menu">chat with team</span></a>
                        </li> -->
                        <?php if(($_SESSION['ops'] == "OPS0")){ ?>
                        <li> <a class="waves-effect waves-dark" href="filesdata.php?id=<?php echo $id?>" aria-expanded="false"><i class="mdi mdi-download"></i><span class="hide-menu">Quick Files</span></a>
                        </li>
                         <?php }else{

                    } ?>
                   <!--     <?php if(($_SESSION['ops'] == "OPS3") || ($_SESSION['ops'] == "OPS3-OPS4")){ ?>
                        <li> <a class="waves-effect waves-dark" href="ops3benchdata.php?id=<?php echo $id?>" aria-expanded="false"><i class="mdi mdi-database-plus"></i><span class="hide-menu">OPS3 Bench Data</span></a>
                        </li>
                         <?php }else{

                    } ?>
                       <?php if(($_SESSION['ops'] == "OPS4") || ($_SESSION['ops'] == "OPS3-OPS4")){ ?>
                        <li> <a class="waves-effect waves-dark" href="ops4benchdata.php?id=<?php echo $id?>" aria-expanded="false"><i class="mdi mdi-database-plus"></i><span class="hide-menu">OPS4 Bench Data</span></a>
                        </li>
                         <?php }else{

                    } ?>   -->
                    </ul>
                    <div class="text-center m-t-30">
                    <button class="btn waves-effect waves-light btn-warning hidden-md-down" id="myBtn"> Contact</button>
                    </div>
                    <div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <h2 style="color: white;">Succor Administration Team.</h2>
      <span class="close">&times;</span>
    </div>
    <div class="modal-body">
       <h4>Succor Admin</h4> 
      <strong>Phone: </strong><p>+91 XXXX-XXX-XXX</p> 
      <strong>Email: </strong><p>admin@succortechnologies.com</p>
      <h4>General Manager</h4> 
      <strong>Phone: </strong><p>+91 XXXX-XXX-XXX</p> 
      <strong>Email: </strong><p>admin@succortechnologies.com</p>    
      <h4>Team Lead</h4> 
      <strong>Phone: </strong><p>+91 XXXX-XXX-XXX</p> 
      <strong>Email: </strong><p>admin@succortechnologies.com</p>    
  </div>

</div>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
            <!-- Bottom points-->
            <div class="sidebar-footer">
                <!-- item--><a href="" class="link" data-toggle="tooltip" title="Settings"><i class="ti-settings"></i></a>
                <!-- item--><a href="" class="link" data-toggle="tooltip" title="Email"><i class="mdi mdi-gmail"></i></a>
                <!-- item--><a href="elogout.php?id=<?php echo $id?>" class="link" data-toggle="tooltip" title="Logout"><i class="mdi mdi-power"></i></a> </div>
            <!-- End Bottom points-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor">OPS0 IDEA FORM</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">Home</a></li>
                            <li class="breadcrumb-item active">OPS0 Idea Form</li>
                        </ol>
                    </div>
                    <div class="col-md-7 col-4 align-self-center">
                        <a href="elogout.php?id=<?php echo $id ?>" class="btn waves-effect waves-light btn-danger pull-right hidden-sm-down"><i class='mdi mdi-lock'></i>Log Out</a>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
             <?php echo check_message(); ?>
              <div class="row">
                    <!-- Column -->
                    <div class="col-lg-12 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="card-block">
                                <h2 class="title">OPS0 Idea</h2><br>
                                <form action="ops0ideasubmit.php?id=<?php echo $id?>" method="POST" enctype="multipart/form-data"  class="form-horizontal form-material">
                                   <!-- <div class="form-group">
                                        <label class="col-md-12"></label>
                                        <div class="col-md-12">
                                            <input type="number" placeholder="Project Id" name="projectid" required="required"class="form-control form-control-line" value="" >
                                        </div> -->
                                    <div class="form-group">
                                        <label class="col-md-12"></label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder="Enter Country" required="required" class="form-control form-control-line" value="" name="country" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        
                                        <div class="col-md-12">
                                            <input type="text" placeholder="Enter Project" required="required" class="form-control form-control-line" name="project" value="" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12"></label>
                                        <div class="col-md-12">
                                            <input type="text" name="technology" placeholder="Enter Technology" required="required" class="form-control form-control-line" value="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12"></label>
                                        <div class="col-md-12">
                                     <input type="text" placeholder="Enter idea" name="idea" required="required" class="form-control form-control-line" value="" >
                                        </div>
                                    </div>
                                  <!--  <div class="form-group">
                                        <label class="col-md-12"></label>
                                        <div class="col-md-12">
                                         <input type="text" placeholder="Enter Client Designation" name="clientdesignation" required="required" class="form-control form-control-line" value="" >
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <label class="col-md-12"></label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder="Enter Location" name="clientlocation" required="required" class="form-control form-control-line" value="" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12"></label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder="Enter Contact Account" name="clientcontactaccount" required="required" class="form-control form-control-line" value="" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12"></label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder="Enter Feedback" name="feedback" required="required"class="form-control form-control-line" value="" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12"></label>
                                        <div class="col-md-12">
                                            <input class="form-control form-control-line" placeholder="Enter Client Contact Id" type="text"  name="clientcontactid" value="" >
                                        </div>
                                    </div>
                                  <!--  <div class="form-group">
                                        <label class="col-md-12"></label>
                                        <div class="col-md-12">
                                            <input type="email" placeholder="Vendor Email" name="vendoremail" required="required" class="form-control form-control-line" value="" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12"></label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder="Vendor Number (* Max 15 numbers)" name="vendornumber" required="required" class="form-control form-control-line" value="" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12"></label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder="Submission Status" name="submissionstatus" class="form-control form-control-line" value="" >
                                        </div>
                                    </div>  -->
                                     <input type="hidden" name="id" id="textField" value="" required="required"><br><br>

                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button class="btn btn-info float-right" name="send" type="submit">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
            
            </div>
               
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer"> © 2020 Succor by www.succortechnologies.com </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
   <!-- <button class="open-button" onclick="openForm()">Chat</button>

<div class="chat-popup" id="myForm">
  <form action="/action_page.php" class="form-container">
    <h1>Chat With Team</h1>

    <label for="msg"><b>Message</b></label>
    <textarea placeholder="Type message.." name="msg" required></textarea>

    <button type="submit" class="btn">Send</button>
    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
  </form>
</div>-->
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/plugins/bootstrap/js/tether.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!-- chartist chart -->
    <script src="assets/plugins/chartist-js/dist/chartist.min.js"></script>
    <script src="assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script>
    <!--c3 JavaScript -->
    <script src="/assets/plugins/d3/d3.min.js"></script>
    <script src="/assets/plugins/c3-master/c3.min.js"></script>
    <!-- Chart JS -->
    <script src="js/dashboard1.js"></script>
</body>

</html>
