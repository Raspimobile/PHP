<?php include('sql_conn.php'); // connexion  ?> 
<?php include('sql_select_home.php'); // Recherche dans la base5 ?> 
<?php
if ($Pieces_Maisons[CH_K] == 5){
$piece2 = 'CH_K';           

}
if ($Pieces_Maisons[CH_F] == 5){
$piece2 = 'CH_F';            

}

if ($Pieces_Maisons[CH_L] == 5){
$piece2 = 'CH_L';              

}
if ($Pieces_Maisons[CH_P] == 5){
$piece2 = 'CH_P';            

}
if ($Pieces_Maisons[Hall] == 5){
$piece2 = 'Hall';              

}
if ($Pieces_Maisons[Salon] == 5){
$piece2 = 'Salon';            

}
if ($Pieces_Maisons[Cellier] == 5){
$piece2 = 'Cellier';              

}
if ($Pieces_Maisons[Garage] == 5){
$piece2 = 'Garage';            

}
if ($Pieces_Maisons[libre] == Sonde_5){
$piece2 = $Pieces_Maisons[librenom];            

}
if ($Pieces_Maisons[libre2] == Sonde_5){
$piece2 = $Pieces_Maisons[libre2nom];               

}

?>
<?php
date_default_timezone_set('Europe/Brussels');
setlocale(LC_TIME, 'fr_FR.UTF8');
// setlocale(LC_TIME, 'fr_FR');
// setlocale(LC_TIME, 'fr');
// setlocale(LC_TIME, 'fra_fra');
 
// echo strftime('%Y-%m-%d %H:%M:%S');  // 5015-10-11 16:03:04
//echo strftime('%A %d %B %Y, %H:%M'); // jeudi 11 octobre 5015, 16:03
//echo strftime('%d %B %Y');           // 11 octobre 5015
//echo strftime('%d/%m/%y');           // 11/10/15
?>
<?php
 if (isset($_GET['temp_5']) AND ($_GET['Pres'])) // test si la variable existe 
{  
 $S5 = $_GET['temp_5'] ;
 $pres = $_GET['Pres'] ;
 $time = strftime('%Y-%m-%d %H:%M:%S');
 
 if ($pres < 101300){
     if ($pres <= 100300){
 $temps = "Risque de pluie forte";               
 }
  if ($pres >= 100300){
 $temps = "Nuages et risque de faible pluie" ;               
 }
 }
 if ($pres >= 101300){
 $temps = "Pas de pluie";               
 }
  if ($pres >= 102000){
 $temps = "Beau temps";               
 }

 $sql = "INSERT INTO temp_maison5 (S5, time, piece) VALUES ('$S5', '$time' , '$piece2')";
 $bdd->query($sql) ;
 $sql2 = "INSERT INTO Pression (Pression, time ) VALUES ('$pres', '$time')";
 $bdd->query($sql2) ;
 $sql3 = "INSERT INTO Sonde_5 (Temp, Pression, time, Lieu, Temps) VALUES ('$S5', '$pres', '$time', '$piece2', '$temps' )";
 $bdd->query($sql3) ;   
}
?>