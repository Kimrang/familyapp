<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Compose Message</title>
        <?php
            include("./styles.php");
        ?>
    </head>
    <body>
        <?php
            /*
                TODO: Need a way to extract the recepient name from the selected recepient option and send it to form handler.
            */
            session_start();

            if ($_SESSION['isActive']) {
                require_once('../scripts/db_con.php');    
                include('./components/header.php');

                $query = "SELECT ID, USERNAME FROM USERS WHERE FID={$_SESSION['fid']} AND ID!={$_SESSION['uid']}";
                $res = mysqli_query($con, $query);
                $num_rows = mysqli_num_rows($res);

                // Below is the shittiest code I have ever written but It gets the job done
                // and I don't have much time. So let's keep it for now.
                echo "
                    <form class=\"form  w-50 mt-5 mx-auto p-4 rounded-3 shadow border\" action=\"../scripts/msg_sender.php\" method=\"post\">
                    <h3>Send message</h3>
                    <input type=\"hidden\" id=\"sender-id\" name=\"sender-id\" value={$_SESSION['uid']} />
                    <input type=\"hidden\" id=\"sender-name\" name=\"sender-name\" value=\"{$_SESSION['username']}\" /> 
                ";

                // create options containing all the members of the family
                echo "<div class=\"my-4 w-75 mx-auto\">
                        <label class=\"form-label\" for=\"recepient-id\">To</label>
                        <select class=\"form-control\" id=\"recepient-id\" name=\"recepient-id\">
                ";
                for ($i = 0; $i < $num_rows; $i++) {
                    $member = mysqli_fetch_assoc($res);
                    echo "<option value={$member['ID']}>{$member['USERNAME']}</option>";
                }
                echo "        
                          </select>
                        </div>
                ";

                echo "
                    <div class=\"my-4 w-75 mx-auto\">
                        <label class=\"form-label\" for=\"email\">Email</label>
                        <input class=\"form-control\" type=\"email\" id=\"email\" name=\"email\" required/>
                    </div>

                    <div class=\"my-4 w-75 mx-auto\">
                        <label class=\"form-label\" for=\"subject\">Subject</label>
                        <input class=\"form-control\" type=\"text\" id=\"subject\" name=\"subject\" required/>
                    </div>
                    
                    <div class=\"mt-4 mb-5 w-75 mx-auto\">
                        <label class=\"form-label\" for=\"body\">Body</label>
                        <textarea class=\"form-control message\" id=\"body\" name=\"body\"></textarea>
                    </div>

                    <div class=\"text-center\">
                        <input class=\"btn btn-success w-50\" type=\"submit\" value=\"Send\" />
                    </div>   
                ";
                
                echo "</form>";
            } else {
                echo "<h3>You are not logged in</h3>";
            }
        ?>    
    </body>
</html>