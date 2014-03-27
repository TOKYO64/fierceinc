<?php 
/* Standard HTML for page can go below. */
$pageTitle = "Assessment";

$fierceAssessHead = true; // don't show the nav on this page
include('../includes/head.php');
?>

		<div id="content">
			<form action="assessmtResults.php" method="POST">

				<h1 class="colorPrimary">Personal&nbsp;Assessment</h1>

				<h4 class="sans">1 &nbsp;<span class="colorSecondary serif">Disclosing my real thoughts and feelings:</span></h4>
				<p class="ml20">
				<input type="radio" name="q1" value="1" /> is risky. <br />
				<input type="radio" name="q1" value="3" /> frees up energy and expands possibilities.
				</p>
				<br />

				<h4 class="sans">2 &nbsp;<span class="colorSecondary serif">If I have a feeling in my gut:</span></h4>
				<p class="ml20">
				<input type="radio" name="q2" value="3" /> I am willing to act on it. <br />
				<input type="radio" name="q2" value="1" /> I won’t act on it If I can’t back it up with facts.
				</p>
				<br />

				<h4 class="sans">3 &nbsp;<span class="colorSecondary serif">When dealing with the truth, most people:</span></h4>
				<p class="ml20">
				<input type="radio" name="q3" value="3" /> can handle it so I’ll keep telling it and inviting it from others.<br />
				<input type="radio" name="q3" value="1" /> can’t handle it, so it’s better not to say anything. 
				</p>
				<br />

				<h4 class="sans">4 &nbsp;<span class="colorSecondary serif">If I’m not an expert:</span></h4>
				<p class="ml20">
				<input type="radio" name="q4" value="1" /> I’ll keep my mouth shut. <br />
				<input type="radio" name="q4" value="3" /> I’ll share my point of view because I believe it’s still valid. 
				</p>
				<br />

				<h4 class="sans">5 &nbsp;<span class="colorSecondary serif">When I’m right:</span></h4>
				<p class="ml20">
				<input type="radio" name="q5" value="1" /> exploring multiple points of view is a waste of time.<br />
				<input type="radio" name="q5" value="3" /> exploring multiple points of view will help me make better decisions.
							</p>
				<br />

				<h4 class="sans">6 &nbsp;<span class="colorSecondary serif">My belief about reality is:</span></h4>
				<p class="ml20">
				<input type="radio" name="q6" value="1" /> it can’t be changed so there’s no point in fighting it. <br />
				<input type="radio" name="q6" value="3" /> It can change through initiating thoughtful and provocative conversation. 
				</p>
				<br />

				<h4 class="sans">7 &nbsp;<span class="colorSecondary serif">An expert's job is to:</span></h4>
				<p class="ml20">
				<input type="radio" name="q7" value="3" /> involve people in problems and strategies that affect them. <br />
				<input type="radio" name="q7" value="1" /> use their experience to dispense advice. 
				</p>
				<br />

				<h4 class="sans">8 &nbsp;<span class="colorSecondary serif">I will gain promotions and approval by:</span></h4>
				<p class="ml20">
				<input type="radio" name="q8" value="3" /> offering my organization a diverse point of view. <br />
				<input type="radio" name="q8" value="1" /> acting in the way my organization expects me to. 
				</p>
				<br />

				<h4 class="sans">9 &nbsp;<span class="colorSecondary serif">When thinking about circumstances and problems:</span></h4>
				<p class="ml20">
				<input type="radio" name="q9" value="1" /> It’s human nature to blame others. <br />
				<input type="radio" name="q9" value="3" /> I need to look to myself for change. 
				</p>
				<br />

				<h4 class="sans">10 &nbsp;<span class="colorSecondary serif"> Silos, politics, and competition for resources:</span></h4>
				<p class="ml20">
				<input type="radio" name="q10" value="1" /> organizational realities, so why buck it. <br />
				<input type="radio" name="q10" value="3" /> can be replaced with alignment, collaboration and partnership. 
				</p>
				<br />

				<h4 class="sans">11 &nbsp;<span class="colorSecondary serif"> When dealing with people with negative attitudes and Performance:</span></h4>
				<p class="ml20">
				<input type="radio" name="q11" value="3" /> I’d rather confront them in hope of change. <br />
				<input type="radio" name="q11" value="1" /> I’d rather ignore them and hope it just goes away. 
				</p>
				<br />

				<h4 class="sans">12 &nbsp;<span class="colorSecondary serif"> I spend most of my day:</span></h4>
				<p class="ml20">
				<input type="radio" name="q12" value="1" /> reacting and recuperating from the daily onslaught of problems. <br />
				<input type="radio" name="q12" value="3" /> engaging in processes that tackle and resolve tough challenges. 
				</p>
				<br />

				<h4 class="sans">13 &nbsp;<span class="colorSecondary serif"> Financial success comes from:</span></h4>
				<p class="ml20">
				<input type="radio" name="q13" value="3" /> good relationships with customers and employees. <br />
				<input type="radio" name="q13" value="1" /> customers getting a good price and employees getting fair pay. 
				</p>
				<br />

				<h4 class="sans">14 &nbsp;<span class="colorSecondary serif"> When it come to solving problems and decision making:</span></h4>
				<p class="ml20">
				<input type="radio" name="q14" value="1" /> It’s the leader’s job, everyone else is paid to work. <br />
				<input type="radio" name="q14" value="3" /> everyone should be required to solve problems, innovate, and learn. 
				</p>
				<br />

				<h4 class="sans">15 &nbsp;<span class="colorSecondary serif"> When I think about the people I work with:</span></h4>
				<p class="ml20">
				<input type="radio" name="q15" value="3" /> I care deeply about my relationships with them. <br />
				<input type="radio" name="q15" value="1" /> I believe I should leave my feelings at the door. 
				</p>
				<br />
				
				<input type="submit" name="submit" value="Submit" />

			</form>

		</div>

<? include('../includes/foot.php'); ?> 
