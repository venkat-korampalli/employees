<?php 
session_start();
ob_start();
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
     $empops = $employeen['ops'];
     $emppic = $employeen['pic'];
     $_SESSION['ops'] = $empops; 

    $sql = "SELECT id, firstName, lastName,  points FROM employee, rank WHERE rank.eid = employee.id order by rank.points desc";
    $sql1 = "SELECT `pname`, `duedate` FROM `project` WHERE eid = $id and status = 'Due'";

    $sql2 = "Select * From employee, employee_leave Where employee.id = $id and employee_leave.id = $id order by employee_leave.token";

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
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/users/logo.png">
    <title>SuccorTechnologies | Employee Management | Employee Homepage</title>
    <!-- Bootstrap Core CSS -->
    <link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- chartist CSS -->
    <link href="../assets/plugins/chartist-js/dist/chartist.min.css" rel="stylesheet">
    <link href="../assets/plugins/chartist-js/dist/chartist-init.css" rel="stylesheet">
    <link href="../assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <!--This page css - Morris CSS -->
    <link href="../assets/plugins/c3-master/c3.min.css" rel="stylesheet">
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
</style>
</head>

<body class="fix-header fix-sidebar card-no-border">

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
                         SuccorTechnologies<b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            
                            <!-- Light Logo icon -->
                          <!--  <img src="../assets/images/logo-light-icon.png" alt="homepage" class="light-logo" />-->
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text --><span>
                         
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
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="../../admin login/html/process/<?php echo $emppic;?>" alt="user" class="profile-pic m-r-10" />Howdy <?php echo "$empName"; ?></a>
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
                        <?php if($_SESSION['ops'] == "OPS1"){ ?>
                        <li> <a class="waves-effect waves-dark" href="map-google.php?id=<?php echo $id?>" aria-expanded="false"><i class="mdi mdi-content-duplicate"></i><span class="hide-menu">OPS1 Submit</span></a>
                        </li>
                        <?php }else{

                    } ?> 
                    <?php if($_SESSION['ops'] == "OPS2"){ ?>
                        <li> <a class="waves-effect waves-dark" href="map-googleops2form1.php?id=<?php echo $id?>" aria-expanded="false"><i class="mdi mdi-content-duplicate"></i><span class="hide-menu">OPS2 Form1 Submit</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="map-googleops2form2.php?id=<?php echo $id?>" aria-expanded="false"><i class="mdi mdi-content-duplicate"></i><span class="hide-menu">OPS2 Form2 Submit</span></a>
                        </li>
                        <?php }else{

                    } ?> 
                    <?php if(($_SESSION['ops'] == "OPS3") || ($_SESSION['ops'] == "OPS3-OPS4")){ ?>
                        <li> <a class="waves-effect waves-dark" href="map-google.php?id=<?php echo $id?>" aria-expanded="false"><i class="mdi mdi-content-duplicate"></i><span class="hide-menu">OPS3 Submit</span></a>
                        </li>
                        <?php }else{

                    } ?> 
                    <?php if(($_SESSION['ops'] == "OPS4") || ($_SESSION['ops'] == "OPS3-OPS4")){ ?>
                        <li> <a class="waves-effect waves-dark" href="map-googleops4.php?id=<?php echo $id?>" aria-expanded="false"><i class="mdi mdi-content-duplicate"></i><span class="hide-menu">OPS4 Submit</span></a>
                        </li>
                        <?php }else{

                    } ?> 
                        <?php if($_SESSION['ops'] == "OPS1"){ ?>
                        <li> <a class="waves-effect waves-dark" href="" aria-expanded="false"><i class="mdi mdi-database-plus"></i><span class="hide-menu">OPS1 Data</span></a>
                        </li>
                        <?php }else{

                    } ?> 
                       <?php 
                        if($_SESSION['ops'] == "OPS2"){ ?>
                        <li> <a class="waves-effect waves-dark" href="ops2form1data.php?id=<?php echo $id?>" aria-expanded="false"><i class="mdi mdi-database-plus"></i><span class="hide-menu">OPS2 Form1 Data</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="ops2form2data.php?id=<?php echo $id?>" aria-expanded="false"><i class="mdi mdi-database-plus"></i><span class="hide-menu">OPS2 Form2 Data</span></a>
                        </li>
                        <?php }else{

                    } ?> 
                    <?php if(($_SESSION['ops'] == "OPS3") || ($_SESSION['ops'] == "OPS3-OPS4")){ ?>
                        <li> <a class="waves-effect waves-dark" href="OPS3data.php?id=<?php echo $id?>" aria-expanded="false"><i class="mdi mdi-database-plus"></i><span class="hide-menu">OPS3 Data</span></a>
                        </li>
                        <?php }else{

                    } ?> 
                        
                       <?php if(($_SESSION['ops'] == "OPS4") || ($_SESSION['ops'] == "OPS3-OPS4")){ ?>
                        <li> <a class="waves-effect waves-dark" href="OPS4data.php?id=<?php echo $id?>" aria-expanded="false"><i class="mdi mdi-database-plus"></i><span class="hide-menu">OPS4 Data</span></a>
                        </li> 
                        <?php }else{

                    } ?> 
                        <?php if(($_SESSION['ops'] == "OPS1") || ($_SESSION['ops'] == "OPS2")){ ?>                       
                        <li> <a class="waves-effect waves-dark" href="pages-blank.php?id=<?php echo $id?>" aria-expanded="false"><i class="mdi mdi-watch-import"></i><span class="hide-menu">Login Timings</span></a>
                        </li>
                        <?php }else{

                    } ?> 
                       <?php if(($_SESSION['ops'] == "OPS1") || ($_SESSION['ops'] == "OPS2")){ ?>  
                        <li> <a class="waves-effect waves-dark" href="pages-error-404.php?id=<?php echo $id?>" aria-expanded="false"><i class="mdi mdi-watch-export"></i><span class="hide-menu">Logout Timings</span></a>
                        </li> 
                        <?php }else{

                    } ?>  
                       <?php if(($_SESSION['ops'] == "OPS3") || ($_SESSION['ops'] == "OPS4") || ($_SESSION['ops'] == "OPS3-OPS4")){ ?>                       
                        <li> <a class="waves-effect waves-dark" href="ops4logintimings.php?id=<?php echo $id?>" aria-expanded="false"><i class="mdi mdi-watch-import"></i><span class="hide-menu">Login Timings</span></a>
                        </li>
                        <?php }else{

                    } ?> 
                       <?php if(($_SESSION['ops'] == "OPS3") || ($_SESSION['ops'] == "OPS4") || ($_SESSION['ops'] == "OPS3-OPS4")){ ?>  
                        <li> <a class="waves-effect waves-dark" href="ops4logoutimings.php?id=<?php echo $id?>" aria-expanded="false"><i class="mdi mdi-watch-export"></i><span class="hide-menu">Logout Timings</span></a>
                        </li> 
                        <?php }else{

                    } ?>  
                                            
                    </ul>
                    <div class="text-center m-t-30">
                        <a href="elogout.php" class="btn waves-effect waves-light btn-warning hidden-md-down"> Contact</a>
                    </div>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
            <!-- Bottom points-->
            <div class="sidebar-footer">
                <!-- item--><a href="" class="link" data-toggle="tooltip" title="Settings"><i class="ti-settings"></i></a>
                <!-- item--><a href="" class="link" data-toggle="tooltip" title="Email"><i class="mdi mdi-gmail"></i></a>
                <!-- item--><a href="elogout.php" class="link" data-toggle="tooltip" title="Logout"><i class="mdi mdi-power"></i></a> </div>
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
                    <?php if(($_SESSION['ops'] == "OPS1") || ($_SESSION['ops'] == "OPS2")){ ?>                       
                    <div class="col-md-2 col-4 align-self-center">
                        <button onclick="worklogin()" class="btn waves-effect waves-light btn-primary pull-right hidden-sm-down"><i class="mdi mdi-login"></i> Work Login</button>
                    </div>
                    <?php }else{

                    } ?> 
                    <?php if(($_SESSION['ops'] == "OPS1") || ($_SESSION['ops'] == "OPS2")){ ?>
                    <div class="col-md-2 col-4 align-self-center">
                         <button onclick="worklogout()" class="btn waves-effect waves-light btn-primary pull-right hidden-sm-down"><i class="mdi mdi-login"></i> Work Logout</button>
                    </div>
                    <?php }else{

                    } ?> 
                    <?php if(($_SESSION['ops'] == "OPS3") || ($_SESSION['ops'] == "OPS4") || ($_SESSION['ops'] == "OPS3-OPS4")){ ?>
                    <div class="col-md-2 col-4 align-self-center">
                         <button onclick="worklogin_us()" class="btn waves-effect waves-light btn-primary pull-right hidden-sm-down"><i class="mdi mdi-login"></i> Work Login_us</button>
                    </div>
                    <?php }else{

                    } ?> 
                    <?php if(($_SESSION['ops'] == "OPS3") || ($_SESSION['ops'] == "OPS4") || ($_SESSION['ops'] == "OPS3-OPS4")){ ?>
                    <div class="col-md-2 col-4 align-self-center">
                         <button onclick="worklogout_us()" class="btn waves-effect waves-light btn-primary pull-right hidden-sm-down"><i class="mdi mdi-login"></i> Work Logout_us</button>
                    </div>
                    <?php }else{

                    } ?> 
                    <div class="col-md-2 col-4 align-self-center">
                        <a href="elogout.php" class="btn waves-effect waves-light btn-danger pull-right hidden-sm-down"><i class='mdi mdi-lock'></i>Log Out</a>
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
                                <h2 class="card-title">Succor Leaderboard </h2>
                                <h6 class="card-subtitle">Great Things starts <code>.Here</code></h6>
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover table-bordered">
                                        <thead class="bg bg-primary text-white">
                                            <tr>
                <th align = "center">Seq.</th>
                <th align = "center">Emp. ID</th>
                <th align = "center">Name</th>
                <th align = "center">Points</th>
                

            </tr>
                 </thead>
                <tbody>
                <?php
                echo "<tbody>";
                $seq = 1;
                while ($employee = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>".$seq."</td>";
                    echo "<td>".$employee['id']."</td>";
                    
                    echo "<td>".$employee['firstName']." ".$employee['lastName']."</td>";
                    
                    echo "<td>".$employee['points']."</td>";
                    
                    $seq+=1;
                }
                echo "</tbody>";

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
            </div>
                <!-- Row -->
                <!-- Row -->
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
                    
                    echo "<td>".$employee1['pname']."</td>";
                    
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
            </div>

            <div class="row">
                    <!-- Column -->
                   <div class="col-lg-12">
                        <div class="card">
                            <div class="card-block">
                                <h4 class="card-title">Basic Table</h4>
                                <h6 class="card-subtitle">Add class <code>.table</code></h6>
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
            </div>

            <div class="row">
                    <!-- Column -->
                   <div class="col-lg-12">
                        <div class="card">
                            <div class="card-block">
                                <h4 class="card-title">Basic Table</h4>
                                <h6 class="card-subtitle">Add class <code>.table</code></h6>
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
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="../assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/plugins/bootstrap/js/tether.min.js"></script>
    <script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="../assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!-- chartist chart -->
    <script src="../assets/plugins/chartist-js/dist/chartist.min.js"></script>
    <script src="../assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script>
    <!--c3 JavaScript -->
    <script src="../assets/plugins/d3/d3.min.js"></script>
    <script src="../assets/plugins/c3-master/c3.min.js"></script>
    <!-- Chart JS -->
    <script src="js/dashboard1.js"></script>
</body>

</html>
