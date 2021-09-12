<?php 
	session_start();
    unset($_SESSION['UserID']);
    unset($_SESSION['UserName']);
    unset($_SESSION['Email']);
    unset($_SESSION['Member']);
	echo "<script>alert('Logged out')</script>";
	echo "<script>window.location = 'login.php'</script>";
	exit();
 ?>