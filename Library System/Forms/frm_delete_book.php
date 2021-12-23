<?php
require("../PHP/session.php");
?>		
<!Doctype HTML>
<head>
	<title>Delete book</title>
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
		<h3 align="center">Searching book for deleting</h3>
		<form action="<?php $_SERVER['PHP_SELF']?>" method="post">
			<div class="form-group row">
			<label class="col-sm-2 col-form-label">Book ID</label>
				<div class="col-sm-10">
					<input type="text" name="bookid" required pattern="[0-9]*" placeholder="12345" maxlength="5" size="15">
				</div>
			</div>
			<div class="form-group row">
				<div class="col-sm-10">
					<button type="submit" name="search" class="btn btn-primary" value="search">Find Book
					</button>
				</div>
			</div>
		</form>
	</div>
	<?php
		if(isset($_POST['search'])){
			print_r($_POST);
			require ("../PHP/connection.php");
			$sql="SELECT * FROM books where book_id = '$_POST[bookid]'";
			$result=mysqli_query($conn,$sql);
			$row=mysqli_num_rows($result);
			echo ($row);
			if ($row==0){
				echo "<h3>Book not found</h3>";
			}else{
				$row=mysqli_fetch_assoc($result);
				print_r($row);
			

	?>
	<form action="../PHP/delete_book.php" method="post">
	<div class="container" >
	<h3 align="center">Book Details</h3>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Book ID</label>
			<div class="col-sm-10">
				<input type="text" name="bookid" required pattern="[0-9]*" placeholder="12345" maxlength="5" size="15" value="<?php echo $row['book_id']?>" readonly>
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Book Title</label>
			<div class="col-sm-10">
				<input type="text" name="booktitle" required pattern="[A-Za-z0-9\s\-_,\.:;()''""]*" maxlength="50" size="55" value="<?php echo $row['book_title']?>" readonly>
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Book Author</label>
			<div class="col-sm-10">
				<input type="text" name="bookauthor1" required pattern="[A-Za-z\s]*" maxlength="25" size="30" value="<?php echo $row['author1']?>" readonly>
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Book Author 2</label>
			<div class="col-sm-10">
				<input type="text" name="bookauthor2" pattern="[A-Za-z\s]*" maxlength="25" size="30" value="<?php echo $row['author2']?>" readonly>
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Publisher</label>
			<div class="col-sm-10">
				<input type="text" name="bookpub" required pattern="[A-Za-z\s]*" maxlength="20" size="25" value="<?php echo $row['publisher']?>" readonly>
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">ISBN Number</label>
			<div class="col-sm-10">
				<input type="text" name="bookisbn" pattern="[0-9\-]*" maxlength="17" size="20" placeholder="978-3-16-148410-0" value="<?php echo $row['isbn']?>" readonly>
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Book category</label>
			<div class="col-sm-10">
				<select name="bookcategory" disabled>
					<option <?php if ($row['category']=="Action") echo "selected"?>>Action</option>
					<option <?php if ($row['category']=="Horror") echo "selected"?>>Horror</option>
					<option <?php if ($row['category']=="Novel") echo "selected"?>>Novel</option>
					<option <?php if ($row['category']=="Comic") echo "selected"?>>Comic</option>
					<option <?php if ($row['category']=="Education") echo "selected"?>>Education</option>
				</select>
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Price</label>
			<div class="col-sm-10">
				<input type="text" name="bookprice" pattern="[0-9A-Za-z\s\.\$]*" maxlength="10" size="15" placeholder="$12.50" value="<?php echo $row['price']?>" readonly>
			</div>
		</div>
		<div class="form-group row">
			<div class="col-sm-10">
				<button type="submit" class="btn btn-primary">Delete</button>
				<button type="reset" class="btn btn-primary">Reset</button>
			</div>
		</div>
	</div>
	</form>
<?php
		}
		}
?>
</body>
</html>