<?php
	include("connector.php");

	// variable declaration
	$fname = "";
	$lname = "";
	$email = "";
	$mobile = "";
  $username = "";
  $type = "";
	$cnfemail = "0";
	$cnfmobile = "0";
	$errors = "0";
  $successMessage = "";
  $usernameError = "";
  $emailError = "";
  $passError = "";
  $cnfpassError = "";




	// REGISTER USER
	if (isset($_POST['reg_user'])) {
		// receive all input values from the form
		$fname = mysqli_real_escape_string($conn, $_POST['fname']);
		$lname = mysqli_real_escape_string($conn, $_POST['lname']);
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
		$password_1 = mysqli_real_escape_string($conn, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($conn, $_POST['password_2']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $type = mysqli_real_escape_string($conn, $_POST['type']);


  	 // first check the database to make sure a user does not already exist with the same username or email
     $query = "SELECT * FROM admin WHERE username='$username'";
     $result = mysqli_query($conn, $query);
  	 // Associative array
     $user = mysqli_fetch_assoc($result);
     if ($user['username'] == $username) {
       $usernameError = "Username is already exists";
       $errors = "1";
			 $username = "";
     }


		 $query = "SELECT * FROM admin WHERE email='$email'";
     $result = mysqli_query($conn, $query);
     $user = mysqli_fetch_assoc($result);
     if ($user['email'] == $email) {
       $emailError = "Email is already exists";
       $errors = "1";
			 $email = "";
     }



		// register user if there are no errors in the form
		if ($errors == 0) {
			$password = md5($password_1);//encrypt the password before saving in the database
			$query = "INSERT INTO admin (username , fname, lname, email, mobile, type, password) VALUES('$username', '$fname', '$lname', '$email', '$mobile', '$type', '$password')";
			mysqli_query($conn, $query);


			$to = $email;
			$subject = 'Welcome to ABC';
			$message = 'Dear '.$fname.' '.$lname.'
									Please confirm your email using the link that sent to you. Then you can login to your account.href = "http://localhost/pp/confirm_email.php?email='.$email.'"';


			// Send The Message Using mail() Function.
      //mail($to, $subject, $message )

					$successMessage = "Registration successful";

					$fname = "";
					$lname = "";
					$email = "";
					$mobile = "";
				  $username = "";
				  $type = "";
    }
}






  mysqli_close($conn);


  ?>
