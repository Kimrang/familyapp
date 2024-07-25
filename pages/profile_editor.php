<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit Profile</title>
    </head>
    <body>    
        
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // TODO: compact this
                $uid = filter_input(INPUT_POST, "uid", FILTER_SANITIZE_SPECIAL_CHARS);
                
                // TODO: populate fields with present values
                echo "
                    <form action=\"../scripts/update_user.php\" method=\"post\">
                        <input type=\"hidden\" id=\"id\" name=\"id\" value={$uid}>
                        <div>
                            <label for=\"username\">Username</label>
                            <input type=\"text\" id=\"username\" name=\"username\" required/>
                        </div>
                        <div>
                            <label for=\"password\">Password</label>
                            <input type=\"text\" id=\"password\" name=\"password\" required/>
                        </div>
                        <div>
                            <label for=\"fullname\">Fullname</label>
                            <input type=\"text\" id=\"fullname\" name=\"fullname\" />
                        </div>
                        <div>
                            <label for=\"dob\">DOB</label>
                            <input type=\"date\" id=\"dob\" name=\"dob\" />
                        </div>
                        <div>
                            <label for=\"dob\">Relationship</label>
                            <select name=\"relationship\">
                                <option value=\"FATHER\">Father</option>
                                <option value=\"MOTHER\">Mother</option>
                                <option value=\"CHILD\">Child</option>
                                <option value=\"\"></option>
                            </select>
                        </div>

                        <button type=\"submit\">Update</button>
                    </form>
                ";
                
            }
        ?>

    </body>
</html>