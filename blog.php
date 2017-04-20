<?php
	include("config.php");
	
	function renderBlog($row){
		echo '<div class="frame">';
		echo '<h1>'.$row["title"].'</h1>';
		echo '<p>'.$row["description"].'</p>';
		echo '</div>';		
	}
	
	if(isset($_GET['id'])){
		$blogID = $_GET['id'];//mysqli_real_escape_string($db,$_GET['id']);//
		$sql = "SELECT * from blog WHERE id = $blogID";
		$result = mysqli_query($db,$sql);
		$row =  mysqli_fetch_array($result,MYSQLI_ASSOC);	
		
		renderBlog($row);
	}else{
			
		$sql = "SELECT * FROM blog ORDER BY id";
		$result = mysqli_query($db,$sql);

		while ($row = mysqli_fetch_assoc($result)) {
			renderBlog($row);
		}
	}
?>
<head>
	<link rel="stylesheet" href="stylesheets/main.css" type="text/css" />
</head>
<body>

</body>