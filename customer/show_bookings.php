<?php 
    include('../database/db_config.php');
    $customerId = $_SESSION['customerId'];

    $sql = "SELECT `Booking`.`id` AS `book_id`, `Package`.`package_name` AS `pkg_name`, `Booking`.`book_date` AS `book_date`, `Booking`.`book_time` AS `book_time`, `Booking`.`days` AS `book_days`, `Booking`.`trip_date` AS `trip_date`, `Booking`.`persons` AS `book_person`, `Booking`.`status` AS `book_status` FROM `Booking`, `Package`, `Customer` WHERE `Booking`.`customer_id` = `Customer`.`id` AND `Booking`.`package_id` = `Package`.`id` AND `Booking`.`customer_id` = ?;";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $customerId);
    if (!mysqli_stmt_execute($stmt)) {
        mysqli_stmt_error($stmt);
    } else {
        $book_result = mysqli_stmt_get_result($stmt);
        $count = 0;
    }