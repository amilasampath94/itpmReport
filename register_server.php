<?php
	include("connector.php");
	session_start();

	// variable declaration
	$fname = "";
	$lname = "";
	$email = "";
	$mobile = "";
	$errors = array();
	$_SESSION['success'] = "";
	$_SESSION['regSuccess'] = "";



	// REGISTER USER
	if (isset($_POST['reg_user'])) {
		// receive all input values from the form
		$fname = mysqli_real_escape_string($conn, $_POST['fname']);
		$lname = mysqli_real_escape_string($conn, $_POST['lname']);
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
		$password_1 = mysqli_real_escape_string($conn, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($conn, $_POST['password_2']);


		if ((empty($password_1))||(empty($password_2))){
			if (empty($password_1)){
		 	array_push($errors, "Password is empty");
			}
			if (empty($password_2)){
			array_push($errors, "Confermation password is empty");
		 	}
		}else{

		 $query = "SELECT * FROM temp_customer WHERE mobile='$mobile' OR email='$email'";
 	   $result = mysqli_query($conn, $query);
 		 // Associative array
 	   $user = mysqli_fetch_assoc($result);


			if($user){
				array_push($errors, "You have registerd but your email is not confirmed. Please confirm your email.");
			}	else{

		 // first check the database to make sure a user does not already exist with the same username or email
	   $query = "SELECT * FROM customer WHERE mobile='$mobile' OR email='$email'";
	   $result = mysqli_query($conn, $query);
		 // Associative array
	   $user = mysqli_fetch_assoc($result);

	   if ($user) { // if user exists
	     if ($user['mobile'] == $mobile) {
	       array_push($errors, "Mobile number is already exists");
	     }
	     if ($user['email'] == $email) {
	       array_push($errors, "Email is already exists");
	     }
	   }


		// register user if there are no errors in the form
		if (count($errors) == 0){
			$password = md5($password_1);//encrypt the password before saving in the database
			$query = "INSERT INTO temp_customer (fname, lname, email, mobile, password) VALUES ('$fname', '$lname', '$email', '$mobile', '$password')";
			mysqli_query($conn, $query);


			$to = $email;
			$subject = 'ABC';
			$message = 'Dear '.$fname.' '.$lname.'
			Please confirm your email using the link that sent to you. Then you can login to your account.href = "http://localhost/ABC/UserM/confirm_email.php?email='.$email.'"';




				// Send The Message


				require_once('PHPMailer\PHPMailerAutoload.php');

				$mail = new PHPMailer();
				$mail->isSMTP();//telling the class to use SMTP
				$mail->SMTPAuth = true;//enable SMTP authentication
				$mail->SMTPSecure = 'ssl';//sets the prefix to theserver
				$mail->Host = 'smtp.gmail.com';//sets the gmail server
				$mail->Port = '465';//set the smtp port for the gmail server
				$mail->isHTML();
				$mail->Username = 'princesspark6969@gmail.com';
				$mail->Password = 'anematamatakana';
				$mail->SetFrom('no-reply@princesspark.ga');
				$mail->Subject = $subject;
				$mail->Body = $message;
				$mail->AddAddress($to);
				$mail->send();


			$_SESSION['regSuccess'] = "You have successfully registered. Please confirm your email
			 using the link that sent to your email. Then you can login to your account.";

			header('location: confirm.php?email='.$email);

		}
	}
}
}







  mysqli_close($conn);


  ?>
