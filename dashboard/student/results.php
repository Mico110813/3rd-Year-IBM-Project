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
					$sql="select username,firstname,surname,emailadd,dept_id from users where userid=?";
					$stmt=$db->prepare($sql);
					$stmt->bind_param("i",$userid);
					$stmt->execute();
					$stmt->store_result();
					$stmt->bind_result($userresult,$firstname,$surname,$emailresult,$dept_id);

					while($row=$stmt->fetch()) {
						$array=array($userresult,$firstname,$surname,$emailresult,$userid,$dept_id);
            $_SESSION["dept_id"] = $dept_id;
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
		<link rel="stylesheet" type="text/css" href="../admin/DataTables/datatables.min.css"/>

    <link href="../../assets/css/simple-sidebar.css" rel="stylesheet">
    <link href="../../assets/font-awesome-4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- Custom IBM File -->
    <link href="../assets/css/header.css" rel="stylesheet" type="text/css">
		<script type="text/javascript" src="../admin/DataTables/datatables.min.js"></script>

    <script>


    $(document).ready(function() {
				$('#content').hide();
      var table = $('#userstable').DataTable( {
						"ajax": {
						 "url": "scripts/getResults.php"
						 },
            columns: [
                {data: "course_name"},
                { data: "result" },
                { data: "pcent" },
                { data: "date" },
                { data: "result_id", "visible": false }
            ],
            select: true
        }  ); //End DataTable init
				$('#userstable tbody').on( 'click', 'tr', function () {
					var Id = table.row( this ).data().result_id;
					console.log(Id);
					$.ajax({ //Make an ajax call to the database an retrieve a JSON object container all data of course table
						type: "POST",
						url: "scripts/displayDetails.php",
						data: {user : Id},
						dataType : 'json',
						cache: false,
						success: function(result) {
									$("#content").show();
									console.log(result.data[0]);
									$("#course_name").html(result.data[0].title);
								  $("#student_name").html(result.data[0].name);
									$("#result").html(result.data[0].result);
									$("#result_pcent").html(result.data[0].pcent);
									$("#result_comment").html(result.data[0].comment);
									$("#result_date").html(result.data[0].date);
								}
							});
				});
    } ); //End document.ready()
    </script>
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
                                <li>
                                        <a href="student.php"><span class="fa-stack fa-lg pull-left"><i class="fa fa-dashboard fa-stack-1x "></i></span>Dashboard</a>
                                </li>
                                <li>
                                        <a href="courses.php"> <span class="fa-stack fa-lg pull-left"><i class="fa fa-cart-plus fa-stack-1x "></i></span>View Courses</a>
                                </li>
                                <li class="active">
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
                <div class="row">
                    <div class="col-lg-6 col-offset-6">
                      <h1>Manage Users</h1>

                      <table id="userstable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
															<th>Course Name</th>
															<th>Result</th>
															<th>Percentage</th>
															<th>Date</th>
																<th>Date</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
															<th>Course Name</th>
															<th>Result</th>
															<th>Percentage</th>
															<th>Date</th>
																<th>Date</th>
                            </tr>
                        </tfoot>
                    </table>
                    </div>
										<div class="col-lg-6" >
											<div class="well" id="content">
										<h1 class="text-center" id="testtext">Details</h1>
											<table class="table table-bordered">
												<thead>
												</thead>
												<tbody>
													<tr>
													<td>Course Title:</td>
													<td id="course_name"></td>
													</tr>
													<tr>
													<td>Name</td>
													<td id="student_name"></td>
													</tr>
													<tr>
													<td>Result</td>
													<td id="result"></td>
													</tr>
													<tr>
													<td>Result Percentage</td>
													<td id="result_pcent"></td>
													</tr>
													<tr>
													<td>Comment</td>
													<td id="result_comment"></td>
													</tr>
													<tr>
													<td>Date</td>
													<td id="result_date"></td>
													</tr>

												</tbody>


											</table>
										</div>
										</div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->

    <script src="../../assets/js/sidebar_menu.js"></script>
</body>


</html>
