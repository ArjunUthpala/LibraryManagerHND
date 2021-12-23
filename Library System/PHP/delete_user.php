<?php 
require("session.php");
require('connection.php');
/*
$sql1= "INSERT INTO `deleted_users` (`userID`, `memberID`, `userName`, `userType`, `profileImage`, `deleted_date`) SELECT `userID`,`memberID`,`userName`,`userType`,`profileImage`, CURDATE() FROM `users` WHERE userID='$_GET[userID]';";
*/
$sql="SELECT `profile_image` FROM `users` WHERE `user_id`='$_POST[user_id]';";
$result=$conn->query($sql);
$row=mysqli_fetch_assoc($result);
$myFile = $row['profile_image'];
echo $myFile ;
rename($myFile, "../Deleted_Users/".basename($myFile));//Moving profile image from Profile_Images to Deleted-Users

$sql.="DELETE FROM `users` WHERE `user_id`='$_POST[user_id]'";

if ($conn->multi_query($sql)=== TRUE) {
  header('location:..dashboard.php');
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
?>