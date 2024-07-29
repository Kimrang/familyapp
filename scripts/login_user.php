<?php
    require_once("db_con.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);
    
        $query = "SELECT ID, FID FROM USERS WHERE USERNAME='$username' AND PWD='$password'";
        $res = mysqli_query($con, $query);
        
        if (mysqli_num_rows($res) == 0) {
            header("Location: ../pages/index.php?login=failed");
        } else {
            session_start();

            $tuple = mysqli_fetch_assoc($res);
            $_SESSION['isActive'] = true;
            $_SESSION['uid'] = (int) $tuple['ID'];
            $_SESSION['username'] = $username;
            $_SESSION['fid'] = (int) $tuple['FID'];
            
            $query = "SELECT FAMILYNAME FROM FAMILY WHERE ID={$tuple['FID']}";
            $res = mysqli_query($con, $query);
            $row = mysqli_fetch_assoc($res);            
            $_SESSION['familyname'] = $row['FAMILYNAME'];

            header("Location: ../pages/home.php");
            
            exit();
        }
    }
?>