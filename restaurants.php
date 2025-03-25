<?php include_once("../include/db-connect.php");
include '../business-logic/business-logic.php'; ?>
<?php 

    $restaurants = array();
    $restaurants = getRestaurantsData();

    $categories = array();
    $categories = getCategoriesData();

    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Restaurants</title>
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

    <?php  foreach ($categories as $key => $category) {?>

    <div class="list-items">
    <h1 class="cat-name"><?php echo $category['name']; ?></h1>
    

    <?php foreach ($restaurants as $key => $restaurant) { ?>
        <?php $id = $restaurant['id']; 
        $restaurant_rating = getRestRate($id); 
?>
        <?php if ($restaurant['category_id'] == $category['id']) { ?>
        <div class="container item">
            
            <div class="image">
            <img src="<?php echo 'data:image/jpeg;base64,' . base64_encode($restaurant['profile_img']); ?>"
                alt="<?php echo $restaurant['name']; ?> restuarant">
            </div>
            <div class="text">
                <h1> <a href="rest-info.php?id=<?php echo $restaurant['id']; ?>"> <?php echo $restaurant['name']; ?> </a></h1>
                <h3 class="item-rating"> <span
                    class="selected"><?php echo str_repeat("&#9733;", ($restaurant_rating['RATING'])); ?></span><?php echo str_repeat("&#9733;", ( 5 - $restaurant_rating['RATING'])); ?>
            </h3>
                <hr>
                <h3><strong><em> <?php echo $restaurant['description']; ?></em></strong></h3>
            </div>
        </div>

        <?php } ?>
        <?php } ?>

    </div>

    <?php } ?>

</body>

</html>