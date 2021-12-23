<?php
session_start();//refresh the session
session_destroy();//clear all the session variable
header('Location:login.php'); ///redirect the login page
?>