<?php 
	$connect = mysqli_connect('localhost','root','','snowman_project');
	if (isset($_POST['Submit'])) {
		$email = $_POST['Email'];
		$password = $_POST['Password'];

		$select = "SELECT * FROM user WHERE Email = '$email' AND Password = sha1('$password')";
		$query = mysqli_query($connect,$select);
		$count = mysqli_num_rows($query);

		if ($count>0) {
			echo "<script>alert('Login Successful')</script>";
			echo "<script>window.location = 'homepage.php'</script>";
		}
		else {
			echo "<script>alert('Incorrect Email or Password')</script>";
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Snowman Service</title>
</head>
<body>
	<div>
		<form method="POST" action="login.php">
			<input type="Email" name="Email" placeholder="Enter Email"><br>
			<input type="Password" name="Password" placeholder="Enter Password"><br>
			<input type="submit" name="Submit" value="Submit">
		</form>
	<div>
</body>
</html>