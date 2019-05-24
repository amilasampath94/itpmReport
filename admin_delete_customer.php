<?PHP

  include("connector.php");

  $email = $_GET['email'];


  $query = "DELETE FROM customer WHERE email='$email'";
  $result = mysqli_query($conn, $query);


  header("Location: admin_customers.php");


  ?>
