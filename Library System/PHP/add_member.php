<?php
require("session.php");
//print_r($_REQUEST);
require("connection.php");
$sql="INSERT INTO `members` (`member_id`, `first_name`, `middle_name`, `last_name`, `member_type`, `gender`, `address1`, `address2`, `city`, `register_date`) VALUES ('$_POST[member_id]', '$_POST[first_name]', '$_POST[middle_name]', '$_POST[last_name]', '$_POST[member_type]', '$_POST[gender]', '$_POST[address1]', '$_POST[address2]', '$_POST[city]', '$_POST[register_date]');";
if($conn->query($sql)===true)
	header("location:../dashboard.php");
else
	echo "Error :".$conn->error;
?>



