<!DOCTYPE html>
<html>
<head>
    <title>Stephane | Notifications</title>
    <link rel="icon" type="image/ico" href="favicon.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="CSS/top_part.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/navbar.css" type="text/css">

</head>
<body>
<?php
session_start();
include ("DBConnect.php");

if(isset($_SESSION['email'])){
    $id = $_SESSION['email'];
?>
<nav class="homenavbar">
    <a href="index.php" style="float: left; padding-top: 0; margin-left: 140px;text-decoration: none"><img src="logo.png"></a>
    <a href="logout.php"><button class="loginBtn">Logout</button></a>
    <a href="bookings.php" style="text-decoration:none">Bookings</a>
    <a href="notifications.php" style="text-decoration:none" class="active">Notifications</a>
    <a href="profile.php" style="text-decoration:none">Profile</a>
    <a href="book.php" style="text-decoration:none" >Book</a>
    <a  href="index.php" style="text-decoration:none">Home</a>
</nav>
<div class="parallax" style=" background-image: url(IMAGES/raphael-lovaski-532696-unsplash.jpg) ">
    <div class="overlay">
        <h1>Notifications</h1>
    </div>

</div>

<div >

</div>


<?php }else{
?>
<script type="text/javascript">
    window.location.href = 'login.php';
</script>
<?php
}
?>
</body>
</html>
