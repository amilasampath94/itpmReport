<?php
  $email = $_GET['email'];
 include 'confirm_email_server.php'; ?>
<!DOCTYPE html>
<html>
<head>
<title>Confirm Email</title>
<link rel="stylesheet" type="text/css" href="css\user.css">
<link rel="icon" type="image/png" href="images/logo.ico">

</head>
<body>
 <center>

   <div class="bbb">
     <div class="bb">

       <?php echo
       '<form action="confirm_email.php?email='.$email.'" method="post">'
       ?>

         <h2>Enter your password</h2>

         <div class="input-group">
           <label>Email</label>
           <input disabled type="text" name="email"  value="<?php echo $email ?>" placeholder="Email">
         </div>
         <div class="input-group">
           <label>Password</label>
           <input type="password" name="password"  placeholder="Password">
         </div>

         <br>
         <div class="input-group">
           <button type="submit" class="btn" name="confirm_email">Login</button>
         </div>

       </form>

       <p><a href="login.php">  Sign in</a></p>

     </div>

     <a href="../main/index.php"> <div class="alert-close" ></div></a>



     <div class="right-section">

       <a href="../main/index.php">
       <div  style="width:50px; height:50px; background-color:#f44336; position: relative;  top:0px; right:-125px;">

         <img src="images/into.png" style="width:18px;height:18px; padding-top:15px">

       </div>
       </a>

       <div class="Rerror">
         <?php include('errors.php'); ?>
     </div>
   </div>
 </center>


</body>
</html>
