<?php
/* *********************************************************************
 * This is not open source or free software.  License is granted to use 
 * these functions on the site fierceleadership.com only.  This software 
 * is copyright 2009 Gregory Frank (greg@techanchor.com).
 * All rights reserved.  Do not distribute.  
 * ****************************************************************** */
function makeSafeSQL($data) {
	foreach ($data as $key => $value) {
		if (is_array($value)) {
			$newData[$key] = makeSafeSQL($value);
		} else {
			if (get_magic_quotes_gpc()) {
				$value = stripslashes($value);
			}
			$newData[$key] = mysql_real_escape_string($value);
		}
	}
	return @ $newData;
} // end makeSafeSQL()

function nextSafeID($table) {
	$idQ = mysql_fetch_assoc(mysql_query("SELECT ".$table."ID FROM $table ORDER BY ".$table."ID DESC LIMIT 1"));
	$id = $idQ[$table.'ID'] + 1;
	return $id;
}

function captchaKey($captchaLen) {
	for ($i=0;$i<$captchaLen;$i++) {
		while (!$candidate) {
			$candidate = rand(48,122);
			if (($candidate >= 58 && $candidate <= 64) || ($candidate >= 91 && $candidate <= 96)) {
				unset($candidate);
			}
		}
		$key .= chr($candidate);
		unset($candidate);
	}
	return $key;
} // end captchaKey()

?>
