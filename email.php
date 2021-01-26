<?php
ini_set( 'display_errors', 1 );
    error_reporting( E_ALL );
require_once ('process/dbh.php');
require_once ('process/session.php');
$id = (isset($_GET['id']) ? $_GET['id'] : '');
     $sql1 = "SELECT * FROM `employee` where id = '$id'";
     $result1 = mysqli_query($conn, $sql1);
     $employeen = mysqli_fetch_array($result1);
     $empfName = $employeen['firstName'];
     $emplName = $employeen['lastName'];
     $empemail = $employeen['email'];
     $empops = $employeen['ops'];
     $emppic = $employeen['pic'];
     $_SESSION['ops'] = $empops; 
     $empid = ($employeen['id']);
     $_SESSION['id'] = $empid;

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

        $headers = "From: ".$empfName." ".$emplName." <".$email."> \r\n";
        $headers .= "Reply-To: ".$toemail."\r\n";
        $headers .= "Return-Path: ".$toemail."\r\n";
        //Multiple CC can be added, if we need (comma separated);
        $headers .= 'Cc: ".$to.", ".$to." ' . "\r\n";
       //Multiple BCC, same as CC above;
        $headers .= 'Bcc: ".$to.", ".$to."' . "\r\n";
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
            echo '<script type="text/javascript">',
                'enquirySent()',
                '</script>';
                header("Location: index.php?id=$id");
                message($msg="Email Successfully Sent!", $msgtype="success");
            
        } else {
            echo '<script type="text/javascript">',
                'enquiryNotSent()',
                '</script>';
                header("Location: index.php?id=$id");
                message($msg="Email Sent Failed!", $msgtype="error");
        }
    

?>