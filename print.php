<?php
include("includes/sessioncheck.php");
include("config.php");
include("lang/".$language.".php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>TaskStep - <?php echo $l_print_commontitle; ?></title>
<link rel="stylesheet" type="text/css" href="styles/system/print-style.css" />
</head>
<body>
<!--Open container-->
<div id="container">
<?php
$print = (isset($_GET['print'])) ? $_GET['print'] : '';

switch ($print)
{
case 'section':
	//Long if elseif statement to determine what section to display
	//This means only one file is used to display the section, rather than several individual ones
	// Modified by Cord
	// --28/8/07--
	foreach($l_sectionlist as $k=>$v)
	{
		$l_sectionlistkeys[]=$k;
	}
	if(isset($_GET["section"]) && in_array($_GET["section"],$l_sectionlistkeys))
	{
	  $currentsection=$_GET["section"];
	  $title=$l_sectionlist[$_GET["section"]];
	}
	else
	{
	  echo "<div class='error'><img src='images/exclamation.png' alt='' /> $l_print_sectionnotfound </div>";
	}
	$result = $mysqli->query("SELECT * FROM items WHERE section='$currentsection' ORDER BY date");	//select the table
break;
case 'project':
case 'context':
	$tid = $_GET["id"];
	$idresult = $mysqli_query("SELECT title FROM {$print}s WHERE id='$tid'");	//Select the row
	$title = $idresult->fetch_row()[0];
	$result = $mysqli->query("SELECT * FROM items WHERE $print='$title' ORDER BY date");	//select the table
break;
case 'all':
	$title = $l_print_printalltasks;
	$result = $mysqli->query("SELECT * FROM items ORDER BY done,title");	//select the table
break;
case 'today':
	$fancytoday = date("jS M Y");
	$title = "$l_print_printtoday ($fancytoday)";
	$today = date("Y-m-d");
	$result = $mysqli->query("SELECT * FROM items WHERE date='$today ORDER BY done,title");	//select the table
break;
}

echo "<h1>$title</h1>\n";

if(!isset($cmd))	//If cmd is not set
{
	echo"<ul>";
	//grab all the content
	while($r=$result->fetch_array())
	{
	   //the format is $variable = $r["nameofmysqlcolumn"];

		$title=htmlentities($r["title"]);
		$date = ($r["date"] != 00-00-0000) ? $r["date"]." | " : '';
		$notes=htmlentities($r["notes"]);
		$url=htmlentities($r["url"]);
		$done=$r["done"];
		$id=$r["id"];
		$context=htmlentities($r["context"]);
		$project=htmlentities($r["project"]);

	   //nested if statement
	   //display the row

	   //if the action is marked as done, then do not apply any current or old markings to it
	    echo "<li>$title<br />\n";
		echo "$date$context<br />\n";
		echo "$url</li>\n";
	}
	echo"</ul>\n";
}
?>
<!--Close container-->
</div>
</body>
</html>