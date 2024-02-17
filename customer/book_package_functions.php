<?php 
    include '../database/db_config.php';
    if (isset($_POST['book'])) {
        date_default_timezone_set('Asia/Kolkata');
        $customerId = $_SESSION['customerId'];
        $book_date = date('Y-m-d');
        $book_time = date('H:i:s');
        $trip_date = $_POST['date'];
        $persons = $_POST['persons'];
        $days = $_POST['days'];
        $status = "Pending";
        $packageId = $_GET['pkgId'];

        $sql = "INSERT INTO `Booking` (`customer_id`, `package_id`, `trip_date`, `persons`, `days`, `book_date`, `book_time`, `status`) VALUES (?, ?, ?, ?, ?, ?, ?, ?);";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "iisiisss", $customerId, $packageId, $trip_date, $persons, $days, $book_date, $book_time, $status);

        if (!mysqli_stmt_execute($stmt)) {
            mysqli_stmt_error($stmt);
        } else {
            header ("Location: includes/redirect.php");
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        exit;
    }