<?php
  session_start();
  require_once("admin_status.php");
 	if (logged_in() == true) {

    if(!((isset($_POST['update_profile']))||(isset($_POST['change_pass']))||(isset($_POST["image"])))) {
      $_SESSION['userEmail'] = $_GET['email'];
    }
    include('admin_edit_customer_server.php');
 		?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
  <link rel="icon" type="image/png" href="images/logo.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Edit Customers</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />

    <!--  Light Bootstrap Table core CSS    -->
    <link href="css/profile.css?v=1.4.0" rel="stylesheet"/>


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="css/pe-icon-7-stroke.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="css\reg1.css">

</head>
<body>

	<div class="wrapper">
    	<div class="sidebar" data-color="grd" data-image="images/side.jpg">


		    	<div class="sidebar-wrapper">
		            <div class="logo">
		                <a href="../Admin" class="simple-text">
		                    <b>ABC</b>
		                </a>
		            </div>


		            <ul class="nav">
		                <li>
		                    <a href="admin_home.php">
		                        <i class="pe-7s-user"></i>
		                        <p>dashboard</p>
		                    </a>
		                </li>
                    <br><br>
		                <li class="active">
		                    <a href="admin_customers.php">
		                        <i class="pe-7s-news-paper"></i>
		                        <p>customers</p>
		                    </a>
		                </li>
		                <li>
		                    <a href="admin_new_customer.php">
		                        <i class="pe-7s-note2"></i>
		                        <p>Add customer</p>
		                    </a>
		                </li>
                    <br><br>
										<li>
		                    <a href="admin_admins.php">
		                        <i class="pe-7s-bell"></i>
		                        <p>Admin users</p>
		                    </a>
		                </li>
		                <li>
		                    <a href="admin_new_admin.php">
		                        <i class="pe-7s-science"></i>
		                        <p>Add admin</p>
		                    </a>
		                </li>
                    <br><br>
                    <li>
		                    <a href="admin_profile_admin.php">
		                        <i class="pe-7s-science"></i>
		                        <p>Profile</p>
		                    </a>
		                </li>
		            </ul>
		    	</div>
		    </div>




				    <div class="main-panel">
						<nav class="navbar navbar-default navbar-fixed" style="background : black;">
				            <div class="container-fluid">

				                <div class="collapse navbar-collapse">
				                    <ul class="nav navbar-nav navbar-left">
                              <li><a>
                                <p style="color:#f44336"><?php echo $_SESSION['username'];?> (<?php echo $_SESSION['type'];?>)</p>
                               </a>
                              </li>

				                    </ul>

				                    <ul class="nav navbar-nav navbar-right">
				                        <li>
				                           <a href="../Admin">
				                               <p>Home</p>
				                            </a>
				                        </li>

				                        <li>
				                            <a href="logout.php">
				                                <p>Log out</p>
				                            </a>
				                        </li>
				                    </ul>
				                </div>
				            </div>
				        </nav>

                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="header">
                                        <h4 class="title">Edit Details</h4>
                                    </div>
                                    <div class="content">
        															<div class="row">
        																<div class="col-md-7" style="color:green;">
        																	<?php echo $successMessage;?>
        																</div>
        															</div>
        															<div class="row">
        																<div class="col-md-7" style="color:red;">
        																	<?php echo $mobileError;?>
        																</div>
        															</div>
        															<div class="row">
        																<div class="col-md-7" style="color:red;">
        																	<?php echo $emailError;?>
                                          <input id="emailError" type="hidden" value="<?php echo $emailError ?>">
        																</div>
        															</div>

                                        <form method="post" action="admin_edit_customer.php">

        																	<div class="row">
        																			<div class="col-md-6">
        																					<div class="form-group">
        																							<label>First Name</label>
                                                      <input id="fname" name="fname" type="text" class="form-control" autocomplete="off" placeholder="First Name" value="<?php echo $fname?>">
                                                      <div id="fnameMsg" class="msg">
                                                        <p id="fnameMsgNum" style="color : #f44336;">Only letters are allowed in <b>first name</b></p>
                                                      </div>
                                                  </div>
        																			</div>
        																			<div class="col-md-6">
        																					<div class="form-group">
        																							<label>Last Name</label>
                                                      <input id="lname" name="lname" type="text" class="form-control" autocomplete="off" placeholder="Last Name" value="<?php echo $lname?>">
                                                      <div id="lnameMsg" class="msg">
                                                        <p id="lnameMsgNum" style="color : #f44336;">Only letters are allowed in <b>last name</b></p>
                                                      </div>
        																					</div>
        																			</div>
        																	</div>
          																<div class="row">
        																			<div class="col-md-6">
        																					<div class="form-group">
        																							<label>Email address</label>
                                                      <input id="email" name="email" type="email" class="form-control" autocomplete="off" placeholder="Email" value="<?php echo $email_1;?>">
                                                      <div id="emailMsg" class="msg">
                                                        <p id="emailMsgInvalid" style="color : #f44336;">Please enter valid <b>email</b></p>
                                                        <p id="emailMsgGmail" style="color : #f44336;">Please enter only <b>gmail-ID</b></p>
                                                      </div>
                                                  </div>
        																			</div>
        																		</div>

        																	<div class="row">
        																	<div class="col-md-4">
        																			<div class="form-group">
        																					<label>Mobile</label>
                                                  <input id="mobile" name="mobile" type="text" class="form-control" autocomplete="off" placeholder="Mobille" value="<?php echo $mobile;?>">
                                                  <div id="mobileMsg" class="msg">
                                                    <p id="mobileMsgInvalid" style="color : #f44336;">Invalid <b>mobile number</b></p>
                                                  </div>
                                              </div>
        																	</div>
                                          </div>
                                            <button id="button" disabled name="update_profile" type="submit" class="btn btn-info btn-fill pull-right">Update Profile</button>
                                            <div class="clearfix"></div>
                                        </form>
                                    </div>
                                </div>
                            </div>





                            <div class="col-md-4">
                                <div class="card card-user">
                                    <div class="image">
                                        <img src="images/cover1.jpg" alt="..."/>
                                    </div>
                                    <div class="content">
                                        <div class="author">

                                          <?php
                                            if($displ != ""){
                                              echo '<img class="avatar border-gray" src="data:image/jpeg;base64,'.base64_encode($displ).'"/>';
                                            }else{
                                              echo '<img class="avatar border-gray" src="'.$picture.'" alt="..."/>';
                                            } ?>

                                              <h4 class="title"><?php echo $fname;?> <?php echo $lname;?><br />
        																				<br>
                                              </h4>

                                        </div>
                                        <p class="description text-center">
        																	<a > Upload profile picture</a>
                                        </p>


                                        <form action="admin_edit_customer.php" enctype="multipart/form-data" method="post">
                                              <input name="img" type="file" />
                                              <br>
                                              <input name="image"  value="Upload Image" type="submit" class="btn btn-info btn-fill " style="width:50%" />
                                        </form>

                                    </div>
                                </div>
                            </div>

        										<div class="col-md-8">
                                <div class="card">
                                    <div class="header">
                                        <h4 class="title">Change Password</h4>
                                    </div>
                                    <div class="content">

        															<div class="row">
        																<div class="col-md-7" style="color:green;">
        																	<?php echo $passSuccessMessage;?>
        																</div>
        															</div>

                                        <form method="post" action="admin_edit_customer.php" >

        																		<div class="row">
        																			<div class="col-md-6">
        																					<div class="form-group">
        																							<label>NEW PASSWORD</label>
                                                      <input id="password" name="new_pass" type="password" class="form-control" placeholder="Password">
                                                      <div id="passMsg" class="msg">
                                                        <h5>Password must contain the following : </h5>
                                                        <p id="passMsgLetter" class="invalid"><b>A lowercase letter</b></p>
                                                        <p id="passMsgCapital" class="invalid"><b>A capital (uppercase) letter</b></p>
                                                        <p id="passMsgNumber" class="invalid"><b>A number</b></p>
                                                        <p id="passMsgLength" class="invalid"><b>Minimum 8 characters</b></p>
                                                      </div>
                                                    </div>
                                                  </div>

        																			<div class="col-md-6">
        																					<div class="form-group">
        																							<label>CONFIRMATION PASSWORD</label>
                                                      <input id="password_2" name="password_2" type="password" class="form-control" placeholder="Confirmation Password">
                                                      <div id="cnfMsg" class="msg">
                                                        <p id="cnfMsgInvalid" style="color : #f44336;"><b>Confirmation password</b> do not match</p>
                                                      </div>
                                                  </div>
        																			</div>
        																		</div>
                                            <button id="button1" disabled name="change_pass" type="submit" class="btn btn-info btn-fill pull-right">Submit</button>
                                            <div class="clearfix"></div>
                                        </form>



                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

              </div>
            </div>



                  <script>

                    var fname1 = 0, lname1 = 0, email1 = 0, email2 = 0, mobile1 = 0, pass1 = 1, pass2 = 1;


                    //name validation

                    var fname = document.getElementById("fname");                                 //name validation
                    var lname = document.getElementById("lname");

                    // When the user clicks on the first name field, show the message box
                    fname.onfocus = function() {
                      document.getElementById("fnameMsg").style.display = "block";
                      fname1 = 1;
                    }
                    lname.onfocus = function() {
                      document.getElementById("lnameMsg").style.display = "block";
                      lname1 = 1;
                    }



                  fname.onkeyup = function() {

                    fname1 = 1;

                    var name = /^[A-Za-z]+$/g;
                    if(!fname.value.match(name)){
                      document.getElementById("fnameMsgNum").style.display = "block";
                      fname1 = 1;
                    }else{
                      document.getElementById("fnameMsgNum").style.display = "none";
                      fname1 = 0;
                    }

                    if((fname1 == 0) && (lname1 == 0) && (email1 == 0) && (email2 == 0) && (mobile1 == 0)){
                      document.getElementById("button").disabled = false;
                    }else{
                      document.getElementById("button").disabled = true;
                    }

                  }

                  lname.onkeyup = function() {

                    lname1 = 1;

                    var name = /^[A-Za-z]+$/g;
                    if(!lname.value.match(name)){
                      document.getElementById("lnameMsgNum").style.display = "block";
                      lname1 = 1;
                    }else{
                      document.getElementById("lnameMsgNum").style.display = "none";
                      lname1 = 0;
                    }

                    if((fname1 == 0) && (lname1 == 0) && (email1 == 0) && (email2 == 0) && (mobile1 == 0)){
                      document.getElementById("button").disabled = false;
                    }else{
                      document.getElementById("button").disabled = true;
                    }

                  }







                  //email validation

                    var email = document.getElementById("email");                                 //email and mobile validation


                  // When the user clicks on the email field, show the message box
                    email.onfocus = function() {
                      document.getElementById("emailMsg").style.display = "block";
                    }


                    email.onkeyup = function() {

                      email1 = 1;
                      email2 = 1;

                      var email_value = document.getElementById("email").value;
                      var email_length = email_value.length;
                      var atindex = email_value.indexOf('@');

                      if(atindex<5) {
                        document.getElementById("emailMsgInvalid").style.display = "block";
                        email1 = 1;
                      }
                      else{
                        document.getElementById("emailMsgInvalid").style.display = "none";
                        email1 = 0;
                      }


                  /*Gg*/if(email_value.charCodeAt(atindex+1)!=71 && email_value.charCodeAt(atindex+1)!=103 ||
                  /*Mm*/  email_value.charCodeAt(atindex+2)!=77 && email_value.charCodeAt(atindex+2)!=109 ||
                  /*Aa*/  email_value.charCodeAt(atindex+3)!=65 && email_value.charCodeAt(atindex+3)!=97  ||
                  /*Ii*/  email_value.charCodeAt(atindex+4)!=73 && email_value.charCodeAt(atindex+4)!=105 ||
                  /*Ll*/  email_value.charCodeAt(atindex+5)!=76 && email_value.charCodeAt(atindex+5)!=108||
                  /*.*/   email_value.charCodeAt(atindex+6)!=46||
                  /*Cc*/  email_value.charCodeAt(atindex+7)!=67 && email_value.charCodeAt(atindex+7)!=99 ||
                  /*Oo*/  email_value.charCodeAt(atindex+8)!=79 && email_value.charCodeAt(atindex+8)!=111||
                  /*Mm*/  email_value.charCodeAt(atindex+9)!=77 && email_value.charCodeAt(atindex+9)!=109)
                        {
                          document.getElementById("emailMsgGmail").style.display = "block";
                          email2 = 1;
                        }else{
                          document.getElementById("emailMsgGmail").style.display = "none";
                          email2 = 0;
                        }


                        if((fname1 == 0) && (lname1 == 0) && (email1 == 0) && (email2 == 0) && (mobile1 == 0)){
                          document.getElementById("button").disabled = false;
                        }
                        else{
                          document.getElementById("button").disabled = true;
                        }

                    }



                    //mobile validation


                    var mobile = document.getElementById("mobile");

                    mobile.onfocus = function() {
                      document.getElementById("mobileMsg").style.display = "block";
                    }

                    mobile.onkeyup = function() {

                      mobile1 = 1;
                      mobile1 = 1;


                      var num = /^\d{10}$/;
                      if(!mobile.value.match(num)) {
                        document.getElementById("mobileMsgInvalid").style.display = "block";
                        mobile1 = 1;
                      }else{
                        document.getElementById("mobileMsgInvalid").style.display = "none";
                        mobile1 = 0;
                      }

                      if((fname1 == 0) && (lname1 == 0) && (email1 == 0) && (email2 == 0) && (mobile1 == 0)){
                        document.getElementById("button").disabled = false;
                      }else{
                        document.getElementById("button").disabled = true;
                      }

                    }










                  //password validation

                  var er = 1;

                  var password = document.getElementById("password");                                 //password validation
                  var letter = document.getElementById("passMsgLetter");
                  var capital = document.getElementById("passMsgCapital");
                  var number = document.getElementById("passMsgNumber");
                  var length = document.getElementById("passMsgLength");

                  // When the user clicks on the password field, show the message box
                  password.onfocus = function() {
                      document.getElementById("passMsg").style.display = "block";
                  }
                  password.onblur = function(){
                    if(er==0){
                      document.getElementById("passMsg").style.display = "none";
                    }
                  }

                  // When the user starts to type something inside the password field
                  password.onkeyup = function() {

                    pass1 = 1;
                    er = 1;

                    var er1=1, er2=1, er3=1, er4=1;


                    // Validate lowercase letters
                    var lowerCaseLetters = /[a-z]/g;
                    if(password.value.match(lowerCaseLetters)) {
                      letter.classList.remove("invalid");
                      letter.classList.add("valid");
                      er1=0;
                    } else {
                      letter.classList.remove("valid");
                      letter.classList.add("invalid");
                      er1=1;
                    }

                    // Validate capital letters
                    var upperCaseLetters = /[A-Z]/g;
                    if(password.value.match(upperCaseLetters)) {
                      capital.classList.remove("invalid");
                      capital.classList.add("valid");
                      er2=0;
                    } else {
                      capital.classList.remove("valid");
                      capital.classList.add("invalid");
                      er2=1;
                    }


                    // Validate numbers
                    var numbers = /[0-9]/g;
                    if(password.value.match(numbers)) {
                      number.classList.remove("invalid");
                      number.classList.add("valid");
                      er3=0;
                    } else {
                      number.classList.remove("valid");
                      number.classList.add("invalid");
                      er3=1;
                    }

                    // Validate length
                    if(password.value.length >= 8) {
                      length.classList.remove("invalid");
                      length.classList.add("valid");
                      er4=0;
                    } else {
                      length.classList.remove("valid");
                      length.classList.add("invalid");
                      er4=1;
                    }


                    if((er1==0)&&(er2==0)&&(er3==0)&&(er4==0)){
                      er=0;
                    }else{
                      er=1;
                    }

                    if(er==0){
                      pass1 = 0;
                    }else{
                      pass1 = 1;
                    }

                    if((pass1 == 0) && (pass2 == 0)){
                      document.getElementById("button1").disabled = false;
                    }else{
                      document.getElementById("button1").disabled = true;
                    }

                  }


                  //cnf pass

                  var cnfpassword = document.getElementById("password_2");                              //cnf pass validation

                  // When the user clicks on the password field, show the message box
                  cnfpassword.onfocus = function() {
                      document.getElementById("cnfMsg").style.display = "block";
                  }


                  cnfpassword.onkeyup = function() {

                    pass2 = 1;

                    if (!(password.value==cnfpassword.value)){
                      document.getElementById("cnfMsgInvalid").style.display = "block";
                      pass2 = 1;
                    }else{
                      document.getElementById("cnfMsgInvalid").style.display = "none";
                      pass2 = 0;
                    }

                    if((pass1 == 0) && (pass2 == 0)){
                      document.getElementById("button1").disabled = false;
                    }else{
                      document.getElementById("button1").disabled = true;
                    }

                  }



                  </script>


</body>

    <!--   Core JS Files   -->
    <script src="js/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="js/bootstrap.min.js" type="text/javascript"></script>

		<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="js/light-bootstrap-dashboard.js?v=1.4.0"></script>


</html>

<?php
	}else{

		header('location: index.php');
	}
?>
