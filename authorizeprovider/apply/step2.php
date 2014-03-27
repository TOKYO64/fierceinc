<?php 
	session_start();

	if(!isset($_SESSION['company_name']))
	{
		// Missing data from Step 1: redirect back to there
		header("Location: index.php");
	}

	if($_SERVER['REQUEST_METHOD']!='POST'){
		$pageTitle = "Apply - Step 2";
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
				$$key = $value;
		}

		// Error check
		$error = "";
		if(empty($year_established))
			$error = "Please enter the year your company was established.";
		elseif(empty($describe_current_work))
			$error = "Please describe the work you currently do within the Training and Development field.";
		elseif(!isset($number_employees) || $number_employees == "")
			$error = "Please enter the number of employees at your company.";
		elseif(!isset($number_facilitators) || $number_facilitators == "")
			$error = "Please enter the number of on-staff facilitators at your company (0 if none).";
		elseif(empty($services))
			$error = "Please indicate the services your organization offers.";
		elseif(!isset($consulting_years) || $consulting_years == "")
			$error = "Please indicate the number of years your company has been offering consulting services (0 if none).";
		elseif(!isset($coaching_years) || $coaching_years == "")
			$error = "Please indicate the number of years your company has been offering coaching services (0 if none).";
		elseif(!isset($facilitated_years) || $facilitated_years == "")
			$error = "Please indicate the number of years your company has been offering facilitated training services (0 if none).";
		elseif(!isset($assessments_years) || $assessments_years == "")
			$error = "Please indicate the number of years your company has been offering assessments (0 if none).";
		elseif(empty($region_of_interest))
			$error = "Please enter your region of interest.";
		elseif(empty($industries))
			$error = "Please indicate one or more industries of primary focus.";
		elseif(empty($programs))
			$error = "Please indicate one or more Fierce programs you are interested in providing.";
		elseif(empty($facilitators))
			$error = "Please complete the question \"Upon commencement as an Authorized Provider\"";

		// Set up values from checkbox sets

		// Services
		$services_consulting = false;
		$services_coaching = false;
		$services_training = false;
		$services_assessments = false;
		if(!empty($services))
		{
			if(in_array("consulting", $services))
				$services_consulting = true;

			if(in_array("coaching", $services))
				$services_coaching = true;

			if(in_array("training", $services))
				$services_training = true;

			if(in_array("assessments", $services))
				$services_assessments = true;
		}

		// Services
		$industries_energy = false;
		$industries_transportation = false;
		$industries_industrial = false;
		$industries_consumer_goods = false;
		$industries_health_care = false;
		$industries_consumer_services = false;
		$industries_telecommunications = false;
		$industries_utilities = false;
		$industries_finance = false;
		$industries_technology = false;
		$industries_education = false;
		$industries_government = false;
		$industries_non_profits = false;
		$industries_professional_societies = false;
		if(!empty($industries))
		{
			if(in_array("energy", $industries))
				$industries_energy = true;

			if(in_array("transportation", $industries))
				$industries_transportation = true;

			if(in_array("industrial", $industries))
				$industries_industrial = true;

			if(in_array("consumer goods", $industries))
				$industries_consumer_goods = true;

			if(in_array("health care", $industries))
				$industries_health_care = true;

			if(in_array("consumer services", $industries))
				$industries_consumer_services = true;

			if(in_array("telecommunications", $industries))
				$industries_telecommunications = true;

			if(in_array("utilities", $industries))
				$industries_utilities = true;

			if(in_array("finance", $industries))
				$industries_finance = true;

			if(in_array("technology", $industries))
				$industries_technology = true;

			if(in_array("education", $industries))
				$industries_education = true;

			if(in_array("government", $industries))
				$industries_government = true;

			if(in_array("non-profits", $industries))
				$industries_non_profits = true;

			if(in_array("professional societies", $industries))
				$industries_professional_societies = true;
		}

		// Programs
		$programs_fierce_conversations = false;
		$programs_fierce_accountability = false;
		$programs_fierce_generations = false;
		if(!empty($programs))
		{
			if(in_array("Fierce Conversations", $programs))
				$programs_fierce_conversations = true;

			if(in_array("Fierce Accountability", $programs))
				$programs_fierce_accountability = true;

			if(in_array("Fierce Generations", $programs))
				$programs_fierce_generations = true;
		}

		// Upon commencement
		$facilitators_provide = false;
		$facilitators_contract = false;
		if(!empty($facilitators))
		{
			if(in_array("provide own facilitator", $facilitators))
				$facilitators_provide = true;

			if(in_array("contract with certified Fierce facilitator", $facilitators))
				$facilitators_contract = true;
		}

		if(empty($error))
		{
			// Set session values from this page
			$_SESSION['year_established'] = $year_established;
			$_SESSION['describe_experience'] = $describe_experience;
			$_SESSION['describe_current_work'] = $describe_current_work;
			$_SESSION['number_employees'] = $number_employees;
			$_SESSION['number_facilitators'] = $number_facilitators;
			$_SESSION['services'] = $services;
			$_SESSION['consulting_years'] = $consulting_years;
			$_SESSION['coaching_years'] = $coaching_years;
			$_SESSION['facilitated_years'] = $facilitated_years;
			$_SESSION['assessments_years'] = $assessments_years;
			$_SESSION['other_programs'] = $other_programs;
			$_SESSION['region_of_interest'] = $region_of_interest;
			$_SESSION['industries'] = $industries;
			$_SESSION['programs'] = $programs;
			$_SESSION['facilitators'] = $facilitators;

			// On success forward to Step 3
			header("Location: step3.php");
		}
		else
		{
			$pageTitle = "Apply - Step 2";
			$tab = "apply";
			include('../includes/head.php');
			include('countries.inc');
		}

	}
?>

	<div id="apply-content">
		<h3>Step 2: Company Background & Training Interests</h3>
		<?php
			if(!empty($error))
				echo "<p class=\"error\">$error</p>";
			else
				echo "<p>* indicates required information.</p>";
		?>
		<div id="ap-apply">
			<form id="step2" method="post" action="">
				<p class="question">What year was your company established? *</p>
				<input type="text" name="year_established" value="<?php echo htmlspecialchars($year_established); ?>" style="width: 107px;" />

				<p class="question" style="width: 500px;">If less than 3 years old, please list additional 3 years of relevant training and development experience:</p>
				<textarea name="describe_experience" rows="8" cols="50" wrap="soft" class="experience_input" style="width: 500px;"/><?php echo htmlspecialchars($describe_experience); ?></textarea>

				<p class="question" style="width: 500px;">Describe the training and/or consulting work you currently do within the Training and Development field *</p>
				<textarea name="describe_current_work" rows="8" cols="50" wrap="soft" class="experience_input" style="width: 500px;"/><?php echo htmlspecialchars($describe_current_work); ?></textarea>
				
				<p class="question">Number of employees, including self *</p>
				<input type="text" name="number_employees" value="<?php echo htmlspecialchars($number_employees); ?>" style="width: 37px;" />

				<p class="question">Number of on-staff facilitators *</p>
				<input type="text" name="number_facilitators" value="<?php echo htmlspecialchars($number_facilitators); ?>" style="width: 37px;" />

				<p class="question">What service(s) does your organization currently offer? (check all that apply) *</p>
					<div class="checkbox">
						<input type="checkbox" name="services[]" value="consulting" 
							<?php if($services_consulting) echo "checked"; ?> /><span>consulting</span>
					</div>
					<div class="checkbox">
						<input type="checkbox" name="services[]" value="coaching" 
							<?php if($services_coaching) echo "checked"; ?> /><span>coaching</span>
					</div>
					<div class="checkbox">
						<input type="checkbox" name="services[]" value="training" 
							<?php if($services_training) echo "checked"; ?> /><span>facilitated training</span>
					</div>
					<div class="checkbox">
						<input type="checkbox" name="services[]" value="assessments" 
							<?php if($services_assessments) echo "checked"; ?> /><span>assessments</span>
					</div>
				<div style="clear: both;"></div>

				<div>
				<p class="question">How many years has your organization been offering these services? *</p>
					<p class="years"><input type="text" name="consulting_years" value="<?php echo htmlspecialchars($consulting_years); ?>" 
						style="width: 17px;" /><label>&nbsp;&nbsp;Consulting</label></p>
					<p class="years"><input type="text" name="coaching_years" value="<?php echo htmlspecialchars($coaching_years); ?>" 
						style="width: 17px;" /><label>&nbsp;&nbsp;Coaching</label></p>
					<p class="years"><input type="text" name="facilitated_years" value="<?php echo htmlspecialchars($facilitated_years); ?>" 
						style="width: 17px;" /><label>&nbsp;&nbsp;Facilitated Training</label></p>
					<p class="years"><input type="text" name="assessments_years" value="<?php echo htmlspecialchars($assessments_years); ?>" 
						style="width: 17px;" /><label>&nbsp;&nbsp;Assessments</label></p>
<!--
				<div class="field_titles">
					<p class="field_name">Consulting</p>
					<p class="field_name">Coaching</p>
					<p class="field_name">Facilitated Training</p>
					<p class="field_name">Assessments</p>
				</div>
				<div class="field_values">
					<input type="text" name="consulting_years" value="<?php echo htmlspecialchars($consulting_years); ?>" style="width: 17px;" />
					<input type="text" name="coaching_years" value="<?php echo htmlspecialchars($coaching_years); ?>" style="width: 17px;" />
					<input type="text" name="facilitated_years" value="<?php echo htmlspecialchars($facilitated_years); ?>" style="width: 17px;" />
					<input type="text" name="assessments_years" value="<?php echo htmlspecialchars($assessments_years); ?>" style="width: 17px;" />
				</div>
-->
				</div>
				<div style="clear: both;"></div>

				<p class="question" style="width: 500px;">Please list all other 3rd-party programs you are certified in and/or authorized to provide:</p>
				<textarea name="other_programs" rows="2" cols="50" wrap="soft" class="other_programs_input" style="width: 500px;" /><?php echo htmlspecialchars($other_programs); ?></textarea>
				<div style="clear: both;"></div>

				<p class="question">What is your region of interest? *</p>
				<input type="text" name="region_of_interest" value="<?php echo htmlspecialchars($region_of_interest); ?>" style="width: 259px;" />
				<div style="clear: both;"></div>

				<p class="question">Which industries are your primary focus? (check all that apply) *</p>
					<div class="checkbox">
						<input type="checkbox" class="checkbox" name="industries[]" value="energy"
							<?php if($industries_energy) echo "checked"; ?> /><span>Energy</span>
					</div>
					<div class="checkbox">
						<input type="checkbox" class="checkbox" name="industries[]" value="transportation"
							<?php if($industries_transportation) echo "checked"; ?> /><span>Transportation</span>
					</div>
					<div class="checkbox">
						<input type="checkbox" class="checkbox" name="industries[]" value="industrial"
							<?php if($industries_industrial) echo "checked"; ?> /><span>Industrial</span>
					</div>
					<div class="checkbox">
						<input type="checkbox" class="checkbox" name="industries[]" value="consumer goods"
							<?php if($industries_consumer_goods) echo "checked"; ?> /><span>Consumer Goods</span>
					</div>
					<div class="checkbox">
						<input type="checkbox" class="checkbox" name="industries[]" value="health care"
							<?php if($industries_health_care) echo "checked"; ?> /><span>Health Care</span>
					</div>
					<div class="checkbox">
						<input type="checkbox" class="checkbox" name="industries[]" value="consumer services"
							<?php if($industries_consumer_services) echo "checked"; ?> /><span>Consumer Services</span>
					</div>
					<div class="checkbox">
						<input type="checkbox" class="checkbox" name="industries[]" value="telecommunications"
							<?php if($industries_telecommunications) echo "checked"; ?> /><span>Telecommunications</span>
					</div>
					<div class="checkbox">
						<input type="checkbox" class="checkbox" name="industries[]" value="utilities"
							<?php if($industries_utilities) echo "checked"; ?> /><span>Utilities</span>
					</div>
					<div class="checkbox">
						<input type="checkbox" class="checkbox" name="industries[]" value="finance"
							<?php if($industries_finance) echo "checked"; ?> /><span>Finance</span>
					</div>
					<div class="checkbox">
						<input type="checkbox" class="checkbox" name="industries[]" value="technology"
							<?php if($industries_technology) echo "checked"; ?> /><span>Technology</span>
					</div>
					<div class="checkbox">
						<input type="checkbox" class="checkbox" name="industries[]" value="education"
							<?php if($industries_education) echo "checked"; ?> /><span>Education</span>
					</div>
					<div class="checkbox">
						<input type="checkbox" class="checkbox" name="industries[]" value="government"
							<?php if($industries_government) echo "checked"; ?> /><span>Government</span>
					</div>
					<div class="checkbox">
						<input type="checkbox" class="checkbox" name="industries[]" value="non-profits"
							<?php if($industries_non_profits) echo "checked"; ?> /><span>Non-profits</span>
					</div>
					<div class="checkbox">
						<input type="checkbox" class="checkbox" name="industries[]" value="professional societies"
							<?php if($industries_professional_societies) echo "checked"; ?> /><span>Professional Societies</span>
					</div>
				<div style="clear: both;"></div>

				<p class="question">Which Fierce program(s) are you interested in providing? (check all that apply) *</p>
					<div class="checkbox">
						<input type="checkbox" class="checkbox" name="programs[]" value="Fierce Conversations"
							<?php if($programs_fierce_conversations) echo "checked"; ?> /><span>Fierce Conversations</span>
					</div>
					<div class="checkbox">
						<input type="checkbox" class="checkbox" name="programs[]" value="Fierce Accountability"
							<?php if($programs_fierce_accountability) echo "checked"; ?> /><span>Fierce Accountability</span>
					</div>
					<div class="checkbox">
						<input type="checkbox" class="checkbox" name="programs[]" value="Fierce Generations"
							<?php if($programs_fierce_generations) echo "checked"; ?> /><span>Fierce Generations</span>
					</div>
				<div style="clear: both;"></div>

				<p class="question">Upon commencement as an Authorized Provider, will you: *</p>
					<div class="checkbox">
						<input type="checkbox" class="checkbox" name="facilitators[]" value="provide own facilitator"
							<?php if($facilitators_provide) echo "checked"; ?> /><span>provide your own facilitator</span>
					</div>
					<div class="checkbox">
						<input type="checkbox" class="checkbox" name="facilitators[]" value="contract with certified Fierce facilitator"
							<?php if($facilitators_contract) echo "checked"; ?> /><span>seek to contract with a certified Fierce facilitator</span>
					</div>
				<div style="clear: both;"></div>
				<br/>
				<br/>
				<div style="clear: both;"></div>

				<input class="next_button" type="image" src="<?php echo $URLROOT; ?>images/button_next_step.gif" />

			</form>
		</div>

		<div style="clear: both;"></div>

	</div>
		
<?php include('../includes/foot.php'); ?>
