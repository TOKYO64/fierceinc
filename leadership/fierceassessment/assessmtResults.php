<?php 
/* *********************************************************************
 * This is not open source or free software.  License is granted to use 
 * these functions on the site fierceleadership.com only.  This software 
 * is copyright 2009 Gregory Frank (greg@techanchor.com).
 * All rights reserved.  Do not distribute.  
 * ****************************************************************** */
$pageTitle = "Assessment";
if (!$_POST) { 
	exit();
}
unset($_POST['submit']);

include('../php/sqlConn.php');

$rmNav = true;
include('../includes/head.php');
$total = array_sum($_POST);
$ansPassThru = urlencode(serialize($_POST));

require('../resources/assessmtResultOptions.php');

?>

		<div id="resourceContent">

			<h1 class="colorPrimary">Personal Beliefs</h1>
			
			<p>The paragraph below is the interpretation of your answers. At the bottom of the page, click on the feedback button and you will link to the 15 questions, your answers (in bold) and some additional feedback and food for thought.<strong> </strong>As in our workshops, we’re not asking you to change your behaviors, just take a look and ask yourself if you’re getting the results you want from your career, your relationships and your life. Then you decide what you need to do. We hope that this assessment will create the same self-generated insight that our participants experience in our workshops. </p>
			
		  <br />
			<br />
			
			<h2 class="colorPrimary"><em>Interpretation of Results</em></h2>
			
			<p><?=$results?></p>
			
			<br />
			<br />

			<h2 class="colorPrimary"><em>Additional Results</em></h2>
			
			<?=$addlResults?>
			
			<br />
			
			<p><a href="assessmtFeedback.php?a=<?=$ansPassThru?>"><img src="../images/buttonfeedback.png" width="81" height="27" alt="Feedback" /></a></p>
			
		</div>

<? include('../includes/foot.php'); ?>
