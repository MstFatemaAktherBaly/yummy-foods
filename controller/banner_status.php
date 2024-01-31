<?php
include "../database/env.php";

$status_id = $_REQUEST['status_id'];



$allStData = "SELECT status FROM banners WHERE id = $status_id ";
$alldataQuery =  mysqli_query($conn,$allStData);
$fetchData =  mysqli_fetch_assoc($alldataQuery);

if($fetchData['status'] == 1){
    $query = "UPDATE banners SET status = 0 ";
    $res = mysqli_query($conn, $query);
}else{

    $query = "UPDATE banners SET status = 0 ";
    $res = mysqli_query($conn, $query);

    $query = "UPDATE banners SET status = 1 WHERE id = $status_id ";
    $res = mysqli_query($conn, $query);
}

header("Location: ../Backend/allBanners.php");

?>