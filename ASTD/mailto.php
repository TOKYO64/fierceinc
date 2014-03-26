<?php
    $contact_info = array(
        'first_name',
        'last_name',
        'email',
    );

    foreach ($contact_info as $info) {
        $$info = $_POST[$info];
    }

    $choices = array(
        'ProgramOverview-Conversations',
        'ProgramOverview-ConversationsO2',
        'ProgramOverview-Generations',
        'ProgramOverview-Negotiations',
        'ProgramOverview-Accountability',
        'ProgramOverview-FieldGuide',
        'CaseStudy-Costco',
        'CaseStudy-CrateBarrel',
        'CaseStudy-Presbyterian',
        'CaseStudy-ErnstYoung',
        'CaseStudy-Joslin',
        'CaseStudy-UW',
        'Whitepaper-ThreePillars',
        'Whitepaper-Linchpin',
        'Whitepaper-EmployeeEngagement',
        'Whitepaper-EducationReform',
    );

    $selected = array(
    );


    $to_send = array(
    );

    foreach ($choices as $choice) {
        if (isset($_POST[$choice]) && $_POST[$choice] == true) {
            array_push($selected, $choice);
        }
    }

    foreach ($selected as $selection) {
        switch($selection) {
	    /* This is where you update URLS */
            case 'ProgramOverview-Conversations':
                array_push($to_send, 'http://www.fierceinc.com/uploads/ASTD-Form/Fierce_OneSheet_Fierce%20Conversations%20One%20Sheet.pdf');
            break;
            case 'ProgramOverview-ConversationsO2':
                array_push($to_send, 'http://www.fierceinc.com/uploads/ASTD-Form/Fierce_OneSheet_Fierce%20O2%20One%20Sheet.pdf');
            break;
            case 'ProgramOverview-Generations':
                array_push($to_send, 'http://www.fierceinc.com/uploads/ASTD-Form/Fierce_OneSheet_Fierce%20Generations%20One%20Sheet.pdf');
            break;
            case 'ProgramOverview-Negotiations':
                array_push($to_send, 'http://www.fierceinc.com/uploads/ASTD-Form/Fierce_OneSheet_Fierce%20Negotiations%20One%20Sheet.pdf');
            break;
            case 'ProgramOverview-Accountability':
                array_push($to_send, 'http://www.fierceinc.com/uploads/ASTD-Form/Fierce_OneSheet_Fierce%20Accountability%20One%20Sheet.pdf');
            break;
            case 'ProgramOverview-FieldGuide':
                array_push($to_send, 'http://www.fierceinc.com/uploads/ASTD-Form/Fierce_OneSheet_FITS%20One%20Sheet.pdf');
            break;
            case 'CaseStudy-Costco':
                array_push($to_send, 'http://www.fierceinc.com/uploads/ASTD-Form/Fierce_CaseStudy_Costco_WEB.pdf');
            break;
            case 'CaseStudy-CrateBarrel':
                array_push($to_send, 'http://www.fierceinc.com/uploads/ASTD-Form/Fierce_CaseStudy_crate_barrel.pdf');
            break;
            case 'CaseStudy-Presbyterian':
                array_push($to_send, 'http://www.fierceinc.com/uploads/ASTD-Form/Fierce_CaseStudy_PresSeniorLiving_12.18.12_PRINT.pdf');
            break;
            case 'CaseStudy-ErnstYoung':
                array_push($to_send, 'http://www.fierceinc.com/uploads/ASTD-Form/Fierce_CaseStudy_Ernst_and_Young_case_study.pdf');
            break;
            case 'CaseStudy-Joslin':
                array_push($to_send, 'http://www.fierceinc.com/uploads/ASTD-Form/Fierce_CaseStudy_Joslin_04.15.13-otlnd-WEB.pdf');
            break;
            case 'CaseStudy-UW':
                array_push($to_send, 'http://www.fierceinc.com/uploads/ASTD-Form/Fierce_CaseStudy_university_Washington.pdf');
            break;
            case 'Whitepaper-ThreePillars':
                array_push($to_send, 'http://www.fierceinc.com/uploads/ASTD-Form/Fierce_WP_Three-Pillars-Leadership-Training-Development.pdf');
            break;
            case 'Whitepaper-Linchpin':
                array_push($to_send, 'http://www.fierceinc.com/uploads/ASTD-Form/Fierce_WP_Conversations-Linchpin-Leadership-Competencies.pdf');
            break;
            case 'Whitepaper-EmployeeEngagement':
                array_push($to_send, 'http://www.fierceinc.com/uploads/ASTD-Form/Fierce_WP_Financial-Rewards-Employee-Engagement.pdf');
            break;
            case 'Whitepaper-EducationReform':
                array_push($to_send, 'http://www.fierceinc.com/uploads/ASTD-Form/Fierce_WP_Conversations-Education-Reform.pdf');
            break;
        }
    }

    $subject = "Your Fierce Materials";

    /* Here is where the header text is set. */
    $body = "Thank you for taking the time to explore Fierce programs, case studies, and whitepapers. We hope you enjoy your materials provided below.";

    /* This is the FROM address. */
    $headers = "From: jon@fierceinc.com";

    foreach($to_send as $url) {
	/* Here is where the links are inserted.*/
        $body = $body."\r\n$url\r\n";
    }

    /* Here is where you would update the footer text. */
    $body = $body."\r\nReach out to us with any questions about the programs and/or papers that interested you at info@fierceinc.com or  206.787.1100. Fierce is dedicated to developing relationships with individuals and organizations like yours, and we hope to keep the conversations going. We will reach out to connect with you to answer any questions you may have. Thank you, The Fierce Team \r\n";

    mail($email, $subject, $body, $headers);
    if($_POST['Newsletter']) {
	/* Update this address. */
        $to = "jon@fierceinc.com";
        $subject = "ADD ME TO YOUR NEWSLETTER";
        $body = "Hey Jon, $first_name $last_name requested they be added to the newsletter. Their email is $email. Thank you!";
        mail($to,$subject,$body);
    }

