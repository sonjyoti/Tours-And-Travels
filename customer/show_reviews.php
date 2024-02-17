<?php
    $sql = "SELECT `Customer`.`name` AS `cus_name`, `Feedback`.`rating` AS `rev_rating`, `Feedback`.`feedback` AS `rev_feed` FROM `Feedback`, `Package`, `Customer` WHERE `Feedback`.`customer_id` = `Customer`.`id` AND `Feedback`.`package_id` = `Package`.`id`;";

    $stmt = mysqli_prepare($conn, $sql);
    if (!mysqli_stmt_execute($stmt)) {
        mysqli_stmt_error($stmt);
    } else {
        $rev_result = mysqli_stmt_get_result($stmt);
    }
