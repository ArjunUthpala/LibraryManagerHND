<?php
session_start();//refresh the session
if(!isset($_SESSION['uname']) )// if already log-out try to access without log-in
	header('location:../login.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link href="../bootstrap-4.0.0/dist/css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="../CSS/formbackground.css" rel="stylesheet" type="text/css">
<style>
	td{
		color: white;
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

<table class="table table-hover table-bordered" >
  <thead>
    <tr class="table-primary">
      <th scope="col">BookID</th>
      <th scope="col">Title</th>
      <th scope="col">ISBN</th>
      <th scope="col">Author one</th>
	  <th scope="col">Author two</th>
	  <th scope="col">Price</th>
	  <th scope="col">Publisher Name</th>
    </tr>
  </thead>
  <tbody>
<?php 
    require('../php/connection.php');
	$sql="SELECT * FROM `books`";
	$result=$conn->query($sql);
	while($row=mysqli_fetch_assoc($result)){
?>
    <tr>
      <th style="color: white" scope="row"><?php echo $row['book_id'];?></th>
      <td><?php echo $row['book_title'];?></td>
      <td><?php echo $row['isbn'];?></td>
      <td><?php echo $row['author1'];?></td>
	  <td><?php echo $row['author2'];?></td>
	  <td><?php echo $row['price'];?></td>
      <td><?php echo $row['publisher'];?></td>
    </tr>
<?php
 }
 echo "	</tbody>
		</table>";
 $conn->close();
 ?>
</div>
</body>
</html>
