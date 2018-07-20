<?php
$db=mysqli_connect("localhost", "root","") ;
if (!$db) {
    die ("Could not connect to database" . mysqli_connect_error());
}

mysqli_select_db($db,'cherono') or die('Error selecting database : ' . mysql_error());




