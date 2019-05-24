<?php
	include('login_server.php');
	include('facebook/main.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
  <link rel="stylesheet" type="text/css" href="css\user.css">
	<link rel="icon" type="image/png" href="images/logo.ico">

</head>
<body>

	<center>

		<div class="bbb">
			<div class="bb">

				<form method="post" action="login.php">

					<h2>Login to your account</h2>

					<div class="input-group">
						<label>Email</label>
						<input type="text" name="em"  placeholder="Please Enter email" value="<?php echo $em; ?>">
					</div>
					<div class="input-group">
						<label>Password</label>
						<input type="password" name="password"  placeholder="Please Enter password" value="<?php echo $password; ?>">
					</div>

						<label style="color:white; padding-right:188px; font-size:small;">
							<input name="remember" type="checkbox" value="1" <?php if(isset($_COOKIE['em'])){?>checked="checked" <?php } ?>>Remember Me
						</label>

					<br>
					<div class="input-group">
						<button type="submit" class="btn" name="login_user">Login</button>
					</div>

				</form>

				<p>
					Not yet a member? <a href="register.php">  Sign up</a>
					</br>
					<a href="forgot_password.php">Forgot Password?</a>
					</br>
					<a href="admin_login.php">Admin login</a>
				</p>

			</div>

			<a href="../main/index.php"> <div class="alert-close" ></div></a>



			<div class="right-section">

				<a href="../main/index.php">
			  <div  style="width:50px; height:50px; background-color:#f44336; position: relative;  top:0px; right:-125px;">
			    <img src="images/into.png" style="width:18px;height:18px; padding-top:15px">
			  </div>
			  </a>

				<br>

				<div style="color:white; background:rgba(0, 0, 0, 0.7);"><br>------------------- OR ------------------<br><br>
				<?php echo $output; ?>
				<br><br>
				</div>
				<div class="Rerror"><?php include('errors.php'); ?></div>
			</div>
		</div>
	</center>



</body>
</html>
