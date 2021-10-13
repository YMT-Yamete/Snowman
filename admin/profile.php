<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/styles.css">
    <title>Snowman Service</title>
</head>

<body>
    <header class="header">
        <nav class="navbar">
           <a href="homepage.php" class="nav-logo">Snowman Service</a>
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="booking.php" class="nav-link">Booking</a>
                </li>
                <li class="nav-item">
                    <a href="schedule.php" class="nav-link">Schedule</a>
                </li>
                <li class="nav-item">
                    <a href="history.php" class="nav-link">History</a>
                </li>
                <li class="nav-item">
                    <a href="membership.php" class="nav-link">Membership</a>
                </li>
                <li class="nav-item">
                    <a href="profile.php" class="activeNav">Profile</a>
                </li>
            </ul>
            <div class="hamburger">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
        </nav>
    </header><br><br><br>   
    <div class="card">
        <table class="center" width="100%"> 
            <tr>
                <td><h1>Admin ID</h1></td>
                <td><h1> : </h1></td>
                <td class="data"><?php echo $_SESSION['AdminID'] ?></td>
            </tr>
            <tr>
                <td><pre>   </pre></td>
            </tr>
            <tr>
                <td><h1>Admin Name</h1></td>
                <td><h1> : </h1></td>
                <td class="data"><?php echo $_SESSION['AdminName'] ?></td>
            </tr>
            <tr>
                <td><pre>   </pre></td>
            </tr>
            <tr>
                <td><h1>Email</h1></td>
                <td><h1> : </h1></td>
                <td class="data"><?php echo $_SESSION['AdminEmail'] ?></td>
            </tr>
            <tr>
                <td><pre>   </pre></td>
            </tr>
        </table>
        <a href="logout.php" class="linkAtRight">Log Out</a>
    </div>
    <footer class="footer-distributed">
            <br>
            <div class="footer-left">
                 <h3>Snoman<span>Service</span></h3>
                 
                 <p class="footer-links">
                     <a href="booking.php">Booking</a>
                     ·
                     <a href="schedule.php">Schedule</a>
                     ·
                     <a href="history.php">History</a>
                     ·
                     <a href="membership.php">Membership</a>
                     ·
                     <a href="profile.php">Profile</a>
                 </p>
                 <p class="footer-company-name">snowman &copy; 2010</p>
            </div>
             <div class="footer-center">
                 <div>
                     <i class="fa fa-map-marker"></i>
                     <p><span>Samone Street</span> Yangon, Myanmar</p>
                 </div>
                 
                 <div>
                     <i class="fa fa-phone"></i>
                     <p>+95 95554321</p>
                 </div>
                 
                 <div>
                     <i class="fa fa-envelope"></i>
                     <p><a href="mailto:support@company.com">snowman.L5project@gmail.com</a></p>
                 </div>
             </div>
             <div class="footer-right">
                 <p class="footer-company-about">
                 <span>About the company</span>
                    Snowman Service is here for all the customers' satisfication.
                 </p>
            </div>
     </footer>
</body>

<script src="styles/main.js"></script>
</html>