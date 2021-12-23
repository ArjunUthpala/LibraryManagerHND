<?php
require("session.php");
//print_r($_REQUEST);
require("connection.php");
$sql="DELETE FROM `members` WHERE `members`.`member_id` = '$_POST[member_id]';";
if($conn->query($sql)===true)
	header("location:../dashboard.php");
else
	echo "Error :".$conn->error;
?>



