
<?php 
    include 'includes/auth.php';
    include 'show_bookings.php';
    include 'update_status_functions.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../images/logo-modified.png" type="image/x-icon">
    <title>Update Status</title>
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
        <div class="edit-modal-content" style="height: 510px; width: 580px;">
            <p style="color: white; font-size: medium; padding-left: 10px;"><b>Update Status</b><a href="bookings.php"><span class="edit-close">&times;</span></a></p><hr style="background-color: white;">

            <div class="bk-modal-body" style="width: 500px; color: white; padding-left: 10px;">
                <form method="post">
                    <?php   
                        $book_id = $_GET['bookId'];
                        while ($book_row = mysqli_fetch_assoc($book_result)) {
                            if ($book_row['book_id'] == $book_id) { ?>
                                <label for="username"><b>Package:</b></label>
                                <input type="text" placeholder="<?php echo htmlentities($book_row['pkg_name']); ?>" class="form-control" id="date" style="width: 530px;" disabled>

                                <label for="username"><b>Date:</b></label>
                                <input type="text" placeholder="<?php echo htmlentities(date('d/m/Y', strtotime($book_row['trip_date']))); ?>" class="form-control" id="date" style="width: 530px;" disabled>

                                <label for="username"><b>Number Of Days:</b></label>
                                <input type="number" placeholder="<?php echo htmlentities($book_row['book_days']); ?>" class="form-control" id="number" style="width: 530px;" disabled>

                                <label for="username"><b>Number Of Person:</b></label>
                                <input type="number" placeholder="<?php echo htmlentities($book_row['book_person']); ?>" class="form-control" id="number" style="width: 530px;" disabled>

                                <label for="username"><b>Status:</b></label>
                                <select class="form-control" style="width: 530px;" name="status">
                                    <option selected disabled><?php echo htmlentities($book_row['book_status']); ?></option>
                                    <?php if ($book_row['book_status'] == 'Pending') { ?>
                                        <option value="Confirmed">Confirm</option>
                                        <option value="Cancelled">Cancel</option>
                                    <?php } ?>
                                    <?php if ($book_row['book_status'] == 'Confirmed') { ?>
                                        <option value="Done">Done</option>
                                    <?php } ?>
                                </select>

                                <div style="padding-top: 10px; padding-bottom: 10px;">
                                    <a href="update_status_functions.php?bookId=<?php echo htmlentities($book_id); ?>"> <button type="submit" name="updateStatus" style="background-color: green; color: white; height: 40px; width: 530px;"><b>Update</b></button> </a>
                                </div> <?php
                            }
                        }
                    ?>
                </form>
            </div>
        </div>
</body>