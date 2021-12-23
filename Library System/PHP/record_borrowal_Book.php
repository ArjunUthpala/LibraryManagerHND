<?php 
require("session.php");
require("connection.php");

if(isset($_POST['isReserve'])){//if it is a reserved book

$sql="INSERT INTO `book_borrow` (`member_id`, `book_id`, `borrow_date`, `due_return_date`,`is_reserve`) VALUES ('$_POST[member_id]', '$_POST[book_id]', '$_POST[borrowaldate]', '$_POST[returndate]',1)";

	if($result=$conn->query($sql)===TRUE)
	echo "<h2>Successfully Added</h2>";
	else
	echo "Error:".$sql."<br>".$conn->error;


$sql="UPDATE `books` SET `last_reserved_member` = NULL,  `available`='0'  WHERE `books`.`book_id` = '$_POST[book_id]'";
	
	if($result=$conn->query($sql)===TRUE)
	echo "<h2>Successfully Added</h2>";
	else
	echo "Error:".$sql."<br>".$conn->error;
	
$sql="UPDATE `members` SET `last_reserve_book`=NULL WHERE `member_id`='$_POST[member_id]'";
	
	if($result=$conn->query($sql)===TRUE)
	echo "<h2>Successfully Added</h2>";
	else
	echo "Error:".$sql."<br>".$conn->error;
	
	}else{//if it is normal borrow
$sql="INSERT INTO `book_borrow` (`member_id`, `book_id`, `borrow_date`, `due_return_date`) VALUES ('$_POST[member_id]', '$_POST[book_id]', '$_POST[borrowaldate]', '$_POST[returndate]')";
	if($result=$conn->query($sql)===TRUE)
	echo "<h2>Successfully Added</h2>";
	else
	echo "Error:".$sql."<br>".$conn->error;
		
$sql="UPDATE `books` SET   `available`=0  WHERE `books`.`book_id` = '$_POST[book_id]'";	

	if($result=$conn->query($sql)===TRUE)
	echo "<h2>Successfully Added</h2>";
	else
	echo "Error:".$sql."<br>".$conn->error;	
	}//end if-else

$sql="UPDATE members SET `no_book_borrow`='$_POST[nobooksBorrow]' WHERE `member_id`='$_POST[member_id]'";	
	
	if($result=$conn->query($sql)===TRUE)
	echo "<h2>Successfully Added</h2>";
	else
	echo "Error:".$sql."<br>".$conn->error;
?>