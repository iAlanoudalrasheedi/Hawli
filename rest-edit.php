<?php include_once("../include/db-connect.php");
include '../business-logic/business-logic.php';?>

<?php 

$id = $_REQUEST['id'];

$restaurant = getRest($id);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    global $message;
    updateRes($id,$_POST['category_id'],$_POST['name'],$_POST['location'],$_POST['description'],$_FILES['profile_img']);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Edit Restaurant</title>
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

        <h2><strong> Edit Restaurant </strong> </h2>

        <?php 
            if (isset($edited)) 
                echo "<h1>The restaurant has been edited.</h1>";
            else {
        ?>

        <form name="add_form" action="rest-edit.php?id=<?php echo $restaurant['id']; ?>" method="POST"
            enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Name *</label>
                <input type="text" id="name" name="name" placeholder="Name" value="<?php echo $restaurant['name']; ?>"
                    required>
            </div>
            <div class="form-group">
                <label for="location">Location *</label>
                <input type="text" id="location" name="location" placeholder="Location"
                    value="<?php echo $restaurant['location']; ?>" required>
            </div>


            <div class="form-group">
                <label for="category_id">Category *</label>

                <select class="text-field" name="category_id" id="category_id">
                    <option value="1" <?php if ($restaurant['category_id'] == 1) echo 'selected' ?>>Italy Restaurant
                    </option>
                    <option value="2" <?php if ($restaurant['category_id'] == 2) echo 'selected' ?>>Saudi Dining
                    </option>
                    <option value="3" <?php if ($restaurant['category_id'] == 3) echo 'selected' ?>>Indian Dining
                    </option>
                </select>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" rows="4" placeholder="Write item description"
                    required><?php echo $restaurant['description']; ?></textarea>
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