<?php 
	$connect = mysqli_connect('localhost','root','','snowman_project');
	if (isset($_POST['Submit'])) {
		$name = $_POST['Name'];
		$email = $_POST['Email'];
		$password = $_POST['Password'];
		$repeatPassword = $_POST['RepeatPassword'];

		$select = "SELECT * FROM user WHERE Email = '$email'";
		$query = mysqli_query($connect,$select);
		$count = mysqli_num_rows($query);

		if ($count>0) {
			echo "<script>alert('This Email is already in use.')</script>";
			echo "<script>window.location='register.php'</script>";
		}
		else {
			if ($password==$repeatPassword) {
				$insert = "INSERT INTO user(UserName, Email, Password)
						VALUES('$name', '$email', sha1('$password'))";
				$query = mysqli_query($connect, $insert);
				if ($query) {
					echo "<script>alert('Account created successfully.')</script>";
				}
				else {
					echo mysqli_error($connect);
				}
			}
			else {
				echo "<script>alert('Password and Repeat Password must be the same.')</script>";
			}
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
		<form method="POST" action="register.php">
			<input type="text" name="Name" placeholder="Enter Name"><br>
			<input type="Email" name="Email" placeholder="Enter Email"><br>
			<input type="Password" name="Password" placeholder="Enter Password"><br>
			<input type="Password" name="RepeatPassword" placeholder="Enter Password Again"><br>
			<input type="submit" name="Submit" value="Submit">
		</form>
	<div>
</body>
</html>