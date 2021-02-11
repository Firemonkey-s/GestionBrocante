<?php
// Headers requis
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: PUT"); //-> definit la metode de l'API REST 
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// On vérifie que la méthode utilisée est correcte
if($_SERVER['REQUEST_METHOD'] == 'PUT'){
    // On inclut les fichiers de configuration et d'accès aux données
    //include_once './config/Database.php';
    //include_once './models/Emplacement.php';
    include_once './../models/manager.php';
    include_once './../models/Localisation_manager.php';

    // On instancie la base de données
    $manager = new Manager();
    $db = $database->getConnection();

    // On instancie les Emplacement
    $loc_mgr = new Localisation_manager($db);

   // On récupère les informations envoyées
   $donnees = json_decode(file_get_contents("php://input"));
   //var_dump($donnees); 
    
   if(!empty($donnees->id) && !empty($donnees->nom) && !empty($donnees->zone) && !empty($donnees->lat) && !empty($donnees->lon)){
    // Ici on a reçu les données
    // On hydrate notre objet
    $Loc_mgr->id = $donnees->id;
    $Loc_mgr->nom = $donnees->nom;
    $Loc_mgr->zone = $donnees->zone;
    $Loc_mgr->lat = $donnees->lat;
    $Loc_mgr->lon = $donnees->lon;
    //var_dump($Loc_mgr); 
   
    if($Loc_mgr->modifier()){
        // Ici la modification a fonctionné
        // On envoie un code 200
        http_response_code(200);
        echo json_encode(["message" => "La modification a été effectuée"]);
    }else{
        // Ici la création n'a pas fonctionné
        // On envoie un code 503
        http_response_code(503);
        echo json_encode(["message" => "La modification n'a pas été effectuée"]);         
    }
   }
}else{
    // On gère l'erreur
    http_response_code(405);
    echo json_encode(["message" => "La méthode n'est pas autorisée"]);
}