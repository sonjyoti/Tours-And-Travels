<?php
    include 'includes/auth.php';
    include 'show_packages.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../images/logo-modified.png" type="image/x-icon">
    <title>DB-Packages</title>
    <!-- -- Slider Stylesheet -- -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />

    <!-- -- Font Style -- -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>

    <!-- -- Bootstrap -- -->
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css" />

    <!-- -- Custom Stylesheet -- -->
    <link rel="stylesheet" href="../css/style.css">
    <link href="../css/responsive.css" rel="stylesheet" />

</head>
<body>
    <!-- -- navbar starts here -- -->
    <div class="hero_area">
        <header class="header_section">
            <div class="navbar">
                <nav class="navbar navbar-expand-lg custom_nav-container">
                    <a class="logo" href="../customer/index.php" style="margin-left: 0;"><b>Tour & Travels</b></a>
                    <div class="nav-options">
                        <ul class="navbar-nav">
                            <li class="nav-item"><a class="nav-link" href="index.php"><b>Home</b></a></li>
                            <li class="nav-item active"><a class="nav-link" href="packages.php"><b>Packages</b></a></li>
                            <li class="nav-item"><a class="nav-link" href="index.php#contact"><b>Contact Us</b></a></li>
                            <li class="nav-item"><a class="nav-link" href="index.php#about"><b>About Us</b></a></li>
                        </ul>
                    </div>
                    <div class="btn" style="padding-left: 250px;">
                        <button class="btn-nav"  style="width: 150px;">
                            <a href="../customer/profile.php" style="color: white; text-decoration: none;"><b>My Profile</b></a>
                        </button>
                        <button class="btn-nav" style="width: 100px;">
                            <a href="logout.php" style="color: white; text-decoration: none;"><b>Log-Out </b><i class="fa-solid fa-right-from-bracket"></i></a>
                        </button>
                    </div>
                </nav>
            </div>
        </header>
    </div>
    <!-- -- navbar ends here -- -->
    <div style="height: 2650px; background-color: rgba(0, 0, 0, 0.041);">
        <?php
            if (mysqli_num_rows($sh_result) == 0) {
                ?><strong>
                    <?php echo htmlentities("No Packages to show!"); ?>
                </strong>
                <?php
            } else { ?>
                <p style="padding-left: 100px; padding-top: 50px; font-size: larger;"><b>Packages Available -</b></p>
                <?php
                while ($sh_row = mysqli_fetch_assoc($sh_result)) {
                ?>
                <div style="padding-left: 150px; padding-top: 20px;">
                    <div class="pk-container" style="padding-left: 50px;">
                        <div class="column" style="width: 320px; height: 250px; border-radius: 5px 0px 0px 5px;">
                            <div class="image-container" style="height: 250px; width: 320px; background-color: aqua; overflow: hidden;">
                                <img src="<?php echo htmlentities($sh_row['pkg_image']); ?>" class="zoomable-image">
                            </div>
                        </div>
                        
                        <div class="column" style="height: 250px; width: 850px; background-color: rgba(128, 128, 128, 0.762); border-radius: 0px 5px 5px 0px;">
                            <div style="padding: 30px; font-family: 'Poppins'; font-size: large;">
                                <h5><b><?php echo htmlentities($sh_row['pkg_name']); ?></b><br><span style="font-size: 18px; color: rgba(180, 17, 17, 0.945);"><b>Starting from <?php echo htmlentities($sh_row['pkg_amount']); ?> per person.</b></span></h5>
                                <p style="font-family: 'Poppins'; font-size: 15px; color: rgba(255, 255, 255, 0.81); font-weight: 600;"><?php echo htmlentities($sh_row['pkg_des']); ?></p>

                                <a href="book_package.php?pkgId=<?php echo htmlentities($sh_row['pkg_id']); ?>"> <button class="book-now-btn" style="background-color: green; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; font-size: small;" id="bookNowButton" data-package-id="1"><b>Book Now 🏷️</b></button> </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
                }
            }
        ?>
    </div>

    <!-- -- Footer Section Starts Here -- -->
    <footer>
        <div class="foot-container" style="padding-left: 60px;">
            <div class="row" style="width: 1400px; padding-left: 30px;">
                <div class="col-lg-3"> 
                    <h4>- Developed By</h4>
                    <div class="first-item">
                        <ul>
                            <li style="color: white; font-size: smaller;"><b>Bhargab Rudra Kalita</b><br>Roll No: UT-211-0005</li>
                            <li style="color: white; font-size: smaller;"><b>Minisrang Narzary</b><br>Roll No: UT-211-0021</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3" style="padding-left: 30px;">
                    <h4>- Hot Packages</h4>
                    <ul>
                        <li><a href="packages.php">Himachal Pradesh</a></li>
                        <li><a href="packages.php">North-East</a></li>
                        <li><a href="packages.php">Sikkim</a></li>
                        <li><a href="packages.php">Jaipur</a></li>
                    </ul>
                </div>
                <div class="col-lg-3" style="padding-left: 30px;">
                    <h4>- Useful Links</h4>
                    <ul>
                        <li><a href="index.php">Homepage</a></li>
                        <li><a href="#about">About Us</a></li>
                        <li><a href="#services">Services</a></li>
                        <li><a href="#contact">Contact</a></li>
                    </ul>
                </div>
                <div class="col-lg-3" style="padding-left: 30px;">
                    <h4>- Services</h4>
                    <ul>
                        <li><a href="#services">Camping</a></li>
                        <li><a href="#services">Adventure</a></li>
                        <li><a href="#services">Transportation</a></li>
                        <li><a href="#services">Hotels</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <div style="background-color: rgba(0, 0, 0, 0.992); height: 50px;">
        <p style="color: white; font-size: small; text-align: center; padding-top: 10px;"><b>Copyright © 2023-24 Project Work | LCB College</b></p>
    </div>
    <!-- -- Footer Section Ends Here -- -->
</body>
</html>