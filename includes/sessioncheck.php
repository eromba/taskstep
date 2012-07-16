<?php
//Allow sessions
session_start();  
header("Cache-control: private");

//Include the configuration
include("config.php");

//Connect and select the database
mysql_connect($server,$user,$password);
mysql_select_db($db);

//Grab the setting for "sessions"
$result = mysql_query("SELECT * FROM settings WHERE setting='sessions'");

//Select the results of the query in the format (query,row,column)
$r = mysql_result($result,0,2);

//If sessions are enabled...
if($r == '1'){
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
?>