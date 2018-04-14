<?php
	require_once('../login/connect.php');
	session_start();

	if ($_SESSION['canUpload']) {
		$target_dir = "shitpost/";
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

		if (file_exists($target_file)) {
			//echo "Sorry, file already exists.";
			//$_SESSION["fileAlready"] = TRUE;
			$uploadOk = 0;
		}

		if ($_FILES["fileToUpload"]["size"] > 500000000) {
			//echo "Sorry, your file is too large.";
			//$_SESSION["largeFile"] = TRUE;
			$uploadOk = 0;
		}

		if ($uploadOk == 0) {
			//$_SESSION["fileNotUploaded"] = TRUE;
			//echo "Your file was not uploaded.";
			header('location: shitpost.php');
		} else {
			if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
				//echo "File uploaded.";
				//$_SESSION["fileUploaded"] = TRUE;
				header('location: shitpost.php');
				//echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
			} else {
				//echo "Sorry, there was an error uploading your file.";
				header('location: shitpost.php');
				//$_SESSION["errorUpload"] = TRUE;
			}
		}	
	} else {
		//echo "Sorry, you can not upload files.";
		header('location: shitpost.php');
		//$_SESSION["cannotUpload"] = TRUE;
	}	
?>