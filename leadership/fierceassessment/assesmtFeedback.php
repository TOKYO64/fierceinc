<?php 
/* *********************************************************************
 * This is not open source or free software.  License is granted to use 
 * these functions on the site fierceleadership.com only.  This software 
 * is copyright 2009 Gregory Frank (greg@techanchor.com).
 * All rights reserved.  Do not distribute.  
 * ****************************************************************** */
error_reporting( E_ALL  & ~E_NOTICE );

$pageTitle = "Assessment";

/*
include('../php/sqlConn.php');
*/
/* Check whether they're signed in. */
/*
require_once('checkSignup.php');
*/

$rmNav = true;
include('../includes/head.php');

include_once('../resources/assessmtFeedbackInternal.php');
		
include('../includes/foot.php'); ?>
