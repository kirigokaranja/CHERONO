<?php
session_start();
include ("../DBConnect.php");
if(isset($_SESSION['email'])) {

    $query = "SELECT * FROM schedule  ORDER BY id";
    $result = mysqli_query($db, $query);

    echo json_encode(mysqli_fetch_all($result, MYSQLI_ASSOC));
}