<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Messages</title>
    </head>
    <body>
        <?php
            session_start();

            if ($_SESSION['uid']) {
                require_once('../scripts/db_con.php');
            
                $uid = $_SESSION['uid'];
                $query = "SELECT * FROM MESSAGE WHERE SENDER_ID='$uid' OR RECEPIENT_ID='$uid' ORDER BY TSTAMP DESC";
                $res = mysqli_query($con, $query);
                $num_rows = mysqli_num_rows($res);
                
                echo "
                    <a href=\"compose_msg.php\">
                        Compose new message
                    </a>
                ";

                echo "<section>";

                for ($i = 0; $i < $num_rows; $i++) {
                    $message = mysqli_fetch_assoc($res);
                    
                    echo "
                        <article>
                            <ul>
                                <li>From: {$message['SENDER_NAME']}</li>
                                <li>To: {$message['RECEPIENT_NAME']}</li>
                                <li>Subject: {$message['SUB']}</li>
                                <li>Email: {$message['EMAIL']}</li>
                                <li>Time: {$message['TSTAMP']}</li>
                            </ul>
                            <p>
                                {$message['MSG']}
                            </p>
                        </article>
                    ";
                }

                echo "</section>";
            } else {
                die("You are not logged in");
            }
        ?>        
    </body>
</html>