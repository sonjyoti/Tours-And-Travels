<?php 
    include 'includes/auth.php';
    include 'show_reviews.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../images/logo-modified.png" type="image/x-icon">
    <title>Admin Reviews</title>
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
                            <li class="nav-item"><a class="nav-link" href="../admin/packages.php"><b>Packages</b></a></li>
                            <li class="nav-item"><a class="nav-link" href="../admin/bookings.php"><b>Bookings</b></a></li>
                            <li class="nav-item"><a class="nav-link" href="../admin/inquiry.php"><b>Inquiry</b></a></li>
                            <li class="nav-item  active"><a class="nav-link" href="../admin/reviews.php"><b>Reviews</b></a></li>
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

    <!-- --- Inquiry Table Starts --- -->
    <div>
        <div>
            <p style="padding-left: 80px; padding-top: 50px; font-size: larger;"><b>Ratings & Reviews List -</b></p>
        </div>
        
        <div style="padding-left: 120px; margin-top: 2%;">
            <table>
                <tr>
                    <th style="width: 10px;">S.No</th>
                    <th style="width: 100px;">Date</th>
                    <th style="width: 100px;">Time</th>
                    <th style="width: 120px;">Username</th>
                    <th style="width: 150px;">Ratings</th>
                    <th style="width: 550px;">Feedback</th>
                    <th style="width: 120px;">Package</th>
                    <th style="width: 120px;">Action</th>
                </tr>
                <?php
                    if (mysqli_num_rows($rev_result) == 0) {
                        ?><strong>
                            <?php echo htmlentities("No Packages to show!"); ?>
                        </strong>
                        <?php
                    } else {
                        while ($rev_row = mysqli_fetch_assoc($rev_result)) {
                            $count++;
                            ?>
                <tr>
                    <td><?php echo htmlentities($count); ?></td>
                    <td><?php echo htmlentities(date('d/m/Y', strtotime($rev_row['rev_date']))); ?></td>
                    <td><?php echo htmlentities($rev_row['rev_time']); ?></td>
                    <td><?php echo htmlentities($rev_row['rev_uname']); ?></td>
                    <td>
                        <?php
                            $rating = $rev_row['rev_rating']; 
                            for ($i=1; $i <= 5; $i++) { 
                                if ($i <= $rating) {
                                    echo htmlentities('★');
                                }
                                else{
                                    echo htmlentities('☆');
                                }
                            }
                        ?>
                    </td>
                    <td><?php echo htmlentities($rev_row['rev_feed']); ?></td>
                    <td><?php echo htmlentities($rev_row['pkg_name']); ?></td>
                    <td>
                        <button style="background-color: red;"><a href="delete_review.php?feedId=<?php echo htmlentities($rev_row['feed_id']); ?>" style="color: white; text-decoration: none;"><i class="fa-solid fa-trash"></i></a></button>
                    </td>
                </tr>
                <?php
                        }
                    }
                ?>
            </table>
        </div>

        <div class="button-container">
            <button class="prev-next-button" onclick="showPrevious()">Previous</button>
            <button class="prev-next-button" onclick="showNext()">Next</button>
        </div>
    </div>
    <!-- --- Inquiry Table Ends --- -->

    <!-- View Modal -->
    <div id="editModal" class="edit-modal">
        <div class="edit-modal-content" style="height: 430px; width: 580px;">
            <p style="color: white; font-size: medium; padding-left: 10px;"><b>View Feedbacks</b><span class="edit-close" onclick="closeEditModal()">&times;</span></p><hr style="background-color: white;">

            <div class="bk-modal-body" style="width: 500px; color: white; padding-left: 10px;">
                <label for="username"><b>Username:</b></label>
                <input type="text" class="form-control" id="date" style="width: 530px;">

                <label for="username"><b>Ratings:</b></label>
                <input type="text" class="form-control" id="date" style="width: 530px;">

                <label for="username"><b>Feedback:</b></label>
                <input type="text" class="form-control" id="number" style="width: 530px; height: 100px;">

                <div style="padding-top: 10px; padding-bottom: 10px;">
                    <button type="update" style="background-color: green; color: white; height: 40px; width: 530px;"><b>Mark As Read</b></button>
                </div>
            </div>
        </div>
    </div>
    <!-- View Modal Ends -->

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

    <!-- -- Javascript for View Modal -- -->
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
            if (selectedValue === 'view') {
                openEditModal();
            }
        });
    </script>

    <!-- -- Javascript for Delete Modal -- -->
    <script>
        function openDeleteModal() {
            document.getElementById('deleteModal').style.display = 'block';
        }

        function closeDeleteModal() {
            document.getElementById('deleteModal').style.display = 'none';
        }

        document.getElementById('editDropdown').addEventListener('change', function() {
            var selectedValue = this.value;
            if (selectedValue === 'delete') {
                openDeleteModal();
            }
        });
    </script>
</body>