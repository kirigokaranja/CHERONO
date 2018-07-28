<!DOCTYPE html>
<html>
<head>
    <title>StephanieAdmin | Schedule</title>
    <link rel="icon" type="image/ico" href="../favicon.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../CSS/top_part.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="../CSS/navbar.css" type="text/css">
    <link rel="stylesheet" href="../CSS/bootstrap.min.css" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>

    <style>
        body {
            background-color: white;
            text-align: center;
            font-size: 14px;
            font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
        }
        #calendar {
            width: 750px;
            margin-top: 5%;
            background-color: whitesmoke;
            margin-left: 15%;
        }
    </style>

    <script>
        $(document).ready(function() {
            var date = new Date();
            var d = date.getDate();
            var m = date.getMonth();
            var y = date.getFullYear();

            var calendar = $('#calendar').fullCalendar({
                editable: true,
                header:{
                    left:'prev,next today',
                    center:'title',
                    right:'month,agendaWeek,agendaDay'
                },
                events: "events.php",
                eventColor: '#d02954',
                eventTextColor: 'white',
                eventClick: function(event, jsEvent, view) {

                    alert('Date: ' + event.date  + '\n\n Package: ' + event.package+ '\n\n Location: ' + event.location+ '\n\n Description: '+ event.description  );

                }

            });

        });

    </script>

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
    <a href="portfolio.php" style="text-decoration:none">portfolio</a>
    <a href="messages.php" style="text-decoration:none" >messages <span class="new badge" style="background-color: #d02954"><?php if($count !== 0){
                echo $count ;
            }?></span></a>
    <a  href="index.php" style="text-decoration:none" class="active">schedule</a>
</nav>
<div class="parallax" style=" background-image: url(../IMAGES/raphael-lovaski-532696-unsplash.jpg) ">
    <div class="overlay">
        <h1>Schedule</h1>
    </div>
</div>
    <div class="container">
        <div id="calendar"></div>
    </div>



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
