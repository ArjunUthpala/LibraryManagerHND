<?php
require("session.php");
//print_r($_REQUEST);
require("connection.php");
$sql="UPDATE `books` SET `book_title` = '$_POST[booktitle]', `author1` = '$_POST[bookauthor1]', `author2` = '$_POST[bookauthor2]', `publisher` = '$_POST[bookpub]', `isbn` = '$_POST[bookisbn]', `category` = '$_POST[bookcategory]', `price` = '$_POST[bookprice]' WHERE `books`.`book_id` = '$_POST[bookid]';";
if($conn->query($sql)===true)
	header('location:..dashboard.php');
else
	echo "Error :".$conn->error;
?>



