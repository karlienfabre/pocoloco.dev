<?php
	function send_email($signup) {
		$to  = 'pocoloco@pocolocoadventures.be';
		// subject
		$subject = 'Inschrijving nieuwsbrief Poco Loco Adventures';

		// message
		$message = 'E-mailadres: ';
		$message .= $signup;

		$headers = 'From: nl-mgr@pocolocoadventures.be' . "\r\n" .
		    'X-Mailer: PHP/' . phpversion();   		

		// Mail it
		mail($to, $subject, $message, $headers);
	}

	$con = mysql_connect('localhost','pocoloco_NLMgr','P0coLoc0');
	if (!$con)
	  {
	  die('Could not connect: ' . mysql_error());
	  }
	 
	mysql_select_db("pocoloco_NLSubscriptions", $con);
	
	$email = mysql_real_escape_string($_POST['signup_name']);
	
    if(empty($email)){
        $status = "error";
        $message = "Je hebt geen email adres ingegeven!";
    }
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    	//validate email address - check if is a valid email address
        $status = "error";
        $message = "Je hebt een ongeldig email adres ingegeven!";
    }
    else {
       $existingSignup = mysql_query("SELECT * FROM signups WHERE signup_email_address='$email'");   
       if(mysql_num_rows($existingSignup) < 1){
 
           $date = date('Y-m-d');
           $time = date('H:i:s');
	
	       $insertSignup = mysql_query("INSERT INTO signups (signup_email_address, signup_date, signup_time)
	VALUES
	('$email','$date','$time')");
	
           if($insertSignup){
               $status = "success";
               $message = "You have been signed up!";   
			   send_email($email);
           }
           else {
               $status = "error";
               $message = "Ooops, Er gebeurde een technische fout! ".mysql_error();
               //header('Location: ipad_confirmation.html');  
           }
        }
        else {
            $status = "error";
            $message = "Dit email adres is reeds geregistreerd!";
        }
    }
	
    //return json response 
    $data = array(
        'status' => $status,
        'message' => $message
    );
 
    echo json_encode($data);
 
    exit;
?>