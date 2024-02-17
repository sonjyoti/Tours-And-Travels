<?php 
    include 'includes/auth.php';
    include 'add_packages.php';
    include 'show_packages.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../images/logo-modified.png" type="image/x-icon">
    <title>Admin Packages</title>
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

<body>
    <!-- -- navbar starts here -- -->
    <div class="hero_area">
        <header class="header_section">
            <div class="navbar">
                <nav class="navbar navbar-expand-lg custom_nav-container">
                    <a class="logo" href="index.php" style="margin-left: 0;"><b>Tour & Travels</b></a>
                    <div class="nav-options">
                        <ul class="navbar-nav">
                            <li class="nav-item"><a class="nav-link" href="../admin/index.php"><b>Dashboard</b></a></li>
                            <li class="nav-item active"><a class="nav-link" href="../admin/packages.php"><b>Packages</b></a></li>
                            <li class="nav-item"><a class="nav-link" href="../admin/bookings.php"><b>Bookings</b></a></li>
                            <li class="nav-item"><a class="nav-link" href="../admin/inquiry.php"><b>Inquiry</b></a></li>
                            <li class="nav-item"><a class="nav-link" href="../admin/reviews.php"><b>Reviews</b></a></li>
                        </ul>
                    </div>
                    <div class="btn" style="padding-left: 360px;">
                        <button class="btn-nav" style="width: 100px;">
                            <a href="logout.php" style="color: white; text-decoration: none;"><b>Log-Out </b><i class="fa-solid fa-right-from-bracket"></i></a>
                        </button>
                    </div>
                </nav>
            </div>
        </header>
    </div>
    <!-- -- navbar ends here -- -->

    <!-- --- PacKages Table Starts --- -->
    <div>
        <div>
            <p style="padding-left: 80px; padding-top: 50px; font-size: larger;"><b>Available Packages -</b></p>
            <div class="button-container" style="padding-bottom: 20px;">
                <button class="btn-nav" style="width: 120px;" onclick="openModal()">
                  <a style="color: white; text-decoration: none;"><b>Add Package</b></a>
                </button>
            </div>
        </div>
        
        <div style="padding-left: 120px;">
            <table>
                <tr>
                    <th style="width: 10px;">S.No</th>
                    <th style="width: 100px;">Package</th>
                    <th style="width: 150px;">Amount</th>
                    <th style="width: 200px;">Description</th>
                    <th style="width: 100px;">Action</th>
                </tr>
                <?php
                    if (mysqli_num_rows($pkg_result) == 0) {
                        ?><strong>
                            <?php echo htmlentities("No Packages to show!"); ?>
                        </strong>
                        <?php
                    } else {
                        while ($pkg_row = mysqli_fetch_assoc($pkg_result)) {
                            $count++;
                            ?>
                <tr>
                    <td><?php echo htmlentities($count); ?></td>
                    <td><?php echo htmlentities($pkg_row['pkg_name']); ?></td>
                    <td><?php echo htmlentities($pkg_row['pkg_amount']); ?></td>
                    <td><?php echo htmlentities($pkg_row['pkg_des']); ?></td>
                    <td>
                        <a href="update_package.php?pkgId=<?php echo htmlentities($pkg_row['pkg_id']); ?>" style="color: white; text-decoration: none;"><button style="background-color: green;"><i class="fa-solid fa-pen-to-square"></i></button></a>
                        <a href="delete_package.php?pkgId=<?php echo htmlentities($pkg_row['pkg_id']); ?>" style="color: white; text-decoration: none;"><button style="background-color: red;"><i class="fa-solid fa-trash"></i></button></a>
                    </td>
                </tr>
                <?php
                        }
                    }
                ?>
            </table>
        </div>
    </div>
    <!-- --- PacKages Table Ends --- -->

    <!-- Add Package Modal -->
    <div id="myModal" class="add-modal">
        <div class="edit-modal-content">
            <p style="color: white; font-size: medium; padding-left: 10px;"><b>Add Package</b><span class="edit-close" onclick="closeModal()">&times;</span></p><hr style="background-color: white;">

            <form method="post" enctype="multipart/form-data">
                <div class="form-group" style="padding-left: 5px;">
                    <label for="title" style="color: white;"><b>Package Title:</b></label>
                    <input type="text" name="packageTitle" class="form-control" id="title" placeholder="Enter Title..">

                    <label for="amount" style="color: white; padding-top: 10px;"><b>Amount:</b></label>
                    <input type="text" name="packageAmount" class="form-control" id="amount" placeholder="Enter Amount..">

                    <label for="description" style="color: white; padding-top: 10px;"><b>Subject:</b></label><br>
                    <textarea id="description" name="packageSubject" class="form-control" name="subject" rows="4" placeholder="Enter Description.." required></textarea>

                    <label for="description" style="color: white; padding-top: 10px;"><b>Description:</b></label><br>
                    <textarea id="description" name="packageDescription" class="form-control" name="description" rows="4" placeholder="Enter Description.." required></textarea>

                    <label for="imageInput" style="color: white; padding-top: 10px;"><b>Image: <small style="color: white;">(recomended image resolution - 320x250)</small></b></label><br>
                    <input type="file" class="form-control" id="imageInput" name="packageImage" accept=".jpeg, .jpg, .png" capture="environment" required>
                </div>
                <div style="padding-left: 140px;">
                    <button type="submit" name="submitPackage" style="background-color: green; color: white; height: 40px; width: 200px;"><b>Add Package</b></button>
                    <button type="reset" style="background-color: red; color: white; height: 40px; width: 200px;"><b>Reset</b></button>
                </div> 
            </form>
        </div>
    </div>
    <!-- Add Package Modal Ends -->

    <!-- Edit Modal -->
    <div id="editModal" class="edit-modal">
        <div class="edit-modal-content">
            <p style="color: white; font-size: medium; padding-left: 10px;"><b>Edit Package</b><span class="edit-close" onclick="closeEditModal()">&times;</span></p><hr style="background-color: white;">

            <form method="post" enctype="multipart/form-data" >
                <div class="form-group" style="padding-left: 5px;">
                    <label for="title" style="color: white;"><b>Package Title:</b></label>
                    <input type="text" name="title" class="form-control" id="title" placeholder="Enter Title..">

                    <label for="amount" style="color: white; padding-top: 10px;"><b>Amount:</b></label>
                    <input type="text" name="amount" class="form-control" id="amount" placeholder="Enter Amount..">

                    <label for="description" style="color: white; padding-top: 10px;"><b>Description:</b></label><br>
                    <textarea id="description" name="des" class="form-control" name="description" rows="4" placeholder="Enter Description.." required></textarea>

                    <label for="imageInput" style="color: white; padding-top: 10px;"><b>Image:</b></label><br>
                    <input type="file" class="form-control" id="imageInput" name="image" accept="image/*" capture="environment" required>
                </div>
                <div style="padding-left: 140px;">
                    <button type="submit" name="editPackage" style="background-color: green; color: white; height: 40px; width: 200px;"><b>Update</b></button>
                    <button type="reset" style="background-color: red; color: white; height: 40px; width: 200px;"><b>Reset</b></button>
                </div> 
            </form>
        </div>
    </div>
    <!-- Edit Modal Ends -->

    <!-- Delete Modal -->
    <div id="deleteModal" class="delete-modal">
        <div class="delete-modal-content">
            <p style="color: white; font-size: medium; padding-left: 10px;"><b>Delete Package</b><span class="delete-close" onclick="closeDeleteModal()">&times;</span></p><hr style="background-color: white;">
            
            <div style="padding-top: 20px; padding-left: 10px;">
                <p style="font-size: large; color: white;"><b>Are you sure you want to delete this package?</b></p>
                <div>
                    <button style="background-color: green; width: 80px; height: 40px; color: white; border: none;"><b>Yes</b></button>
                    <button style="background-color: red; width: 80px; height: 40px; color: white;  border: none;"><b>No</b></button>
                </div>
            </div>
        </div>
    </div>
    <!-- Delete Modal Ends -->

    <!-- --- Footer Section --- -->
    <div style="background-color: rgba(0, 0, 0, 0.992); height: 50px; margin-top: 40%;">
        <p style="color: white; font-size: small; text-align: center; padding-top: 10px;"><b>Copyright © 2023-24 Project Work | LCB College</b></p>
    </div>
    <!-- -- Footer Section Ends Here -- -->

    <script>
        function openModal() {
          document.getElementById("myModal").style.display = "block";
        }
      
        function closeModal() {
          document.getElementById("myModal").style.display = "none";
        }
    </script>

    <script>
        // Function to open the edit modal
        function openEditModal() {
            document.getElementById('editModal').style.display = 'block';
        }

        // Function to close the edit modal
        function closeEditModal() {
            document.getElementById('editModal').style.display = 'none';
        }

        // Event listener for the dropdown change
        document.getElementById('editDropdown').addEventListener('change', function() {
            var selectedValue = this.value;
            if (selectedValue === 'edit') {
                openEditModal();
            }
        });
    </script>

    <script>
        // Function to open the delete modal
        function openDeleteModal() {
            document.getElementById('deleteModal').style.display = 'block';
        }

        // Function to close the edit modal
        function closeDeleteModal() {
            document.getElementById('deleteModal').style.display = 'none';
        }

        // Event listener for the dropdown change
        document.getElementById('editDropdown').addEventListener('change', function() {
            var selectedValue = this.value;
            if (selectedValue === 'delete') {
                openDeleteModal();
            }
        });
    </script>
</body>