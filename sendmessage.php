
<?php

require('DBConnect.php');
global $db;

$name= $_POST['name'];
$message = $_POST['message'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$status = "unread";
$date = date("Y/m/d");

$sql = "INSERT INTO `messages`( `MessageDate`, `name`, `email`, `phone`, `message`, `status`)
       VALUES  ('$date', '$name', '$email', '$phone', '$message', '$status');";
$result = mysqli_query($db,$sql);
echo $sql;
if ($result){
    header("Location: contact.php?message=sent");
}else{
    header("Location: contact.php?message=error");
}







