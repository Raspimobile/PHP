<?php include('sql_conn.php'); // connexion e ?> 
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
 if (isset($_GET['batP']) ) // test si la variable existe 
{  
 $bat = $_GET['batP'] ;
 $time = strftime('%Y-%m-%d %H:%M:%S');

 
 $sql = "INSERT INTO BatterieP (tension, time) VALUES ('$bat', '$time')";
 $bdd->query($sql) ;   
$URL = "https://raspimobile.fr/connrecup/conn_recup_batP.php?batP=" ;

$URL_var = $URL.$bat;

$curl = curl_init();

// set the URL and other options
curl_setopt($curl, CURLOPT_URL, $URL_var);

// execute and pass the result to browser
curl_exec($curl);

// close the cURL resource
curl_close($curl);


}
?>