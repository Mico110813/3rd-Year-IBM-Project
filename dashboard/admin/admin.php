<!DOCTYPE html>
<?php
				session_start();
				include('../../php/connect_to_mysql.php');
				include('../../php/functions.php');
				$db=createConnection();

				if(isset($_SESSION["userid"]) && $_SESSION["usertype"] === 1)
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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>



<body>
	<!-- include header here -->
	<?php include_once("header.php");?>

    <div id="wrapper">
					<!-- include sidebar here -->
					<!-- Sidebar -->
					<div id="sidebar-wrapper">
							<ul class="sidebar-nav nav-pills nav-stacked" id="menu">

								<li class="active">
										<a href="admin.php"><span class="fa-stack fa-lg pull-left"><i class="fa fa-dashboard fa-stack-1x "></i></span>Dashboard</a>
								</li>

								<li  >
										<a href="users.php"><span class="fa-stack fa-lg pull-left"><i class="fa fa-flag fa-stack-1x "></i></span>Users</a>
										<ul class="nav-pills nav-stacked" style="list-style-type:none;">
										 <li><a href="users.php"><span class="fa-stack fa-lg pull-left"><i class="fa fa-flag fa-stack-1x "></i></span>All</a></li>
										 <li ><a href="students.php"><span class="fa-stack fa-lg pull-left"><i class="fa fa-flag fa-stack-1x "></i></span>Students</a></li>
										 <li ><a href="managers.php"><span class="fa-stack fa-lg pull-left"><i class="fa fa-flag fa-stack-1x "></i></span>Managers</a></li>
										 <li><a href="lecturers.php"><span class="fa-stack fa-lg pull-left"><i class="fa fa-flag fa-stack-1x "></i></span>Lecturer</a></li>
								 </ul>
								</li>
								<li>
										<a href="courses.php"> <span class="fa-stack fa-lg pull-left"><i class="fa fa-cart-plus fa-stack-1x "></i></span>Courses</a>
								</li>
								<li>
										<a href="department.php"><span class="fa-stack fa-lg pull-left"><i class="fa fa-wrench fa-stack-1x "></i></span>Department</a>
								</li>

								<li>
										<a href="results.php"><span class="fa-stack fa-lg pull-left"><i class="fa fa-wrench fa-stack-1x "></i></span>Results</a>
								</li>


							</ul>
					</div><!-- /#sidebar-wrapper -->
        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid xyz">
							<div class="row dashColor ">
                <div class="col-lg-3 col-md-6 vcenter">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">

                                </div>
                            </div>
                        </div>
                        <a href="users.php">
                            <div class="panel-footer">
                                <span class="pull-left">Manage Users</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 vcenter">
									<div class="panel panel-primary">
											<div class="panel-heading">
													<div class="row">
															<div class="col-xs-3">
																	<i class="fa fa-comments fa-5x"></i>
															</div>
															<div class="col-xs-9 text-right">

															</div>
													</div>
											</div>
											<a href="courses.php">
													<div class="panel-footer">
															<span class="pull-left">Manage Courses</span>
															<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
															<div class="clearfix"></div>
													</div>
											</a>
									</div>
                </div>
                <div class="col-lg-3 col-md-6 vcenter">
									<div class="panel panel-primary">
											<div class="panel-heading">
													<div class="row">
															<div class="col-xs-3">
																	<i class="fa fa-comments fa-5x"></i>
															</div>
															<div class="col-xs-9 text-right">

															</div>
													</div>
											</div>
											<a href="departments.php">
													<div class="panel-footer">
															<span class="pull-left">Manage Departments</span>
															<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
															<div class="clearfix"></div>
													</div>
											</a>
									</div>
                </div>
                <div class="col-lg-3 col-md-6 vcenter">
									<div class="panel panel-primary">
											<div class="panel-heading">
													<div class="row">
															<div class="col-xs-3">
																	<i class="fa fa-comments fa-5x"></i>
															</div>
															<div class="col-xs-9 text-right">


															</div>
													</div>
											</div>
											<a href="results.php">
													<div class="panel-footer">
															<span class="pull-left">Manage Results</span>
															<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
															<div class="clearfix"></div>
													</div>
											</a>
									</div>
                </div>
            </div>
            <!-- /.row -->
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="../../assets/js/jquery.min.js"></script>
    <script src="../../assets/js/bootstrap.min.js"></script>
    <script src="../../assets/js/sidebar_menu.js"></script>
</body>


</html>
