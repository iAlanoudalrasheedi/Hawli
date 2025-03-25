<?php include_once("../include/db-connect.php");
include("../data-access/data-access.php"); ?>
<?php

 // Business logic to fetch user from data access layer

function login($email,$password) {
   
    if (isset($_POST['email']) && isset($_POST['password'])) {   
        loginData($email,$password);
    } else {
		$message = "Please fill all required fileds.";
	}
}

function addRes($name,$location,$category_id,$profile_img,$description) {
	global $message;
	global $added;
    if (isset($name) && isset($location) && isset($category_id) && isset($profile_img) && isset($description)) {
        if (isset($_FILES['profile_img']) && is_uploaded_file($_FILES["profile_img"]["tmp_name"])) {
            $profile_img = addslashes(file_get_contents($_FILES["profile_img"]["tmp_name"]));
        }
        addResturant($category_id,$name,$location,$description,$profile_img);
     
	} else {
		$message .= "Please fill all required fileds.";
	}
}

function getRestaurantsData() {

      return getRestaurants();
}

function deleteRes($id) {
	global $message;
    global $deleted;

    deleteResturant($id);
}

function updateRes($id,$category_id,$name,$location,$description,$profile_img) {
    global $message;
	global $edited;
   

    if (isset($name) && isset($location) && isset($category_id) &&  isset($description) ) {
        if (isset($_FILES['profile_img']) && is_uploaded_file($_FILES["profile_img"]["tmp_name"])) {
            $profile_img = addslashes(file_get_contents($_FILES["profile_img"]["tmp_name"]));
        }

        updateResturant($id,$category_id,$name,$location,$description,$profile_img);
} else {
    $message .= "Please fill all required fileds.";
}
    
}

function getCategoriesData() {

     return getCategories();
}


function getRestRate($id) {
   return getRestaurntRate($id);
}

function getRest($id) {
    return getRestaurntData($id);
 }

 function getCat($id) {
    return getCategoryData($id);
 }

 function getReview($id) {
    return getReviewRestaurant($id);
 }


 function restInfo($id,$name,$rate,$body) {
    if (isset($body)) {echo "hello";

        if (isset($name) && isset($rate)) {
            restaurantInfo($id,$name,$rate,$body);
        } else {
            $message .= "Please fill all required fileds.";
        }
  }
 }




?>