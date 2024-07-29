<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Create Family</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </head>
    <body>
        <?php
            require_once('./db_con.php');
            
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $familyname = filter_input(INPUT_POST, "family-name", FILTER_SANITIZE_SPECIAL_CHARS);
                $query = "INSERT INTO FAMILY(FAMILYNAME) VALUES('{$familyname}')";
                $res = mysqli_query($con, $query);
                
                if (!isset($res)) {
                    die('Error creating family record.');
                }
            }

        ?>

        <form class="form w-50 mt-5 mx-auto p-4 rounded-3 shadow border" method="post">
            <h3>Create Family</h3>
            <div class="my-4 w-75 mx-auto">
                <input class="form-control" type="text" id="family-name" name="family-name" placeholder="Family Name" required/>
            </div> 
            <div class="text-center">
                <input type="submit" class="btn btn-success w-50" value="Create" />
            </div>
        </form>
    </body>
</html>