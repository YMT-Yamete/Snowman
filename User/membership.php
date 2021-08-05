<?php 
	$connect = mysqli_connect('localhost', 'root', '', 'snowman_project');
	session_start();

	if (isset($_POST['submit'])) {
		$id = $_POST['userID'];
		$fileName = $_FILES['membership']['name'];
		$destination = '../Membership/MembershipApplications/' . $id . '.docx';

		if ($fileName) {
			$copy = copy($_FILES['membership']['tmp_name'], $destination);
			if (!$copy) {
				echo mysqli_error($connect);
			}
			else {
				$insert = "INSERT INTO membership (MembershipDetails, UserID)
							VALUES ('$destination', '$id')";
				$query = mysqli_query($connect, $insert);
				if ($query) {
					echo "<script>alert('Thank you for applying membership. We will contact you as soon as possible.')</script>";
				}
				else {
					echo mysqli_error($connect);
				}
			}
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
		#form{
		  width: 320px;
		  padding: 10px;
		  border: 5px solid gray;
		  margin: 0;
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
		</ul><br>
		<div style="margin-left: 2%;">
			<a href="../Membership/MembershipTemplate/MembershipApplicationForm.docx" download>Click here to download membership application form.</a>
		</div><br>
		<div>
			
		</div>
		<div style="margin-left: 2%;" id="form">
			<form method="POST" action='membership.php' enctype="multipart/form-data">
				<input type="number" name="userID" value=<?php echo $_SESSION['UserID'] ?> hidden>
				<p>Once you finish filling the form, upload it here.</p>
				<input type="file" name="membership" accept=".docx">
				<input type="submit" name="submit">
			</form>
		</div>
	</div>
</body>
</html>