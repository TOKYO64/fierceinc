<?php
/* php.ini was changed to E_ALL at some point - 
 * Following should be included to virtually every page on site and should therefore fix the problem. */
if (ini_get('error_reporting') != 'E_ALL & ~E_NOTICE') {
	ini_set('error_reporting','E_ALL & ~E_NOTICE');
}
?>
<?php
	// Change to relocate
	//$URLROOT = "http://localhost/fierceapp/"; 
	//$URLROOT = "http://www.fierceauthorizedprovider.com/";
	$URLROOT = "http://www.fierceinc.com/authorizedprovider/";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title><?php echo $pageTitle; ?> | Fierce Authorized Provider Program</title>
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

<body>
<div id="wrap">
	<div id="borderTop"></div>
	<div id="main">
		<div id="header">
			<a href="http://www.fierceinc.com/" target="FierceInc"><img id="logo" src="<?php echo $URLROOT; ?>images/fierceLogo.png" alt="Fierce" /></a>
			<a href="<?php echo $URLROOT; ?>"><img id="logo" src="<?php echo $URLROOT; ?>images/authorized_provider_program.gif" alt="Fierce" /></a>
			
				<?php /* Home page check */
				if ($_SERVER['SCRIPT_FILENAME'] != $_SERVER['DOCUMENT_ROOT'].'/index.php') { ?>
					<a href="<?php echo $URLROOT; ?>"><img id="homelink" src="<?php echo $URLROOT; ?>images/navhome_off.png" alt="HOME" onmouseover="over_png(this);" onmouseout="out_png(this);" /></a>
				<?php } else { ?>
					<img id="homelink" src="<?php echo $URLROOT; ?>images/navhome_on.png" alt="HOME" />
				<?php } ?>
				
				<div id="nav">
					<ul>
					<?php
					/* In the following list, first item is the directory, second item is the alt text.
					Nav images must be named nav{directory}_off.png & nav{directory}_on.png (e.g. navbook_off.png) */
					$navlinks[] = array('overview','Overview');
					$navlinks[] = array('apply','Apply');
					$navlinks[] = array('facilitators','Certified Facilitators');
					$navlinks[] = array('events','Upcoming Events');
					
					$pathparts = explode('/',$_SERVER['SCRIPT_FILENAME']);
					foreach ($navlinks as $thisLink) {
						/* if($thisLink[0] != $pathparts[count($pathparts)-2]) { */
						if($thisLink[0] != $tab) {
							$suf = 'off';
							$js = ' onmouseover="over_gif(this);" onmouseout="out_gif(this);"';
						} else {
							$suf = 'act';
							$js = '';
						}

						if($thisLink[0] == 'overview')
							$finLinks .= "\t\t\t\t\t".'<li><a href="'. $URLROOT . '"><img src="' . $URLROOT . 'images/nav'.$thisLink[0].'_'.$suf.'.gif" alt="'.$thisLink[1].'"'.$js.'></a></li>'."\n";
						else
							$finLinks .= "\t\t\t\t\t".'<li><a href="'. $URLROOT . $thisLink[0].'"><img src="' . $URLROOT . 'images/nav'.$thisLink[0].'_'.$suf.'.gif" alt="'.$thisLink[1].'"'.$js.'></a></li>'."\n";
					}
					echo $finLinks;
					?>
					</ul>
				</div>
			
			
		</div> 
