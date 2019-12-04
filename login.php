<?php
	session_start();
	if (isset($_SESSION["user"])) {
		header("location: index.php");
	}
			include 'inc/connect.php';
	// 		if (isset($_POST["login"])) {
	// 			$username = $_POST["username"];
	// 			$password = md5($_POST["password"]);

	// 			$query = mysqli_query($db, "SELECT * FROM users WHERE username= '$username' AND password = '$password' ") or die();
	// 			if (!$result = mysqli_fetch_assoc($query)) {
	// 				echo ' <h3 style="text-align : center;">User Not Found</h3>';
	// 			}else{
	// 		          $user_id = $result['id'];
	// 		          $fname = $result['fname'];
	// 		          $username = $result['username'];
	// 		          $image = $result['image'];
	// 		          $_SESSION['user_id'] = $user_id;
	// 		          date_default_timezone_get();
	// 		          $time = date('h:i:sa');
	// 				$_SESSION["user"] = $result["fname"];
	// 				$_SESSION["username"] = $result["username"]; 
	// 				$ss = mysqli_query($db, "SELECT * FROM session WHERE user_id='$user_id'");
	// 				if ($s = mysqli_fetch_assoc($ss)) {
	// 					mysqli_query($db, "UPDATE session SET username = '$username', fname = '$fname', image = '$image', status = 'online', time = '$time' WHERE user_id = '$user_id'");
	// 				echo "<script>window.alert('User found, Click to login')</script>";
	// 				echo "<script>window.location.href='index.php'</script>";
	// 				}else{
 //            mysqli_query($db, "INSERT INTO session(user_id, username, fname, image, time) VALUES('$user_id','$username', '$fname', '$image', '$time')") or die();
	// 				echo "<script>window.alert('User found, Click to login')</script>";
	// 				echo "<script>window.location.href='index.php'</script>";
					
	// 			}
	// 		}
	// 	}
$message = '';
if(isset($_POST['login']))
{
	$username = trim($_POST['username']);
	$password = trim(md5($_POST['password']));
	$data = array(':username' => $username, ':password' => $password);
	$sql = "SELECT * FROM users WHERE username= '$username' AND password = '$password' ";
	$stmt = $db->prepare($sql);
	$stmt->execute($data);
	$res = $stmt->fetch();
	if (!$res) {
		$message = 'User Not Found';
		// echo ' <h3 style="text-align : center;"></h3>';
	}else{
		$user_id = $res->id;
		$fname = $res->fname;
		$username = $res->username;
        $image = $res->image;
	    $_SESSION['user_id'] = $user_id;
		$time = date('h:i:sa');
		$_SESSION["user"] = $res->fname;
		$_SESSION["username"] = $res->username;
		$sqli = "SELECT user_id FROM session WHERE user_id='$user_id'";
		$stm = $db->prepare($sqli);
		$stm->execute([$user_id]);
		$row = $stm->fetch();
		// $uid = $row->user_id;
		$dat = array(':user_id' => $user_id, ':username' => $username, ':fname' => $fname, ':image' => $image,':time' => $time );
		if ($row) {
			$sqlii = "UPDATE session SET username = '$username', fname = '$fname', image = '$image', status = 'online', time = '$time' WHERE user_id = '$user_id'";
			$stmi = $db->prepare($sqlii);
			$stmi->execute();
			echo "<script>window.alert('User found, Click to login')</script>";
			echo "<script>window.location.href='index.php'</script>";
		 }else{
		 	$query = "INSERT INTO session(user_id, username, fname, image, time) VALUES('$user_id','$username', '$fname', '$image', '$time')";
		 	$stat = $db->prepare($query);
		 	if ($stat->execute($dat)) {
		 		echo "<script>window.alert('User found, Click to 	login')</script>";
		 	echo "<script>window.location.href='index.php'</script>";
		 	}else{
		 		echo"error inerstng";
		 	}
		 	
		 }
		echo "<script>window.alert('error, Click to 	continue')</script>";
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
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	</head>
	<body>
		<div class="login">
			<h1>Login</h1>
								<p style="text-align: center;" class="text text-danger"><?php echo $message; ?></p>
			<form action="" method="post">
				<label for="username" class="btn-danger">
					<i class="fas fa-user"></i>
				</label>
				<input type="text" name="username" placeholder="Username" id="username" required>
				<label for="password" class="btn-danger">
					<i class="fas fa-lock"></i>
				</label>
				<input type="password" name="password" placeholder="Password" id="password" required>
				<input class="btn-danger" type="submit" name="login" value="Login">
			</form>
		<div style="text-align: center;">
			<p class="text-muted mt-2">Not Yet a Menber  <a class="text-danger" href="register.php">Register</a></p>
		</div>
		<br>
		</div>
	</body>
</html>