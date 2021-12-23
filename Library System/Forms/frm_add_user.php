<?php
require("../PHP/session.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Add System User</title>
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
<h4 align="center" class="my">Adding System User</h4>
<form action="../php/add_user.php" method="post" enctype="multipart/form-data">
  	
<div class="form-group" for="user_id">
  <label>User ID</label>
  <input name="user_id" type="text"  class="form-control"  placeholder="Auto Number" disabled>
</div>

<div class="form-group" for="user_id">
  <label>Member ID</label>
  <input name="member_id" type="text"  class="form-control"  pattern="[0-9]*" required id="user_id">
</div>

<div class="form-group">
<label for="username">User Name</label>
<input name="user_name" type="text" required class="form-control" id="username"   >
</div>

<div class="form-group">
  <label for="pass1">Enter Password</label>
  <input  name="pass1" type="password" class="form-control" id="pass1"  pattern="[a-zA-Z0-9]*" required>
</div>

<div class="form-group">
  <label for="pass2" >Retype Password</label>
  <input  name="pass2" type="password"  class="form-control" id="pass2"  pattern="[a-zA-Z0-9]*" required>
</div>

<div class="form-group">
  <label for="userType">User Type</label>
  <select name="user_type"  class="form-control" id="userType" required>
    <option value="user" selected>User</option>
    <option value="admin">Admin</option>
   </select>
</div>

<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" >Upload</span>
  </div>
  <div class="custom-file">
    <input type="file" class="custom-file-input"  name="file_to_upload" required>
    <label class="custom-file-label" >Choose Profile file</label>
  </div>
</div>
<button type="submit" class="btn btn-primary" name="add" value="Add user">Add user</button>
<button type="reset" class="btn btn-primary">Reset</button>
</form>
</div>
</body>
</html>