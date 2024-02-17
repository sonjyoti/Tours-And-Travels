<?php
    include '../database/db_config.php';
    if(isset($_GET['pkgId'])){
        $pkg_id = $_GET['pkgId'];
        $sql = "DELETE FROM `Package` WHERE `Package`.`id` = ?";

        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "i", $pkg_id);
        if (!mysqli_stmt_execute($stmt)) {
            mysqli_stmt_error($stmt);
        } else {
            header("Location: includes/redirect.php");
        }
    }