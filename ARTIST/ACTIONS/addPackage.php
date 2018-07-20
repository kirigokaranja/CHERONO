
<?php

require('../../DBConnect.php');
global $db;

$name= $_POST['name'];
$details = $_POST['details'];
$price = $_POST['price'];



$sql = "INSERT INTO `package`(`PackageName`, `PackageDetails`, `PackagePrice`) VALUES  ('$name', '$details', '$price');";
$result = mysqli_query($db,$sql);
echo $sql;
if ($result){
    header("Location: ../packages.php?message=addpackage");
}else{
    header("Location: ../packages.php?message=error");
}






