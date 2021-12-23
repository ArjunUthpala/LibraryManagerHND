<?php
require("../PHP/session.php");
?>
<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>Borrow Book</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="../bootstrap-4.0.0/dist/css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="../CSS/formbackground.css" rel="stylesheet" type="text/css">
	<script src="../javascript/externalFunction.js"></script>

</head>

<body>
	<nav class="navbar navbar-dark bg-primary">
		<a class="navbar-brand" href="../dashboard.php">Home</a>
		<div class="navbar-brand"><?php echo 'Welcome ' . $_SESSION['uname']; ?></div>
		<div class="navbar-brand"><?php echo '<img src="../' . $_SESSION['profileimage'] . '" width="40" height="40" />'; ?></div>
		<a class="navbar-brand" href="../logout.php" style="background-color:transparent"><img src="../icons/logout.png" width="40" height="40" /> Logout</a>
	</nav>
	<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
		<div class="container">
			<h4 align="center" class="my">Recording Book Borrowal</h4>

			<div class="form-group">
				<label for="memberid">Enter Member ID</label>
				<input name="member_id" type="text" class="form-control" id="memberid" autocomplete="off" required autofocus>
				<div id="memberidmsg"></div>
			</div>
			<button type="submit" class="btn btn-primary" name="findbook" value="Find Book">Find Book</button>
		</div>
	</form>
	<?php
	if (isset($_POST['findbook'])) {
		require("../php/connection.php");
		$sql = "SELECT * FROM `members` WHERE `member_id`='$_POST[member_id]'";
		$result = $conn->query($sql);
		$nrow = mysqli_num_rows($result);
		if ($nrow == 0) { //no such member found
			echo '<div class="warning"  align="center"><strong>No Such Member found</div>';
			exit();
		}
		$row = mysqli_fetch_assoc($result);
		$no_book_borrow = $row['no_book_borrow']; //No books currently borrowed
		if ($no_book_borrow == 2) { // maximum books are borrowed
			echo '<div class="warning"  align="center"><strong>You have exceeded Maximum Book Borrow Count(2)</strong></div>';
			exit();
		}
		$sql = "SELECT * FROM `books`  WHERE `last_reserved_member`='$_POST[member_id]' AND available=1";
		$result = $conn->query($sql);
		if (mysqli_num_rows($result) > 0) { //if member has reserved a book and book is available.

			$row = mysqli_fetch_assoc($result);
	?>
			<form action="../php/record_borrowal_Book.php" method="POST">
				<div class="container">
					<h4 align="center" class="my">You have reserved a book</h4>

					<div class="form-group">
						<label>Memeber ID</label>
						<input type="text" class="form-control" value="<?php echo $_POST['member_id']; ?>" readonly name="member_id">
					</div>

					<div class="form-group">
						<label>Book ID</label>
						<input type="text" class="form-control" value="<?php echo $row['book_id']; ?>" readonly name="book_id">
					</div>

					<div class="form-group">
						<label>Book Title</label>
						<input type="text" class="form-control" value="<?php echo $row['book_title']; ?>" readonly>
					</div>

					<div class="form-group">
						<label>Borrowal Date</label>
						<input name="borrowaldate" type="date" class="form-control" onChange="calReturnDate()" id="borrwalDate" required>
					</div>

					<div class="form-group">
						<label for="returndate">Due Return Date</label>
						<input name="returndate" type="text" class="form-control" id="returndate" readonly>
					</div>

					<input type="hidden" name="isReserve" value="1">

					<input type="hidden" name="nobooksBorrow" value="<?php echo ($no_book_borrow + 1); ?>">
					<button type="submit" class="btn btn-primary">Record Borrowal</button>

				</div>
			</form>
		<?php
		} else { // if  book is not  reserved
		?>

			<form action="../php/record_borrowal_Book.php" method="POST">
				<div class="container">
					<h4 align="center" class="my">Recording Book Borrowal</h4>

					<div class="form-group">
						<label>Borrow ID</label>
						<input type="text" class="form-control" readonly value="Auto Number">
					</div>

					<div class="form-group">
						<label for="memberid">Member ID</label>
						<input type="text" name="member_id" class="form-control" id="mmberid" value="<?php echo $_POST['member_id']; ?>" readonly>
					</div>

					<div class="form-group">
						<label for="bookid">Book Title</label>
						<select name="book_id" id="book_id" class="form-control" required>
							<?php
							$sql = "SELECT * FROM `books` WHERE `last_reserved_member` IS NULL AND `available`=1";
							$result = $conn->query($sql);
							while ($row = mysqli_fetch_assoc($result)) {
								echo '<option value="' . $row['book_title'] . '">' . $row['book_title'] . '</option>';
							}
							?>
						</select>

					</div>
					<div class="form-group">
						<label>Borrowal Date</label>
						<input name="borrowaldate" type="date" class="form-control" onChange="calReturnDate()" id="borrwalDate" required>
					</div>

					<div class="form-group">
						<label for="returndate">Due Return Date</label>
						<input name="returndate" type="text" class="form-control" id="returndate" readonly>
					</div>

					<input type="hidden" name="nobooksBorrow" value="<?php echo ($no_book_borrow + 1); ?>">

					<button type="submit" class="btn btn-primary">Record Borrowal</button>

				</div>
			</form>

	<?php }
	}
	?>
</body>

</html>