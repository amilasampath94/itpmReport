<?php
  $email = $_GET['email'];
  session_start();
  require_once("admin_status.php");
 	if (logged_in() == true) {

    include('admin_profile_customer_server.php');
 		?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
  <link rel="icon" type="image/png" href="images/logo.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Profile</title>

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
    <link href="css/search.css" rel="stylesheet" />

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
		                <li>
		                    <a href="admin_home.php">
		                        <i class="pe-7s-user"></i>
		                        <p>dashboard</p>
		                    </a>
		                </li>
                    <br><br>
		                <li class="active">
		                    <a href="admin_customers.php">
		                        <i class="pe-7s-news-paper"></i>
		                        <p>customers</p>
		                    </a>
		                </li>
		                <li>
		                    <a href="admin_new_customer.php">
		                        <i class="pe-7s-note2"></i>
		                        <p>Add customer</p>
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
                                <p style="color:#f44336"><?php echo $_SESSION['username'];?> (<?php echo $_SESSION['type'];?>)</p>
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
                				                 <div class="card card-user">
                					                	<div class="image">
                								            	<img src="images/cover1.jpg" alt="..."/>
                							              </div>
                		                       	<div class="content">
                							             		<div class="author">
                                                <?php
                                                  if($displ != ""){
                                                    echo '<img class="avatar border-gray" src="data:image/jpeg;base64,'.base64_encode($displ).'"/>';
                                                  }else{
                                                    echo '<img class="avatar border-gray" src="'.$picture.'" alt="..."/>';
                                                  } ?>
                								                <h4 class="title"><?php echo $fname;?> <?php echo $lname;?><br /><br></h4>
                															</div>

                															<div class="row">
                																<div class="col-md-6">
                																	<div class="form-group">
                																		<label>First Name</label>
                																		<input type="text" class="form-control" disabled placeholder="First Name" value="<?php echo $fname;?>">
                																	</div>
                																</div>
                																<div class="col-md-6">
                																	<div class="form-group">
                																		<label>Last Name</label>
                																		<input type="text" class="form-control" disabled placeholder="Last Name" value="<?php echo $lname;?>">
                																	</div>
                																</div>
                															</div>

                															<div class="row">
                																<div class="col-md-6">
                																	<div class="form-group">
                																		<label for="exampleInputEmail1">Email address</label>
                																		<input type="email" class="form-control" disabled placeholder="Email" value="<?php echo $email;?>">
                																	</div>
                																</div>
                															</div>

                															<div class="row">
                																<div class="col-md-4">
                																	<div class="form-group">
                																		<label>Mobile</label>
                																		<input type="text" class="form-control" disabled placeholder="Mobille" value="<?php echo $mobile;?>">
                																	</div>
                																</div>
                															</div>

                                              <?php
                															echo '<a href="pdf_admin_customers.php?email='.$email.'">
                                                <button type="submit" class="btn btn-info btn-fill pull-left">Download Details</button>
                                              </a>
                                              <a id="delete">
                                                <button onclick="myFunctionDelete()" type="submit" class="btn btn-info btn-fill pull-right">Delete Account</button>
                                              </a><a href="admin_edit_customer.php?email='.$email.'">
                                                <button type="submit" class="btn btn-info btn-fill pull-right" style="margin-right:5px">Edit Details</button>
                                              </a>'
                                              ?>
                                              <br><br><br>
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

<script>
function myFunctionDelete(){
  var href;
  var r = confirm("Are you sure you want to delete this account?");
  if(r==true){
    href="admin_delete_customer.php?email=<?php echo $email ?>";
  }else{
    href="admin_profile_customer.php?email=<?php echo $email ?>"
  }

  document.getElementById("delete").href = href;
}

</script>


<script>
function myFunction() {
  var input, filter, table, tr, td, i, n;
  n = document.getElementById("search").value;

  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[n];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>

<script>
function sortTable() {
  n = document.getElementById("sort").value;
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("myTable");
  switching = true;
  // Set the sorting direction to ascending:
  dir = document.getElementById("order").value;
  /* Make a loop that will continue until
  no switching has been done: */
  while (switching) {
    // Start by saying: no switching is done:
    switching = false;
    rows = table.getElementsByTagName("TR");
    /* Loop through all table rows (except the
    first, which contains table headers): */
    for (i = 1; i < (rows.length - 1); i++) {
      // Start by saying there should be no switching:
      shouldSwitch = false;
      /* Get the two elements you want to compare,
      one from current row and one from the next: */
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      /* Check if the two rows should switch place,
      based on the direction, asc or desc: */
      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          // If so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          // If so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      /* If a switch has been marked, make the switch
      and mark that a switch has been done: */
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      // Each time a switch is done, increase this count by 1:
      switchcount ++;
    } else {
      /* If no switching has been done AND the direction is "asc",
      set the direction to "desc" and run the while loop again. */
      if (switchcount == 0 && dir == "asc") {

        switching = true;
        break;
      }
    }
  }
}
</script>

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
