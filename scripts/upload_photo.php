<?php
	require_once("./db_con.php");
		
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {	
		$fid = filter_input(INPUT_POST, 'fid', FILTER_SANITIZE_SPECIAL_CHARS);
		$dir_path = "../assets/gallery/{$fid}/";
		
		if (!file_exists($dir_path) && !is_dir($dir_path)) {
			mkdir($dir_path, 0777, true);
		}
		
		$file = $_FILES['picture'];
		
		if ($file['error'] !== UPLOAD_ERR_OK) {
			die("File  upload failed with error code ".$file['error']);
		}
	
		$file_name = basename($file['name']);
		$dest = $dir_path.$file_name;
		
		if (!file_exists($dest)) {
			if (move_uploaded_file($file['tmp_name'], $dest)) {
				header("Location: ../pages/gallery.php");
			} else {
				// TODO: implement proper error path
				die('Error: can\'t upload file!');
			}
		} else {
			// TODO: implement proper error path
			die('Error: file already exists!');
		}
	
		exit();
	}
?>