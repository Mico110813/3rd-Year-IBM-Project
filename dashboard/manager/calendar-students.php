<!DOCTYPE html>
<?php
				session_start();
				include('../../php/connect_to_mysql.php');
				include('../../php/functions.php');
				$db=createConnection();

				if(isset($_SESSION["userid"]) && $_SESSION["usertype"] === 4)
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
    <link rel="stylesheet" href="../../assets/css/calendar-style.css">
    <!-- need to load jquery here for the calendar -->
    <script src="../../assets/js/jquery.min.js"></script>
</head>



<body>
	<!-- include header here -->
	<?php include_once("../header.php");?>

    <div id="wrapper">
					<!-- include sidebar here -->
					<!-- Sidebar -->
          <div id="sidebar-wrapper">
              <ul class="sidebar-nav nav-pills nav-stacked" id="menu">
                <li >
                    <a href="manager.php"><span class="fa-stack fa-lg pull-left"><i class="fa fa-dashboard fa-stack-1x "></i></span>Dashboard</a>
                </li>
                <li class="active">
                    <a href="users.php"> <span class="fa-stack fa-lg pull-left"><i class="fa fa-cart-plus fa-stack-1x "></i></span>Manage Applications</a>
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
                    <div class="col-lg-12 col-offset-6">
                      <h1>Calendar</h1>

                      <!-- Calendar -->
                        <div id="calendar_div">
                            <?php
                            include('../../php/manager-calendar-functions.php');
                            echo getCalender();
                            ?>
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
