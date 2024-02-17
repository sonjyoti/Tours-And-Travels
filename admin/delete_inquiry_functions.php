<?php
    include '../database/db_config.php';
    if(isset($_GET['inqId'])){
        $inq_id = $_GET['inqId'];
        $sql = "DELETE FROM `Inquiry` WHERE `Inquiry`.`id` = ?";

        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "i", $inq_id);
        if (!mysqli_stmt_execute($stmt)) {
            mysqli_stmt_error($stmt);
        } else {
            header("Location: includes/redirect.php");
        }
    }