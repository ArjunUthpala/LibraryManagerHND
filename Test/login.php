
<?php
/*require('php/session.php');*/
?>
<!DOCTYPE html>
<html>
<head>
<title>Login Page</title>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link href="bootstrap-4.0.0/dist/css/bootstrap.css" rel="stylesheet" type="text/css">
<script src="Javascript/validation.js"></script>

<style>
body{
	background-image:url(Icons/background.jpg)	
	
}
.box {
    width: 500px;
    margin: 200px 0;
}

.shape1{
    position: relative;
    height: 150px;
    width: 150px;
    background-color: #0074d9;
    border-radius: 80px;
    float: left;
    margin-right: -50px;
}
.shape2 {
    position: relative;
    height: 150px;
    width: 150px;
    background-color: #0074d9;
    border-radius: 80px;
    margin-top: -30px;
    float: left;
}
.shape3 {
    position: relative;
    height: 150px;
    width: 150px;
    background-color: #0074d9;
    border-radius: 80px;
    margin-top: -30px;
    float: left;
    margin-left: -31px;
}
.shape4 {
    position: relative;
    height: 150px;
    width: 150px;
    background-color: #0074d9;
    border-radius: 80px;
    margin-top: -25px;
    float: left;
    margin-left: -32px;
}
.shape5 {
    position: relative;
    height: 150px;
    width: 150px;
    background-color: #0074d9;
    border-radius: 80px;
    float: left;
    margin-right: -48px;
    margin-left: -32px;
    margin-top: -30px;
}
.shape6 {
    position: relative;
    height: 150px;
    width: 150px;
    background-color: #0074d9;
    border-radius: 80px;
    float: left;
    margin-right: -20px;
    margin-top: -35px;
}
.shape7 {
    position: relative;
    height: 150px;
    width: 150px;
    background-color: #0074d9;
    border-radius: 80px;
    float: left;
    margin-right: -20px;
    margin-top: -57px;
}
.float {
    position: absolute;
    z-index: 2;
}

.form {
    margin-left: 145px;
}
</style>
</head>
<body>

<?php
	if (isset($_POST['login']) && !empty($_POST['username'])  && !empty($_POST['password'])) {
		require('php/connection.php');
		$sql="SELECT * FROM `users` WHERE `user_name`='$_POST[username]'";
		$result=$conn->query($sql);				
		$row=mysqli_fetch_assoc($result);
		if($_POST['username']==$row['user_name'] && md5($_POST['password'])==$row['password']){
		  $_SESSION['userid'] = $row['user_id'];
		  $_SESSION['memberid'] = $row['member_id'];
		  $_SESSION['uname'] = $row['user_name'];
		  //$_SESSION['timeout'] = time();	
		  $_SESSION['utype'] = $row['user_type'];
		  $_SESSION['profileimage']=$row['profile_image'];
		  header('Location:dashboard.php');// redirection location
	   }else {
?>
<div class="container">
        <div id="login-row" class="row justify-content-center align-items-center">
            <div id="login-column" class="col-md-6">
                <div class="box">
                    <div class="shape1"></div>
                    <div class="shape2"></div>
                    <div class="shape3"></div>
                    <div class="shape4"></div>
                    <div class="shape5"></div>
                    <div class="shape6"></div>
                    <div class="shape7"></div>
                    <div class="float">
                        <form class="form" action="<?php $_SERVER['PHP_SELF'];?>" method="post">
                            <div class="form-group">
                                <label for="username" class="text-white">Username:</label><br><label class="col-sm-2 col-form-label">Book ID</label>
                                <input type="text" name="username" id="username" class="form-control" required autocomplete="off" autofocus>
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-white">Password:</label><br>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="login" class="btn btn-info btn-md" value="submit">
								</div>
                                <?php
								echo '<div class="alert alert-danger" ><strong>Warning!</strong> User Name or Password incorrect</div>';
								exit();
								?>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php 
			   }
			}// if login button is click and user_name and password is not empty
	
	?>
<!-- This login form will display only very first time -->
    <div class="container">
        <div id="login-row" class="row justify-content-center align-items-center">
            <div id="login-column" class="col-md-6">
                <div class="box">
                    <div class="shape1"></div>
                    <div class="shape2"></div>
                    <div class="shape3"></div>
                    <div class="shape4"></div>
                    <div class="shape5"></div>
                    <div class="shape6"></div>
                    <div class="shape7"></div>
                    <div class="float">
                        <form class="form" action="<?php $_SERVER['PHP_SELF'];?>" method="post">
                            <div class="form-group">
                                <label for="username" class="text-white">Username:</label><br><label class="col-sm-2 col-form-label">Book ID</label>
                                <input type="text" name="username" id="username" class="form-control" required autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-white">Password:</label><br>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="login" class="btn btn-info btn-md" value="submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>
-->
    </html>