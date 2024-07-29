<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Profile</title>
        <?php
            include("./styles.php");
        ?>
    </head>
    <body>
        <main>
            <?php
                session_start();

                if (isset($_SESSION['isActive'])) {
                    require_once("../scripts/db_con.php");
                    
                    $uid = $_SESSION['uid'];
                    $query = "SELECT * FROM USERS WHERE ID='$uid'";
                    $res = mysqli_query($con, $query);
                    $tuple = mysqli_fetch_assoc($res);

                    $id = $tuple['ID'];
                    $username = $tuple['USERNAME'];
                    $fullname = $tuple['FULLNAME'];
                    $dob = $tuple['DOB'];
                    $relationship = $tuple['RELATIONSHIP'];

                    include("./components/header.php");
                    
                    echo 
                    "
                        <section class=\"user-profile p-4\">
                            <h3>Your Profile</h3>
                            <div class=\"card p-4 w-50 mt-5 mx-auto\" style=\"max-width: 540px;\">
                                <div class=\"row g-0\">
                                    <div class=\"col-md-4\">
                                        <img src=\"../assets/icons/default-user-icon.png\" class=\"img-fluid rounded-start\" alt=\"...\">
                                    </div>
                                    <div class=\"col-md-8\">
                                    <div class=\"card-body ms-4\">
                                        <h5 class=\"card-title\">{$username}</h5>
                                        <h6>{$fullname}</h6>
                                        <p class=\"card-text\">{$dob}</p>
                                        <p class=\"card-text\"><small class=\"text-body-secondary\">{$relationship}</small></p>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    ";
                    
                    echo "<section class=\"p-4\">";
                        include("./components/family_profiles.php");
                    echo "</section>";
                } else {
                    echo "<h3>You are not logged in</h3>";
                }
            ?>
        </main>
    </body>
</html>