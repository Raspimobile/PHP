<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php
function getaddress($lat,$lng)
{

//$url = 'https://maps.googleapis.com/maps/api/geocode/json?latlng='.trim($lat).','.trim($lng).'&key=AIzaSyAS4GctTl7DG8MjHEMOAOaqbbHtaa1Q4T0';
$url = 'https://maps.googleapis.com/maps/api/geocode/json?latlng='.trim($lat).','.trim($lng).'&key=AIzaSyBterfxH0so_xofCtJc8_3RPWisjmo73u8';
$json = @file_get_contents($url);
$data=json_decode($json);
$status = $data->status;
if($status=="OK")
return $data->results[0]->formatted_address;
else
return false;
}

utf8_encode($address = getaddress($lat,$lng));
echo $Adresse['adresse'];
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>
</head>

<body>
</body>
</html>
<?php
$latitude = (isset($_GET["lat"])) ? $_GET["lat"] : NULL;
$longitude = (isset($_GET["long"])) ? $_GET["long"] : NULL;
 ?>