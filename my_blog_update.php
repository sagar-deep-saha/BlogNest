<?php
session_start();
if($_SESSION["new_session"]==false){
    header('location:log.php');
    exit;
}

$df = $_SESSION['emailadd'];


if (isset($_SERVER['REQUEST_METHOD'])) {

    require "connector.php";

    $connection = mysqli_connect($server,$user,$password,$database);
    if($connection == false){
        die(mysqli_connect_error());
    }


    $id = $_POST['id'];
    $bid = (int)$id;
    $writer = $_POST['writer'];
    $bwriter = (int)$writer;
    $type = $_POST['title'];
    $blog = $_POST['blog'];

    $sql_query = " UPDATE `blog` SET  `type` = '$type' , `blog` = '$blog' WHERE `id` = $bid AND `writer`= $bwriter " ;
    $last_query= mysqli_query($connection, $sql_query);

    // $connection->close();
    
}
header('location:my_blog.php');


?>