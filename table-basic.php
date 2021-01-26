<?php 
session_start();
if(!isset($_SESSION['empid'])){
        header("location: elogin.php");
    }
    $id = (isset($_GET['id']) ? $_GET['id'] : '');
    require_once ('process/dbh.php');
    $sql = "SELECT * FROM `project` WHERE eid = '$id' ORDER BY pid DESC";
    $result = mysqli_query($conn, $sql);

    $sql4 = "SELECT * FROM `employee` where id = '$id'";
     $result4 = mysqli_query($conn, $sql4);
     $employeen = mysqli_fetch_array($result4);
     $empName = $employeen['firstName'];
     $empops = $employeen['ops'];
     $emppic = $employeen['pic'];
     $empid = $employeen['id'];
     $_SESSION['empid'] = $empid;
     $_SESSION['ops'] = $empops; 
     $_SESSION['id'] = $empid;
     

    
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
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/users/logo.png">
    <title>SuccorTechnologies | Employee Management | Employee Projects</title>
    <!-- Bootstrap Core CSS -->
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
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
<style>
    .table tbody tr:hover td, .table tbody tr:hover th {
    background-color: deepskyblue;
    color: white;
    cursor: pointer;
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
                    <a class="navbar-brand text-white" href="index.php?id=<?php echo $id?>">
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
                        <a href="" class="btn waves-effect waves-light btn-warning hidden-md-down"> Contact</a>
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
                        <h3 class="text-themecolor m-b-0 m-t-0">MY PROJECTS</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">My Projects</li>
                        </ol>
                    </div>
                    <div class="col-md-7 col-4 align-self-center">
                        <a href="elogout.php?id=<?php echo $id?>" class="btn waves-effect waves-light btn-danger pull-right hidden-sm-down"><i class='mdi mdi-lock'></i> Log Out</a>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- column -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-block">
                                <h4 class="card-title">My Project Status</h4>
                                <h6 class="card-subtitle">Always do <code>.Intime</code></h6>
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover table-bordered">
                                        <thead class="bg bg-primary text-white">
                                            <tr>

                <th align = "center">Project ID</th>
                <th align = "center">Project Name</th>
                <th align = "center">Due Date</th>
                <th align = "center">Sub Date</th>
                <th align = "center">Action</th>
                <th align = "center">Mark</th>
               <!-- <th align = "center">Filename</th>
                <th align = "center">size (in mb)</th> 
                <th align = "center">Downloads</th> 
                <th align = "center">Download File</th> -->
                <th align = "center">Status</th>
                <th align = "center">Option</th>
            </tr>
        </thead>
        <tbody>
                <?php
                while ($employee = mysqli_fetch_assoc($result)) {

                    echo "<tr>";
                    echo "<td>".$employee['pid']."</td>";
                    echo "<td>".$employee['pname']."</td>";
                    echo "<td>".$employee['duedate']."</td>";
                    echo "<td>".$employee['subdate']."</td>";
                    echo "<td>".$employee['action']."</td>";
                    echo "<td>".$employee['mark']."</td>";
               //   echo "<td>".$employee['filename']."</td>";
            //      echo "<td>".floor($employee['size'] / 1000) . ' KB'."</td>";
          //        echo "<td>".$employee['downloads']."</td>";
             //     echo "<td><a href=\"admin/html/filesLogic.php?file_id=$employee[pid]\"><i class='mdi mdi-download'></i>Download</a></td>";
                    echo "<td>".$employee['status']."</td>";
                    

                     echo "<td><a href=\"psubmit.php?pid=$employee[pid]&id=$employee[eid]\"><i class='mdi mdi-content-save-all'></i>&nbsp Submit</a>";

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
            <footer class="footer">
                © 2020 Succor by www.succortechnologies.com
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
    <script type="text/javascript">
        $(document).ready(function(){
            $(".project").click(function(){  
                $(".badge-red").hide();
            });
        });
    </script>>
</body>

</html>
