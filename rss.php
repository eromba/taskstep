<?php
Header('Content-type: text/xml');

//Same as bookmarklet code
$dirstuff = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']);
$full = "http://".$_SERVER['HTTP_HOST'].$dirstuff;
?>
<?xml version="1.0"?>
<rss version="2.0">
	<channel>
		<title>TaskStep</title>
		<link><?php echo $full ?></link>
		<description>TaskStep Items Feed</description>
		<language>en-us</language>
		<generator>IceMelon RSS Feeder</generator>
<?php
include("config.php");
include("includes/functions.php");

connect();

$result = $mysqli->query("SELECT * FROM items");

while ($r=$result->fetch_assoc())
{
	$title=htmlentities($r["title"]);
	$date = ($r["date"] != 00-00-0000) ? $r["date"]." | " : '';
	$notes=htmlentities($r["notes"]);
	$url=htmlentities($r["url"]);
	$done=$r["done"];
	$id=$r["id"];
	$context=htmlentities($r["context"]);
	$project=htmlentities($r["project"]);

	$rssnotes = ($notes != "") ? " | ".$notes : '';

	echo "\t\t<item>\n";
	echo "\t\t\t<title>".$title."</title>\n";
	echo "\t\t\t<link>".$full."edit.php?id=".$id."</link>\n";
	echo "\t\t\t<description>".$date.$project." | ".$context.$rssnotes."</description>\n";
	echo "\t\t</item>\n";
}?>
	</channel>
</rss>
