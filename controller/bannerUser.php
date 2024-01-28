<?php
session_start();

//data collect

$details = $_REQUEST['details'];
$video_url = $_REQUEST['video_url'];
$heading = $_REQUEST['heading'];
$btn_title = $_REQUEST['btn_title'];
$btn_link = $_REQUEST['btn_link'];

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
}


?>