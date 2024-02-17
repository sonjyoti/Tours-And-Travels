
<?php
    include 'includes/auth.php';
    include '../database/db_config.php';
    include 'show_packages.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../images/logo-modified.png" type="image/x-icon">
    <title>Edit Packages</title>
    <!-- -- Slider Stylesheet -- -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />

    <!-- -- Font Style -- -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>

    <!-- -- Bootstrap -- -->
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css" />

    <!-- -- Custom Stylesheet -- -->
    <link rel="stylesheet" href="../css/admin.css">
    <link href="../css/responsive.css" rel="stylesheet" />

</head>

<body style="background-color: gray;">
    <div class="edit-modal-content">
        <p style="color: white; font-size: medium; padding-left: 10px;"><b>Edit Package</b><a href="packages.php"><span class="edit-close" onclick="closeEditModal()">&times;</span></a></p><hr style="background-color: white;">

        <form method="post" action="update_package_functions.php">
            <div class="form-group" style="padding-left: 5px;">
            <?php   
            $pkg_id = $_GET['pkgId'];
            while ($pkg_row = mysqli_fetch_assoc($pkg_result)) {
                if ($pkg_row['pkg_id'] == $pkg_id) { ?>
                    <label for="title" style="color: white;"><b>Package Title:</b></label>
                    <input type="text" name="packageTitle" class="form-control" id="title" placeholder="<?php echo htmlentities($pkg_row['pkg_name']); ?>" required>

                    <label for="amount" style="color: white; padding-top: 10px;"><b>Amount:</b></label>
                    <input type="text" name="packageAmount" class="form-control" id="amount" placeholder="<?php echo htmlentities($pkg_row['pkg_amount']); ?> per person" required>
                    
                    <label for="subject" style="color: white; padding-top: 10px;"><b>Subject:</b></label><br>
                    <textarea id="subject" class="form-control" name="packageSubject" rows="4" placeholder="<?php echo htmlentities($pkg_row['pkg_sbj']); ?>" required></textarea>

                    <label for="description" style="color: white; padding-top: 10px;"><b>Description:</b></label><br>
                    <textarea id="description" class="form-control" name="packageDescription" rows="4" placeholder="<?php echo htmlentities($pkg_row['pkg_des']); ?>" required></textarea>

                    <label for="imageInput" style="color: white; padding-top: 10px;"><b>Image: <small style="color: white;">(recomended image resolution - 320x250)</small></b></label><br>
                    <input type="file" class="form-control" id="imageInput" name="packageImage" accept="image/*" capture="environment" required>
                </div>
                <div style="padding-left: 5px;">
                    <a href="update_package_functions.php?pkgId=<?php echo htmlentities($pkg_id); ?>"><button name="updatePackage" type="submit" style="background-color: green; color: white; height: 40px; width: 325px;"><b>Update</b></button></a>
                    <button type="reset" style="background-color: red; color: white; height: 40px; width: 325px;"><b>Reset</b></button>
                </div> 
                <?php 
                }
            }
            ?>
        </form>
    </div>
</body>