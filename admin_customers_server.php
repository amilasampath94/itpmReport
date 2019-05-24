<?php

  $numCustomers = "0";

	include("connector.php");

  $query1 = "SELECT * FROM customer";
  $customer = mysqli_query($conn, $query1);
  $numCustomers = mysqli_num_rows($customer);
  ?>
