<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <?php
            include('./styles.php');
        ?>
    </head>
    <body>
        <form class="form w-50 mt-5 mx-auto p-4 rounded-3 shadow border" action="../scripts/login_user.php" method="post">
            <h3>Login to your account</h3>
            <?php
                if (isset($_GET['registration']) && htmlspecialchars($_GET['registration'] === 'success')) {
                    echo "<h5 class=\"text-success w-50 mt-4 mx-auto\">Registration successful</h5>";
                }

                if (isset($_GET['login']) && htmlspecialchars($_GET['login']) === 'failed') {
                    echo "<h5 class=\"text-danger w-75 mt-4 mx-auto\">Incorrect username or password</h5>";
                }

                if (isset($_GET['login']) && htmlspecialchars($_GET['login']) === 'loggedout') {
                    echo "<h5 class=\"text-success w-75 mt-4 mx-auto\">Logged out successfully</h5>";
                }
            ?>
            <div class="my-4 w-75 mx-auto">
                <label class="form-label" for="username">Username</label>
                <input class="form-control" type="text" id="username" name="username" required/>
            </div>
            <div class="my-4 w-75 mx-auto">
                <label class="form-label"for="password">Password</label>
                <input class="form-control" type="password" id="password" name="password" required/>
            </div>
            <div class="text-center mt-5">
                <input class="btn btn-success w-50" type="submit" value="Login" />
            </div>
            
            <div class="text-center mt-3">
                New User? <a class="text-primary" href="./registration.php">Register here</a>
            </div>
        </form>
    </body>
</html>