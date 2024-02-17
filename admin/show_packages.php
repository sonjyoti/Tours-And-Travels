<?php
    $sql = "SELECT `Package`.`id` AS `pkg_id`, `Package`.`package_name` AS `pkg_name`, `Package`.`amount` AS `pkg_amount`, `Package`.`package_subject` AS `pkg_sbj`, `Package`.`package_des` AS `pkg_des` FROM `Package`";

    $stmt = mysqli_prepare($conn, $sql);
    if (!mysqli_stmt_execute($stmt)) {
        mysqli_stmt_error($stmt);
    } else {
        $pkg_result = mysqli_stmt_get_result($stmt);
        $count = 0;
    }
