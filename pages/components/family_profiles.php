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
                        <button class=\"btn btn-outline-success\" type=\"submit\" onclick=\"edit_profile()\">Edit</button>
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