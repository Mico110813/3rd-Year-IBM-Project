<?php
	$loggedintext = "";
	if(isset($_SESSION["userid"])){ //changes text on log in button to logged in if true

	$loggedintext = "Logged In";
	$loginform ='<p class="text-center"> Already logged in </p>';
	$registertext = '';
	$logoutbtn ='<p>or</p> <a href="php/logout.php" class="btn btn-info" role="button">Logout</a>';
	} else {

	$loggedintext = "Login";

	$logoutbtn ='';
	$loginform = 'Login via
<div class="social-buttons">
			<a href="#" class="btn btn-fb" disabled = "disabled"><i class="fa fa-facebook"></i> Facebook</a>
			<a href="#" class="btn btn-tw" disabled = "disabled"><i class="fa fa-twitter"></i> Twitter</a>
		</div>
										or
		 <form class="form" role="form" method="post" accept-charset="UTF-8" id="login-nav" action="php/processlogin.php">
				<div class="form-group">
					 <label class="sr-only" for="username">Username</label>
					 <p id="errormsg"> </p>
					 <input class="form-control"  required placeholder="Email address" autofocus="" type="text" name="username" id="username" size="10">
				</div>
				<div class="form-group">
										<label class="sr-only" for="userpass">Password</label>
										<input class="form-control" type="password" required placeholder="Password" type="password" name="userpass" id="userpass" size="10">
										<div class="help-block text-right"><a href="">Forget the password ?</a></div>
				</div>

				<div class="form-group">
					 <button type="submit" class="btn btn-primary btn-block">Sign in</button>
				</div>
				<div class="checkbox">
					 <label>
					 <input type="checkbox"> keep me logged-in
					 </label>
				</div>
		 </form>';
		 $registertext = '			<p>New here ?</p>
					 <button type="button" class="btn btn-info" data-toggle="modal" data-target="#registerform">Register</button>';




	}

	?>
<?php

//Populate register form with department options
$deparment_options = '';
$sql="select dept_id,dept_name from department";
$stmt=$db->prepare($sql);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($id,$name);

while($row=$stmt->fetch()) {
	$deparment_options .= "<option value=$id>$name</option>";
}

?>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php">Home</a></li>
        <li><a href="courses.php">Courses</a></li>
        <li><a href="contact.php">Contact</a></li>
        <li><a href="dashboard/index.php">Dashboard</a></li>
      </ul>
      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control search-input" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default btn-colour">Submit</button>
      </form>
      <ul id="dropdown-login" class="nav navbar-nav navbar-right">
        <li id="dropdown-li" class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b><?php echo $loggedintext ?></b> <span class="caret"></span></a>
			<ul id="login-dp" class="dropdown-menu">
				<li>
					 <div class="row">
							<div class="col-md-12">
							<?php echo $loginform ?>
							</div>
							<div class="bottom text-center">
									<?php echo $registertext ?>
									<?php echo $logoutbtn ?>
							</div>

					 </div>
				</li>
			</ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
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
              <!-- Replace department field with dropdown of selectable departments -->
								<select name="dept_id">
									<option selected="selected" value=1>No Department</option>
								  <?php echo  $deparment_options ?>
								</select>
              <!-- Replace department field with dropdown of selectable departments -->
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
