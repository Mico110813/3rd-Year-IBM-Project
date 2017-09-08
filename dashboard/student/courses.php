<!DOCTYPE html>
<?php
				session_start();
				include('../../php/connect_to_mysql.php');
				include('../../php/functions.php');
				$db=createConnection();

				if(isset($_SESSION["userid"]) && $_SESSION["usertype"] === 3)
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

    <title>IBM Training- Admin Panel</title>

		<link href="../../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../assets/css/simple-sidebar.css" rel="stylesheet">
    <link href="../../assets/font-awesome-4.3.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom IBM File -->
    <link href="../assets/css/header.css" rel="stylesheet" type="text/css">
		<!-- jQuery -->
		<script src="../../assets/js/jquery.min.js"></script>
		<script src="../../assets/js/bootstrap.min.js"></script>
		<script src="../../assets/js/sidebar_menu.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
		<script type="text/javascript" language="javascript" class="init">

		$(document).ready(function() {

			$.ajax({ //Make an ajax call to the database an retriece a JSON object container all data of course table
				type: "GET",
				url: "scripts/getCourses.php",
				dataType : 'json',
				cache: false,
				success: function(result) {

							$.each(result.data, function (index, value) {
								console.log(value.course_name);
									$("#courseList")
									.append(
										$("<div>").addClass("panel panel-default")
										.append(
												$("<div>").addClass("panel-heading")
												.append(
														$("<h2>" + value.course_name + "</h1>")
												)
										)
										.append(
												$("<div>" + value.desc + "</div>").addClass("panel-body")
										)
									)
							});
				}
			});



		});
		</script>
</head>



<body>
	<!-- include header here -->
	<?php include_once("../header.php");?>

    <div id="wrapper">
					<!-- include sidebar here -->
                    <!-- Sidebar -->
                    <div id="sidebar-wrapper">
                            <ul class="sidebar-nav nav-pills nav-stacked" id="menu">
                                <li>
                                        <a href="student.php"><span class="fa-stack fa-lg pull-left"><i class="fa fa-dashboard fa-stack-1x "></i></span>Dashboard</a>
                                </li>
                                <li class="active">
                                        <a href="courses.php"> <span class="fa-stack fa-lg pull-left"><i class="fa fa-cart-plus fa-stack-1x "></i></span>View Courses</a>
                                </li>
                                <li>
                                        <a href="results.php"> <span class="fa-stack fa-lg pull-left"><i class="fa fa-cart-plus fa-stack-1x "></i></span>View Results</a>
                                </li>
                                <li>
                                    <a href="calendar.php"> <span class="fa-stack fa-lg pull-left"><i class="fa fa-calendar fa-stack-1x "></i></span>Courses Calendar</a>
                                </li>
                                <li>
                                    <a href="calendar-students.php"> <span class="fa-stack fa-lg pull-left"><i class="fa fa-calendar fa-stack-1x "></i></span>Students Calendar</a>
                                </li>
                            </ul>
                    </div><!-- /#sidebar-wrapper -->
        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid xyz">
				        - <?php //echo courselist ?>
								<div id="courseList">

								</div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

</body>


</html>
