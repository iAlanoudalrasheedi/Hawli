<?php include_once("../include/db-connect.php"); ?>

<?php

function loginData($email,$password){

	global $conn;

	conndb();

	$email = mysqli_real_escape_string($conn, $email);
	$password = mysqli_real_escape_string($conn, $password);
	
	$password=  md5($password);

	$query = "select * from admin where email='$email' and password='$password' ";
	$result = executeQuery($query);
	
	closedb();

	if($result && mysqli_num_rows($result) > 0){
		$user = mysqli_fetch_array($result);
		header('Location:admin-page.php');
		exit;
	} else {
		return $message = "Email or password is wrong";
	}
}

function addResturant($category_id,$name,$location,$description,$profile_img) {

	global $conn;
	global $message;
	global $added;

	conndb();

	    $name = mysqli_real_escape_string($conn, $name);
		$location = mysqli_real_escape_string($conn, $location);
        $category_id = mysqli_real_escape_string($conn, $category_id);


	$query = "insert into restaurant (category_id, name, location, description, profile_img) values ('$category_id', '$name', '$location', '$description', '$profile_img');";
	$result = executeQuery($query);
	
	$restaurant_id = mysqli_insert_id ($conn);
	
	if(!$result)
		$message .= "Can not add restaurant " . mysqli_error($conn);
	else {
		$added = true;
	}
	
	closedb();
}

function deleteResturant($id) {
	global $conn;
	global $message;
	global $deleted;

	conndb();

	$id = mysqli_real_escape_string($conn, $id);
	
	$result = executeQuery("select * from restaurant where id = $id;");

    if (!$result)
        header('Location:admin-page.php');
    
    $restaurant = mysqli_fetch_array($result);

    $query = "delete from restaurant where id = $id;";
    $result = executeQuery($query);

    if(!$result)
        $message .= "Can not delete restaurant " . mysqli_error($conn);
    else {
        $deleted = true; 
    }
    closedb();
}

function updateResturant($id,$category_id,$name,$location,$description,$profile_img) {

	global $conn;
	global $message;
	global $edited;

	conndb();

    	$id = mysqli_real_escape_string($conn, $id);
        $name = mysqli_real_escape_string($conn, $name);
        $location = mysqli_real_escape_string($conn, $location);
        $category_id = mysqli_real_escape_string($conn, $category_id);

    if (!empty($profile_img)) {
        $query = "update restaurant set category_id = '$category_id', name = '$name', location = '$location', description = '$description', profile_img = '$profile_img' where id = '$id';";
     } else {
        $query = "update restaurant set category_id = '$category_id', name = '$name', location = '$location', description = '$description' where id = '$id';";
     }

    $result = executeQuery($query);
                
    if(!$result)
        $message .= "Can not edit restaurant " . mysqli_error($conn);
    else {
        $edited = true;
    }
    
    closedb();
}

function getRestaurants() {
    $restaurants_qry = executeQuery("select * from restaurant;");

    $restaurants = array();
    while ($restaurant = mysqli_fetch_array($restaurants_qry))
       $restaurants[] = $restaurant;

       return $restaurants;
}

function getRestaurntData($id) {
	$result = executeQuery("select * from restaurant where id = $id;");

    if (!$result)
    header('Location:admin-page.php');

   return $restaurant = mysqli_fetch_array($result);
}

function getCategoryData($id) {
	$result = executeQuery("select * from category where id = '$id';");
   return $category = mysqli_fetch_array($result);
}

function getReviewRestaurant($id) {
	$result = executeQuery("select * from review where restaurant_id = '$id';");
   return $result;
}

function getRestaurntRate($id) {
    $result = executeQuery("select ROUND(AVG(rating), 0) AS 'RATING' from review where restaurant_id = '$id';");
    $restaurant_rating = mysqli_fetch_array($result); 
	return  $restaurant_rating;
}

function getCategories() {
    $categories_qry = executeQuery("select * from category;"); 

    $categories = array();
     while ($category = mysqli_fetch_array($categories_qry))
     $categories[] = $category;

     return $categories;
}

function restaurantInfo($id,$name,$rating,$body) {
	global $conn;
	conndb();

	$name = mysqli_real_escape_string($conn, $name);
	$rating = mysqli_real_escape_string($conn, $rating);
	$body = mysqli_real_escape_string($conn, $body);
	
	$query = "insert into review (restaurant_id, name, body, rating) values ('$id', '$name', '$body', '$rating');";
	$result = executeQuery($query);
	
	closedb();
	
	if($result) {
	header('Location:rest-info.php?id=' . $id);
	exit();
	} else {
	$message .= "Error while executing query.<br/>Mysql Error: " . mysqli_error($conn);
	}
}



?>
