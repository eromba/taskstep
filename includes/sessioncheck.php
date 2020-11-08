<?php
//Allow sessions
session_start();  
header("Cache-control: private");

//Include the configuration
include("config.php");

//Connect and select the database
$mysqli = new mysqli($server, $user, $password, $db);
if ($mysqli->connect_error) {
	die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}

//Grab the setting for "sessions"
$result = $mysqli->query("SELECT value FROM settings WHERE setting='sessions'");
if ($result->num_rows > 0)
{
	//Select the results of the query in the format (query,row,column)
	$r = $result->fetch_row();

	//If sessions are enabled...
	if ($r[0] == '1')
	{
	  //and there is no session for "loggedin"...
		if(!$_SESSION['loggedin'])
		{
			//...send them packing to the login page
			$host  = $_SERVER['HTTP_HOST'];
			$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
			$extra = 'login.php';
			session_write_close();
			header("Location: http://$host$uri/$extra");
			exit;
		}
	}
}
?>