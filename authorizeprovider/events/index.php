<?php 
	$pageTitle = "Events";
	$tab = "events";
	include('../includes/head.php');

	// Get events from database into array
	include('fusc.inc');
	
	define('FIERCE_BASE_URL', "http://www.fierceinc.com/");

	// Open DB
	$link = mysql_connect(FIERCE_SERVER, FIERCE_USER, FIERCE_PASSWD);
	if(!$link)
	{
		//echo '<script type="text/javascript">alert("DB open fail: ' . mysql_error() . '");</script>';
	}
	else
	{
		$rows = array();
		$today = date("Y-m-d");
		$query = "SELECT eventName,eventDesc,eventLocation,eventStartDate,eventEndDate,eventType,eventAudience,enrollUrl,infoUrl,soldOut";
		$query .= " FROM `fierce_staging_cms`.`data_events` WHERE eventStartDate >= '$today' AND ((eventAudience='APATC') OR (eventAudience='All')) ORDER BY eventStartDate ASC";
		$events_query = mysql_query($query, $link);
		if(!$events_query)
		{
			//echo '<script type="text/javascript">alert("query failed: ' . mysql_error() . '");</script>';
		}
		elseif($events_query && (mysql_num_rows($events_query) >= 1))
		{
			//echo '<script type="text/javascript">alert("num rows: ' . mysql_num_rows($events_query) . '");</script>';
			while($row = mysql_fetch_assoc($events_query))
				$rows[] = $row;

			mysql_free_result($events_query);
		}

		mysql_close($link);
	}
	
?>

	<div id="top_image">
		<img src="<?php echo $URLROOT; ?>images/app_events.jpg" width="780" height="214" />
	</div>
		
	<div id="content">

<?php
	if(!empty($rows))
	{
		foreach($rows as $row)
		{
			echo '<div style="width:500px; margin-bottom:20px;">';
			echo '<div style="float:left; width:100px; height:84px; padding-top:4px;">';

			if ($row['eventType'] == 'certification')
				echo'<img src="' . FIERCE_BASE_URL . '/uploads/images/structure/event_certification.gif" width="80" height="60" alt="Certification" />';
			elseif ($row['eventType'] == 'conference')
				echo '<img src="' . FIERCE_BASE_URL . '/uploads/images/structure/event_conference.gif" width="80" height="60" alt="Conference" />';
			elseif ($row['eventType'] == 'keynote')
				echo '<img src="' . FIERCE_BASE_URL . '/uploads/images/structure/event_keynote.gif" width="80" height="60" alt="Keynote" />';
			elseif ($row['eventType'] == 'open enrollment')
				echo '<img src="' . FIERCE_BASE_URL . '/uploads/images/structure/event_open.gif" width="80" height="60" alt="Open" />';
			elseif ($row['eventType'] == 'webinar')
				echo '<img src="' . FIERCE_BASE_URL . '/uploads/images/structure/event_webinar.gif" width="80" height="60" alt="Webinar" />';
			elseif ($row['eventType'] == 'workshop')
				echo '<img src="' . FIERCE_BASE_URL . '/uploads/images/structure/event_workshop.gif" width="80" height="60" alt="Workshop" />';
			elseif ($row['eventType'] == 'workshophalf')
				echo '<img src="' . FIERCE_BASE_URL . '/uploads/images/structure/workshophalf.gif" width="80" height="60" alt="Workshop" />';
			elseif ($row['eventType'] == 'workshop1')
				echo '<img src="' . FIERCE_BASE_URL . '/uploads/images/structure/workshop1.gif" width="80" height="60" alt="Workshop" />';
			elseif ($row['eventType'] == 'workshop2')
				echo '<img src="' . FIERCE_BASE_URL . '/uploads/images/structure/workshop2.gif" width="80" height="60" alt="Workshop" />';
			elseif ($row['eventType'] == 'workshop3')
				echo '<img src="' . FIERCE_BASE_URL . '/uploads/images/structure/workshop3.gif" width="80" height="60" alt="Workshop" />';
			elseif ($row['eventType'] == 'eventhalf')
				echo '<img src="' . FIERCE_BASE_URL . '/uploads/images/structure/eventhalf.gif" width="80" height="60" alt="Event" />';
			elseif ($row['eventType'] == 'event1')
				echo '<img src="' . FIERCE_BASE_URL . '/uploads/images/structure/event1.gif" width="80" height="60" alt="Event" />';
			elseif ($row['eventType'] == 'event2')
				echo '<img src="' . FIERCE_BASE_URL . '/uploads/images/structure/event2.gif" width="80" height="60" alt="Event" />';
			elseif ($row['eventType'] == 'event3')
				echo '<img src="' . FIERCE_BASE_URL . '/uploads/images/structure/event3.gif" width="80" height="60" alt="Event" />';
			else
				echo '<img src="' . FIERCE_BASE_URL . '/uploads/images/structure/event_event.gif" width="80" height="60" alt="Event" />';

			echo '<br/><span class="eventLink">';
			if($row['soldOut'] == 'yes')
				echo "SOLD OUT";
			else
			{
				if ($row['enrollUrl'] != "")
					echo "<a href=\"{$row['enrollUrl']}\" target=\"Fierce\">ENROLL</a>";

				if ( ($row['enrollUrl'] != "") && ($row['infoUrl'] != "") )
					echo "<span>|</span>";

				if ($row['infoUrl'] != "")
					echo "<a href=\"{$row['infoUrl']}\" target=\"Fierce\">INFO</a>";
			}
			echo "</span>";

			echo "</div>";

			echo '<div style="float:left; width:400px;">';

			echo '<div class="eventDate">' . date("F j", strtotime($row['eventStartDate']));
			if ($row['eventEndDate']!= "0000-00-00")
				echo ' - ' . date("F j", strtotime($row['eventEndDate']));
			echo '</div>';

			echo "<div class=\"eventLocation\">{$row['eventLocation']}</div>";
			echo "<div class=\"eventName\">{$row['eventName']}</div>";
			echo "<div class=\"eventDesc\">{$row['eventDesc']}</div>";
			echo '</div>';

			//echo '<div style="clear: both;"></div>';
			echo '</div>';
			echo '<br clear="all"/><br/>';
		}
	}
?>
	<div style="clear: both;"></div>
	</div>
		
<?php include('../includes/foot.php'); ?>
