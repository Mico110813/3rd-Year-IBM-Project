<!DOCTYPE html>
<?php
				session_start();
				include('../../php/connect_to_mysql.php');
				include('../../php/functions.php');
				$db=createConnection();

				if(isset($_SESSION["userid"]))
				{
					// Not for use in production, echos out all current session data.
					// echo '<pre>';
					// var_dump($_SESSION);
					// echo '</pre>';
					// User is logged in so pull user information from database

					$userid = $_SESSION['userid'];
					$sql="select username,firstname,surname,emailadd from users where userid=?";
					$stmt=$db->prepare($sql);
					$stmt->bind_param("i",$userid);
					$stmt->execute();
					$stmt->store_result();
					$stmt->bind_result($userresult,$firstname,$surname,$emailresult);
					while($row=$stmt->fetch()) {
						$array=array($userresult,$firstname,$surname,$emailresult,$userid);
					}
				}
				else {
				header("location: ../../index.php?errorid=nologon");
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
    <meta name="description" content="">
    <meta name="author" content="">

    <title>IBM Training- Dashboard</title>

		<link href="../../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../assets/css/simple-sidebar.css" rel="stylesheet">
    <link href="../../assets/font-awesome-4.3.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom IBM File -->
    <link href="../assets/css/header.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
	<!-- include header here -->
	<?php include_once("../header.php");?>

    <div id="wrapper">
					<!-- include sidebar here -->
					<!-- Sidebar -->
					<div id="sidebar-wrapper">
							<ul class="sidebar-nav nav-pills nav-stacked" id="menu">

								<li class="active">
										<a href="index.php"><span class="fa-stack fa-lg pull-left"><i class="fa fa-dashboard fa-stack-1x "></i></span>Dashboard</a>
								</li>
								<li>
										<a href="courses/courses.php"> <span class="fa-stack fa-lg pull-left"><i class="fa fa-cart-plus fa-stack-1x "></i></span>Course Signup</a>
								</li>
							</ul>
					</div><!-- /#sidebar-wrapper -->
        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid xyz vcenter">
              <!-- star page content -->
              <!-- Page Heading -->
              <div class="row">
                  <div class="col-lg-6 well">
                    <h1 class="text-center" id="testtext">Course Signup</h1>
                    <form class="form-horizontal" id="booking1" name="booking1" method="post" action="booking2.php">
                      <div class="col-xs-12">
                        <div class="form-group">
                        <div class="col-xs-12">
                        <label>Course</label>
                          <select class="form-control" id="dropdown_course" name="dropdown_course">
                          <option value="nothing">Select a Course </option>
                          </select>
                        </div>
                        </div>

                      </div>
                    </form>
                  </div>
									<div class="col-lg-6" >
										<div class="well" id="content">
									<h1 class="text-center" id="testtext">Details</h1>
										<table class="table table-bordered">
											<thead>
											</thead>
											<tbody>
												<tr>
												<td>Course ID:</td>
												<td id="render_username"></td>
												</tr>
												<tr>
												<td>Course Title</td>
												<td id="render_firstname"></td>
												</tr>
												<tr>
												<td>Description</td>
												<td id="render_surname"></td>
												</tr>

											</tbody>
											 <button class="btn btn-primary btn-block btn-lg btn-signin" id="details" >Sign Up</button>

										</table>
									</div>
									</div>
              </div>
              <!-- /.row -->
              <!-- end page content -->
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
		<script src="../../assets/js/jquery.min.js"></script>
		<script src="../../assets/js/bootstrap.min.js"></script>
		<script src="../../assets/js/sidebar_menu.js"></script>
		<script type="text/javascript" language="javascript" class="init">
		  $(document).ready(function() {
				var val;
				$('#content').hide(); //hide the details panel so user doesn't see it on page load
				var courseData; //emtpy object
		  	$.ajax({ //Make an ajax call to the database an retriece a JSON object container all data of course table
		      type: "GET",
		      url: "getcourses.php",
		      dataType : 'json',
		      cache: false,
		      success: function(result) {
								courseData = result; //store JSON data in an object for later use in the details section, means we dont have to make multiple database calls

							  $.each(result, function () {
		                $("#dropdown_course").append($("<option> </option>").val(this['courseid']).html(this['title'])); //Fill the dropdown with the JSON Data
		            });
		      }
		    });

				$('#dropdown_course').change(//Keep track of each time a user selects a new value from the drop down
			    function() {
			        val = $('#dropdown_course option:selected').val();
							val = val-1;

							$("#content").show();
							if(val === "nothing"){ //If user chooses default option again, hide the details panel
								$('#content').hide();
							}else{ //If they choose an actual option then render out the details
								$('#render_username').html(courseData[val].courseid);
								$('#render_firstname').html(courseData[val].title);
								$('#render_surname').html(courseData[val].desc);
							}

			    }
				);
				$("#details").click( function()
					 {
							var dataString = 'course='+ val;
						 $.ajax({
								 url: 'book_course.php',
								 type: 'GET',
								 data: {course: courseData[val].courseid}, // An object with the key 'submit' and value 'true;
								 success: function (result) {

								 }
						 });
				}); //end of details function

		  });
		</script>
</body>


</html>
