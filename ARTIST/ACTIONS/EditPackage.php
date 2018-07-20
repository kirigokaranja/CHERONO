
<?php

require('../../DBConnect.php');
global $db;

$name= $_POST['name'];
$details = $_POST['details'];
$price = $_POST['price'];
$id = $_POST['id'];



$sql = "UPDATE `package` SET `PackageName`= '$name',`PackageDetails`= '$details',`PackagePrice`= '$price' WHERE `PackageID`= '$id'";
$result = mysqli_query($db,$sql);
echo $sql;
if ($result){
    header("Location: ../packages.php?message=editpackage");
}else{
    header("Location: ../packages.php?message=error");
}






