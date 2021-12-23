<?php
session_start();//refresh the session
if(!isset($_SESSION['uname']) )// if already log-out try to access without log-in
	header('location:../login.php');
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Search User</title>
<link href="../bootstrap-4.0.0/dist/css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="../CSS/formbackground.css" rel="stylesheet" type="text/css">
</head>
<style>
.grid-container {
  display: grid;
  grid-template-columns: auto auto;
  background-color: transparent;
  padding: 10px;
}
.grid-item {
	border: 2px solid rgba(0, 0, 0, 0.8);
	padding: 20px;
	font-size: 16px;
	text-align: left;
	margin: 2px;
	font-weight: bold;
	color: #050D12;
	border-radius: 5px;
	background-color: #AAE4F3;
}
</style>

<body>
	<nav class="navbar navbar-dark bg-primary">
	<a class="navbar-brand" href="../dashboard.php">Home</a>
	<div class="navbar-brand" ><?php echo 'Welcome '.$_SESSION['uname']; ?></div>
	<div class="navbar-brand" ><?php echo '<img src="../'.$_SESSION['profileimage'].'" width="40" height="40" />';?></div>
	<a class="navbar-brand" href="../logout.php" style="background-color:transparent"><img src="../icons/logout.png" width="40" height="40" />  Logout</a>
	</nav>
<div class="container">
<h4 align="center" class="my">Searching Library System User</h4>

<form action="<?php $_SERVER['PHP_SELF']?>" method="post">
<div class="form-group">
  <label for="usr">User ID:</label>
  <input type="text" class="form-control" name="user_id" required autocomplete="off" autofocus>
  <input type="submit" class="btn btn-info" style="margin:10px 10px 10px 0px" value="Search User" name="finduser">
  </div>
</form>

<?php 
	if(isset($_POST['finduser'])){
    require('../php/connection.php');
	$sql="SELECT * FROM `users` WHERE `user_id`='$_POST[user_id]'";
	$result=$conn->query($sql);
	if(mysqli_num_rows($result)==0){
		echo '<div class="alert alert-warning" ><strong>Warning!</strong> Type your User ID.</div>';	
		exit();
	}else	
	$row=mysqli_fetch_assoc($result);

?>

<div class="grid-container" >
<div class="grid-item" >User ID :</div>
<div class="grid-item" ><?php echo $row['user_id'];?></div>

<div class="grid-item" >Memeber ID :</div>
<div class="grid-item" ><?php echo $row['member_id'];?></div>

<div class="grid-item" >User Name :</div>
<div class="grid-item"><?php echo $row['user_name'];?></div>

<div class="grid-item" >User Type :</div>
<div class="grid-item"><?php echo $row['user_type'];?></div>

<div class="grid-item" >Profile Image:</div>
<div class="grid-item" style="padding:50px"><img src="<?php echo $row['profile_image'];?>" width="250" height="250"/></div>

<?php
	}
 ?>
</div>
</div>
</body>
</html>