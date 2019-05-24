<?php include('connector.php');
session_start();

  // variable declaration
  $fname = "";
  $lname = "";
  $email = "";
  $mobile = "";
  $cnfemail = "";
  $error = "";

  $email = $_SESSION['email'];


  $query = "SELECT * FROM customer WHERE email='$email'";
  $result = mysqli_query($conn, $query);
  $row = mysqli_fetch_array($result);

  $fname = $row['fname'] ;
  $lname = $row['lname'];
  $mobile = $row['mobile'];
  $displ = $row['image'];
  $picture = $row['picture'];

  if($cnfemail == "0"){
    $error = "Your email is not confirmed. Please confirm your email using the link that sent to your email.";
  }

  mysqli_close($conn);

  ?>
