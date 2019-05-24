<?php
	include("connector.php");

	// variable declaration
  $fname = "";
  $lname = "";
  $mobile = "";
	$cnfemail = "";
  $error = "";
  $mobileError = "";
  $emailError = "";
  $currentpassError = "";
  $successMessage = "";
  $passSuccessMessage = "";
  $e = "0";
	$email_1 = "";
	$displ = "";

	$email = $_SESSION['userEmail'];

  $query = "SELECT * FROM customer WHERE email='$email'";
  $result = mysqli_query($conn, $query);
  $row = mysqli_fetch_array($result);

  $fname = $row['fname'] ;
  $lname = $row['lname'];
  $mobile = $row['mobile'];
	$displ = $row['image'];
	$picture = $row['picture'];

  //insert user details
  if (isset($_POST['update_profile'])) {

    // receive all input values from the form
		$fname = mysqli_real_escape_string($conn, $_POST['fname']);
  	$lname = mysqli_real_escape_string($conn, $_POST['lname']);
  	$mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
		$email_1 = mysqli_real_escape_string($conn, $_POST['email']);


		$query = "SELECT * FROM customer";
		$result = mysqli_query($conn, $query);
		$user = mysqli_fetch_array($result);

		// if email exists
		if($email != $email_1){
			if ($email_1 == $user['email']) {
 	       $mobileError = "Email is already exists";
         $e = "1";
				 $email_1 = $email;

 	    }else {
 	    	$cnfemail = "0";
				$_SESSION['userEmail'] = $email_1;
 	    }
 	  }



    if($e == "0"){

		    $query = "UPDATE customer SET fname = '$fname', lname = '$lname', email = '$email_1', mobile = '$mobile', cnfemail = '$cnfemail' WHERE email = '$email'";
  	    mysqli_query($conn, $query);

         $successMessage = "Details has been sucessfully changed.";

         //if email is changed
         if($email != $email_1){


            $to = $email_1;
  			    $subject = 'ABC';
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
				 }

      }
		}else{
			$email_1 = $email;
		}

  	//change password
  	if (isset($_POST['change_pass'])) {

  		// receive all input values from the form
  		$new_pass = mysqli_real_escape_string($conn, $_POST['new_pass']);

      $query = "SELECT * FROM customer WHERE email='$email_1'";
      $result = mysqli_query($conn, $query);

      if (mysqli_num_rows($result) == 1) {

  		    $new_pass1 = md5($new_pass);//encrypt the password before saving in the database
  		    $query = "UPDATE customer set password = '$new_pass1'  WHERE email = '$email_1' ";
			    mysqli_query($conn, $query);

			    $to = $email_1;
			    $subject = 'ABC';
  		    $message = 'Dear '.$fname.' '.$lname.'
                        Your password has been sucessfully changed.';
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

          $passSuccessMessage = "Password has been sucessfully changed.";


        }else{
        $currentpassError = "Current password is wrong.";
        }
      }




			if(isset($_POST["image"])){
				$filename = addslashes($_FILES['img']['name']);
				if(!empty($filename)){
					$tmpname = addslashes(file_get_contents($_FILES['img']['tmp_name']));
					$filetype = addslashes($_FILES['img']['type']);
					$filesize = addslashes($_FILES['img']['size']);
					$array = array('jpg','jpeg','png');
					$ext = pathinfo($filename, PATHINFO_EXTENSION);
					if(in_array($ext, $array)){
						$query="UPDATE customer SET image='$tmpname' WHERE email='$email_1'";
						mysqli_query($conn,$query);
					}
				}
			}

			$query = "SELECT * FROM customer WHERE email='$email_1'";
			$result = mysqli_query($conn, $query);
			$row = mysqli_fetch_array($result);
			$displ = $row['image'];

    mysqli_close($conn);


?>
