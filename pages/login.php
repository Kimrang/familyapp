<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
    </head>
    <body>
        <form action="../scripts/login_user.php" method="post">
            <h2>Login to your account</h2>
            <?php
                if (isset($_GET["login"]) && htmlspecialchars($_GET["login"]) == "failed") {
                    echo "<h3>Incorrect username or password</h3>";
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
            <input type="submit" value="Submit" />
        </form>
    </body>
</html>