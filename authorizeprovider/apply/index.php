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

	if($_SERVER['REQUEST_METHOD']!='POST'){
		$pageTitle = "Apply - Step 1";
		$tab = "apply";
		include('../includes/head.php');
		include('countries.inc');
	}
	else {
		session_start();

		// Clean post data
		foreach ($_POST as $key => $value) {
			$$key = '';
			$$key = strip_tags(trim(addslashes($value)));
		}

		$entered_country = $country;

		// Error check
		$error = "";
		if(empty($company_name))
			$error = "Please enter your company name.";
		elseif(empty($address1))
			$error = "Please enter your company address.";
		elseif(empty($city))
			$error = "Please enter your company city or town.";
		elseif(empty($state))
			$error = "Please enter your state or province.";
		elseif(empty($postal_code))
			$error = "Please enter your postal code.";
		elseif(empty($company_phone))
			$error = "Please enter your company phone number.";
		elseif(empty($company_email))
			$error = "Please enter your company email address.";
		elseif(!validEmail($company_email))
			$error = "Please enter a valid company email address.";
		elseif(empty($company_website))
			$error = "Please enter your company website URL.";
		elseif(empty($primary_first_name))
			$error = "Please enter your primary contact first name.";
		elseif(empty($primary_last_name))
			$error = "Please enter your primary contact last name.";
		elseif(empty($primary_title))
			$error = "Please enter your primary contact title.";
		elseif(empty($primary_phone))
			$error = "Please enter your primary contact phone number.";
		elseif(empty($primary_email))
			$error = "Please enter your primary contact email address.";
		elseif(!validEmail($primary_email))
			$error = "Please enter a valid primary contact email address.";

		if(empty($error))
		{
			// Set session values from this page
			$_SESSION['company_name'] = $company_name;
			$_SESSION['country'] = $country;
			$_SESSION['address1'] = $address1;
			$_SESSION['address2'] = $address2;
			$_SESSION['city'] = $city;
			$_SESSION['state'] = $state;
			$_SESSION['postal_code'] = $postal_code;
			$_SESSION['company_phone'] = $company_phone;
			$_SESSION['company_fax'] = $company_fax;
			$_SESSION['company_email'] = $company_email;
			$_SESSION['company_website'] = $company_website;
			$_SESSION['primary_first_name'] = $primary_first_name;
			$_SESSION['primary_last_name'] = $primary_last_name;
			$_SESSION['primary_title'] = $primary_title;
			$_SESSION['primary_phone'] = $primary_phone;
			$_SESSION['primary_fax'] = $primary_fax;
			$_SESSION['primary_email'] = $primary_email;
			$_SESSION['secondary_first_name'] = $secondary_first_name;
			$_SESSION['secondary_last_name'] = $secondary_last_name;
			$_SESSION['secondary_title'] = $secondary_title;
			$_SESSION['secondary_phone'] = $secondary_phone;
			$_SESSION['secondary_fax'] = $secondary_fax;
			$_SESSION['secondary_email'] = $secondary_email;

			// On success forward to Step 2
			header("Location: step2.php");
		}
		else
		{
			$pageTitle = "Apply - Step 1";
			$tab = "apply";
			include('../includes/head.php');
			include('countries.inc');
		}

	}
?>

	<div id="apply-content">
		<h2>Authorized Provider Online Application</h2>
		<p>If you are interested in becoming an Authorized Provider and would like to apply, please complete the following 
			online application.</p>
		<br/>
		<h3>Step 1: Company Information</h3>
		<?php
			if(!empty($error))
				echo "<p class=\"error\">$error</p>";
			else
				echo "<p>* indicates required information.</p>";
		?>
		<div id="ap-apply">
			<form method="post" action="">
				<h4>Company</h4>
				<div style="clear: both;"></div>

				<div class="field" style="width: 217px;">
					<label>Company Name *</label>
					<input type="text" name="company_name" value="<?php echo htmlspecialchars($company_name); ?>" style="width: 207px;" />
				</div>
				<div style="clear: both;"></div>

				<div class="field" style="width: 267px;"><label>Country *</label>
				<select name="country">
				<?php
				foreach($countries as $country)
				{
					if($entered_country)
					{
						// Revisiting this form (on error) with a country already entered, so don't use US default
						if($country == $entered_country)
							echo "<option value=\"$country\" selected>$country</option>";
						else
							echo "<option value=\"$country\">$country</option>";
					}
					else
					{
						// First time through - US is default
						if($country == "United States")
							echo "<option value=\"$country\" selected>$country</option>";
						else
							echo "<option value=\"$country\">$country</option>";
					}
				}
				?>
				</select></div>
				<div style="clear: both;"></div>

				<div class="field" style="width: 317px;">
					<label>Address Line 1 *</label>
					<input type="text" name="address1" value="<?php echo htmlspecialchars($address1); ?>" style="width: 307px;" />
				</div>
				<div style="clear: both;"></div>

				<div class="field" style="width: 317px;">
					<label>Address Line 2</label>
					<input type="text" name="address2" value="<?php echo htmlspecialchars($address2); ?>" style="width: 307px;" />
				</div>
				<div style="clear: both;"></div>

				<div class="field" style="width: 147px;">
					<label style="width: 147px;">City *</label>
					<input type="text" name="city" value="<?php echo htmlspecialchars($city); ?>" style="width: 137px;" />
				</div>
				<div class="field" style="width: 147px;">
					<label style="width: 147px;">State / Province *</label>
					<input type="text" name="state" value="<?php echo htmlspecialchars($state); ?>" style="width: 137px;" />
				</div>
				<div class="field" style="width: 117px;">
					<label style="width: 117px;">Postal Code *</label>
					<input type="text" name="postal_code" value="<?php echo htmlspecialchars($postal_code); ?>" style="width: 107px;" />
				</div>
				<div style="clear: both;"></div>

				<div class="field" style="width: 217px;">
					<label>Phone *</label>
					<input type="text" name="company_phone" value="<?php echo htmlspecialchars($company_phone); ?>" style="width: 207px;" />
				</div>
				<div style="clear: both;"></div>

				<div class="field" style="width: 217px;">
					<label>Fax</label>
					<input type="text" name="company_fax" value="<?php echo htmlspecialchars($company_fax); ?>" style="width: 207px;" />
				</div>
				<div style="clear: both;"></div>

				<div class="field" style="width: 337px;">
					<label>Company Email *</label>
					<input type="text" name="company_email" value="<?php echo htmlspecialchars($company_email); ?>" style="width: 327px;" />
				</div>
				<div style="clear: both;"></div>

				<div class="field" style="width: 269px;">
					<label style="width: 269px;">Company Website URL *</label>
					<input type="text" name="company_website" value="<?php echo htmlspecialchars($company_website); ?>" style="width: 259px;" />
				</div>
				<div style="clear: both;"></div>

				<h4>Primary Contact</h4>

				<div class="field" style="width: 217px;">
					<label style="width: 217px;">First / Given Name *</label>
					<input type="text" name="primary_first_name" value="<?php echo htmlspecialchars($primary_first_name); ?>" style="width: 207px;" />
				</div>
				<div class="field" style="width: 217px;">
					<label style="width: 217px;">Last / Surname *</label>
					<input type="text" name="primary_last_name" value="<?php echo htmlspecialchars($primary_last_name); ?>" style="width: 207px;" />
				</div>
				<div style="clear: both;"></div>

				<div class="field" style="width: 117px;">
					<label style="width: 117px;">Title *</label>
					<input type="text" name="primary_title" value="<?php echo htmlspecialchars($primary_title); ?>" style="width: 107px;" />
				</div>
				<div style="clear: both;"></div>

				<div class="field" style="width: 217px;">
					<label style="width: 217px;">Phone *</label>
					<input type="text" name="primary_phone" value="<?php echo htmlspecialchars($primary_phone); ?>" style="width: 207px;" />
				</div>
				<div style="clear: both;"></div>

				<div class="field" style="width: 217px;">
					<label style="width: 217px;">Fax</label>
					<input type="text" name="primary_fax" value="<?php echo htmlspecialchars($primary_fax); ?>" style="width: 207px;" />
				</div>
				<div style="clear: both;"></div>

				<div class="field" style="width: 217px;">
					<label style="width: 217px;">Email *</label>
					<input type="text" name="primary_email" value="<?php echo htmlspecialchars($primary_email); ?>" style="width: 207px;" />
				</div>
				<div style="clear: both;"></div>

				<h4>Secondary Contact</h4>

				<div class="field" style="width: 217px;">
					<label style="width: 217px;">First / Given Name</label>
					<input type="text" name="secondary_first_name" value="<?php echo htmlspecialchars($secondary_first_name); ?>" style="width: 207px;" />
				</div>
				<div class="field" style="width: 217px;">
					<label style="width: 217px;">Last / Surname</label>
					<input type="text" name="secondary_last_name" value="<?php echo htmlspecialchars($secondary_last_name); ?>" style="width: 207px;" />
				</div>
				<div style="clear: both;"></div>

				<div class="field" style="width: 117px;">
					<label style="width: 117px;">Title</label>
					<input type="text" name="secondary_title" value="<?php echo htmlspecialchars($secondary_title); ?>" style="width: 107px;" />
				</div>
				<div style="clear: both;"></div>

				<div class="field" style="width: 217px;">
					<label style="width: 217px;">Phone</label>
					<input type="text" name="secondary_phone" value="<?php echo htmlspecialchars($secondary_phone); ?>" style="width: 207px;" />
				</div>
				<div style="clear: both;"></div>

				<div class="field" style="width: 217px;">
					<label style="width: 217px;">Fax</label>
					<input type="text" name="secondary_fax" value="<?php echo htmlspecialchars($secondary_fax); ?>" style="width: 207px;" />
				</div>
				<div style="clear: both;"></div>

				<div class="field" style="width: 217px;">
					<label style="width: 217px;">Email</label>
					<input type="text" name="secondary_email" value="<?php echo htmlspecialchars($secondary_email); ?>" style="width: 207px;" />
				</div>
				<div style="clear: both;"></div>

				<input class="next_button" type="image" src="<?php echo $URLROOT; ?>images/button_next_step.gif" />

			</form>
		</div>

		<div style="clear: both;"></div>

	</div>
	<div style="clear: both;"></div>

		
<?php include('../includes/foot.php'); ?>
