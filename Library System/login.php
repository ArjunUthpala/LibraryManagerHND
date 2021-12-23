<link href="CSS/formbackground.css" rel="stylesheet" type="text/css">
<link href="bootstrap-4.0.0/dist/css/bootstrap.css" rel="stylesheet" type="text/css">
<script src="Javascript/validation.js"></script>

<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
<style>
.box {
    width: 300px;
    margin: 75px 0;
}
.container {
    margin-right: auto;
    margin-top: 150px;
	width: 650px;
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
		  session_start();	
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
                        <form class="form" action="<?php $_SERVER['PHP_SELF'];?>" method="post">
						<div><h3 align="center">Library System Login</h3></div>
                            <div class="form-group">
                                <label for="username" ><h6>Username:</h6></label><br>
                                <input type="text" name="username" id="username" class="form-control" required autocomplete="off" autofocus>
                            </div>
                            <div class="form-group">
                                <label for="password" ><h6>Password:</h6></label><br>
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
                        <form class="form" action="<?php $_SERVER['PHP_SELF'];?>" method="post">
							<div><h3 align="center">Library System Login</h3></div>
                            <div class="form-group">
                                <label for="username" ><h6>Username:</h6></label><br>
                                <input type="text" name="username" id="username" class="form-control" required autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="password" ><h6>Password:</h6></label><br>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="login" class="btn btn-info btn-md" value="Login">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>
</html>