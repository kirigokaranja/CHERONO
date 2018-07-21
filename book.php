<!DOCTYPE html>
<html>
<head>
    <title>Stephane | Book</title>
    <link rel="icon" type="image/ico" href="favicon.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="CSS/navbar.css" type="text/css">
    <link rel="stylesheet" href="CSS/book.css" type="text/css">
    <link rel="stylesheet" href="CSS/book1.css" type="text/css">

    <style>
        p{
            margin-top: -70px;
            font-family: 'Playfair Display', serif;
            font-size: 40px;
            font-weight: 400;
            line-height: 52px;
            letter-spacing: 0.01em;
        }
        .right-side .cta .btn1{
            padding: 13px 25px;
            border: none;
            color: #fff;
            display: inline-block;
            font-family: 'lato', sans-serif;
            text-transform: uppercase;
            font-size: 13px;
            letter-spacing: 0.12em;
            border-radius: 24px;
            background: #1157e6;
        }
        .right-side .cta .btn1:hover {
            -webkit-transition: 0.2s ease-in;
            -o-transition: 0.2s ease-in;
            transition: 0.2s ease-in;
            background: black;
        }
    </style>
</head>
<body>
<nav class="homenavbar">
    <a href="index.php" style="float: left; padding-top: 0; margin-left: 140px;text-decoration: none"><img src="logo.png"></a>
    <a href="logout.php"><button class="loginBtn">Logout</button></a>
    <a href="bookings.php" style="text-decoration:none">Bookings</a>
    <a href="notifications.php" style="text-decoration:none" >Notifications</a>
    <a href="profile.php" style="text-decoration:none">Profile</a>
    <a href="book.php" style="text-decoration:none" class="active">Book</a>
    <a  href="index.php" style="text-decoration:none">Home</a>
</nav>
<?php

session_start();
include ("DBConnect.php");

$id = "kirigokaranja@gmail.com";

$s = "SELECT * FROM customer WHERE Email = '$id'";
global $db;
$res = $db->query($s) or trigger_error($db->error."[$s]");


while($row = mysqli_fetch_array($res)) {
$fname = $row['FirstName'];
$sname = $row['LastName'];
$custid = $row['CustomerID'];


?>
<div id="main-wrapper">

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 left-side">
                <header>
                    <h3 style="color: #1157e6;"> <?php echo $fname." ".$sname;?>,</h3>
                    <br> <span>Need a makeup artist?</span>
                    <h3>Book Me Now<br>While You Still Can</h3>
                </header>
            </div>
            <form action="book_action.php" method="post">
                <div class="col-md-6 right-side">
                    <?php
                    $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

                    // error message incase username or password are incorrect

                    if(strpos($url,'message=error')){
                        echo "<p style='color:red; font-size:20px;text-align: center;'>An Error Ocurred</p>";
                    }elseif(strpos($url,'message=success')){
                        echo "<p class='heading' style='color:#24c315;text-align: center; font-size: 25px;margin-top: 1%'>Booking Successful </p>";
                    }
                    ?>
                    <input type="hidden" name="custid" value="<?php echo $custid;?>">
                    <span class="input input--hoshi"><?php } ?>
                        <input type="text" readonly style="border: none">
          <input class="input__field input__field--hoshi" type="date" id="date" name="date"  min="<?php echo date('Y-m-d'); ?>" max="<?php echo date('Y-m-d', strtotime('+3 months')); ?>" required />
          <label class="input__label input__label--hoshi input__label--hoshi-color-3" for="date">
            <span class="input__label-content input__label-content--hoshi">Date</span>
          </label>
        </span>
                    <span class="input input--hoshi">
                    <input type="text" readonly style="border: none">
          <input class="input__field input__field--hoshi" type="text" id="location" name="location" required  />
          <label class="input__label input__label--hoshi input__label--hoshi-color-3" for="location">
            <span class="input__label-content input__label-content--hoshi">Location</span>
          </label>
        </span>

                    <span class="input input--hoshi">
                    <input type="text" readonly style="border: none">
                        <?php
                        $sql=mysqli_query($db, "SELECT * FROM package" );
                        if(mysqli_num_rows($sql)){

                        ?>
                        <select name="package"  class="input__field input__field--hoshi" id="package"  required style="font-size:large; outline:none">
                        <option value="choose">Choose a Package</option>
                            <?php
                            while($rs=mysqli_fetch_array($sql)){
                            ?>
                            <option value="<?php echo $rs['PackageName']; ?>"><?php echo $rs['PackageName'];} ?></option></select>
                        <?php
                        }
                        ?>
                        <label class="input__label input__label--hoshi input__label--hoshi-color-3" for="package" >
            <span class="input__label-content input__label-content--hoshi">Package</span>
          </label>
        </span>

                    <span class="input input--hoshi">
                    <input type="text" readonly style="border: none">
          <input class="input__field input__field--hoshi" type="text" name="description" id="description"  required/>
          <label class="input__label input__label--hoshi input__label--hoshi-color-3" for="description">
            <span class="input__label-content input__label-content--hoshi">Description</span>
          </label>
        </span>

                    <div class="cta">
                        <button class="btn btn-primary pull-left" name="book">
                            Book Now
                        </button> &emsp;&emsp;
                        <button class="btn1" onclick="window.location.href='index.php'">
                            Back
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
