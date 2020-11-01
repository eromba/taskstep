<?php

	// German Language File - By Thomas Hooge 2019
	//
	// The language system uses variables for every sentence that needs to be translated.
	// If you want to contribute a translation, just replace each sentence accordingly.
	// Please consider sharing new translations by creating a pull request on GitHub:
	// https://github.com/eromba/taskstep
	//
	// Longer sections which include paragraphs include HTML. Single words or sentences do not.
	// Just edit the bits in quotes to change what appears as text.

	// Login
	$l_login_button = "Login";
	$l_login_l1 = "Bitte geben Sie Ihr Kennwort ein, um sich anzumelden";
	$l_login_l2 = "Kennwort akzeptiert.";
	$l_login_l3 = "Klicken Sie hier, um zu Ihren Listen zu gelangen.";
	$l_login_l4 = "Falsches Kennwort.";
	$l_login_l5 = "Kennwort wurde deaktiviert. Dies ist nicht sehr sicher. Bitte ändern Sie die Einstellung, wenn Sie TaskStep auf einem öffentlichen Server verwenden.";

	// Navigation
	$l_nav_today = "Heute";
	$l_nav_home = "Home";
	$l_nav_context = "Nach Kontext";
	$l_nav_project = "Nach Projekt";
	$l_nav_settings = "Einstellungen";
	$l_nav_help = "Hilfe";
	$l_nav_logout = "Abmelden";

	// Sidebar
	$l_side_add = "Aufgabe hinzufügen";

	//Sections
	//This is stored in an array to overcome list problems
	$l_sectionlist = array('ideas' => "Ideen",
	'tobuy' => "Wunschliste",
	'immediate' => "Sofort",
	'week' => "Diese Woche",
	'month' => "Diesen Monat",
	'year' => "Dieses Jahr",
	'lifetime' => "Irgendwann vielleicht");

	// Front page
	$l_index_welcome = "Willkommen bei TaskStep";
	$l_index_tip = "Tip";
	$l_index_noimmediate = "Keine unmittelbaren Dinge mehr zu tun! <a href='edit.php'>Aufgabe hinzufügen</a>!";
	$l_index_introm = "Guten Morgen";
	$l_index_introa = "Guten Tag";
	$l_index_introe = "Guten Abend";
	$l_index_introtext = " und wilkommen bei TaskStep. "
		. "TaskStep wurde entwickelt, um Sie bei alltäglichen Aufgaben, langfristigen Zielen und allgemeinen Listen zu unterstützen und diese grob GTD-artig mit Kontexten und Projekten zu organisieren. "
		. "Für diejenigen von Ihnen, die mit dem Konzept nicht vertraut sind, ist alles, was mehr als eine Aktion oder einen Schritt erfordert, ein Projekt. "
		. "In einem Kontext führen Sie Tätigkeiten beispielsweise an Ihrem Computer aus.";
	$l_index_1task = "Derzeit ist noch eine Aufgabe zu erledigen.";
	$l_index_mtasks = "Derzeit gibt es "; //Start counter
	$l_index_mtaske = " Aufgaben zu erledigen."; //End counter

	//Items
	$l_items_do = "Markiere als erledigt";
	$l_items_undo = "Markiere als unerledigt";
	$l_items_edit = "Aufgabe Bearbeiten";
	$l_items_del = "Löschen";
	$l_items_print = "Drucke Liste (3 x 5 Indexkarten)";
	$l_items_sort = array('title' => "Titel", //Another array for list purposes
	'date' => "Datum",
	'context' => "Kontext",
	'project' => "Projekt",
	'done' => "Erledigt");
	$l_items_sorttext = "Sortiere Aufgaben nach:";
	$l_items_sortbutton = "Sortiere";

	//"Display by" pages
	$l_dbp_l1['context'] = "Wählen Sie einen Kontext aus, in dem die Elemente aufgelistet werden sollen. Alternativ können Sie einen neuen Kontext hinzufügen.";
	$l_dbp_l1['project'] = "Wählen Sie ein Projekt aus, für das die Elemente aufgelistet werden sollen. Alternativ können Sie ein neues Projekt hinzufügen.";
	$l_dbp_l2['context'] = "Wählen Sie einen Kontext zum Bearbeiten. Alternativ können Sie einen neuen Kontext hinzufügen.";
	$l_dbp_l2['project'] = "Wählen Sie ein Projekt zum Bearbeiten. Alternativ können Sie ein neues Projekt hinzufügen.";
	$l_dbp_add['context'] = "Kontext hinzufügen";
	$l_dbp_add['project'] = "Projekt hinzufügen";
	$l_dbp_edit['context'] = "Bearbeite Kontext";
	$l_dbp_edit['project'] = "Bearbeite Projekt";
	$l_dbp_del['context'] = "Lösche Kontext";
	$l_dbp_del['project'] = "Lösche Projekt";
	$l_dbp_new['context'] = "NeuerKontext";
	$l_dbp_new['project'] = "NeuesProjekt";

	//Forms (add, edit etc.)
	$l_forms_title = "Titel";
	$l_forms_notes = "Bemerkungen";
	$l_forms_section = "Abschnitt";
	$l_forms_context = "Kontext";
	$l_forms_project = "Projekt";
	$l_forms_contexte = "Bearbeite Kontexte";
	$l_forms_projecte = "Bearbeite Projekte";
	$l_forms_date = "Fälligkeitsdatum";
	$l_forms_url = "Url";
	$l_forms_button['add'] = "Aufgabe hinzufügen";
	$l_forms_button['edit'] = "Aufgabe bearbeiten";

	//Messages
	$l_msg_noitems = "Keine Einträge in diesem Abschnitt!";
	$l_msg_addsome = "Füge einen hinzu!";
	$l_msg_notoday = "Keine Einträge heute! Entweder ist nichts zu tun oder Sie sollten";
	$l_msg_itemedit = "Aufgabe aktualisiert!";
	$l_msg_itemadd = "Aufgabe hinzugefügt!";
	$l_msg_itemdel = "Aufgabe gelöscht";
	$l_msg_itemdo = "Als Erledigt marktiert";
	$l_msg_itemundo = "Als Unerledigt markiert";
	$l_msg_actionerror = "Command or action invalid";
	$l_msg_unspecific = "Sorry, you need to specify a context, project and section.";
	$l_msg_updated['context'] = "Kontext aktualisiert";
	$l_msg_updated['project'] = "Projekt aktualisiert";
	$l_msg_added['context'] = "Kontext hinzugefügt";
	$l_msg_added['project'] = "Projekt hinzugefügt";
	$l_msg_deleted['context'] = "Kontext gelöscht";
	$l_msg_deleted['project'] = "Projekt gelöscht";
	$l_msg_noid = "Entschuldigung, die URL enthält einen Fehler. Es sollte eine ID angegeben werden.";

	//Settings
	$l_cp_bookmarklettext = "Ziehen Sie das Bild unten auf Ihre Lesezeichen, um das Lesezeichen zu erstellen.";
	$l_cp_bookmarklet = "TaskStep Aufgabe";
	$l_cp_display_title = "Darstellung";
	$l_cp_display_tips = "Zeige Tips auf der Titelseite an";
	$l_cp_display_css = "Stylesheet";
	$l_cp_display_nocss = "Kein";
	$l_cp_display_button = "Aktualisiere Einstellungen";
	$l_cp_display_settingsupdated = "Einstellungen aktualisiert";
	$l_cp_display_tipson = "Zeige Tips an";
	$l_cp_display_tipsoff = "Zeige keine Tips an";
	$l_cp_display_defaultcss = "Standard-Stylesheet ausgewählt";

	$l_cp_password_title = "Kennwort";
	$l_cp_password_current = "Aktuelles Kennwort";
	$l_cp_password_new1 = "Neues Kennwort";
	$l_cp_password_new2 = "Kennwortbestätigung";
	$l_cp_password_use = "Kennworte und Sitzungen verwenden (empfohlen)";
	$l_cp_password_fieldss = "Felder markiert mit einem";
	$l_cp_password_fieldse = "sind erforderlich um Änderungen durchzuführen.";
	$l_cp_password_button = "Aktualisiere Kennwort";
	$l_cp_password_incorrect = "Falsches Kennwort!";
	$l_cp_password_nomatch = "Kennworte stimmen nicht überein!";
	$l_cp_password_updated = "Aktualisiert!";

	$l_cp_tools_title = "Werkzeuge";
	$l_cp_tools_purge = "Lösche alle erledigten Einträge";
	$l_cp_tools_update = "Führe Update-Datei aus";
	$l_cp_tools_export = "Exportiere alles in eine <acronym title=\"Comma Separated Values\">CSV</acronym>-Datei";
		//NB The HTML for the acronym has been included for the sake of completeness, but make sure you leave the slashes before the quotes or TaskStep will break!
	$l_cp_tools_purged = " Einträge gelöscht.";
	$l_cp_tools_purgecheck = "Möchten Sie wirklich alle erledigten Einträge löschen??";

	//Insert updated parts after this point
	//--1/4/07--
	$l_nav_allitems = "Alle Aufgaben";

	//--28/8/07--
	$l_forms_titledefval = "Aufgaben- oder Schritt-Titel";
	$l_msg_updateassoctasks = "Verbundene Aufgaben aktualisieren?";
	$l_print_commontitle = "Druck";
	$l_print_printalltasks = "Aufgaben";
	$l_print_printtoday = "Heute";
	$l_print_sectionnotfound = "Abschnitt nicht gefunden!";
	$l_msg_exportedto="Exportiert nach";
	//Insert updated parts before this point
?>
