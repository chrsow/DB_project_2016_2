<?php
   include('session.php');
?>

<html>
   
   <head>
      <title>Welcome </title>
	  <link rel="stylesheet" href="stylesheets/main.css" type="text/css" />
   </head>
   
   <body>
		<div class="frame">
			<h1>Welcome <?php echo $login_session; ?></h1> 
			<h1><a href = "logout.php">Sign Out</a></h1>
		</div>
   </body>
	
</html>