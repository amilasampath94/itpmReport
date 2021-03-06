<?php
 require_once("user_status.php");
session_start();
 ?>
 <?php
 	if (logged_in() == true) {
 		?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
  <link rel="icon" type="image/png" href="images/logo.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Settings</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />
  <!--  Light Bootstrap Table core CSS    -->
    <link href="css/profile.css?v=1.4.0" rel="stylesheet"/>

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="css/pe-icon-7-stroke.css" rel="stylesheet" />

</head>

<style>
.switch {
  position: relative;
  width: 30px;
  height: 17px;
}

.switch input {display:none;}

.slider {
  position: absolute;
  cursor: pointer;
  top: 7.5px;
  left: 0;
  right: 0;
  bottom: -7.5px;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 13px;
  width: 13px;
  left: 2px;
  bottom: 2px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(13px);
  -ms-transform: translateX(13px);
  transform: translateX(13px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 17px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>
<body>


			<div class="wrapper">
			    <div class="sidebar" data-color="grd" data-image="images/side.jpg">


		    	<div class="sidebar-wrapper">
		            <div class="logo">
		                <a href="../main/index.php" class="simple-text">
		                    <b>ABC</b>
		                </a>
		            </div>

		            <ul class="nav">
		                <li>
		                    <a href="profile_view.php">
		                        <i class="pe-7s-user"></i>
		                        <p>Profile</p>
		                    </a>
		                </li>
		                <li>
		                    <a href="profile_edit.php">
		                        <i class="pe-7s-news-paper"></i>
		                        <p>Edit Profile</p>
		                    </a>
		                </li>

										<li>
		                    <a href="profile_notifications.php">
		                        <i class="pe-7s-bell"></i>
		                        <p>Notifications</p>
		                    </a>
		                </li>
		                <li class="active">
		                    <a href="profile_settings.php">
		                        <i class="pe-7s-science"></i>
		                        <p>Settings</p>
		                    </a>
		                </li>
		            </ul>
		    	</div>
		    </div>


		    <div class="main-panel">
				<nav class="navbar navbar-default navbar-fixed" style="background : black;">
		            <div class="container-fluid">

		                <div class="collapse navbar-collapse">
		                    <ul class="nav navbar-nav navbar-left">
		                        <li><a>
															<p style="color:#f44336"><?php echo $fname = $_SESSION['fname'];?> <?php echo $lname = $_SESSION['lname'];?></p>
														 </a>
		                        </li>
		                    </ul>

		                    <ul class="nav navbar-nav navbar-right">
		                        <li>
		                           <a href="../main/index.php">
		                               <p>Home</p>
		                            </a>
		                        </li>

		                        <li>
		                            <a href="logout.php">
		                                <p>Log out</p>
		                            </a>
		                        </li>
								<li class="separator hidden-lg hidden-md"></li>
		                    </ul>
		                </div>
		            </div>
		        </nav>


						<div class="content">
		            <div class="container-fluid">
		                <div class="card">
		                    <div class="header">
		                        <h4 class="title">Settings</h4>
														<div class="row" style="margin-top:10px;">
															<div class="col-md-3">

                                <a>
    															<p>
                                    Mute notifications :
                                    <label class="switch">
                                      <input type="checkbox" checked>
                                      <span class="slider round"></span>
                                    </label>
                                  </p>
                                </a>
													    </div>
													   </div>
													<div class="row">
														<div class="col-md-2">
													    <a href="profile_delete.php">
															  <p>Delete Account</p>
													    </a>
												    </div>
												  </div>
		                    </div>
		                </div>
		            </div>
		        </div>

    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="js/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="js/bootstrap.min.js" type="text/javascript"></script>

		<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="js/light-bootstrap-dashboard.js?v=1.4.0"></script>


</html>

<?php
	}else{

		header('location: ../main/index.php');
	}
?>
