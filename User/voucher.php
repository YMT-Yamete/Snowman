<?php 
    $connect = mysqli_connect('localhost','root','','snowman_project');
    session_start();

    $userID = $_SESSION['UserID'];

    if (isset($_GET['service'])) {
        $service = $_GET['service'];
        $name = $_GET['name'];
        $phone = $_GET['phone'];
        $date = $_GET['date'];
        $time = $_GET['time'];

        $userSelect = "SELECT * FROM user 
                    WHERE UserID = '$userID'";
        $userSelectQuery = mysqli_query($connect, $userSelect);
        $userSelectCount = mysqli_num_rows($userSelectQuery);
        
        for ($i=0; $i < $userSelectCount; $i++) { 
            $arr1 = mysqli_fetch_array($userSelectQuery);
            $select = "SELECT * FROM service
                WHERE ServiceName = '$service'";

            $query = mysqli_query($connect, $select);
            $row = mysqli_num_rows($query);

            for ($j=0; $j < $row; $j++) { 
                $array = mysqli_fetch_array($query);
                $serviceID = $array['ServiceID'];
                $membership = $arr1['Member'];
                if ($membership == "No") {
                    $price = $array['Price'];
                }
                else {
                    $price = $array['Price'] * 0.9;
                }   
            }   
        }
    }

    if (isset($_POST['confirm'])) {

        $userID = $_SESSION['UserID'];

        $service = $_POST['service'];
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $date = $_POST['date'];
        $time = $_POST['time'];
        $price = $_POST['price'];

        $serviceID = $_POST['serviceID'];

        $select = "SELECT * FROM schedule
                    WHERE Date = '$date'
                    AND Time = '$time'";
        $query = mysqli_query($connect, $select);
        $row = mysqli_num_rows($query);

        if ($row > 0) {
            echo "<script>alert('We\'re sorry. Your chosen date and time is already taken')</script>";
            echo "<script>history.go(-2)</script>";
        }
        else {  
            $insert1 = "INSERT INTO booking (Name, Phone, Date, Time, TotalPrice, UserID, ServiceID)
                    VALUES ('$name', '$phone', '$date', '$time', '$price', '$userID', '$serviceID')";

            $query1 = mysqli_query($connect,$insert1);
            $last_id = mysqli_insert_id($connect);

            $insert2 = "INSERT INTO schedule (Date, Time, BookingID)
                        VALUES ('$date', '$time', '$last_id')";
            $query2 = mysqli_query($connect,$insert2);

            if ($query1 and $query2) {
                echo "<script>alert('Booking Successful.')</script>";
                echo "<script>window.location = 'homepage.php'</script>";
            }
            else {
                echo mysqli_error($connect);
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
                    <a href="profile.php" class="nav-link">Profile</a>
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
        <form method="POST" action="voucher.php">
            <table class="center" width="100%"> 
                <tr>
                    <td><h1>Service</h1></td>
                    <td><h1> : </h1></td>
                    <td class="data"><?php echo $service ?></td>
                </tr>
                <tr>
                    <td><pre>   </pre></td>
                </tr>
                <tr>
                    <td><h1>Name</h1></td>
                    <td><h1> : </h1></td>
                    <td class="data"><?php echo $name; ?></td>
                </tr>
                <tr>
                    <td><pre>   </pre></td>
                </tr>
                <tr>
                    <td><h1>Phone</h1></td>
                    <td><h1> : </h1></td>
                    <td class="data"><?php echo $phone; ?></td>
                </tr>
                <tr>
                    <td><pre>   </pre></td>
                </tr>
                <tr>
                    <td><h1>Date</h1></td>
                    <td><h1> : </h1></td>
                    <td class="data"><?php echo $date; ?></td>
                </tr>
                <tr>
                    <td><pre>   </pre></td>
                </tr>
                <tr>
                    <td><h1>Time</h1></td>
                    <td><h1> : </h1></td>
                    <td class="data"><?php echo $time; ?></td>
                </tr>
                <tr>
                    <td><pre>   </pre></td>
                </tr>
                <tr>
                    <td><h1>Price</h1></td>
                    <td><h1> : </h1></td>
                    <td class="data"><?php echo $price; ?></td>
                </tr>
                    <input type="hidden" name="service" value=<?php echo "'$service'"?>>
                    <input type="hidden" name="name" value=<?php echo "'$name'" ?>>
                    <input type="hidden" name="phone" value=<?php echo "'$phone'" ?>>
                    <input type="hidden" name="date" value=<?php echo "'$date'" ?>>
                    <input type="hidden" name="time" value=<?php echo "'$time'" ?>>
                    <input type="hidden" name="price" value=<?php echo "'$price'" ?>>
                    <input type="hidden" name="serviceID" value=<?php echo $serviceID ?>>
            </table>
            <input type="submit" name="confirm" value="Confirm" class="linkAtRight">
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