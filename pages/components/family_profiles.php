<?php
    require_once("../scripts/db_con.php");

    $fid = $_SESSION['fid'];
    $query = "SELECT ID, USERNAME, FULLNAME, DOB, RELATIONSHIP FROM USERS WHERE FID='$fid'";
    
    $res = mysqli_query($con, $query);
    $num_fields = mysqli_num_fields($res);
    $num_rows = mysqli_num_rows($res);
   
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
                <form action=\"profile_editor.php\" method=\"post\">
                    <input type=\"hidden\" id=\"uid\" name=\"uid\" value=\"{$row['ID']}\">
                    <button type=\"submit\" onclick=\"edit_profile()\">Edit</button>
                </form>
            </td>
        ";
        echo "</tr>";
    }
    echo "</table>";
?>