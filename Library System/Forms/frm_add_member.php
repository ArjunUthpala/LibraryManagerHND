<?php
require("../PHP/session.php");
?>
<!Doctype HTML>
<head>
	<title>Add member</title>
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
	<form action="../PHP/add_member.php" method="post">
	<div class="container">
	<h3 align="center">Adding Member</h3>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Member ID</label>
			<div class="col-sm-10">
				<input type="text" name="member_id" required pattern="[0-9]*" placeholder="12345" maxlength="5" size="15">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">First Name</label>
			<div class="col-sm-10">
				<input type="text" name="first_name" required pattern="[A-Za-z]*" maxlength="15" size="20">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Middle Name</label>
			<div class="col-sm-10">
				<input type="text" name="middle_name" pattern="[A-Za-z]*" maxlength="15" size="20">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Last Name</label>
			<div class="col-sm-10">
				<input type="text" name="last_name" required pattern="[A-Za-z]*" maxlength="20" size="25">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Member Type</label>
			<div class="col-sm-10">
					<input type="radio" name="member_type" value="student" checked>Student
					<input type="radio" name="member_type" value="professor" >Professor
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Gender</label>
			<div class="col-sm-10">
					<input type="radio" name="gender" value="male" checked>Male
					<input type="radio" name="gender" value="female" >Female
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Address line 1</label>
			<div class="col-sm-10">
				<input type="text" name="address1" required pattern="[A-Za-z0-9\s\-_,\.:;()''""\/]*" maxlength="20" size="25">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Address line 2</label>
			<div class="col-sm-10">
				<input type="text" name="address2" required pattern="[A-Za-z\s\-_,\.:;()''""\/]*" maxlength="20" size="25">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">City</label>
			<div class="col-sm-10">
				<input type="text" name="city" required pattern="[A-Za-z]*" maxlength="15" size="20">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Date</label>
			<div class="col-sm-10">
				<input type="date" name="register_date" required >
			</div>
		</div>
		<div class="form-group row">
			<div class="col-sm-10">
				<button type="submit" class="btn btn-primary">Add member</button>
				<button type="reset" class="btn btn-primary">Reset</button>
			</div>
		</div>
	</div>
</body>
</html>