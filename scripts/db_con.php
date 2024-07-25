<?php
    $serverName = "localhost";
    $username = "root";
    $password = "";
    $dbName = "familyapp";

    $con = mysqli_connect($serverName, $username, $password, $dbName);

    if (mysqli_connect_errno()) {
        echo "<script>console.log('Connection failed!')</script>";
        exit();
    }

    echo "<script>console.log('Connection successful!')</script>";
?>