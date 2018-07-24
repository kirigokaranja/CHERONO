
<?php

require('../../DBConnect.php');
global $db;

$upload_images = $_FILES['myimage']['name'];
$folder = "../../IMAGES/PORTFOLIO/";
$category = $_POST['category'];
$details = $_POST['details'];

$upload_images = $_FILES['myimage']['name'];
move_uploaded_file($_FILES['myimage']['tmp_name'], "$folder" . $_FILES["myimage"]["name"]);


$sql = "INSERT INTO `portfolio`( `image`, `category`, `details`) VALUES ('$upload_images', '$category', '$details')";
echo $sql;
$result = mysqli_query($db, $sql);
if ($result) {
    header("Location: ../portfolio.php?message=success");
} else {
    header("Location: ../portfolio.php?message=error");
}





