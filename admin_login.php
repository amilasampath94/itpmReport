<?php include('admin_login_server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Login</title>
	<link rel="stylesheet" type="text/css" href="css\user.css">
	<link rel="icon" type="image/png" href="images/logo.ico">

</head>
<body>

	<center>

		<div class="bbb">
			<div class="bb">

				<form method="post" action="admin_login.php">

					<h2>Admin Login</h2>

					<div class="input-group">
						<label>Username</label>
						<input type="text" name="username"  placeholder="Please Enter username">
					</div>
					<div class="input-group">
						<label>Password</label>
						<input type="password" name="password"  placeholder="Please Enter password">
					</div>
					<br>
					<div class="input-group">
						<button type="submit" class="btn" name="admin">Login</button>
					</div>

				</form>

				<p>
					<a href="login.php">User login</a>
				</p>

			</div>

			<a href="../MainIndex.php"> <div class="alert-close" ></div></a>



			<div class="right-section">

				<a href="../MainIndex.php">
			  <div  style="width:50px; height:50px; background-color:#f44336; position: relative;  top:0px; right:-125px;">

			    <img src="images/into.png" style="width:18px;height:18px; padding-top:15px">

			  </div>
			  </a>

				<div class="Rerror"><?php include('errors.php'); ?></div>
			</div>
		</div>
	</center>

</body>
</html>
