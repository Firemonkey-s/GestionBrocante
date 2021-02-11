<?php

header("Content-Type: text/plain; charset-utf-8");


//$sql = "DELETE FROM emplacement WHERE IdPlace =  :filmID";

$sql = "DELETE FROM emplacements WHERE IdPlace = 7";

sleep(2);

$serveur = "localhost";
$base = "brocante";
$utilisateur = "root";
$motdepasse = "";


try {
   
	
	$pdo = new PDO("mysql:host=".$serveur.";dbname=".$base.";charset=utf8mb4",
	$utilisateur,$motdepasse,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
								
}
catch(Exception $ex) {
    $error["success"] = false;
}


$stmt = $pdo->prepare($sql);
//$stmt->bindParam(':filmID', $_POST['filmID'], PDO::PARAM_INT);

$idplace = 5;

$stmt->bindParam(':IdPlace',$idplace, PDO::PARAM_INT);

$stmt->execute();

$resultat = "suppression de la base";

echo  $resultat;


?>