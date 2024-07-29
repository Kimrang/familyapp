<?php
    require_once("db_con.php");
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);
        $familyid = filter_input(INPUT_POST, "familyid", FILTER_SANITIZE_SPECIAL_CHARS);

        $query = "SELECT ID FROM USERS WHERE USERNAME='{$username}' AND FID={$familyid}";
        $result = mysqli_query($con, $query);

        if (mysqli_num_rows($result) !== 0) {
            header("Location: ../pages/registration.php?registration=user+already+exists");

            exit();
        } 

        $query = "INSERT INTO USERS(USERNAME, PWD, FID) VALUES('$username', '$password', '$familyid')";
        $result = mysqli_query($con, $query);
    
        if(isset($result)) {
            header("Location: ../pages/index.php?registration=success");
            
            exit();
        } else {
            header("Location: ../pages/registration.php?registration=failed");
        }
    }
?>