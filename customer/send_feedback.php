<?php 
    if (isset($_POST['submitFeedback'])) {
        date_default_timezone_set('Asia/Kolkata');
        $customerId = $_SESSION['customerId'];
        $pkg_id = $_POST['pkg_id'];
        $rating = $_POST['rating'];
        $feedback = $_POST['feedback'];
        $date = date('Y-m-d');
        $time = date('H:i:s');


        $sql = "INSERT INTO `Feedback` (`customer_id`, `package_id`, `rating`, `feedback`, `date`, `time`) VALUES (?, ?, ?, ?, ?, ?);";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "iiisss", $customerId, $pkg_id, $rating, $feedback, $date, $time);
        if (!mysqli_stmt_execute($stmt)) {
            mysqli_stmt_error($stmt);
        } else {
            header("Location: includes/redirect.php");
        }
    }