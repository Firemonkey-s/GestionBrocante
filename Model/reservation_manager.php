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
			$strRequete		= "SELECT reservationId, date,nombrePlace, brocanteurId

								WHERE brocanteurId = '".$_SESSION['reservation']['brocanteurId']."' ";
			$requete 		= $this->_db->query($strRequete);
			return $requete->fetch();
		}
		public function editReservation($objReservation){
			$strReq = "UPDATE Reservation 
						SET reservationId = :reservetionId, date= :date,
						nombrePlace=:nombrePlace, brocanteurId= :brocanteurId
							
						WHERE reservationId = :reservetionId";
			$prep	= $this->_myDatabase->prepare($strReq);
			$prep->bindValue(':reservetionId',$objReservation->getReservationId(), PDO::PARAM_INT);
			$prep->bindValue(':date', $objReservation->getDate(), PDO::PARAM_STR);
			$prep->bindValue(':nombrePlace',$objReservation->getnombrePlace(), PDO::PARAM_INT);
			$prep->bindValue(':brocanteurId',$objReservation->getBrocanteurId(), PDO::PARAM_INT);
			return $prep->execute();
		}

		public function addReservation($objReservation){
			$strReq = "INSERT INTO Reservation 
			            (reservationId, date,nombrePlace, brocanteurId)
						VALUES (:reservationId, :date,:nombrePlace, :brocanteurId)";
			$prep	= $this->_myDatabase->prepare($strReq);
			$prep->bindValue(':reservationId', $objReservation->getReservationId(), PDO::PARAM_INT);
			$prep->bindValue(':Date',$objReservation->getDate(), PDO::PARAM_STR);
			$prep->bindValue(':nombrePlace', $objReservation->getNombrePlace(), PDO::PARAM_INT);
			$prep->bindValue(':BrocanteurId', $objReservation->getReservationId(), PDO::PARAM_INT);
			return $prep->execute();
		}

		public function deleteReservation($id){
			$strReq = "DELETE FROM Reservation 
			            WHERE reservationid = :reservetionId";
			$prep	= $this->_myDatabase->prepare($strReq);
			$prep->bindValue(':reservetionId',$id, PDO::PARAM_INT);
			return $prep->execute();
		}
	}
    
    