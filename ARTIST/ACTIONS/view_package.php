<!DOCTYPE html>
<html>
<head>
    <title>StephanieAdmin | Package</title>
    <link rel="icon" type="image/ico" href="../../favicon.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../../CSS/top_part.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="../../CSS/navbar.css" type="text/css">
    <link rel="stylesheet" href="../../CSS/genre.css" type="text/css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>
<header>
    <nav class="homenavbar">
        <a href="../index.php" style="float: left; padding-top: 0; margin-left: 140px;text-decoration: none"><img src="../../logo.png"></a>
        <a href="../logout.php"><button class="loginBtn">Logout</button></a>
        <a href="../bookings.php" style="text-decoration:none" >Bookings</a>
        <a href="../packages.php" style="text-decoration:none" class="active">packages</a>
        <a href="../portfolio.php" style="text-decoration:none">portfolio</a>
        <a href="../messages.php" style="text-decoration:none" >messages</a>
        <a  href="../index.php" style="text-decoration:none" >schedule</a>
    </nav>
</header>


<?php
include('../../DBConnect.php');

if (isset($_GET['id'])){
    $id = $_GET['id'];
}

$sql3="SELECT * FROM `package` WHERE `PackageID`='$id' ";
$data=mysqli_query($db,$sql3);
while($row=mysqli_fetch_assoc($data)){
    $name = $row['PackageName'];
    $pid = $row['PackageID'];
    $price = $row['PackagePrice'];
    $details = $row['PackageDetails'];


?>
<div>

    <section>
        <div class="container1" >
            <div class="picture-holder"></div>
            <div class="story-holder">
                <h1 class="formh1">Package <?php echo $pid;?></h1><br><br>
                <form method="post" action="EditPackage.php" >
                    <input type="hidden" name="id" value="<?php echo $pid;?>">
                    <label>
                        <span>Package Name</span><br>
                        <input type="text" name="name" required value="<?php echo $name; ?>"/>
                    </label><br>
                    <label>
                        <span>Package Price</span><br>
                        <input type="text" name="price" required value="<?php echo $price; ?>"/>
                    </label><br>
                    <label>
                        <span>Package Details</span><br>
                        <textarea type="text" name="details" required rows="4" cols="20"><?php echo $details; ?></textarea>
                    </label>
                    <input type="hidden" name="id" value=" <?php echo $id; ?>">
                    <br><br>
                    <div class="text-center">
                        <button type="submit" class="buttonsubmit">Edit Package</button>
                    </div>
                </form>
                <?php } ?>
            </div>
        </div>
    </section>
</div>
</body>
</html>
