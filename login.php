<?php
	include("includes/config.php");	
	include("includes/security.php");

	session_start();
	
	//If user already login
	if(isset($_SESSION['login_user'])){
		header("location: home.php");
	}

	//If there is error on db conn
	if (!$db) {
		die('Could not connect: ' . mysql_error());
	}
	
	if(isset($_POST['username']) && isset($_POST['password'])){
		/// ===== With real_escape_string ===== ///
		/*
		//// SQLi Testing /////
		//$username=mysqli_real_escape_string($_POST['username']);
		//$password=mysqli_real_escape_string($_POST['password']);
		
		$username = playSafe($db,$_POST['username']);
		$password = playSafe($db,$_POST['password']); 
		
		//$username = $_POST['username'];
		//$password = $_POST['password'];
		

		$sql = "SELECT * from user WHERE username = '$username' AND password = '$password'";
		///////////////////////

		$result = mysqli_query($db,$sql);
		$row =  mysqli_fetch_array($result,MYSQLI_ASSOC);
		
		//$active = $row['active'];		
		
		$count = mysqli_num_rows($result);

		// If result matched $myusername and $mypassword, table row must be 1 row
		if($count === 1) {		
			//session_register("username"); //Depreciated 
			$_SESSION['login_user'] = $username;
			 
			header("location: home.php");
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
    		die("Connection failed: " . $e->getMessage());
		}
		 
		// prepare and bind
		$stmt = $pdo->prepare("SELECT * FROM user WHERE username = :username AND password = :password");
		$stmt->bindParam(":username", $username);
		$stmt->bindParam(":password", $password);

		$username = playSafe($db, $_POST['username']);
		$password = playSafe($db, $_POST['password']);

		//execute stmt (call the stored procedure if existing one)
		$stmt->execute();
	
		//result will be checkd here
		foreach ($stmt as $row) {
    		// do something with $row
				$_SESSION['login_user'] = $username;
				header("location: home.php");
		}	

		// let PDO know it can close the conn
		$pdo = null;	
		
	}
?>

<head>
	<link rel="stylesheet" href="css/semantic.css" type="text/css" />
	<link rel="stylesheet" href="css/main.css" type="text/css" />
	<script
		src="https://code.jquery.com/jquery-3.1.1.min.js"
		integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
		crossorigin="anonymous"></script>
	<script src="js/semantic.js"></script>

	<style type="text/css">
		body {
			/* background-color: #DADADA; */
			position: center;
			back
		}
	</style>
</head>

<body>
	<!--
	<form class="form" action="login.php" method="POST">
		<div class="frame">
			<h1> SQL Login </h1>
			<input type="text" placeholder="Username" name="username">  
			<input type="password" placeholder="password" name="password">  
			<a href="#" class="forgot">forgot password?</a>
			<input type="submit" value="Sign In">
		</div>
	</form>
	-->

	
	<div id="login" class="ui middle aligned center">
  		<div class="column">
			<img src="img/logo_login.png"/>
			<form id="form" class="ui form center middle aligned" action="login.php" method="POST">
				<div class="field">
					<h1> Login </h1>
					<input type="text" name="username" placeholder="Username">
				</div>
				<div class="field">
					<input type="password" name="password" placeholder="Password">
				</div>
				<button class="ui button" type="submit">Login</button>
			</form>
		</div>
	</div>

</body>