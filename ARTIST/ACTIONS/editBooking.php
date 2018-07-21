<?php
require '../../DBConnect.php';

    $status= $_POST['status'];
    $Message=$_POST['Message'];
    $id = $_POST['id'];

    $sql1="UPDATE `book` SET `status`='$status',`response`='$Message' WHERE `id` = '$id'";
    $result = mysqli_query($db,$sql1);
    echo $sql1;
    if ($result){
        header("Location: ../bookings.php?message=amesagesent");
    }else{
        header("Location: ../bookings.php?message=error");
    }
