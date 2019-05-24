<?php

  $numAdmins = "0";

	include("connector.php");

  $query2 = "SELECT * FROM admin";
  $admin = mysqli_query($conn, $query2);
  $numAdmins = mysqli_num_rows($admin);


  ?>
