<?php
    /* 
    // for college computer

    $serverName = "mcaserver";
    $username = "user01";
    $password = "sac";
    $dbName = "user01";
    */

    // for home computer

    $serverName = "localhost";
    $username = "root";
    $password = "";
    $dbName = "familyapp";


    $con = mysqli_connect($serverName, $username, $password, $dbName);

    if (mysqli_connect_errno()) {
        die("Error connecting to {$dbName}");
        exit();
    }

?>