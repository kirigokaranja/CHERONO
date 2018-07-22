<!DOCTYPE html>
<html>
<head>
    <title>StephanieAdmin | Packages</title>
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
    <a href="packages.php" style="text-decoration:none" class="active">packages</a>
    <a href="portfolio.php" style="text-decoration:none">portfolio</a>
    <a href="messages.php" style="text-decoration:none" >messages <span class="new badge" style="background-color: #d02954"><?php if($count !== 0){
                echo $count ;
            }?></span></a>
    <a  href="index.php" style="text-decoration:none" >schedule</a>
</nav>
<div class="parallax" style=" background-image: url(../IMAGES/raphael-lovaski-532696-unsplash.jpg);">
    <div class="overlay">
        <h1 style="margin-top: -0.1px;">Packages</h1><br>
        <button class="tablink" onclick="openPage('News')" id="defaultOpen" style="margin-left: 30%">Add Package</button>
        <button class="tablink" onclick="openPage('Home')" style="margin-left: 3%">View Packages</button>
    </div>
</div>
<?php
//get the url
$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

//checking string position
if(strpos($url,'message=error')){
    echo "<div class=\"alert alert-danger\" style='width: 25%;margin-left: 35%;margin-top: 5%'> An Error Occurred.</div>";
}else if (strpos($url,'message=addpackage')) {
    echo "<div class=\"alert alert-success\" style='width: 25%;margin-left: 35%;margin-top: 5%'><strong>Success!</strong> Package added Successfully.</div>";
}else if (strpos($url,'message=editpackage')) {
    echo "<div class=\"alert alert-success\" style='width: 25%;margin-left: 35%;margin-top: 5%'><strong>Success!</strong> Package edited Successfully.</div>";
}else if (strpos($url,'message=delete')) {
    echo "<div class=\"alert alert-success\" style='width: 25%;margin-left: 35%;margin-top: 5%'><strong>Success!</strong> Package was deleted.</div>";
}

?>
<div id="News" class="tabcontent">
    <section>
        <div class="container1" >
            <div class="picture-holder"></div>
            <div class="story-holder">
                <h1 class="formh1">Package</h1><br><br><br>
                <form method="post" action="ACTIONS/addPackage.php" >
                    <label>
                        <span>Package Name</span><br>
                        <input type="text" name="name" required/>
                    </label><br>
                    <label>
                        <span>Package Price</span><br>
                        <input type="text" name="price" required/>
                    </label><br>
                    <label>
                        <span>Package Details</span><br>
                        <textarea type="text" name="details" required rows="4" cols="35"></textarea>
                    </label>
                    <br><br>
                    <div class="text-center">
                        <button type="submit" class="buttonsubmit">Add Package</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>


<div id="Home" class="tabcontent">
    <div class="limiter">
        <div class="container-table100">
            <div class="wrap-table100">
                <div class="table100 ver1 m-b-110">
                    <div class="table100-head">
                        <table>
                            <thead>
                            <tr class="row100 head">
                                <th class="cell100 column1">Package Name</th>
                                <th class="cell100 column2">Package Details</th>
                                <th class="cell100 column3">Package Price</th>
                                <th class="cell100 column4">Edit</th>
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
                            $sql = "SELECT * FROM package";
                            $result = $db->query($sql) or trigger_error($db->error."[$sql]");
                            while($row = mysqli_fetch_array($result)){

                            $name = $row['PackageName'];
                            $id = $row['PackageID'];
                            $price = $row['PackagePrice'];
                            $details = $row['PackageDetails'];
                            $status = $row['status'];
                            ?>
                            <tr class="row100 body">
                                <td class="cell100 column1"><?php echo $name; ?></td>
                                <td class="cell100 column2"><?php echo $price; ?></td>
                                <td class="cell100 column3"><?php echo $details; ?></td>

                                <?php
                                if ($status == "active"){
                                    ?>
                                    <td class="cell100 column4"><a href="ACTIONS/view_package.php?id=<?php echo $id; ?>">
                                            <i class="material-icons button edit">edit</i></a></td>
                                    <td class="cell100 column5"><a href="ACTIONS/deletePackage.php?id=<?php echo $id; ?>">
                                            <i class="material-icons button delete">delete</i></a></td>
                                <?php
                                }else{
                                    ?>
                                    <td class="cell100 column4"><a href="ACTIONS/view_package.php?id=<?php echo $id; ?>">
                                            <i class="material-icons button edit">edit</i></a></td>
                                    <td class="cell100 column5"><a href="ACTIONS/updatePackage.php?id=<?php echo $id; ?>">
                                            <i class="material-icons button">autorenew</i></a></td>
                                <?php
                                }
                                ?>

                            </tr>

                    </div>
                            <?php }?>

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<script>
    function openPage(pageName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        document.getElementById(pageName).style.display = "block";

    }
    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpen").click();
</script>
<script type='text/javascript' src='../JS/jquery-3.2.1.min.js'></script>
<script type='text/javascript' src='../BOOTSTRAP/bootstrap.min.js'></script>
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
