<?php 
    include 'includes/auth.php';
    include 'book_package_functions.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../images/logo-modified.png" type="image/x-icon">
    <title>Bookings</title>
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
<body style="background-color: gray;">
    <div class="bk-modal-content" style="margin-top: 8%; margin-left: 30%; margin-bottom: 8%;">
        <div class="modal-header" style="width: 550px; padding-top: 0%;">
            <h5 class="modal-title" id="registerModalLabel" style="color: white;">Booking</h5>
            <span style="cursor: pointer; color: white; float: right; font-weight: bold; font-size: large; padding-bottom: 10px;"><a href="packages.php" style="text-decoration: none; font-size: larger; color: white;">&times;</a></span>
        </div>
        <div class="bk-modal-body" style="width: 500px; color: white; padding-left: 10px;">
            <form method="post">
                <label for="date"><b>Select Date:</b></label>
                <input type="date" name="date" class="form-control" id="date" style="width: 530px;">

                <label for="days"><b>Select Number Of Days:</b></label>
                <input type="number" name="days" class="form-control" id="days" style="width: 530px;">

                <label for="persons"><b>Select Number Of Person:</b></label>
                <input type="number" name="persons" class="form-control" id="persons" style="width: 530px;">

                <div style="padding-top: 10px; padding-bottom: 10px;">
                <a href="book_package_functions.php?pkgId=<?php echo htmlentities($_GET['pkgId']); ?>"><button type="submit" name="book" style="background-color: green; color: white; height: 40px; width: 530px;"><b>Book Now 🏷️</b></button> </a>
                </div>
            </form>
        </div>            
    </div>
    
</body>
</html>