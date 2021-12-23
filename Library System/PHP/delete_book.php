<?php
require("session.php");
//print_r($_REQUEST);
require("connection.php");
$sql="DELETE FROM `books` WHERE `books`.`book_id` = '$_POST[bookid]';";
if($conn->query($sql)===true)
	header('location:..dashboard.php');
else
	echo "Error :".$conn->error;
?>



