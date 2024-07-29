<?php
    require_once("../scripts/db_con.php");

    $fid = $_SESSION['fid'];
    $query = "SELECT ID, USERNAME, FULLNAME, DOB, RELATIONSHIP FROM USERS WHERE FID='$fid'";
    
    $res = mysqli_query($con, $query);
    $num_rows = mysqli_num_rows($res);
   
    echo "
        <article>
            <h3>{$_SESSION['familyname']} Members</h3>
            <div class=\"d-flex justify-content-evenly flow-wrap mt-5\">
    ";
    
    for ($i = 0; $i < $num_rows; $i++) {
        $member = mysqli_fetch_assoc($res);

        echo "
            <div class=\"card text-center\" style=\"width: 18rem;\">
                <img src=\"../assets/icons/default-user-icon.png\" class=\"card-img-top card-user-img\" alt=\"...\">
                <div class=\"card-body\">
                    <h5 class=\"card-title\">{$member['USERNAME']}</h5>
                    <p class=\"card-text\"><i>Fullname</i>: {$member['FULLNAME']}</p>
                </div>
                <ul class=\"list-group list-group-flush\">
                    <li class=\"list-group-item\"><i>Birthday</i>: {$member['DOB']}</li>
                    <li class=\"list-group-item\"><i>Relationship</i>: {$member['RELATIONSHIP']}</li>
                </ul>
                <div class=\"card-body\">
                    <form action=\"profile_editor.php\" method=\"post\">
                        <input type=\"hidden\" id=\"uid\" name=\"uid\" value=\"{$member['ID']}\">
                        <button class=\"btn btn-outline-success\" type=\"submit\">
                            <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-person-gear\" viewBox=\"0 0 16 16\">
                                <path d=\"M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0M8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m.256 7a4.5 4.5 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10q.39 0 .74.025c.226-.341.496-.65.804-.918Q8.844 9.002 8 9c-5 0-6 3-6 4s1 1 1 1zm3.63-4.54c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.045c-.613-.18-.613-1.048 0-1.229l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382zM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0\"/>
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        ";
    }

    echo "
            </div>
        </article>
    ";
    



    /*
    // table displaying all the family member infos
    echo "<table>";
    echo "
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Fullname</th>
            <th>DOB</th>
            <th>Relationship</th>
        </tr>
    ";
    for ($row_num=0; $row_num < $num_rows; $row_num++) {
        $row = mysqli_fetch_assoc($res);
        $values = array_values($row);
        
        echo "<tr>";
        for ($index = 0; $index < $num_fields; $index++) {
            $value = htmlspecialchars($values[$index]);
            echo "<td>$value</td>";
        }
        echo "
            <td>

            </td>
        ";
        echo "</tr>";
    }
    echo "</table>";
    */
?>