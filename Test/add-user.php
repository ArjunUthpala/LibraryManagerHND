



<?php 



require('../php/connection.php');
$pass=md5($_POST['pass1']);
$target_dir = "../Profile_Images/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);//Show filename with file extension

if($_POST['memberid']!="NULL")
$sql="INSERT INTO `users` (`member_id`, `user_name`, `user_type`, `profile_picture`,`password`) VALUES ( '$_POST[memberid]', '$_POST[username]', '$_POST[usertype]', '$target_file' ,'$pass')";
else
$sql="INSERT INTO `users` (`member_id`, `user_type`, `profile_picture`,`password`) VALUES ('$_POST[username]', '$_POST[usertype]', '$target_file' ,'$pass')";


//echo $target_file.'<br>';
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["add"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] >5000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}


if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
		$conn->query($sql);
		
		
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}


?>