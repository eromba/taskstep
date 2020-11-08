<?php
include("includes/header.php");

$type = (isset($_GET['type'])) ? $_GET['type'] : '';
$getcmd = (isset($_GET['cmd'])) ? $_GET['cmd'] : '';
$postcmd = (isset($_POST['cmd'])) ? $_POST['cmd'] : '';

//actual mysql editing
if($postcmd == "edit" && isset($_POST["submit"]))
{
	$eid = $_POST["id"];
	$enewtitle = addslashes($_POST["title"]);
	$updatequery = $mysqli->query("UPDATE {$type}s SET title='$enewtitle' WHERE id=$eid");
	if($updatequery) echo "<div id='updated' class='fade'><img src='images/pencil_go.png' alt=''/> ".$l_msg_updated[$type]."</div>";
	if($_POST["tasks"]){
		$eoldtitle = $_POST["oldtitle"];
		$mysqli->query("UPDATE items SET $type='$enewtitle' WHERE $type='$eoldtitle'");
	}
}

//adding in mysql
if($postcmd == "add" && isset($_POST["add"]))
{
	$title = addslashes($_POST["newtitle"]);
	$result = $mysqli->query("INSERT INTO {$type}s (id,title) VALUES ('NULL', '$title')");
	echo "<div id='updated' class='fade'><img src='images/add.png' alt=''/> ".$l_msg_added[$type]."</div>";
}

//deleting in mysql
if($getcmd=="delete")
{
    $delid = $_GET["id"];
	$delquery = $mysqli->query("DELETE FROM {$type}s WHERE id=$delid");
    if($delquery) echo "<div id='deleted' class='fade'><img src='images/bin.png' alt='' /> ".$l_msg_deleted[$type]."</div>";
}

//if the GET cmd has not been initialized, display a list of everything
if(!$getcmd || $getcmd == "delete")
{
	echo "<p>".$l_dbp_l2[$type]."</p>";
	echo "<div id='editlist'><a href='edit_types.php?type=$type&amp;cmd=add' class='listlinkssmart'><img src='images/add.png' alt='' /> ".$l_dbp_add[$type]."</a>";
	$result = $mysqli->query("SELECT * FROM {$type}s ORDER BY title");
	while($r=$result->fetch_array())
	{
		$title=$r["title"];
		$id=$r["id"];
		echo "<a href='edit_types.php?type=$type&amp;cmd=edit&amp;id=$id' class='listlinkssmart'><img src='images/pencil.png' alt='' /> $title</a>";
	}	
	echo "</div>";
}
	
//Edit form
elseif($getcmd == "edit")
{
	//DEBUG NB: quick error trap
			
	if(!$_GET["id"])
	{
		echo "<div class='error' style='font-size:9pt; padding:5px; '><img src='images/exclamation.png' alt='' style='vertical-align:-3px;' /> ".$l_msg_noid."</div>";
		echo "<span class='linkback'><a href='edit_types.php?type=$type' class='linkback'>Return to editing {$type}s</a></span></div>";
		die;
	}
	
	$editid = $_GET["id"];
	
	//DEBUG echo "This would produce an edit form for the context with id $editid <br />";
	
	$editquery = $mysqli->query("SELECT * FROM {$type}s WHERE id=$editid");
	while($r=$editquery->fetch_array())
	{
		$edittitle = $r["title"];
		$editid2 = $r["id"];
	}
	//DEBUG echo "The MySQL code has matched this to the context with the following: <br />";
	//DEBUG echo "ID: $editid2 <br />";
	//DEBUG echo "Title: $edittitle <br />";
?>
	<form action="edit_types.php?type=<?php echo $type ?>" method="post">
		<input type="hidden" name="id" value="<?php echo $editid2; ?>" />
		<input type="hidden" name="oldtitle" value="<?php echo $edittitle; ?>" />
		<?php echo $l_forms_title ?>&nbsp;<input type="text" name="title" value="<?php echo $edittitle; ?>" size="30" /><br /><br />
		<input type="hidden" name="cmd" value="edit">
		<input type="checkbox" name="tasks" checked>&nbsp;<?php echo $l_msg_updateassoctasks; ?><br />
		<br />
		<input type="submit" name="submit" value="<?php echo $l_dbp_edit[$type]; ?>" />
	</form>
	<?php
	echo "<br /><a href='edit_types.php?type=$type&amp;cmd=delete&amp;id=$editid2'><img src='images/bin_empty.png' alt='' /> ".$l_dbp_del[$type]."</a>";
	}

//Add form
elseif($getcmd == "add")
{?>
	<form action="edit_types.php?type=<?php echo $type ?>" method="post">
		<?php echo $l_forms_title ?>&nbsp;<input type="text" name="newtitle" value="<?php echo $l_dbp_new[$type];?>" size="30" /><br />
		<br />
		<input type="hidden" name="cmd" value="add" />
		<input type="submit" name="add" value="<?php echo $l_dbp_add[$type]; ?>" />
	</form>
<?php
}

include('includes/footer.php');
?>
