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
		/// ===== With real_escape_string ===== ///
		/*
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
		*/

		///===== With Prepare Statement ===== ///
		// Create connection
		//$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
		try{
			$DB_SERVER = DB_SERVER;
			$DB_DATABASE = DB_DATABASE;
			$pdo = new PDO("mysql:host=$DB_SERVER;dbname=$DB_DATABASE", DB_USERNAME, DB_PASSWORD);
		}catch (PDOException $e) {
			// Check connection
    		echo 'Connection failed: ' . $e->getMessage();
		}
		 
		// prepare and bind
		$stmt = $pdo->prepare("SELECT * from user WHERE username = :username AND password = :password");
		$stmt->bindParam(":username", $username);
		$stmt->bindParam(":password", $username);

		$username = $_POST['username'];
		$password = $_POST['password'];

		//execute stmt (call the stored procedure)
		$stmt->execute();
	
		//result will be checkd here
		foreach ($stmt as $row) {
    		// do something with $row
				$_SESSION['login_user'] = $username;
				header("location: user.php");
		}	
		
		// let PDO know it can close the conn
		$pdo = null;
		
		
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