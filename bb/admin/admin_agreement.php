<?php

/***************************************************************************
 *                              admin_agreement.php
 *                            -------------------
 *   begin                : Thursday, Dec 22, 2005
 *   copyright            : (C) 2005 by NEDKA (Nguyen Dang Khoa)
 *   email                : admin@thuvienhoahoc.info
 *
 *   $Id: admin_agreement.php,v 1.0.0 2005/12/22 15:17:13 acydburn Exp $
 *
 *
 ***************************************************************************/

/***************************************************************************
 *
 *   This program is free software; you can redistribute it and/or modify
 *   it under the terms of the GNU General Public License as published by
 *   the Free Software Foundation; either version 2 of the License, or
 *   (at your option) any later version.
 *
 ***************************************************************************/

define('IN_PHPBB', 1);

//
// First we do the setmodules stuff for the admin cp.
//
if( !empty($setmodules) )
{
	$filename = basename(__FILE__);
	$module['General']['Agreement Terms'] = "$file";
	return;
}

//
// Load default header
//
$phpbb_root_path = "./../";
require($phpbb_root_path . 'extension.inc');
require('./pagestart.' . $phpEx);

//
// Output details
//
	$template->set_filenames(array(
        'body' => 'admin/admin_agreement.tpl')
	);

    if(isset($_POST['post']))
	{
        $agreement_data = addslashes($_POST['agreement_form']);
        $query = mysql_query("UPDATE " . AGREEMENT_TABLE . " SET agreement_text = '" . addslashes($_POST['agreement_form']) . "' WHERE id = 1");
    }

        $sql = mysql_query("SELECT agreement_text FROM " . AGREEMENT_TABLE);
        if(!$sql) { echo mysql_error(); };
        $agreement = mysql_fetch_array($sql);

        $template->assign_vars(array(
				"S_AGREEMENT_ACTION" => append_sid("admin_agreement.$phpEx"),	
				
				"L_TITLE_AGREEMENT_TEXT" => $lang['Title_Agreement_Text'],
				"L_AGREEMENT_TEXT" => $lang['Agreement_Text'],
				"L_SAVE_AGREEMENT_TEXT" => $lang['Save_Agreement_Text'],
				"L_RESET_AGREEMENT_TEXT" => $lang['Reset_Agreement_Text'],
					
                "AGREEMENT_TEXT" => stripslashes($agreement['agreement_text']))
        );

	//
	// Spit out the page.
	//
	$template->pparse("body");

//
// Page Footer
//
include('./page_footer_admin.'.$phpEx);

?>

