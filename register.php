<?php
// connect to the database
require 'inc/connect.php';
if (isset($_POST['register'])) {
  # code...
  // receive all input values from the form
  $username = mysqli_real_escape_string($con, $_POST['username']);
  $email = mysqli_real_escape_string($con, $_POST['email']);
  $password = mysqli_real_escape_string($con, $_POST['password']);
  $fname = mysqli_real_escape_string($con, $_POST['fname']);
  $mobile = mysqli_real_escape_string($con, $_POST['mobile']);
  $ip= $_SERVER['REMOTE_ADDR'];
  $d=date("Y-m-d H:i:s",time());
  $d10=date("Y-m-d H:i:s",time()-864000);
  $password = md5($password);
  $sql = "CREATE TABLE ".$username."(
          id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
          user1_id VARCHAR(30) NOT NULL,
          user2_id VARCHAR(30) NOT NULL,
          user_msg VARCHAR(70) NOT NULL,
          time VARCHAR(70) NOT NULL,
          chatid VARCHAR(70) NOT NULL,
          read2 VARCHAR(70) NOT NULL
      )";
  $base = mysqli_query($con,$sql) or die("ERROR: Could not connect. " . mysqli_connect_error());
  $query = "INSERT INTO users (username, email, password, fname, mobile, ip, date) 
          VALUES('$username', '$email', '$password', '$fname', '$mobile', '$ip', '$d')";
    mysqli_query($con, $query);
    if ($query) {
      $_SESSION['user'] = $username;
      header("location: login.php");
    }
   
}
?>
<!DOCTYPE html>
<html>
	<head>  <meta charset="utf-8">
  		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  		<title>IM - The Simplest Chat Platform</title>
  		<meta name="description" content="#">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
		<link rel="stylesheet" type="text/css" href="dist/css/style.css">
	</head>
	<body>
		<div class="login">
			<h1>Login</h1>
			<form action="" method="post">
				<label for="username">
					<i class="fas fa-user"></i>
				</label>
				<input type="text" name="username" placeholder="Username" id="username" required>
				<label for="password">
					<i class="fas fa-users"></i>
				</label>
				<input type="text" name="fname" placeholder="Full Name" id="username" required>
				<label for="password">
					<i class="fas fa-envelope"></i>
				</label>
				<input type="text" name="email" placeholder="Email" id="username" required>
				<label for="password">
					<i class="fas fa-phone"></i>
				</label>
				<input type="number" name="mobile" placeholder="Mobile No." id="username" required>
				<label for="password">
					<i class="fas fa-lock"></i>
				</label>
				<input type="password" name="password" placeholder="Password" id="password" required>
				<input type="submit" name="register" value="Login">
			</form>
			<div style="text-align: center;">
			<p>Already a Menber <a href="login.php">Login</a></p>
		</div>
		<br>
		</div>
	</body>
</html>