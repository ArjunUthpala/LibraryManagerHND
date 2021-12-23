<?php
require("../PHP/session.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Search Member</title>
<link href="../bootstrap-4.0.0/dist/css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="../CSS/formbackground.css" rel="stylesheet" type="text/css">

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
</head>

<body>
	<nav class="navbar navbar-dark bg-primary">
	<a class="navbar-brand" href="../dashboard.php">Home</a>
	<div class="navbar-brand" ><?php echo 'Welcome '.$_SESSION['uname']; ?></div>
	<div class="navbar-brand" ><?php echo '<img src="../'.$_SESSION['profileimage'].'" width="40" height="40" />';?></div>
	<a class="navbar-brand" href="../logout.php" style="background-color:transparent"><img src="../icons/logout.png" width="40" height="40" />  Logout</a>
	</nav>
<div class="container">
<h3 align="center" class="my">Searching Member</h3>
<form action="<?php $_SERVER['PHP_SELF']?>" method="post">
<div class="form-group">
  <label for="usr">Member ID:</label>
  <input type="text" class="form-control" name="member_id" autofocus required autocomplete="off">
  <input type="submit" class="btn btn-info" style="margin:10px 10px 10px 0px" value="Search User" name="finduser">
 </div>
</form>

<?php 
if(isset($_POST['finduser'])){
	require('../php/connection.php');
	$sql="SELECT * FROM `members` WHERE `member_id`='$_POST[member_id]'";
	$result=$conn->query($sql);
	if(mysqli_num_rows($result)==0)
		echo "<div class='alert alert-warning' id='norecord' ><strong>Warning!</strong> No record found.</div>";
	else{
		$row=mysqli_fetch_assoc($result);
?>
</div>
<div class="container">

<div class="grid-container" >
<div class="grid-item" >Memeber ID :</div>
<div class="grid-item" ><?php echo $row['member_id'];?></div>

<div class="grid-item label label-primary" >First Name :</div>
<div class="grid-item"><?php echo $row['first_name'];?></div>

<div class="grid-item" >Middle Name :</div>
<div class="grid-item"><?php echo $row['middle_name'];?></div>

<div class="grid-item" >Last Name :</div>
<div class="grid-item"><?php echo $row['last_name'];?></div>

<div class="grid-item" >Member Type :</div>
<div class="grid-item"><?php echo $row['member_type'];?></div>

<div class="grid-item" >Gender:</div>
<div class="grid-item"><?php echo $row['gender'];?></div>

<div class="grid-item" >Address :</div>
<div class="grid-item">
<?php 
echo $row['address1'].'<br>';
echo $row['address2'].'<br>';
echo $row['city'].'<br>';
?>
</div>

<div class="grid-item" >Registered Date :</div>
<div class="grid-item"><?php echo $row['register_date'];?></div>
<?php
	}
	}//end button pressed
 ?>
</div>
</div>
</body>
</html>