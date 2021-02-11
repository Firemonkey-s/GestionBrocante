<?php
	// Fichier de connection à la BDD
	require("manager.php");
	
	class Emplacement_manager extends manager{
		
		
	public function FindAll(){

		// Récupération des articles dans la BDD
		$strRequete 		= "SELECT IdPlace, NumPlace,Zone,Rue,Latitude,Longitude,CoordX,CoordY,Reservee,Metre_Lin 
									FROM emplacements";
	
	
		$requete 		= $this->_db->query($strRequete);
		
		return $requete->fetchAll();	
		}
	
	
	}
	
