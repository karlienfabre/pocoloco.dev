<?php

header('Content-Type: text/html; charset=utf-8');

$send = false;
	
if (count($_POST)>0) {

    $voornaam = addslashes(strip_tags($_POST['reizigers'][1][0]));
    $gekozenkantoor = addslashes(strip_tags($_POST['gekozenkantoor']));
    $telefoonkantoor = addslashes(strip_tags($_POST['kantoorphone']));
    $emailkantoor = addslashes(strip_tags($_POST['kantooremail']));
    $reisfiche = addslashes(strip_tags($_POST['reisfiche']));
    $reisurl = addslashes(strip_tags($_POST['reisurl']));
    $verkoopsvoorwaarden = 'http://google.com/';
    $reisvoorwaarden = 'http://google.com/';
    $reistitel = addslashes(strip_tags($_POST['reistitel']));
    $periode = addslashes(strip_tags($_POST['reisperiode']));
    $aantalreizigers = addslashes(strip_tags($_POST['aantalreizigers']));
    $basisprijs = addslashes(strip_tags($_POST['reisprijs']));
    $reizigers = $_POST['reizigers'];
    //$totalprice = 1235;
    
    $recipient = addslashes(strip_tags($_POST['kantooremail']));
    $object = "Bevestiging Poco Loco Adventures";
    ob_start();
    require("../mail-templates/ink/template_mail_confirmation.php");
    $htmlmessage = ob_get_clean();

    $headers  = "MIME-Version: 1.0\n";
    $headers .= "Content-type: text/html; charset=UTF-8 \r\n";
    $headers .= "From: $voornaam <pocoloco@pocolocoadventures.be> \r\n";
    $headers .= "Reply-To: ".  ." \r\n";
    if(mail($recipient, $object, $htmlmessage, $headers)){
      $send = true;
    }
}

echo json_encode($send);