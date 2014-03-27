<?php
function SendForm()
{
	// Accumulate services checkboxes
	$services = "";
	for($i=0; $i < count($_SESSION['services']); $i++)
	{
		$services .= $_SESSION['services'][$i];
		if($i < count($_SESSION['services']) - 1)
			$services .= ", ";
		else
			$services .= ".";
	}

	// Accumulate industries checkboxes
	$industries = "";
	for($i=0; $i < count($_SESSION['industries']); $i++)
	{
		$industries .= $_SESSION['industries'][$i];
		if($i < count($_SESSION['industries']) - 1)
			$industries .= ", ";
		else
			$industries .= ".";
	}

	// Accumulate programs checkboxes
	$programs = "";
	for($i=0; $i < count($_SESSION['programs']); $i++)
	{
		$programs .= $_SESSION['programs'][$i];
		if($i < count($_SESSION['programs']) - 1)
			$programs .= ", ";
		else
			$programs .= ".";
	}

	// Accumulate facilitators question checkboxes
	$facilitators = "";
	for($i=0; $i < count($_SESSION['facilitators']); $i++)
	{
		$facilitators .= $_SESSION['facilitators'][$i];
		if($i < count($_SESSION['facilitators']) - 1)
			$facilitators .= ", ";
		else
			$facilitators .= ".";
	}

	$message = "-- Application Form from the AP website --

Step 1

Company Name: {$_SESSION['company_name']}
Country: {$_SESSION['country']}
Address Line 1: {$_SESSION['address1']}
Address Line 2: {$_SESSION['address2']}
City: {$_SESSION['city']}
State: {$_SESSION['state']}
Postal Code: {$_SESSION['postal_code']}
Company Phone: {$_SESSION['company_phone']}
Fax: {$_SESSION['company_fax']}
Email: {$_SESSION['company_email']}
Website: {$_SESSION['company_website']}
Primary Contact First Name: {$_SESSION['primary_first_name']}
Primary Contact Last Name: {$_SESSION['primary_last_name']}
Primary Contact Title: {$_SESSION['primary_title']}
Primary Contact Phone: {$_SESSION['primary_phone']}
Primary Contact Fax: {$_SESSION['primary_fax']}
Primary Contact Email: {$_SESSION['primary_email']}
Secondary Contact First Name: {$_SESSION['secondary_first_name']}
Secondary Contact Last Name: {$_SESSION['secondary_last_name']}
Secondary Contact Title: {$_SESSION['secondary_title']}
Secondary Contact Phone: {$_SESSION['secondary_phone']}
Secondary Contact Fax: {$_SESSION['secondary_fax']}
Secondary Contact Email: {$_SESSION['secondary_email']}

Step 2

Company Year Established: {$_SESSION['year_established']}

Training and Development Experience: 
{$_SESSION['describe_experience']}

Training and Development Current Work: 
{$_SESSION['describe_current_work']}

Number of Employees: {$_SESSION['number_employees']}
Number of Facilitators: {$_SESSION['number_facilitators']}
Services: $services
Consulting Years: {$_SESSION['consulting_years']}
Coaching Years: {$_SESSION['coaching_years']}
Facilitated Training Years: {$_SESSION['facilitated_years']}
Assessment Years: {$_SESSION['assessments_years']}

All Other 3rd-party Programs: 
{$_SESSION['other_programs']}

Region Of Interest: {$_SESSION['region_of_interest']}
Industries: $industries
Programs: $programs
Upon commencement as an Authorized Provider, I will: $facilitators

Step 3

Objectives in becoming a Fierce Authorized Provider: 
{$_SESSION['describe_objectives']}

How this authorization will both support and enhance your existing business: 
{$_SESSION['describe_support']}

Willing to arrange reference calls: {$_SESSION['reference']}
Declare that the information given is true and correct: {$_SESSION['declare']}
Declared Full Name: {$_SESSION['declare_name']}

";

	@mail("ap@fierceinc.com", "[From the AP Website] Application form response", $message, 
		"From: {$_SESSION['primary_first_name']} {$_SESSION['primary_last_name']} <{$_SESSION['primary_email']}>\r\nReply-To: {$_SESSION['primary_email']}\r\n");

}
?>
