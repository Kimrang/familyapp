<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registration</title>
        <?php
            include('./styles.php');
        ?>
    </head>
    <body>
        <form class="form w-50 mt-5 mx-auto p-4 rounded-3 shadow border" action="../scripts/register_user.php" method="post">
            <h2>Register your account</h2>
            <?php
                if (isset($_GET['registration']) && (htmlspecialchars($_GET['registration'])=="failed")) {
                    echo "<h5 class=\"text-danger w-50 mt-4 mx-auto\">Error registering user</h5>";
                }
            ?>
            <div class="my-4 w-75 mx-auto">
                <label class="form-label" for="username">Username</label>
                <input class="form-control" type="text" id="username" name="username" required/>
            </div>
            <div class="my-4 w-75 mx-auto">
                <label class="form-label" for="password">Password</label>
                <input class="form-control" type="password" id="password" name="password" required/>
            </div>
            <div class="mt-4 mb-5 w-75 mx-auto">
                <label class="form-label" for="familyid">Family ID</label>
                <input class="form-control" type="number" id="familyid" name="familyid" required/>
            </div>
            <div class="text-center">
                <input class="btn btn-success w-50" type="submit" value="Submit" />
            </div>
        </form>
    </body>
</html>