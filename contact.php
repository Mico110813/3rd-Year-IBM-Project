<!DOCTYPE html>
	<?php //Start the session and include database connection files test test test
		session_start();
		include('php/connect_to_mysql.php');
		include('php/functions.php');
		$db=createConnection(); //create connection to database here using functions.php


		$nouser = "";
		if (isset($_GET['errorid']))
			{
			$errortext = "Please login before trying to access the dashboard";
			}
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
		<meta name="author" content="Rebecca Smith">
		<link rel="icon" href="assets/site/favicon.ico">
		<title>IBM Training - Contact</title>
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

			<?php
				include_once("header.php");
			?>
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
							<p class="mastfont">This free, self-paced course will help you understand the fundamentals of cloud computing, Bluemix, services, DevOps, containers, Cloud Foundry, and best practices for agile and test-driven development </p>
							<a href="#" class="button">More Information</a>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<h1 class="page-header">
							Contact Us
						</h1>
					</div>
					<div class="col-md-4">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4>Phone Numbers</h4>
							</div>
							<div class="panel-body">
								<p>Please note: calls may be recorded for coaching purposes.</p>
								</br>
								<p>Shopping assistance</p>
								<a href="tel:+448001691458">+44 (0) 800 169 1458</a>
								</br>
								<p>Mid sized companies</p>
								<a href="tel:+448700102516">+44 (0) 8700 102 516</a>
								</br>
								<p>IBM Easy Access</p>
								<p>For large enterprise, government and education customers.</p>
								<a href="tel:+448705440055">+44 (0) 8705 440055</a>
								</br>
								<p>General enquiries</p>
								<a href="tel:+448705426426">+44 (0) 870 542 6426</a>
								</br>
								<p>IBM Press Office</p>
								<a href="tel:+442070218911">+44 (0) 20 7021 8911</a>
								</br>
								<p>Mailing address:</p>
								<p>UK Head Office</p>
								<p>IBM United Kingdom Limited</p>
								<p>PO Box 41, North Harbour</p>
								<p>Portsmouth</p>
								<p>Hampshire, PO6 3AU</p>
								<p>Tel: <a href="tel:+442392561000">+44 (0) 23 92 56 1000</a></p>
							</div>
						</div>
					</div>

					<div class="col-md-4">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4>Support</h4>
							</div>
							<div class="panel-body">
								<p>E-Mail</p>
								<a href="http://www-05.ibm.com/webutils/sendmail.pl?form_cfg=/uk/uk_form--contact">General 'non-technical' questions, concerns, or Web-site feedback.</a>
								</br>
								<p>For technical questions, please see our "Support directories" section.</p>
								</br>
								<p>Customer support</p>
								<a href="http://www-05.ibm.com/support/operations/uk/en/overview.html">Contracts, order status, delivery, inventory, invoices and payments.</a>
								</br>
								<p>Technical support directory</p>
								<a href="http://www.ibm.com/planetwide/uk/#techsup">Technical support phone numbers by product.</a>
								</br>
								<p>IBM Business Partner support</p>
								<a href="https://www-356.ibm.com/partnerworld/wps/servlet/ContentHandler/pw_com_ctp_index">General BP support and inquiries.</a>
							</div>
						</div>
					</div>

					<div class="col-md-4">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4>Other contact information</h4>
							</div>
							<div class="panel-body">
								<p>Directory of worldwide contacts</p>
								<a href="http://www.ibm.com/planetwide/">Country-based contacts for technical support, sales or other assistance.</a>
								</br>
								<p>Employee directory</p>
								<a href="http://www.ibm.com/contact/employees/uk/en/">Enter the name of an IBM employee to find his or her e-mail address and telephone number.</a>
								</br>

								<p>Shop &Amp; Buy</p>


								<a href="http://www.ibm.com/connect/ibm/uk/en/?lnk=ftsb">Connect with a sales rep.</a>
								</br>
								<p>Self-help resources</p>
								<a href="http://www-05.ibm.com/uk/locations/">UK locations</a>
							</div>
						</div>
					</div> <!-- /.row -->
				</div> <!-- /container -->
				<div id="push"></div>
			</div>
				<?php
					include_once("footer.php");
				?>
			</div>
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
			if(url.indexOf('?errorid=nologon') != -1 )
				{
				$('#nologon').modal('show');
				}
		</script>

		<script type="text/javascript">
			$(document).ready(function()
				{
				var url = window.location.href;
				if(url.indexOf('errorid=111') != -1)
					{
					$('#errormsg').text('No matching username found in database');

					$('#dropdown-li').addClass('open');

					}
				});
		</script>
	</body>

</html>
