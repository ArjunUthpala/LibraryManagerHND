<?php
require("session.php");
//print_r($_REQUEST);
require("connection.php");
$sql="INSERT INTO `books` (`book_id`, `book_title`, `author1`, `author2`, `publisher`, `isbn`, `category`, `price`) VALUES ('$_POST[bookid]', '$_POST[booktitle]', '$_POST[bookauthor1]', '$_POST[bookauthor2]', '$_POST[bookpub]', '$_POST[bookisbn]', '$_POST[bookcategory]', '$_POST[bookprice]');";
if($conn->query($sql)===true)
	header('location:..dashboard.php');
else
	echo "Error :".$conn->error;
?>



