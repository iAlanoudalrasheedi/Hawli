<?php include_once("../include/db-connect.php");
include '../business-logic/business-logic.php';?>

<?php
$id = $_REQUEST['id'];

global $message;
global $deleted;
deleteRes($id);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Delete Restaurant</title>
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

        <h2><strong> Delete Restaurant </strong> </h2>

        <?php 
            if (isset($deleted)) 
                echo "<h1>The restaurant has been deleted.</h1>";
            else {
        ?>

        <?php echo !empty($message) ? $message : ''; ?>

        <?php } ?>



    </div>

</body>

</html>