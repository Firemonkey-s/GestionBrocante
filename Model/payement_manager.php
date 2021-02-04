<?php
	// Fichier de connection à la BDD
    require_once("manager.php");
   	
	class payement_manager extends manager{ 
		
		public function findAll(){
			// Récupération des payements dans la BDD
			$strRequete		= "SELECT private PayementId, Montant, Date,ModePayement, ReservationId, PersonneId
								FROM Brocanteur ";
			$requete 		= $this->_db->query($strRequete);
			return $requete->fetchAll();				
		}
		
		public function getByPayementId(){
			$strRequete		= "SELECT PayementId, Montant, Date,ModePayement, ReservationId
								FROM Payement 
								WHERE PayementId = '".$_POST['PayementId']."' ";
			$requete 		= $this->_db->query($strRequete);
			return $requete->fetch();
		}
		
		public function getByReservationId(){
			$strRequete		= "SELECT PayementId, Montant, Date,ModePayement, ReservationId

								WHERE ReservationId = '".$_SESSION['Payement']['ReservationId']."' ";
			$requete 		= $this->_db->query($strRequete);
			return $requete->fetch();
		}
		
	}
    
    