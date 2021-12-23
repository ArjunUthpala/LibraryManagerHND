<?php
session_start();//refresh the session
if(!isset($_SESSION['uname']) )// if already log-out try to access without log-in
	header('location:login.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>Library System Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="CSS/formbackground.css" rel="stylesheet" type="text/css">
  <link href="bootstrap-4.0.0/dist/css/bootstrap.css" rel="stylesheet" type="text/css">

<style>
.row{
	padding:5px;	
}
.grid-container {
	display: grid;
	grid-column-gap: 40px;
	grid-row-gap: 10px;
	grid-template-columns: auto auto;
	padding: 30px;
}
.grid-item {
	background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 35%, rgba(0,212,255,1) 100%);
	padding: 10px;
	text-align: left;
	color:white;
	-webkit-box-shadow: -3px 3px 15px -1px #000000; -webkit-border-radius: 15px;
	-moz-border-radius: 15px;
	border-radius: 15px;
}
.bg-success{
	background-color:white;
	border:1px solid blue;
	padding:red0px; 
	margin:10px; 
}
.item-head{
	font-weight:bold;
	padding:5px;
	font-size:20px;
	background: linear-gradient(90deg,rgba(250,231,231,1.00) 4.66%,rgba(255,231,0,1.00) 93.26%);
	margin:10px 10px;
	text-align:center;
	color:black;
	border-radius: 10px;
}
div h6{
	font-size:14px; 
	font-weight:bold; 
  }
</style>
<link href="../bootstrap-4.0.0/dist/css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="../CSS/formbackground.css" rel="stylesheet" type="text/css">

<script>
function deleteBorrow(){

var x=window.confirm('Are you sure you want to delete Borrowal?');
if(x==true){
		window.location.href = "php/delete_borrowal.php";
}		
}
function deleteReserve(){
var x=window.confirm("Are you sure you want to delete Reserve?");	
if(x==true){
		window.location.href = "php/delete_book_reserve.php";
}
}
</script>
<?php 
/*
require('php/connection.php');
$sql="select max(bookingDate) FROM `book_reserve`";//The last reserved date
$result=$conn->query($sql);
$row=mysqli_fetch_array($result);

$datetime1 = new DateTime("$row[0]");//creating date object with last reserved date
$datetime2 = date_create(date("Y-m-d"));;//Creating system date
$interval = $datetime1->diff($datetime2);
$nodays=$interval->format('%a');//date difference in days

if($nodays>0){//set all  'reserved_member' as NULL
$sql="UPDATE `books-details` set `reserved_member`=NULL WHERE `reserved_member` IS NOT NULL";
$conn->query($sql);
$sql="UPDATE `members` set `lastReservedBook`=NULL WHERE `lastReservedBook` IS NOT NULL";
$conn->query($sql);
$conn->close();	
}
*/
?>
</head>
<body>
	<nav class="navbar navbar-dark bg-primary">
	<div class="navbar-brand" ><?php echo 'Welcome '.$_SESSION['uname']; ?></div>
	<div class="navbar-brand" ><?php echo '<img src="'.$_SESSION['profileimage'].'" width="40" height="40" />';?></div>
	<a class="navbar-brand" href="logout.php" style="background-color:transparent"><img src="icons/logout.png" width="40" height="40" />  Logout</a>
	</nav>
<div class="container"><h2 align="center">Library System Dashboard</h2></div>
<div class="grid-container">
	
	<div class="grid-item"><!-- grid Item Start-->
		<div class="item-head">Managing  Members</div>

		<div class="row"><!--row start-->

		<div class="col-sm-3"><a href="Forms/frm_add_member.php" class="btn btn-primary" >
			<img src="icons/add-member.png" width="50" height="50" alt="1"></a>
			<h6>Add Member</h6>
		</div>

		<div class="col-sm-3"> <a href="Forms/frm_edit_member.php" class="btn btn-primary">
			<img src="icons/edit-member.png" width="50" height="50" alt="2"></a>
			<h6>Edit Member</h6>
		</div>

		<div class="col-sm-3"> <a href="Forms/frm_delete_member.php" class="btn btn-primary">
			<img src="icons/delete-member.png" width="50" height="50" alt="3"></a>
			<h6>Delete Member</h6>
		</div>

		<div class="col-sm-3"> <a href="Forms/frm_search_member.php" class="btn btn-primary">
			<img src="icons/search-member.png" width="50" height="50" alt="4"></a>
			<h6>Search Member</h6>
		</div>

		</div><!--row end-->
	</div><!-- grid Item ends-->
  
	<div class="grid-item">
		<div class="item-head" >Managing Books</div>

		<div class="row"><!--row start-->

		<div class="col-sm-3"><a href="Forms/frm_add_book.php" class="btn btn-primary" >
			<img src="icons/add-book.png" width="50" height="50" alt="5"></a>
			<h6>Add Book</h6>
		</div>

		<div class="col-sm-3"> <a href="Forms/frm_edit_book.php" class="btn btn-primary"  >
			<img src="icons/edit-book.png" width="50" height="50" alt="6"></a>
			<h6>Edit Book</h6>
		</div>

		<div class="col-sm-3"> <a href="Forms/frm_delete_book.php" class="btn btn-primary" >
			<img src="icons/delete-book.png" width="50" height="50" alt=""/></a>
			<h6>Delete Book</h6>
		</div>

		<div class="col-sm-3"> <a href="Forms/frm_book_details.php" class="btn btn-primary">
			<img src="icons/find-book.png" width="50" height="50" alt="8"></a>
			<h6>Book Details</h6>
		</div>

		</div><!--row end-->
	</div><!-- grid Item-->
  
	<div class="grid-item">
		<div class="item-head" >Managing Book Borrowal</div>
			<div class="row"><!--row start-->
				<div class="col-sm-3"><a href="Forms/frm_book_borrow.php" class="btn btn-primary">
					<img src="icons/borrow-book.png" width="50" height="50" alt="9"></a>
					<h6>Record Borrowal</h6>
				</div>

				<div class="col-sm-3"><a href="#" class="btn btn-primary">
					<img src="icons/delete.png" width="50" height="50" alt="9" onclick="deleteBorrow()"></a>
					<h6>Delete Borrowal</h6> 
				</div>
				 
				<div class="col-sm-3"><a href="Forms/frm_book_reserve.php" class="btn btn-primary">
					<img src="icons/reserve-book.png" width="50" height="50" ></a>
					<h6>Book Reserve</h6> 
				</div>

				<div class="col-sm-3"><a href="#" class="btn btn-primary">
					<img src="icons/delete.png" width="50" height="50" onclick="deleteReserve()"></a>
					<h6>Delete Book Reserve</h6>
				</div>
			</div><!--row end-->
	</div>
  
	<div class="grid-item">
		<div class="item-head" >Managing Book Return</div>
	
		<div class="row"><!--row start-->
			<div class="col-sm-3"> <a href="Forms/frm_delete_record_return_book.php" class="btn btn-primary">
				<img src="icons/delete.png" width="50" height="50" alt="11"></a>
				<h6>Delete Return</h6>
			</div>

			<div class="col-sm-3"><a href="Forms/frm_book_return.php"  class="btn btn-primary">
				<img src="icons/return-book.png" width="50" height="50" alt="9"></a>
				<h6>Book Return</h6>
			</div>
		</div><!--row end-->
	</div>

	<div class="grid-item">
		<div class="item-head" >Managing Library Users</div>

		  <div class="row"><!--row start-->
		  
			<div class="col-sm-3"> <a href="Forms/frm_add_user.php" class="btn btn-primary">
				<img src="icons/add-user.png" width="50" height="50" alt="9"></a>
				<h6>Add User</h6>
			</div>

			<div class="col-sm-3"> <a href="Forms/frm_edit_user.php" class="btn btn-primary">
				<img src="icons/edit-user.png" width="50" height="50" alt="10"></a>
				<h6>Edit User</h6>
			</div>
			
			<div class="col-sm-3"> <a href="Forms/frm_delete_user.php" class="btn btn-primary">
				<img src="icons/delete-user.png" width="50" height="50" alt="11"></a>
				<h6>Delete User</h6>
			</div>
			
			<div class="col-sm-3"> <a href="Forms/frm_search_user.php" class="btn btn-primary">
				<img src="icons/view-user.png" width="50" height="50" alt="12"></a>
				<h6>View User Profile</h6>
			</div>
			
		 </div><!--row end-->
	</div>

	<div class="grid-item">
			<div class="item-head" >Analyzing</div>

		  <div class="row"><!--row start-->
			<div class="col-sm-3">
			  <img src="icons/analyze.png" width="50" height="50" alt="9">
			</div>
			<div class="col-sm-3">
			 <img src="icons/analyze.png" width="50" height="50" alt="10">
			</div>
			<div class="col-sm-3">
			  <img src="icons/analyze.png" width="50" height="50" alt="11">
			</div>
			<div class="col-sm-3">
			  <img src="icons/analyze.png" width="50" height="50" alt="12">
			</div>
		  </div><!--row end-->
	</div>  
</div>
</body>
</html>
