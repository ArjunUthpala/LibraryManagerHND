<?php 
require("session.php");
require('connection.php');
$sql="UPDATE `book_borrow` SET  `actual_return_date` = CURDATE(), `fine` = '$_GET[hiddenfine]' WHERE `book_borrow`.`id` = '$_GET[borrowalid1]'";

	if($result=$conn->query($sql)===TRUE)
		echo "<h2>Successfully Updated</h2>";
	else
		echo "Error:".$sql."<br>".$conn->error;

$sql="UPDATE `books` SET `available`=1 WHERE `book_id`='$_GET[bookid]'";

	if($result=$conn->query($sql)===TRUE)
		echo "<h2>Successfully Updated</h2>";
	else
		echo "Error:".$sql."<br>".$conn->error;

$sql="SELECT * FROM `members` WHERE `member_id`='$_GET[memberid]'";
$result=$conn->query($sql);
$row=mysqli_fetch_assoc($result);
$noBoookBorrow=$row['no_book_borrow'];

$sql="UPDATE `members`  SET  `no_book_borrow`=".--$noBoookBorrow." WHERE `member_id`='$_GET[memberid]'";
	
	if($result=$conn->query($sql)===TRUE)
		echo "<h2>Successfully Added</h2>";
	else
		echo "Error:".$sql."<br>".$conn->error;
?>
