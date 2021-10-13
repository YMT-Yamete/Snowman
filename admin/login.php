<?php 
    $connect = mysqli_connect('localhost','root','','snowman_project');
    session_start();

    if (isset($_POST['Submit'])) {
        $email = $_POST['Email'];
        $password = $_POST['Password'];

        $select = "SELECT * FROM admin WHERE Email = '$email' AND Password = sha1('$password')";
        $query = mysqli_query($connect,$select);
        $count = mysqli_num_rows($query);
        $arr = mysqli_fetch_array($query);

        if ($count>0) {
            $_SESSION['AdminID'] = $arr['AdminID'];
            $_SESSION['AdminName'] = $arr['AdminName'];
            $_SESSION['AdminEmail'] = $arr['Email'];
            $_SESSION['AdminPassword'] = $arr['Password'];
            
            echo "<script>alert('Login Successful')</script>";
            echo "<script>window.location = 'booking.php'</script>";
        }
        else {
            echo "<script>alert('Incorrect Email or Password')</script>";
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
            <a href="#" class="nav-logo">Snowman Service</a>
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="register.php" class="nav-link">Register</a>
                </li>
                <li class="nav-item">
                    <a href="login.php" class="activeNav">Login</a>
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
        <h1 class="fieldHeader">Admin Login</h1><br>
        <form method="POST" action="login.php">
            <table class="center">
                <tr>
                    <td><input type="Email" name="Email" placeholder="Enter Email" required></td>
                </tr>
                <tr>
                    <td><input type="Password" name="Password" placeholder="Enter Password" required></td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" value="Login" name="Submit">
                    </td>
                </tr>
                <tr>
                    <td class="linkForReg">
                        <a href="register.php">I don't have an account.</a>
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <footer class="footer-distributed">
            <div class="footer-left">
                 <h3>Snoman<span>Service</span></h3>
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