<?php
	function playSafe($db,$input){
		$input = mysqli_real_escape_string($db,$input);
		$input = htmlentities($input);
		return $input;	
	}
?>