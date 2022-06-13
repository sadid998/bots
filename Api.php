<?php

error_reporting(0);

$url			= "https://www.digitalbam.ir/DirectLinkDownloader/Download";

$curl 			= curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HTTPHEADER, array("Content-Type: application/x-www-form-urlencoded",));
curl_setopt($curl, CURLOPT_POSTFIELDS, "downloadUri=".$_GET['link']);
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
$DimoTM 			= curl_exec($curl);
curl_close($curl);

$DevAMiR		= explode('"', $DimoTM);

#------------------------#

if($DevAMiR[3] == null or $DevAMiR[3] == "" or !isset($_GET['link'])){
    
    $end = [];
    $end['ok'] = "false";
    $end['creator'] = "https://t.me/DevAMiR";
    $end['channel'] = "https://t.me/DimoTM";
    $end['description'] = "link is null !";
	
}else{
    
    $end = [];
    $end['ok'] = "true";
    $end['creator'] = "https://t.me/DevAMiR";
    $end['channel'] = "https://t.me/DimoTM";
    $end['download_link'] = $DevAMiR[3];
    
}

echo json_encode($end,128|256);