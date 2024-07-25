<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home</title>
    </head>
    <body>
        <?php
			require_once("../scripts/db_con.php");
            
			session_start();

            if (isset($_SESSION['uid'])) {
				$fid = $_SESSION['fid'];

                include("./components/header.php");
                
				echo "<main>";
				
				// gallery section
				echo "<section>";
				
				$dir_path = "../assets/gallery/{$fid}/";

				if (is_dir($dir_path) && is_readable($dir_path)) {
					$images = scandir($dir_path);
					
					foreach ($images as $item) {
						if ($item != '.' && $item != '..') {
							$path = $dir_path.$item;
							echo "<img src={$path} width=\"100\" height=\"50\" />";
						}
					}
				} else {
					die('Directory not readable.');
				}
				
				echo "</section>";
				
				// form section
				echo "
					<section>
						<form action=\"../scripts/upload_photo.php\" method=\"post\"  enctype=\"multipart/form-data\">
							<label for=\"picture\">Select File</label>
							<input type=\"file\" id=\"picture\" name=\"picture\" />
							<input type=\"hidden\" id=\"fid\" name=\"fid\" value='$fid' />
							<input type=\"submit\" value=\"Upload\" />
						</form>
                    </section>
                ";
				
				echo "</main>";
				
				
            } else {
                echo "<h3>You are not logged in</h3>";
            }
        ?>
    </body>
</html>