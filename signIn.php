<?php
include 'database/db_config.php';
if (isset($_POST['loginSubmit'])) {
    $username = $_POST['logUsername'];
    $password = $_POST['logPassword'];
    $sql = "SELECT `id` FROM `Customer` WHERE `username` = ? AND `password` = ?;";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $username, $password);
    if (!mysqli_stmt_execute($stmt)) {
        mysqli_stmt_error($stmt);
    } else {
        $result = mysqli_stmt_get_result($stmt);
        if(mysqli_num_rows($result) > 0) {
            if($row = mysqli_fetch_assoc($result)){
                $id = $row['id'];
                $_SESSION['customerId'] = $id;
            }
            header ("Location: customer/index.php");
        } else {
            $sql = "SELECT `username` FROM `Admin` WHERE `username` = ? AND `password` = ?;";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "ss", $username, $password);
            if (!mysqli_stmt_execute($stmt)) {
                mysqli_stmt_error($stmt);
            } else {
                $result = mysqli_stmt_get_result($stmt);
                if(mysqli_num_rows($result) > 0) {
                    if($row = mysqli_fetch_assoc($result)){
                        $id = $row['username'];
                        $_SESSION['adminId'] = $id;
                    }
                    header ("Location: admin/index.php");
                } else {
                    header ("Location: includes/redirect.php");
                }
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    exit;
}
    