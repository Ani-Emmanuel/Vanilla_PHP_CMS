<?php 
include 'db.php';
session_start();

if (isset($_POST['login'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];

	$username = mysqli_real_escape_string($con,$username);
	$password = mysqli_real_escape_string($con,$password);

	$login_query = "SELECT * FROM users WHERE username = '{$username}' ";
	$login_result = mysqli_query($con,$login_query);

	while ($row = mysqli_fetch_array($login_result)) {
		$user_firstname = $row['user_firstname'];
		$user_lastname = $row['user_lastname'];
		$db_username = $row['username'];
		$user_password = $row['user_password'];
		$user_role = $row['user_role'];
	}

	if ($username !== $db_username && $password !== $user_password) {

		header("Location: ../index.php");
	} 
	else if ($username == $db_username && $password == $user_password) {
		$_SESSION['username'] = $db_username;
		$_SESSION['user_firstname'] = $user_firstname;
		$_SESSION['user_lastname'] = $user_lastname;
		$_SESSION['user_role'] = $user_role;

		header("Location: ../Admin");

	}
	else{
		header("Location: ../index.php");
	}
}





























 ?>