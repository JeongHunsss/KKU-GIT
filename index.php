<?php
	if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
		$uri = 'https://';
	} else {
		$uri = 'http://';
	}
	$uri .= $_SERVER['HTTP_HOST'];
	header('Location: '.$uri.'/KKU-GIT/login/login.php');
	exit;
?>
<<<<<<< HEAD
Something is wrong with the XAMPP installation :-(
	<!--- test10--->
=======
>>>>>>> PJH
