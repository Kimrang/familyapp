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
                        <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"18\" height=\"18\" fill=\"white\" class=\"bi bi-plus-circle text-white\" viewBox=\"0 0 16 16\">
                            <path d=\"M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16\"/>
                            <path d=\"M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4\"/>
                        </svg>
                        <span class=\"ms-1\">Compose new message</span>
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