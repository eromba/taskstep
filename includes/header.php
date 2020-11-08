<?php
include("sessioncheck.php");	//Initialize DB connection and make sure the user is logged in
include("lang/".$language.".php");
include("functions.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>TaskStep</title>

<?php stylesheet() ?>
<link rel="stylesheet" type="text/css" href="styles/system/print.css" media="print" />
<link rel="alternate" type="application/rss+xml" title="RSS" href="<?php selfref_url(); ?>rss.php" /> 
<?php pagespecific()?>
<script type="text/javascript" src="script/fat.js"></script>
</head>

<body>

<!--Open container-->
<div id="sexyBG"></div><div id="sexyBOX" onmousedown="document.onclick=function(){};" onmouseup="setTimeout('sexyTOG()',1);"></div>

<div id="container">

<!--Header-->
<div id="header">
<h1><img src="images/icon.png" alt="" style="vertical-align:middle"/>&nbsp;<a href="index.php">TaskStep <span class="subtitle">1.1</span></a></h1>
</div>
<div id="headernav">
	<ul>
		<li><a href="display.php?display=today&amp;sort=done"><img src="images/calendar_view_day.png" alt="" /></a> <a href="display.php?display=today&amp;sort=done"><?php echo $l_nav_today; ?>: <?php echo date($menu_date_format); ?></a></li>
		<li><a href="index.php"><img src="images/house.png" alt="" /></a> <a href="index.php"><?php echo $l_nav_home; ?></a></li>
		<li><a href="display.php?display=all&amp;sort=date"><img src="images/page_white_text.png" alt="" /></a> <a href="display.php?display=all&amp;sort=date"><?php echo $l_nav_allitems; ?></a></li>
		<li><a href="display_type.php?type=context"><img src="images/context.png" alt="" /></a> <a href="display_type.php?type=context"><?php echo $l_nav_context; ?></a></li>
		<li><a href="display_type.php?type=project"><img src="images/project.png" alt="" /></a> <a href="display_type.php?type=project"><?php echo $l_nav_project; ?></a></li>
		<li><a href="settings.php"><img src="images/textfield_rename.png" alt="" /></a> <a href="settings.php"><?php echo $l_nav_settings; ?></a></li>
		<li><a href="http://www.cunningtitle.com/taskstep"><img src="images/help.png" alt="" /></a> <a href="http://cunningtitle.com/forum/"><?php echo $l_nav_help; ?></a></li>
		<li><a href="login.php?action=logout"><img src="images/door_in.png" alt="" /></a> <a href="login.php?action=logout"><?php echo $l_nav_logout; ?></a></li>
	</ul>
</div>

<!--Sidebar-->
<!--Numbers hack originally by Place, and adapted by Rob to fit with the language system-->
<div id="sidebar">                     
    <ul>
		<li><a href="edit.php"><?php echo $l_side_add; ?></a></li>
		<?php
		$result = $mysqli->query("SELECT s.title, SUM(IF(i.done=0,1,0)) AS undone, SUM(IF(i.done=1,1,0)) AS finished
			FROM sections s LEFT JOIN items i ON s.title = i.section GROUP BY s.title ORDER BY s.id");
		while($r=$result->fetch_assoc())
		{
			echo '<li><a class="' . $r['title'] . '" href="display.php?display=section&amp;section=' . $r['title'] . '&amp;sort=date">' . $l_sectionlist[$r['title']] . ' <span class="noundone">(' . $r['finished'] . ')</span>&nbsp;<span class="nodone">(' . $r['undone'] . ')</span></a></li>' . "\n";
		}
		?>
    </ul>
</div>

<div id="content">