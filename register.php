<!DOCTYPE html>
<html>
<?php
				include('scripts/connect_to_mysql.php');


?>
<?php
//Error Reporting
error_reporting(E_ALL);
ini_set('display_errors','1');
?>
<head>
	<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<meta name="description" content="IBM Team Project">
		<meta name="author" content="">
		<link rel="icon" href="assets/site/favicon.ico">
	<title>IBMTeam</title>
	<!-- Bootstrap core CSS -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">

	<link rel="stylesheet" href="assets/css/font-awesome.min.css">

	<link rel="stylesheet" href="assets/css/user.css">
	 <link rel="stylesheet" href="assets/css/custom.css">


</head>
<body class="colorbackground">

    <!-- Part 1: Wrap all page content here -->
    <div id="wrap">
	<header>

	</header>
	<div class="card card-container">
            <h4 align="center"> Registration Details </h4>
            <form class="form-signin"   id="registeruser" name="registeruser" method="post" action="register_complete.php">
                <input class="form-control"  required="" placeholder="Username" autofocus="" type="text" name="username" id="username" size="10">
								<input class="form-control"  required="" placeholder="First Name" autofocus="" type="text" name="firstname" id="firstname" size="10">
								<input class="form-control"  required="" placeholder="Second Name" autofocus="" type="text" name="surname" id="surname" size="10">
				        <input class="form-control" type="password" required="" placeholder="Password" type="password" name="userpass" id="userpass" size="10">
								<input class="form-control" type="password" required="" placeholder="Password" type="password" name="secondpass" id="secondpass" size="10">
								<input class="form-control"  required="" placeholder="Email address" autofocus="" type="text" name="emailadd" id="emailadd" size="10">
								<input class="form-control"  placeholder="DOB" autofocus="" type="date" name="dob" id="dob">
								<input class="form-control" required="" placeholder="Contact Number" autofocus="" type='tel' name="phoneno" id="phoneno"    title='Phone Number (Format: +99(99)9999-9999)' >

                <div class="checkbox">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox">Sign Up For Newsletter</label>
                    </div>
                </div>
				<div class="checkbox">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="tnc" id="tnc">Accepts Our <em>Terms & Conditions</em></label>
                    </div>
                </div>
                <button class="btn btn-primary btn-block btn-lg btn-signin btn-colour-login" type="submit">Sign in</button>
            </form><a href="#" class="forgot-password">Forgot your password?</a>

	</div>





      <div id="push"></div>
    </div>


</body>














    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/functions.js"></script>
	<script src="assets/js/register.js"></script>

</body>

</html>
