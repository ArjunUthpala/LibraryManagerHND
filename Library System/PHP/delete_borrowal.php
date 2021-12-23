<?php 
require("session.php");
require('../php/connection.php');
$sql="SELECT * FROM book_borrow ORDER BY id DESC LIMIT 1";
$result=$conn->query($sql);
$row1=mysqli_fetch_assoc($result);
$memberid=$row1['member_id'];
$bookid=$row1['book_id'];
$is_reserve=$row1['is_reserve'];
$sql="SELECT `no_book_borrow` FROM `members` WHERE `member_id`='".$memberid."'";
$result=$conn->query($sql);
$row=mysqli_fetch_array($result);
$nobookborrow=$row[0];

if($is_reserve==1){// if it is reserved
	$sql="UPDATE `members` SET 	`last_reserve_book`=$bookid WHERE `member_id`=$memberid";
	if($result=$conn->query($sql)===TRUE)
		echo "<h2>Successfully updated</h2>";
	else
		echo "Error:".$sql."<br>".$conn->error;
	
	$sql="UPDATE `books` SET `last_reserved_member`=$memberid WHERE `book_id`=$bookid";
	if($result=$conn->query($sql)===TRUE)
		echo "<h2>Successfully updated</h2>";
	else
		echo "Error:".$sql."<br>".$conn->error;
}

//if it is normal borrowal
$sql="UPDATE `books` SET `available`=1 WHERE `book_id`=$bookid";
if($result=$conn->query($sql)===TRUE)
		echo "<h2>Successfully updated</h2>";
	else
		echo "Error:".$sql."<br>".$conn->error;
	
$sql="UPDATE members SET no_book_borrow=".--$nobookborrow." WHERE member_id=$memberid";

if($result=$conn->query($sql)===TRUE)
		echo "<h2>Successfully updated</h2>";
	else
		echo "Error:".$sql."<br>".$conn->error;

$sql="DELETE FROM book_borrow ORDER BY id DESC LIMIT 1";
	if($result=$conn->query($sql)===TRUE)
		echo "<h2>Successfully Deleted</h2>";
	else
		echo "Error:".$sql."<br>".$conn->error;
?>