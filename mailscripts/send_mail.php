<?php

	$send = false;
	
  if (count($_POST)>0) {

    $name=addslashes(strip_tags($_POST["name"]));
    $email=addslashes(strip_tags($_POST["email"]));
    $phone=addslashes(strip_tags($_POST["phone"]));
    $message=addslashes(strip_tags($_POST["message"]));

    if (isset($_POST["nieuwsbrief"])) {
      $url = 'http://pocolocoadventures.be/wp-content/themes/pocoloco/mailscripts/newsletter_subscribe.php';
      $data = array('signup_name' => $email);

      $options = array(
          'http' => array(
              'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
              'method'  => 'POST',
              'content' => http_build_query($data),
          ),
      );
      $context  = stream_context_create($options);
      $result = file_get_contents($url, false, $context);
    }
    
    $recipient  	= "contact@pocolocoadventures.be";
    $object 			= "Poco Loco Adventures - Contact";
    $htmlmessage 	= <<<MESSAGE
    <html>
    	<head>
     		<title>Poco Loco Adventures - Contact</title>
    	</head>
	    <body>
	      <style>body {font: 12px/1.2em Verdana}</style>
	      <strong>User: </strong>$name<br />
	      <strong>Phone: </strong>$phone<br />
	      <strong>Email: </strong>$email<br />
	      <p><strong>Message: </strong>$message</p>
	    </body>
    </html>
MESSAGE;

    $headers  = "MIME-Version: 1.0\n";
    $headers .= "Content-type: text/html; charset=iso-8859-1\n";
    $headers .= "From: $name <$email>\n";
    if(mail($recipient, $object, $htmlmessage, $headers)){
      $send = true;
    }
  }
  echo json_encode($send);