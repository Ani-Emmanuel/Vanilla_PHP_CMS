<?php 

$db['hostname'] = "localhost";
$db['username'] = "root";
$db['password'] = "dovelylove";
$db['dbname']   = "cms";

foreach ($db as $key => $value) {
	define(strtoupper($key), $value);
}

$con = mysqli_connect(HOSTNAME,USERNAME,PASSWORD,DBNAME);
if (!$con) {
	die("Could not connect to database".mysqli_error($con));
}


?>