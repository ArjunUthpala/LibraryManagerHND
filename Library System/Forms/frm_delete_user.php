<?php
require("../PHP/session.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Delete User</title>


<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link href="../bootstrap-4.0.0/dist/css/bootstrap.css" rel="stylesheet" type="text/css">

<link href="../CSS/formbackground.css" rel="stylesheet" type="text/css">
</head>
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
  <label for="userid1">User ID:</label>
  <input type="text" class="form-control" name="user_id" id="user_id" autocomplete="off" autofocus>
  <input type="submit" class="btn btn-info" style="margin:10px 10px 10px 0px" value="Search User" name="finduser">
</div>
</form>
<?php 

if(isset($_POST['finduser'])){//whether submit is clicked
  require("../php/connection.php");
	$sql="SELECT * FROM `users` WHERE `user_id`='$_POST[user_id]'";
	$result= $conn->query($sql);
	$row = mysqli_fetch_assoc($result);
	if(mysqli_num_rows($result)==0){//if user is not found 
	echo '<div class="alert alert-warning" ><strong>Warning!</strong> Type your Member ID.</div>';
	exit();	
	}else{	
?>
</div>
<div class="container">
<h4 align="center" class="my">Deleting Library System User</h4>
	
<form action="../php/delete_user.php" method="post" enctype="multipart/form-data" >
  	
<div class="form-group row">
<label class="col-sm-2 col-form-label">User ID</label>
<input name="user_id" type="text" class="form-control"  value="<?php echo $row['user_id']; ?>" readonly >
</div>

<div class="form-group row">
<label class="col-sm-2 col-form-label">Member ID</label>
<input name="member_id" type="text" class="form-control"  value="<?php echo $row['member_id']; ?>" readonly >
</div>

<div class="form-group row">
<label for="uname" class="col-sm-2 col-form-label">User Name</label>
<input name="user_name" type="text" class="form-control" id="uname" disabled  value="<?php echo $row['user_name'];?>">
<div id="unamemsg"></div>
</div>
<input type="hidden" name="profile_image" value="<?php echo $row['profile_image']?>" >
<div class="form-group">
    <label for="userType">User Type</label> 
    <select name="user_type"  class="form-control" id="userType" disabled >
        <option value="user" <?php if($row['user_type']=='user') echo 'selected';?> >User</option>
        <option value="admin" <?php if($row['user_type']=='admin') echo 'selected';?>  >Admin</option> 
    </select>
</div>

<div class="input-group mb-3">
  <img src="<?php echo $row['profile_image']?>" id="myimage" width="250" height="250">
</div> 
 
<button type="submit" class="btn btn-primary" name="submit" value="edit user">Delete System user</button>
</form>
</div>
</body>
<?php 
}//end if ; if user is found
}//end if ; Submit button is clicked
?>
</html>