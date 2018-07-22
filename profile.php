<!DOCTYPE html>
<html>
<head>
    <title>Stephane | Profile</title>
    <link rel="icon" type="image/ico" href="favicon.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="CSS/top_part.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/navbar.css" type="text/css">
    <link rel="stylesheet" href="CSS/profile.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="CSS/bootstrap.min.css">

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

    $file = "IMAGES/PROFILE/";

    $sql3="SELECT * FROM `customer` WHERE `CustomerID`='$id'";
    $data=mysqli_query($db,$sql3);
while($fetch=mysqli_fetch_assoc($data)){
    $fname=$fetch['FirstName'];
    $lname=$fetch['LastName'];
    $email=$fetch['Email'];
    $phone=$fetch['PhoneNumber'];
    $imgname = $fetch['Image'];
    $img = $file . $fetch['Image'];

    ?>
<nav class="homenavbar">
    <a href="index.php" style="float: left; padding-top: 0; margin-left: 140px;text-decoration: none"><img src="logo.png"></a>
    <a href="logout.php"><button class="loginBtn">Logout</button></a>
    <a href="bookings.php" style="text-decoration:none" >Bookings</a>
    <a href="notifications.php" style="text-decoration:none" >Notifications</a>
    <a href="profile.php" style="text-decoration:none" class="active">Profile</a>
    <a href="book.php" style="text-decoration:none" >Book</a>
    <a  href="index.php" style="text-decoration:none">Home</a>
</nav>


<?php
//get the url
$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

//checking string position
if(strpos($url,'message=error')){
    echo "<div class=\"alert alert-danger\" style='width: 25%;margin-left: 35%;margin-top: 5%'> Profile not Updated.</div>";
}else if (strpos($url,'message=success')) {
    echo "<div class=\"alert alert-success\" style='width: 25%;margin-left: 35%;margin-top: 5%'><strong>Success!</strong> Profile updated Successfully.</div>";
}

?>
<div class="profbody">
    <div class='profile' >
        <div class='background'></div>
        <aside class='avatar'>
            <img src="<?php echo $img; ?>" id="output_image" class='image' alt="Profile Image"  >
        </aside>
        <section class='info'>
            <h1><?php echo $email;?></h1>
            <form method="post" action="#" enctype="multipart/form-data">
                <input type="file" name="myimage"  onchange="preview_image(event)" ><br>
                <label>First Name</label><input type="text" name="fname" value="<?php echo $fname?>"/><br><br>
                <label>Last Name</label><input type="text" name="lname" value="<?php echo $lname?>"/><br><br>
                <label>Phone Number</label><input type="text" name="phone" value="<?php echo $phone?>"/><br>
                <input type="hidden" name="image" value="<?php echo $imgname?>">
                <input type="hidden" name="id" value="<?php echo $id?>">
                <button name="submit">Submit Changes</button>
            </form>
            <?php } ?>


        </section>
    </div>
</div>

<?php
if(isset($_POST['submit'])) {
    $upload_images = $_FILES['myimage']['name'];
    $folder = "IMAGES/PROFILE/";
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $phone = $_POST['phone'];
    $id = $_POST['id'];
    $image = $_POST['image'];

    $upload_images = $_FILES['myimage']['name'];
    move_uploaded_file($_FILES['myimage']['tmp_name'], "$folder" . $_FILES["myimage"]["name"]);



    if ($upload_images == "" ){

                $sql = "UPDATE `customer` SET `FirstName`='$fname',`LastName`='$lname',`PhoneNumber`='$phone',`Image`='$image'
                    WHERE `CustomerID`='$id'";
                    $result = mysqli_query($db, $sql);
            if ($result) {
                header("Location: profile.php?message=success");
            } else {
                header("Location: profile.php?message=error");
            }

    }else{

                $sql = "UPDATE `customer` SET `FirstName`='$fname',`LastName`='$lname',`PhoneNumber`='$phone',`Image`='$upload_images'
                    WHERE `CustomerID`='$id'";
                $result = mysqli_query($db, $sql);
                if ($result) {
                    header("Location: profile.php?message=success");
                } else {
                    header("Location: profile.php?message=error");
                }
    }

}
}
?>

<script type="text/javascript">

    function preview_image(event)
    {
        var reader = new FileReader();
        reader.onload = function()
        {
            var output = document.getElementById('output_image');
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
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
