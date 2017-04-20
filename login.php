<?php
	include("config.php");
	session_start();
	
	// For security reason :)
	function playSafe($db,$input){
		$input = mysqli_real_escape_string($db,$input);
		$input = htmlentities($input);
		return $input;	
	}
	
	if (!$db) {
		die('Could not connect: ' . mysql_error());
	}
	
	if(isset($_POST['username']) && isset($_POST['password'])){
		//// SQLi Testing /////
		//$username=mysqli_real_escape_string($_POST['username']);
		//$password=mysqli_real_escape_string($_POST['password']);
		
		//$username = playSafe($db,$_POST['username']);
		//$password = playSafe($db,$_POST['password']); 
		
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		$sql = "SELECT * from user WHERE username = '$username' AND password = '$password'";
		///////////////////////

		$result = mysqli_query($db,$sql);
		$row =  mysqli_fetch_array($result,MYSQLI_ASSOC);
		$active = $row['active'];		
		
		$count = mysqli_num_rows($result);

		// If result matched $myusername and $mypassword, table row must be 1 row
		if($count === 1) {		
			//session_register("username"); //Depreciated 
			$_SESSION['login_user'] = $username;
			 
			header("location: user.php");
		}else {
			$error = "Your Login Name or Password is invalid";
			//echo $error;//Close to become Blind SQLi
		}
		
	}
?>

<head>
	<link rel="stylesheet" href="stylesheets/main.css" type="text/css" />
</head>

<body>
	<form class="form" action="login.php" method="POST">
		<div class="frame">
			<h1> SQL injection </h1>
			<input type="text" placeholder="Username" name="username">  
			<input type="password" placeholder="password" name="password">  
			<a href="#" class="forgot">forgot password?</a>
			<input type="submit" value="Sign In">
		</div>
	</form>

</body>