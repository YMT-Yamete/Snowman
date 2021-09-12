<?php 
    $connect = mysqli_connect('localhost','root','','snowman_project');
    session_start();

    if (isset($_POST['back'])) {
        echo "<script>window.location= 'homepage.php'</script>";
    }
    if (isset($_POST['next'])) {
        if ($_POST['phone'] == '' or $_POST['service'] == '' or $_POST['date'] == '' or $_POST['time'] == '') {
            echo "<script>alert('Please fill data completely.')</script>";
            echo "<script>window.location = 'cleaningBooking.php'</script>";
        }
        else {
            $service = $_POST['service'];
            $name = $_POST['name'];
            $phone = $_POST['phone'];
            $date = $_POST['date'];
            $time = $_POST['time'];

            $select = "SELECT * FROM schedule 
                        WHERE Date = '$date'
                        AND Time = '$time'";
            $query = mysqli_query($connect, $select);
            $rows = mysqli_num_rows($query);
            if ($rows>0) {
                echo "<script>alert('We are sorry. The chosen date and time is not available.')</script>";
                echo "<script>window.location = 'stickeringBooking.php'</script>";
            }
            else {
                echo "<script>window.location = 'voucher.php?service=$service&name=$name&phone=$phone&date=$date&time=$time'</script>";
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
            <div class="hamburger">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
        </nav>
    </header><br><br><br>   
    <div class="card">
        <h1 class="fieldHeader">Stickering Booking</h1><br><br>
        <form method="POST" action="stickeringBooking.php">
            <input type="hidden" name="service" value="stickering">
            <table class="center"> 
                <tr>
                    <td><input type="Text" name="name" placeholder="Enter Name" value=<?php echo $_SESSION['UserName'] ?> readonly></td>
                </tr>
                <tr>
                    <td><input type="Text" name="phone" placeholder="Enter Phone"></td>
                </tr>
                <tr>
                    <td><input type="Date" name="date"></td>
                </tr>
                <tr>
                    <td>
                        <select name="time">
                            <option value='' style="display:none">Please choose time</option>
                            <option value="9:00 am">9:00 am</option>
                            <option value="9:30 am">9:30 am</option>
                            <option value="10:00 am">10:00 am</option>
                            <option value="10:30 am">10:30 am</option>
                            <option value="11:00 am">11:00 am</option>
                            <option value="11:30 am">11:30 am</option>
                            <option value="12:00 am">12:00 pm</option>
                            <option value="12:30 am">12:30 pm</option>
                            <option value="1:00 pm">1:00 pm</option>
                            <option value="1:30 am">1:30 pm</option>
                            <option value="2:00 pm">2:00 pm</option>
                            <option value="2:30 am">2:30 pm</option>
                            <option value="3:00 pm">3:00 pm</option>
                            <option value="3:30 am">3:30 pm</option>
                            <option value="4:00 pm">4:00 pm</option>
                            <option value="4:30 am">4:30 pm</option>
                            <option value="5:00 pm">5:00 pm</option>
                            <option value="5:30 am">5:30 pm</option>
                        </select>
                    </td>
                </tr>
                <tr>
                   <td>
                        <a href="voucher.html"><input type="submit" value="Next" name="next"></a><br>
                        <a href="voucher.html"><input type="submit" value="Back" name="back" style="background-color: #E64B5E"></a>
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <footer class="footer-distributed">
            <div class="footer-left">
                 <h3>Snoman<span>Service</span></h3>
                 
                 <p class="footer-links">
                     <a href="homepage.html">Home</a>
                     ·
                     <a href="about.html">About</a>
                     ·
                     <a href="membership.html">Membership</a>
                     ·
                     <a href="profile.html">Profile</a>
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