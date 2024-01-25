<?php
session_start();
include_once "../database/env.php";

//data collect
$email = $_REQUEST['email'];
$password = $_REQUEST['password'];

//validation

$errors = [];

//email
if(empty($email)){
    $errors['email'] = "Enter Your Email";
}

//password
if(empty($password)){
    $errors['password'] = "Enter Your Password";
}

//email & password check

$query = "SELECT * FROM users WHERE email = '$email' ";
$res = mysqli_query($conn,$query);


//if email is incorrect
if($res->num_rows == 0){
    $errors['email'] = "Your email address is Incorrect";

  
    $_SESSION['errors'] = $errors;
    header("Location: ../Backend/login.php");
}else{

    $dbUser = mysqli_fetch_assoc($res);
    $isPasswordTrue = password_verify($password,$dbUser['password']);
    // var_dump($isPasswordTrue);

    //if password is incorrect
    if(!$isPasswordTrue){
      $errors['password'] = "Your password is Incorrect";
      $_SESSION['old_data'] = $_REQUEST;
      $_SESSION['errors'] = $errors;
      header("Location: ../Backend/login.php");
    }else{
        //redirect to dashboard
        $_SESSION['auth'] = $dbUser;
        header("Location: ../Backend/dashboard.php");
    }
}




