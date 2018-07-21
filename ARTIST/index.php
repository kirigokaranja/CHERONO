<!DOCTYPE html>
<html>
<head>
    <title>StephanieAdmin | Schedule</title>
    <link rel="icon" type="image/ico" href="../favicon.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../CSS/top_part.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="../CSS/navbar.css" type="text/css">

    <link rel="stylesheet" href="../CSS/bootstrap.min.css" type="text/css">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
<?php
include '../DBConnect.php';
global $db;
$st = "unread";
$messages="SELECT * FROM `messages` WHERE status = '$st'";
$result_message=mysqli_query($db,$messages);
$count=mysqli_num_rows($result_message);
?>
<nav class="homenavbar">
    <a href="index.php" style="float: left; padding-top: 0; margin-left: 140px;text-decoration: none"><img src="../logo.png"></a>
    <a href="logout.php"><button class="loginBtn">Logout</button></a>
    <a href="bookings.php" style="text-decoration:none">Bookings</a>
    <a href="packages.php" style="text-decoration:none" >packages</a>
    <a href="portfolio.php" style="text-decoration:none">portfolio</a>
    <a href="messages.php" style="text-decoration:none" >messages <span class="new badge" style="background-color: #d02954"><?php if($count !== 0){
                echo $count ;
            }?></span></a>
    <a  href="index.php" style="text-decoration:none" class="active">schedule</a>
</nav>
<div class="parallax" style=" background-image: url(../IMAGES/raphael-lovaski-532696-unsplash.jpg) ">
    <div class="overlay">
        <h1>Schedule</h1>
    </div>

</div>





</body>
</html>
