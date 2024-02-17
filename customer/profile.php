<?php 
    include 'includes/auth.php';
    include 'show_bookings.php';
    include 'get_packages.php';
    include 'send_feedback.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../images/logo-modified.png" type="image/x-icon">
    <title>DB-Profile</title>
    <!-- -- Slider Stylesheet -- -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />

    <!-- -- Font Style -- -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>

    <!-- -- Bootstrap -- -->
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css" />

    <!-- -- Custom Stylesheet -- -->
    <link rel="stylesheet" href="../css/style.css">
    <link href="../css/responsive.css" rel="stylesheet" />

</head>
<body>
    <!-- -- navbar starts here -- -->
    <div class="hero_area">
        <header class="header_section">
            <div class="navbar">
                <nav class="navbar navbar-expand-lg custom_nav-container">
                    <a class="logo" href="../customer/index.php" style="margin-left: 0;"><b>Tour & Travels</b></a>
                    <div class="nav-options">
                        <ul class="navbar-nav">
                            <li class="nav-item active"><a class="nav-link" href="../customer/index.php"><b>Home</b></a></li>
                            <li class="nav-item"><a class="nav-link" href="../customer/packages.php"><b>Packages</b></a></li>
                            <li class="nav-item"><a class="nav-link" href="../customer/index.php"><b>Contact Us</b></a></li>
                            <li class="nav-item"><a class="nav-link" href="../customer/index.php"><b>About Us</b></a></li>
                        </ul>
                    </div>
                    <div class="btn" style="padding-left: 250px;">
                        <button class="btn-nav"  style="width: 150px;">
                            <a onclick="openModal()" style="color: white; text-decoration: none;"><b>Manage Profile</b></a>
                        </button>
                        <button class="btn-nav" style="width: 100px;">
                            <a href="logout.php" style="color: white; text-decoration: none;"><b>Log-Out </b><i class="fa-solid fa-right-from-bracket"></i></a>
                        </button>
                    </div>
                </nav>
            </div>
        </header>
    </div>
    <!-- -- navbar ends here -- -->

    <!-- Update Profile Modal -->
    <div id="updateProfileModal" class="profile-modal">
        <div class="profile-modal-content">
            <p style="color: white; font-size: medium; text-align: left; padding-left: 10px;"><b>Update Profile</b><span style="cursor: pointer; color: white; float: right; font-weight: bold; font-size: large; padding-bottom: 10px;" onclick="closeModal()">&times;</span></p>
            <hr style="background-color: white;">
            <div class="profile-modal-body" style="width: 500px;">
                <div style="padding-left: 10px;">
                    <label for="username"><b>Name:</b></label>
                    <input type="text" class="form-control" id="username" style="width: 540px;">

                    <label for="username"><b>Email:</b></label>
                    <input type="email" class="form-control" id="email" style="width: 540px;">

                    <label for="username"><b>Username:</b></label>
                    <input type="text" class="form-control" id="username" style="width: 540px;">

                    <label for="username"><b>Phone No:</b></label>
                    <input type="text" class="form-control" id="username" placeholder="Add your phone number" style="width: 540px;">

                    <label for="password"><b>Password:</b></label>
                    <input type="password" class="form-control" id="password" style="width: 540px;">

                    <button type="submit" style="background-color: green; color: white; height: 40px; width: 540px; border-radius: 5px;"><b>Update Profile</b></button>
                </div>
            </div>
        </div>
    </div>

    <!-- --- Booking Table Starts Here --- -->
    <div style="height: 300px; background-color: rgba(0, 0, 0, 0.041);">
        <p style="padding-left: 80px; padding-top: 50px; font-size: larger;"><b>Bookings -</b></p>
        
        <div style="padding-left: 120px; margin-top: 2%;">
            <table>
                <tr>
                    <th style="width: 10px;">S.No</th>
                    <th style="width: 120px;">Date</th>
                    <th style="width: 120px;">Time</th>
                    <th style="width: 300px;">Package</th>
                    <th style="width: 200px;">Schedule</th>
                    <th style="width: 120px;">Days</th>
                    <th style="width: 120px;">Person</th>
                    <th style="width: 150px;">Status</th>
                    <th style="width: 150px;">Action</th>
                </tr>
                <?php
                    if (mysqli_num_rows($book_result) == 0) {
                        ?><strong>
                            <?php echo htmlentities("No Bookings to show!"); ?>
                        </strong>
                        <?php
                    } else {
                        while ($book_row = mysqli_fetch_assoc($book_result)) {
                            $count++;
                            ?>
                            <tr>
                                <td> <?php echo htmlentities($count); ?> </td>
                                <td> <?php echo htmlentities(date('d/m/Y', strtotime($book_row['book_date']))); ?> </td>
                                <td> <?php echo htmlentities($book_row['book_time']); ?> </td>
                                <td> <?php echo htmlentities($book_row['pkg_name']);?> </td>
                                <td> <?php echo htmlentities(date('d/m/Y', strtotime($book_row['trip_date']))); ?> </td>
                                <td>
                                    <input class="in" placeholder="<?php echo htmlentities($book_row['book_days']); ?>" style="width: 80px; padding-top: 10px;" type="number" disabled>
                                </td>
                                <td>
                                    <input class="in" placeholder="<?php echo htmlentities($book_row['book_person']); ?>" style="width: 80px; padding-top: 10px;" type="number" disabled>
                                </td>
                                <td> <?php echo htmlentities($book_row['book_status']); ?>
                                </td>
                                <td> 
                                    <a href="cancel_booking.php?bookId=<?php echo htmlentities($book_row['book_id']); ?>"> 
                                        <button class="cancel-button" style="background-color: #FF6347; color: white; padding: 2px; width: 60px;" <?php if ($book_row['book_status'] != 'Pending') { ?> disabled <?php } ?> >
                                            <b>Cancel</b>
                                        </button> 
                                    </a> 
                                </td>
                            </tr>
                            <?php
                        }
                    }
                ?>
                <br>
            </table>
        </div>

        <!-- <div class="button-container">
            <button class="prev-next-button" onclick="showPrevious()">Previous</button>
            <button class="prev-next-button" onclick="showNext()">Next</button>
        </div> -->
    </div>
     <!-- --- Booking Table Ends Here --- -->

    <!-- --- Rate & Review Section --- -->
    <div style="height: 350px; background-color: rgba(0, 0, 0, 0.041);">
        <p style="padding-left: 80px; padding-top: 50px; font-size: larger;"><b>Add Rating & Feedback -</b></p>
        
        <div style="padding-left: 120px; margin-top: 2%;">
            <table>
                <tr>
                    <!-- <th style="width: 10px;">S.No</th> -->
                    <th style="width: 250px;">Package</th>
                    <th style="width: 150px;">Rating</th>
                    <th style="width: 520px;">Feedback</th>
                    <th style="width: 200px;">Action</th>
                </tr>
                <form method="post">
                <?php
                    if (mysqli_num_rows($get_pkg_result) == 0) {
                        ?><strong>
                            <?php echo htmlentities("No completed trips!"); ?>
                        </strong>
                        <?php
                    } else { ?>
                        <tr>
                            <td>
                                <select style="width: 230px; height: 30px;" name="pkg_id">
                                <option selected disabled>Select Package</option>
                                <?php while ($get_pkg_row = mysqli_fetch_assoc($get_pkg_result)) {
                                ?>
                                    <option value="<?php echo htmlentities($get_pkg_row['pkg_id']); ?>"><?php echo htmlentities($get_pkg_row['pkg_name']); ?></option>
                                <?php } ?>
                                </select>
                            </td>

                            <td>
                                <div class="stars">
                                    <input type="radio" id="star5" name="rating" value="5">
                                    <label for="star5"></label>
                                    <input type="radio" id="star4" name="rating" value="4">
                                    <label for="star4"></label>
                                    <input type="radio" id="star3" name="rating" value="3">
                                    <label for="star3"></label>
                                    <input type="radio" id="star2" name="rating" value="2">
                                    <label for="star2"></label>
                                    <input type="radio" id="star1" name="rating" value="1">
                                    <label for="star1"></label>
                                </div>
                            </td>

                            <td><textarea class="feedback-textarea" placeholder="Enter your feedback here" name="feedback"></textarea></td>
                            <td>
                                <button type="submit" name="submitFeedback" style="background-color: green; color: white; padding: 5px; width: 100px;"><b>Send</b></button>
                                <button type="reset" class="delete-button" style="background-color: red; color: white; padding: 5px; width: 100px;"><b>Reset</b></button>
                            </td>
                        </tr>
                    <?php } ?>
                </form>
            </table>
        </div>
    </div>
    <!-- --- Rate & Review Section Ends --- -->

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

    <!-- Feedback delete modal -->
    <div id="dlModal" class="dl-modal">
        <div class="delete-modal-content">
            <p style="color: white; font-size: medium; padding-left: 10px;"><b>Delete Feedback</b><span class="delete-close" onclick="closeDlModal()">&times;</span></p><hr style="background-color: white;">
            
            <div style="padding-top: 20px; padding-left: 10px;">
                <p style="font-size: large; color: white;"><b>Are you sure you want to delete your feedback?</b></p>
                <div>
                    <button style="background-color: green; width: 80px; height: 40px; color: white; border: none;"><b>Yes</b></button>
                    <button style="background-color: red; width: 80px; height: 40px; color: white;  border: none;"><b>No</b></button>
                </div>
            </div>
        </div>
    </div>

    <!-- -- Add Review starts --- -->

    <!-- -- Footer Section Starts Here -- -->
    <div style="background-color: rgba(0, 0, 0, 0.992); height: 50px;">
        <p style="color: white; font-size: small; text-align: center; padding-top: 10px;"><b>Copyright © 2023-24 Project Work | LCB College</b></p>
    </div>
    <!-- -- Footer Section Ends Here -- -->

    <script>
        // Function to open the modal
        function openModal() {
            document.getElementById('dlModal').style.display = 'block';
        }
    
        // Function to close the modal
        function closeDlModal() {
            document.getElementById('dlModal').style.display = 'none';
        }

    
        // Function to handle the delete action
        function deleteItem() {
            // Add your delete logic here
            console.log('Item deleted');
            // Close the modal after deleting
            closeModal();
        }
    
        // Add an event listener to the button to trigger the modal
        document.querySelector('.delete-button').addEventListener('click', openModal);
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


    <script>
        // Functions to open and close the modal
        function openModal() {
          document.getElementById('updateProfileModal').style.display = 'flex';
        }
    
        function closeModal() {
          document.getElementById('updateProfileModal').style.display = 'none';
        }
    
        // Close the modal if the user clicks outside the modal content
        window.onclick = function(event) {
          var modal = document.getElementById('updateProfileModal');
          if (event.target === modal) {
            closeModal();
          }
        }
    </script>

    <!-- <script>
        var currentIndex = 0; 
    
        function showPrevious() {
          currentIndex = Math.max(0, currentIndex - 1);
          console.log("Showing previous item. Index: " + currentIndex);
          // Add your logic to update content or perform other actions when showing the previous item
        }
    
        function showNext() {
          // Assuming totalItemCount is the total number of items
          var totalItemCount = 5; // Change this to the actual total count
          currentIndex = Math.min(totalItemCount - 1, currentIndex + 1);
          console.log("Showing next item. Index: " + currentIndex);
          // Add your logic to update content or perform other actions when showing the next item
        }
      </script> -->
</body>
</html>