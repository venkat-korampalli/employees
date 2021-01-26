<?php 
session_start();
require_once ('process/dbh.php');
require_once ('process/session.php');


 if(!isset($_SESSION['userid'])){
        header("location: alogin.php");
    }
     $id = (isset($_GET['id']) ? $_GET['id'] : '');
    
    $sql5 = "SELECT * FROM `ops3benchdata` WHERE 1";
    $result5 = mysqli_query($conn, $sql5);

$sql = "SELECT id, firstName, lastName,  points FROM employee, rank WHERE rank.eid = employee.id order by rank.points desc";
$result = mysqli_query($conn, $sql);

$id = (isset($_GET['id']) ? $_GET['id'] : '');
     $sql1 = "SELECT * FROM `alogin` where userid = '$id'";
     $result1 = mysqli_query($conn, $sql1);
     $admin = mysqli_fetch_array($result1);
     $username = $admin['name'];
     $userpic = $admin['pic'];
     $userrole = $admin['role'];
     $_SESSION['role'] = $userrole;
     $userid = $admin['userid'];
     $_SESSION['userid'] = $userid;
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
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/users/succor.png">
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
    <link href="design.css" rel="stylesheet">
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
.dropdown-submenu {
  position: relative;
}

.dropdown-submenu .dropdown-menu {
  top: 0;
  left: 20%;
  margin-top: -1px;
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
                           <!-- <img src="../assets/images/logo-light-icon.png" alt="homepage" class="light-logo" />-->
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text --><span>
                            <b class="glow">SuccorTechnologies</b>
                         
                         <!-- Light Logo text -->    
                        <!-- <img src="../assets/images/logo-light-text.png" class="light-logo" alt="homepage" /></span> </a>-->
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
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="../html/process/<?php echo $userpic;?>" alt="user" class="profile-pic m-r-10" />Howdy <?php echo "$username"; ?></a>
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
                <?php include("navbar.php");?>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
            <!-- Bottom points-->
            <div class="sidebar-footer">
                <!-- item--><a href="" class="link" data-toggle="tooltip" title="Settings"><i class="ti-settings"></i></a>
                <!-- item--><a href="" class="link" data-toggle="tooltip" title="Email"><i class="mdi mdi-gmail"></i></a>
                <!-- item--><a href="alogout.php" class="link" data-toggle="tooltip" title="Logout"><i class="mdi mdi-power"></i></a> </div>
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
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="text-themecolor">OPS3 Bench CONSULTANTS</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">Home</a></li>
                            <li class="breadcrumb-item active">OPS3 Bench Consutants</li>
                            <li class="breadcrumb-item float-right"><a href="ops3vdata.php?id=<?php echo $id?>"> Vendor </a></li>
                            <li class="breadcrumb-item float-right"><a href="OPS3data.php?id=<?php echo $id?>"> Submission </a></li>
                            <li class="breadcrumb-item float-right"><a href="subcount.php?id=<?php echo $id?>"> Sub count </a></li>
                        </ol>
                    </div>
                    <div class="col-md-6 col-4 align-self-center">
                        <a href="alogout.php" class="btn waves-effect waves-light btn-danger pull-right hidden-sm-down"> <i class='mdi mdi-lock'></i>Log Out</a>
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
                    <div class="col-lg-12 col-xlg-12 col-md-5">
                        <div class="card">
                            <div class="card-block">
                                <form action="ops3benchsubmit.php?id=<?php echo $id?>" method="POST" enctype="multipart/form-data" class="form-horizontal form-material">
                                    <div class="form-group">
                                        <label for="example-email" class="col-md-12">Start Date</label>
                                        <div class="col-md-12">
                                     <input type="date" placeholder="Start Date" name="startdate" required="required" class="form-control form-control-line" value="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12"></label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder="Enter FullName" class="form-control form-control-line" value="" name="name" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12"></label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder="Enter Technology" class="form-control form-control-line" name="technology" value="" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-email" class="col-md-12"></label>
                                        <div class="col-md-12">
                                            <input type="email" name="email" placeholder="Enter Email Id" class="form-control form-control-line" value=""  id="example-email" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12"></label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder="Enter Contact Number" name="number" required="required" class="form-control form-control-line" value="" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-email" class="col-md-12"></label>
                                        <div class="col-md-12">
                                            <input type="text" name="visa" placeholder="Enter Visa (optional)" class="form-control form-control-line" value=""  id="example-email" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12"></label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder="Enter Reference (optional)" name="reference" required="required" class="form-control form-control-line" value="" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12"></label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder="Enter Assigned Team (optional)" name="assigned" required="required" class="form-control form-control-line" value="" >
                                        </div>
                                    </div>
                                  <!--  <div class="form-group">
                                        <label for="example-email" class="col-md-12"></label>
                                        <div class="col-md-12">
                                     <input type="date" placeholder="Enter Birth Date" name="birthday" required="required" class="form-control form-control-line" id="example-email" value="" >
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <label class="col-sm-12"></label>
                                        <div class="col-sm-12">
                                            <input class="form-control form-control-line" type="text" name="gender"  placeholder="Gender" value="" >
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <label class="col-md-12">Attach Resume (* pdf, docx, zip)</label>
                                        <div>
                                            <input type="file" placeholder="Attach Resume" name="resume" class="form-control form-control-line">
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <label class="col-md-12">Attach Id Card (* png, jpg, jpeg, pdf)</label>
                                        <div>
                                            <input type="file" placeholder="Attach Id card" name="idcard" class="form-control form-control-line">
                                        </div>
                                    </div> -->
                                    <input type="hidden" name="id" id="textField" value="" required="required"><br><br>

                                   <div class="form-group">
                                        <div class="col-sm-12">
                                            <button class="btn btn-info float-right" name="submit" type="submit">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-12 col-xlg-12 col-md-7">
                        <div class="card">
                            <div class="card-block">
                                <h4 class="card-title">OPS3 Bench Consultant</h4>
                                <h6 class="card-subtitle">Honesty Judge <code>.Charater</code></h6>
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover table-bordered">
                                        <thead class="bg bg-primary text-white">
                                           <tr>
                <th align = "center">Sql. No</th>
                <th align = "center">Admin</th>
                <th align = "center">Timestamp</th>
                <th align = "center">Start Date</th>
                <th align = "center">Name</th>
                <th align = "center">Technology</th>
                <th align = "center">Email</th>
                <th align = "center">Number</th>
                <th align = "center">Visa</th>
                <th align = "center">Reference</th>
                <th align = "center">Assigned</th>
                <th align = "center">Action</th>
                
            </tr>
                 </thead>
                <tbody class="text-dark">
               <?php
                while ($alogin = mysqli_fetch_assoc($result5)) {
                    echo "<tr>";
                    
                    echo "<td>".$alogin['id']."</td>";
                    echo "<td>".$alogin['admin']."</td>";
                    echo "<td>".$alogin['timestamp']."</td>";
                    echo "<td>".$alogin['startdate']."</td>";
                    echo "<td>".$alogin['name']."</td>";
                    echo "<td>".$alogin['technology']."</td>";
                    echo "<td>".$alogin['email']."</td>";
                    echo "<td>".$alogin['number']."</td>";
                    echo "<td>".$alogin['visa']."</td>";
                    echo "<td>".$alogin['reference']."</td>";
                    echo "<td>".$alogin['assigned']."</td>";
                    echo "<td><a href=\"ops3benchedit.php?id1=$alogin[id]&id=$id\">Edit</a> | <a href=\"ops3benchdelete.php?id1=$alogin[id]&id=$id\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";

                }


            ?>
                                        </tbody>
                                    </table>
                                </div>
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
            <footer class="footer text-center"> © 2020 Admin by Succor. </footer>
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

<script>
$(document).ready(function(){
  $('.dropdown-submenu a.test').on("click", function(e){
    $(this).next('ul').toggle();
    e.stopPropagation();
    e.preventDefault();
  });
});
</script>
</body>

</html>
