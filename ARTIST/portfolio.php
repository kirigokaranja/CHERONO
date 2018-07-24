<!DOCTYPE html>
<html>
<head>
    <title>StephanieAdmin | Portfolio</title>
    <link rel="icon" type="image/ico" href="../favicon.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../CSS/top_part.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="../CSS/navbar.css" type="text/css">
    <link rel="stylesheet" href="../CSS/portfolio.css" type="text/css">
    <link rel="stylesheet" href="../CSS/bootstrap.min.css" type="text/css">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
<?php
session_start();
include '../DBConnect.php';
global $db;
if(isset($_SESSION['email'])){
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
        <a href="portfolio.php" style="text-decoration:none" class="active">portfolio</a>
        <a href="messages.php" style="text-decoration:none" >messages <span class="new badge" style="background-color: #d02954"><?php if($count !== 0){
                    echo $count ;
                }?></span></a>
        <a  href="index.php" style="text-decoration:none" >schedule</a>
    </nav>
    <div class="parallax" style=" background-image: url(../IMAGES/raphael-lovaski-532696-unsplash.jpg) ">
        <div class="overlay">
            <h1>Portfolio</h1>
        </div>

    </div>
<?php
//get the url
$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

//checking string position
if(strpos($url,'message=error')){
    echo "<div class=\"alert alert-danger\" style='width: 25%;margin-left: 35%;margin-top: 5%'>Image not added</div>";
}else if (strpos($url,'message=success')) {
    echo "<div class=\"alert alert-success\" style='width: 25%;margin-left: 35%;margin-top: 5%'><strong>Success!</strong> Image added</div>";
}

?>
    <div >
        <section>
            <div class="container1" >
                <div class="picture-holder">
                    <img src=" " id="output_image" class='image' alt="Profile Image"  >
                </div>
                <div class="story-holder">
                    <h1 class="formh1">Portfolio</h1><br>
                    <form method="post" action="ACTIONS/addPortfolio.php" enctype="multipart/form-data">
                        <input type="file" name="myimage"  onchange="preview_image(event)" ><br>
                        <label>
                            <span>Image Category</span><br>
                            <?php
                            $status = "active";
                            $sql=mysqli_query($db, "SELECT * FROM package where status = '$status'" );
                            if(mysqli_num_rows($sql)){

                            ?>
                                <select name="category"  required style="font-size:large; border:none">
                                <option value="choose">Choose a Category</option>
                                <?php
                                while($rs=mysqli_fetch_array($sql)){
                                    ?>
                                    <option value="<?php echo $rs['PackageName']; ?>"><?php echo $rs['PackageName'];} ?></option></select>
                                <?php
                            }
                            ?>
                        </label><br>
                        <label>
                            <span>Image Details</span><br>
                            <textarea type="text" name="details" required rows="2" cols="35"></textarea>
                        </label>
                        <br>
                        <div class="text-center">
                            <button type="submit" class="buttonsubmit">Add Image</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>

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
        window.location.href = '../login.php';
    </script>
    <?php
}
?>
</body>
</html>
