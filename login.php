<?php
session_start();

include("config.php");
include("includes/functions.php");

$mysqli = connect();

$failed = false;

if (isset($_POST["submit"]))
{
	$result = $mysqli->query("SELECT setting,value FROM settings WHERE setting='password' OR setting='salt'");
	while($r=$result->fetch_assoc())
	{
		$setting[$r['setting']] = $r['value'];	//Build a multi-dimensional array containing the returned rows
	}
	
	$given = $_POST["password"];
	$secured = md5($given);
	$total = $secured.$setting['salt'];
	if ($total == $setting['password'])
	{
		$_SESSION["loggedin"] = true;
		$host  = $_SERVER['HTTP_HOST'];
		$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$extra = 'index.php';
		session_write_close();
		header("Location: http://$host$uri/$extra");
		exit;
	}
	else
	{
		$failed = true;
		$_SESSION["loggedin"] = false;
	}
}
else if (isset($_GET["action"])) $_SESSION['loggedin'] = false;	//If "action" is set, log out

//if($_SESSION['loggedin'] == true)
//{
//  echo "You're already logged in! Either <a href='logout.php'>logout</a> or continue to the <a href='index.php'>main page.</a>";
//}

header("Cache-control: private");
include("lang/".$language.".php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>TaskStep - Login</title>
<?php stylesheet() ?>
</head>

<body>

<!--Open container-->
<div id="container">
<?php
$result = $mysqli->query("SELECT * FROM settings WHERE setting='sessions'");

while($r3=$result->fetch_array())
{
  $sessionssetting = $r3["value"];
}
?>
<div id="loginbox">
<h1><img src="images/icon.png" alt="" /> TaskStep</h1>
<?php if($sessionssetting == '1'){ ?>
<p><img src="images/shield.png" alt="" />&nbsp;<?php echo $l_login_l1; ?></p>
<form action="login.php" method="post">
<p>
<input type="password" name="password" />&nbsp;
<input type="text" style="display: none;" />	<!--IE workaround: pressing "enter" will submit the form-->
<input type="submit" name="submit" value="<?php echo $l_login_button; ?>" /></p>
</form> <?php }
else{ ?>
  <p><img src="images/shield_error.png" alt="" />&nbsp;<?php echo $l_login_l5; ?></p>
<form action="login.php" method="post">
<p><input type="password" disabled="disabled" name="password" /> <input type="submit" disabled="disabled" name="submit" value="<?php echo $l_login_button; ?>" /></p>
</form>
<p><a href='index.php'><?php echo $l_login_l3; ?></a></p>
<?php }

//Uncomment the next line for session debugging
//echo $_SESSION["loggedin"];

if ($failed) echo "<p><img src='images/cross.png' alt='' /> ".$l_login_l4."</p>";
?>

<span class="securityinfo">TaskStep login system version 1.0</span>

<?php include('includes/footer.php') ?>