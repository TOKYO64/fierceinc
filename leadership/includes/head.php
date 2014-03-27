<?
/* php.ini was changed to E_ALL at some point - 
 * Following should be included to virtually every page on site and should therefore fix the problem. */
if (ini_get('error_reporting') != 'E_ALL & ~E_NOTICE') {
	ini_set('error_reporting','E_ALL & ~E_NOTICE');
}
?>
<?php
	// Change to relocate
	//$URLROOT = "http://localhost/fierceleadership/"; 
	$URLROOT = "http://www.fierceinc.com/leadership/";
	//$URLROOT = "http://www.fierceleadership.com/";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title><?=$pageTitle?> | Fierce Leadership</title>
	<meta name="DC.title" content="" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="copyright" content="" />
	<meta name="revisit-after" content="1 day" />
	<meta name="robots" content="all" />

	<link rel="stylesheet" href="<?php echo $URLROOT; ?>css/main.css" type="text/css" media="screen" />
<!--[if lt IE 8]>
	<link rel="stylesheet" href="<?php echo $URLROOT; ?>css/ie7.css" type="text/css" />
<![endif]-->
	<script type="text/javascript" src="<?php echo $URLROOT; ?>js/rollovers.js"></script>
    
    <script type="text/javascript" src="<?php echo $URLROOT; ?>js/swfobject.js"></script>
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-21651171-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
</head>

<body <?=$bodyTagAddl?>>
<div id="wrap" <?=$wrapTagAddl?>>
	<? if (!$pdfOut) { ?>
	<div id="borderTop"></div>
	<? } ?>
	<div id="main">
		<div id="header">
			<a href="http://www.fierceinc.com/" target="FierceInc"><img id="logo" src="<?php echo $URLROOT; ?>images/fierceLogo.png" alt="fierce" /></a>
			
			<? if (!$pdfOut && !$fierceAssessHead && !$rmNav) { ?>
				
				<? /* Home page check */
				if ($_SERVER['SCRIPT_FILENAME'] != $_SERVER['DOCUMENT_ROOT'].'/index.php') { ?>
				<a href="<?php echo $URLROOT; ?>"><img id="homelink" src="<?php echo $URLROOT; ?>images/navhome_off.png" alt="HOME" onmouseover="over(this);" onmouseout="out(this);" /></a>
				<? } else { ?>
				<img id="homelink" src="<?php echo $URLROOT; ?>images/navhome_on.png" alt="HOME" />
				<? } ?>
				
				<div id="nav">
					<ul>
<?					/* In the following list, first item is the directory, second item is the alt text.
					Nav images must be named nav{directory}_off.png & nav{directory}_on.png (e.g. navbook_off.png) */
					$navlinks[] = array('book','THE BOOK');
					$navlinks[] = array('author','THE AUTHOR');
					$navlinks[] = array('resources','FREE RESOURCES');
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
						$finLinks .= "\t\t\t\t\t".'<li><a href="' . $URLROOT .$thisLink[0].'/"><img src="'. $URLROOT . 'images/nav'.$thisLink[0].'_'.$suf.'.png" alt="'.$thisLink[1].'"'.$js.'></a></li>'."\n";
					}
					echo $finLinks;
					?>
					</ul>
				</div>
			
			<? } elseif ($fierceAssessHead) { /* rm nav and add new stuff to /fierceassessment/ */ ?>
			
				<div style="position: relative; left: 163px; top: -40px; width: 515px; font-size: 90%">
					<img src="<?php echo $URLROOT; ?>images/fierceButton119.png" style="float: right; margin-left: 10px;">
					<h1 class="colorPrimary">Take the Fierce assessment</h1>
					<p>This assessment will give you an overview of your ability to have direct, courageous, clear, successsful and enriching conversations.</p>
					<p>Make your selections fast, go with your gut and remember, this is not about who you want to be but who you are now.</p>
				</div>
			
			<? } ?>
			
		</div> 
