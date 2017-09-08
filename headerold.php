<?php
	$loggedintext = "";
	if(isset($_SESSION["userid"])){ //changes text on log in button to logged in if true

	$loggedintext = "Logged In";

	} else {

	$loggedintext = "Login";

	}

	?>
<?php
$urlloggedin = "";
if(isset($_SESSION['userid'])){

	$urlloggedin = "<li class='active'><a href='php/logout.php'>Logout </a></li><li><a href='account.php'>Account </a></li>";
}else{

	$urlloggedin = "<li><a href='login.php'>Login </a></li><li><a href='register.php'>Register </a></li>";
//your page stuff
}


?>

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"></a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php">Home</a></li>
        <li><a href="courses.php">Courses</a></li>
        <li><a href="contact.php">Contact</a></li>
        <li><a href="dashboard/index.php">Dashboard</a></li>
				<li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"><?php echo $loggedintext ?><span class="caret"></span></a>
          <ul class="dropdown-menu">
          <!--<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet"> -->
            <div id="login-overlay" class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                  <h4 class="modal-title" id="myModalLabel">Login to ibmresults.com</h4>
                </div>
                <div class="modal-body">

                  <div class="row">
                    <div class="col-xs-6">
                      <div class="well">
                        <form id="loginForm" method="POST" action="php/processlogin.php" novalidate="novalidate">
                          <div class="form-group">
                            <label for="username" class="control-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" value="" required="" title="Please enter you username" placeholder="example@gmail.com">
                            <span class="help-block"></span>
                          </div>
                          <div class="form-group">
                            <label for="password" class="control-label">Password</label>
                            <input type="password" class="form-control" id="userpass" name="userpass" value="" required="" title="Please enter your password">
                            <span class="help-block"></span>
                          </div>
                          <div id="loginErrorMsg" class="alert alert-error hide">Wrong username or password</div>
                          <div class="checkbox">
                            <label>
                              <input type="checkbox" name="remember" id="remember"> Remember login
                            </label>
                            <p class="help-block">(If this is a private computer)</p>
                          </div>
                          <button type="submit" class="btn btn-success btn-block">Login</button>
                          <a href="forgot.php" class="btn btn-default btn-block">Help to login</a>
                        </form>
                      </div>
                    </div>
                    <div class="col-xs-6">
                      <p class="lead">Register now for <span class="text-success">FREE</span></p>
                      <ul class="list-unstyled" style="line-height: 2">
                        <li><span class="fa fa-check text-success"></span> See all your Results</li>
                        <li><span class="fa fa-check text-success"></span> Be Cool</li>
                        <li><span class="fa fa-check text-success"></span> Get top Grades</li>
                        <li><span class="fa fa-check text-success"></span> Be a Company tool</li>


                      </ul>
                      <p><button type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#registerform">Register me now!</button></a></p>
                      <!-- Trigger the modal with a button -->

                    </div>
                  </div>
                </div>
              </div>
            </div>
            <li role="separator" class="divider"></li>
            <li><a href = "php/logout.php" class="fa fa-star-o"> Log Out</a></li>
          </ul>
        </li>
      </ul>
      <div class="col-md-3 pull-right">
          <form class="navbar-form" role="search">
              <div class="input-group">
                  <input type="text" class="form-control" placeholder="Search" name="srch-term" id="srch-term">
                  <div class="input-group-btn">
                      <button class="btn btn-success" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                  </div>
              </div>
          </form>
      </div>
    </div><!--/.nav-collapse -->
  </div>
</nav>
<!-- Modal -->
<div id="registerform" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <div class="card card-container"><img src="assets/images/avatar.png" class="profile-img-card">
          <p class="card-name">Register</p>
          <form class="form-signin"   id="registeruser" name="registeruser" method="post" action="register_complete.php">
              <input class="form-control"  required="" placeholder="Username" autofocus="" type="text" name="username" id="username" size="10">
              <input class="form-control"  required="" placeholder="First Name" autofocus="" type="text" name="firstname" id="firstname" size="10">
              <input class="form-control"  required="" placeholder="Second Name" autofocus="" type="text" name="surname" id="surname" size="10">
              <input class="form-control" type="password" required="" placeholder="Password" type="password" name="userpass" id="userpass" size="10">
              <input class="form-control" type="password" required="" placeholder="Password" type="password" name="secondpass" id="secondpass" size="10">
              <input class="form-control"  required="" placeholder="Email address" autofocus="" type="text" name="emailadd" id="emailadd" size="10">
              <input class="form-control"  placeholder="DOB" autofocus="" type="date" name="dob" id="dob">
              <input class="form-control" required="" placeholder="Contact Number" autofocus="" type='tel' name="phoneadd" id="phoneadd"    title='Phone Number (Format: +99(99)9999-9999)' >

              <div class="checkbox">
                  <div class="checkbox">
                      <label>
                          <input type="checkbox">Sign Up For Newsletter</label>
                  </div>
              </div>
      <div class="checkbox">
                  <div class="checkbox">
                      <label>
                          <input type="checkbox" name="tnc" id="tnc">Accepts Our <em>Terms & Conditions</em></label>
                  </div>
              </div>
              <button class="btn btn-primary btn-block btn-lg btn-signin" type="submit">Register</button>
          </form>

</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
