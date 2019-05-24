<?php
  session_start();
  require_once("admin_status.php");
 	if (logged_in() == true) {
    include('admin_home_server.php');
 		?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
  <link rel="icon" type="image/png" href="images/logo.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Admin Home</title>

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
<body>

	<div class="wrapper">
    	<div class="sidebar" data-color="grd" data-image="images/side.jpg">


		    	<div class="sidebar-wrapper">
		            <div class="logo">
		                <a href="../Admin" class="simple-text">
		                    <b>ABC</b>
		                </a>
		            </div>


		            <ul class="nav">
		                <li class="active">
		                    <a href="admin_home.php">
		                        <i class="pe-7s-user"></i>
		                        <p>dashboard</p>
		                    </a>
		                </li>
                    <br><br>
		                <li>
		                    <a href="admin_customers.php">
		                        <i class="pe-7s-news-paper"></i>
		                        <p>Students</p>
		                    </a>
		                </li>
		                <li>
		                    <a href="admin_new_customer.php">
		                        <i class="pe-7s-note2"></i>
		                        <p>Add student</p>
		                    </a>
		                </li>
                    <br><br>
										<li>
		                    <a href="admin_admins.php">
		                        <i class="pe-7s-bell"></i>
		                        <p>Admin users</p>
		                    </a>
		                </li>
		                <li>
		                    <a href="admin_new_admin.php">
		                        <i class="pe-7s-science"></i>
		                        <p>Add admin</p>
		                    </a>
		                </li>
                    <br><br>
                    <li>
		                    <a href="admin_profile.php">
		                        <i class="pe-7s-science"></i>
		                        <p>Profile</p>
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
                                <p style="color:#f44336;"><?php echo $_SESSION['username'];?> (<?php echo $_SESSION['type'];?>)</p>
                               </a>
                              </li>

				                    </ul>

				                    <ul class="nav navbar-nav navbar-right">
				                        <li>
				                           <a href="../Admin">
				                               <p>Home</p>
				                            </a>
				                        </li>
				                        <li>
				                            <a href="logout.php">
				                                <p>Log out</p>
				                            </a>
				                        </li>
				                    </ul>
				                </div>
				            </div>
				        </nav>


                						<div class="content">
                		            <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="header">
                                                    <h4 class="title">Customers</h4>
                                                </div>
                                                <div class="content">
                                                  <div class="row">
                                                    <center>
                                                      <div class="col-md-4">
                                                        <div class="card" style="background-color:#f44336">
                                                          <lebel style="font-size:85px"><?php echo $numCustomers ?></lebel>
                                                          <br><b>Customers</b><br><br>
                                                        </div>
                                                      </div>
                                                      <div class="col-md-4">
                                                        <div class="card" style="background-color:blue;">
                                                          <a href="admin_customers.php" style="color:black">
                                                            <br>
                                                            <img src="images/user.png" style="height:80px; width:80px">
                                                            <br><br><b>View Customers</b><br><br>
                                                          </a>
                                                        </div>
                                                      </div>
                                                      <div class="col-md-4">
                                                        <div class="card" style="background-color:green">
                                                          <a href="admin_new_customer.php" style="color:black">
                                                            <br>
                                                            <img src="images/userAdd.png" style="height:80px; width:80px">
                                                            <br><br><b>Add Customers</b><br><br>
                                                          </a>
                                                        </div>
                                                      </div>
                                                    </center>
                                                  </div>
                													    </div>
                												  </div>
                		                    </div>

                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="header">
                                                    <h4 class="title">Admins</h4>
                                                </div>
                                                <div class="content">
                                                  <div class="row">
                                                    <center>
                                                      <div class="col-md-4">
                                                        <div class="card" style="background-color:#f44336">
                                                          <lebel style="font-size:85px"><?php echo $numAdmins ?></lebel>
                                                          <br><b>Admins<br><br>
                                                        </div>
                                                      </div>
                                                      <div class="col-md-4">
                                                        <div class="card" style="background-color:blue">
                                                          <a href="admin_admins.php" style="color:black">
                                                            <br>
                                                            <img src="images/user.png" style="height:80px; width:80px">
                                                            <br><br><b>View Admins</b><br><br>
                                                          </a>
                                                        </div>
                                                      </div>
                                                      <div class="col-md-4">
                                                        <div class="card" style="background-color:green">
                                                          <a href="admin_new_admin.php" style="color:black">
                                                            <br>
                                                            <img src="images/userAdd.png" style="height:80px; width:80px">
                                                            <br><br><b>Add Admin</b><br><br>
                                                          </a>
                                                        </div>
                                                      </div>
                                                    </center>
                                                  </div>
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

		header('location: index.php');
	}
?>
