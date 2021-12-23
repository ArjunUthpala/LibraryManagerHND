<?php
require("../PHP/session.php");
?>
<!Doctype HTML>
<head>
	<title>Add book</title>
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
	<form action="../PHP/add_book.php" method="post">
	<div class="container">
	<h3 align="center">Adding Book</h3>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Book ID</label>
			<div class="col-sm-10">
				<input type="text" name="bookid" required pattern="[0-9]*" placeholder="12345" maxlength="5" size="15">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Book Title</label>
			<div class="col-sm-10">
				<input type="text" name="booktitle" required pattern="[A-Za-z0-9\s\-_,\.:;()''""]*" maxlength="50" size="55">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Book Author</label>
			<div class="col-sm-10">
				<input type="text" name="bookauthor1" required pattern="[A-Za-z\s]*" maxlength="25" size="30">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Book Author 2</label>
			<div class="col-sm-10">
				<input type="text" name="bookauthor2" pattern="[A-Za-z\s]*" maxlength="25" size="30">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Publisher</label>
			<div class="col-sm-10">
				<input type="text" name="bookpub" required pattern="[A-Za-z\s]*" maxlength="20" size="25">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">ISBN Number</label>
			<div class="col-sm-10">
				<input type="text" name="bookisbn" pattern="[0-9\-]*" maxlength="17" size="20" placeholder="978-3-16-148410-0">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Book category</label>
			<div class="col-sm-10">
				<select name="bookcategory">
					<option>Action</option>
					<option>Horror</option>
					<option selected>Novel</option>
					<option>Comic</option>
					<option>Education</option>
				</select>
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Price</label>
			<div class="col-sm-10">
				<input type="text" name="bookprice" pattern="[0-9\s\.\$]*" maxlength="10" size="15" placeholder="$12.50">
			</div>
		</div>
		<div class="form-group row">
			<div class="col-sm-10">
				<button type="submit" class="btn btn-primary">Add book</button>
				<button type="reset" class="btn btn-primary">Reset</button>
			</div>
		</div>
	</div>
</body>
</html>