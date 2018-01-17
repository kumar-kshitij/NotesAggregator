<?php 
	
	error_reporting(0);

	session_start();
	
	include("connection.php");
	
	$userid_st = 0;
	$password_st = 0;
	
	if(isset($_POST['logged'])==1){
		$password = mysqli_real_escape_string($dbc, $_POST['password']);
		
		$q1 = "SELECT * FROM users WHERE id='$_POST[userid]'";
		$q2 = "SELECT * FROM users WHERE id='$_POST[userid]' AND pwd=SHA1('$password')";
				
		if(mysqli_num_rows(mysqli_query($dbc, $q1))==1){
			$userid_st = 1;
			if(mysqli_num_rows(mysqli_query($dbc, $q2))==1){
				$password_st = 1;
				$_SESSION['username'] = $_POST['userid'];
				header("Location: index.php");
			}
			else{
				$password_st = -1;
			}
		}
		else{
			$userid_st = -1;
			$password_st = -1;
		}
	}
	 
?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<title>LogIn/Register | Notes+</title>
	
	<?php include("css.php"); ?>
	<?php include("js.php"); ?>

</head>
<body>
	
	<nav class="navbar navbar-default navbar-static-top">
		<div class="container">
			<ul class="nav navbar-nav">
				<li class="heading"><img src="images/book.png" width="100px" />&nbsp;<strong>Notes</strong> <i class="fa fa-plus-circle" aria-hidden="true"></i></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><img src="images/ad1.png" width="225px" /></li>
				<li><img src="images/ad2.png" width="100px" /></li>
			</ul>
		</div>
	</nav>
	
	<div class="container">
		<div class="row">
			<div class="col-md-3">

				<legend class="form-heading">LogIn</legend>
				<br />

				<form action="" method="post">
	        		<div class="form-group<?php if($userid_st==1){echo " has-success has-feedback";}elseif($userid_st==-1){echo " has-error has-feedback";} ?>">
	          			<input type="text" id="userid" name="userid" class="form-control" placeholder="UserID" required>
					    <?php if($userid_st==1){ ?>
					    	<span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
					    <?php }elseif($userid_st==-1){ ?>
					    	<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
					    <?php } ?>
	        		</div>
	        		<br />
	        		<div class="form-group<?php if($password_st==1){echo " has-success has-feedback";}elseif($password_st==-1){echo " has-error has-feedback";} ?>">
	          			<input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
					    <?php if($password_st==1){ ?>
					    	<span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
					    <?php }elseif($password_st==-1){ ?>
					    	<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
					    <?php } ?>
	        		</div>
	        		<br />
	        		<div class="form-group">
	        			<input type="submit" class="btn btn-primary" name="logged" value="Log In"></input>
	        		</div>
	      		</form>
				
			</div>
			<div class="col-md-4">
			</div>
			<div class="col-md-5">
				
				<legend class="form-heading">Create a new account</legend>
				<br />
				
				<?php include("signup.php"); ?>
				
				<form method="post">
				  
				  <div class="form-group<?php if($id_st==1){echo " has-success has-feedback";}elseif($id_st==-1){echo " has-error has-feedback";} ?>">
				    <div class="input-group">
					    <span class="input-group-addon">
					    	<i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="Length: 5-10; Allowed Characters: a-z A-Z 0-9 ._@$%&" aria-hidden="true"></i>
					    </span>
					    <input type="text" class="form-control" name="id" id="id" placeholder="UserID" pattern="[a-zA-Z0-9.@$%&_]{5,10}" onblur="checkID()" required>
				    </div>
					    
					    <?php if($id_st==1){ ?>
					    	<span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
					    <?php }elseif($id_st==-1){ ?>
					    	<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
					    <?php } ?>
					    
				  </div>
				  <br />
				  <div class="row">
				  	<div class="col-md-6 form-group">
					    <div class="input-group">
						    <span class="input-group-addon">
						    	<i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="Length: 6-30" aria-hidden="true"></i>
						    </span>
					    	<input type="password" class="form-control" name="pwd" id="pwd" placeholder="Password" pattern=".{6,30}" required>
				    	</div>
				    </div>
				  	
				  	<div class="col-md-6">
				  		<div class="form-group<?php if($pwd_st==1){echo " has-success has-feedback";}elseif($pwd_st==-1){echo " has-warning has-feedback";} ?>">
				    		<input type="password" class="form-control" name="re-pwd" id="re-pwd" placeholder="Re-enter Password" pattern=".{6,30}" onblur="checkPassword()" required>
						    
						    <?php if($pwd_st==1){ ?>
						    	<span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
						    <?php }elseif($pwd_st==-1){ ?>
						    	<span class="glyphicon glyphicon-warning-sign form-control-feedback" aria-hidden="true"></span>
						    <?php } ?>
						    
				    	</div>
				    </div>
				  </div>
				  <br />
				  <div class="form-group<?php if($email_st==1){echo " has-success has-feedback";}elseif($email_st==-1){echo " has-error has-feedback";} ?>">
			    	<input type="email" class="form-control" name="email" id="email" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" onblur="checkEmail()" required>
				    
				    <?php if($email_st==1){ ?>
				    	<span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
				    <?php }elseif($email_st==-1){ ?>
				    	<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
				    <?php } ?>
				    
				  </div>
				  <br />
				  <input type="submit" class="btn btn-success" name="submitted" value="Submit"></input>
				
				</form>
			
			</div>
		</div>
	</div>

</body>
</html>