<?PHP
session_start();

  include("connector.php");

  $username = $_SESSION['username'];


  $query = "DELETE FROM admin WHERE username='$username'";
  $result = mysqli_query($conn, $query);


  header("Location: logout.php");


  ?>
