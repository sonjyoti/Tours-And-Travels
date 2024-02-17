<?php
    include '../database/db_config.php';
    $sql = "SELECT `Inquiry`.`id` AS `inq_id`, `Inquiry`.`email` AS `inq_email`, `Inquiry`.`name` AS `inq_name`, `Inquiry`.`message` AS `inq_msg`, `Inquiry`.`date` AS `inq_date`, `Inquiry`.`time` AS `inq_time` FROM `Inquiry`";

    $stmt = mysqli_prepare($conn, $sql);
    if (!mysqli_stmt_execute($stmt)) {
        mysqli_stmt_error($stmt);
    } else {
        $inq_result = mysqli_stmt_get_result($stmt);
        $count = 0;
    }
