<?php
	include("connector.php");
// Initialize Variables to Null.
  $email =""; // Sender's E-mail ID
  $errors = array();
  $successMessage ="";

  // On Submitting Form Below Function Will Execute
  if(isset($_POST['forgot_password']))
  {
      if (!($_POST["email"]==""))
      {
        $email =$_POST["email"];

        // Calling Function To Remove Special Characters From E-mail
        // Sanitizing Email(Remove Unexpected Symbol like <,>,?,#,!, etc.)
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        if (filter_var($email, FILTER_VALIDATE_EMAIL))
        {

          $query = "SELECT * FROM customer WHERE email='$email'";
          $result = mysqli_query($conn, $query);
          $data = mysqli_num_rows($result);

          if(($data)==1)
          {
            $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%&*_";
            $password = substr( str_shuffle( $chars ), 8, 20 );
            $password1= md5($password); //Encrypting Password

            $query = "UPDATE customer SET password='$password1' WHERE email='$email'";
            $results = mysqli_query($conn, $query);

            if($results)
            {
            $to = $email;
            $subject = 'Your New Password...';
            $message = 'Hello User
                        Your new password : '.$password.'
                        E-mail: '.$email.'
                        Now you can login with this  password.';

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

                        array_push($errors,"New Password has been sent to your mail,
                                                Please check your mail and SignIn.");
                      
          }
        }
        else{
          array_push($errors,"Invalid Email");
        }
      }
      else{
        array_push($errors,"Invalid Email");
      }
    }
    else{
      array_push($errors,"Email is required");
    }
  }

?>
