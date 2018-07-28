<?php
require '../../DBConnect.php';

    $status= $_POST['status'];
    $Message=$_POST['Message'];
    $id = $_POST['id'];

    $sql3="SELECT * FROM `book` WHERE `id`='$id'";
    $data=mysqli_query($db,$sql3);
    while($row=mysqli_fetch_assoc($data)) {

        $package = $row['packageID'];
        $ctg = explode(" " , $package);
        $location = $row['location'];
        $title = $location." ,".$ctg[0];
        $time = $row['time'];
        $tme = explode("-" , $time);
        $date = $row['date'];
        $strt = $date." ".$tme[0];
        $end = $date." ".$tme[1];
        $desc = $row['description'];

        $sq = "INSERT INTO `schedule`(`bookID`, `title`, `date`, `start`, `end`, `package`, `location`, `description`) 
        VALUES ('$id', '$title', '$date', '$strt', '$end','$package', '$location', '$desc')";
        $result1 = mysqli_query($db, $sq);

    }

        $sql1 = "UPDATE `book` SET `status`='$status',`response`='$Message' WHERE `id` = '$id'";
        $result = mysqli_query($db, $sql1);

        if ($result && $result1) {
            header("Location: ../bookings.php?message=amesagesent");
        } else {
            header("Location: ../bookings.php?message=error");
        }
