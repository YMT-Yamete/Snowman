<?php 
	$connect = mysqli_connect('localhost','root','','snowman_project');
	session_start();

	if (isset($_POST['back'])) {
		echo "<script>window.location= 'homepage.php'</script>";
	}
	if (isset($_POST['next'])) {
		if ($_POST['phone'] == '' or $_POST['service'] == '' or $_POST['date'] == '' or $_POST['time'] == '') {
			echo "<script>alert('Please fill data completely.')</script>";
			echo "<script>window.location = 'cleaningBooking.php'</script>";
		}
		else {
			$service = $_POST['service'];
			$name = $_POST['name'];
			$phone = $_POST['phone'];
			$date = $_POST['date'];
			$time = $_POST['time'];

			$select = "SELECT * FROM schedule 
						WHERE Date = '$date'
						AND Time = '$time'";
			$query = mysqli_query($connect, $select);
			$rows = mysqli_num_rows($query);
			if ($rows>0) {
				echo "<script>alert('We are sorry. The chosen date and time is not available.')</script>";
				echo "<script>window.location = 'cleaningBooking.php'</script>";
			}
			else {
				echo "<script>window.location = 'voucher.php?service=$service&name=$name&phone=$phone&date=$date&time=$time'</script>";
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
		<form method="POST" action="cleaningBooking.php">
			<input type="hidden" name="service" value="stickering">
			<table>
				<tr>
					<td><label for="name">Name:</label></td>
					<td><input type="text" name="name" value=<?php echo $_SESSION['UserName'] ?> readonly><br></td>
				</tr>
				<tr>
					<td><label for="phone">Phone:</label></td>
					<td><input type="tel" name="phone"/><br></td>
				</tr>
				<tr>
					<td><label for="phone">Date:</label></td>
					<td><input type="date" name="date" min=<?php echo date('Y-m-d')?>><br></td>
				</tr>
				<tr>
					<td><label for="cars">Time:</label></td>
					<td><select name="time" id="cars">
					  <option value='' style="display:none">Please choose time</option>
					  <option value="9:00 am">9:00 am</option>
					  <option value="9:30 am">9:30 am</option>
					  <option value="10:00 am">10:00 am</option>
					  <option value="10:30 am">10:30 am</option>
					  <option value="11:00 am">11:00 am</option>
					  <option value="11:30 am">11:30 am</option>
					  <option value="12:00 am">12:00 pm</option>
					  <option value="12:30 am">12:30 pm</option>
					  <option value="1:00 pm">1:00 pm</option>
					  <option value="1:30 pm">1:30 pm</option>
					  <option value="2:00 pm">2:00 pm</option>
					  <option value="2:30 pm">2:30 pm</option>
					  <option value="3:00 pm">3:00 pm</option>
					  <option value="3:30 pm">3:30 pm</option>
					  <option value="4:00 pm">4:00 pm</option>
					  <option value="4:30 am">4:30 pm</option>
					  <option value="5:00 pm">5:00 pm</option>
					  <option value="5:30 pm">5:30 pm</option>
					</select></td>
				</tr>
			</table>
  			<input type="submit" name="back" value="Back">
  			<input type="submit" name="next" value="Next">
		</form>
	</div>
</body>
</html>