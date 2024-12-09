<?php

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'emp';

    $conn = new mysqli($servername , $username, $password, $dbname);
    if ($conn->connect_error) {
        die("connection field" . $conn->connect_error);
    }

    $sql = "delete from emp where id=$id";
    $conn->query( $sql );
}

header("location:/employee/index.php");
exit;

?>