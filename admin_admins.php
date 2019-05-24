<?php
  session_start();
  require_once("admin_status.php");
 	if (logged_in() == true) {
    include('admin_admins_server.php');
 		?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
  <link rel="icon" type="image/png" href="images/logo.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Admins</title>

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
		                <li>
		                    <a href="admin_customers.php">
		                        <i class="pe-7s-news-paper"></i>
		                        <p>students</p>
		                    </a>
		                </li>
		                <li>
		                    <a href="admin_new_customer.php">
		                        <i class="pe-7s-note2"></i>
		                        <p>Add student</p>
		                    </a>
		                </li>
                    <br><br>
										<li class="active">
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
                                <div class="card">
                                    <div class="header">
                                      <h4 class="title">Admin</h4>
                                      <br>
                                      <p class="category">All Admins : <?php echo $numAdmins; ?></p>
                                    </div>


                                      <div class="col-md-7">
                                        Search By
                                        <select id="search" class="s">
                                          <option value="1">Username</option>
                                          <option value="2">First Name</option>
                                          <option value="3">Last Name</option>
                                          <option value="4">Email</option>
                                          <option value="5">Mobile</option>
                                          <option value="6">Admin Type</option>
                                        </select>
                                        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search..">
                                      </div>

                                      <div class="col-md-5">
                                        Sort By
                                        <select id="sort" class="s">
                                          <option value="">None</option>
                                          <option value="1">Username</option>
                                          <option value="2">First Name</option>
                                          <option value="3">Last Name</option>
                                          <option value="6">Admin Type</option>
                                        </select>
                                        <select id="order" class="s">
                                          <option value="asc">Ascending</option>
                                          <option value="desc">Descending</option>
                                        </select>
                                        <button onclick="sortTable()" class="s">Sort</button>
                                      </div>




                                    <div class="content table-responsive table-full-width">
                                        <table class="table table-hover table-striped" id="myTable">
                                            <thead>
                                              <th>Image</th>
                                              <th>User Name</th>
                                              <th>First Name</th>
                                              <th>Last Name</th>
                                              <th>Email</th>
                                              <th>Mobile</th>
                                              <th>Admin Type</th>
                                              <th>Action</th>
                                            </thead>
                                            <tbody>
                                              <?php
                                              $no 	= 0;
                                              while ($row = mysqli_fetch_array($admin))
                                              {
                                                ?>
                                                <tr>
                                                  <td>
                                                    <?php
                                                      if($row['image'] != ""){
                                                        echo '<img class="avatar" style="height:35px; width:35px;" src="data:image/jpeg;base64,'.base64_encode($row['image']).'"/>';
                                                      }else{?>
                                                        <img class="avatar border-gray" src="images/faces/face-0.jpg" alt="..."/>
                                                    <?php } ?>
                                                  </td>
                                                  <td><?php echo $row['username'] ?></td>
                                                  <td><?php echo $row['fname'] ?></td>
                                                  <td><?php echo $row['lname'] ?></td>
                                                  <td><?php echo $row['email'] ?></td>
                                                  <td><?php echo $row['mobile'] ?></td>
                                                  <td><?php echo $row['type'] ?></td>
                                                  <td>

                                                    <?php if(!($_SESSION['username'] == $row['username']))
                                                   echo '<a href="admin_profile_admin.php?un='.$row['username'].'">
                                                      <img src="images/view.png" style="height:20px; width:20px; margin-right:3px;">
                                                    </a>
                                                    <a href="admin_edit_admin.php?un='.$row['username'].'">
                                                      <img src="images/edit.png" style="height:20px; width:20px; margin-right:3px;">
                                                    </a>
                                                    <a href="admin_delete_admin.php?un='.$row['username'].'">
                                                      <img src="images/delete.png" style="height:20px; width:20px">
                                                    </a>'
                                                  ?>
                                                  </td>
                                                </tr>
                                              <?php  $no++;
                                              }?>

                                            </tbody>
                                        </table>
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
