<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Compose Message</title>
    </head>
    <body>
        <?php
            /*
                TODO: Need a way to extract the recepient name from the selected recepient option and send it to form handler.
            */
            session_start();

            if ($_SESSION['uid']) {
                require_once('../scripts/db_con.php');    
            
                $query = "SELECT ID, USERNAME FROM USERS WHERE FID={$_SESSION['fid']} AND ID!={$_SESSION['uid']}";
                $res = mysqli_query($con, $query);
                $num_rows = mysqli_num_rows($res);

                // Below is the shittiest code I have ever written but It gets the job done
                // and I don't have much time. So let's keep it for now.
                echo "
                    <form action=\"../scripts/msg_sender.php\" method=\"post\">
                    <input type=\"hidden\" id=\"sender-id\" name=\"sender-id\" value={$_SESSION['uid']} />
                    <input type=\"hidden\" id=\"sender-name\" name=\"sender-name\" value=\"{$_SESSION['username']}\" /> 
                ";

                // create options containing all the members of the family
                echo "<div>
                        <label for=\"recepient-id\">To</label>
                        <select id=\"recepient-id\" name=\"recepient-id\">
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
                    <div>
                        <label for=\"email\">Email</label>
                        <input type=\"email\" id=\"email\" name=\"email\" required/>
                    </div>

                    <div>
                        <label for=\"subject\">Subject</label>
                        <input type=\"text\" id=\"subject\" name=\"subject\" required/>
                    </div>
                    
                    <div>
                        <label for=\"body\">Body</label>
                        <textarea id=\"body\" name=\"body\"></textarea>
                    </div>
                
                    <input type=\"submit\" value=\"Send Message\" />
                ";
                
                echo "</form>";
            }
        ?>    
    </body>
</html>