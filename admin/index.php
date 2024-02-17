<?php 
    include 'includes/auth.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../images/logo-modified.png" type="image/x-icon">
    <title>Admin Dashboard</title>
    <!-- -- Slider Stylesheet -- -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />

    <!-- -- Font Style -- -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>

    <!-- -- Bootstrap -- -->
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css" />

    <!-- -- Custom Stylesheet -- -->
    <link rel="stylesheet" href="../css/admin.css">
    <link href="../css/responsive.css" rel="stylesheet" />

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
                            <li class="nav-item active"><a class="nav-link" href="../admin/index.php"><b>Dashboard</b></a></li>
                            <li class="nav-item"><a class="nav-link" href="../admin/packages.php"><b>Packages</b></a></li>
                            <li class="nav-item"><a class="nav-link" href="../admin/bookings.php"><b>Bookings</b></a></li>
                            <li class="nav-item"><a class="nav-link" href="../admin/inquiry.php"><b>Inquiry</b></a></li>
                            <li class="nav-item"><a class="nav-link" href="../admin/reviews.php"><b>Reviews</b></a></li>
                        </ul>
                    </div>
                    <div class="btn" style="padding-left: 360px;">
                        <button class="btn-nav" style="width: 100px;">
                            <a href="logout.php" style="color: white; text-decoration: none;"><b>Log-Out </b><i class="fa-solid fa-right-from-bracket"></i></a>
                        </button>
                    </div>
                </nav>
            </div>
        </header>
    </div>
    <!-- -- navbar ends here -- -->

    <!-- Admin Profile Modal -->
    <!-- <div id="adminModal" class="ad-modal">
        <div class="profile-modal-content" style="background-color: black; width: 600px; height: 510px; border-radius: 8px;">
            <div style="padding: 20px;">
                <p style="color: white; font-size: medium; text-align: left; padding-left: 10px;"><b>Admin Profile</b><span style="cursor: pointer; color: white; float: right; font-weight: bold; font-size: large; padding-bottom: 10px; padding-right: 10px;" onclick="closeModal()">&times;</span></p>
                <hr style="background-color: white; width: 460px; padding-left: 80px;">
                <div class="profile-modal-body" style="width: 500px;">
                    <div style="padding-left: 10px;">
                        <label for="username"><b>Name:</b></label>
                        <input type="text" class="form-control" id="username" style="width: 540px;" placeholder="Admin">

                        <label for="username"><b>Email:</b></label>
                        <input type="email" class="form-control" id="email" style="width: 540px;" placeholder="Admin@hotmail.com">

                        <label for="username"><b>Username:</b></label>
                        <input type="text" class="form-control" id="username" style="width: 540px;" placeholder="Admin@123">

                        <label for="username"><b>Phone No:</b></label>
                        <input type="text" class="form-control" id="username" style="width: 540px;" placeholder="Add your phone number">

                        <label for="password"><b>Password:</b></label>
                        <input type="password" class="form-control" id="password" style="width: 540px;" placeholder="Set Password">

                        <div style="padding-top: 10px;">
                            <button type="submit" style="background-color: green; color: white; height: 40px; width: 540px; border-radius: 5px;"><b>Update Profile</b></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

    <!-- -- Image Slider Section starts here -- -->
    <div class="slider-container">
        <div class="slider">
            <div class="slide"><img src="../images/2.png" alt="Image 1"></div>
            <div class="slide"><img src="../images/1.png" alt="Image 2"></div>
            <div class="slide"><img src="../images/3.png" alt="Image 3"></div>
            <div class="slide"><img src="../images/4.png" alt="Image 4"></div>
            <!-- Add more slides as needed -->
        </div>
        <button class="prev" onclick="prevSlide()">❮</button>
        <button class="next" onclick="nextSlide()">❯</button>
    </div>
    <!-- -- Image Slider Section ends here -- -->

    
    <!-- --- Footer Section --- -->
    <div style="background-color: rgba(0, 0, 0, 0.992); height: 50px;">
        <p style="color: white; font-size: small; text-align: center; padding-top: 10px;"><b>Copyright © 2023-24 Project Work | LCB College</b></p>
    </div>
    <!-- -- Footer Section Ends Here -- -->

    <script>
        // Functions to Open and Close Modal
        function openModal() {
            document.getElementById('adminModal').style.display = 'flex';
        }

        function closeModal() {
            document.getElementById('adminModal').style.display = 'none';
        }

        // Close modal if user clicks outside the modal content
        window.onclick = function(event) {
            if (event.target == document.getElementById('adminModal')) {
                closeModal();
            }
        }
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
</body>