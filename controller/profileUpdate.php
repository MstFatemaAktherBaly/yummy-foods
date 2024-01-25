<?php
session_start();
include "../database/env.php";

// profile data collect

$fname = $_REQUEST['fname'];
$lname = $_REQUEST['lname'];
$email = $_REQUEST['email'];
$profileImage = $_FILES['profileImage'];
$extension = pathinfo($profileImage['name'])['extension'];
$acceptedTypes = ['jpg','png'];
$userId = $_SESSION['auth']['id'];

// echo "<pre>";
// var_dump(in_array($extension, $acceptedTypes));
// echo "</pre>";
// exit();

//validation
$errors = [];

if(empty($fname)){
    $errors['name'] = 'First name is missing';
}

if(empty($email)){
    $errors['email'] = 'Email address is missing';
}elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $errors ['email'] = "Your email address is Invalid";
   }


if($profileImage['size'] == 0){
    $errors ['profileImage'] = 'Please select an Image';
}else if (!in_array($extension, $acceptedTypes)){
    $errors['profileImage'] = 'Please select an image with the extension of jpg or png.';
}


//if errors found 
if(count($errors) > 0){
    //redirect
    $_SESSION['errors'] = $errors;
    header("Location: ../Backend/profile.php");
}

//if no errors found
else{
     //if upload folder not found
    $path = ('../uploads');
   
    if(!file_exists($path)){
      mkdir($path);
    }

    //file upload

    $fileName = null;

if($profileImage['size'] > 0){

  $fileName = 'user-'. uniqid() . ".$extension";
  
  $from = $profileImage['tmp_name'];
  $to = $path."/$fileName";
  $isUploded = move_uploaded_file($from , $to);


  
  $query = "UPDATE users SET fname='$fname',lname='$lname',email='$email',profile_img='$fileName' WHERE id = $userId ";
  $res = mysqli_query($conn,$query);

}else{

  
  $query = "UPDATE users SET fname='$fname',lname='$lname',email='$email' WHERE 1";
  $res = mysqli_query($conn,$query);
 

}

if($res){
  $_SESSION['auth']['fname'] = $fname;
  $_SESSION['auth']['lname'] = $lname;
  $_SESSION['auth']['email'] = $email;
}


      
    
    
}

