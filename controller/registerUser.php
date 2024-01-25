<?php

session_start();

include "../database/env.php";

//data collect
$firstName = $_REQUEST['fname'];
$lastName = $_REQUEST['lname'];
$email = $_REQUEST['email'];
$password = $_REQUEST['password'];
$confirmPassword = $_REQUEST['confirmpassword'];

//validation

$errors = [];

//name error

if(empty($firstName)){
    $errors ['fname'] = "Your first name is required";
}

// email error

if(empty($email)){
    $errors ['email'] = "Enter Your Email Address";
}elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
 $errors ['email'] = "Your email address is Invalid";
}

//password error
if(empty($password)){
    $errors ['password'] = "Your password is required";
}elseif(strlen($password) < 8){
    $errors ['password']= "The length of the password should be more than 8 characters";
}

//confirm password error
if(empty($confirmPassword)){
    $errors ['confirmpassword'] = "Confirm Your Password";
}elseif($password != $confirmPassword){
    $errors ['confirmpassword'] = "Your password is not matching";
}

//if errors found

if(count($errors) > 0){

    $_SESSION['old_data'] = $_REQUEST;
    $_SESSION['errors'] = $errors;
    header("Location:../Backend/register.php");
}else{
 //register

 $encpass = password_hash($password, PASSWORD_BCRYPT);

 $query = "INSERT INTO users( fname, lname, email, password) VALUES ('$firstName','$lastName','$email','$encpass')";

 $response = mysqli_query($conn,$query);

 if($response){
    header("Location: ../Backend/login.php");
 }

}


