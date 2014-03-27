<?
/* php.ini was changed to E_ALL at some point - 
 * Following should be included to virtually every page on site and should therefore fix the problem. */
if (ini_get('error_reporting') != 'E_ALL & ~E_NOTICE') {
	ini_set('error_reporting','E_ALL & ~E_NOTICE');
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title><?=$pageTitle?> | Fierce Conversations</title>
	<meta name="DC.title" content="" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="copyright" content="" />
	<meta name="revisit-after" content="1 day" />
	<meta name="robots" content="all" />

	<link rel="stylesheet" href="/css/main.css" type="text/css" media="screen" />
<!--[if lt IE 8]>
	<link rel="stylesheet" href="/css/ie7.css" type="text/css" />
<![endif]-->
	<script type="text/javascript" src="/js/rollovers.js"></script>
    
    <script type="text/javascript" src="/js/swfobject.js"></script>
</head>

<body <?=$bodyTagAddl?>>
<div id="wrap" <?=$wrapTagAddl?>>
	<? if (!$pdfOut) { ?>
	<div id="borderTop"></div>
	<? } ?>
	<div id="main">
		<div id="header">
			<a href="http://www.fierceinc.com/" target="FierceInc"><img id="logo" src="http://fierceinc.com/dev.fc/images/fierceLogo.png" alt="fierce" /></a>
			
			<? if (!$pdfOut) { ?>
				
				<? /* Home page check */
				if ($_SERVER['SCRIPT_FILENAME'] != $_SERVER['DOCUMENT_ROOT'].'/index.php') { ?>
				<a href="http://fierceinc.com/dev.fc/"><img id="homelink" src="http://fierceinc.com/dev.fc/images/navhome_off.png" alt="HOME" onmouseover="over(this);" onmouseout="out(this);" /></a>
				<? } else { ?>
				<img id="homelink" src="http://fierceinc.com/dev.fc/images/navhome_on.png" alt="HOME" />
				<? } ?>
				
				<div id="nav">
					<ul>
<?					/* In the following list, first item is the directory, second item is the alt text.
					Nav images must be named nav{directory}_off.png & nav{directory}_on.png (e.g. navbook_off.png) */
					$navlinks[] = array('book','THE BOOK');
					$navlinks[] = array('author','THE AUTHOR');
					$navlinks[] = array('keynotes','KEYNOTES');
					$navlinks[] = array('training','FIERCE TRAINING');
					
					$pathparts = explode('/',$_SERVER['SCRIPT_FILENAME']);
					foreach ($navlinks as $thisLink) {
						if($thisLink[0] != $pathparts[count($pathparts)-2]) {
							$suf = 'off';
							$js = ' onmouseover="over(this);" onmouseout="out(this);"';
						} else {
							$suf = 'act';
							$js = '';
						}
						$finLinks .= "\t\t\t\t\t".'<li><a href="/dev.fc/'.$thisLink[0].'/"><img src="http://fierceinc.com/dev.fc/images/nav'.$thisLink[0].'_'.$suf.'.png" alt="'.$thisLink[1].'"'.$js.'></a></li>'."\n";
					}
					echo $finLinks;
					?>
					</ul>
				</div>
			
			<? } ?>
			
		</div> 
