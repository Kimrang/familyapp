<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Messages</title>
        <?php
            include("./styles.php");
        ?>
    </head>
    <body>
        <?php
            session_start();

            if ($_SESSION['uid']) {
                require_once('../scripts/db_con.php');
                include('./components/header.php');

                $uid = $_SESSION['uid'];
                $query = "SELECT * FROM MESSAGE WHERE SENDER_ID='$uid' OR RECEPIENT_ID='$uid' ORDER BY TSTAMP DESC";
                $res = mysqli_query($con, $query);
                $num_rows = mysqli_num_rows($res);
                
                echo "
                    <a class=\"btn btn-success m-3\" href=\"compose_msg.php\">
                        Compose new message
                    </a>
                ";

                echo "<section class=\"mt-3\">";

                for ($i = 0; $i < $num_rows; $i++) {
                    $message = mysqli_fetch_assoc($res);
                    
                    echo "
                        <article class=\"message w-50 ms-3 mb-3 p-3 rounded-3 border\">
                            <ul class=\"list-group\">
                                <li><b>From:</b> {$message['SENDER_NAME']}</li>
                                <li><b>To:</b> {$message['RECEPIENT_NAME']}</li>
                                <li><b>Subject:</b> {$message['SUB']}</li>
                                <li><b>Email:</b> {$message['EMAIL']}</li>
                                <li><b>Time:</b> {$message['TSTAMP']}</li>
                            </ul>
                            <p class=\"mt-4\">
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