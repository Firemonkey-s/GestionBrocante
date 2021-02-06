<?php

	class manager{
		
		protected $_db;
		
		public function __construct(){
			try{
				// Connexion à la base de données
				$this->_db = new PDO("mysql:host=localhost:3306;dbname=Brocante", 
								"root",  //Nom d'utilisateur de la base de données
								"root",		 // Mot de passe de la base de données
								array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC) // Type de renvoi (Tableau contenant les noms de colonne)				
						); 
				
				$this->_db->exec("SET CHARACTER SET utf8"); // Pour résoudre les problèmes d'encodage

				// Configuration des exceptions
				$this->_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
			} catch(PDOException $e) { 
				echo "Échec : " . $e->getMessage(); 
			}
		}
	}