<?php
require_once ('process/dbh.php');
require_once ('process/session.php');

?>

<!DOCTYPE html>
<html>
<head>
	<title>Succor | Employee Login</title>
	<link rel="stylesheet" type="text/css" href="stylelogin.css">
	<link rel="icon" type="image/png" sizes="16x16" href="assets/images/users/logo.png">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
	    .letter{
	        letter-spacing: 15px;
	    }
	</style>
</head>
<body>
	<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-center text-info mb-5 letter"><strong>EMPLOYEE LOGIN</strong></h2>
            <hr class="mb-5">
            <ul class="nav nav-fill">
                <a class="btn waves-effect waves-light btn-info text-white font-weight-bold hidden-md-down nav-item px-2 mx-2" href="admin/html/alogin.php"> Administrator</a>
                <a class="btn waves-effect waves-light btn-info text-white font-weight-bold hidden-md-down nav-item px-2 mx-2" href="elogin.php"> Employee Login</a>
                <a class="btn waves-effect waves-light btn-info text-white font-weight-bold hidden-md-down nav-item px-2 mx-2" href=""> Contact</a>
            </ul>
            <hr class="mb-5">

            <p><?php echo check_message(); ?></p>
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <span class="anchor" id="formLogin"></span>

                    <!-- form card login with validation feedback -->
                    <div class="card card-outline-secondary">
                        <div class="card-header">
                            <h3 class="mb-0">Employee Login</h3>
                        </div>
                        <div class="card-body">
                            <form class="form" role="form" action="process/eprocess.php" autocomplete="off" id="loginForm" novalidate="" method="POST">
                                <div class="form-group">
                                    <label for="uname1">Username</label>
                                    <input type="text" class="form-control" name="mailuid" id="uname1" required="">
                                    <div class="invalid-feedback">Please enter your username or email</div>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="pwd" class="form-control" id="pwd1" required="" autocomplete="new-password">
                                    <div class="invalid-feedback">Please enter a password</div>
                                </div>
                                <div class="form-check small">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input"> <span>Remember me on this computer</span>
                                    </label>
                                </div>
                                <button type="submit" name="submit" class="btn btn-info btn-lg float-right px-4" id="btnLogin">Login</button>
                            </form>
                        </div>
                        <!--/card-body-->
                    </div>
                    <!-- /form card login -->

                </div>


                </div>

            </div>
            <!--/row-->

        <br><br><br><br>

        </div>
        <!--/col-->
    </div>
    <!--/row-->
    <hr>
    <p class="text-center"><br>
        <a class="small text-info d-inline-block" href="http://succortechnologies.com/">@2020 SuccorTechnologies all rights reserved</a>
    </p>
    
</div>
<!--/container-->

			
			
</body>
</html>