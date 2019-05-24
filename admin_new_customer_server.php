<?php
	include("connector.php");

	// variable declaration
	$fname = "";
	$lname = "";
	$email = "";
	$mobile = "";
	$cnfemail = "0";
	$eError = "0";
	$mError = "0";
  $successMessage = "";
  $mobileError = "";
  $emailError = "";
  $passError = "";
  $cnfpassError = "";


	$pic = "images/faces/face-0.jpg";


	// REGISTER USER
	if (isset($_POST['reg_user'])) {
		// receive all input values from the form
		$fname = mysqli_real_escape_string($conn, $_POST['fname']);
		$lname = mysqli_real_escape_string($conn, $_POST['lname']);
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
		$password_1 = mysqli_real_escape_string($conn, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($conn, $_POST['password_2']);


  	 // first check the database to make sure a user does not already exist with the same username or email
     $query = "SELECT * FROM customer WHERE mobile='$mobile'";
     $result = mysqli_query($conn, $query);
  	 // Associative array
     $user = mysqli_fetch_assoc($result);

     if ($user) { // if user exists
       if ($user['mobile'] == $mobile) {
         $mobileError = "Mobile number is already exists";
         $mError = "1";
				 $mobile = "";
       }

			 $query = "SELECT * FROM customer WHERE email='$email'";
	     $result = mysqli_query($conn, $query);
	     $user = mysqli_fetch_assoc($result);

       if ($user['email'] == $email) {
         $emailError = "Email is already exists";
         $eError = "1";
				 $email = "";
       }
     }


		// register user if there are no errors in the form
		if (($eError == 0)&&($mError == 0)) {
			$password = md5($password_1);//encrypt the password before saving in the database
			$query = "INSERT INTO customer (fname, lname, email, mobile, password, cnfemail, picture ) VALUES('$fname', '$lname', '$email', '$mobile', '$password', '$cnfemail', '$pic')";
			mysqli_query($conn, $query);


			$to = $email;
			$subject = 'Welcome to ABC';
			$message = 'Dear '.$fname.' '.$lname.'
									Please confirm your email using the link that sent to you. Then you can login to your account.href = "http://localhost/pp/confirm_email.php?email='.$email.'"';


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


					$successMessage = "Registration successful";

					$fname = "";
					$lname = "";
					$email = "";
					$mobile = "";

    }
}






  mysqli_close($conn);


  ?>
