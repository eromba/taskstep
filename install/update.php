<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" xml:lang="en">
<head>
<link rel="stylesheet" type="text/css" href="install-style.css" />
<title>Update TaskStep</title>
</head>

<body>

<div id="installcontainer"><div>
<h1><img src="../images/install-icon.png" alt="" style="vertical-align:middle" />&nbsp;TaskStep: Update</h1>

<?php
include("../config.php");
$mysqli = new mysqli($server, $user, $password, $db);
if ($mysqli->connect_errno) {
   die("Connection error: " . $mysqli->connect_error);
}

$success = "<div class='success'><img src='../images/table_go.png' alt='' />&nbsp;Update successful</div>\n";
$failure = '<div class="error"><img src="../images/table_error.png" alt="" />&nbsp;Looks like there was a problem updating the database. Check your settings. The error was: <b>';
$failed = false;

if (isset($_POST['submit']))
{
	switch ($_POST['version'])
	{
	case '0.1':
		echo '<p>0.2 Update - Change "Lifetime" section to "Some day maybe"</p>';
		$sql="UPDATE sections SET fancytitle='Some day maybe' WHERE title='lifetime'"; 
		if ($mysqli->query($sql)) echo $success;
		else
		{
			echo $failure  . $mysqli->error . "</b></div>\n";
			$failed = true;
		}
	case '0.2':
		echo '<p>0.3 Update - Add Stylesheet column to settings</p>';
		$sql1 = 'ALTER TABLE `settings` CHANGE `value` `value` TEXT NOT NULL';
		$sql2 = "INSERT INTO settings (id,setting,value) VALUES ('NULL', 'style', 'none')";
		if ($mysqli->query($sql1) && $mysqli->query($sql2)) echo $success;
		else
		{
			echo $failure  . $mysqli->error . "</b></div>\n";
			$failed = true;
		}
	case '0.3':
		$secure_password = md5("taskstep");
		$salt = substr(uniqid(rand(), true), 0, 5);
		$total = $secure_password.$salt;
		echo '<p>0.4 Update - Add password settings</p>';
		$sql1 = "INSERT INTO settings (id,setting,value) VALUES ('NULL', 'password', '$total')";
		$sql2 = "INSERT INTO settings (id,setting,value) VALUES ('NULL', 'salt', '$salt')";
		$sql3 = "INSERT INTO settings (id,setting,value) VALUES ('NULL', 'sessions', '1')";
		if ($mysqli->query($sql1) && $mysqli->query($sql2) && $mysqli->query($sql3)) echo $success;
		else
		{
			echo $failure  . $mysqli->error . "</b></div>\n";
			$failed = true;
		}
	case '0.4':
	case '0.5':
	case '0.6':
	case '1.0 alpha':
		echo '<p>1.0 Update - Change default stylesheet</p>';
		$sql = "UPDATE settings SET value='default.css' WHERE setting='style'";
		if ($mysqli->query($sql)) echo $success;
		else
		{
			echo $failure  . $mysqli->error . "</b></div>\n";
			$failed = true;
		}
	break;
	}
	if (!$failed) echo '<p style="font-size: 12pt; text-align: center;">TaskStep is ready to use! <a href="../index.php">Go to your lists</a></p>';
	else echo '<p>A problem has been encountered during the update process. You can ask for assistance at the <a href="http://cunningtitle.com/forum/">support forums</a>. Please give the details of any problems, quoting the bits above. If there are any bits in bold in the red boxes then you must quote them in order for us to help you.</p>'; 
}
else
{?>
	<form action="update.php" method="post">
	<div style="text-align: center;">
	<p>Please select the TaskStep version that you are upgrading from:</p>
	<select name="version">
		<option value="0.1">v0.1</option>
		<option value="0.2">v0.2</option>
		<option value="0.3">v0.3</option>
		<option value="0.4">v0.4</option>
		<option value="0.5">v0.5</option>
		<option value="0.6">v0.6</option>
		<option value="1.0 alpha">v1.0 alpha</option>
	</select>
	<input type="submit" name='submit' value="Submit" />
	</div>
	</form>
<?php
}

include('../includes/footer.php');
?>