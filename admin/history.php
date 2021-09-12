<?php 
    $connect = mysqli_connect('localhost', 'root', '', 'snowman_project');

    if (isset($_POST['delete'])) {
        $id = $_POST['id'];

        $delete1 = "DELETE FROM schedule WHERE BookingID = '$id'";
        $deleteQuery1 = mysqli_query($connect, $delete1);

        $delete2 = "DELETE FROM booking WHERE BookingID = '$id'";
        $deleteQuery2 = mysqli_query($connect, $delete2);

        if ($deleteQuery1 and $deleteQuery2) {
            echo "<script>alert('Deleted')</script>";
            echo "<script>window.location = 'history.php'</script>";
        }
        else {
            echo mysqli_error($connect);
        }
    }

    $select = "SELECT * FROM booking WHERE status = 'Finished'";
    $query = mysqli_query($connect, $select);
    $count = mysqli_num_rows($query);
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
                    <a href="schedule.php" class="nav-link">Schedule</a>
                </li>
                <li class="nav-item">
                    <a href="history.php" class="activeNav">History</a>
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
    <p class="fieldHeader">Booking History</p><br>
    <div style="padding: 10px;">
        <table data-replace="jtable" id="example" aria-label="JS Datatable" data-locale="en" data-search="true">
            <thead>
                <tr>
                    <th>BookingID</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Service</th>
                    <th>Price</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php for ($i=0; $i < $count; $i++) { 
                    $arr = mysqli_fetch_array($query);

                    $bookingID = $arr['BookingID'];
                    $name = $arr['Name'];
                    $phone = $arr['Phone'];
                    $date = $arr['Date'];
                    $time = $arr['Time'];
                    $price = $arr['TotalPrice'];

                    $serviceID = $arr['ServiceID'];
                    $select2 = "SELECT ServiceName FROM service WHERE ServiceID = '$serviceID'";
                    $query2 = mysqli_query($connect, $select2); 
                    $count2 = mysqli_num_rows($query2);

                    for ($j=0; $j < $count2; $j++) {
                        $arr2 = mysqli_fetch_array($query2);
                        $serviceName = $arr2['ServiceName'];
                        echo "<tr>
                                <td> $bookingID </td>
                                <td> $name </td>
                                <td> $phone </td>
                                <td> $date </td>
                                <td> $time </td>
                                <td> $serviceName</td>
                                <td> $price KS</td>
                                <td>
                                    <form method='POST' action='history.php'>
                                        <input type='hidden' name='id' value='$bookingID'>
                                        <input type='submit' name='delete' value='delete' style='background-color:#E64B5E'>
                                    </form>
                                </td>
                            </tr>";
                        }
                    }?>
            </tbody>
        </table>
        <script src="./datatable.min.js"></script>
    </div>

    <footer class="footer-distributed" style="<?php print ($count>6)?'margin-top: 0px':'position: fixed'; ?>">
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
</html>