<?php
/* *********************************************************************
 * This is not open source or free software.  License is granted to use 
 * these functions on the site fierceleadership.com only.  This software 
 * is copyright 2009 Gregory Frank (greg@techanchor.com).
 * All rights reserved.  Do not distribute.  
 * ****************************************************************** */
include_once('sqlConn.php');
include_once('functions.php');

// Change to relocate
//$URLROOT = "http://localhost/fierceleadership/"; 
$URLROOT = "http://www.fierceinc.com/leadership/";
//$URLROOT = "http://www.fierceleadership.com/";

$signupLink = $URLROOT.'resources/';
$resourceLink = $URLROOT.'resources/downloads.php';
$unsubLink = $URLROOT.'unsubscribe/?e=';
$fromEmail = 'info@fierceinc.com';
$fromName = 'FierceLeadership.com';

// Did they post anything?  Shouldn't be here otherwise.
if (!$_POST) {
	exit();
}
if ($_POST['firstname'] == '' || $_POST['lastname'] == '' || $_POST['company'] == '' || $_POST['title'] == '' || $_POST['zip'] == '' || 
	$_POST['email'] == '' || $_POST['phone'] == '' ) {
	unset($_POST['submit']);
	foreach ($_POST as $key => $item) {
		$append .= '&'.$key.'='.urlencode($item);
	}
	header('Location: '.$signupLink.'?err=blank'.$append.'#form');
	exit();
}

// A few data handling routines.
if ($_POST['email'] == $_POST['confirm_email']) {
	$email = $_POST['email'];
} else {
	$error = 'Your emails did not match.';
}
//$phone = isset($_POST['ph1'])?$_POST['ph1'].'-'.$_POST['ph2'].'-'.$_POST['ph3']:'';

$randKey = captchaKey(16);

// Check whether in database already.
$res0 = mysql_query("SELECT Email FROM signup WHERE Email = '$email'");
if (mysql_num_rows($res0) != 1  && !$error) {
	// Update the database.
	$_POST = array_map('ucwords',$_POST);
	$newID = nextSafeID('signup');
	$query = "INSERT INTO signup VALUES ($newID,'".$_POST['firstname']."','".$_POST['lastname']."','".$_POST['company']."','".$_POST['title']."','".$_POST['address']."','".$_POST['city']."','".$_POST['state']."','".$_POST['zip']."','".$_POST['country']."','$email','".$_POST['phone']."','yes',NOW(),'no','$randKey',1)";
	if (!mysql_query($query)) {
		$error = 'We apologize.  There has been an error with the database.  Did you sign up previously?  In that case you can <a href="/resourcedownloads/">reach the downloads here</a>.'.mysql_error();
	}
} elseif (!$error) {
	// Generated a new randKey, so update their record with that.
	mysql_query("UPDATE signup SET RandKey = '$randKey' WHERE Email = '$email'");
}

if (!$error) {
	$resourceLink .= '?key='.$randKey;
	$content = file_get_contents('emailMsg.txt');
	
	$repl = array('{FIRSTNAME}','{RESOURCEDOWNLOADLINK}','{UNSUBSCRIBELINK}');
	$with = array($_POST['firstname'],$resourceLink,$unsubLink.$email);
	
	$message = str_replace($repl,$with,$content);
	$mailto = $email;
	$mailSubject = 'Thank you for signing up.';
	$mailHeaders =	'From: '.$fromName.' <'.$fromEmail.'>'."\n".
					'Return-Path: '.$fromEmail."\n".
					'Reply-To: '.$fromEmail."\n".
					'MIME-Version: 1.0'."\n".
					'X-Mailer: php Mailer'."\n";

	if (mail($mailto, $mailSubject, $message, $mailHeaders)) {
		mysql_query("UPDATE signup SET Sent_Initial='yes' WHERE signupID = $newID");
	} else {
		echo 'If you see this, there is a problem with the email.';
	}
	header('Location: '.$URLROOT.'thankyou/');
	exit();

} else {
	unset($_POST['submit']);
	foreach ($_POST as $key => $val) {
		$getVars .= '&'.$key.'='.urlencode($val);
	}
	$pageContent .= '<h1>Error</h1>';
	$pageContent .= '<p>'.$error.'</p>';
	$pageContent .= '<p>Please <a href="'.$signupLink.'?'.$getVars.'">go back</a> and try again.</p>';
	include_once('template.php');
}
?>
