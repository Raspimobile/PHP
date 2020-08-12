<?php
require_once('/var/www/html/config.php');

try
{ // connection à la base de données
$bdd = new PDO('mysql:host='.dbhost.';dbname='.dbname, dbuser, dbpass);
}
catch(Exception $e)
{
 die('Erreur : '.$e->getMessage()); // En cas d'erreur, on affiche un message et on arrête tout
}

?>

