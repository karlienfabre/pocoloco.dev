<?php

	$send = false;
	
  //if (count($_POST)>0) {

    $voornaam = 'Yentl';
    $gekozenkantoor = 'Joker Antwerpen';
    $telefoonkantoor = '03 678 29 10';
    $emailkantoor = 'antwerpen@joker.be';
    $reisfiche = 'http://google.com/';
    $reisurl = 'http://pocolocoadventures.be/qwfi';
    $verkoopsvoorwaarden = 'http://google.com/';
    $reisvoorwaarden = 'http://google.com/';
    $reistitel = 'Met sneeuwschoenen in sprookjesachtig Turkije';
    $periode = '01/07/15 - 07/07/15';
    $aantalreizigers = 3;
    $basisprijs = '650';
    $reizigers = array();
    $totalprice = 1235;

    /*$name=addslashes(strip_tags($_POST["name"]));
    $email=addslashes(strip_tags($_POST["email"]));
    $phone=addslashes(strip_tags($_POST["phone"]));
    $message=addslashes(strip_tags($_POST["message"]));*/
    
    $recipient  	= "hello@design311.com";
    $object 			= "Bevestiging Poco Loco Adventures";
    ob_start();
    require("../mail-templates/ink/template_mail_confirmation.php");
    $htmlmessage = ob_get_clean();

    $headers  = "MIME-Version: 1.0\n";
    $headers .= "Content-type: text/html; charset=iso-8859-1\n";
    $headers .= "From: $voornaam <hi@yen.tl>\n";
    if(mail($recipient, $object, $htmlmessage, $headers)){
      $send = true;
    }
  //}
  echo json_encode($send);