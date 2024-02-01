<?php
session_start();

include "../database/env.php";

//data collect

$heading = $_REQUEST['heading'];
$details = $_REQUEST['details'];
$btn_title = $_REQUEST['btn_title'];
$btn_link = $_REQUEST['btn_link'];
$video_url = $_REQUEST['video_url'];
$featured_img = $_FILES['feautured_img'];


//validation

$errors = [];

if(empty($heading)){
    $errors['heading_error'] = "Heading is required.";
}
if(empty($btn_title)){
    $errors['btn_title_error'] = "Button title is required.";
}
if(empty($btn_link)){
    $errors['btn_link_error'] = "Button link is required.";
}

if(count($errors) > 0){
    $_SESSION['errors'] = $errors;
    header("Location: ../Backend/addBanners.php");
}else{

   $imagepath = uniqid() . "banner_img" . $featured_img['name'];
   $tmp_name = $featured_img['tmp_name'];
   move_uploaded_file($tmp_name, "./banner_image/" . $imagepath);

    $query = "INSERT INTO banners( heading, details, button_tittle, button_url, video_url, feautured_img) VALUES ('$heading', '$details', '$btn_title', '$btn_link', '$video_url', '$imagepath')";

    $res = mysqli_query($conn , $query);

    $_SESSION['success'] = "Data inserted";
    header("Location: ../Backend/allBanners.php");

}


?>