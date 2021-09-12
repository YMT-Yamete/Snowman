<?php 
    $connect = mysqli_connect('localhost', 'root', '', 'snowman_project');
    session_start();

    if (isset($_POST['submit'])) {
        $feedback = $_POST['feedback'];
        $userID = $_SESSION['UserID'];
        $insert = "INSERT INTO feedback (Feedback, UserID) VALUES ('$feedback', '$userID')";
        $query = mysqli_query($connect, $insert);
        if ($query) {
            echo "<script>alert('Thank you for your feedback.')</script>";
            echo "<script>window.location = 'homepage.php'</script>";
        }
        else {
            echo mysqli_error();
        }
    }
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
                    <a href="homepage.php" class="activeNav">Home</a>
                </li>
                <li class="nav-item">
                    <a href="about.php" class="nav-link">About</a>
                </li>
                <li class="nav-item">
                    <a href="membership.php" class="nav-link">Membership</a>
                </li>
                <li class="nav-item">
                    <a href="profile.php" class="nav-link">Profile</a>
                </li>
            </ul>
            <div class="hamburger">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
        </nav>
    </header><br>
    <p class="fieldHeader">Services</p><br>
    <div>
        <table class="center">
            <tr>
                <td>
                    <div class="container">
                      <img src="assets/Carwash.jpg" alt="Cleaning Booking" class="image1">
                      <div class="overlay" onclick="window.location='cleaningBooking.php';">
                        <div class="text">Book Car Cleaning Service</div>
                      </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td><pre>   </pre></td>
            </tr>
            <tr>
                <td>
                    <div class="container">
                      <img src="assets/Carsticker.jpg" alt="Cleaning Booking" class="image1">
                      <div class="overlay" onclick="window.location='stickeringBooking.php'">
                        <div class="text">Book Car Stickering Service</div>
                      </div>
                    </a>
                </td>
            </tr>
        </table>
        <table class="center">
            <tr>
                <td>
                    <div class="container">
                      <img src="assets/Carwash.jpg" alt="Stickering Booking" class="image">
                      <div class="overlay" onclick="window.location='cleaningBooking.php'">
                        <div class="text">Book Car Cleaning Service</div>
                      </div>
                    </div>
                </td>
                <td><pre>       </pre></td>
                <td>
                    <div class="container">
                      <img src="assets/Carsticker.jpg" alt="Avatar" class="image">
                      <div class="overlay" onclick="window.location='stickeringBooking.php'">
                        <div class="text">Book Car Stickering Service</div>
                      </div>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <br><br><br><hr><br>

    <p class="fieldHeader">Feedback or Advice</p><br>
    <form method="POST" action="homepage.php">
        <textarea class="TxtArea" rows="5" cols="80" name="feedback"></textarea><br>
        <input name="submit" type="submit" value="Submit" class="TxtAreaButton">
    </form>

    <footer class="footer-distributed">
            <div class="footer-left">
                 <h3>Snowman<span>Service</span></h3>
                 
                 <p class="footer-links">
                     <a href="homepage.php">Home</a>
                     ·
                     <a href="about.php">About</a>
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