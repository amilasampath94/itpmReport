<?php
 require_once("user_status.php");
 session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
  <link rel="icon" type="image/png" href="images/logo.ico">
	<link rel="stylesheet" type="text/css" href="css\style.css">
	<link rel="stylesheet" type="text/css" href="css\fback.css">
  	<link rel="stylesheet" type="text/css" href="css\user.css">
</head>
<body>





	<div class="header" style="height:1400px; color:white;">
		<h2 style="color:white;">Home Page</h2>
	<div class="content" style="width: :500px">



<!-- logged in user information -->
<?php
	if (logged_in() == true) {
		?>
		<p style="color:green;">Welcome <strong><?php echo $_SESSION['fname']; ?></strong></p>
		<p> <a href="logout.php" style="color: red;"><button class="bttn" type="button">logout </button></a> </p>

    <p><a href="profile_view.php" style="color: red;"><button class="bttn" type="button">Profile</button><a></p>
	<?php
		$fname = $_SESSION['fname'];
		$email = $_SESSION['email'];
	}else{

		$email = "";
		$fname = "";
	?>
		<p>
			<a href="login.php"><button class="bttn" type="button">   Sign in </button></a>
		</p>
		<p>
			<a href="register.php"><button class="bttn" type="button">   Sign up </button></a>
		</p>
<?php } ?>
</div>


<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.1&appId=2249125312040483&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div class="fb-share-button" data-href="https://princess-park.000webhostapp.com" data-layout="button" data-size="large" data-mobile-iframe="false"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fprincesspark.ga%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div>


<br><br>
<center>

<div class="fb-page" data-href="https://www.facebook.com/Princess-Park-952435834965799/" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false"><blockquote cite="https://www.facebook.com/Princess-Park-952435834965799/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/Princess-Park-952435834965799/">Princess Park</a></blockquote></div>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.1&appId=2249125312040483&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>








<div class="container">

	<!-- Feedback Form Starts Here -->
	<div id="feedback">
	<!-- Heading Of The Form -->
	<h3>Send us your feedback !</h3>
	<!-- Feedback Form -->
	<form action="#" id="form" method="post" name="form">
	<input name="vname" placeholder="Your Name" type="text" value="<?php echo $fname ?>">
	<input name="vemail" placeholder="Your Email" type="text" value="<?php echo $email ?>">
	<input name="sub" placeholder="Subject" type="text" value="">
	<label>Your Suggestion/Feedback</label>
	<textarea name="msg" placeholder="Type your text here..."></textarea>
	<input id="send" name="submit" type="submit" value="Send Feedback">
	</form>
	<h3><?php include "feedback_server.php"?></h3>
	</div>
	<!-- Feedback Form Ends Here -->
	</div>
</center>

</div>



</body>
</html>
