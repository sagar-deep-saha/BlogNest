<?php
session_start();
if($_SESSION["new_session"]==false){
    header('location:log.php');
    exit;
}

$df = $_SESSION['emailadd'];


if (isset($_SERVER['REQUEST_METHOD'])) {

    // $server = "localhost";
    // $user = "root";
    // $password = "";
    // $database = "glitch";
    require_once("connector.php");

    $connection = mysqli_connect($server,$user,$password,$database);
    if($connection == false){
        die(mysqli_connect_error());
    }

    // require "connector.php";

    $blog = $_POST['blog'];
    $type = $_POST['title'];
    $writer = $_POST['writer'];



    $sql_query = "INSERT INTO `glitch`.`blog`(`blog`,`type`,`writer`) VALUES ('$blog','$type','$writer') ";
    $last_query= mysqli_query($connection,$sql_query);

    $connection->close();
    
}
header('location:blog.php');


?>