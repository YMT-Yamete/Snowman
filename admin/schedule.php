<?php 
    $connect = mysqli_connect('localhost', 'root', '', 'snowman_project');

    if (isset($_POST['btnSubmit'])) {
        $date = $_POST['date'];
        $time = $_POST['time'];

        if ($date == null or $time == null) {
            echo "<script>alert('Please choose both date and time.')</script>";
            echo "<script>window.location = 'schedule.php'</script>";
        }
        else {
            $insert = "INSERT INTO schedule (Date, Time)
                        VALUES ('$date', '$time')";
            $query1 = mysqli_query($connect, $insert);

            if ($query1) {
                echo "<script>alert('Schedule added.')</script>";
                echo "<script>
                    if ( window.history.replaceState ) {
                        window.history.replaceState( null, null, window.location.href );
                    }
                </script>";
            }
            else {
                echo mysqli_error($connect);
            }
        }
    }

    $select = "SELECT * FROM schedule WHERE Date >=  DATE(NOW())";
    $query = mysqli_query($connect, $select);   
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/styles.css">
    <link rel="stylesheet" href="./styles/datatable.min.css" />
    <style type="text/css">
        body {
                font-size: 12pt;
            }
    </style>
    <title>Snowman Service</title>
</head>

<body> 
    <header class="header">
        <nav class="navbar">
            <a href="booking.php" class="nav-logo">Snowman Service</a>
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="booking.php" class="nav-link">Booking</a>
                </li>
                <li class="nav-item">
                    <a href="schedule.php" class="activeNav">Schedule</a>
                </li>
                <li class="nav-item">
                    <a href="history.php" class="nav-link">History</a>
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

    <div style="padding: 10px;">
        <p class="fieldHeader">Add Schedule</p><br>
        <p style="text-align: center; color: red;">[ Customers wont be able to choose the added schedule ]</p>
        <form method="POST" action="schedule.php">
            <table class="center"> 
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
                        <input type="submit" value="Add" name="btnSubmit">
                    </td>
                </tr>
            </table>
        </form>
    </div><br><br>
    <hr>
    
    <div style="padding: 10px;">
        <p class="fieldHeader">Schedule</p><br>
        <table data-replace="jtable" aria-label="JS Datatable" data-locale="en" data-search="true">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Time</th>
                    <th>BookingID</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                        $count = mysqli_num_rows($query);
                        for ($i=0; $i <$count ; $i++) { 
                            $arr = mysqli_fetch_array($query);
                            $date = $arr['Date'];
                            $time = $arr['Time'];
                            $bookingID = $arr['BookingID'] != null ? $arr['BookingID'] : '---';

                            echo "<tr>";
                            echo "<td>$date</td>";
                            echo "<td>$time</td>";
                            echo "<td>$bookingID</td>";
                            echo "</tr>";
                        }
                    ?>
            </tbody>
        </table>
        <script src="./datatable.min.js"></script>
    </div>

    <footer class="footer-distributed">
            <div class="footer-left">
                 <h3>Snowman<span>Service</span></h3>
                 
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
</php>