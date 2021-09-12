<?php 
	session_start();
	unset($_SESSION['AdminID']);
    unset($_SESSION['AdminName']);
    unset($_SESSION['AdminEmail']);
    unset($_SESSION['AdminPassword']);
	echo "<script>alert('Logged out')</script>";
	echo "<script>window.location = 'login.php'</script>";
	exit();
 ?>