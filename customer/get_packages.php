<?php
    $customerId = $_SESSION['customerId'];
    $status = "Done";
    $sql = "SELECT `Booking`.`package_id` AS `pkg_id`, `Package`.`package_name` AS `pkg_name` FROM `Package`, `Booking`, `Customer` WHERE `Booking`.`customer_id` = `Customer`.`id` AND `Booking`.`package_id` = `Package`.`id` AND `Booking`.`customer_id` = ? AND `Booking`.`status` = ?;";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "is", $customerId, $status);
    if (!mysqli_stmt_execute($stmt)) {
        mysqli_stmt_error($stmt);
    } else {
        $get_pkg_result = mysqli_stmt_get_result($stmt);
    } 