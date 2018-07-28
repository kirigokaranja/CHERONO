<?php
session_start();
include ("DBConnect.php");

if(isset($_SESSION['email'])){



$date = $_POST["date"];
$location = $_POST["location"];
$package = $_POST["package"];
$description = $_POST["description"];
$custid = $_POST["custid"];
$time = $_POST['time'];
$status = "pending";

$sql2="INSERT INTO `book`(`customerID`, `packageID`, `date`, `location`, `description`, `status`, time) 
   VALUES ('$custid', '$package', '$date', '$location', '$description', '$status', '$time')";
$result1 = mysqli_query($db,$sql2);
if ($result1){
    header("Location: book.php?message=success");
}else{
    header("Location: book.php?message=error");
}
 }else{
    ?>
    <script type="text/javascript">
        window.location.href = 'login.php';
    </script>
    <?php
}
?>