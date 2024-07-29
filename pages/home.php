<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home</title>
        <?php
            include("./styles.php");
        ?>
    </head>
    <body>
        <?php
            session_start();

            echo "<script>console.log('{$_SESSION['isActive']}')</script>";

            if ($_SESSION['isActive']) {
                include("./components/header.php");
                
                echo "<main>";

                /* start: gallery section */
                echo "
                    <section class=\"p-4\">
                        <h3>{$_SESSION['familyname']} photos</h3>
                        <article class=\"home-photos\">
                ";
                
                $dir_path = "../assets/gallery/{$_SESSION['fid']}/";
				if (is_dir($dir_path) && is_readable($dir_path)) {
					$images = scandir($dir_path);
					
                    
                    foreach ($images as $item) {
                        if ($item != '.' && $item != '..') {
                            $path = $dir_path.$item;
                            echo "<img src={$path} alt=\"family gallery\" class=\"img-md mx-3\" />";
                        }
                    }
                
				}

                echo "
                        </article>
                            <button class=\"btn btn-primary rounded-5 text-white\">
                                <a class=\"p-3\" href=\"./gallery.php\" title=\"Go to gallery\">
                                    <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"22\" height=\"22\" fill=\"currentColor\" class=\"bi bi-camera\" viewBox=\"0 0 16 16\">
                                        <path d=\"M15 12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1h1.172a3 3 0 0 0 2.12-.879l.83-.828A1 1 0 0 1 6.827 3h2.344a1 1 0 0 1 .707.293l.828.828A3 3 0 0 0 12.828 5H14a1 1 0 0 1 1 1zM2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4z\"/>
                                        <path d=\"M8 11a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5m0 1a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7M3 6.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0\"/>
                                    </svg> 
                                    <span class=\"ms-1\">Go to Gallery</span>
                                </a>
                            </button>
                    </section>
                ";
                
                /*end: gallery section*/

                /*start: family members section*/
                echo "
                    <section class=\"p-4\">
                ";
                include('./components/family_profiles.php');
                echo "</section>";
                /*end: family members section*/

                echo "</main>";
            } else {
                echo "<h3>You are not logged in</h3>";
            }
        ?>
    </body>
</html>