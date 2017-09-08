<!DOCTYPE html>
<?php //Start the session and include database connection files test test test
	session_start();
	include('php/connect_to_mysql.php');
	include('php/functions.php');
	// Robbie - Testing Calendar
	include('php/default-calendar-functions.php');
	$db=createConnection(); //create connection to database here using functions.php


	$nouser = "";
	if (isset($_GET['errorid'])){
		$errortext = "Please login before trying to access the dashboard";
	}

?>
<?php
//Error Reporting
error_reporting(E_ALL);
ini_set('display_errors','1');
?>




<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<meta name="description" content="IBM Team Project">
	<meta name="author" content="">
	<link rel="icon" href="assets/site/favicon.ico">
	<title>IBM Training</title>
	<!-- Bootstrap core CSS -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="assets/css/font-awesome.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<!-- Custom Css - rather than alter bootstrap files -->
	<!-- Can add as many as we like just add the relation here -->
	<link rel="stylesheet" href="assets/css/custom.css">
	<link rel="stylesheet" href="assets/css/calendar-style.css">
	<!-- need to load jquery here for the calendar -->
	<script src="assets/js/jquery.min.js"></script>
</head>

<body>
	<div id="wrap"> <!-- wrapper starts, page content should be contained within this wrapper -->
	 <!-- Fixed navbar -->
	   <?php include_once("header.php");?>


			<div class="container">
				<!-- Main jumbotron for a primary marketing message or call to action -->
			 <div class="jumbotron">
				 <div class="row">
					 <div class="col-md-5">
						 <img src="assets/images/image1.JPG" class="img-responsive">
					 </div>
					 <div class="col-md-6">

						 <H2> Featured Course </H2>

						 <h3> Getting Started with IBM Bluemix</h3>
						 <p class="mastfont">This free, self-paced course will help you understand the fundamentals of cloud computing, Bluemix, services,
						 DevOps, containers, Cloud Foundry, and best practices for agile and test-driven development </p>
						 <a href="#" class="button">More Information</a>
					 </div>
				 </div>
			 </div>

			<p> The following list details all courses upcoming and are available to book by logging in to your dashboard.</p>

			<br>


			<div class="row">
				<div class="col-lg-12">
					 <h1 class="page-header" align="center">
						 IBM Training Courses 2016
					 </h1>
				 </div>
				<div class="col-md-8">
					<div class="panel panel-default">
					  <div class="panel-heading">
						<h3 class="panel-title"><strong>CK001G:</strong> Introduction to Bluemix</h3>
					  </div>
					  <div class="panel-body">
						<p>Duration : 1 Day</p>
						<p>Skill: <strong>Basic</strong></p>
						<p>This 1 day basic course introduces you to IBM Bluemix. The course covers relevant cloud concepts, and shows
						the architectural foundations of Cloud Foundry and Bluemix. It gets you started as a user of the platform and the course
						is designed as a starting point for enterprise developers with no previous programming knowledge</p>
					  </div>
					</div>

					<div class="panel panel-default">
					  <div class="panel-heading">
						<h3 class="panel-title"><strong>CV021G: </strong>Introduction to DB2 for zOS systems and Ops Personnel</h3>
					  </div>
					  <div class="panel-body">
						<p>Duration: 3 Days</p>
						<p>Skill: <strong>Basic</strong></p>
						<p>DB2 11 for z/OS beginning DBAs can develop fundemental skills through lectures and hands on exercises
						of DB2 objects, SQL, DB2 commands, logging and program preperation.</p>
					  </div>
					</div>

					<div class="panel panel-default">
					  <div class="panel-heading">
						<h3 class="panel-title"><strong>U5RU601G: </strong>Mastering Object-Oriented Analysis and Design with UML</h3>
					  </div>
					  <div class="panel-body">
						<p>Duration: 4 Days</p>
						<p>Skill: <strong>Intermediate</strong></p>
						<p>This course presents the concepts and techniques neccessary to effectively use system requirements captured
						in use cases to drive the development of a robust design model. In this intensive hands-on workshop you will learning
						to apply UML notation to OOAD concepts including objects, classes, components and relationships</p>
					  </div>
					</div>

					<div class="panel panel-default">
					  <div class="panel-heading">
						<h3 class="panel-title"><strong>VY329G: </strong>Developing Web Applications with Node.js</h3>
					  </div>
					  <div class="panel-body">
						<p>Duration: 0.5 Days</p>
						<p>Skill: <strong>Intermediate</strong></p>
						<p>This course will require you to utilise your own device. You download and configure the freely available software
						to complete the exercises. At the end of the course you will have a working runtime environment that you can continue to use.</p>
						<p>This course teaches developers how to develop, deploy and test IBM SDK for Node.js applications. This course explains how to
						write web server and web services with only a few lines of javascript. You will also learn how to quickly build web
						applications with the express framework</p>
					  </div>
					</div>
				</div>

				<div class="col-md-4">
					 <div class="panel-body">
						<img src="assets/images/cognition1.jpg" class="image_homepage">
						 <h5>Hi, Im Watson<H5>
						 <p>IBM Watson is a technology platform that uses natural language processing and machine learning to
						 reveal insights from large amounts of unstructured data</p>
						 <p> Find out more <a href="https://www.youtube.com/watch?v=2h90zluU-LE" target="blank"> here </a></p>
					</div>
				</div>
				<div class="col-md-4 col-md-push-1">
					<ul class="nav">
					  <li><strong>IBM Learning Resources</strong></li>
					  <li class="active"><a href="http://www-304.ibm.com/services/learning/ites.wss/zz/en?pageType=page&c=a0003096"><i class="fa fa-angle-double-right"></i> IBM Training and Certification</a></li>
					  <li><a href="http://www-304.ibm.com/services/learning/ites.wss/zz/en?pageType=page&c=a0002173"><i class="fa fa-angle-double-right"></i> IBM Technical Training Events</a></li>
					  <li><a href="http://www.ibm.com/developerworks/training/learning-circle/"><i class="fa fa-angle-double-right"></i> Developer Works</a></li>
					  <li><a href="http://www-304.ibm.com/services/learning/ites.wss/gb/en?pageType=page&c=a0004415"><i class="fa fa-angle-double-right"></i> Terms and Conditions</a></li>
					  <li><strong>IBM Technical Publications</strong></li>
					  <li><a href="http://www.redbooks.ibm.com/"><i class="fa fa-angle-double-right"></i> IBM Redbooks</a></li>
					  <li><a href="http://www-05.ibm.com/e-business/linkweb/publications/servlet/pbi.wss"><i class="fa fa-angle-double-right"></i> IBM Publication Center</a></li>
					  <li><a href="http://www.ibm.com/support/knowledgecenter/"><i class="fa fa-angle-double-right"></i> IBM Education Assistant</a></li>
					</ul>
				</div>
			</div><!--end of row-->

			<!-- Calendar -->
			<div id="calendar_div">
				<?php echo getCalender(); ?>
			</div>

			</div> <!-- /container -->

			<div id="push"></div>
			<?php include_once("footer.php");?>
	</div> <!--end wrapper -->

	<!-- Modal for error messages! -->
	<div id="nologon" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <p><?php echo $errortext ?></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Okay</button>
      </div>
    </div>

  </div>
</div>


		<!-- Bootstrap core JavaScript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>

		<script type="text/javascript">
			var url = window.location.href;
			if(url.indexOf('?errorid=nologon') != -1 ) {
			    $('#nologon').modal('show');
			}
		</script>

		<script type="text/javascript">

			$(document).ready(function(){

		 	console.log('hello');
			var url = window.location.href;
			if(url.indexOf('errorid=111') != -1){
				$('#errormsg').text('No matching username found in database');

				$('#dropdown-li').addClass('open');

			}
			});




		</script>


</body>
</html>
