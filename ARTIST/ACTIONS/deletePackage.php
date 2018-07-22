<?php
include('../../DBConnect.php');
if (isset($_GET['id'])){
    $id = $_GET['id'];
}

$status = "inactive";
$sql3="UPDATE `package` SET `status`= '$status' WHERE `PackageID` = '$id'";
$result=mysqli_query($db,$sql3);

if ($result){
    header("Location: ../packages.php?message=delete");
}else{
    header("Location: ../packages.php?message=error");
}