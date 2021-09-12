<?php 
    $connect = mysqli_connect('localhost', 'root', '', 'snowman_project');
    session_start();

    if ($_SESSION['UserID']) {
        $userID = $_SESSION['UserID'];
        $select = "SELECT * FROM user WHERE UserID = '$userID'";
        $query = mysqli_query($connect, $select);
        $count = mysqli_num_rows($query);
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
                    <a href="homepage.php" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="about.php" class="nav-link">About</a>
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
            <?php for ($i=0; $i < $count; $i++) { 
                $arr = mysqli_fetch_array($query);
            ?>
            <tr>
                <td><h1>User ID</h1></td>
                <td><h1> : </h1></td>
                <td class="data"><?php echo $arr['UserID']; ?></p></td>
            </tr>
            <tr>
                <td><pre>   </pre></td>
            </tr>
            <tr>
                <td><h1>User Name</h1></td>
                <td><h1> : </h1></td>
                <td class="data"><?php echo $arr['UserName']; ?></td>
            </tr>
            <tr>
                <td><pre>   </pre></td>
            </tr>
            <tr>
                <td><h1>Email</h1></td>
                <td><h1> : </h1></td>
                <td class="data"><?php echo $arr['Email']; ?></td>
            </tr>
            <tr>
                <td><pre>   </pre></td>
            </tr>
            <tr>
                <td><h1>Membership</h1></td>
                <td><h1> : </h1></td>
                <td class="data"><?php echo $arr['Member']; ?></td>
            </tr>
            <?php } ?>  
        </table>
        <a href="logout.php" class="linkAtRight">Log Out</a>
    </div>
    <footer class="footer-distributed" style="position: fixed;">
            <div class="footer-left">
                 <h3>Snoman<span>Service</span></h3>
                 
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