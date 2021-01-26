<?php
session_start();
require_once ('dbh.php');
$sql = "SELECT * from `employee` , `ops0idea` WHERE employee.`id` = ops0idea.`empid` ORDER BY ops0idea.`id` DESC";

if(!isset($_SESSION['userid'])){
        header("location: alogin.php");
    }
//echo "$sql";
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
    <title>SuccorTechnologies | Employee Management | Employee OPS4 Data</title>
    <!-- Bootstrap Core CSS -->
    <link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
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
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >
   <!-- MDBootstrap Datatables  -->
<link href="mdbootstrap/css/addons/datatables.min.css" rel="stylesheet">
<!-- MDBootstrap Datatables  -->
<script type="text/javascript" src="mdbootstrap/js/addons/datatables.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>
    .table tbody tr:hover td, .table tbody tr:hover th {
    background-color: deepskyblue;
    color: white;
    cursor: pointer;
}
.my-custom-scrollbar {
position: relative;
height: 350px;
overflow: auto;
}
.table-wrapper-scroll-y {
display: block;
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
      <script LANGUAGE='JavaScript'>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});

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
                          <b>
                            
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            
                            <!-- Light Logo icon -->
                           <!-- <img src="../assets/images/logo-light-icon.png" alt="homepage" class="light-logo" />-->
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text --><span>
                            <b class="">SuccorTechnologies</b>
                         
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
                    <div class="col-md-7 col-8 align-self-center">
                        <h3 class="text-themecolor m-b-0 m-t-0">OPS0 IDEAS DATA</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">OPS0 Ideas Data</li>
                            <li class="breadcrumb-item float-right"><a href="ops0data1.php?id=<?php echo $id?>">OPS0Project</a></li>
                            <li class="breadcrumb-item float-right"><a href="ops0data2.php?id=<?php echo $id?>">OPS0Consultant</a></li>
                            <li class="breadcrumb-item float-right"><a href="ops0wvendordata.php?id=<?php echo $id?>">OPS0WVendor</a></li>
                            <li class="breadcrumb-item float-right"><a href="ops0fclientdata.php?id=<?php echo $id?>">OPS0FClients</a></li>
                        </ol>
                    </div>
                    <div class="col-md-5 col-4 align-self-center">
                        <a href="alogout.php" class="btn waves-effect waves-light btn-danger pull-right hidden-sm-down"> <i class='mdi mdi-lock'></i>Log Out</a>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <input type="text" class ="" id="myInput" onkeyup="myFunction()" placeholder="Search here..">
                    <div class="row">
                    <!-- column -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-block">
                                <h2 class="card-title">OPS0 Ideas Data</h2>
                                <h6 class="card-subtitle">Always <code>.remember</code></h6>
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover table-bordered table-wrapper-scroll-y my-custom-scrollbar" id="ops3">
                                        <thead class="bg bg-primary text-white">
                                            <tr>
                                               <th align = "center">Emp. ID</th>
                <th align = "center">Picture</th>
                <th align = "center">Name</th>
                <th align = "center">Timestamp</th>
                <th align = "center">Country</th>
                <th align = "center">Project</th>
                <th align = "center">Technology</th>
                <th align = "center">Idea</th>
                 <th align = "center">Action</th> 

                                            </tr>
        </thead>
        <tbody id="myTable">
                <?php
                while ($employee = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>".$employee['empid']."</td>";
                    echo "<td><img src='../html/process/".$employee['pic']."' height = 60px width = 60px></td>";
                    echo "<td>".$employee['firstName']." ".$employee['lastName']."</td>";                   
                    echo "<td>".$employee['timestamp']."</td>";
                    echo "<td>".$employee['country']."</td>";
                    echo "<td>".$employee['project']."</td>";
                    echo "<td>".$employee['technology']."</td>";
                    echo "<td>".$employee['idea']."</td>";


                    echo "<td><a href=\"ops0ideaedit.php?id1=$employee[id]&id=$id\"><i class='mdi mdi-table-edit'></i>Edit</a>| <a href=\"ops0ideadelete.php?id1=$employee[id]&id=$id\" onClick=\"return confirm('Are you sure you want to delete?')\"><i class='mdi mdi-delete'></i>Delete</a></td>";
                   
                    echo "</tr>";

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
            <footer class="footer text-center">
                © 2020 Admin by Succor.
            </footer>
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
