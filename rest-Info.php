<?php include_once("../include/db-connect.php");
include '../business-logic/business-logic.php'; ?>

<?php 
if (!isset($_REQUEST['id'])) {
	header('Location:restaurants.php');
}

$id = $_REQUEST['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	global $message;
  restInfo($id,$_POST['name'],$_POST['rate'],$_POST['review']);
  
}



$restaurant = getRest($id);

$category_id = $restaurant['category_id'];

$category = getCat($category_id);

$reviews = getReview($id);

$restaurant_rating = getRestRate($id);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Home</title>
    <link rel="stylesheet" href="../css/style.css" type="text/css" />
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

    <div class="container">
        <div class="image">
            <img src="<?php echo 'data:image/jpeg;base64,' . base64_encode($restaurant['profile_img']); ?>"
                alt="<?php echo $restaurant['name']; ?> restuarant">
        </div>
        <div class="text">
            <h1> <?php echo $restaurant['name']; ?> </h1>




            <h3 class="item-rating"> <span
                    class="selected"><?php echo str_repeat("&#9733;", ($restaurant_rating['RATING'])); ?></span><?php echo str_repeat("&#9733;", ( 5 - $restaurant_rating['RATING'])); ?>
            </h3>


            <hr>
            <h3><strong><em><?php echo $restaurant['description']; ?></em></strong></h3>

        </div>

        <div>



        </div>

    </div>

    <hr>

    <div class="reviews">
    <h2><strong> Reviews</strong> </h2>
        <?php while ($reviews && $review = mysqli_fetch_array($reviews)) {?>
        <div class="review-item">
            <h3><?php echo $review['name']; ?></h3>

            <h3 class="item-rating"> <span
                    class="selected"><?php echo str_repeat("&#9733;", ($review['rating'])); ?></span><?php echo str_repeat("&#9733;", ( 5 - $review['rating'])); ?>
            </h3>

            <p><?php echo $review['body']; ?></p>
        </div>

        <?php } ?>

    </div>

    <hr>

    <div class="reveiw-form">

        <h2><strong> Add comment </strong> </h2>


        <form name="add_form" action="rest-info.php?id=<?php echo $restaurant['id']; ?>" method="POST"
            enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Name *</label>
                <input type="text" id="name" name="name" placeholder="Name" required>
            </div>
            <div class="form-group">
                <label for="rate">Rating [1-5] *</label>
                <input type="number" id="rate" name="rate" placeholder="0" required>
            </div>
            <div class="form-group">
                <label for="review">Description</label>
                <textarea id="review" name="review" rows="4" placeholder="Write your review" required></textarea>
            </div>
            <input class="button" id="add" type="submit" value="Submit">

        </form>

        <?php
            if ($message != '') {
                echo "<div class=\"error_msg\">" . $message . "</div>";
            }
        ?>

    </div>

</body>

</html>