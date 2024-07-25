<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Profile</title>
    </head>
    <body>
        <main>
            <?php
                session_start();

                if (isset($_SESSION['uid'])) {
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
                        <section class=\"user-profile\">
                            <ul>
                                <li>
                                    UID: $id
                                </li>
                                <li>
                                    Username: $username
                                </li>
                                <li>
                                    Fullname: $fullname
                                </li>
                                <li>
                                    DOB: $dob
                                </li>
                                <li>
                                    Relationship: $relationship
                                </li>
                            </ul>
                        </section>
                    ";
                    
                    include("./components/family_profiles.php");
                } else {
                    echo "<h3>You are not logged in</h3>";
                }
            ?>
        </main>
    </body>
</html>