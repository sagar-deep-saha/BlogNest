<?php
session_start();
if($_SESSION["new_session"]==false){
    header('location:log.php');
    exit;
}

$df = $_SESSION['emailadd'];


if (isset($_SERVER['REQUEST_METHOD'])) {

    require_once("connector.php");

    $connection = mysqli_connect($server,$user,$password,$database,$port);
    if($connection == false){
        die(mysqli_connect_error());
    }

    $blogid = $_POST['blogid'];
    $writer = $_POST['writer'];
    $comment = $_POST['comment'];



    $sql_query = "INSERT INTO `comment`(`blogid`,`writer`,`comment`) VALUES ('$blogid','$writer','$comment');";
    $last_query= mysqli_query($connection,$sql_query);

    header('location:blog.php');
}


?>