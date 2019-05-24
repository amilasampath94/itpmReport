<?php
	include("connector.php");
	session_start();

	// variable declaration

	$errors = array();
	$_SESSION['success'] = "";


  // LOGIN USER
  if (isset($_POST['confirm_email']))
	{
    // receive all input values from the form
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // form validation: ensure that the form is correctly filled

    if (empty($password))
		{
      array_push($errors, "Password is required");
    }

    // checking if there are no errors in the form
    if (count($errors) == 0)
		{


        $password = md5($password);//encrypt the password

				$query = "SELECT * FROM temp_customer WHERE email='$email' AND password = '$password'";
		    $result = mysqli_query($conn, $query);

				if(mysqli_num_rows($result) == 1) {

					$row = mysqli_fetch_array($result);

					$cnfemail = "1";
					$fname = $row['fname'];
					$lname = $row['lname'];
					$email = $row['email'];
					$mobile = $row['mobile'];
					$password = $row['password'];

					$pic = "images/faces/face-0.jpg";




					$query = "INSERT INTO customer (fname, lname, email, mobile, password, cnfemail, picture) VALUES ('$fname', '$lname', '$email', '$mobile', '$password', '$cnfemail', '$pic')";
					mysqli_query($conn, $query);


					$query = "DELETE FROM temp_customer WHERE email='$email'";
				  mysqli_query($conn, $query);




					$to = $email;
					$subject = 'ABC';
					$message = 'Dear '.$fname.' '.$lname.'
					You are welcome to ABC';

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


					$_SESSION['email'] = $email;
					$_SESSION['fname'] = $fname;
					$_SESSION['lname'] = $lname;


					header('location: ../main/index.php');
				}
				else
				{
	        array_push($errors, "Wrong password combination");
	      }
		}
}


mysqli_close($conn);
  ?>
