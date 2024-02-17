<?php
    if(isset($_POST['regSubmit'])){
        $name = $_POST['name'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];

        $sql = "INSERT INTO `Customer` (`name`, `username`, `password`, `email`, `phone`) VALUES (?, ?, ?, ?, ?);";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "sssss", $name, $username, $password, $email, $phone);

        if (!mysqli_stmt_execute($stmt)) {
            mysqli_stmt_error($stmt);
        } else {
            header ("Location: index.php#loginModal");
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        exit;
    }