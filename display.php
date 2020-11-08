<?php
include("includes/header.php");

//This is where all the action happens. Most php files in TaskStep link here in some form or another, so best advice is DON'T CHANGE IT!

if (isset($_GET["cmd"]))
{
	$id = $_GET["id"];
	switch ($_GET["cmd"])
	{
		case "delete":
		    $sql = "DELETE FROM items WHERE id=$id";
		    $result = $mysqli->query($sql);
		break;
		case "do":
		  	$sql = "UPDATE items SET done=1 WHERE id=$id";
		  	$result = $mysqli->query($sql);
		  	echo "<div id='updated' class='fade'><img src='images/accept.png' alt='' /> ".$l_msg_itemdo."</div>";
		break;
		case "undo":
		  	$sql = "UPDATE items SET done=0 WHERE id=$id";
		  	$result = $mysqli->query($sql);
		  	echo "<div id='deleted' class='fade'><img src='images/undone.png' alt='' /> ".$l_msg_itemundo."</div>";
		break;  
		default:	//Error trap it so that if a dodgy command is given it doesn't drop dead
			echo "<div class='error'><img src='images/exclamation.png' alt='' /> ".$l_msg_actionerror."</div>";
		break;
	}
}

//This is the sorting form, as promised

$display = (isset($_GET["display"])) ? $_GET["display"] : '';
$sortby = (isset($_GET["sort"])) ? $_GET["sort"] : 'date';
$section = (isset($_GET["section"])) ? $_GET["section"] : '';
$tid = (isset($_GET["tid"])) ? $_GET["tid"] : '';

switch ($display)
{
	case "section":
		//Massively cleaned up section which obtains section titles from the language file
		foreach($l_sectionlist as $key=>$value){
			if($section==$key){
				$currentsection = $key;
				$sectiontitle = $value;
			}
		}
		$result = $mysqli->query("SELECT * FROM items WHERE section='$currentsection' ORDER BY $sortby");
		echo "<div id='sectiontitle'><h1>$sectiontitle</h1></div>";
		$noresultsurl = '?section=' . $section;
	break;
	case "project":
	case "context":
		$idresult = $mysqli->query("SELECT title FROM {$display}s WHERE id='$tid'");
		$disptitle = $idresult->fetch_row()[0];
		$result = $mysqli->query("SELECT * FROM items WHERE $display='$disptitle' ORDER BY $sortby");
		echo "<div id='sectiontitle'><h1>$disptitle</h1></div>";
		$noresultsurl = '?tid=' . $tid;
	break;
	case "all":
		$result = $mysqli->query("SELECT * FROM items ORDER BY $sortby");
		echo "<div id='sectiontitle'><h1>".$l_nav_allitems."</h1></div>";
		$noresultsurl = '';
	break;
	case "today":
		$today = date("Y-m-d");
		$todayf = date($menu_date_format);
		$result = $mysqli->query("SELECT * FROM items WHERE date='$today' ORDER BY $sortby");
		echo "<div id='sectiontitle'><h1>".$l_nav_today.": $todayf</h1></div>";
		$noresultsurl = '';
	break;
}
$numberrows = $result->num_rows;
sort_form($display, $section, $tid, $sortby);
if ($numberrows == 0)
{
	$message = ( $display == "today" ) ? $l_msg_notoday : $l_msg_noitems;
	echo "<div class='inform'><img src='images/information.png' alt='' />&nbsp;".$message." <a href='edit.php$noresultsurl'>".$l_msg_addsome."</a></div>";
}
else display_items($display, $section, $tid, $sortby);

if(isset($_POST['submit'])) //If submit is hit
{
  $section=$_POST['section'];
  $sortby=$_POST['sort'];
}

include('includes/footer.php');
?>