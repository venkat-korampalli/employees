<?php
session_start();
error_reporting(-1);
ini_set('display_errors', 'On');
set_error_handler("var_dump");
require_once ('process/dbh.php');
require_once ('process/session.php');
$id = (isset($_GET['id']) ? $_GET['id'] : '');
     $sql1 = "SELECT * FROM `alogin` where userid = '$id'";
     $result1 = mysqli_query($conn, $sql1);
     $employeen = mysqli_fetch_array($result1);
     $empname = $employeen['name'];
     $empemail = $employeen['email'];
     $empops = $employeen['ops'];
     $emppic = $employeen['pic'];
     $_SESSION['ops'] = $empops; 
     $empid = ($employeen['userid']);
     $_SESSION['userid'] = $empid;

$email = $_REQUEST['email'];
$toemail = $_REQUEST['Toemail'];
$subject = $_REQUEST['subject'];
$message = $_REQUEST['message'];

    
    $from = "$email";
    $to = "$toemail";
    $subject = "$subject";
    $message = "$message";


    // Form details (sanitized)
        

        // Mail headers and details
        $email_from = '$email';
        $email_body = "You have received a new message from the user $email.\nHere is the message:\n\n".$message;

        $headers = "From: ".$empname." <".$email."> \r\n";
        $headers .= "Reply-To: ".$toemail."\r\n";
        $headers .= "Return-Path: ".$toemail."\r\n";
        //Multiple CC can be added, if we need (comma separated);
        $headers .= 'Cc: ".$toemail.", ".$toemail." ' . "\r\n";
       //Multiple BCC, same as CC above;
        $headers .= 'Bcc: ".$toemail.", ".$toemail."' . "\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
        $headers .= "X-Priority: 3\r\n";
        $headers .= "X-Mailer: PHP". phpversion() ."\r\n" ;

        $error = false;

        // Some more input validation/sanitizing
        if (!filter_var($email, FILTER_VALIDATE_EMAIL) && $email!="") {
            $error = true;
        }
        if (!filter_var($toemail, FILTER_VALIDATE_EMAIL) && $toemail!="") {
            $error = true;
        }


        // Sending the email
        if ($error == false) {
            $to = "$toemail";
            $subject = "$subject";
            mail($to, $subject, $email_body, $headers);

            // Calling the email sent / not sent alerts
            echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Email Successfully Sent!')
            window.location.href='javascript:history.go(-1)';
            </SCRIPT>");
                header("Location: index.php?id=$id");
                message($msg="Email Successfully Sent!", $msgtype="info");
            
        } else {
            echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Failed To Send Email!')
            window.location.href='javascript:history.go(-1)';
            </SCRIPT>");
                header("Location: index.php?id=$id");
                message($msg="Email Sent Failed!", $msgtype="error");
        }
    

?>