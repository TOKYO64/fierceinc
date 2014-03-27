<?
/* *********************************************************************
 * This is not open source or free software.  License is granted to use 
 * these functions on the site fierceleadership.com only.  This software 
 * is copyright 2009 Gregory Frank (greg@techanchor.com).
 * All rights reserved.  Do not distribute.  
 * ****************************************************************** */
include_once('functions.php');

$mysql_host = '';
$mysql_user = '';
$mysql_password = '';
$mysql_db = '';

mysql_connect($mysql_host, $mysql_user, $mysql_password) or die("couldn't connect to host");
mysql_select_db($mysql_db) or die("couldn't connect to $mysql_db");

// Added these lines so any time we're connecting to the db, we'll sanitize incoming info without having to add it to each page.
$_POST = makeSafeSQL($_POST);
$_GET = makeSafeSQL($_GET);

?>
