<?php

	// Spanish Language File - Compiled by Opikanoba (opikanoba.info) & Campanilla (campanilla.info) 2007
	//
	// The language system uses variables for every sentence that needs to be translated.
	// If you want to contribute a translation, just replace each sentence accordingly.
	// Please do consider submitting translations to the forums.
	// http://cunningtitle.com/forum/
	//
	// Longer sections which include paragraphs include HTML. Single words or sentences do not.
	// Just edit the bits in quotes to change what appears as text.

	// Login
	$l_login_button = "Acceder";
	$l_login_l1 = "Introduce tu clave para acceder";
	$l_login_l2 = "Clave correcta.";
	$l_login_l3 = "Haz click aqu&iacute; para ir a tus listas.";
	$l_login_l4 = "Clave incorrecta.";
	$l_login_l5 = "Acceso identificado desactivado. Esto no es seguro, por favor cambialo si estas en un servidor p&uacute;blico.";

	// Navigation
	$l_nav_today = "Hoy";
	$l_nav_home = "Inicio";
	$l_nav_context = "Por contexto";
	$l_nav_project = "Por proyecto";
	$l_nav_settings = "Configuraci&oacute;n";
	$l_nav_help = "Ayuda";
	$l_nav_logout = "Salir";

	// Sidebar
	$l_side_add = "A&ntilde;adir";

	//Sections
		//This is stored in an array to overcome list problems
	$l_sectionlist = array('ideas' => "Ideas",
	'tobuy' => "Quiero comprar",
	'immediate' => "Inmediatamente",
	'week' => "Esta semana",
	'month' => "Este mes",
	'year' => "Este a&ntilde;o",
	'lifetime' => "Quiz&aacute; alg&uacute;n d&iacute;a");

	// Front page
	$l_index_welcome = "Bienvenido a TaskStep";
	$l_index_tip = "Nota";
	$l_index_noimmediate = "No tienes nada por hacer ahora mismo, &iexcl;<a href='edit.php'>a&ntilde;ade algo</a>!";
	$l_index_introm = "Buenos d&iacute;as";
	$l_index_introa = "Buenas tardes";
	$l_index_introe = "Buenas noches";
	$l_index_introtext = ", y bienvenido a TaskStep. TaskStep ha sido dise&ntilde;ado para ayudarte en tus tareas del d&iacute;a a d&iacute;a, a largo plazo y en general tus listas de tareas , vagamente organizadas al estilo <a href='http://www.davidco.com/'>GTD</a> con contextos y proyectos.</p> <p>Para aquellos que no esten familiarizados con la idea, cualquier cosa que requiera m&aacute;s de un acci&oacute;n o paso es considerado un proyecto. Un contexto es donde se va a realizar la acci&oacute;n, por ejemplo, en tu ordenador.</p><p><b><img src='images/exclamation.png' alt='' /> Esto es una versi&oacute;n beta y pude tener comportamientos impredecibles. Por ahora, es recomendable que uses la <a href='http://enes.explicatus.org/wiki/CamelCase'>NotacionDeCamello</a> para evitar fallos con los espacios en los proyectos y contextos, de todas formas los espacios deber&iacute;an funcionar.</b></p>";
	$l_index_1task = "Tienes una tarea por hacer.";
	$l_index_mtasks = "Tienes "; //Start counter
	$l_index_mtaske = " tareas por hacer."; //End counter

	//Items
	$l_items_do = "Marcar como hecho";
	$l_items_undo = "Marcar como no hecho";
	$l_items_edit = "Editar";
	$l_items_del = "Borrar";
	$l_items_print = "Imprimir listado (3 x 5 Index card)";
	$l_items_sort = array('title' => "Titulo", //Another array for list purposes
	'date' => "Fecha",
	'context' => "Contexto",
	'project' => "Proyecto",
	'done' => "Hecho");
	$l_items_sorttext = "Ordenar por:";
	$l_items_sortbutton = "Ordenar";

	//"Display by" pages
	$l_dbp_l1['context'] = "Filtrar por contexto. Opcionalmente, a&ntilde;adir uno nuevo.";
	$l_dbp_l1['project'] = "Filtrar por proyecto. Opcionalmente, a&ntilde;adir uno nuevo.";
	$l_dbp_l2['context'] = "Selecciona un contexto para editarlo o a&ntilde;ade uno nuevo.";
	$l_dbp_l2['project'] = "Selecciona un poyecto para editarlo o a&ntilde;ade uno nuevo.";
	$l_dbp_add['context'] = "A&ntilde;adir contexto";
	$l_dbp_add['project'] = "A&ntilde;adir proyecto";
	$l_dbp_edit['context'] = "Editar contexto";
	$l_dbp_edit['project'] = "Editar proyecto";
	$l_dbp_del['context'] = "Borrar contexto";
	$l_dbp_del['project'] = "Borrar proyecto";
	$l_dbp_new['context'] = "MiNuevoContexto";
	$l_dbp_new['project'] = "MiNuevoProyecto";
	   
	//Forms (add, edit etc.)
	$l_forms_title = "T&iacute;tulo";
	$l_forms_notes = "Notas";
	$l_forms_section = "Secci&oacute;n";
	$l_forms_context = "Contexto";
	$l_forms_project = "Proyecto";
	$l_forms_contexte = "Editar contextos";
	$l_forms_projecte = "Editar proyectos";
	$l_forms_date = "Fecha prevista:";
	$l_forms_url = "Url";
	$l_forms_button['add'] = "A&ntilde;adir";
	$l_forms_button['edit'] = "Editar";

	//Messages
	$l_msg_noitems = "No hay nada en esta secci&oacute;n";
	$l_msg_addsome = "&iexcl;a&ntilde;ade algo!";
	$l_msg_notoday = "No hay nada hoy. Es posible que no tengas nada que hacer, o quiz&aacute; quieras";
	$l_msg_itemedit = "Actualizado correctamente";
	$l_msg_itemadd = "A&ntilde;adido correctamente";
	$l_msg_itemdel = "Borrado correctamente";
	$l_msg_itemdo = "Marcado como hecho";
	$l_msg_itemundo = "Marcado como no hecho";
	$l_msg_actionerror = "Comando o acci&oacute;n inv&aacute;lida";
	$l_msg_unspecific = "Es imprescindible especificar un contexto, proyecto y secci&oacute;n.";
	$l_msg_updated['context'] = "Contexto actualizado";
	$l_msg_updated['project'] = "Proyecto actualizado";
	$l_msg_added['context'] = "Contexto a&ntilde;adido";
	$l_msg_added['project'] = "Proyecto a&ntilde;adido";
	$l_msg_deleted['context'] = "Contexto borrado";
	$l_msg_deleted['project'] = "Proyecto borrado";
	$l_msg_noid = "Error en la URL. Deberia haber una id especificada.";

	//Settings
	$l_cp_bookmarklettext = "Arrastra la imagen a tus favoritos para a&ntilde;adirla a tus marcadores";
	$l_cp_bookmarklet = "A&ntilde;adir a TaskStep";
	$l_cp_display_title = "T&iacute;tulo";
	$l_cp_display_tips = "Mostrar notas en la p&aacute;gina principal";
	$l_cp_display_css = "Hoja de estilo";
	$l_cp_display_nocss = "Ninguna";
	$l_cp_display_button = "Guardar cambios";
	$l_cp_display_settingsupdated = "Cambios guardados";
	$l_cp_display_tipson = "Mostrar notas";
	$l_cp_display_tipsoff = "No mostrar notas";
	$l_cp_display_defaultcss = "Hoja de estilo por defecto elegida";

	$l_cp_password_title = "Clave";
	$l_cp_password_current = "Clave actual";
	$l_cp_password_new1 = "Nueva clave";
	$l_cp_password_new2 = "Confirma la nueva clave";
	$l_cp_password_use = "Usar clave y sesiones (Recomendado)";
	$l_cp_password_fieldss = "Campos marcados con";
	$l_cp_password_fieldse = "son obligatorios.";
	$l_cp_password_button = "Cambiar clave";
	$l_cp_password_incorrect = "Clave incorrecta";
	$l_cp_password_nomatch = "Las claves no coinciden";
	$l_cp_password_updated = "Clave modificada con &eacute;xito";

	$l_cp_tools_title = "Herramientas";
	$l_cp_tools_purge = "Borrar las tareas terminadas";
	$l_cp_tools_update = "Ejecutar archivo de actualizaci&oacute;n";
	$l_cp_tools_export = "Exportar todo a archivo  <acronym title=\"Comma Separated Values\">CSV</acronym>";
		//NB The HTML for the acronym has been included for the sake of completeness, but make sure you leave the slashes before the quotes or TaskStep will break!
	$l_cp_tools_purged = " Borradas.";
	$l_cp_tools_purgecheck = "&iquest;Estas seguro de que quieres borrar todas las tareas finalizadas?";

	//Insert updated parts after this point
	//--1/4/07--
	$l_nav_allitems = "Todos";

	//--28/8/07--
    $l_forms_titledefval = "Titulo de la tarea o acci&oacute;n";
    $l_msg_updateassoctasks = "Actualizar las tareas asociadas?";
    $l_print_commontitle = "Imprimir";
    $l_print_printalltasks = "Tareas";
    $l_print_printtoday = "Hoy";
    $l_print_sectionnotfound = "Secci&oacute;n no encontrado!";
    $l_msg_exportedto="Exportado a";
	//Insert updated parts before this point
?>