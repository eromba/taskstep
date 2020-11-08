<?php
include("includes/header.php");

//"Settings Updated" block
if (isset($_POST["submit"]))
{
	$hidden = '';
	$settingsstatus = '';
	
	$tips = (isset($_POST['tips'])) ? 1 : 0;
	$result = $mysqli->query("UPDATE settings SET value='$tips' WHERE setting='tips'");
	if ($tips) $settingsstatus .= $l_cp_display_tipson;
	else $settingsstatus .= $l_cp_display_tipsoff;

	$style = $_POST['style'];
	$result = $mysqli->query("UPDATE settings SET value='$style' WHERE setting='style'");
	if ($style == 'none') $settingsstatus .= "<br />".$l_cp_display_defaultcss;
	else $settingsstatus .= "<br />".$style;
	
	$updatedblock = "<div id='updated' style='width: 20em;'>";
	$updatedblock .= "<img src='images/accept.png' alt='' />&nbsp;$l_cp_display_settingsupdated:<br />";
	$updatedblock .= "<span class='italic'>$settingsstatus</span></div>";
}
else $updatedblock = '';

//Show/Hide Tips checkbox
$result = $mysqli->query("SELECT * FROM settings WHERE setting='tips'");
while ($r=$result->fetch_array())
{
	$checked = ($r['value']) ? ' checked="checked"' : '';
	$tipsfield = $l_cp_display_tips.": <input type='checkbox' value='Display tips' name='tips'$checked />";
}

//Stylesheets code
$result = $mysqli->query("SELECT * FROM settings WHERE setting='style'");
$styleoptions = '';
while($r=$result->fetch_array())
{
	//Define the folder and path
	$folder="styles";
	$path = $_SERVER['DOCUMENT_ROOT']."/".$folder;
	//Split the contents into an array
	$files=array();
	if ($handle=opendir("$folder"))
	{
		while (false !== ($file = readdir($handle)))	//For each file...
		{
			if ($file != "." && $file != "..")
			{
				if (substr($file,-3)=='css')	//...if it is CSS...
				{
					$selected = ($r['value'] == $file) ? ' selected="selected"' : '';
					$styleoptions .= "<option value='$file'$selected>$file</option>";	//...echo the file name as an option
				}
			}
		}
	}
	closedir($handle); 
}

//Password code
if (isset($_POST["passchanges"]))
{
	//Get the salt
	$salt_result = $mysqli->query("SELECT value FROM settings WHERE setting='salt'");
	$r = $salt_result->fetch_row();
	$salt = $r[0];

	//Get the hashed password
	$pass_result = $mysqli->query("SELECT value FROM settings WHERE setting='password'");
	$r = $pass_result->fetch_row();
	$oldpass = $r[0];

	//Massive error trapping going on here
	$submitted = md5($_POST['currentpass']);
	$submittotal = $submitted.$salt;
	if($submittotal !== $oldpass) $pwmessage = $l_cp_password_incorrect;
	elseif($_POST['newpass1'] !== $_POST['newpass2']) $pwmessage = $l_cp_password_nomatch;
	else	//Everything works, so slam it all in
	{
		if($_POST['newpass1'] !== '')
		{
			$newsalt = substr(uniqid(rand(), true), 0, 5);
			$secure_password = md5($_POST['newpass1']);
			$newtotal = $secure_password.$newsalt;
			$mysqli->query("UPDATE settings SET value='$newsalt' WHERE setting='salt'");
			$mysqli->query("UPDATE settings SET value='$newtotal' WHERE setting='password'");
		}
		$svalue = (isset($_POST['sessions'])) ? 1 : 0;
		$result = $mysqli->query("UPDATE settings SET value='$svalue' WHERE setting='sessions'");
		$pwmessage = $l_cp_password_updated;
	}
}
else $pwmessage = '';

//"Use Passwords" checkbox
$use_result = $mysqli->query("SELECT value FROM settings WHERE setting='sessions'");
$res = $use_result->fetch_row();
$use = $res[0];
$checked = ($use) ? ' checked="checked"' : '';
$usepwfield = $l_cp_password_use.": <input type='checkbox' value='Sessions' name='sessions'$checked />";

//Purge functionality
if (!isset($_GET['delete'])) $purgetext = '<a href="#" onclick="check()">' . $l_cp_tools_purge . '</a>';
else
{
	$del_rows = $mysqli->query("SELECT * FROM items WHERE done=1");
	$num_affected = $del_rows->num_rows;
	$mysqli->query("DELETE FROM items WHERE done=1");
	$purgetext = $num_affected.$l_cp_tools_purged;
}

//CSV Export functionality
if(!isset($_GET['export'])) $exporttext = '<a href="settings.php?export=csv">' . $l_cp_tools_export . '</a>';
else
{
	$result = $mysqli->query("SELECT * FROM items");
	while($r=$result->fetch_array())
	{
		$title=$r["title"];
		$date=$r["date"];
		$notes=$r["notes"];
		$url=$r["url"];
		$done=$r["done"];
		$id=$r["id"];
		$context=$r["context"];
		$project=$r["project"];

		$data = "$id,$title,$date,$notes,$context,$project,$url,$done\r\n";
		$file = "exported_results.csv";   
		if (!$file_handle = fopen($file,"a")) echo "Cannot open file";
		if (!fwrite($file_handle, $data)) echo "Cannot write to file";

		fclose($file_handle);
	}
	$exporttext = 'Exported to ' . $file;
}

include('includes/settings.htm');
include('includes/footer.php');
?>