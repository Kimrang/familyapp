<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit Profile</title>
        <?php
            include("./styles.php");
        ?>
    </head>
    <body>    
        
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // TODO: compact this
                $uid = filter_input(INPUT_POST, "uid", FILTER_SANITIZE_SPECIAL_CHARS);
                
                // TODO: populate fields with present values
                echo "
                    <form class=\"form w-50 p-5 rounded-3 mt-3 mx-auto border\" action=\"../scripts/update_user.php\" method=\"post\">
                        <h3 class=\"mb-3\">Update your profile</h3>
                        <input type=\"hidden\" id=\"id\" name=\"id\" value={$uid}>
                        <div class=\"mt-5 mb-3\">
                            <label class=\"form-label\" for=\"username\">Username</label>
                            <input type=\"text\" id=\"username\" class=\"form-control\" name=\"username\" required/>
                        </div>
                        <div class=\"my-3\">
                            <label class=\"form-label\" for=\"password\">Password</label>
                            <input type=\"text\" id=\"password\" class=\"form-control\" name=\"password\" required/>
                        </div>
                        <div class=\"my-3\">
                            <label class=\"form-label\" for=\"fullname\">Fullname</label>
                            <input type=\"text\" id=\"fullname\" class=\"form-control\" name=\"fullname\" />
                        </div>
                        <div class=\"my-3\">
                            <label class=\"form-label\" for=\"dob\">DOB</label>
                            <input type=\"date\" id=\"dob\" class=\"form-control\" name=\"dob\" />
                        </div>
                        <div class=\"my-3\">
                            <label class=\"form-label\" for=\"dob\">Relationship</label>
                            <select class=\"form-select\" name=\"relationship\">
                                <option value=\"FATHER\">Father</option>
                                <option value=\"MOTHER\">Mother</option>
                                <option value=\"CHILD\">Child</option>
                                <option value=\"\"></option>
                            </select>
                        </div>

                        <div class=\"text-center mt-5\">
                            <button class=\"btn btn-success w-50\" type=\"submit\">Update</button>
                        </div>
                    </form>
                ";
                
            }
        ?>

    </body>
</html>