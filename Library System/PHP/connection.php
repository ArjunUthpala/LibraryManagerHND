<?php
$conn=new mysqli("localhost","root","","library_hnd61");
if($conn->connect_errno){
	echo "Failed to connect to MySQL:" .$conn->connect_error;
}/*else
	echo "OK";*/
?>