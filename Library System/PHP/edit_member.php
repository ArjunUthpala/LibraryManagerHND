<?php
require("session.php");
//print_r($_REQUEST);
require("connection.php");
$sql="UPDATE `members` SET `first_name` = '$_POST[first_name]', `middle_name` = '$_POST[middle_name]', `last_name` = '$_POST[last_name]', `member_type` = '$_POST[member_type]', `gender` = '$_POST[gender]', `address1` = '$_POST[address1]', `address2` = '$_POST[address2]', `city` = '$_POST[city]', `register_date` = '$_POST[register_date]' WHERE `members`.`member_id` = $_POST[member_id];";
if($conn->query($sql)===true)
	header("location:../dashboard.php");
else
	echo "Error :".$conn->error;
?>



