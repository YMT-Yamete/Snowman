<?php 
	$connect = mysqli_connect('localhost','root','','snowman_project');
	session_start();

	if (isset($_POST['Submit'])) {
		$email = $_POST['Email'];
		$password = $_POST['Password'];

		$select = "SELECT * FROM user WHERE Email = '$email' AND Password = sha1('$password')";
		$query = mysqli_query($connect,$select);
		$count = mysqli_num_rows($query);
		$arr = mysqli_fetch_array($query);

		if ($count>0) {
			$_SESSION['UserID'] = $arr['UserID'];
			$_SESSION['UserName'] = $arr['UserName'];
			$_SESSION['Email'] = $arr['Email'];
			$_SESSION['Password'] = $arr['Password'];
			$_SESSION['Member'] = $arr['Member'];
			
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