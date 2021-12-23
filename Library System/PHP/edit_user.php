<?php 
require("session.php");
print_r($_FILES);
Print_r($_POST);
require('../php/connection.php');

$pass1=$_POST['pass1'];
$pass2=$_POST['pass2'];
$uploadOk=1;

if($pass1!=$pass2){//password not matched
	echo "<h2>Password not matched</h2>";
	$uploadOk=0;
	exit;
}else	
	$pass=md5($_POST['pass1']);

$target_dir = "../Profile_Images/";
$target_file = $target_dir . basename($_FILES["file_to_upload"]["name"]);//Show filename with file extension

$sql="UPDATE `users` SET `member_id` = '$_POST[member_id]',`user_name` = '$_POST[user_name]', `user_type` = '$_POST[user_type]', `profile_image` = '$target_file', `password` = '$pass' WHERE `users`.`user_id` = $_POST[user_id];";


//echo $target_file.'<br>';
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image

  $check = getimagesize($_FILES["file_to_upload"]["tmp_name"]);
  if($check === FALSE) {
	echo "<h2>File is not an image check the mime type<h2>";
    $uploadOk = 0;
	exit;
  }

// Check if file already exists
if (file_exists($target_file)) {
    echo "<h2>Sorry, file already exists.</h2>";
    $uploadOk = 0;
	exit;
}

// Check file size
if ($_FILES["file_to_upload"]["size"] >1000000) {
    echo "<h2>Sorry, your file is too large.<h2>";
    $uploadOk = 0;
	exit;
}


if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "<h2>Sorry, only JPG, JPEG, PNG & GIF files are allowed.</h2>";
    $uploadOk = 0;
	exit;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "<h2>Sorry, your file was not uploaded.</h2>";
// if everything is ok, try to upload file
} else {
		unlink($_POST['pro_img']);
    if (move_uploaded_file($_FILES["file_to_upload"]["tmp_name"], $target_file)) {
        echo "<h2>The file ". basename( $_FILES["file_to_upload"]["name"]). " has been uploaded.</h2>";
		$conn->query($sql);
    } else 
        echo "<h2>Sorry, there was an error uploading your file.</h2>";
}//end if


?>