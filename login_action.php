<?php
include "DBConnect.php";
global $db;
if(isset($_POST['login'])){

    $user=$_POST['username'];
    $pass=$_POST['pass'];
    $hash = md5($pass);

    $sql = "SELECT * FROM `users` WHERE `email`='$user'and `password`='$hash'";
    $result = $db->query($sql) or trigger_error($db->error . "[$sql]");
    if ($result && $row = $result->fetch_assoc()) {

        $utype = $row['user_type'];

        session_start();
        if($utype == 2) {

            $custID = $row['email'];
            $_SESSION['email'] = $custID;
            ?>
            <script type="text/javascript">
                window.location.href = 'book.php';
            </script>
            <?php

        }else{
            $adminID = $row['email'];
            $_SESSION['email'] = $adminID;
            ?>
            <script type="text/javascript">
                window.location.href = 'ARTIST/index.php';

            </script>
            <?php
        }
    }else{
        header("Location: login.php?message=error");
    }

}
?>