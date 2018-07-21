<!DOCTYPE html>
<html>
<head>
    <title>StephanieAdmin | Booking</title>
    <link rel="icon" type="image/ico" href="../../favicon.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../../CSS/top_part.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="../../CSS/navbar.css" type="text/css">
    <link rel="stylesheet" href="../../CSS/message.css" type="text/css">
    <link rel="stylesheet" href="../../CSS/messageutil.css" type="text/css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>
<header>
    <nav class="homenavbar">
        <a href="../index.php" style="float: left; padding-top: 0; margin-left: 140px;text-decoration: none"><img src="../../logo.png"></a>
        <a href="../logout.php"><button class="loginBtn">Logout</button></a>
        <a href="../bookings.php" style="text-decoration:none" class="active">Bookings</a>
        <a href="../packages.php" style="text-decoration:none" >packages</a>
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

$sql3="SELECT * FROM `book` WHERE `id`='$id'";
$data=mysqli_query($db,$sql3);
while($fetch=mysqli_fetch_assoc($data)){
    $package=$fetch['packageID'];
    $date=$fetch['date'];
    $location=$fetch['location'];
    $description=$fetch['description'];
}
?>
<div>
    <center>
        <h2> Booking <?php echo $id;?></h2>
        <hr>
        <br>
        <div class="limiter">
            <div class="container-login100">
                <div class="wrap-login100">
                    <form class="login100-form validate-form" method="post" action="#">

                        <div class="wrap-input100 validate-input" >
                            <label>Date</label> <input class="input100" type="text"  value="<?php echo $date;?>" readonly>
                        </div>

                        <div class="wrap-input100 validate-input">
                            <label>Location</label> <input class="input100" type="text" value="<?php echo $location;?>" readonly>
                        </div>
                        <div class="wrap-input100 validate-input" >
                            <label>Package</label>  <input class="input100" type="text" value="<?php echo $package;?>" readonly>

                        </div>

                        <div class="wrap-input100 validate-input">
                            <label>Description</label><input class="input100" type="text" value="<?php echo $description;?>" readonly>
                        </div>
                    </form>
                    <input type="button" value="Accept" name="Reply" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">
                    <input type="button" value="Reject" name="rejected" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal2">

                </div>
            </div>
        </div>

        <div class="modal fade" id="myModal2" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Decline Booking
                            <?php echo $id;?></h4>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="editBooking.php">
                            <input type="hidden" value="accepted" name="status">
                            <input type="hidden" value="<?php echo $id;?>" name="id">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Enter decline message </label>
                                <textarea class="form-control" id="exampleInputReason" name="Message" required></textarea>
                            </div>
                            <button class="btn colors btn-block" name="Foward">Reply</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Accept Booking
                            <?php echo $id;?></h4>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="editBooking.php">
                            <input type="hidden" value="accepted" name="status">
                            <input type="hidden" value="<?php echo $id;?>" name="id">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Enter message </label>
                                <textarea class="form-control" id="exampleInputReason" name="Message" required></textarea>
                            </div>
                            <button class="btn colors btn-block" name="Foward">Reply</button>

                            <style>
                                .colors {
                                    padding-bottom: 5px;
                                    padding-top: 5px;
                                    background-color: #5bc0de;
                                    color: white;
                                }

                                .colors:hover {
                                    color: #5bc0de;
                                    background-color: black;
                                }

                            </style>
                            <br>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>

    </center>
</div>
</body>
</html>
