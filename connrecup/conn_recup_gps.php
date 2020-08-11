<html> 
 <head>
 <title>GPS</title>
<meta charset="utf-8" />
 
<?php include('sql_conn.php'); // connexion à la base de donnée ?> 
<?php include('get_addresse.php'); // récupoération adresse par API  ?> 

<?php
$recherche = $bdd->query('SELECT * FROM GPS ORDER BY ID DESC ');
$address_old = $recherche->fetch();
 
 if (isset($_GET['latitude']) || ($_GET['longitude']) || ($_GET['altitude']) || ($_GET['vitesse']) AND ($_GET['time'])) // test si la variable existe 
{  
 $lng = $_GET['longitude'] ;
 $lat = $_GET['latitude'] ;
 $alt = $_GET['altitude'] ;
 $vit = $_GET['vitesse'] ;
 $time = $_GET['time'] ;
 $address = getaddress($lat,$lng);
 $insert = "INSERT INTO GPS ( latitude, longitude, altitude, vitesse, time, adresse) VALUES( '$lat' , '$lng', '$alt', '$vit', '$time' , '$address')";
 $bdd->query("DELETE FROM GPS WHERE adresse=' '");
 $address_m = $address_old['adresse'] ;  
if ($address_m != $address)
 { 
  if ($address !== ' ')
  { 
 $bdd->query($insert);
  }
 }
}
?>
 </head>
</html> 
