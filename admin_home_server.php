<?php

  $numAdmins = "0";
  $numCustomers = "0";

	include("connector.php");

  $query1 = "SELECT * FROM customer";
  $query2 = "SELECT * FROM admin";
  $customer = mysqli_query($conn, $query1);
  $admin = mysqli_query($conn, $query2);
  $numCustomers = mysqli_num_rows($customer);
  $numAdmins = mysqli_num_rows($admin);

  ?>
