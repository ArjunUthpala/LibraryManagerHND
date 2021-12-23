<?php 
require("session.php");
require('../php/connection.php');
$sql="SELECT * FROM `book_reserve` ORDER BY `reserve_id` DESC LIMIT 1";
$result=$conn->query($sql);
if(mysqli_num_rows($result)>0){//if any record is available
$row=mysqli_fetch_assoc($result);
$memberid=$row['member_id'];
$bookid=$row['book_id'];
$bookingid=$row['reserve_id'];

$sql="UPDATE `members` SET `last_reserve_book`=NULL WHERE `member_id`=$memberid";
$conn->query($sql);

$sql="UPDATE `books` SET `last_reserved_member`=NULL WHERE `book_id`=$bookid";
$conn->query($sql);

$sql="DELETE FROM `book_reserve` WHERE reserve_id=$bookingid";
$conn->query($sql);
header('location:..dashboard.php');
}else{
	echo 'No Record for Delete';
}
?>