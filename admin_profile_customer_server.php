<?php include('connector.php');

  // variable declaration
  $fname = "";
  $lname = "";
  $mobile = "";
  $cnfmobile = "";
  $error = "";

  $query = "SELECT * FROM customer WHERE email='$email'";
  $result = mysqli_query($conn, $query);
  $row = mysqli_fetch_array($result);

  $fname = $row['fname'] ;
  $lname = $row['lname'];
  $mobile = $row['mobile'];
  $displ = $row['image'];
  $picture = $row['picture'];


  mysqli_close($conn);

  ?>
