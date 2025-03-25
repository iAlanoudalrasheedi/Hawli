<?php include_once("../include/db-connect.php");
include '../business-logic/business-logic.php'; ?>
<?php 

      $restaurants = array();
      $restaurants = getRestaurantsData();
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

            <a href="admin-page.php">Admin Page</a>
            <a href="login.php">Logout</a>
        </div>
    </div>

    <section class="row">
        <article class="card">
            <header>
                <h2>Restaurants</h2>
                <button class="button" onclick="window.location.href='rest-add.php'">Add New Restaurant</button>
            </header>

            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Restaurant Name</th>
                        <th>Restaurant Category</th>
                        <th>Edit Restaurant</th>
                        <th>Delete Restaurant</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($restaurants as $key => $restaurant) { ?>
                    <tr>
                        <td><?php echo $restaurant['id']; ?></td>
                        <td><?php echo $restaurant['name']; ?></td>
                        <td><?php if ($restaurant['category_id'] == 1) echo 'Italy Restaurants'; else if ($restaurant['category_id'] == 2) echo 'Saudi Restaurants'; else if ($restaurant['category_id'] == 3) echo 'Indian Restaurants'; ?>
                        </td>
                        <td><a href="rest-edit.php?id=<?php echo $restaurant['id']; ?>">Edit Restaurant</a></td>
                        <td><a href="rest-delete.php?id=<?php echo $restaurant['id']; ?>">Delete Restaurant</a></td>
                    </tr>
                    <?php } ?>

                </tbody>
            </table>

        </article>
    </section>

</body>

</html>