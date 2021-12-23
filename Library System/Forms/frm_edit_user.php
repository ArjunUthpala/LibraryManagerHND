<?php
session_start();//refresh the session
if(!isset($_SESSION['uname']) )// if already log-out try to access without log-in
	header('location:../login.php');
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Edit User</title>

<script class="jsbin" src="../jQuery/jquery-3.6.0.min.js"></script>

<link href="../bootstrap-4.0.0/dist/css/bootstrap.css" rel="stylesheet" type="text/css">
<script src="../javascript/validation.js"></script>
<script>
function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#myimage')
                        .attr('src', e.target.result)
                        .width(200)
                        .height(200);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
	
</script>
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
	echo '<div class="alert alert-warning" ><strong>Warning!</strong> User Not Found.</div>';
	exit();	
	}else{	
?>
</div>
<div class="container">
<h4 align="center" class="my">Editing Library System User</h4>
	
<form action="../php/edit_user.php" method="post" enctype="multipart/form-data" >
  	
<div class="form-group">
<label>User ID</label>
<input name="user_id" type="text" class="form-control"  value="<?php echo $row['user_id']; ?>" readonly >
</div>

<div class="form-group">
<label>Member ID</label>
<input name="member_id" type="text" class="form-control"  value="<?php echo $row['member_id']; ?>"  >
</div>

<div class="form-group">
<label for="uname" >User Name</label>
<input name="user_name" type="text" class="form-control" id="uname" value="<?php echo $row['user_name'];?>" required>
</div>

<div class="form-group">
    <label for="userType">User Type</label> 
    <select name="user_type"  class="form-control" id="userType" required>
        <option value="user" <?php if($row['user_type']=='user') echo 'selected';?>>User</option>
        <option value="admin" <?php if($row['user_type']=='admin') echo 'selected';?> >Admin</option> 
    </select>
</div>
<div class="form-group">
<label for="pass1">Password :</label>
<input name="pass1" type="password" class="form-control"    maxlength="20" id="pass1" pattern="[a-zA-Z0-9]*" maxlength="10" required >
</div>

<div class="form-group">
<label>Retype Password :</label>
<input name="pass2" type="password" class="form-control"    maxlength="20" id="pass2" pattern="[a-zA-Z0-9]*" maxlength="10" required>
</div>

<div class="input-group mb-3">
  <div class="input-group-prepend"><span class="input-group-text" >Select Image for Editing</span></div>
  <div class="custom-file">
    <input type="file" class="custom-file-input"  name="file_to_upload" onchange="readURL(this);" required>
    <label class="custom-file-label" >Choose file</label>
</div>
</div>	
<input type="hidden" name="pro_img" value="<?php echo $row['profile_image']?>">
<div class="input-group mb-3">
  <img src="<?php echo $row['profile_image']?>" id="myimage" width="250" height="250">
</div> 
 
<button type="submit" class="btn btn-primary" name="submit" value="edit user">Edit user</button>
</form>
</div>
</body>
<?php 
}//end if ; if user is found
}//end if ; Submit button is clicked
?>
</html>