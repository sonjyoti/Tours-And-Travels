<?php
    include '../database/db_config.php';
    if(isset($_GET['feedId'])){
        $feed_id = $_GET['feedId'];
        $sql = "DELETE FROM `Feedback` WHERE `Feedback`.`id` = ?";

        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "i", $feed_id);
        if (!mysqli_stmt_execute($stmt)) {
            mysqli_stmt_error($stmt);
        } else {
            header("Location: includes/redirect.php");
        }
    }