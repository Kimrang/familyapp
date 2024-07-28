<?php
    require_once('db_con.php');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $sender_id = $_POST['sender-id'];
        $sender_name = $_POST['sender-name'];
        $recepient_id = $_POST['recepient-id'];
        $email = $_POST['email'];
        $sub = $_POST['subject'];
        $body = $_POST['body'];

        // getting the recepient name here since I don't know how to in compose_msg.php
        // again terrible fuckin code. But eh...

        $query = "SELECT USERNAME FROM USERS WHERE ID={$recepient_id}";
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_assoc($result);
        $recepient_name = $row['USERNAME'];

        $query = "INSERT INTO MESSAGE(SENDER_ID, SENDER_NAME, RECEPIENT_ID, RECEPIENT_NAME, EMAIL, SUB, MSG) 
        VALUES({$sender_id}, '{$sender_name}', {$recepient_id}, '{$recepient_name}', '{$email}', '{$sub}', '{$body}');
        ";
        $res = mysqli_query($con, $query);

        if (isset($res)) {
            Header("Location: ../pages/messages.php");
        } else {
            die("Error: Can't send message.");
        }
    }
?>