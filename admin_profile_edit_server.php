<?php
	include("connector.php");

	// variable declaration
  $fname = "";
  $lname = "";
  $email = "";
  $mobile = "";
  $error = "";
  $mobileError = "";
  $emailError = "";
  $currentpassError = "";
  $successMessage = "";
  $passSuccessMessage = "";
  $e = "0";
	$email_1 = "";
	$displ = "";

  $username = $_SESSION['username'];

  $query = "SELECT * FROM admin WHERE username='$username'";
  $result = mysqli_query($conn, $query);
  $row = mysqli_fetch_array($result);

  $fname = $row['fname'] ;
  $lname = $row['lname'];
  $email = $row['email'];
  $mobile = $row['mobile'];
	$displ = $row['image'];




  //insert user details
  if (isset($_POST['update_profile'])) {

    // receive all input values from the form
		$fname = mysqli_real_escape_string($conn, $_POST['fname']);
  	$lname = mysqli_real_escape_string($conn, $_POST['lname']);
  	$mobile = mysqli_real_escape_string($conn, $_POST['mobile']);

		$email_1 = mysqli_real_escape_string($conn, $_POST['email']);


		$query = "SELECT * FROM admin";
		$result = mysqli_query($conn, $query);
		$user = mysqli_fetch_array($result);


		// if email exists
		if($email != $email_1){
			if ($email_1 == $user['email']) {
 	       $mobileError = "Email is already exists";
         $e = "1";
				 $email_1 = $email;
 	    }
 	  }



      if($e == "0"){

		    $query = "UPDATE admin SET fname = '$fname', lname = '$lname', email = '$email_1', mobile = '$mobile' WHERE username = '$username'";
  	    mysqli_query($conn, $query);

        $successMessage = "Your details has been sucessfully changed.";

      }
		}else{
			$email_1 = $email;
		}

  	//change password
  	if (isset($_POST['change_pass'])) {

  		// receive all input values from the form
  		$current_pass = mysqli_real_escape_string($conn, $_POST['current_pass']);
  		$new_pass = mysqli_real_escape_string($conn, $_POST['new_pass']);

      $current_pass1 = md5($current_pass);//encrypt the password

      $query = "SELECT * FROM admin WHERE username='$username' AND password = '$current_pass1'";
      $result = mysqli_query($conn, $query);

      if (mysqli_num_rows($result) == 1) {

  		    $new_pass1 = md5($new_pass);//encrypt the password before saving in the database
  		    $query = "UPDATE admin set password = '$new_pass1'  WHERE username='$username' ";
			    mysqli_query($conn, $query);

          $passSuccessMessage = "Your password has been sucessfully changed.";

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
						$query="UPDATE admin SET image='$tmpname' WHERE username='$username'";
						mysqli_query($conn,$query);
					}
				}
			}

			$query = "SELECT * FROM admin WHERE username='$username'";
			$result = mysqli_query($conn, $query);
			$row = mysqli_fetch_array($result);
			$displ = $row['image'];



?>
