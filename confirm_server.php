<?php

include("connector.php");
  $sent = "";

  if (isset($_POST['send']))
  {


    $to = mysqli_real_escape_string($conn, $_POST['email']);
    $subject = 'ABC';
    $message = 'Please confirm your email using the link that sent to you. Then you can login to your account.href = "http://localhost/ABC/UserM/confirm_email.php?email='.$email;




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

      $sent = "Sent";

    }




?>
