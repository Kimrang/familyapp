<?php
    require_once("../scripts/db_con.php");

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = filter_input(INPUT_POST, "id", FILTER_SANITIZE_SPECIAL_CHARS);
        $uname = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
        $pwd = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);
        $fname = filter_input(INPUT_POST, "fullname", FILTER_SANITIZE_SPECIAL_CHARS);
        $dob = filter_input(INPUT_POST, "dob", FILTER_SANITIZE_SPECIAL_CHARS);
        $rel = filter_input(INPUT_POST, "relationship", FILTER_SANITIZE_SPECIAL_CHARS);

        $query = "UPDATE USERS SET USERNAME='$uname', PWD='$pwd', FULLNAME='$fname', DOB='$dob', RELATIONSHIP='$rel' WHERE ID='$id'";
        $res = mysqli_query($con, $query);
        
        if (isset($res)) {
            header("Location: ../pages/profile.php");
        } else {
            
        }
    }    
?>