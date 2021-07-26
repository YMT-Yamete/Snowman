<?php 
	$connect = mysqli_connect('localhost','root','','snowman_project');
	session_start();

	if (isset($_GET['service'])) {
		$service = $_GET['service'];
		$name = $_GET['name'];
		$phone = $_GET['phone'];
		$date = $_GET['date'];
		$time = $_GET['time'];	

		$select = "SELECT * FROM service
				WHERE ServiceName = '$service'";
		$query = mysqli_query($connect, $select);
		$row = mysqli_num_rows($query);

		for ($i=0; $i < $row; $i++) { 
			$array = mysqli_fetch_array($query);
			$serviceID = $array['ServiceID']; 
			$price = $array['Price'];
		}
	}

	if (isset($_POST['confirm'])) {

		$userID = $_SESSION['UserID'];

		$service = $_POST['service'];
		$name = $_POST['name'];
		$phone = $_POST['phone'];
		$date = $_POST['date'];
		$time = $_POST['time'];
		$price = $_POST['price'];
		$serviceID = $_POST['serviceID'];

		$insert = "INSERT INTO booking (Name, Phone, Date, Time, TotalPrice, UserID, ServiceID)
					VALUES ('$name', '$phone', '$date', '$time', '$price', '$userID', '$serviceID')";

		$query = mysqli_query($connect,$insert);

		if ($query) {
			echo "<script>alert('Booking Successful.')</script>";
			echo "<script>window.location = 'homepage.php'</script>";
		}
		else{
			echo mysqli_error($connect);
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Snowman Service</title>
</head>
<body>
	<p><?php echo "Service : $service" ?></p>
	<p><?php echo "Name : $name" ?></p>
	<p><?php echo "Phone : $phone" ?></p>
	<p><?php echo "Date : $date" ?></p>
	<p><?php echo "Time : $time" ?></p>
	<p><?php echo "Price : $price" ?></p>
	<form method="POST" action="voucher.php">
		<input type="hidden" name="service" value=<?php echo "'$service'"?>>
		<input type="hidden" name="name" value=<?php echo "'$name'" ?>>
		<input type="hidden" name="phone" value=<?php echo "'$phone'" ?>>
		<input type="hidden" name="date" value=<?php echo "'$date'" ?>>
		<input type="hidden" name="time" value=<?php echo "'$time'" ?>>
		<input type="hidden" name="price" value=<?php echo $price ?>>
		<input type="hidden" name="serviceID" value=<?php echo $serviceID ?>>
		<input type="submit" name="confirm" value="Confirm">
	</form>
</body>
</html>