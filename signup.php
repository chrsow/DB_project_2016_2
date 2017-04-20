<?php
	include("config.php");
	
	if (!$db) {
		die('Could not connect: ' . mysql_error());
	}
	if(isset($_POST['submit'])){
		$username = mysqli_real_escape_string($db,$_POST['username']);
		$password = mysqli_real_escape_string($db,$_POST['password']); 
		$name = mysqli_real_escape_string($db,$_POST['name']);
		$studentID = (int)mysqli_real_escape_string($db,$_POST['studentID']);
 
		$sql = "SELECT * from users WHERE username = '$username' and password = '$password'";
		$result = mysqli_query($db,$sql);
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		
		$count = mysqli_num_rows($result);
		
		// Username Exist
		if($count===1){
			echo "This user already Exist";
		}
		
		$query = mysqli_query($db, "INSERT INTO users (username, password, name,studentID)VALUES ('$username', '$password', '$name','$studentID')");
		
		if($query){
			echo "Sign up Successful :)";
			header("location: login.php");
		}
	}	
?>



<form action="signup.php" method="POST">
	<input type="text" name="username" placeholder="username">
	<input type="password" name="password" placeholder="password">
	<input type="text" name="name" placeholder="name">
	<input type="text" name="studentID" placeholder="student id">
	<input type="submit" name="submit" value="Signup">
</form>