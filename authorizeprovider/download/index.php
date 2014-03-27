<?php 
	if (!function_exists('validEmail')) {
	function validEmail($email) {
		if (!preg_match("/^([\w|\.|\-|_]+)@([\w||\-|_]+)\.([\w|\.|\-|_]+)$/i", $email)) {
			return false;
			exit;
		}
		return true;
	}
	}

	$bShowForm = true;
	$pageTitle = "Download";
	include('../includes/head.php');
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		// Clean post data
		foreach ($_POST as $key => $value) {
			$$key = '';
			$$key = strip_tags(trim(addslashes($value)));
		}

		// Error check
		$error = "";
		if(empty($name))
			$error = "Please enter your contact name.";
		elseif(empty($email))
			$error = "Please enter your email address.";
		elseif(!validEmail($email))
			$error = "Please enter a valid email address.";

		if(empty($error))
		{
			$bShowForm = false;

	$message = "-- Contact Information from the AP website for Powerpoint Download --

Name: $name
Company Name: $company_name
Email Address: $email

";

	@mail("ap@fierceinc.com", "[From the AP Website] Contact Information for Powerpoint Download", $message, 
		"From: $name <$email>\r\nReply-To: $email\r\n");
		}
	}
?>

	<div id="download-content">
<?php 
	if(!$bShowForm) {
?>
		<p>Thank you for providing your information. You may now download the Powerpoint presentation by clicking on the link below.</p>

	   	<div id="powerpoint">
			<a href="http://www.fierceinc.com/uploads/pdfs/Fierce Authorized Provider Overview-1.ppt" target="_blank">
				<img src="../images/icon_powerpoint.gif" width="27" height="37" />
			</a>
			<div>
				<a href="http://www.fierceinc.com/uploads/pdfs/Fierce Authorized Provider Overview-1.ppt" target="_blank">DOWNLOAD POWERPOINT PRESENTATION</a>
			</div>
		</div>
<?php 
	} else {
?>
		<p>Please provide us with some information about yourself and you may then download the Powerpoint presentation.</p>
		<br/>
		<?php
			if(!empty($error))
				echo "<p class=\"error\">$error</p>";
			else
				echo "<p>* indicates required information.</p>";
		?>
		<div id="download-apply">
			<form method="post" action="" optify_submit="true">
				<div class="field" style="width: 217px;">
					<label style="width: 217px;">Name *</label>
					<input type="text" name="name" value="<?php echo htmlspecialchars($name); ?>" style="width: 207px;" />
				</div>

				<div class="field" style="width: 217px;">
					<label>Company Name</label>
					<input type="text" name="company_name" value="<?php echo htmlspecialchars($company_name); ?>" style="width: 207px;" />
				</div>

				<div class="field" style="width: 217px;">
					<label style="width: 217px;">Email Address *</label>
					<input type="text" name="email" value="<?php echo htmlspecialchars($email); ?>" style="width: 207px;" />
				</div>
				<div style="clear: both;">&nbsp;</div>

				<div><input class="submit_button" type="image" src="<?php echo $URLROOT; ?>images/button_submit.gif" /></div>
			</form>
		</div>

		<div style="clear: both;"></div>

<?php 
	}
?>

	</div>

	<div style="clear: both;"></div>

		
<?php include('../includes/foot.php'); ?>
