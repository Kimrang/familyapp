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
                if (isset($_GET['registration']) && (htmlspecialchars($_GET['registration'])=="user already exists")) {
                    echo "<h5 class=\"text-danger w-50 mt-4 mx-auto\">User with that username already exists in your family</h5>";
                }
				
				if (isset($_GET['registration']) && (htmlspecialchars($_GET['registration'])=="password mismatch")) {
                    echo "<h5 class=\"text-danger w-50 mt-4 mx-auto\">Your passwords do not match</h5>";
                }
				
            
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
			
			<!--development-->
			<div class="my-4 w-75 mx-auto">
                <label class="form-label" for="password">Repeat Password</label>
                <input class="form-control" type="password" id="rpassword" name="rpassword" required/>
            </div>
            
            <div class="mt-4 mb-5 w-75 mx-auto">
                <label class="form-label" for="familyid">Family ID</label>
                <input class="form-control" type="number" id="familyid" name="familyid" required/>
            </div>

            <div class="text-center">
                <input class="btn btn-success w-50" type="submit" value="Submit" />
            </div>

            <div class="text-center mt-3">
                Already a User? <a class="text-primary" href="./index.php">Login here</a>
            </div>
        </form>
    </body>
</html>