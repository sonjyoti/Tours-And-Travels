<?php
include '../database/db_config.php';
if (isset($_POST['submitPackage'])) {
    $title = $_POST['packageTitle'];
    $description = $_POST['packageDescription'];
    $amount = $_POST['packageAmount'];
    $subject = $_POST['packageSubject'];

    $image = $_FILES['packageImage'];
    $fileName = $_FILES['packageImage']['name'];
    $fileTmpName = $_FILES['packageImage']['tmp_name'];
    $fileSize = $_FILES['packageImage']['size'];
    $fileError = $_FILES['packageImage']['error'];
    $fileType = $_FILES['packageImage']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png');

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 50000000) {
                $fileNameNew = $title.".".$fileActualExt;
                $fileDestination = '../images/packages/'.$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);

                $sql = "INSERT INTO `Package` (`package_name`, `package_subject`, `package_des`, `amount`, `image`) VALUES (?, ?, ?, ?, ?);";
                $stmt = mysqli_prepare($conn, $sql);
                mysqli_stmt_bind_param($stmt, "sssis", $title, $subject, $description, $amount, $fileDestination);

                if (!mysqli_stmt_execute($stmt)) {
                    mysqli_stmt_error($stmt);
                } else {
                    header ("Location: index.php");
                }
                mysqli_stmt_close($stmt);
                mysqli_close($conn);
                exit; 
            }
            else {
                echo "File is too big";
            }
        }
        else {
            echo "Error uploading the file";
        }
    }
    else{
        echo "Invalid file type";
    }
}