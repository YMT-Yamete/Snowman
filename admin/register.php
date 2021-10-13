<?php 
    $connect = mysqli_connect('localhost','root','','snowman_project');
    if (isset($_POST['Submit'])) {
        $name = $_POST['Name'];
        $email = $_POST['Email'];
        $password = $_POST['Password'];
        $repeatPassword = $_POST['RepeatPassword'];

        $select = "SELECT * FROM admin WHERE Email = '$email'";
        $query = mysqli_query($connect,$select);
        $count = mysqli_num_rows($query);

        if ($count>0) {
            echo "<script>alert('This Email is already in use.')</script>";
            echo "<script>window.location='register.php'</script>";
        }
        else {
            if ($password==$repeatPassword) {
                $insert = "INSERT INTO admin(AdminName, Email, Password)
                        VALUES('$name', '$email', sha1('$password'))";
                $query = mysqli_query($connect, $insert);
                if ($query) {
                    echo "<script>alert('Account created successfully.')</script>";
                }
                else {
                    echo mysqli_error($connect);
                }
            }
            else {
                echo "<script>alert('Password and Repeat Password must be the same.')</script>";
            }
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
                    <a href="register.php" class="activeNav">Register</a>
                </li>
                <li class="nav-item">
                    <a href="login.php" class="nav-link" >Login</a>
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
        <h1 class="fieldHeader">Admin Register</h1><br>
        <form method="POST" action="register.php">
            <table class="center"> 
                <tr>
                    <td><input type="text" name="Name" placeholder="Enter Name" required></td>
                </tr>
                <tr>
                    <td><input type="Email" name="Email" placeholder="Enter Email" required></td>
                </tr>
                <tr>
                    <td><input type="Password" name="Password" placeholder="Enter Password" required></td>
                </tr>
                <tr>
                    <td><input type="Password" name="RepeatPassword" placeholder="Enter Password Again" required></td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" value="Register" name="Submit">
                    </td>
                </tr>
                <tr>
                    <td class="linkForReg">
                        <a href="login.php">Already have an account?</a>
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