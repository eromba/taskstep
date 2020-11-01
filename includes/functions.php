<?php
function connect(){
	global $mysqli, $server, $user, $password, $db;

	if (!($mysqli and $mysqli->ping())) {
		$mysqli = new mysqli($server, $user, $password, $db); 
	}
	return $mysqli;
}

function pagespecific(){
	global $language, $l_cp_tools_purgecheck;
	$currentFile = $_SERVER["SCRIPT_NAME"];
    $parts = Explode('/', $currentFile);
    $currentFile = $parts[count($parts) - 1];
	switch ($currentFile)
	{
	case 'edit.php':
		echo '<style type="text/css">';
		readfile('styles/system/jacs.css');
		echo '</style>' . "\n";
		echo '<script type="text/javascript" src="script/jacsLang.js"></script>' . "\n";
		echo '<script type="text/javascript" src="script/jacs.js"></script>' . "\n";
		echo '<script type="text/javascript">
		function setLanguages(jacsLanguage) {	// Set all calendars to the chosen language
		for (var i=0;i<JACS.cals().length;i++)
		{
			var jacsCal = document.getElementById(JACS.cals()[i]);

			jacsCal.language = jacsLanguage;
			jacsSetLanguage(jacsCal);

			// Refresh any static calendars so that the change shows immediately.
			if (!jacsCal.dynamic) JACS.show(jacsCal.ele,jacsCal.id,jacsCal.days);
		}
		};
		window.onload = function() {
			JACS.make("jacs",true);
			setLanguages("'.$language.'");
			if (document.getElementById("addtitle")) {
				document.getElementById("addtitle").focus();
				document.getElementById("addtitle").select();
			}
		};
		</script>' . "\n";
	break;
	case 'settings.php':
		echo '<script type="text/javascript">function check(){
				var message;
				message = confirm("'.$l_cp_tools_purgecheck.'");
				if (message) {
					this.location.href = "settings.php?delete=confirm";
				} else {
					this.location.href = "settings.php";
				}
			}</script>';
	break;
	}
}

function stylesheet(){
	global $mysqli;
	$result = $mysqli->query("SELECT * FROM settings WHERE setting='style'");
	while($r = $result->fetch_array())
	{
		echo "<link rel='stylesheet' type='text/css' href='styles/".$r['value']."' media='screen' />";	//Use the stylesheet selected in the database
	}
}

function display_items($display = '', $section = '', $tid = '', $sortby = ''){
	global $mysqli, $result, $l_items_do, $l_items_edit, $l_items_del, $l_items_undo, $task_date_format;

	if ($section) $section = 'section=' . $section . '&amp;';
	if ($tid) $tid = 'tid=' . $tid . '&amp;';
	if ($sortby) $sortby = 'sort=' . $sortby . '&amp;';

	//grab all the content
	while($r=$result->fetch_array())
	{	
	//the format is $variable = $r["nameofmysqlcolumn"];
	$title=htmlentities($r["title"]);
	$date=$r["date"];
	$date_display=date($task_date_format, strtotime($date));
	$notes=htmlentities($r["notes"]);
	$urlfull=htmlentities($r["url"]);
	$done=$r["done"];
	$id=$r["id"];
	$context=htmlentities($r["context"]);
	$project=htmlentities($r["project"]);

	if ($urlfull == "") $url = "";
	else
	{
		$limit = 40; // set character limit
		$url = "<a href='$urlfull'>";
		// display URL up to character limit, shorten & add ellipsis if it is too long
		$url .= (strlen($urlfull) > $limit) ? substr($urlfull,0,$limit) . '...</a>' : $urlfull . '</a>';
	}
	
	//Set up a few variables for the do/undo button
	$cmd = 'do';
	$link = $l_items_do;
	$icon = 'undone';
	
	//display the row
   
	//if the action is marked as done, then do not apply any current or old markings to it
    if($done == 1)
	{
		echo "<div class='np'> <span style='text-decoration:line-through;'> $title - $date_display | $project | $context</span>";
		$cmd = 'undo';
		$link = $l_items_undo;
		$icon = 'accept';
	}

	//if the date doesn't exist, then don't display the date
	elseif($date == 00-00-0000) echo "<div class='np'> $title | $project | $context";

	//if the date is equal to the current date, flag it as current
   	elseif(date("Y-m-d") == $date) echo "<div class='current'><img src='images/flag_yellow.png' alt='' /> $title - $date_display | $project | $context";

	//if the date is older than the current date, flag it as old
	elseif(date("Y-m-d") > $date) echo "<div class='old'><img src='images/flag_red.png' alt='' /> $title - $date_display | $project | $context";

	//if the date is neither of these, don't flag it.
	else echo "<div class='np'> $title - $date_display | $project | $context";
	
	echo "<a href='display.php?display=$display&amp;{$section}{$tid}{$sortby}cmd=delete&amp;id=$id' title='$l_items_del' class='actionicon'><img src='images/bin_empty.png' alt='$l_items_del' /></a>
	<a href='edit.php?id=$id' title='$l_items_edit' class='actionicon'><img src='images/pencil.png' alt='$l_items_edit' /></a> 
	<a href='display.php?display=$display&amp;{$section}{$tid}{$sortby}cmd=$cmd&amp;id=$id' title='$link' class='actionicon'><img src='images/$icon.png' alt='$link' /></a>
	<br />$notes<br />$url</div>";
	}
}

function display_frontpage(){
	global $mysqli, $l_sectionlist, $l_items_do, $l_items_edit, $l_index_noimmediate, $task_date_format;
	//select the table
	$todaydate = date("Y-m-d");
	$result = $mysqli->query("SELECT * FROM items WHERE date <= '$todaydate' AND done='0' AND date != '00-00-0000' OR section='immediate' AND done='0' ORDER BY date LIMIT 5");
	$numrows= $result->num_rows;
	?>
	<div id="immediateblock">
	<h2><img src="images/lightning.png" alt="" /> <?php echo $l_sectionlist['immediate'] ?> (<?php echo $numrows; ?>)</h2>
	<?php
	while($r=$result->fetch_array())
	{	
	  	 //the format is $variable = $r["nameofmysqlcolumn"];

		$title=htmlentities($r["title"]);
		$date = ($r["date"] != 00-00-0000) ? ' - '.date($task_date_format, strtotime($r["date"])) : '';
		$notes=htmlentities($r["notes"]);
		$url=htmlentities($r["url"]);
		$done=$r["done"];
		$id=$r["id"];
		$context=htmlentities($r["context"]);
		$project=htmlentities($r["project"]);
	   
		//nested if statement
		//display the row
		echo "<div class='immediateitem'><a href='display.php?display=section&amp;section=immediate&amp;cmd=do&amp;id=$id' title='".$l_items_do."'><img src='images/undone.png' alt='".$l_items_do."' class='valign'/></a>\n";
		echo "<a href='edit.php?id=$id' title='".$l_items_edit."'>$title</a>$date | $context</div>\n";
	}
	if ($numrows == 0) echo $l_index_noimmediate;
	echo '</div>';
}

function selfref_url(){
	$dirstuff = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']);
	$full = "http://".$_SERVER['HTTP_HOST'].$dirstuff;
	echo $full;
}

function sort_form($type = '', $section = '', $tid = '', $sortby = ''){
	
	global $l_items_sorttext, $l_items_sort, $l_items_sortbutton, $l_items_print;
	$sortby = ($sortby) ? $sortby : 'done';
	
	switch($type) {
		case 'section':
			$printurl = "print=section&amp;section=$section";
			$hidden = "<input type='hidden' name='section' value='$section' />";
		break;
		case 'context':
		case 'project':
			$printurl = "print=$type&amp;id=$tid";
			$hidden = "<input type='hidden' name='tid' value='$tid' />";
		break;
		case 'today':
			$printurl = "print=today";
			$hidden = "";
		break;
		case 'all':
			$printurl = "print=all";
			$hidden = "";
		break;
	}
	?>
	<div class="sortform">
	<p><span class='printer'><a href="print.php?<?php echo $printurl; ?>"><img src='images/printer.png' alt='' /> <?php echo $l_items_print; ?></a></span></p>
	<form action="display.php" method="get">
	<div>
	<input type="hidden" name="display" value="<?php echo $type ?>" />
	<?php echo $hidden . $l_items_sorttext ?>
	<select name="sort">
		<?php
		foreach ($l_items_sort AS $key=>$value)
		{
			if ($key != $type)
			{
				$selected = ($sortby == $key) ? ' selected="selected"' : '';
				echo '<option value="'.$key.'"'.$selected.'>'.$value.'</option>';
			}
		}
		?>
	</select>
	<input type="submit" value="<?php echo $l_items_sortbutton; ?>" />
	</div>
	</form>
	</div><?php
}
?>