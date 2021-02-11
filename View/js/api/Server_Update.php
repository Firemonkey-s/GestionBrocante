<?php

header("Content-Type: text/plain; charset-utf-8");


$parametresJSON = file_get_contents('php://input');

$objetIdentite = json_decode($parametresJSON);


$num = $objetIdentite->num;
$zone = $objetIdentite->zone;
$local = $objetIdentite->localite;

$lat = $objetIdentite->lat;
$longit = $objetIdentite->longit;


$coordx = $objetIdentite->coordx;
$coordy = $objetIdentite->coordy;


$isreserved = $objetIdentite->isreserved;
$metrelin = $objetIdentite->metrelin;

$serveur = "localhost";
$base = "brocante";
$utilisateur = "root";
$motdepasse = "";

$sql = "UPDATE emplacements SET NumPlace = :NumPlace, 
            Zone = :Zone,
            Rue = :Rue,
            Latitude = :Latitude,
            Longitude = :Longitude, 
			CoordX = :CoordX,
			CoordY = :CoordY,
			Reservee = :Reservee,
			Metre_Lin = :Metre_Lin
			WHERE IdPlace = 3";

sleep(2);

try {
   
	
	$pdo = new PDO("mysql:host=".$serveur.";dbname=".$base.";charset=utf8mb4",
	$utilisateur,$motdepasse,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
								
}
catch(Exception $ex) {
    $error["success"] = false;
}

$stmt = $pdo->prepare($sql);

$stmt->bindParam(':NumPlace', $num, PDO::PARAM_STR);       
$stmt->bindParam(':Zone', $zone, PDO::PARAM_STR); 
$stmt->bindParam(':Rue', $local, PDO::PARAM_STR); 

$stmt->bindParam(':Latitude', $lat, PDO::PARAM_STR);
// use PARAM_STR although a number  
$stmt->bindParam(':Longitude', $longit, PDO::PARAM_STR); 
$stmt->bindParam(':CoordX', $coordx, PDO::PARAM_STR);

$stmt->bindParam(':CoordY', $coordy, PDO::PARAM_STR);       
$stmt->bindParam(':Reservee', $isreserved, PDO::PARAM_STR); 
$stmt->bindParam(':Metre_Lin', $metrelin, PDO::PARAM_STR);   

$stmt->execute();

$resultat = "entrée mise à jours dans la base";

echo  $resultat;

?>