<?php
$target_dir = "keyfile/";
$target_file = $target_dir.basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

if ($fileType != "gpg" && $fileType != "pem" && $fileType != "asc" && $fileType != "enc") {
    echo "Sorry, only GPG, PEM, ASC, and ENC files are allowed.";
    $uploadOk = 0;
}

if (file_exists($target_file)) {
	echo "Sorry, file already exists.";
	$uploadOk = 0;
}


if ($_FILES["fileToUpload"]["size"] > 5000000000) {
	echo "Sorry, your file is too large.";
	$uploadOk = 0;
}


if ($uploadOk == 1) {
	if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
	} else {
		echo "Sorry, there was an error uploading your file.";
	}
}
else {
	echo "Sorry, your file was not uploaded.";
}
?>