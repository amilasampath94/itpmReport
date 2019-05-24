<?php

  $num = "0";

	include("connector.php");
	session_start();

  $email = $_SESSION['email'];

  $query = "SELECT * FROM resavations where E_mail = '$email'";
  $reservation = mysqli_query($conn, $query);

  $query = "SELECT * FROM reservation where email = '$email'";
  $reservation1 = mysqli_query($conn, $query);



  ?>
