<?php 
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Snowman Service</title>
	<style>
		ul#menu li {
		  display:inline;
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
		<div style="margin-left: 2%;">
			<table>
				<tr>
					<td>User ID : </td>
					<td>			<p><?php echo $_SESSION['UserID'] ?></p></td>
				</tr>
				<tr>
					<td>Username : </td>
					<td><p><?php echo $_SESSION['UserName'] ?></p></td>
				</tr>
				<tr>
					<td>Email : </td>
					<td><p><?php echo $_SESSION['Email'] ?></p></td>
				</tr>
				<tr>
					<td>Membership : </td>
					<td><p><?php echo $_SESSION['Member'] ?></p></td>
				</tr>
			</table>
		</div>
	</div>
</body>
</html>