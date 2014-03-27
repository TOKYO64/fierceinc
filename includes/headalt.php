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
	<title><?=$pageTitle?> | Fierce Leadership</title>
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
    
    <script type="text/javascript" src="/swfobject.js"></script>
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
			<a href="http://www.fierceinc.com/" target="FierceInc"><img id="logo" src="/healthcareimages/fiercelogo_rev.jpg" alt="fierce" /></a>
			
			<? /* Home page check */
			if ($_SERVER['SCRIPT_FILENAME'] != $_SERVER['DOCUMENT_ROOT'].'/index.php') { ?>
			<? } ?>
			
		
		</div> 
