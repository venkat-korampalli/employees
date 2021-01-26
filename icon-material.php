<?php 
session_start();
if(!isset($_SESSION['empid'])){
        header("location: elogin.php");
    }
    $id = (isset($_GET['id']) ? $_GET['id'] : '');
    require_once ('process/dbh.php');
    $sql = "SELECT * FROM `employee` where id = '$id'";
    $result = mysqli_query($conn, $sql);
    $employee = mysqli_fetch_array($result);
    $empName = ($employee['firstName']);
    $empid = $employee['id'];
    $_SESSION['id'] = $empid;
    //echo "$id";
    $sql2 = "Select * From employee, employee_leave Where employee.id = $id and employee_leave.id = $id order by employee_leave.token desc";
    $result2 = mysqli_query($conn, $sql2);
?>

<html>
<head>
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/images/users/logo.png">
    <title>SuccorTechnologies | Employee Management | Employee Apply Leave</title>
    <link rel="stylesheet" type="text/css" href="styleapply.css">
    
    
    <style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

 th {
  background-color: #dddddd; 
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>

</head>
<body>

    <div class="page-wrapper p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Apply Leave Form</h2>
                    <form action="process/applyleaveprocess.php?id=<?php echo $id?>" method="POST">


                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="Reason" name="reason">
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <p>Start Date</p>
                                <div class="input-group">
                                    <input class="input--style-1" type="date" placeholder="start" name="start">
                                   
                                </div>
                            </div>
                            <div class="col-2">
                                <p>End Date</p>
                                <div class="input-group">
                                    <input class="input--style-1" type="date" placeholder="end" name="end">
                                   
                                </div>
                            </div>
                        </div>
                        



                        <div class="p-t-20">
                            <button class="btn btn--radius btn--green" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
                                
                                    <table>
  <tr>
    <th align = "center">Start Date</th>
                <th align = "center">End Date</th>
                <th align = "center">Total Days</th>
                <th align = "center">Reason</th>
                <th align = "center">Status</th> 
  </tr>
  <tr>
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
 
  </tr>
</table>




</body>
</html>