<?php
include("includes/header.php");

$sortby = (isset($_GET["sort"])) ? $_GET["sort"] : '';

$type = (isset($_GET['type'])) ? $_GET['type'] : '';

//display all the projects/contexts
$result = $mysqli->query("select * from {$type}s order by title");
echo "<div id='editlist'>\n<p>".$l_dbp_l1[$type]."</p>";

//display the add project/context link
echo "<a href='edit_types.php?type=$type&amp;cmd=add' class='listlinkssmart'><img src='images/add.png' alt='' /> ".$l_dbp_add[$type]."</a>";

//run the while loop that grabs all the projects/contexts
while($r=$result->fetch_array())
{ 
	//grab the title and the ID of the project/context
	$title=$r["title"];
	$id=$r["id"];

	//make the title a link
	echo "<a href='display.php?display=$type&amp;tid=$id&amp;sort=date' class='listlinkssmart'><img src='images/$type.png' alt='' /> $title</a>";
}
echo "\n<a href='edit_types.php?type=$type' class='listlinkssmart'><img src='images/{$type}_edit.png' alt='' /> ".$l_dbp_edit[$type]."</a>\n</div>";

include('includes/footer.php');
?>