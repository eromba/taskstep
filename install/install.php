<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" xml:lang="en">
<head>
<link rel="stylesheet" type="text/css" href="install-style.css" />
<title>Install TaskStep</title>
</head>
<body>

<div id="installcontainer"><div>
<h1><img src="../images/install-icon.png" alt="" style="vertical-align:middle"/>&nbsp;TaskStep: Install</h1>

<!-- Install script for TaskStep -->

<p>Creating items table...</p>

<!-- Create the database -->

<?php
include("../config.php");
mysql_connect($server,$user,$password);
mysql_select_db($db);

$success = '<div class="success"><img src="../images/database_go.png" alt="" />&nbsp;';
$failure = '<div class="error"><img src="../images/database_error.png" alt="" />&nbsp;';
$failed = false;

$sql='CREATE TABLE `items` ( `id` int( 11 ) NOT NULL AUTO_INCREMENT ,'
   . ' `title` text NOT NULL ,'
   . ' `date` DATE NOT NULL ,'
   . ' `section` text NOT NULL ,'
   . ' `notes` text NOT NULL ,'
   . ' `url` text NOT NULL ,'
   . ' `done` TINYINT DEFAULT "0" NOT NULL ,'
   . ' `context` text NOT NULL ,'
   . ' `project` text NOT NULL ,'
   . ' PRIMARY KEY ( `id` ) ,'
   . ' KEY `id_2` ( `id` ) ) TYPE = MYISAM '; 
if(mysql_query($sql)) echo $success.'Items table created successfully</div>' . "\n";
else 
{
   echo $failure.'Failed to create items table. The error was: <b>' . mysql_error() . '</b></div>' . "\n";
   $failed = true;
}
?>

<p>Creating contexts table...</p>

<!-- Create the contexts -->

<?php
$sql='CREATE TABLE `contexts` ( `id` int( 11 ) NOT NULL AUTO_INCREMENT ,'
   . ' `title` text NOT NULL ,'
   . ' PRIMARY KEY ( `id` ) ,'
   . ' KEY `id_2` ( `id` ) ) TYPE = MYISAM '; 
if(mysql_query($sql)) echo $success.'Contexts table created successfully</div>' . "\n";
else 
{
   echo $failure.'Failed to create contexts table. The error was: <b>' . mysql_error() . '</b></div>' . "\n";
   $failed = true;
}
?>

<p>Creating sections table...</p>

<!-- Create the sections -->

<?php
$sql='CREATE TABLE `sections` ( `id` int( 11 ) NOT NULL AUTO_INCREMENT ,'
   . ' `title` text NOT NULL ,'
   . ' `fancytitle` text NOT NULL ,'
   . ' PRIMARY KEY ( `id` ) ,'
   . ' KEY `id_2` ( `id` ) ) TYPE = MYISAM '; 
if(mysql_query($sql)) echo $success.'Sections table created successfully</div>' . "\n";
else 
{
   echo $failure.'Failed to create sections table. The error was: <b>' . mysql_error() . '</b></div>' . "\n";
   $failed = true;
}
?>

<p>Creating projects table...</p>

<!-- Create the projects -->

<?php
$sql='CREATE TABLE `projects` ( `id` int( 11 ) NOT NULL AUTO_INCREMENT ,'
   . ' `title` text NOT NULL ,'
   . ' PRIMARY KEY ( `id` ) ,'
   . ' KEY `id_2` ( `id` ) ) TYPE = MYISAM '; 
if(mysql_query($sql)) echo $success.'Projects table created successfully</div>' . "\n";
else 
{
   echo $failure.'Failed to create projects table. The error was: <b>' . mysql_error() . '</b></div>' . "\n";
   $failed = true;
}
?>

<p>Creating settings table...</p>

<!-- Create the settings -->

<?php
$sql='CREATE TABLE `settings` ( `id` int( 11 ) NOT NULL AUTO_INCREMENT ,'
   . ' `setting` text NOT NULL ,'
   . ' `value` text NOT NULL ,'
   . ' PRIMARY KEY ( `id` ) ,'
   . ' KEY `id_2` ( `id` ) ) TYPE = MYISAM '; 
if(mysql_query($sql)) echo $success.'Settings table created successfully</div>' . "\n";
else 
{
   echo $failure.'Failed to create settings table. The error was: <b>' . mysql_error() . '</b></div>' . "\n";
   $failed = true;
}
?>

<p>Setting defaults and creating sample items...</p>

<!-- Create the sample items -->

<?php
//Introduce the sample data as variables:
$title = 'Sample task';
$date = '2007-08-27';
$section = 'ideas';
$notes = 'Notes';
$url = 'http://www.cunningtitle.com';
$done = '0';
$context = 'SampleContext';
$project = 'SampleProject';
$tips = '1';

$secure_password = md5("taskstep");
$salt = substr(uniqid(rand(), true), 0, 5);
$total = $secure_password.$salt;

//Insert the values into the correct database with the right fields
//mysql table = news
//table columns = id, title, message, who, date, time
//post variables = $title, $message, '$who, $date, $time

if(mysql_query("INSERT INTO items (id,title,date,section,notes,url,done,context,project)".
      "VALUES ('NULL', '$title', '$date', '$section', '$notes', '$url', '$done', '$context', '$project')")
	  AND mysql_query("INSERT INTO contexts (id,title)".
      "VALUES ('NULL', 'SampleContext')")
	  AND mysql_query("INSERT INTO projects (id,title)".
      "VALUES ('NULL', 'SampleProject')")
	  AND mysql_query("INSERT INTO sections (id,title,fancytitle)".
      "VALUES ('NULL', 'ideas', 'Ideas'),('NULL', 'tobuy', 'Might want to buy'),('NULL', 'immediate', 'Immediate'),('NULL', 'week', 'This week'),('NULL', 'month', 'This month'),('NULL', 'year', 'This year'),('NULL', 'lifetime', 'Some day maybe')")
      AND mysql_query("INSERT INTO settings (id,setting,value)".
      "VALUES ('NULL', 'tips', '$tips'),('NULL', 'style', 'default.css'),('NULL', 'password', '$total'),('NULL', 'salt', '$salt'),('NULL', 'sessions', '1')")){
	    echo '<div class="success"><img src="../images/table_go.png" alt="" />&nbsp;Sample data inserted successfully</div><br />';
	    echo '<div class="success"><img src="../images/shield.png" alt="" />&nbsp;<b>Important!</b> The default password is "taskstep" (without the quotes). Change this as soon as possible.</div>';
	}
else{
	echo '<div class="error"><img src="../images/table_error.png" alt="" />&nbsp;Failed to insert data. The error given was: <b>' . mysql_error() . "</b></div>\n";
	$failed = true;
}

if (!$failed) echo '<p style="font-size: 12pt; text-align: center;">TaskStep is ready to use! <a href="../index.php">Go to your lists</a></p>';
else echo '<p>A problem has been encountered during the installation process. You can ask for assistance at the <a href="http://cunningtitle.com/forum/">support forums</a>. Please give the details of any problems, quoting the bits above. If there are any bits in bold in the red boxes then you must quote them in order for us to help you.</p>'; 

include('../includes/footer.php');
?>