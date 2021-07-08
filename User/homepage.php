<!DOCTYPE html>
<html>
<head>
	<title>Snowman Service</title>
	<style>
		ul#menu li {
		  display:inline;
		}
		/* Three image containers (use 25% for four, and 50% for two, etc) */
		.column {
		  float: left;
		  width: 33.33%;
		  padding: 5px;
		}

		/* Clear floats after image containers */
		.row::after {
		  content: "";
		  clear: both;
		  display: table;
		}
		.services {
			width: 100%;
			height: 100%;
		}
	</style>
</head>
<body>
	<div>
		<ul id="menu">
		  <a href="homepage.php"><li>Homepage</li></a>
		  <a href="about.php"><li>About</li></a>
		  <a href="membership.php"><li>Membership</li></a>
		  <a href="profile.php"><li>Profile</li></a>
		</ul>
		<div class="row">
		  <div class="column">
		  	<a href="cleaningBooking.php">
		    	<img src="assets/cleaning.jpg" alt="Cleaning" class="services">
		    </a>
		  </div>
		  <div class="column">
		  	<a href="stickeringBooking.php">
		    	<img src="assets/stickering.jpg" alt="Stickering" class="services">
		    </a>
		  </div>
		</div>
	</div>
</body>
</html>