<?php
    $dbServer = "localhost";
    $dbUser = "root";
    $dbPassword = "";
    $dbName = "auth";

    $conn = mysqli_connect($dbServer, $dbUser, $dbPassword, $dbName);

    if(!$conn){
        die('Connection failed'.mysqli_connect_error());
    }else{
        echo 'connection successfull';
    }
