<?php
session_start();//refresh the session
if(!isset($_SESSION['uname']) )// if already log-out try to access without log-in
	header('location:../login.php');
if(($_SESSION['utype'])!='admin')// if user type is not admin
	header('Location:../dashboard.php');
?>