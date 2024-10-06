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


    $ide = $_POST['ide'];
    $bide = (int)$ide;
    $writer = $_POST['writer'];
    $bwriter = (int)$writer;

    $sql_query = " DELETE FROM blog WHERE `id` = $bide AND `writer`= $bwriter " ;
    $last_query= mysqli_query($connection, $sql_query);

    // $connection->close();
    
}
header('location:my_blog.php');


?>