<?php 
	$connect = mysqli_connect('localhost','root','','snowman_project');


	$drop = "DROP TABLE schedule";
	$query = mysqli_query($connect, $drop);
	if ($query) {
		echo "<script>alert('Schedule Table Deleted')</script>";
	}
	else {
		echo mysqli_error($connect);
	}

	$drop = "DROP TABLE booking";
	$query = mysqli_query($connect, $drop);
	if ($query) {
		echo "<script>alert('Booking Table Deleted')</script>";
	}
	else {
		echo mysqli_error($connect);
	}

	$drop = "DROP TABLE service";
	$query = mysqli_query($connect, $drop);
	if ($query) {
		echo "<script>alert('Service Table Deleted')</script>";
	}
	else {
		echo mysqli_error($connect);
	}

	$drop = "DROP TABLE admin";
	$query = mysqli_query($connect, $drop);
	if ($query) {
		echo "<script>alert('Admin Table Deleted')</script>";
	}
	else {
		echo mysqli_error($connect);
	}

	$drop = "DROP TABLE membership";
	$query = mysqli_query($connect, $drop);
	if ($query) {
		echo "<script>alert('Membership Table Deleted')</script>";
	}
	else {
		echo mysqli_error($connect);
	}


	$drop = "DROP TABLE feedback";
	$query = mysqli_query($connect, $drop);
	if ($query) {
		echo "<script>alert('Feedback Table Deleted')</script>";
	}
	else {
		echo mysqli_error($connect);
	}

	
	$drop = "DROP TABLE user";
	$query = mysqli_query($connect, $drop);
	if ($query) {
		echo "<script>alert('User Table Deleted')</script>";
	}
	else {
		echo mysqli_error($connect);
	}
	


	// --------------------------------------------------------------

	$create = "CREATE TABLE admin
				(AdminID int AUTO_INCREMENT NOT NULL PRIMARY KEY,
				AdminName varchar(30),
				Email varchar(30),
				Password varchar(225))";
	$query = mysqli_query($connect, $create);

	if ($query) {
		echo "<script>alert('Admin Table Created')</script>";
	}
	else {
		echo mysqli_error($connect);
	}

	// --------------------------------------------------------------

	$create = "CREATE TABLE service
				(ServiceID int PRIMARY KEY,
				ServiceName varchar(30),
				Price int)";
	$query = mysqli_query($connect ,$create);

	if ($query) {
		echo "<script>alert('Service Table Created')</script>";
	}
	else {
		echo mysqli_error($connect);
	}

	$insert = "INSERT INTO service VALUES (1, 'small car cleaning', 3000)";
	$query = mysqli_query($connect, $insert);
	$insert = "INSERT INTO service VALUES (2, 'large car cleaning', 5000)";
	$query = mysqli_query($connect, $insert);
	$insert = "INSERT INTO service VALUES (3, 'XL car cleaning', 8000)";
	$query = mysqli_query($connect, $insert);
	$insert = "INSERT INTO service VALUES (4, 'stickering', 6000)";
	$query = mysqli_query($connect, $insert);

	// //--------------------------------------------------------------

	$create = "CREATE TABLE user
				(UserID int AUTO_INCREMENT NOT NULL PRIMARY KEY,
				UserName varchar(30),
				Email varchar(30),
				Password varchar(225),
				Member varchar(10) DEFAULT 'No')";
	$query = mysqli_query($connect, $create);

	if ($query) {
		echo "<script>alert('User Table Created')</script>";
	}
	else {
		echo mysqli_error($connect);
	}

	//--------------------------------------------------------------

	$create = "CREATE TABLE feedback
				(FeedbackID int AUTO_INCREMENT NOT NULL PRIMARY KEY,
				Feedback varchar(255),
				UserID int,
				FOREIGN KEY(UserID) REFERENCES user(UserID))";
	$query = mysqli_query($connect, $create);

	if ($query) {
		echo "<script>alert('Feedback Table Created')</script>";
	}
	else {
		echo mysqli_error($connect);
	}

	//--------------------------------------------------------------

	$create = "CREATE TABLE booking
				(BookingID int AUTO_INCREMENT NOT NULL PRIMARY KEY,
				Name varchar(30),
				Phone varchar(30),
				Date date,
				Time varchar(30),
				TotalPrice int,
				Status varchar(30) DEFAULT 'Pending',
				UserID int,
				ServiceID int,
				FOREIGN KEY(UserID) REFERENCES user(UserID),
				FOREIGN KEY(ServiceID) REFERENCES Service(ServiceID))";
	$query = mysqli_query($connect, $create);

	if ($query) {
		echo "<script>alert('Booking Table Created')</script>";
	}
	else {
		echo mysqli_error($connect);
	}

	// --------------------------------------------------------------
	$create = "CREATE TABLE schedule
				(ScheduleID int AUTO_INCREMENT NOT NULL PRIMARY KEY,
				Date date,
				Time varchar(30),
				BookingID int,
				FOREIGN KEY(BookingID) REFERENCES booking(BookingID))";
	$query = mysqli_query($connect, $create);

	if ($query) {
		echo "<script>alert('Schedule Table Created')</script>";
	}
	else {
		echo mysqli_error($connect);
	}

	//--------------------------------------------------------------

	$create = "CREATE TABLE membership
				(MemberID int AUTO_INCREMENT NOT NULL PRIMARY KEY,
				MembershipDetails varchar(30),
				Status varchar(30) DEFAULT 'Pending',
				StartDate date,
				EndDate date,
				UserID int,
				FOREIGN KEY(UserID) REFERENCES user(UserID))";
	$query = mysqli_query($connect, $create);

	if ($query) {
		echo "<script>alert('Membership Table Created')</script>";
	}
	else {
		echo mysqli_error($connect);
	}

	// --------------------------------------------------------------
	
 ?>