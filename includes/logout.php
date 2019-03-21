<?php session_start(); ?>
<?php 


    	$_SESSION['username'] = session_destroy();
		$_SESSION['firstname'] = session_destroy();
		$_SESSION['lastname'] = session_destroy();
		$_SESSION['userrole'] = session_destroy();


		header("Location: ../index.php");
 ?>