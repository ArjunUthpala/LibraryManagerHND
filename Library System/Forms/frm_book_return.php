<?php
require("../PHP/session.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Record Book Return</title>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<script>
function calculateFine(){
var rd=Date.parse(document.getElementById('returndate').value);
var curdate=Date.parse(new Date());
if(curdate>rd){
	var d = (curdate-rd);
	fine=Math.round((d/3600000/24))*5
	document.getElementById('hiddenfine').value=fine;	
	document.getElementById('fine').value="Rs. "+fine+".00";
		
} else{
	document.getElementById('fine').value="Rs. 0.00";
	document.getElementById('hiddenfine').value=0;
}
}
</script>
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
<h4 align="center" class="my">Searching Book Borrow for Returning</h4>

<form action="<?php $_SERVER['PHP_SELF']?>" method="post">
<div class="form-group">
  <label>Borrowal ID:</label>
  <input type="text" class="form-control" name="borrowalid2" maxlength="4"  required autofocus>
  <input type="submit" class="btn btn-info" style="margin:10px 10px 10px 0px" value="Search" name="findborrowal">
  
</div>

<?php 
if(isset($_POST['findborrowal'])){
	require('../php/connection.php');
	$sql="SELECT * FROM `book_borrow` WHERE `ID`=$_POST[borrowalid2]";
	$result=$conn->query($sql);
	if(mysqli_num_rows($result)==0)
		echo "<div class='alert alert-warning' id='norecord' ><strong>Warning!</strong> No record found.</div>";
	else{
		$row=mysqli_fetch_assoc($result);{
  ?>
</form>
</div>
<div class="container">
<h4 align="center" class="my">Recording Book Return</h4>

<form action="../php/record_return_Book.php" method="get">
  <div class="form-group">
    <label>Borrow ID</label>
    <input type="text" class="form-control"  value="<?php echo $row['id']; ?>" readonly name="borrowalid1">
  </div>
  
<div class="form-group">
  <label>Member ID</label>
    <input name="memberid" type="text" class="form-control"  value="<?php echo $row['member_id'];?>" readonly   >
</div>

<div class="form-group">
  <label>Book ID</label>
    <input name="bookid" type="text" class="form-control"  value="<?php echo $row['book_id'];?>" readonly   >
</div>

<div class="form-group">
  <label>Borrowal Date</label>
  <input name="borrowaldate" type="text" class="form-control" value="<?php echo $row['borrow_date'];?>" readonly>
</div>

<div class="form-group">
  <label for="returndate">Due Return Date</label>
  <input name="returndate" type="text" class="form-control" id="returndate" 
value="<?php echo $row['due_return_date'];?>"   readonly="readonly">
</div>
<div class="form-group">
  <label for="returndate">Outstanding Fine</label>
  <input type="hidden" name="hiddenfine" id="hiddenfine">
  <input name="fine" type="text" style="background-color:#EB92E7" disabled class="form-control" id="fine" />
</div>
<button type="button" class="btn btn-primary" id="fine" onclick="calculateFine()">Calculate Fine</button>
<input type="submit" class="btn btn-primary" id="submit"  value="Record Book Return" 
<?php if(mysqli_num_rows($result)==0) echo "disabled"; ?>>

</form>

</div>


<?php
}// borrowal found
	}
}//Button is clicked
?>
</body>
</html>