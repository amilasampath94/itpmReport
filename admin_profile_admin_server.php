<?php include('connector.php');

  // variable declaration
  $fname = "";
  $lname = "";
  $mobile = "";
  $type = "";
  $email = "";
  $error = "";
  $displ = "";

  $username = $_SESSION['adminUsername'];

  $query = "SELECT * FROM admin WHERE username='$username'";
  $result = mysqli_query($conn, $query);
  $row = mysqli_fetch_array($result);

  $fname = $row['fname'] ;
  $lname = $row['lname'];
  $mobile = $row['mobile'];
  $type = $row['type'];
  $username = $row['username'];
  $displ = $row['image'];
  $email = $row['email'];



  mysqli_close($conn);

  ?>
