<?php
session_start();
include "../database/env.php";



$oldPass = $_REQUEST['oldPass'];
$newPass = $_REQUEST['newPass'];
$confirmPsk = $_REQUEST['confirmPsk'];
$dbPass = $_SESSION['auth']['password'];
$isPasswordTrue = password_verify($oldPass ,$dbPass);
$id = $_SESSION['auth']['id'];


// validation

$errors = [];



if(!$isPasswordTrue){
    $errors['oldPass'] = 'Your Old Password is Incorrect';
    $_SESSION['errors'] = $errors;
    header("Location: ../Backend/profile.php");
}else{
    if(empty($newPass)){
        $errors['newPass'] = 'Enter Your new Password';
    }elseif($newPass != $confirmPsk){
        $errors['confirmPsk'] = 'Confirm password with your new password';
    }

    if(count($errors) > 0){
        $_SESSION['old_data'] = $_REQUEST;
        $_SESSION['errors'] = $errors;
    header("Location: ../Backend/profile.php");
    }else{

        //proceed

        $encPassword = password_hash($newPass, PASSWORD_BCRYPT);
        $query = "UPDATE users SET password='$encPassword' WHERE id = '$id' ";
        $res = mysqli_query($conn, $query);

        if($res){

            $_SESSION['auth']['password'] = $encPassword;
            header("Location: ../Backend/profile.php");
        }

    }
}









