<?php
// Headers requis
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST"); //-> definit la metode de l'API REST 
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// [LOGER] on verifie si l'utilisateur est connecte 
// session_start();

// On vérifie la méthode
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // [LOGER] on verifie si l'utilisateur est connecté
    if(false){
    //if(!isset($_SESSION['user']['id'])){
        // On gère l'erreur
        http_response_code(400);
        echo json_encode(["message" => "Vous n'est pas autorisée a modifier les données"]);

    }else{
        // On inclut les fichiers de configuration et d'accès aux données
        include_once './config/Database.php';
        include_once './models/Emplacement.php';

        // On instancie la base de données
        $database = new Database();
        $db = $database->getConnection();

        // On instancie les Emplacement
        $emplacement = new Emplacement($db);

        // On récupère les informations envoyées

        $donneesJson = file_get_contents("php://input");
        $donnees = json_decode($donneesJson);
        // var_dump($donnees->lon); 
        //  echo json_encode(["donneesJson" => $donneesJson]);

        //$donnees = $donneesJson.emplacement;
        //echo json_encode(["donnees" => $donnees]);
        if(!empty($donnees->nom) && !empty($donnees->zone) && !empty($donnees->lat) && !empty($donnees->lon))
        {
            // Ici on a reçu les données
            // On hydrate notre objet
            $emplacement->nom = $donnees->nom;
            $emplacement->zone = $donnees->zone;
            $emplacement->lat = $donnees->lat;
            $emplacement->lon = $donnees->lon;
        
            if($emplacement->creer()){
                // Ici la création a fonctionné
                // On envoie un code 201
                http_response_code(201);
                echo json_encode(["message" => "L'ajout a été effectué"]);
            }else{
                // Ici la création n'a pas fonctionné
                // On envoie un code 503
                http_response_code(503);
                echo json_encode(["message" => "L'ajout n'a pas été effectué"]);         
            }
        }else{
            http_response_code(400);
            echo json_encode(["message" => "la structure des donnes est erronée /n donne: " + $donnees->nom ]+ "/n zone: " + $donnees->zone + "/n lat: " +  $donnees->lat+ "/n lon: " + $donnees->lon);
        }
    }
}else{
    // On gère l'erreur
    http_response_code(405);
    echo json_encode(["message" => "La méthode n'est pas autorisée"]);
}