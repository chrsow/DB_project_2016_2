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
		if(isset($_POST['sqli'])){
			include("includes/sqli_login.php");
		}else{
			include("includes/safe_login.php");
		}
		
	}
?>

<head>
	<link rel="stylesheet" href="css/semantic.css" type="text/css" />
	<link rel="stylesheet" href="css/main.css" type="text/css" />
 	<meta charset="utf-8"/> 
	<script
		src="https://code.jquery.com/jquery-3.1.1.min.js"
		integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
		crossorigin="anonymous"></script>
	<script src="js/semantic.js"></script>

	<style type="text/css">
		body {
			/* background-color: #DADADA; */
			position: center;
			/*background-image:url("img/jiufern.jpg");
			background-size: 100% 100%;
    		background-repeat: no-repeat;
			z-index: 1;
			*/
			background-color: #ccc;
			z-index: 2;
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
					<h3> ระบบฐานข้อมูลนิสิตจุฬา </h3>
					<input type="text" name="username" placeholder="รหัสอาจารย์/ผุ้บริหาร/เจ้าหน้าที่">
				</div>
				<div class="field">
					<input type="password" name="password" placeholder="รหัสผ่าน">
				</div>
				<button class="ui button" type="submit">เข้าสู่ระบบ</button>
				
				<div id="sqli_slider" class="ui fitted slider checkbox">
					<input name="sqli" type="checkbox"><label></label>
				</div>

			</form>
		</div>
	</div>

</body>