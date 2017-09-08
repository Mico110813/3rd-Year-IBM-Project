<!DOCTYPE html>
<?php //Start the session and include database connection files test test test
	session_start();
	include('php/connect_to_mysql.php');
	include('php/functions.php');
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
			 <div class="row">
				 <div class="col-lg-12">
					 <h1 class="page-header" align="center">
						 Welcome to IBM Training
					 </h1>
				 </div>
				 <div class="col-md-4">
					 <div class="panel panel-default">
						 <div class="panel-heading">
							 <h4>IBM Training</h4>
						 </div>
						 <div class="panel-body">
							 <p>There's little room for tools and skills of the past when it comes to future technologies. We regularly upgrade software
							 and hardware tools in the workplace, and your skill set requires the same attention and upkeep</p>
							 <p> IBM Training has evolved to better relate to your personal goals and the needs of the business. IBM authorized content -
							 both off the shelf and custom courses - delivered by IBM-selected Global Training Providers with an extensive network of locations
							 and innovative delivery methods, will change how and where you learn.</p>
							 <p>With high-quality IBM content and the reach and experience of our Global Training Providers, develop a strong skills portfolio to
							 grow your career and stay competitive in an ever-changing technical marketplace</p>
							 <a href="#" class="btn btn-default">Learn More</a>
						 </div>
					 </div>
				 </div>
				 <div class="col-md-4">
					 <div class="panel panel-default">
						 <div class="panel-heading">
							 <h4>IBM Certification</h4>
						 </div>
						 <div class="panel-body">
							 <img src="assets/images/reorg.jpg" class="image_homepage">
							 <p>The IBM Certification Program will assist in laying the groundwork for your personal journey to become a world-class resource to your
							 customers, colleagues, and company, by providing you with the appropriate skills and accreditation needed to succeed. </p>
							 <a href="#" class="btn btn-default">Learn More</a>
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

			 </div> <!-- /.row -->
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
