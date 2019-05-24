<?php
	include("connector.php");

	// variable declaration
  $fname = "";
  $lname = "";
  $mobile = "";
	$type = "" ;
  $error = "";
  $mobileError = "";
  $emailError = "";
  $successMessage = "";
  $passSuccessMessage = "";
  $e = "0";
	$email_1 = "";
	$type_1 = "";
	$displ = "";
	$email="";

	$username = $_SESSION['adminUsername'];

  $query = "SELECT * FROM admin WHERE username='$username'";
  $result = mysqli_query($conn, $query);
  $row = mysqli_fetch_array($result);

  $fname = $row['fname'] ;
  $lname = $row['lname'];
  $email = $row['email'];
  $mobile = $row['mobile'];
	$displ = $row['image'];
	$type = $row['type'];
	$username = $row['username'];




  //insert user details
  if (isset($_POST['update_profile'])) {

    // receive all input values from the form
		$fname = mysqli_real_escape_string($conn, $_POST['fname']);
  	$lname = mysqli_real_escape_string($conn, $_POST['lname']);
  	$mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
		$email_1 = mysqli_real_escape_string($conn, $_POST['email']);
		$type_1 = mysqli_real_escape_string($conn, $_POST['type']);


		$query = "SELECT * FROM admin";
		$result = mysqli_query($conn, $query);
		$user = mysqli_fetch_array($result);


		// if email exists
		if(!($email == $email_1)){
			if ($email_1 == $user['email']) {
 	       $mobileError = "Email is already exists";
         $e = "1";
				 $email_1 = $email;
 	    }
 	  }

		if(!($type == $type_1)){
			if(!($_SESSION['type'] == 'Super')){
				$error = "Only super admin can change the admin type.";
				$type_1 = $type;
			}
		}


      if($e == "0" && $error == ""){

		    $query = "UPDATE admin SET fname = '$fname', lname = '$lname', email = '$email_1', mobile = '$mobile', type = '$type_1' WHERE username = '$username'";
  	    mysqli_query($conn, $query);

        $successMessage = "Your details has been sucessfully changed.";

      }
		}else{
			$email_1 = $email;
			$type_1 = $type;
		}

  	//change password
  	if (isset($_POST['change_pass'])) {

  		// receive all input values from the form
  		$new_pass = mysqli_real_escape_string($conn, $_POST['new_pass']);

      $query = "SELECT * FROM admin WHERE username='$username'";
      $result = mysqli_query($conn, $query);

      if (mysqli_num_rows($result) == 1) {

  		    $new_pass1 = md5($new_pass);//encrypt the password before saving in the database
  		    $query = "UPDATE admin set password = '$new_pass1'  WHERE username='$username' ";
			    mysqli_query($conn, $query);

          $passSuccessMessage = "Password has been sucessfully changed.";

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
