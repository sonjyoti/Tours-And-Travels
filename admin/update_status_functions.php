<?php
    include '../database/db_config.php';
    if (isset($_POST['updateStatus'])) {
        $status = $_POST['status'];
        $book_id = $_GET['bookId'];
        $sql = "UPDATE `Booking` SET `status` = ? WHERE `id` = ?";
    
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "si", $status, $book_id);
        if (!mysqli_stmt_execute($stmt)) {
            mysqli_stmt_error($stmt);
        } else {
            header("Location: includes/redirect.php");
        }
    }
