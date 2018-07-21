<!DOCTYPE html>
<html>
<head>
    <title>StephanieAdmin | Schedule</title>
    <link rel="icon" type="image/ico" href="../favicon.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../CSS/top_part.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="../CSS/navbar.css" type="text/css">

    <link rel="stylesheet" href="../CSS/tables.css" type="text/css">
    <link rel="stylesheet" href="../CSS/bootstrap.min.css" type="text/css">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">>
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
    <a href="bookings.php" style="text-decoration:none" class="active">Bookings</a>
    <a href="packages.php" style="text-decoration:none" >packages</a>
    <a href="portfolio.php" style="text-decoration:none">portfolio</a>
    <a href="messages.php" style="text-decoration:none" >messages <span class="new badge" style="background-color: #d02954"><?php if($count !== 0){
                echo $count ;
            }?></span></a>
    <a  href="index.php" style="text-decoration:none" >schedule</a>
</nav>
<div class="parallax" style=" background-image: url(../IMAGES/raphael-lovaski-532696-unsplash.jpg) ">
    <div class="overlay">
        <h1>Bookings</h1>
    </div>

</div>

<div style="margin-top: 8%">
    <?php
    //get the url
    $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

    //checking string position
    if(strpos($url,'message=error')){
        echo "<div class=\"alert alert-danger\" style='width: 25%;margin-left: 35%;margin-top: -4%'> Booking not changed.</div>";
    }else if (strpos($url,'message=success')) {
        echo "<div class=\"alert alert-success\" style='width: 25%;margin-left: 35%;margin-top: -4%'><strong>Success!</strong> Booking edit Successful.</div>";
    }else if (strpos($url,'message=amesagesent')) {
        echo "<div class=\"alert alert-success\" style='width: 25%;margin-left: 35%;margin-top: -4%'><strong>Success!</strong> Booking changed.</div>";
    }

    ?><br>
    <div class="limiter">
        <div class="container-table100">

            <div class="wrap-table100">
                <div class="table100 ver1 m-b-110">
                    <div class="table100-head">
                        <table>
                            <thead>
                            <tr class="row100 head">
                                <th class="cell100 column1">Book Date</th>
                                <th class="cell100 column2">Location</th>
                                <th class="cell100 column3">Package</th>
                                <th class="cell100 column4">Description</th>
                                <th class="cell100 column5"></th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                    <div class="table100-body js-pscroll">
                        <table>
                            <tbody>
                            <?php
                            include '../DBConnect.php';
                            global $db;
                            $status = "pending";
                            $cid = '1';
                            $sql = "SELECT * FROM book WHERE status = '$status' and customerID = '$cid' ORDER BY id ASC  ";
                            $result = $db->query($sql) or trigger_error($db->error."[$sql]");
                            while($row = mysqli_fetch_array($result)){

                            $date = $row['date'];
                            $location = $row['location'];
                            $description = $row['description'];
                            $package = $row['packageID'];
                            $pid = $row['id'];
                            $sts = $row['status'];


                            ?>
                            <tr class="row100 body">
                                <td class="cell100 column1"><?php echo $date; ?></td>
                                <td class="cell100 column2"><?php echo $location; ?></td>
                                <td class="cell100 column3"><?php echo $package; ?></td>
                                <td class="cell100 column4"><?php echo $description; ?></td>
                                <td class="cell100 column5"><a href="ACTIONS/view_bookings.php?id=<?php echo $pid; ?>"> <i
                                                class="material-icons button ">edit</i></a></td>
                            </tr>


                    </div>
                    <?php

                    }?>

                    </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>

</body>
</html>
