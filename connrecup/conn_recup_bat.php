<?php include('sql_conn.php'); // connexion à la base de donnée ?> 
<?php

// Exécute le code python pour récupérer les infos Victron
$results = shell_exec("python /opt/PvMonit/bin/vedirect.py /dev/ttyUSB0");
$datas = explode("\n", $results);
foreach ($datas as $data) { 
  $val = explode(":", $data);
  switch ($val[0]) {
    case 'V':
      $U_bat = $val[1] / 1000;
      break;
    
    case 'I':
      $I_bat = $val[1] /1000;
      break;
  
    case 'VPV':
      $U_panns = $val[1] /1000; 
      break;
  
    case 'PPV':
      $P_panns = $val[1];
      break;
  
    case 'CS':
      $Etat_charge = $val[1];
      break;
  
    case 'H19':
      $Rend_total = $val[1];
      break;
  
    case "H20":
      $Rend_jour = $val[1] / 100;
      break;
  
    case "H21":
      $P_max_jour = $val[1];
      break;
  
    case 'H23':
      $P_max_hier = $val[1];
      break;
  
    case 'H22':
      $Rend_hier = $val[1] / 100;
      break;

    case 'IL':
      $I_sort = $val[1];
      break;

    default:
      $value = $val;
      break;
  }
}
print_r($datas);
?>
<?php

  
// Reception depuis python bat_V1.py




// Préparation envoi 
$URL = "https://www.raspimobile.fr/connrecup/conn_recup_MajConso.php?U_bat={$U_bat}&U_panns={$U_panns}&U_pann1={$U_pann1}&I_bat={$I_bat}&P_panns={$P_panns}&P_max_jour={$P_max_jour}&P_max_hier={$P_max_hier}&Rend_jour={$Rend_jour}&Rend_hier={$Rend_hier}&Rend_total={$Rend_total}&Etat_charge={$Etat_charge}&I_sort={$I_sort}";
echo($URL);

// Envoi Victron vers Raspimobile en python


$Envoi_bdd = file_get_contents($URL);


// echo (json.encode($URL));
if (isset($_GET['tension']))  // test si la variable existe 
{
  $Sol1 = $_GET['Sol1'] ;
$time = $_GET['time'] ; 
$U_pann1 = $Sol1;
$tension = $U_bat ; // Utilisation des la tension batterie du Victron
$Sol2 = ($U_panns-$U_pann1) ;
$U_pann2 = ($U_panns-$U_pann1) ;


$sql2 = "INSERT INTO Conso ( time, U_bat , U_panns , U_pann1, U_pann2, I_bat, I_sort, P_panns, Etat_charge , Rend_total , P_max_jour, Rend_jour , P_max_hier ) VALUES('$time', '$U_bat', '$U_panns', '$U_pann1', '$U_pann2', '$I_bat', '$I_sort', '$P_panns', '$Etat_charge', '$P_max_hier', '$Rend_jour', '$Rend_total', '$P_max_jour' )";
$bdd->query($sql);

 if ($U_bat != 0) 
 {
 $sql = "INSERT INTO Batterie ( tension, Sol1, Sol2, time) VALUES( '$tension' , '$Sol1' , '$Sol2' , '$time')";
 
 $bdd->query($sql);
 $bdd->fetch(); 
 $sql3 = "DELETE FROM Batterie WHERE tension > 30 ";
 $bdd->query($sql3);   
 } 
}

?>

