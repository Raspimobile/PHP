<?php
$reponse1 = $bdd->query('SELECT * FROM Temp ORDER BY ID DESC limit 500 ');
$temperatures = $reponse1->fetch();

$reponse18 = $bdd->query('SELECT * FROM Eau ORDER BY ID DESC limit 500');
$Eau = $reponse18->fetch();

$reponse2 = $bdd->query('SELECT * FROM Temp ORDER BY tempExt DESC limit 500');
$max_temp_ext = $reponse2->fetch();

$reponse3 = $bdd->query('SELECT * FROM Temp ORDER BY tempExt limit 500 ');
$min_temp_ext = $reponse3->fetch();

$reponse4 = $bdd->query('SELECT * FROM Temp ORDER BY tempInt DESC limit 500');
$max_temp_int = $reponse4->fetch();

$reponse5 = $bdd->query('SELECT * FROM Temp ORDER BY tempInt limit 500 ');
$min_temp_int = $reponse5->fetch();

$reponse6 = $bdd->query('SELECT * FROM Batterie ORDER BY time DESC limit 500');
$batterie = $reponse6->fetch();

$reponse7 = $bdd->query('SELECT * FROM Batterie ORDER BY tension DESC limit 500');
$max_batterie = $reponse7->fetch();

$reponse8 = $bdd->query('SELECT * FROM Batterie ORDER BY tension limit 500');
$min_batterie = $reponse8->fetch();

$reponse9 = $bdd->query('SELECT * FROM Temp ORDER BY tempFrig limit 500');
$min_temp_frigo = $reponse9->fetch();

$reponse10 = $bdd->query('SELECT * FROM Temp ORDER BY tempFrig DESC limit 500');
$max_temp_frigo = $reponse10->fetch();

$reponse11 = $bdd->query('SELECT * FROM Temp ORDER BY tempCong limit 500  ');
$min_temp_cong = $reponse11->fetch();

$reponse12 = $bdd->query('SELECT * FROM Temp ORDER BY tempCong DESC limit 500');
$max_temp_cong = $reponse12->fetch();

$reponse13 = $bdd->query('SELECT * FROM Batterie ORDER BY Sol1 DESC limit 500 ');
$max_sol1 = $reponse13->fetch();

$reponse14 = $bdd->query('SELECT * FROM Batterie ORDER BY Sol1 limit 500 ');
$min_sol1 = $reponse14->fetch();

$reponse15 = $bdd->query('SELECT * FROM Batterie ORDER BY Sol2 DESC limit 500');
$max_sol2 = $reponse15->fetch();

$reponse16 = $bdd->query('SELECT * FROM Batterie ORDER BY Sol2  limit 500');
$min_sol2 = $reponse16->fetch();

$reponse17 = $bdd->query('SELECT * FROM GPS ORDER BY ID DESC limit 500 ');
$gps = $reponse17->fetch();

$longitude = $gps['longitude'];
$latitude = $gps['latitude'];

$reponse19 = $bdd->query('SELECT * FROM GPS ORDER BY ID DESC limit 500');
$Adresse = $reponse19->fetch();

$reponse20 = $bdd->query('SELECT * FROM temp_maison ORDER BY ID DESC limit 500');
$temp_home = $reponse20->fetch();

$reponse21 = $bdd->query('SELECT * FROM temp_maison2 ORDER BY ID DESC limit 500');
$temp_home2 = $reponse21->fetch();

$reponse22 = $bdd->query('SELECT * FROM temp_maison3 ORDER BY ID DESC limit 500');
$temp_home3 = $reponse22->fetch();

$reponse23 = $bdd->query('SELECT * FROM temp_maison4 ORDER BY ID DESC limit 500');
$temp_home4 = $reponse23->fetch();

$reponse24 = $bdd->query('SELECT * FROM temp_maison5 ORDER BY ID DESC limit 500');
$temp_home5 = $reponse24->fetch();

$reponse25 = $bdd->query('SELECT * FROM temp_maison6 ORDER BY ID DESC limit 500');
$temp_home6 = $reponse25->fetch();

$reponse26 = $bdd->query('SELECT * FROM temp_maison7 ORDER BY ID DESC limit 500');
$temp_home7 = $reponse26->fetch();

$reponse27 = $bdd->query('SELECT * FROM temp_maison8 ORDER BY ID DESC limit 500');
$temp_home8 = $reponse27->fetch();

$reponse28 = $bdd->query('SELECT * FROM Choix_libre ORDER BY ID DESC limit 500');
$Choix_libre = $reponse28->fetch();

$reponse29 = $bdd->query('SELECT * FROM Choix_libre2 ORDER BY ID DESC limit 500');
$Choix_libre2 = $reponse29->fetch();

$reponse30 = $bdd->query('SELECT * FROM config_emplacement ORDER BY ID DESC limit 500');
$config_emplacement = $reponse30->fetch();

$reponse31 = $bdd->query('SELECT * FROM Pression ORDER BY ID DESC limit 500');
$pression = $reponse31->fetch();

$reponse32 = $bdd->query('SELECT * FROM Chargeur ORDER BY ID DESC limit 500');
$chargeur = $reponse32->fetch();

$reponse34 = $bdd->query('SELECT * FROM Codes ORDER BY code DESC limit 500');
$code_base = $reponse34->fetch();
?>