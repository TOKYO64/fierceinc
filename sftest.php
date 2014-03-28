<?php
		if($_SERVER['REQUEST_METHOD']=='POST'){
		// clean post data
		foreach ($_POST as $key => $value) {
	        $$key = $value;
		}

		// Add data to Salesforce
	
		// set POST variables
		$url = 'https://www.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8';
		//$ca = 'c:\\xampp\\certs\\cacert.crt';
		$ca = 'plugins/includes/cacert.crt';
		//$full = "Start String " . $description;
		$fields = array(
				'oid' => "00D30000001ICYP",
				'lead_source' => $lead_source,
				'description' => $description,
				'first_name' => $first_name,
				'last_name' => $last_name,
				'email' => $email,
				'phone' => $phone,
				'company' => $company
    				);

				//'retURL' => "",
				//'debug' => "1",
				//'debugEmail' => "declangilmurray@hotmail.com",

		foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
		rtrim($fields_string,'&');

		// open connection
		$ch = curl_init();
    
		//set the url, number of POST vars, POST data
		curl_setopt($ch, CURLOPT_URL, $url);

		curl_setopt($ch, CURLOPT_POST, count($fields));
		//curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);

		curl_setopt($ch, CURLOPT_CAINFO, $ca); // Set the location of the cert

		curl_setopt($ch, CURLOPT_HEADER, 0); // Don’t return the header, just the html
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 0); // Return contents as a string
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); // to prevent "Object moved to here" HTML being injected
    
		//execute post
		$result = curl_exec($ch);
    
if($result===TRUE)
echo "curl_exec ok for " . $first_name . " " . $last_name . "\n";
else
echo 'Curl error: ' . curl_error($ch) . "\n";

$info = curl_getinfo($ch);
echo 'HTTP code ' . $info['http_code']	;

		// close connection
		curl_close($ch);
}
else
{

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<META HTTP-EQUIV="Content-type" CONTENT="text/html; charset=UTF-8">

	<title>Salesforce Test</title>
</head>
<body>
<form action="" method="POST">

<label for="first_name">First Name</label><input  id="first_name" maxlength="40" name="first_name" size="20" type="text" /><br>

<label for="last_name">Last Name</label><input  id="last_name" maxlength="80" name="last_name" size="20" type="text" /><br>

<label for="email">Email</label><input  id="email" maxlength="80" name="email" size="20" type="text" /><br>

<label for="company">Company</label><input  id="company" maxlength="40" name="company" size="20" type="text" /><br>

<label for="city">City</label><input  id="city" maxlength="40" name="city" size="20" type="text" /><br>

<label for="phone">Phone</label><input  id="phone" maxlength="40" name="phone" size="20" type="text" /><br>

<label for="lead_source">Lead Source</label><select  id="lead_source" name="lead_source">
<option value="">--None--</option>
<option value="Advertisement">Advertisement</option>
<option value="Book: FC">Book: FC</option>
<option value="Book: FL">Book: FL</option>
<option value="Conferences">Conferences</option>
<option value="Customer Referral">Customer Referral</option>
<option value="Employee Referral">Employee Referral</option>
<option value="Executive Briefing">Executive Briefing</option>
<option value="Keynote">Keynote</option>
<option value="Optify">Optify</option>
<option value="Outbound: BizDev">Outbound: BizDev</option>
<option value="Outbound: Lead Gen">Outbound: Lead Gen</option>
<option value="Partner Referral">Partner Referral</option>
<option value="Print">Print</option>
<option value="Transplant">Transplant</option>
<option value="Web">Web</option>
<option value="Webinar">Webinar</option>
<option value="Web Inquiry">Web Inquiry</option>
<option value="Win Back (returning Cust)">Win Back (returning Cust)</option>
<option value="Word of Mouth">Word of Mouth</option>
</select><br>
 
<label for="description">Description</label><textarea name="description"></textarea><br>


<input type="submit" name="submit">

</form>
</body>
</html>

<?php
}
?>