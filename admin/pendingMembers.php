<?php 
    $connect = mysqli_connect('localhost', 'root', '', 'snowman_project');

    if (isset($_POST['accept'])) {
        $userID = $_POST['userID'];
        $membershipType = $_POST['membershipType'];
        $startDate = date("Y-m-d");

        if ($membershipType == null ) {
            echo "<script>alert('Please select membership type')</script>";
            echo "<script>window.location = 'pendingMembers.php'</script>";
        }
        else {
            if ($membershipType == "6mths") {
                $endDate = date('Y-m-d', strtotime($startDate . ' + 6 months'));
            }
            elseif ($membershipType == "1yr") {
                $endDate = date('Y-m-d', strtotime($startDate . ' + 1 year'));
            }
            else {
                $endDate = date('Y-m-d', strtotime($startDate . ' + 2 years'));
            }

            $update = "UPDATE membership 
                        SET Status = 'Accepted', StartDate = '$startDate', EndDate = '$endDate' 
                        WHERE UserID = '$userID'";
            $query = mysqli_query($connect, $update);

            $update1 = "UPDATE user SET Member = 'Yes' WHERE UserID = '$userID'";
            $query1 = mysqli_query($connect, $update1);

            if ($query and $query1) {
                echo "<script>alert('Membership Accepted')</script>";
                echo "<script>window.location = 'pendingMembers.php'</script>";
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

    if (isset($_POST['reject'])) {
        $userID = $_POST['userID'];
        $delete = "DELETE FROM membership WHERE UserID = '$userID'";
        $query = mysqli_query($connect, $delete);
        if ($query) {
            echo "<script>alert('Membership Rejected')</script>";
            echo "<script>window.location = 'membership.php'</script>";
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
                    <a href="history.php" class="nav-link">History</a>
                </li>
                <li class="nav-item">
                    <a href="membership.php" class="activeNav">Membership</a>
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
        <p class="fieldHeader">Pending Members</p><br><br>

        <table class="center">
            <tr>
                <td><a class="nav-link active" href="membership.php">Members</a></td>
                <td><pre>    </pre></td>
                <td><a class="nav-link" href="pendingMembers.php" style="color: blue;">Pending</a></td>
                <td><pre>    </pre></td>
                <td><a class="nav-link" href="expiredMembers.php">Expired</a></td>
            </tr>
        </table><br>

        <form method="POST" action="pendingMembers.php">
        <table data-replace="jtable" aria-label="JS Datatable" data-locale="en" data-search="true">
            <thead>
                <tr>
                    <th>UserID</th>
                    <th>View Membership</th>
                    <th>Bronze/Silver/Gold</th>
                    <th>Accept</th>
                    <th>Reject</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $select = "SELECT * FROM membership WHERE Status = 'Pending'";
                    $query = mysqli_query($connect, $select);
                    $count = mysqli_num_rows($query);

                    for ($i=0; $i < $count; $i++) { 
                        $arr = mysqli_fetch_array($query);
                        $userID = $arr['UserID'];
                        $membershipDetails = $arr['MembershipDetails'];
                        echo "<input type='text' name='userID' value='$userID' hidden/>";
                        echo "<tr>";
                        echo "<td style='text-align:center;'>$userID</td>";
                        echo "<td style='text-align:center;'><a href=$membershipDetails>Download</a></td>";
                        echo "<td style='text-align:center;'>
                                <input type='radio' name='membershipType' value='6mths'>/
                                <input type='radio' name='membershipType' value='1yr'>/
                                <input type='radio' name='membershipType' value='2yrs'>/
                              </td>";
                        echo "<td style='text-align:center;'><input type='submit' name='accept' value='Accept'/></td>";
                        echo "<td style='text-align:center;'><input type='submit' name='reject' value='Reject' style='background-color:#E64B5E'/></td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
        </form>
        <script src="./datatable.min.js"></script>
    </div>

    <footer class="footer-distributed" style="position: fixed;">
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