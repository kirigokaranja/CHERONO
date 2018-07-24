<!DOCTYPE html>
<html>
<head>
    <title>Stephane | Notifications</title>
    <link rel="icon" type="image/ico" href="favicon.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="CSS/top_part.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >
    <link rel="stylesheet" href="CSS/navbar.css" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<body>
<?php
session_start();
include ("DBConnect.php");

if(isset($_SESSION['email'])){
    $em = $_SESSION['email'];

$sq = "SELECT * FROM customer where Email = '$em'";
$res = $db->query($sq) or trigger_error($db->error."[$sq]");
while($row2 = mysqli_fetch_array($res)) {
    $id = $row2['CustomerID'];

    $pen = "pending";
    $seen = "unseen";
    $messages="SELECT * FROM `book` WHERE customerID = '$id' AND status != '$pen' AND seen = '$seen'";
    $result_message=mysqli_query($db,$messages);
    $count=mysqli_num_rows($result_message);
    ?>
    <nav class="homenavbar">
        <a href="index.php" style="float: left; padding-top: 0; margin-left: 140px;text-decoration: none"><img
                    src="logo.png"></a>
        <a href="logout.php">
            <button class="loginBtn">Logout</button>
        </a>
        <a href="bookings.php" style="text-decoration:none">Bookings</a>
        <a href="notifications.php" style="text-decoration:none" class="active">Notifications
            <span class="badge" id="spaner" style="background-color: #d02954;padding: 8px 10px;border-radius: 50%;color: white"><?php if($count !== 0){
                    echo $count ;
                }?></span></a>
        <a href="profile.php" style="text-decoration:none">Profile</a>
        <a href="book.php" style="text-decoration:none">Book</a>
        <a href="index.php" style="text-decoration:none">Home</a>
    </nav>
    <div class="parallax" style=" background-image: url(IMAGES/raphael-lovaski-532696-unsplash.jpg) ">
        <div class="overlay">
            <h1>Notifications</h1>
        </div>

    </div>
    <h1 style="text-align: center;margin-top: 15px">My Notifications</h1>
    <?php
    include 'DBConnect.php';
    global $db;


if(isset($_POST['seen'])){
    $fid = $_POST['id'];
    $lseen = "seen";

    $sql2="UPDATE `book` SET `seen`='$lseen' WHERE `id`='$fid'";
    $result1 = mysqli_query($db,$sql2);
    if ($result1){
        header("Location: notifications.php");
    }else{
        header("Location: notifications.php?message=error");
    }
}

    $pen = "pending";
    $seen = "unseen";
    $sql = "SELECT * FROM book WHERE customerID = '$id' AND status != '$pen' AND seen = '$seen'";
    $result = $db->query($sql) or trigger_error($db->error . "[$sql]");
}
while($row = mysqli_fetch_array($result)){

$date = $row['date'];
$location = $row['location'];
$description = $row['description'];
$response = $row['response'];
$status = $row['status'];
$bid = $row['id'];


?>
<div class="container" style="width: 50%;margin-left: 30%;margin-top: 3%;">
    <div class="card w-75">
        <div class="card-body">
            <form method="post" action="notifications.php">
                <input type="hidden" name="id" value="<?php echo $bid;?>">
                <button  class="close" name="seen">&times;</button>
            </form>
            <h5 class="card-title" style="color: #d02954">Date: <?php echo $date;?>&ensp;&ensp; Location: <?php echo $location;?></h5>
            <p class="card-text">Description: <?php echo $description;?></p>
            <p class="card-text"><span style=" font-weight: 300;color: #00abef"><?php echo $status;?></span> : <?php echo $response;?>.</p>
        </div>
    </div>
</div>

<?php } ?>


<?php

}else{
?>
<script type="text/javascript">
    window.location.href = 'login.php';
</script>
<?php
}
?>

</body>
</html>
