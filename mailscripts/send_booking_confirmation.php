<?php

header('Content-Type: text/html; charset=utf-8');

$debug = false;

$send = false;
	
if (count($_POST)>0) {

    $voornaam = addslashes(strip_tags($_POST['reizigers'][1][0]));
    $email = addslashes(strip_tags($_POST['reizigers'][1][6]));
    $gekozenkantoor = addslashes(strip_tags($_POST['gekozenkantoor']));
    $telefoonkantoor = addslashes(strip_tags($_POST['kantoorphone']));
    $emailkantoor = addslashes(strip_tags($_POST['kantooremail']));
    $reisfiche = addslashes(strip_tags($_POST['reisfiche']));
    $reisurl = addslashes(strip_tags($_POST['reisurl']));
    $verkoopsvoorwaarden = 'http://www.epower.amadeus.com/joker/Portals/joker/AgencyRules.aspx';
    $reisvoorwaarden = 'http://www.joker.be/sites/default/files/reisvoorwaarden_2015_-2016.pdf';
    $reistitel = addslashes(strip_tags($_POST['reistitel']));
    $periode = addslashes(strip_tags($_POST['reisperiode']));

    if (!empty($_POST['vertrekdatum'])) {
        $vertrekdatum = addslashes(strip_tags($_POST['vertrekdatum']));
    }
    $aantalreizigers = addslashes(strip_tags($_POST['aantalreizigers']));
    $basisprijs = addslashes(strip_tags($_POST['reisprijs']));
    $reizigers = $_POST['reizigers'];
    
    $recipient = $email;
    $object = "Bevestiging Poco Loco Adventures";
    ob_start();
    require("../mail-templates/ink/template_mail_confirmation.php");
    $htmlmessage = ob_get_clean();

    if ($debug === TRUE) {
        $headers  = "MIME-Version: 1.0\n";
        $headers .= "Content-type: text/html; charset=UTF-8 \r\n";
        $headers .= "From: Poco Loco Adventures <boeking@pocolocoadventures.be> \r\n";
        $headers .= "Reply-To: " . $emailkantoor . " \r\n";
        if(mail('hello@design311.com', $object, $htmlmessage, $headers)){
          $send = true;
        }
    }
    else{
        $headers  = "MIME-Version: 1.0\n";
        $headers .= "Content-type: text/html; charset=UTF-8 \r\n";
        $headers .= "From: Poco Loco Adventures <boeking@pocolocoadventures.be> \r\n";
        $headers .= 'Cc: '. $emailkantoor . " \r\n";
        $headers .= 'Cc: boeking@pocolocoadventures.be'. " \r\n";
        $headers .= "Reply-To: " . $emailkantoor . " \r\n";
        if(mail($recipient, $object, $htmlmessage, $headers)){
          $send = true;
        }
    }

}

echo json_encode($send);