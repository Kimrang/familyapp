<?php
    require_once("db_con.php");
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);
        $familyid = filter_input(INPUT_POST, "familyid", FILTER_SANITIZE_SPECIAL_CHARS);

        $query = "INSERT INTO USERS(USERNAME, PWD, FID) VALUES('$username', '$password', '$familyid')";
        $result = mysqli_query($con, $query);
    
        if(isset($result)) {
            header("Location: ../pages/login.php?registration=success");
            
            exit();
        } else {
            header("Location: ../pages/registration.php?registration=failed");
        }
    }
?>