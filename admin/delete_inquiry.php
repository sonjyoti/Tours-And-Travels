<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../images/logo-modified.png" type="image/x-icon">
    <title>Delete Inquiry</title>
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

<body style="background-color: gray;">
    <div class="delete-modal-content">
        <p style="color: white; font-size: medium; padding-left: 10px;"><b>Delete Inquiry</b><a href="packages.php"><span class="delete-close">&times;</span></a></p><hr style="background-color: white;">
        
        <div style="padding-top: 20px; padding-left: 10px;">
            <p style="font-size: large; color: white;"><b>Are you sure you want to delete this inquiry?</b></p>
            <div>
                <a href="delete_inquiry_functions.php?inqId=<?php echo htmlentities($_GET['inqId']); ?>"> <button style="background-color: green; width: 100px; height: 40px; color: white; border-radius: 2px;"><b>Yes</b></button> </a>
                <a href="inquiry.php"> <button style="background-color: red; width: 100px; height: 40px; color: white;  border-radius: 2px;"><b>No</b></button> </a>
            </div>
        </div>
    </div>
</body>