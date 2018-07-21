<?php
include ("DBConnect.php");

$date = $_POST["date"];
$location = $_POST["location"];
$package = $_POST["package"];
$description = $_POST["description"];
$id = $_POST['id'];


$sql2="UPDATE `book` SET `packageID`= '$package',`date`= '$date',`location`= '$location',`description`='$description' WHERE `id` = '$id'";
$result1 = mysqli_query($db,$sql2);

echo $sql2;
if ($result1){
    header("Location: bookings.php?message=success");
}else{
    header("Location: bookings.php?message=error");
}