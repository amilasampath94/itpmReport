<?php
	include("connector.php");
	session_start();


	// variable declaration
  $username= "";
	$errors = array();
	$_SESSION['success'] = "";




  // LOGIN USER
  if (isset($_POST['admin']))
	{
    // receive all input values from the form
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // form validation: ensure that the form is correctly filled
    if (empty($username))
		{
      array_push($errors, "Username is required");
    }
    if (empty($password))
		{
      array_push($errors, "Password is required");
    }


    // checking if there are no errors in the form
    if (count($errors) == 0)
    {
      $password = md5($password);//encrypt the password

			$query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
      $result = mysqli_query($conn, $query);
			$row = mysqli_fetch_array($result);

      if(mysqli_num_rows($result) == 1)
			{
				$_SESSION['type'] = $row['type'];
				$_SESSION['username'] = $username;

				header('location: ../Admin');
			}
			else
			{
        array_push($errors, "Wrong username/password combination");
      }
    }
  }

mysqli_close($conn);
  ?>
