<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Book Reserve</title>
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
<div class="container">
<h4 align="center" class="my">Searching Reserved Book </h4>
<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">

<div class="form-group row">
    <label for="memberid" class="col-sm-2 col-form-label">Memebr ID:</label>
	<div class="col-sm-10">
    <input name="member_id" type="text" class="form-control" id="memberid" required>
	</div>
</div> 
<div class="form-group row">
<input type="submit" name="find_reserve_book" class="btn btn-info" style="margin:10px 10px 10px 0px" value="Search Reserved book">
</div>
</form>
</div>
<?php
if(isset($_POST['find_reserve_book'])){
require("../php/connection.php");
	$sql="SELECT * FROM `books` WHERE `last_reserved_member`='$_POST[member_id]'";
	$result=$conn->query($sql);
	if(mysqli_num_rows($result)==1){// if reserved book found
	$row=mysqli_fetch_assoc($result);	
?>

<div class="container">
<h4 align="center" class="my">your have Reserved book </h4>
<div class="grid-container" >
<div class="grid-item" >Book ID</div>
<div class="grid-item" ><?php echo $row['book_id'];?></div>

<div class="grid-item" >Book Title</div>
<div class="grid-item" ><?php echo $row['book_title'];?></div>

<div class="grid-item" >ISBN </div>
<div class="grid-item"><?php echo $row['isbn'];?></div>

<div class="grid-item" >Author one </div>
<div class="grid-item"><?php echo $row['author1'];?></div>

<div class="grid-item" >Author two </div>
<div class="grid-item"><?php echo $row['author2'];?></div>

<div class="grid-item" >Publisher </div>
<div class="grid-item"><?php echo $row['publisher'];?></div>

<div class="grid-item" >Category </div>
<div class="grid-item"><?php echo $row['Category'];?></div>
</div>
</div>
<?php
}
else{
?>
<div class="container">
<h4 align="center" class="my">Choose book for Reserving </h4>
<form action="../php/reserve_book_for_borrow.php" method="post">
<div class="form-group row">
    <label class="col-sm-2 col-form-label">Book Title</label>
	<div class="col-sm-10">
    <select name="book_title" required >
	<?php
	require("../php/connection.php");
	
	$sql="SELECT `book_title` FROM `books` WHERE `available`=1 AND `last_reserved_member` IS NULL";
	$result=$conn->query($sql);
	while($row=mysqli_fetch_array($result)){
		echo "<option>".$row['book_title']."</option>";
	}
	?>
	<input type="hidden" name="member_id" value="<?php echo $_POST['member_id']; ?>">'
	</select>
	</div>
</div>	
<div class="form-group row">
<input type="submit" name="reserve_book" class="btn btn-info" style="margin:10px 10px 10px 0px" value="Reserved book">
</div>
</form>
</div>
<?php
}
}
?>
</body>
</html>