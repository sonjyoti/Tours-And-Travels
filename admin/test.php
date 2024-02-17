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

        <form>
            <div class="form-group" style="padding-left: 5px;">
                <label for="title" style="color: white;"><b>Package Title:</b></label>
                <input type="text" class="form-control" id="title" placeholder="Enter Title..">

                <label for="amount" style="color: white; padding-top: 10px;"><b>Amount:</b></label>
                <input type="text" class="form-control" id="amount" placeholder="Enter Amount..">

                <label for="description" style="color: white; padding-top: 10px;"><b>Description:</b></label><br>
                <textarea id="description" class="form-control" name="description" rows="4" placeholder="Enter Description.." required></textarea>

                <label for="imageInput" style="color: white; padding-top: 10px;"><b>Image:</b></label><br>
                <input type="file" class="form-control" id="imageInput" name="image" accept="image/*" capture="environment" style="width: 500px; height: 45px; display: inline-block;" required>
                <input type="submit" style="width: 150px; height: 45px; padding-bottom: 5px; background-color: green; color: white; font-weight: 500;" value="Upload" style="display: inline-block;">

                <label for="amount" style="color: white; padding-top: 10px;"><b>Status:</b></label>
                <select class="form-control">
                    <option>Active</option>
                    <option>Deactive</option>
                </select>
            </div>
            <div style="padding-left: 5px;">
                <button type="submit" style="background-color: green; color: white; height: 40px; width: 325px;"><b>Update</b></button>
                <button type="submit" style="background-color: red; color: white; height: 40px; width: 325px;"><b>Reset</b></button>
            </div> 
        </form>
    </div>
</body>