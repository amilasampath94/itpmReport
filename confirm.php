<?php
  $email = $_GET['email'];
 include 'confirm_server.php'; ?>
<!DOCTYPE html>
<html>
<head>
<title>Confirm Email</title>
<link rel="stylesheet" type="text/css" href="css\user.css">
<link rel="stylesheet" type="text/css" href="css\reg.css">
<link rel="icon" type="image/png" href="images/logo.ico">

</head>
<body>
 <center>

   <div class="bbb">
     <div class="bb">



         <h2>Confirmation needed</h2>

         <?php echo
         '<form action="confirm.php?email='.$email.'" method="post">'
         ?>

         <input type="hidden" name="email" value="<?php echo $email ?>">

         <div class="input-group">
           <br>
           <p>An email has been sent to<br><b><?php echo $email ?></b><br>Please click the button in the message<br>to confirm your email address.</p>
         </div>
         <div class="input-group">
           <a href="confirm_edit.php?email=<?php echo $email ?>">
             <button type="button" class="btn" name="confirm_email">Edit email</button>
          </a>
         </div>

         <br>
         <div class="input-group">
           <button type="submit" class="btn" name="send">Resend message</button>
         </div>

       </form>
     </div>

     <a href="../main/index.php"> <div class="alert-close" ></div></a>



     <div class="right-section">

       <a href="../main/index.php">
       <div  style="width:50px; height:50px; background-color:#f44336; position: relative;  top:0px; right:-125px;">

         <img src="images/into.png" style="width:18px;height:18px; padding-top:15px">

       </div>
       </a>

       <div class="Rerror">
           <div class="msg">
             <p style="color : #f44336; padding-left: 20px"><b><?php echo $sent ?></b></p>
           </div>
     </div>
   </div>
 </center>


</body>
</html>
