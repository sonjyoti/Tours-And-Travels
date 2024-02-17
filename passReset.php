<?php 
    if (isset($_POST['resSubmit'])) {
        $username = $_POST['resuname'];
        $password = $_POST['respass'];

        $sql = "UPDATE `Customer` SET `password` = ? WHERE `username` = ?;";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ss", $password, $username);
        if (!mysqli_stmt_execute($stmt)) {
            mysqli_stmt_error($stmt);
        } else {
            header ("Location: index.php");
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        exit();
    }
