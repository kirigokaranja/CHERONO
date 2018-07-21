<!DOCTYPE html>
<html>
<head>
    <title>StephanieAdmin | Messages</title>
    <link rel="icon" type="image/ico" href="../favicon.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../CSS/top_part.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="../CSS/navbar.css" type="text/css">
    <link rel="stylesheet" href="../CSS/tabs.css" type="text/css">
    <link rel="stylesheet" href="../CSS/genre.css" type="text/css">
    <link rel="stylesheet" href="../CSS/tables.css" type="text/css">
    <link rel="stylesheet" href="../CSS/bootstrap.min.css" type="text/css">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


</head>
<body>
<?php
include '../DBConnect.php';
global $db;
$st = "replied";
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
    <a href="messages.php" style="text-decoration:none" class="active">messages <span class="new badge" style="background-color: #d02954"><?php if($count !== 0){
                echo $count ;
            }?></span></a>
    <a  href="index.php" style="text-decoration:none" >schedule</a>
</nav>
<div class="parallax" style=" background-image: url(../IMAGES/raphael-lovaski-532696-unsplash.jpg);">
    <div class="overlay">
        <h1 style="margin-top: -0.1px;">Messages</h1><br>

    </div>
</div>
<?php
//get the url
$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

//checking string position
if(strpos($url,'message=error')){
    echo "<div class=\"alert alert-danger\" style='width: 25%;margin-left: 35%;margin-top: 5%'> Message not replied.</div>";
}else if (strpos($url,'message=amesagesent')) {
    echo "<div class=\"alert alert-success\" style='width: 25%;margin-left: 35%;margin-top: 5%'><strong>Success!</strong> Message Replied Successfully.</div>";
}else if (strpos($url,'message=editpackage')) {
    echo "<div class=\"alert alert-success\" style='width: 25%;margin-left: 35%;margin-top: 5%'><strong>Success!</strong> Package edited Successfully.</div>";
}

?>



    <div class="limiter">
        <div class="container-table100">
            <div class="wrap-table100">
                <div class="table100 ver1 m-b-110">
                    <div class="table100-head">
                        <table>
                            <thead>
                            <tr class="row100 head">
                                <th class="cell100 column1">Date</th>
                                <th class="cell100 column2">Name</th>
                                <th class="cell100 column3">Email</th>
                                <th class="cell100 column4">Phone</th>
                                <th class="cell100 column5">Read</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                    <div class="table100-body js-pscroll">
                        <table>
                            <tbody>
                            <?php

                            $status = "unread";
                            $sql = "SELECT * FROM messages WHERE status = '$status' ORDER BY MessageDate DESC  ";
                            $result = $db->query($sql) or trigger_error($db->error."[$sql]");
                            while($row = mysqli_fetch_array($result)){

                            $date = $row['MessageDate'];
                            $id = $row['MessageID'];
                            $name = $row['name'];
                            $email = $row['email'];
                            $phone = $row['phone'];

//                            if ($result = " "){
//                                ?>
<!--                                <tr class="row100 body">-->
<!--                                    <td colspan="5" class="cell100 column1">No Message received yet.</td>-->
<!--                                   </tr>-->
<!--                            --><?php
//                            }else{
                            ?>
                            <tr class="row100 body">
                                <td class="cell100 column1"><?php echo $date; ?></td>
                                <td class="cell100 column2"><?php echo $name; ?></td>
                                <td class="cell100 column3"><?php echo $email; ?></td>
                                <td class="cell100 column4"><?php echo $phone; ?></td>
                                <td class="cell100 column5"><a href="ACTIONS/readMessage.php?id=<?php echo $id;?>"> <i class="material-icons button reply">reply</i></a></td>
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


<script type='text/javascript' src='../JS/jquery-3.2.1.min.js'></script>
<script type='text/javascript' src='../BOOTSTRAP/bootstrap.min.js'></script>
</body>
</html>
