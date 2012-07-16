<?php

	// English Language File - Compiled by Rob 2006
	//
	// The language system uses variables for every sentence that needs to be translated.
	// If you want to contribute a translation, just replace each sentence accordingly.
	// Please do consider submitting translations to the forums.
	// http://cunningtitle.com/forum/
	//
	// Longer sections which include paragraphs include HTML. Single words or sentences do not.
	// Just edit the bits in quotes to change what appears as text.

	// Login
	$l_login_button = "Login";
	$l_login_l1 = "Please enter your password to login";
	$l_login_l2 = "Password accepted.";
	$l_login_l3 = "Click here to go to your lists.";
	$l_login_l4 = "Incorrect password.";
	$l_login_l5 = "Password has been disabled. This isn't very secure, so please change this if you're using this on a public server.";

	// Navigation
	$l_nav_today = "Today";
	$l_nav_home = "Home";
	$l_nav_context = "By context";
	$l_nav_project = "By project";
	$l_nav_settings = "Settings";
	$l_nav_help = "Help";
	$l_nav_logout = "Logout";

	// Sidebar
	$l_side_add = "Add item";

	//Sections
		//This is stored in an array to overcome list problems
	$l_sectionlist = array('ideas' => "Ideas",
	'tobuy' => "Might Want to Buy",
	'immediate' => "Immediate",
	'week' => "This week",
	'month' => "This month",
	'year' => "This year",
	'lifetime' => "Some day maybe");

	// Front page
	$l_index_welcome = "Welcome to TaskStep";
	$l_index_tip = "Tip";
	$l_index_noimmediate = "No immediate items left to-do! <a href='edit.php'>Add some</a>!";
	$l_index_introm = "Good morning";
	$l_index_introa = "Good afternoon";
	$l_index_introe = "Good evening";
	$l_index_introtext = ", and welcome to TaskStep. TaskStep is designed to help you with day-to-day tasks, long-term aims and general lists, vaguely organising them <a href='http://www.davidco.com/'>GTD</a>-style with contexts and projects.</p> <p>For those of you unfamiliar with the idea, anything which requires more than one action/step is a project. A context is where you will be doing the action, for example, at your computer.</p>";
	$l_index_1task = "There is currently 1 task left to do.";
	$l_index_mtasks = "There are currently "; //Start counter
	$l_index_mtaske = " tasks left to do."; //End counter

	//Items
	$l_items_do = "Mark as done";
	$l_items_undo = "Mark as not done";
	$l_items_edit = "Edit item";
	$l_items_del = "Delete";
	$l_items_print = "Print list (3 x 5 Index card)";
	$l_items_sort = array('title' => "Title", //Another array for list purposes
	'date' => "Date",
	'context' => "Context",
	'project' => "Project",
	'done' => "Done");
	$l_items_sorttext = "Sort items by:";
	$l_items_sortbutton = "Sort";

	//"Display by" pages
	$l_dbp_l1['context'] = "Choose a context to list the items for. Alternatively, add a new context.";
	$l_dbp_l1['project'] = "Choose a project to list the items for. Alternatively, add a new project.";
	$l_dbp_l2['context'] = "Choose a context to edit. Alternatively, add a new context.";
	$l_dbp_l2['project'] = "Choose a project to edit. Alternatively, add a new project.";
	$l_dbp_add['context'] = "Add context";
	$l_dbp_add['project'] = "Add project";
	$l_dbp_edit['context'] = "Edit context";
	$l_dbp_edit['project'] = "Edit project";
	$l_dbp_del['context'] = "Delete context";
	$l_dbp_del['project'] = "Delete project";
	$l_dbp_new['context'] = "NewContext";
	$l_dbp_new['project'] = "NewProject";

	//Forms (add, edit etc.)
	$l_forms_title = "Title";
	$l_forms_notes = "Notes";
	$l_forms_section = "Section";
	$l_forms_context = "Context";
	$l_forms_project = "Project";
	$l_forms_contexte = "Edit contexts";
	$l_forms_projecte = "Edit projects";
	$l_forms_date = "Due date";
	$l_forms_url = "Url";
	$l_forms_button['add'] = "Add item";
	$l_forms_button['edit'] = "Edit item";

	//Messages
	$l_msg_noitems = "No items in this section!";
	$l_msg_addsome = "Add some!";
	$l_msg_notoday = "No items today! Either there is nothing to do, or you should";
	$l_msg_itemedit = "Item updated!";
	$l_msg_itemadd = "Item added!";
	$l_msg_itemdel = "Item deleted";
	$l_msg_itemdo = "Marked as done";
	$l_msg_itemundo = "Marked as not done";
	$l_msg_actionerror = "Command or action invalid";
	$l_msg_unspecific = "Sorry, you need to specify a context, project and section.";
	$l_msg_updated['context'] = "Context updated";
	$l_msg_updated['project'] = "Project updated";
	$l_msg_added['context'] = "Context added";
	$l_msg_added['project'] = "Project added";
	$l_msg_deleted['context'] = "Context deleted";
	$l_msg_deleted['project'] = "Project deleted";
	$l_msg_noid = "Sorry, there is an error in the URL. There should be an id specified.";

	//Settings
	$l_cp_bookmarklettext = "Drag the image below onto your bookmarks to create the bookmarklet.";
	$l_cp_bookmarklet = "Add to TaskStep";
	$l_cp_display_title = "Display";
	$l_cp_display_tips = "Display tips on the front page";
	$l_cp_display_css = "Stylesheet";
	$l_cp_display_nocss = "None";
	$l_cp_display_button = "Update settings";
	$l_cp_display_settingsupdated = "Settings updated";
	$l_cp_display_tipson = "Displaying tips";
	$l_cp_display_tipsoff = "Not displaying tips";
	$l_cp_display_defaultcss = "Default stylesheet chosen";

	$l_cp_password_title = "Password";
	$l_cp_password_current = "Current password";
	$l_cp_password_new1 = "New password";
	$l_cp_password_new2 = "Confirm new password";
	$l_cp_password_use = "Use passwords and sessions (Recommended)";
	$l_cp_password_fieldss = "Fields marked with a";
	$l_cp_password_fieldse = "are necessary for changes to be made.";
	$l_cp_password_button = "Update password";
	$l_cp_password_incorrect = "Incorrect password!";
	$l_cp_password_nomatch = "Passwords do not match!";
	$l_cp_password_updated = "Updated!";

	$l_cp_tools_title = "Tools";
	$l_cp_tools_purge = "Purge all done items";
	$l_cp_tools_update = "Run update file";
	$l_cp_tools_export = "Export all to <acronym title=\"Comma Separated Values\">CSV</acronym> file";
		//NB The HTML for the acronym has been included for the sake of completeness, but make sure you leave the slashes before the quotes or TaskStep will break!
	$l_cp_tools_purged = " items purged.";
	$l_cp_tools_purgecheck = "Are you sure you want to delete all done items?";

	//Insert updated parts after this point
	//--1/4/07--
	$l_nav_allitems = "All Items";

	//--28/8/07--
    $l_forms_titledefval = "Task or step title";
    $l_msg_updateassoctasks = "Update associated tasks?";
    $l_print_commontitle = "Print";
    $l_print_printalltasks = "Tasks";
    $l_print_printtoday = "Today";
    $l_print_sectionnotfound = "Section not found!";
    $l_msg_exportedto="Exported to";
	//Insert updated parts before this point
?>
