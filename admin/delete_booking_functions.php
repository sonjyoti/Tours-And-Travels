<?php
    include '../database/db_config.php';
    if(isset($_GET['bookId'])){
        $book_id = $_GET['bookId'];
        $sql = "DELETE FROM `Booking` WHERE `Booking`.`id` = ?";

        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "i", $book_id);
        if (!mysqli_stmt_execute($stmt)) {
            mysqli_stmt_error($stmt);
        } else {
            header("Location: includes/redirect.php");
        }
    }