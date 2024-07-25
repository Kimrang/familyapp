<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registration</title>
    </head>
    <body>
        <form action="../scripts/register_user.php" method="post">
            <h2>Register your account</h2>
            <?php
                if (isset($_GET['registration']) && (htmlspecialchars($_GET['registration'])=="failed")) {
                    echo "<h3>Registration failed!</h3>";
                }
            ?>
            <div>
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required/>
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required/>
            </div>
            <div>
                <label for="familyid">Family ID</label>
                <input type="number" id="familyid" name="familyid" required/>
            </div>
            <input type="submit" value="Submit" />
        </form>
    </body>
</html>