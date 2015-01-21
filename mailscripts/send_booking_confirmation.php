<?php

header('Content-Type: text/html; charset=utf-8');

$send = false;
	
if (count($_POST)>0) {

    $voornaam = addslashes(strip_tags($_POST['reizigers'][1][0]));
    $gekozenkantoor = addslashes(strip_tags($_POST['gekozenkantoor']));
    $telefoonkantoor = '03 678 29 10';
    $emailkantoor = 'antwerpen@joker.be';
    $reisfiche = addslashes(strip_tags($_POST['reisfiche']));
    $reisurl = addslashes(strip_tags($_POST['reisurl']));
    $verkoopsvoorwaarden = 'http://google.com/';
    $reisvoorwaarden = 'http://google.com/';
    $reistitel = addslashes(strip_tags($_POST['reistitel']));
    $periode = addslashes(strip_tags($_POST['reisperiode']));
    $aantalreizigers = addslashes(strip_tags($_POST['aantalreizigers']));
    $basisprijs = addslashes(strip_tags($_POST['reisprijs']));
    $reizigers = $_POST['reizigers'];
    $totalprice = 1235;
    
    $recipient = "hello@design311.com";
    $object = "Bevestiging Poco Loco Adventures";
    ob_start();
    require("../mail-templates/ink/template_mail_confirmation.php");
    $htmlmessage = ob_get_clean();

    $headers  = "MIME-Version: 1.0\n";
    $headers .= "Content-type: text/html; charset=UTF-8\n";
    $headers .= "From: $voornaam <hi@yen.tl>\n";
    if(mail($recipient, $object, $htmlmessage, $headers)){
      $send = true;
    }
}

echo json_encode($send);