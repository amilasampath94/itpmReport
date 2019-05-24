<?php
  $email = $_GET['email'];
 include 'confirm_edit_server.php'; ?>
<!DOCTYPE html>
<html>
<head>
<title>Edit Email</title>
<link rel="stylesheet" type="text/css" href="css\user.css">
<link rel="stylesheet" type="text/css" href="css\reg.css">
<link rel="icon" type="image/png" href="images/logo.ico">

</head>
<body>
 <center>

   <div class="bbb">
     <div class="bb">




         <h2>Confirmation needed</h2>

         <form action="confirm_edit.php?email<?php echo $email ?>" method="post">

        <input type="hidden" name="email" value="<?php echo $email ?>">

         <div class="input-group">
           <label>New Email</label>
           <input id="email"  type="text" name="new_email"   placeholder="Email">
         </div>
         <div class="input-group">
           <button id="cnf" disabled type="submit" class="btn" name="send">Send message</button>
         </div>
         <br>
         <div class="input-group">
           <a href="confirm.php?email=<?php echo $email ?>">
             <button type="button" class="btn" name="">Cancle</button>
          </a>
         </div>


       </form>

     </div>

     <a href="index.php"> <div class="alert-close" ></div></a>



     <div class="right-section">

       <a href="index.php">
       <div  style="width:50px; height:50px; background-color:#f44336; position: relative;  top:0px; right:-125px;">

         <img src="images/into.png" style="width:18px;height:18px; padding-top:15px">

       </div>
       </a>

       <div class="Rerror">

           <div id="emailMsg" class="msg">
             <p id="emailMsgInvalid" style="color : #f44336; padding-left: 20px">Please enter valid <b>email</b></p>
             <p id="emailMsgGmail" style="color : #f44336; padding-left: 20px">Please enter only <b>gmail-ID</b></p>
           </div>
     </div>
   </div>
 </center>


<script>


//email validation
  var e1,e2;
  var email = document.getElementById("email");

 // When the user clicks on the email field, show the message box
   email.onfocus = function() {
     document.getElementById("emailMsg").style.display = "block";
   }

   email.onkeyup = function() {

     var email = document.getElementById("email");
     var email_value = document.getElementById("email").value;
     var email_length = email_value.length;
     var atindex = email_value.indexOf('@');

     var lastIndex = email.length;


     if(atindex<5) {
       document.getElementById("emailMsgInvalid").style.display = "block";
       e1 = 1;
     }
     else{
       document.getElementById("emailMsgInvalid").style.display = "none";
       e1 = 0;
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
         e2 = 1;
       }else{
         document.getElementById("emailMsgGmail").style.display = "none";
         e2 = 0;

       }

       if(e1 == 0 && e2 == 0){
         document.getElementById("cnf").disabled = false;
       }
   }

 </script>

</body>
</html>
