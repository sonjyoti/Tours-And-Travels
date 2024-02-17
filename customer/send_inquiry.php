<?php
    if (isset($_POST['submitInquiry'])) {
        date_default_timezone_set('Asia/Kolkata');
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        $date = date('Y-m-d');
        $time = date('H:i:s');

        $sql = "INSERT INTO `Inquiry` (`name`, `email`, `message`, `date`, `time`) VALUES(?, ?, ?, ?, ?);";

        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "sssss", $name, $email, $message, $date, $time);
        if (!mysqli_stmt_execute($stmt)) {
            mysqli_stmt_error($stmt);
        } else {
            header("Location: includes/redirect.php");
        }
    }