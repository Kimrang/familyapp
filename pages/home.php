<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home</title>
    </head>
    <body>
        <?php
            session_start();

            if (isset($_SESSION["uid"])) {
                include("./components/header.php");
                echo 
                "
                    <main>
                        This is the home page.
                    </main>
                ";
            } else {
                echo "<h3>You are not logged in</h3>";
            }
        ?>
    </body>
</html>