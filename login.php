<?php include_once("../include/db-connect.php");
include '../business-logic/business-logic.php'; ?>

<?php

$message = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $message = login($_POST['email'], $_POST['password']);
 
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Login</title>
    <link rel="stylesheet" href="../css/style.css" type="text/css" />
    <link rel="stylesheet" href="../css/login.css" type="text/css" />
</head>

<body>

    <div class="navbar">
        <div class="navbar-logo">حولي</div>
        <div class="navbar-links">
            <a href="index.php">Home</a>
            <a href="restaurants.php">Restaurant</a>
            <a href="about-us.php">About Us</a>
            <a href="login.php">Login</a>
        </div>
    </div>

    <div class="container login-form">
        <img class="logo" src="../img/loogo1.jpeg" alt="Logo">
        <br>
        <form action="login.php" method="post">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button class="button" type="submit">Submit</button><br>

            <?php echo !empty($message) ? $message : ''; ?>
        </form>
    </div>
    <div class="background-image"></div>

</body>

</html>