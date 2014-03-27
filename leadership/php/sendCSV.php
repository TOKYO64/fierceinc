<?
/* *********************************************************************
 * This is not open source or free software.  License is granted to use 
 * these functions on the site fierceleadership.com only.  This software 
 * is copyright 2009 Gregory Frank (greg@techanchor.com).
 * All rights reserved.  Do not distribute.  
 * ****************************************************************** */
if (ini_get('error_reporting') != 'E_ALL & ~E_NOTICE') {
	ini_set('error_reporting','E_ALL & ~E_NOTICE');
}

include_once('sqlConn.php');
$fileSuffix = 'signupExp.csv';

//$writeDir = $_SERVER['DOCUMENT_ROOT'].'/php/csv/';
$writeDir = '/var/www/fierce/www.fierceleadership.com/php/csv/';
$site = 'FierceLeadership.com';
$mailto = 'pmuller@fierceinc.com';//'mat@resultsource.com';
//$mailto = 'smack@luxmedia.com';

// Grab db contents and create new CSV file.
$today = date('Y-m-d-');
$fh = fopen($writeDir.$fileSuffix,'w') or die('no fopen');

$result = mysql_query("DESCRIBE signup");
while ($row = mysql_fetch_assoc($result)) {
	$fieldNames[] = $row['Field'];
}
fputcsv($fh, $fieldNames) or die('no first fputcsv');
mysql_free_result($result);

$result = mysql_query("SELECT * FROM signup WHERE New = 1 ORDER BY Date_Stamp DESC");
if (mysql_num_rows($result) > 0) {
	while ($row = mysql_fetch_assoc($result)) {
		fputcsv($fh, $row) or die('no later fputcsv');
		$entriesToSend[] = $row['signupID'];
	}
}
mysql_free_result($result);
fclose($fh);

/* This section is only relevant when we're creating a new file each
 * week.  That doesn't work for crontab application.
// Remove old CSV file.
$lastWk = date('Y-m-d',strtotime('-1 week'));
unlink($writeDir.$lastWk.$fileSuffix);
*/

// Set up attachment and send email.
$attachment['name'] = $today.$fileSuffix;
$attachment['content'] = chunk_split(base64_encode(file_get_contents($writeDir.$fileSuffix)));
$rHash = md5(date('r', time()));

$mailSubject = $site.' Signups CSV export';
$mailHeaders =	'From: Mat Miller <mat@pinkmoonmedia.com>'."\n".
				'Return-Path: mat@pinkmoonmedia.com'."\n".
				'Reply-To: mat@pinkmoonmedia.com'."\n".
				'MIME-Version: 1.0'."\n".
				'X-Mailer: php Mailer'."\n";

if ($entriesToSend) {
	$mailHeaders .= 'Content-type: multipart/mixed; boundary=phpMix-'.$rHash."\n";
	
	$message =	'--phpMix-'.$rHash."\n".
				'Content-Type: text/html; charset="iso-8859-1"'."\n".
				'Content-Transfer-Encoding: 7bit'."\n\n".
				'This week\'s CSV export of the Signup database for '.$site.' is attached.'."\n\n";

	$message .=	"\n".'--phpMix-'.$rHash."\n".
						'Content-Type: application/octet-stream; name="'.$attachment['name'].'"'."\n".
						'Content-Transfer-Encoding: base64'."\n\n".
						$attachment['content']."\n";

	$updList = implode(',',$entriesToSend);
	mysql_query("UPDATE signup SET New = 0 WHERE signupID IN ($updList)");
} else {
	$message = 'No new signups to report.';
}

if (mail($mailto, $mailSubject, $message, $mailHeaders)) {
	echo "\n".$site.' weekly report email sent.';
} else {
	echo "\n".'There was a problem with the '.$site.' weekly report email.';
}

?>
