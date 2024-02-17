<?php
    include '../database/db_config.php';
    $sql = "SELECT `Feedback`.`id` AS `feed_id`, `Customer`.`username` AS `rev_uname`, `Package`.`package_name` AS `pkg_name`, `Feedback`.`rating` AS `rev_rating`, `Feedback`.`feedback` AS `rev_feed`, `Feedback`.`date` AS `rev_date`, `Feedback`.`time` AS `rev_time` FROM `Feedback`, `Package`, `Customer` WHERE `Feedback`.`customer_id` = `Customer`.`id` AND `Feedback`.`package_id` = `Package`.`id`;";

    $stmt = mysqli_prepare($conn, $sql);
    if (!mysqli_stmt_execute($stmt)) {
        mysqli_stmt_error($stmt);
    } else {
        $rev_result = mysqli_stmt_get_result($stmt);
        $count = 0;
    }
