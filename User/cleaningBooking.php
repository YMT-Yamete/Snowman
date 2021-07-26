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
			echo "<script>window.location = 'voucher.php?service=$service&name=$name&phone=$phone&date=$date&time=$time'</script>";
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
		<img src="assets/car-sizes-removebg-preview.png">
		<form method="POST" action="cleaningBooking.php">
			<p>What's the size your car?</p>
			<input type="radio" name="service" value="small car cleaning">
			<label for="html">Small/Medium</label><br>
			<input type="radio" name="service" value="large car cleaning">
			<label for="css">Large</label><br>
			<input type="radio" name="service" value="XL car cleaning">
			<label for="javascript">Extra Large(XL)</label><br><br>

			<label for="name">Name:</label>
  			<input type="text" name="name" value=<?php echo $_SESSION['UserName'] ?> readonly><br>

  			<label for="phone">Phone:</label>
  			<input type="tel" name="phone"/><br>

  			<label for="phone">Date:</label>
  			<input type="date" name="date"><br>

  			<label for="cars">Choose a time:</label>
			<select name="time" id="cars">
			  <option value="9:00 am">9:00 am</option>
			  <option value="9:30 am">9:30 am</option>
			  <option value="10:00 am">10:00 am</option>
			  <option value="10:30 am">10:30 am</option>
			  <option value="11:00 am">11:00 am</option>
			  <option value="11:30 am">11:30 am</option>
			  <option value="12:00 am">12:00 pm</option>
			  <option value="12:30 am">12:30 pm</option>
			  <option value="1:00 pm">1:00 pm</option>
			  <option value="1:30 am">1:30 pm</option>
			  <option value="2:00 pm">2:00 pm</option>
			  <option value="2:30 am">2:30 pm</option>
			  <option value="3:00 pm">3:00 pm</option>
			  <option value="3:30 am">3:30 pm</option>
			  <option value="4:00 pm">4:00 pm</option>
			  <option value="4:30 am">4:30 pm</option>
			  <option value="5:00 pm">5:00 pm</option>
			  <option value="5:30 am">5:30 pm</option>
			</select><br><br>

  			<input type="submit" name="back" value="Back">
  			<input type="submit" name="next" value="Next">
		</form>
	</div>
</body>
</html>