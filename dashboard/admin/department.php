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
		<link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>

    <link href="../../assets/css/simple-sidebar.css" rel="stylesheet">
    <link href="../../assets/font-awesome-4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- Custom IBM File -->
    <link href="../assets/css/header.css" rel="stylesheet" type="text/css">
		<script type="text/javascript" src="DataTables/datatables.min.js"></script>

    <script>


    $(document).ready(function() {
			var table1 = 	$('#details').DataTable( {

							"ajax": {
								"url": "scripts/get_department.php",
								"dataSrc": "data"
							},
							"columns": [
									{ "data": "username" },
									{ "data": "firstname" },
									{ "data": "surname" },
									{ "data": "usertype" },
									{ "data": "userid" },
									{ "data": "deptid" },
									{ "data": "deptname" }
							]


					} );

      var  editor = new $.fn.dataTable.Editor( {
            ajax: "scripts/department.php",
            table: "#userstable",
            fields: [

                {
                  label: "Department",
                  name: "dept_name"
                },

            ]
        } );

        $('#userstable').DataTable( {
            dom: "Bfrtip",
            ajax: "scripts/department.php",
            columns: [
                { data: "dept_id" },
                { data: "dept_name" }
            ],
            select: true,
            buttons: [
                { extend: "create", editor: editor },
                { extend: "edit",   editor: editor },
                { extend: "remove", editor: editor }
            ]
        } );
				//End datatable init



				$('#userstable').on( 'click', 'tr', function () {
				
					var $row = $(this).closest("tr");
					$tds = $row.find("td:nth-child(1)");

					var $text;
					var text1 = $.each($tds, function() {
						text  = $(this).text();
						console.log(text);
						console.log(text1);

						table1.columns( 5 ).search( text ).draw();
					});
				});


    } );

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
	<?php include_once("header.php");?>

    <div id="wrapper">
					<!-- include sidebar here -->
					<!-- Sidebar -->
					<div id="sidebar-wrapper">
					    <ul class="sidebar-nav nav-pills nav-stacked" id="menu">

								<li >
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
								<li >
										<a href="courses.php"> <span class="fa-stack fa-lg pull-left"><i class="fa fa-cart-plus fa-stack-1x "></i></span>Courses</a>
								</li>
								<li class="active">
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
                <div class="row">
                    <div class="col-lg-12">
                      <h1 class="text-center">Manage Courses</h1>

                      <table id="userstable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Department ID</th>
																<th>Department Name</th>

                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
															<th>Department ID</th>
															<th>Department Name</th>

                            </tr>
                        </tfoot>
                    </table>
                    </div>
										<div class-"col-lg-12">
											<table id="details" class="table table-striped table-bordered" cellspacing="0" width="100%">
												<thead>
														<tr>
																<th>Username</th>
																<th>First Name</th>
																<th>Surname</th>
																<th>User Type</th>
																<th>User ID</th>
																<th>Dept ID</th>
																<th>Department Name</th>
														</tr>
												</thead>
												<tfoot>
														<tr>
															<th>Username</th>
															<th>First Name</th>
															<th>Surname</th>
															<th>User Type</th>
															<th>User ID</th>
															<th>Dept ID</th>
															<th>Department Name</th>
														</tr>
												</tfoot>
										</table>
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
