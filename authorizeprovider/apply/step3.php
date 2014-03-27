<?php 
	session_start();

	if(!isset($_SESSION['company_name']))
	{
		// Missing data from Step 1: redirect back to there
		header("Location: index.php");
	}
	elseif(!isset($_SESSION['services']))
	{
		// Missing data from Step 2: redirect back to there
		header("Location: step2.php");
	}

	include('sendform.inc');

	if($_SERVER['REQUEST_METHOD']!='POST'){
		$pageTitle = "Apply";
		$tab = "apply";
		include('../includes/head.php');
	}
	else {
		// $_SERVER['REQUEST_METHOD']=='POST': Clean post data
		foreach ($_POST as $key => $value) {
			$$key = '';

			if(!is_array($value))
				$$key = strip_tags(trim(addslashes($value)));
			else
			{
				$$key = $value;
			}
		}

		// Error check
		$error = "";
		if(empty($describe_objectives))
			$error = "Please describe your objectives in becoming a Fierce Authorized Provider.";
		elseif(empty($describe_support))
			$error = "Please describe how this authorization will both support and enhance your existing business.";
		elseif(empty($references))
			$error = "Please indicate if you are willing to arrange reference calls.";
		elseif(empty($declare))
			$error = "Please check the box next to \"I declare\".";
		elseif(empty($declare_name))
			$error = "Please enter your full name in the field below the checkbox.";

		if(empty($error))
		{
			// Set session values - just in case of more pages in future
			$_SESSION['describe_objectives'] = $describe_objectives;
			$_SESSION['describe_support'] = $describe_support;
			$_SESSION['reference'] = $references;
			$_SESSION['declare'] = $declare;
			$_SESSION['declare_name'] = $declare_name;

			// Create and send email with form info
			SendForm();

			// On success forward to Thank you
			header("Location: thankyou.php");
		}
		else
		{
			$pageTitle = "Apply - Step 3";
			$tab = "apply";
			include('../includes/head.php');
		}

	}
?>

	<div id="apply-content">
		<h3>Step 3: Objectives</h3>
		<?php
			if(!empty($error))
				echo "<p class=\"error\">$error</p>";
			else
				echo "<p>* indicates required information.</p>";
		?>
		<div id="ap-apply">
			<form method="post" action="">
				<p class="question" style="width: 500px;">Describe your objectives in becoming a Fierce Authorized Provider *</p>
				<textarea name="describe_objectives" rows="8" cols="50" wrap="soft" class="experience_input" style="width: 500px;"/><?php echo htmlspecialchars($describe_objectives); ?></textarea>
				<div style="clear: both;"></div>

				<p class="question" style="width: 500px;">Describe how this authorization will both support and enhance your existing business *</p>
				<textarea name="describe_support" rows="8" cols="50" wrap="soft" class="experience_input" style="width: 500px;"/><?php echo htmlspecialchars($describe_support); ?></textarea>
				<div style="clear: both;"></div>
				<p></p>

				<p class="question">Would you be willing to arrange reference calls with 3 clients you've had in the past 5 years, as a last 
					step in determining program eligibility? *</p>
					<input type="radio" class="radio" name="references" value="yes"
					<?php if($references == "yes") echo "checked"; ?> /><span>yes</span>
					<input type="radio" class="radio" name="references" value="no"
					<?php if($references == "no") echo "checked"; ?> /><span>no</span>
				<div style="clear: both;"></div>

				<p class="question"><input type="checkbox" class="checkbox" name="declare" value="declare" style="margin-top: 3px;"
					<?php if(!empty($declare)) echo "checked"; ?> />
					&nbsp;&nbsp;I declare that the information given in this Authorized Provider Application Form is true and correct.</p>
				<div style="clear: both;"></div>
				<p></p>

				<p class="question" style="width: 500px;">Enter your full name *</p>
				<input type="text" name="declare_name" value="<?php echo htmlspecialchars($declare_name); ?>" style="width: 307px;" />
				<div style="clear: both;"></div>
				<br/>

				<input class="submit_button" type="image" src="<?php echo $URLROOT; ?>images/button_submit.gif" />

			</form>
		</div>

		<div style="clear: both;"></div>

	</div>
		
<?php include('../includes/foot.php'); ?>
