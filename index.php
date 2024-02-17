<?php 
    include 'includes/auth.php';
    include 'signIn.php';
    include 'signUp.php';
    include 'send_inquiry.php';
    include 'show_reviews.php';
    include 'show_packages.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/logo-modified.png" type="image/x-icon">
    <title>Home</title>
    <!-- -- Slider Stylesheet -- -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />

    <!-- -- Font Style -- -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700&display=swap" rel="stylesheet">

    <!-- -- Bootstrap -- -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

    <!-- -- Custom Stylesheet -- -->
    <link rel="stylesheet" href="css/style.css">
    <link href="css/responsive.css" rel="stylesheet" />

</head>

<body>
    <!-- -- navbar starts here -- -->
    <div class="hero_area">
        <header class="header_section">
            <div class="navbar">
                <nav class="navbar navbar-expand-lg custom_nav-container">
                    <a class="logo" href="index.php" style="margin-left: 0;"><b>Tour & Travels</b></a>
                    <div class="nav-options">
                        <ul class="navbar-nav">
                            <li class="nav-item active"><a class="nav-link" href="index.php"><b>Home</b></a></li>
                            <li class="nav-item"><a class="nav-link" href="packages.php"><b>Packages</b></a></li>
                            <li class="nav-item"><a class="nav-link" href="#contact"><b>Contact Us</b></a></li>
                            <li class="nav-item"><a class="nav-link" href="#about"><b>About Us</b></a></li>
                        </ul>
                    </div>
                    <div class="btn">
                        <button class="btn-nav" data-toggle="modal" data-target="#loginModal" id="signIn" onclick="sessionCheck()">
                            <a class="button login-btn" style="color: white;"><b>Sign In</b></a>
                        </button>
                        <button class="btn-nav" data-toggle="modal" data-target="#registerModal" onclick="sessionCheck()">
                            <a class="button login-btn" style="color: white;"><b>Sign Up</b></a>
                        </button>
                    </div>
                </nav>
            </div>
        </header>
    </div>
    <!-- -- navbar ends here -- -->
    
    <!-- Login Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" style="padding-top: 150px; padding-left: 10px;">
            <div class="modal-content" style="background-color: rgba(0, 0, 0, 0.818); color: white;">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel"><b>Sign In</b></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Login Form -->
                    <form method="post">
                        <div class="form-group">
                            <label for="username"><b>Username:</b></label>
                            <input type="text" class="form-control" id="username" name="logUsername" placeholder="Enter your username">

                            <label for="password"><b>Password:</b></label>
                            <input type="password" class="form-control" id="password" name="logPassword" placeholder="Enter your password">

                            <p style="color: white; text-align: center;">Forgot Password? <a style="color: rgb(55, 138, 227); border-radius: 5px; cursor: pointer;" data-toggle="modal" data-target="#recoveryModal" onclick="closeLoginModal()"><b>Click Here</b></a></p>
                        </div>
                        <button type="submit" name="loginSubmit" style="background-color: green; color: white; height: 40px;"><b>Sign In</b></button>
                        <p style="text-align: center;">Haven't registered yet? <a style="color: rgb(55, 138, 227); cursor: pointer;" data-toggle="modal" data-target="#registerModal" onclick="closeLoginModal()"><b>Register Here</b> </a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Register Modal -->
    <div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" style="padding-top: 100px; padding-left: 10px;">
            <div class="modal-content" style="background-color: rgba(0, 0, 0, 0.818); width: 500px; color: white;">
                <div class="modal-header" style="width: 500px;">
                    <h5 class="modal-title" id="registerModalLabel">Sign Up</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="width: 500px;">
                    <!-- Registration form -->
                    <form method="post">
                        <div class="form-group">
                            <label for="name"><b>Name:</b></label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Enter your name">

                            <label for="username"><b>Username:</b></label>
                            <input type="text" class="form-control" name="username" id="username" placeholder="Enter your username">

                            <label for="email"><b>Email:</b></label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email">

                            <label for="phone"><b>Phone:</b></label>
                            <input type="text" name="phone" class="form-control" id="phone" placeholder="Enter your phone">

                            <label for="password"><b>Password:</b></label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password">

                            <label for="conpassword"><b>Confirm Password:</b></label>
                            <input type="password" class="form-control" id="conpassword" placeholder="Enter your password">

                            <div style="padding-top: 10px; padding-bottom: 10px;">
                                <button type="submit" style="background-color: green; color: white; height: 40px; width: 470px;" name="regSubmit"><b>Sign Up</b></button>
                                <p style="text-align: center;">Already registered? <a style="color: rgb(55, 138, 227); cursor: pointer;" data-toggle="modal" data-target="#loginModal" onclick="closeRegisterModal()"><b>Login Here</b> </a></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Password-Recovery Modal -->
    <div class="modal fade" id="recoveryModal" tabindex="-1" role="dialog" aria-labelledby="recoveryModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" style="padding-top: 150px; padding-left: 10px;">
            <div class="modal-content" style="background-color: rgba(0, 0, 0, 0.818); width: 500px; color: white;">
                <div class="modal-header" style="width: 500px;">
                    <h5 class="modal-title" id="registerModalLabel">Reset Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="width: 500px;">
                    <form method="post">
                        <label for="resusername"><b>Username:</b></label>
                        <input type="text" class="form-control" name="resuname" id="resusername" placeholder="Enter your username">

                        <label for="respassword"><b>New Password:</b></label>
                        <input type="password" class="form-control" id="respassword" name="respass" placeholder="Enter your new password">

                        <label for="password"><b>Confirm Password:</b></label>
                        <input type="password" class="form-control" id="password" placeholder="Confirm your password">
                        <p style="text-align: center; color: red;"><b>* Make sure you've set a new password!</b></p>

                        <button type="submit" name="resSubmit" style="background-color: green; color: white; height: 40px; width: 468px;"><b>Reset Password</b></button>
                        
                        <a style="color: rgb(55, 138, 227); padding-left: 160px;" data-toggle="modal" data-target="#loginModal" onclick="closeRecoveryModal()"><b><p style="cursor: pointer;">Click here to Login!</p></b> </a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- -- Image Slider Section starts here -- -->
    <div class="slider-container">
        <div class="slider">
            <div class="slide"><img src="images/bgg2.jpg" alt="Image 1"></div>
            <div class="slide"><img src="images/bgg1.jpg" alt="Image 2"></div>
            <div class="slide"><img src="images/bgg3.jpg" alt="Image 3"></div>
            <div class="slide"><img src="images/bgg4.jpg" alt="Image 4"></div>
        </div>
        <button class="prev" onclick="prevSlide()">❮</button>
        <button class="next" onclick="nextSlide()">❯</button>
    </div>
    <!-- -- Image Slider Section ends here -- -->

    <!-- -- Packages Starts here -- -->
    <section>
        <div class="pg-container">
            <p><b>Top Selling Packages</b><br><span><b><i>"Embark on unforgettable adventures with our top-selling tour packages!"</i></b></span></p>
        </div>
        <div class="pg-bg">
            <div class="packages">
                <?php
                if (mysqli_num_rows($sh_result) == 0) {
                    ?><strong>
                        <?php echo htmlentities("No Packages to show!"); ?>
                    </strong>
                    <?php
                } else { ?>
                    <?php
                    while ($sh_row = mysqli_fetch_assoc($sh_result)) {
                        if ($count == 9) {
                            break;
                        }
                        $count++;
                        $cleanedPath = str_replace('../', '', $sh_row['pkg_image']);
                    ?>
                    <!-- First Row -->
                    <div class="column">
                        <div class="pg-img">
                            <a href="packages.php"><img src="<?php echo htmlentities($cleanedPath); ?>" style="height: 250px; width: 330px;"></a>
                        </div>
                        <div style="padding: 10px; font-family: 'Poppins'; font-size: large;">
                            <h7><b><?php echo htmlentities($sh_row['pkg_name']); ?></b><br><span style="font-size: small; color: rgba(180, 17, 17, 0.945);"><b>Starting from <?php echo htmlentities($sh_row['pkg_amount']); ?> per person.</b></span></h7>
                            <p style="font-family: 'Poppins'; font-size: small;"><?php echo htmlentities($sh_row['pkg_sbj']); ?></p>
                        </div>
                    </div>
                    <?php 
                    }   
                } ?>
            </div>
        </div>
    </section>
    <!-- -- Packages Ends here -- -->

    <!-- -- Servivces starts here -- -->
    <section id="services">
        <div class="pg-container">
            <p><b>Our Services</b><br><span><b><i>"Elevate your experience with our exceptional services – where advanture meets your every need."</i></b></span></p>
        </div>
        <div class="services">
            <div class="ser-column">
                <div class="pg-img">
                    <img src="images/Bonfire.png" style="height: 230px; width: 250px;">
                </div>
                <div style="padding: 10px; font-size: medium; font-family: 'Poppins'; font-weight: 600;">
                    <p><b>CAMP FIRE</b><br><span style="font-size: small; color: rgba(180, 17, 17, 0.945);"><b>Starting at 300 per person.</b></span></p>
                </div>
            </div>
    
            <div class="ser-column">
                <div class="pg-img">
                    <img src="images/Camping.png" style="height: 230px; width: 250px;">
                </div>
                <div style="padding: 10px; font-size: medium; font-family: 'Poppins'; font-weight: 600;">
                    <p><b>CAMPING</b><br><span style="font-size: small; color: rgba(180, 17, 17, 0.945);"><b>Starting at 600 per person.</b></span></p>
                </div>
            </div>
    
            <div class="ser-column">
                <div class="pg-img">
                    <img src="images/Hotel.png" style="height: 230px; width: 250px;">
                </div>
                <div style="padding: 10px; font-size: medium; font-family: 'Poppins'; font-weight: 600;">
                    <p><b>HOTEL STAY</b><br><span style="font-size: small; color: rgba(180, 17, 17, 0.945);"><b>Starting from 1499 onwards.</b></span></p>
                </div>
            </div>

            <div class="ser-column">
                <div class="pg-img">
                    <img src="images/Adventure.png" style="height: 230px; width: 250px;">
                </div>
                <div style="padding: 10px; font-size: medium; font-family: 'Poppins'; font-weight: 600;">
                    <p><b>ADVENTURE</b><br><span style="font-size: small; color: rgba(180, 17, 17, 0.945);"><b>Starting at 600 per person.</b></span></p>
                </div>
            </div>

            <div class="ser-column">
                <div class="pg-img">
                    <img src="images/Travel.png" style="height: 230px; width: 250px;">
                </div>
                <div style="padding: 10px; font-size: medium; font-family: 'Poppins'; font-weight: 600;">
                    <p><b>TRANSPORTATION</b><br><span style="font-size: small; color: rgba(180, 17, 17, 0.945);"><b>Starting from 399/hr.</b></span></p>
                </div>
            </div>
        </div>

    </section>
    <!-- -- Servivces ends here -- -->

    <!-- --- Reviews Section --- -->
    <div class="pg-container">
        <p><b>Customer Reviews</b><br><span><b><i>Captivating testimonials from satisfied customers, showcasing the transformative impact of our services.</i></b></span></p>
    </div>
    <div class="testimonials-container">
        <?php 
            while ($rev_row = mysqli_fetch_assoc($rev_result)) {
            ?>
            <div class="testimonial">
                <div class="testimonial-rating">
                    <?php
                        $rating = $rev_row['rev_rating']; 
                        for ($i=1; $i <= 5; $i++) { 
                            if ($i <= $rating) {
                                echo htmlentities('★');
                            }
                            else{
                                echo htmlentities('☆');
                            }
                        }
                    ?>
                </div>
                <p><b>"<?php echo htmlentities($rev_row['rev_feed']); ?>"</b></p>
                <h5 class="testimonial-author">- <?php echo htmlentities($rev_row['cus_name']); ?></h5>
            </div>
            <?php
            }
        ?>
    </div>
    <!-- --- Reviews Section Ends --- -->

    <!-- -- About Us Starts -- -->
    <div class="pg-container" id="about">
        <p><b>About Us</b><br><span><b><i>Know more about us! - Tour & Travels</i></b></span></p>
    </div>
    
    <div class="contact-container" style="border-radius: 5px; background-color: rgba(0, 0, 0, 0.786); border-radius: 10px;">
        <div style="max-width: 1200px; overflow: hidden; display: flex;">
            <p class="about-description"><b>Welcome to our Tour & Travel hub, where each journey is a story waiting to be told. Immerse yourself in unforgettable adventures as we curate unique travel experiences tailored to your desires. Our dedicated team of explorers is passionate about crafting seamless itineraries that unveil the world's wonders. From tranquil escapes to thrilling expeditions, we promise a personalized touch that transforms your travel dreams into reality. Let us guide you through enchanting landscapes, vibrant cultures, and hidden gems. Embark on a voyage with us, and let the world become your playground. Your extraordinary travel tale begins here.</b></p>
        </div>
    </div>
    
     <!-- -- Contact Us Starts -- -->
    <div class="pg-container" id="contact">
        <p><b>Contact Us</b><br><span><b><i>Connect with us effortlessly for any inquiries or assistance- reach out through the contact form below!</i></b></span></p>
    </div>
    <div class="contact-container" style="border-radius: 5px;">
        <div style="max-width: 1200px; overflow: hidden; display: flex;">
            <div style="box-sizing: border-box;">
                <img src="images/travel2.png" style="height: 430px; width: 430px; max-width: 100%; display: block; margin: 0 auto; border-radius: 2px;">
            </div>
    
            <div style="flex: 1; padding-left: 40px; box-sizing: border-box;">
                <form style="width: 700px;" method="post">
                    <label style="color: white;"><b>Name:</b></label>
                    <input type="text" id="name" name="name" placeholder="Enter Your Name.." required>

                    <label style="color: white;"><b>Email:</b></label>
                    <input type="email" id="email" name="email" placeholder="Enter Your Email.." required>

                    <label style="color: white;"><b>Message:</b></label>
                    <textarea id="message" name="message" rows="4" placeholder="Enter Your Message.." required></textarea>

                    <input type="submit" name="submitInquiry" value="Send Message" style=" color: #fff; font-weight: 500; cursor: pointer; width: 100%; padding: 10px;">
                </form>
            </div>
        </div>
    </div>
    <!-- -- Contact Us Ends -- -->

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

    <script>
        function sessionCheck() {
            if (sessionStorage.getItem('adminId')) {
                window.location.href = 'admin/index.php';
            } else if (sessionStorage.getItem('customerId')) {
                window.location.href = 'customer/index.php';
            }
        }
    </script>

    <script>
        function closeRegisterModal() {
            $('#registerModal').modal('hide');
        }
    </script>

    <script>
        function closeLoginModal() {
            $('#loginModal').modal('hide');
        }
    </script>

    <script>
        function closeRecoveryModal() {
            $('#recoveryModal').modal('hide');
        }
    </script>
        
    <script>
        let currentTestimonial = 0;
        const testimonials = document.querySelectorAll('.testimonial');

        function showTestimonial(index) {
            testimonials.forEach((testimonial, i) => {
                if (i === index) {
                    testimonial.style.display = 'block';
                } else {
                    testimonial.style.display = 'none';
                }
            });
        }

        function nextTestimonial() {
            currentTestimonial = (currentTestimonial + 1) % testimonials.length;
            showTestimonial(currentTestimonial);
        }

        function prevTestimonial() {
            currentTestimonial = (currentTestimonial - 1 + testimonials.length) % testimonials.length;
            showTestimonial(currentTestimonial);
        }

        function autoSlide() {
            nextTestimonial();
        }

        // Set automatic slider interval (change the interval time as needed)
        setInterval(autoSlide, 5000); // Auto slide every 5 seconds

        // Show the first testimonial initially
        showTestimonial(currentTestimonial);
    </script>

    <script>
        let currentIndex = 0;

        function showSlide(index) {
            const slider = document.querySelector('.slider');
            const slides = document.querySelectorAll('.slide');
            if (index >= slides.length) {
                currentIndex = 0;
            } else if (index < 0) {
                currentIndex = slides.length - 1;
            } else {
                currentIndex = index;
            }
            slider.style.transform = `translateX(${-currentIndex * 100}%)`;
        }

        function prevSlide() {
            showSlide(currentIndex - 1);
        }

        function nextSlide() {
            showSlide(currentIndex + 1);
        }

        setInterval(nextSlide, 5000); 
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>