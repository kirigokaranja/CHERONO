<!DOCTYPE html>
<html>
<head>
    <title>Stephanie | Bookings</title>
    <link rel="icon" type="image/ico" href="favicon.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="CSS/top_part.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/navbar.css" type="text/css">
    <link rel="stylesheet" href="CSS/genre.css" type="text/css">

</head>
<body>
<nav class="homenavbar">
    <a href="index.php" style="float: left; padding-top: 0; margin-left: 140px;text-decoration: none"><img src="logo.png"></a>
    <a href="logout.php"><button class="loginBtn">Logout</button></a>
    <a href="bookings.php" style="text-decoration:none" class="active">Bookings</a>
    <a href="notifications.php" style="text-decoration:none" >Notifications</a>
    <a href="profile.php" style="text-decoration:none">Profile</a>
    <a href="book.php" style="text-decoration:none" >Book</a>
    <a  href="index.php" style="text-decoration:none">Home</a>
</nav>
<?php
include 'DBConnect.php';
global $db;
$status = $_POST['state'];
$id = $_POST['id'];
$sql = "SELECT * FROM book WHERE id = '$id'";
$result = $db->query($sql) or trigger_error($db->error."[$sql]");
while($row = mysqli_fetch_array($result)) {

    $date = $row['date'];
    $location = $row['location'];
    $description = $row['description'];
    $package = $row['packageID'];
    $sts = $row['status'];

   ?>
        <section>
            <div class="container1" >
                <div class="picture-holder"></div>
                <div class="story-holder">
                    <h1 class="formh1">Booking</h1><br>
                    <form method="post" action="editBooking.php" >
                        <input type="hidden" value="<?php echo $id;?>" name="id">
                        <label>
                            <span>Book Date</span><br>
                            <input type="text" name="date" required value="<?php echo $date;?>"/>
                        </label><br>
                        <label>
                            <span>Book Location</span><br>
                            <input type="text" name="location" required value="<?php echo $location;?>"/>
                        </label><br>
                        <label>
                            <span>Book Package</span><br>
                            <?php
                            $sql=mysqli_query($db, "SELECT * FROM package" );
                            if(mysqli_num_rows($sql)){

                                ?>
                                <select name="package"  class="input__field input__field--hoshi" id="package"  required style="font-size:large;color: #82ee7e; border:none">
                                    <option value="choose"><?php echo $package;?></option>
                                    <?php
                                    while($rs=mysqli_fetch_array($sql)){
                                    ?>
                                    <option value="<?php echo $rs['PackageName']; ?>"><?php echo $rs['PackageName'];} ?></option></select>
                                <?php
                            }
                            ?>
                        </label><br>
                        <label>
                            <span>Book Description</span><br>
                            <input type="text" name="description" required  value="<?php echo $description;?>">
                        </label>
                        <br><br>
                        <div class="text-center">
                            <button type="submit" class="buttonsubmit">Edit Book</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>

<?php
}
?>
</body>
</html>
