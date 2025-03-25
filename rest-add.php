<?php include_once("../include/db-connect.php");
include '../business-logic/business-logic.php';?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	global $message;
	global $added;
   addRes($_POST['name'],$_POST['location'],$_POST['category_id'],$_FILES['profile_img'],$_POST['description']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Add New Restaurant</title>
    <link rel="stylesheet" href="../css/style.css" type="text/css" />
</head>

<body>

    <div class="navbar">
        <div class="navbar-logo">حولي</div>
        <div class="navbar-links">
            <a href="index.php">Home</a>
            <a href="restaurants.php">Restaurant</a>
            <a href="about-us.php">About Us</a>

            <a href="admin-page.php">Admin Page</a>
            <a href="login.php">Logout</a>
        </div>
    </div>

    <div class="reveiw-form">

        <h2><strong> Add New Restaurant </strong> </h2>

        <?php 
            if (isset($added)) 
                echo "<h1>The restaurant has been added.</h1>";
            else {
        ?>

        <form name="add_form" action="rest-add.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Name *</label>
                <input type="text" id="name" name="name" placeholder="Name" required>
            </div>
            <div class="form-group">
                <label for="location">Location *</label>
                <input type="text" id="location" name="location" placeholder="Location" required>
            </div>


            <div class="form-group">
                <label for="category_id">Category *</label>

                <select class="text-field" name="category_id" id="category_id">
                    <option value="1" selected>Italy Restaurant</option>
                    <option value="2">Saudi Dining</option>
                    <option value="3">Indian Dining</option>
                </select>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" rows="4" placeholder="Write item description"
                    required></textarea>
            </div>


            <div class="form-group">
                <label for="profile_img">Profile Image:</label>
                <input type="file" id="file" name="profile_img">
            </div>

            <input class="button" id="add" type="submit" value="Submit">

        </form>

        <?php } ?>

        <?php echo !empty($message) ? $message : ''; ?>

    </div>

</body>

</html>