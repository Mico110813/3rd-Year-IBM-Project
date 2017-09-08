<!DOCTYPE html>
<?php
				session_start();
				include('../php/connect_to_mysql.php');
				include('../php/functions.php');
				$db=createConnection();

				if(isset($_SESSION["userid"]) )
				{
					// Not for use in production, echos out all current session data.
					// echo '<pre>';
					// var_dump($_SESSION);
					// echo '</pre>';
					// User is logged in so pull user information from database

					$userid = $_SESSION['userid'];
					$sql="select username,firstname,surname,emailadd,usertype from users where userid=?";
					$stmt=$db->prepare($sql);
					$stmt->bind_param("i",$userid);
					$stmt->execute();
					$stmt->store_result();
					$stmt->bind_result($userresult,$firstname,$surname,$emailresult,$usertype);

					while($row=$stmt->fetch()) {

						if($usertype == 1){
							$usertype = "Admin";
						}else if($usertype == 2){
							$usertype = "User";
						}else if($usertype == 3){
							$usertype = "Student";
						}else if($usertype == 4){
							$usertype = "Staff";
						}else{
							$usertype = "Could not find usertype";
						}
						$array=array($userresult,$firstname,$surname,$emailresult,$userid,$usertype);

					}
				}
				else {
				header("location: ../index.php?errorid=nologon");
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

		<link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/font-awesome-4.3.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom IBM File -->
    <link href="assets/css/header.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>



<body>

	<nav class="navbar navbar-inverse no-margin">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php"></a>
					<button class="navbar-toggle collapse in" data-toggle="collapse" id="menu-toggle-2"> <span class="glyphicon glyphicon-th-large" aria-hidden="true"></span></button>

        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="index.php">Dashboard</a></li>
            <li><a href="account.php">Account</a></li>
            <li><a href="#">Help</a></li>
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>
        </div>

      </div>

    </nav>


    <div id="wrapper">
			<div class="container">
				<div class="row">
					<div class="col-md-5  toppad  pull-right col-md-offset-3 ">

					</div>
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
						<div class="panel panel-info">
							<div class="panel-heading">
								<h3 class="panel-title">Basic Account Information</h3>
							</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="http://babyinfoforyou.com/wp-content/uploads/2014/10/avatar-300x300.png" class="img-circle img-responsive"> </div>


								<div class=" col-md-9 col-lg-9 ">
									<table class="table table-user-information">
										<tbody>
											<tr>
												<td>Username: </td>
												<td><?php echo $array[0]; ?></td>
											</tr>
											<tr>
												<td>First Name: </td>
												<td><?php echo $array[1]; ?></td>
											</tr>
											<tr>
												<td>Second Name: </td>
												<td><?php echo $array[2]; ?></td>
											</tr>
											<tr>
												<tr>
													<td>Email Address: </td>
													<td><?php echo $array[3]; ?></td>
												</tr>
												<tr>
												<td>Department: </td>
												<td><i>todo</i></td>
											</tr>
											<tr>
												<td>Account Type: </td>
												<td><?php echo $array[5] ?></td>
											</tr>

										</tbody>
									</table>

									<!-- <a href="#" class="btn btn-primary">My Sales Performance</a>
									<a href="#" class="btn btn-primary">Team Sales Performance</a> -->
							</div>
						</div>
					</div>
					<!-- <div class="panel-footer">
						<a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
						<span class="pull-right">
							<a href="edit.html" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
							<a data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
						</span>
					</div> -->
				</div>
			</div>
		</div>
	</div>


    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>

</body>


</html>
