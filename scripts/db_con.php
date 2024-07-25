<?php
    $serverName = "mcaserver";
    $username = "user01";
    $password = "sac";
    $dbName = "user01";

    $con = mysqli_connect($serverName, $username, $password, $dbName);

    if (mysqli_connect_errno()) {
        echo "<script>console.log('Connection failed!')</script>";
        exit();
    }

    echo "<script>console.log('Connection successful!')</script>";
?>