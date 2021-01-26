<?php 
session_start();
require_once ('process/dbh.php');
require_once ('process/session.php');
 if(!isset($_SESSION['empid'])){
        header("location: elogin.php");
    }

     $id = (isset($_GET['id']) ? $_GET['id'] : '');
     $sql1 = "SELECT * FROM `employee` where id = '$id'";
     $result1 = mysqli_query($conn, $sql1);
     $employeen = mysqli_fetch_array($result1);
     $empName = $employeen['firstName'];
     $empemail = $employeen['email'];
     $empops = $employeen['ops'];
     $emppic = $employeen['pic'];
     $_SESSION['ops'] = $empops; 
     $empid = $employeen['empid'];
     $_SESSION['empid'] = $empid;
     

    $sql = "SELECT id, firstName, lastName,  points FROM employee, rank WHERE rank.eid = employee.id order by rank.points desc";
    $sql1 = "SELECT `pname`, `duedate` FROM `project` WHERE eid = $id and status = 'Due' ORDER BY pid DESC";

    $sql2 = "Select * From employee, employee_leave Where employee.id = $id and employee_leave.id = $id and employee_leave.status = 'Pending' order by employee_leave.token desc";

    $sql3 = "SELECT * FROM `salary` WHERE id = $id";

//echo "$sql";
$result = mysqli_query($conn, $sql);
$result1 = mysqli_query($conn, $sql1);
$result2 = mysqli_query($conn, $sql2);
$result3 = mysqli_query($conn, $sql3);


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
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
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

.modal-body {padding: 8px 16px;}

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
#wrap{
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  margin: auto;
}
</style>
</head>

<body class="fix-header fix-sidebar card-no-border">

<!-- ============================================================== -->
    <!-- Work login - Employee Work login & out timings -->
    <!-- ============================================================== -->
<script LANGUAGE='JavaScript'>
function worklogin() {
  var txt;
  if (confirm("Are you sure you want to login?")) {
    window.location.href='process/loginandout1.php?id=<?php echo $id ?>';;
    
  } else {
    txt = "You pressed Cancel!";
  }
};

function worklogout() {
  var txt;
  if (confirm("Are you sure you want to logout?")) {
    window.location.href='process/emplogouttime1.php?id=<?php echo $id ?>';;
  } else {
    txt = "You pressed Cancel!";
  }
};

function worklogin_us() {
  var txt;
  if (confirm("Are you sure you want to login?")) {
    window.location.href='process/userlogin_us.php?id=<?php echo $id ?>';;
    
  } else {
    txt = "You pressed Cancel!";
  }
};

function worklogout_us() {
  var txt;
  if (confirm("Are you sure you want to logout?")) {
    window.location.href='process/userlogout_us.php?id=<?php echo $id ?>';;
  } else {
    txt = "You pressed Cancel!";
  }
};

</script>
<!-- Work login end -->

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
                          <!--  <img src="../assets/images/logo.png" alt="homepage" class="light-logo" />-->
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text --><span>
                         <b>SuccorTechnologies</b>
                         <!-- Light Logo text -->    
                        <!-- <img src="../assets/images/logo.png" class="light-logo" alt="homepage" /></span> --></a>
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
                        <!-- Last Logout Timings -->
                    <li class="nav-item dropdown">
                    <strong class="text-white">Last Login:<i>&nbsp<?php 
                    $ret=mysqli_query($conn,"SELECT  * from userlogouttimings where empid='$id' order by id desc limit 1");
                    $row=mysqli_fetch_array($ret);
                    echo $row['logoutdate']; ?> at <?php echo $row['logouttime'];?></i></strong>
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
                        <li class="lift"> <a class="waves-effect waves-dark" href="table-basic.php?id=<?php echo $id?>" aria-expanded="false"><i class="mdi mdi-table"></i><span class="hide-menu">My Projects &nbsp &nbsp<span class="badge badge-danger px-2 py-1 count"></span></span></a>
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
                        <a class=" dropdown-toggle waves-effect waves-dark" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="hide-menu"><i class="mdi mdi-database-plus"></i>&nbsp OPS0 Data</span></a>
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
                    <button class="btn waves-effect waves-light btn-warning hidden-md-down" id="myBtn"> Email Now!</button>
                    <div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <h2 style="color: white;">Ready To Send Email.</h2>
      <span class="close">&times;</span>
    </div>
    
    <div class="modal-body">
<form method="post" action="email.php?id=<?php echo $id?>">
    <div class="row"> 
    FROM :
    <div class="col-lg-5 col-xlg-5 col-md-5"> 
       <input name="email" id="email" class="form-control form-control-line" type="text" value="<?php echo $empemail ?>"  readonly/><br />  
      </div>
       TO : 
      <div class="col-lg-6 col-xlg-6 col-md-5">
     <input name="Toemail" class="form-control form-control-line" id="email" type="text" /><br />
    </div>
    </div>
    <div class="row">
    Subject:    
    <div class="col-lg-12 col-xlg-12 col-md-5"> 
     <input name="subject" id="subject" class="form-control form-control-line" type="text" /><br />
    </div>
    <br>
    Message:<br />
    <div class="col-lg-12 col-xlg-12 col-md-5">
<textarea name="message" id="message" class="form-control form-control-line" rows="15" cols="40"></textarea><br />
  </div>
  <div class="col-lg-12 col-xlg-3 col-md-5">
<button class="btn btn-info float-right" name="Send" type="send" value="Send"><i class="mdi mdi-send"></i>&nbsp Send</button>
  </div> 
 </div>

</form>
</div> 
</div>
                    </div>
<!--                    <div id="myModal" class="modal">

  <!-- Modal content -->
<!--  <div class="modal-content">
    <div class="modal-header">
      <h2 style="color: white;">Succor Administration Team.</h2>
      <span class="close">&times;</span>
    </div>
    
    <div class="modal-body">
    <div class="row">    
    <div class="col-lg-5 col-xlg-3 col-md-5">    
       <h4>Succor Admin</h4> 
      <strong>Phone: </strong><p>+91 XXXX-XXX-XXX</p> 
      <strong>Email: </strong><p>admin@succortechnologies.com</p>
      <h4>General Manager</h4> 
      <strong>Phone: </strong><p>+91 XXXX-XXX-XXX</p> 
      <strong>Email: </strong><p>admin@succortechnologies.com</p>  
      </div>
      <div class="col-lg-6 col-xlg-3 col-md-5">
      <h4>Team Lead</h4> 
      <strong>Phone: </strong><p>+91 XXXX-XXX-XXX</p> 
      <strong>Email: </strong><p>admin@succortechnologies.com</p>
      <h4>Team Lead</h4> 
      <strong>Phone: </strong><p>+91 XXXX-XXX-XXX</p> 
      <strong>Email: </strong><p>admin@succortechnologies.com</p>
    </div>
  </div>
 </div>
</div>  -->
 </nav>
                <!-- End Sidebar navigation -->
            <!-- End Sidebar scroll-->
            <!-- Bottom points-->
            <div class="sidebar-footer">
                <!-- item--><a href="" class="link" data-toggle="tooltip" title="Settings"><i class="ti-settings"></i></a>
                <!-- item--><a href=".php?id=<?php echo $id?>" class="link" data-toggle="tooltip" title="Email"><i class="mdi mdi-gmail"></i></a>
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
                        <h3 class="text-themecolor">Dashboard</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                    <?php if(($_SESSION['ops'] == "OPS0") || ($_SESSION['ops'] == "OPS1") || ($_SESSION['ops'] == "OPS2")){ ?>                       
                    <div class="col-md-2 col-4 align-self-center">
                        <button onclick="worklogin()" class="btn waves-effect waves-light btn-primary pull-right hidden-sm-down"><i class="mdi mdi-login"></i> Work Login</button>
                    </div>
                    <?php }else{

                    } ?> 
                    <?php if(($_SESSION['ops'] == "OPS0") || ($_SESSION['ops'] == "OPS1") || ($_SESSION['ops'] == "OPS2")){ ?>
                    <div class="col-md-2 col-4 align-self-center">
                         <button onclick="worklogout()" class="btn waves-effect waves-light btn-primary pull-right hidden-sm-down"><i class="mdi mdi-login"></i> Work Logout</button>
                    </div>
                    <?php }else{

                    } ?> 
                    <?php if(($_SESSION['ops'] == "OPS3") || ($_SESSION['ops'] == "OPS3-WGL") || ($_SESSION['ops'] == "OPS4") || ($_SESSION['ops'] == "OPS3-OPS4")){ ?>
                    <div class="col-md-2 col-4 align-self-center">
                         <button onclick="worklogin_us()" class="btn waves-effect waves-light btn-primary pull-right hidden-sm-down"><i class="mdi mdi-login"></i> Work Login_us</button>
                    </div>
                    <?php }else{

                    } ?> 
                    <?php if(($_SESSION['ops'] == "OPS3") || ($_SESSION['ops'] == "OPS3-WGL") || ($_SESSION['ops'] == "OPS4") || ($_SESSION['ops'] == "OPS3-OPS4")){ ?>
                    <div class="col-md-2 col-4 align-self-center">
                         <button onclick="worklogout_us()" class="btn waves-effect waves-light btn-primary pull-right hidden-sm-down"><i class="mdi mdi-login"></i> Work Logout_us</button>
                    </div>
                    <?php }else{

                    } ?> 
                    <div class="col-md-2 col-4 align-self-center">
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
                   <div class="col-lg-12">
                        <div class="card">
                            <div class="card-block">
                                <h4 class="card-title">Pending Projects</h4>
                                <h6 class="card-subtitle">Never <code>.Neglect</code></h6>
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover table-bordered">
                                        <thead class="bg bg-primary text-white">
                                           <tr>
                <th align = "center">Project Name</th>
                <th align = "center">Due Date</th>
                
            </tr>
                 </thead>
                <tbody class="text-dark">
               <?php
                while ($employee1 = mysqli_fetch_assoc($result1)) {
                    echo "<tr>";
                    
                    echo "<td><a href=\"table-basic.php?id=$id\">".$employee1['pname']."</a></td>";
                    
                    echo "<td>".$employee1['duedate']."</td>";

                }


            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
            
            
            <div class="row">
                    <!-- Column -->
                   <div class="col-lg-12">
                        <div class="card">
                            <div class="card-block">
                                <h4 class="card-title">Leave Request</h4>
                                <h6 class="card-subtitle">Never <code>.Giveup</code></h6>
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover table-bordered">
                                        <thead class="bg bg-primary text-white">
                                           <tr>
                
                <th align = "center">Start Date</th>
                <th align = "center">End Date</th>
                <th align = "center">Total Days</th>
                <th align = "center">Reason</th>
                <th align = "center">Status</th>
            </tr>
                 </thead>
                <tbody class="text-dark">
                <?php
                while ($employee = mysqli_fetch_assoc($result2)) {
                    $date1 = new DateTime($employee['start']);
                    $date2 = new DateTime($employee['end']);
                    $interval = $date1->diff($date2);
                    $interval = $date1->diff($date2);

                    echo "<tr>";
                    
                    
                    echo "<td>".$employee['start']."</td>";
                    echo "<td>".$employee['end']."</td>";
                    echo "<td>".$interval->days."</td>";
                    echo "<td>".$employee['reason']."</td>";
                    echo "<td>".$employee['status']."</td>";
                    
                }
            ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <!-- Column -->
                   <div class="col-lg-12">
                        <div class="card">
                            <div class="card-block">
                                <h4 class="card-title">MY Salary</h4>
                                <h6 class="card-subtitle">Work Hard <code>.To Strive</code></h6>
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover table-bordered">
                                        <thead class="bg bg-primary text-white">
                                                <tr>
                
                <th align = "center">Base Salary</th>
                <th align = "center">Bonus</th>
                <th align = "center">Total Salary</th>
                
            </tr>
                 </thead>
                <tbody class="text-dark">
               <?php
                while ($employee = mysqli_fetch_assoc($result3)) {
                    

                    echo "<tr>";
                    
                    
                    echo "<td>".$employee['base']."</td>";
                    echo "<td>".$employee['bonus']." %</td>";
                    echo "<td>".$employee['total']."</td>";
                    
                }

            ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
            

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
    
    <script>
$(document).ready(function(){
 
 function load_unseen_notification(view = '')
 {
  $.ajax({
   url:"fetch.php?id=<?php echo $id?>",
   method:"POST",
   data:{view:view},
   dataType:"json",
   success:function(data)
   {
    if(data.unseen_notification > 0)
    {
     $('.count').html(data.unseen_notification);
    }
   }
  });
 }
 
 load_unseen_notification();
 
 $(document).on('click', '.lift', function(){
  $('.count').html('');
  load_unseen_notification('yes');
 });
 
 setInterval(function(){ 
  load_unseen_notification();; 
 }, 5000);
 
});
</script>

    
</body>

</html>
