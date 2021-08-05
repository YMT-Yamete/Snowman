<?php 
	$connect = mysqli_connect('localhost', 'root', '', 'snowman_project');
	session_start();

	if (isset($_POST['submit'])) {
		$feedback = $_POST['feedback'];
		$userID = $_SESSION['UserID'];
		$insert = "INSERT INTO feedback (Feedback, UserID) VALUES ('$feedback', '$userID')";
		$query = mysqli_query($connect, $insert);
		if ($query) {
			echo "<script>alert('Thank you for your feedback.')</script>";
			echo "<script>window.location = 'homepage.php'</script>";
		}
		else {
			echo mysqli_error();
		}
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Snowman Service</title>
	<style>
		ul#menu li {
		  display:inline;
		}
		/* Three image containers (use 25% for four, and 50% for two, etc) */
		.column {
		  float: left;
		  width: 49.4%;
		  padding: 5px;
		}

		/* Clear floats after image containers */
		.row::after {
		  content: "";
		  clear: both;
		  display: table;
		}
		.services {
			width: 100%;
			height: 100%;
		}
	</style>
</head>
<body>
	<div>
		<ul id="menu">
		  <a href="homepage.php" style="text-decoration: none;"><li style="font-size: 30px">Homepage &#160;</li></a>
		  <a href="about.php" style="text-decoration: none;"><li style="font-size: 30px">About &#160;</li></a>
		  <a href="membership.php" style="text-decoration: none;"><li style="font-size: 30px">Membership &#160;</li></a>
		  <a href="profile.php" style="text-decoration: none;"><li style="font-size: 30px">Profile &#160;</li></a>
		</ul>
		<div class="row">
		  <div class="column">
		  	<a href="cleaningBooking.php">
		    	<img src="assets/cleaning.jpg" alt="Cleaning" class="services">
		    </a>
		  </div>
		  <div class="column">
		  	<a href="stickeringBooking.php">
		    	<img src="assets/stickering.jpg" alt="Stickering" class="services">
		    </a>
		  </div>
		</div>
		<div>
			<h1>Your feedback can help us improve our business.</h1>
			<form method="POST" action="homepage.php">
				<textarea rows="10" cols="80" name="feedback"></textarea><br>
				<input type="submit" name="submit" value="Submit">
			</form>
		</div>
	</div>
</body>
</html>