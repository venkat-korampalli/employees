<?php
session_start();
require_once ('process/dbh.php');
$id = $_GET['id'];

if(!isset($_SESSION['userid'])){
        header("location: alogin.php");
    }

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
<html>

<head>
   

    <!-- Title Page-->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/users/succor.png">
    <title>SuccorTechnologies | Employee Management | Employee Project Assign</title>

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

    <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Assign Project</h2>
                    <form action="process/venuassignp.php?id=<?php echo $id?>" method="POST" enctype="multipart/form-data">


                        

                         <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="Employee ID" name="eid" required="required">
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="Project Name" name="pname" required="required">
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="date" placeholder="date" name="duedate" required="required">
                                   
                                </div>
                                <?php if($_SESSION['role'] == "admin-OPS0,2,3-WL&HYD,OPS4"){ ?>
                                    <div class="input-group">
                                        <div class="col-12">
                                            <select name="ops">
                                                <option value="admin-OPS0,2,3-WL&HYD,OPS4">Venu</option>
                                            </select>
                                        </div>
                                    </div>
                                    <?php }else{
                    } ?> 
                                <?php if($_SESSION['role'] == "admin-OPS2,3-WL&HYD,OPS4"){ ?>           
                                    <div class="input-group">
                                        <div class="col-12">
                                            <select name="ops">
                                                <option value="admin-OPS2,3-WL&HYD,OPS4">Sandy</option>
                                            </select>
                                        </div>
                                    </div>
                                    <?php }else{
                    } ?> 
                            </div>
                            
                        </div>
                                 


                        <div class="p-t-20">
                            <button class="btn btn--radius btn--green" type="submit">Assign</button>
                            <button class="btn btn--radius btn--green" onclick="goBack()" type="submit">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js2/global.js"></script>
    <script src="js2/global.js"></script>
    <script>
function goBack() {
  window.history.back();
}
</script>

</body>

</html>
<!-- end document-->
