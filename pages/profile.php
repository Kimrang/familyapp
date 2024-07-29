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

                if ($_SESSION['isActive']) {
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
                            <div class=\"d-flex justify-content-between align-items-baseline\">
                                <h3>Your Profile</h3>
                                <a href=\"../scripts/logout_user.php\" class=\"btn btn-danger ms-5\">
                                    <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"22\" height=\"22\" fill=\"currentColor\" class=\"bi bi-box-arrow-right\" viewBox=\"0 0 16 16\">
                                        <path fill-rule=\"evenodd\" d=\"M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z\"/>
                                        <path fill-rule=\"evenodd\" d=\"M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z\"/>
                                    </svg>
                                    <span class=\"ms-1\">Logout</span>
                                </a>
                            </div>
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