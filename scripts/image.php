<?php
// image.php

// Assuming you have included necessary configuration and database connection files
require_once("../scripts/db_con.php");

// Check if the ID parameter is set in the URL
if (isset($_GET['id'])) {
    $img_id = $_GET['id'];

    // Fetch image data from the database based on IMG_ID
    $query = "SELECT IMG_DATA FROM GALLERY WHERE IMG_ID='$img_id'";
    $result = mysqli_query($con, $query);

    if ($result) {
        // Check if image exists
        if (mysqli_num_rows($result) > 0) {
            // Fetch image data
            $row = mysqli_fetch_assoc($result);
            $img_data = $row['IMG_DATA'];

            // Output appropriate headers
            header('Content-Type: image/jpeg'); // Adjust content type based on your image type

            // Output the image data
            echo $img_data;
            exit;
        } else {
            // Image not found
            http_response_code(404);
            echo "Image not found";
        }
    } else {
        // Query execution error
        http_response_code(500);
        echo "Error retrieving image data";
    }
} else {
    // ID parameter not provided
    http_response_code(400);
    echo "Missing ID parameter";
}
?>
