<!DOCTYPE html>
<html>
<head>
    <title>StephaneAdmin | Packages</title>
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
<nav class="homenavbar">
    <a href="index.php" style="float: left; padding-top: 0; margin-left: 140px;text-decoration: none"><img src="../logo.png"></a>
    <a href="logout.php"><button class="loginBtn">Logout</button></a>
    <a href="bookings.php" style="text-decoration:none">Bookings</a>
    <a href="packages.php" style="text-decoration:none" class="active">packages</a>
    <a href="portfolio.php" style="text-decoration:none">portfolio</a>
    <a href="messages.php" style="text-decoration:none" >messages</a>
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
                                <th class="cell100 column5">Delete</th>
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
                            ?>
                            <tr class="row100 body">
                                <td class="cell100 column1"><?php echo $name; ?></td>
                                <td class="cell100 column2"><?php echo $price; ?></td>
                                <td class="cell100 column3"><?php echo $details; ?></td>
                                <td class="cell100 column4"><i class="material-icons button edit" data-toggle="modal" data-target="#myModal">edit</i></td>
                                <td class="cell100 column5"><i class="material-icons button delete">delete</i></td>
                            </tr>

                            <div class="modal fade" id="myModal" role="dialog">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">

                                        <div class="modal-body">
                                            <section>
                                                <div class="container1" >
                                                    <div class="picture-holder"></div>
                                                    <div class="story-holder">
                                                        <h1 class="formh1">Package</h1><br><br><br>
                                                        <form method="post" action="ACTIONS/EditPackage.php" >
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
                                                    </div>
                                                </div>
                                            </section>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
</body>
</html>