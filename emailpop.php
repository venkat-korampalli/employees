<?php
require_once ('process/dbh.php');
require_once ('process/session.php');

$id = (isset($_GET['id']) ? $_GET['id'] : '');
     $sql1 = "SELECT * FROM `employee` where id = '$id'";
     $result1 = mysqli_query($conn, $sql1);
     $employeen = mysqli_fetch_array($result1);
     $empName = $employeen['firstName'];
     $empemail = $employeen['email'];
     $empops = $employeen['ops'];
     $emppic = $employeen['pic'];
     $_SESSION['ops'] = $empops; 
     $empid = ($employeen['id']);
     $_SESSION['id'] = $empid;
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
</head>
<body>
<p><?php echo check_message(); ?></p>    
<form method="post" action="email.php?id=<?php echo $id?>">
FROM : <input name="email" id="email" type="text" value="" /><br />
TO : <input name="Toemail" id="email" type="text" /><br />
Subject: <input name="subject" id="subject" type="text" /><br />

Message:<br />
<textarea name="message" id="message" rows="15" cols="40"></textarea><br />

<input type="submit" value="Submit" />
</form>
</body>
</html>