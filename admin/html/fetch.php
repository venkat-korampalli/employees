<?php
//fetch.php;
if(isset($_POST["view"]))
{
 include("process/dbh.php");
 $id = (isset($_GET['id']) ? $_GET['id'] : '');
 if($_POST["view"] != '')
 {
  $update_query = "UPDATE employee_leave SET l_status=1 WHERE l_status=0";
  mysqli_query($conn, $update_query);
 }
 else
 {
  $output .= '<li><a href="#" class="text-bold text-italic">No Notification Found</a></li>';
 }
 
 $query_1 = "SELECT * FROM employee_leave WHERE l_status=0";
 $result_1 = mysqli_query($conn, $query_1);
 $count = mysqli_num_rows($result_1);
 $data = array(
  'notification'   => $output,
  'unseen_notification' => $count
 );
 echo json_encode($data);
}
?>
