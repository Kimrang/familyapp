<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Gallery</title>
		<?php
            include("./styles.php");
        ?>
    </head>
    <body>
        <?php
			require_once("../scripts/db_con.php");
            
			session_start();

            if ($_SESSION['isActive']) {
				$fid = $_SESSION['fid'];

                include("./components/header.php");
                
				echo "
					<main>
				";
				
				// gallery section
				// TODO: Implement grid layout
				echo "
					<section class=\"p-4\">
						<h3>{$_SESSION['familyname']} photos</h3>
						<div class=\"gallery-photos p-4\">
				";
				
				$dir_path = "../assets/gallery/{$fid}/";

				if (is_dir($dir_path) && is_readable($dir_path)) {
					$images = scandir($dir_path);
					
					foreach ($images as $item) {
						if ($item != '.' && $item != '..') {
							$path = $dir_path.$item;
							echo "<img src={$path} class=\"img-md m-3\" />";
						}
					}
				}
				
				echo "
						</div>
					</section>
				";
				
				// form section
				echo "
					<section class=\"w-25 border rounded-5 shadow p-5 my-5 mx-auto\">
						<h3>Upload to Family Gallery</h3>
						<form class=\"form\" action=\"../scripts/upload_photo.php\" method=\"post\" enctype=\"multipart/form-data\">
							<label class=\"form-label\" for=\"picture\">Select File</label>
							<input class=\"form-control\" type=\"file\" id=\"picture\" name=\"picture\" />
							<input type=\"hidden\" id=\"fid\" name=\"fid\" value='$fid' />
							<input class=\"btn btn-success my-3\" type=\"submit\" value=\"Upload\" />
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