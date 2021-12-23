<?php 
require("session.php");
print_r($_POST);
require("../php/connection.php");
$sql="SELECT * FROM `members` WHERE `member_id`='$_POST[member_id]';";
$result=$conn->query($sql);
//echo mysqli_num_rows($result);
if(mysqli_num_rows($result)>0){

$sql="SELECT `book_id` FROM `books` WHERE `book_title`='$_POST[book_title]';";
$result=$conn->query($sql);
$row=mysqli_fetch_assoc($result);


$sql="INSERT INTO `book_reserve` (`member_id`, `book_id`, `reserve_date`) VALUES ('$_POST[member_id]', '$row[book_id]', CURDATE());";


$sql.="UPDATE `books` SET `last_reserved_member` = '$_POST[member_id]' WHERE `books`.`book_id` = '$row[book_id]';";


$sql.="UPDATE `members` SET `last_reserve_book` = '$row[book_id]' WHERE `members`.`member_id` = '$_POST[member_id]';";

if($result=$conn->multi_query($sql)===TRUE)
	header('location:..dashboard.php');
else
	echo "Error:".$sql."<br>".$conn->error;

}else
	echo '<h2>No such memeber</h2>';


?>