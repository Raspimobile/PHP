<?php include('sql_conn.php'); // connexion à la base de donnée ?> 
<?php
###################################
# Script sous licence BEERWARE
# Version 0.1	2016
###################################
include_once('/opt/PvMonit/config-default.php');
include_once('/opt/PvMonit/config.php');
include('/opt/PvMonit/function.php');

// if ($_GET['cache'] == 'no') {
// 	$WWW_CACHE_AGE=1;
// }
$aucunAffichage=true;
?>
Bonjour
<?php 
	$ppv_total=null;
	$nb_ppv_total=0;
	foreach (vedirect_scan() as $device) {
		$aucunAffichage=false;
		// sort($device['data']);
		// print_r($device['data']);
        $victron_value = [];
		foreach (explode(',', $device['data']) as $data) {
			$dataSplit = explode(':', $data);
            $veData=ve_label2($dataSplit[0], $dataSplit[1]);
			array_push($victron_value, $veData);
		}
	}
?>
<?php

// print_r($victron_value);
foreach($victron_value as $value){
  // print_r($value);
  switch ($value['desc']) {
	  case 'Tension de la batterie':
		  $U_bat = $value['value'];
      break;
    
    case 'Courant de la batterie':
      $I_bat = $value['value'];
      break;

    case 'Voltage des panneaux':
      $U_panns_v = $value['value']; // en milivolts
      $U_panns = $U_panns_v/1000 ; // adaptation en volts
      break;

    case 'Production des panneaux':
      $P_panns = $value['value'];
      break;

    case 'Status de charge':
      $Etat_charge = $value['value'];
      break;

    case 'Le rendement total':
      $Rend_total = $value['value'];
      break;

    case "Rendement aujourd'hui":
      $Rend_jour = $value['value'];
      break;

    case "Puissance maximum ce jour":
      $P_max_jour = $value['value'];
      break;

    case 'Puissance maximum hier':
      $P_max_hier = $value['value'];
      break;

    case 'Rendemain hier':
      $Rend_hier = $value['value'];
      break;
    case 'Courant de charge':
      $I_sort = $value['value'];
      break;
	  default:
		  $value = $value;
      break;
  }
}

$URL = "http://192.168.1.5:1880/victron/$U_bat/$I_bat/$U_panns/$P_panns/$Etat_charge/$Rend_total/$Rend_jour/$P_max_jour/$P_max_hier/$Rend_hier";

// Envoi Victron vers Nodered
$URL_NEW = str_replace(" ","%20", $URL);
print_r($URL_NEW);
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $URL_NEW);
// print_r($curl);
curl_exec($curl);
curl_close($curl);
// sleep(50);
// exit();
?>

