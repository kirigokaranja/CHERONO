<?php
session_start();
include ("DBConnect.php");

if(isset($_SESSION['email'])){



$date = $_POST["date"];
$location = $_POST["location"];
$package = $_POST["package"];
$description = $_POST["description"];
$id = $_POST['id'];
$time = $_POST['time'];


$sql2="UPDATE `book` SET `packageID`= '$package',`date`= '$date',`location`= '$location',`description`='$description', time = '$time' WHERE `id` = '$id'";
$result1 = mysqli_query($db,$sql2);

echo $sql2;
if ($result1){
    header("Location: bookings.php?message=success");
}else{
    header("Location: bookings.php?message=error");
}
 }else{
    ?>
    <script type="text/javascript">
        window.location.href = 'login.php';
    </script>
    <?php
}
?>