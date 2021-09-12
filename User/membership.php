<?php 
    $connect = mysqli_connect('localhost', 'root', '', 'snowman_project');
    session_start();

    if (isset($_POST['submit'])) {
        $id = $_POST['userID'];
        $fileName = $_FILES['membership']['name'];
        $destination = '../Membership/MembershipApplications/' . $id . '.docx';
        $today = date("Y-m-d");

        $select = "SELECT * FROM membership WHERE UserID = '$id'";
        $query = mysqli_query($connect, $select);
        $count = mysqli_num_rows($query);

        if ($count > 0) {
            echo "<script>alert('You can\\'t apply membership right now')</script>";
            echo "<script>window.location = 'membership.php'</script>";
        }
        else {
                if ($fileName) {
                $copy = copy($_FILES['membership']['tmp_name'], $destination);

                if (!$copy) {
                    echo mysqli_error($connect);
                }
                else {
                    $insert = "INSERT INTO membership (MembershipDetails, UserID)
                                VALUES ('$destination', '$id')";
                    $query = mysqli_query($connect, $insert);
                    if ($query) {
                        echo "<script>alert('Thank you for applying membership. We will contact you as soon as possible.')</script>";
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
    </header>
    <div><br>
        <p class="fieldHeader">Membership Advantages</p><br>
        <div>
            <table>
                <tr>
                    <td><img src="assets/advantages.jpg" class="aboutImg"></td>
                    <td>
                         <p class="para">
                            Our members will get 10% discount for every service as well as buying accessories for 
                            the whole membership period. <br><br>
                            "The more you come to us, the more you get advantages"
                        </p>
                    </td>
                </tr>
            </table><br><br><br>
            <hr>
        </div><br><br>
        <div>
            <p class="fieldHeader">Membership Plans</p><br><br><br>
            <table class="styled-table">
                <thead>
                    <tr>
                        <th>Type</th>
                        <th>Duration</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="active-row">
                        <td>Bronze</td>
                        <td>6 months</td>
                        <td>8000 ks</td>
                    </tr>
                    <tr class="active-row">
                        <td>Silver</td>
                        <td>1 year</td>
                        <td>15000 ks</td>
                    </tr>
                    <tr class="active-row">
                        <td>Gold</td>
                        <td>2 years</td>
                        <td>24000 ks</td>
                    </tr>
                </tbody>
            </table>
            <br><br><br><br><br>
            <hr>
        </div><br><br>
        <p class="fieldHeader">Membership Application</p><br>
        <div>
            <p class="para">
                <a href="../Membership/MembershipTemplate/MembershipApplicationForm.docx" download>Click here to download membership application form.</a>
            </p>
            <div id="form">
            <form method="POST" action='membership.php' enctype="multipart/form-data">
                <input type="number" name="userID" value=<?php echo $_SESSION['UserID'] ?> hidden>
                <p class="para">Once you finish filling the form, upload it here.</p>
                <input type="file" name="membership" accept=".docx">
                <input type="submit" name="submit" class="membershipButton">
            </form>
        </div>
        </div><br><br>
    </div>
    <footer class="footer-distributed">
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