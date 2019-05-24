<?php include('connector.php');

  // variable declaration
  $fname = "";
  $lname = "";
  $mobile = "";
  $email = "";
  $type = "";
  $username = "";
  $error = "";
  $displ = "";

  $username = $_SESSION['username'];


  $query = "SELECT * FROM admin WHERE username='$username'";
  $result = mysqli_query($conn, $query);
  $row = mysqli_fetch_array($result);

  $fname = $row['fname'];
  $lname = $row['lname'];
  $mobile = $row['mobile'];
  $email = $row['email'];
  $type = $row['type'];
  $displ = $row['image'];



  mysqli_close($conn);

  ?>
