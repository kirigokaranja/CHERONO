<!DOCTYPE html>
<html>
<head>
    <title>StephanieAdmin | Messages</title>
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
        <a href="../bookings.php" style="text-decoration:none">Bookings</a>
        <a href="../packages.php" style="text-decoration:none" >packages</a>
        <a href="../portfolio.php" style="text-decoration:none">portfolio</a>
        <a href="../messages.php" style="text-decoration:none" class="active">messages</a>
        <a  href="../index.php" style="text-decoration:none" >schedule</a>
    </nav>
</header>


<?php
include('../../DBConnect.php');
if (isset($_GET['id'])){
    $id = $_GET['id'];
}
$sql3="SELECT * FROM `messages` WHERE `MessageID`='$id'";
$data=mysqli_query($db,$sql3);
while($fetch=mysqli_fetch_assoc($data)){
    $name=$fetch['name'];
    $service=$fetch['phone'];
    $Email=$fetch['email'];
    $Message=$fetch['message'];
}
?>
<div>
    <center>
        <h2><?php echo $name;?>'s  Message</h2>
        <hr>
        <br>
        <div class="limiter">
            <div class="container-login100">
                <div class="wrap-login100">
                    <form class="login100-form validate-form" method="post" action="#">

                        <div class="wrap-input100 validate-input" >
                            <label>Names</label> <input class="input100" type="text"  value="<?php echo $name;?>" readonly>
                        </div>

                        <div class="wrap-input100 validate-input">
                            <label>Email</label> <input class="input100" type="text" value="<?php echo $Email;?>" readonly>
                        </div>
                        <div class="wrap-input100 validate-input" >
                            <label>Phone</label>  <input class="input100" type="text" value="<?php echo $service;?>" readonly>

                        </div>

                        <div class="wrap-input100 validate-input">
                            <label>Message</label><input class="input100" type="text" value="<?php echo $Message;?>" readonly>
                        </div>
                    </form>
                    <input type="button" value="Reply" name="Reply" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">

                </div>
            </div>
        </div>
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Reply
                            <?php echo $name;?>'s Message</h4>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="#">

                            <div class="form-group">
                                <label for="exampleInputPassword1">Enter message </label>
                                <textarea class="form-control" id="exampleInputReason" name="Message" required></textarea>
                            </div>
                            <button class="btn colors btn-block" name="Foward">Reply</button>
                            <?php
                            if(isset($_POST['Foward'])){
                                $status= 'replied';
                                $Message=$_POST['Message'];

                                $sql1="UPDATE `messages` SET `status`='$status',`reply`='$Message' WHERE `MessageID` = '$id'";
                                $result = mysqli_query($db,$sql1);
                                echo $sql1;
                                if ($result){
                                    header("Location: ../messages.php?message=amesagesent");
                                }else{
                                    header("Location: ../messages.php?message=error");
                                }
                            }
                            ?>
                            <style>
                                .colors {
                                    padding-bottom: 5px;
                                    padding-top: 5px;
                                    background-color: #FAA612;
                                    color: white;
                                }

                                .colors:hover {
                                    color: #FAA612;
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
