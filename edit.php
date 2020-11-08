<?php
include("includes/header.php");

$clear = false;

if ( isset($_GET["id"]) )	//If 'id' is set in the request URL, then the user is editing a task and we need to grab its data from the database
{
	$type = 'edit';
	$id = $_GET["id"];   
	$result = $mysqli->query("SELECT * FROM items WHERE id=$id");
	list($id, $title, $date, $section, $notes, $url, $done, $context, $project) = $result->fetch_row();
	$date = ($date == 00-00-0000) ? '' : $date;
}
else if ( isset($_POST["submit"]) )	//Otherwise, if the user has submitted a form, grab the rest of the form data
{
	$type = (!empty($_POST['id'])) ? 'edit' : 'add';
	$title = addslashes($_POST['title']);
	$date = $_POST['date'];
	$section = isset($_POST['section']) ? $_POST['section'] : '';
	$notes = addslashes($_POST['notes']);
	$url = addslashes($_POST['url']);
	$done = '0';
	$context = isset($_POST['context']) ? addslashes($_POST['context']) : '';
	$project = isset($_POST['project']) ? addslashes($_POST['project']) : '';
	if( empty($section) || empty($context) || empty($project) )	//Make sure that the form data is valid
	{
		$id = '';
		echo "<div class='inform' style='font-size:9pt;'><img src='images/information.png' alt='' style='vertical-align:-3px;' /> ".$l_msg_unspecific."</div>";
	}
	else if ( !empty($_POST['id']) )	//If a task id was also sent in the form data, update that task
	{
		$id = $_POST['id'];
		$result = $mysqli->query("UPDATE items SET title='$title',date='$date',notes='$notes',url='$url',section='$section',context='$context',project='$project' WHERE id=$id");
		echo "<div id='updated' class='fade'><img src='images/pencil_go.png' alt=''/> ".$l_msg_itemedit."</div>";
	}
	else	//Otherwise, add the data as a new task
	{
		$result = $mysqli->query("INSERT INTO items (id,title,date,section,notes,url,done,context,project)".
		"values ('NULL', '$title', '$date', '$section', '$notes', '$url', '$done', '$context', '$project')");
		echo "<div id='updated' class='fade'><img src='images/note_go.png' alt='' /> ".$l_msg_itemadd."</div>";
		$clear = true;
	}
}
else	//If neither of the previous conditionals were true, we simply need to create a blank "Add" form
{
	$type = 'add';
	$clear = true;
}

if ($clear)	//If 'clear' is true, we set the form values to blank/default values
{
	$id = '';
	$title = $l_forms_titledefval;
	$date = '';
	$section = (isset($_GET['section'])) ? $_GET['section'] : '';
	$notes = '';
	$url = '';
	$context = (isset($_GET['context'])) ? $_GET['context'] : '';
	$project = (isset($_GET['project'])) ? $_GET['project'] : '';
}
?>
<form method="post" action="edit.php" id="addform">
<div>
<table>
<tr>
   <td><?php echo $l_forms_title; ?>:</td>
   <td colspan="3" rowspan="1"><input type='text' id="addtitle" name='title' value="<?php echo $title ?>" size="60" /></td>
</tr>
<tr>
   <td><?php echo $l_forms_notes; ?>:</td>
   <td colspan="3" rowspan="1"><input type='text' name='notes' value="<?php echo $notes ?>" size="60" /></td>
</tr>
<tr>
   <td></td>
   <td><?php echo $l_forms_section; ?>:</td>
   <td><?php echo $l_forms_context; ?>:</td>
   <td><?php echo $l_forms_project; ?>:</td>
</tr>
<tr>
	<td></td>
	<td>
		<select name='section' size="7">
		<?php
		$result4 = $mysqli->query("SELECT * FROM sections ORDER BY id");
		foreach($l_sectionlist as $key=>$value)
		{
			$selected = ($section == $key) ? 'selected="selected"' : '';
			echo "<option value='$key' $selected>$value</option>\n";
		}
		?>
		</select>
	</td>
	<td>
		<select name='context' size="7">
		<?php
		$result2 = $mysqli->query("SELECT * FROM contexts ORDER BY title");
		while($r=$result2->fetch_array())
		{
			$context2=$r["title"];
			$selected = ($context == $context2) ? 'selected="selected"' : '';
			echo "<option value='$context2' $selected>$context2</option>\n";
		} 
		?>
		</select>
	</td>
	<td>
		<select name='project' size="7">
		<?php
		$result3 = $mysqli->query("SELECT * FROM projects ORDER BY title");
		while($r=$result3->fetch_array())
		{
			$project2=$r["title"];
			$selected = ($project == $project2) ? 'selected="selected"' : '';
			echo "<option value='$project2' $selected>$project2</option>\n";
		}
		?>
		</select>
	</td>
</tr>
<tr>
	<td></td>
	<td></td>
	<td><span class="listlinkstyle"><a href="edit_types.php?type=context"><img src="images/context_edit.png" alt="" /> <?php echo $l_forms_contexte; ?></a></span></td>
	<td><span class="listlinkstyle"><a href="edit_types.php?type=project"><img src="images/project_edit.png" alt="" /> <?php echo $l_forms_projecte; ?></a></span></td>
</tr>
<tr>
   <td><?php echo $l_forms_date; ?>:</td>
   <td colspan="3" rowspan="1" id="holder">
      <input type='text' autocomplete="off" name='date' value="<?php echo $date ?>" size="60" class="datebox" onfocus="JACS.show(this,event);" />
   </td>
</tr>
<tr>
   <td><?php echo $l_forms_url; ?>:</td>
   <td colspan="3" rowspan="1">
      <input type='text' name='url' value="<?php echo $url ?>" size="60" />
   </td>
</tr>
<tr>
   <td></td>
   <td colspan="3" rowspan="1"><input type="submit" name="submit" value="<?php echo $l_forms_button[$type]; ?>" /></td> 
</tr>
</table>
<input type="hidden" name="id" value="<?php echo $id ?>" />
</div>
</form>
<?php include('includes/footer.php') ?>