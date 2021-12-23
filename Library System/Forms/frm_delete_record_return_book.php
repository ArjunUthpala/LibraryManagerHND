<?php
require('../php/session.php');

?>
<!doctype html>
<html>
<head>
<title>Delete Book Return</title>
<link href="../bootstrap-4.0.0/dist/css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="../CSS/formbackground.css" rel="stylesheet" type="text/css">
<meta charset="utf-8">
</head>
<body>
<nav class="navbar navbar-dark bg-primary">
<a class="navbar-brand" href="../dashboard.php">Home</a>
<div class="navbar-brand" ><?php echo 'Welcome '.$_SESSION['uname']; ?></div>
<div class="navbar-brand" ><?php echo '<img src="../'.$_SESSION['profileimage'].'" width="40" height="40" />';?></div>
<a class="navbar-brand" href="../logout.php" style="background-color:transparent"><img src="../Icons/logout.jpg" width="40" height="40" /></a>
</nav>

<div class="container">
<h4 align="center" class="my">Searching Book Borrowal for Deleting</h4>

<form action="<?php $_SERVER['PHP_SELF']?>" method="post">
<div class="form-group">
  <label>Borrowal ID:</label>
  <input type="text" class="form-control" name="borrowalid" maxlength="4">
  <input type="submit" class="btn btn-info" style="margin:10px 10px 10px 0px" value="Search" name="findborrowal">
  <div class="alert alert-warning" id="norecord" >
   <strong>Warning!</strong> No record found.
</div>
</div>
</form>
</div>
<?php 
if(isset($_POST['findborrowal'])){
	
require('../php/connection.php');
$sql="SELECT * FROM `book_borrow` WHERE  `book_borrow`.`id`='$_POST[borrowalid]'";
$result=$conn->query($sql);

if(mysqli_num_rows($result)>0){// if there is any borrowal in the table

$row=mysqli_fetch_assoc($result);
$bookid=$row['book_id'];
$memberid=$row['member_id'];

//Actual return date and fine must be NULL and 0.00
$sql="UPDATE `book_borrow` SET `actual_return_date` = NULL, `fine` = 0.00 WHERE `book_borrow`.`id` = '$_POST[borrowalid]';";
$conn->query($sql);
	
//if $result=$conn->query($sql1);book is returned available must be 1 now it become 0
$sql="UPDATE `books` SET `available`=0 WHERE `book_id`='$memberid'";
$conn->query($sql);
	

// reading current no of books return
$sql="SELECT * FROM `members` WHERE `member_id`=$memberid";
$result=$conn->query($sql);

$row1=mysqli_fetch_assoc($result);
$noBoookBorrow=$row1['no_book_borrow'];


// # book is incremented by one
$sql="UPDATE `members`  SET  `no_book_borrow`=".++$noBoookBorrow." WHERE `member_id`=$memberid";

	if($result=$conn->query($sql)===TRUE)
	//echo "<h2>Successfully updated</h2>";
		header('location:../dashboard.php');
	else
		echo "Error:".$sql."<br>".$conn->error;	

}// if record is there in book_borrwal table
}// if submit button is clicked.
?>

</body>
</html>





