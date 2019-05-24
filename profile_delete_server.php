<?php


	include("connector.php");


if (isset($_POST['yes'])) {

  $email = $_SESSION['email'];

  $query = "DELETE FROM customer WHERE email='$email'";
  $result = mysqli_query($conn, $query);

  header("Location: logout.php");

}




if (isset($_POST['no'])) {

  header("Location: profile_settings.php");

}









  ?>
