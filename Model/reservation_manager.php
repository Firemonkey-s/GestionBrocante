<?php
	// Fichier de connection à la BDD
    require_once("manager.php");
    	
	class reservation_manager extends manager{ 
		
		public function findAll(){
			// Récupération des reservations dans la BDD
			$strRequete		= "SELECT private reservationId, Date,nombrePlace, BrocanteurId
								FROM Reservation ";
			$requete 		= $this->_db->query($strRequete);
			return $requete->fetchAll();				
		}
		
		public function getByreservationId(){
			$strRequete		= "SELECT reservationId, Date,nombrePlace, BrocanteurId
								FROM Reservation 
								WHERE reservationId = '".$_POST['reservationId']."' ";
			$requete 		= $this->_db->query($strRequete);
			return $requete->fetch();
		}
		
		public function getByBrocanteurId(){
			$strRequete		= "SELECT reservationId, Date,nombrePlace, BrocanteurId

								WHERE BrocanteurId = '".$_SESSION['reservation']['BrocanteurId']."' ";
			$requete 		= $this->_db->query($strRequete);
			return $requete->fetch();
		}
		
	}
    
    