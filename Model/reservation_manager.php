<?php
	// Fichier de connection à la BDD
    require_once("manager.php");
    	
	class Reservation_manager extends manager{ 
		
		public function findAll(){
			// Récupération des reservations dans la BDD
			$strRequete		= "SELECT ReservationId, Date,NombrePlace, BrocanteurId
								FROM Reservation ";
			$requete 		= $this->_db->query($strRequete);
			return $requete->fetchAll();				
		}
		
		public function getByreservationId(){
			$strRequete		= "SELECT ReservationId, Date,NombrePlace, BrocanteurId
								FROM Reservation 
								WHERE ReservationId = '".$_POST['reservationId']."' ";
			$requete 		= $this->_db->query($strRequete);
			return $requete->fetch();
		}
		
		public function getByBrocanteurId(){
			$strRequete		= "SELECT ReservationId, Date,NombrePlace, BrocanteurId

								WHERE BrocanteurId = '".$_POST['reservation']['brocanteurId']."' ";
			$requete 		= $this->_db->query($strRequete);
			return $requete->fetch();
		}
		public function editReservation($objReservation){
			$strReq = "UPDATE Reservation 
						SET ReservationId = :reservetionId, Date= :date,
						NombrePlace=:nombrePlace, BrocanteurId= :brocanteurId
							
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
			            (ReservationId, Date,NombrePlace, BrocanteurId)
						VALUES (:reservationId, :date,:nombrePlace, :brocanteurId)";
			$prep	= $this->_myDatabase->prepare($strReq);
			$prep->bindValue(':reservationId', $objReservation->getReservationId(), PDO::PARAM_INT);
			$prep->bindValue(':date',$objReservation->getDate(), PDO::PARAM_STR);
			$prep->bindValue(':nombrePlace', $objReservation->getNombrePlace(), PDO::PARAM_INT);
			$prep->bindValue(':brocanteurId', $objReservation->getReservationId(), PDO::PARAM_INT);
			return $prep->execute();
		}

		public function deleteReservation($id){
			$strReq = "DELETE FROM Reservation 
			            WHERE Reservationid = :reservetionId";
			$prep	= $this->_myDatabase->prepare($strReq);
			$prep->bindValue(':reservetionId',$id, PDO::PARAM_INT);
			return $prep->execute();
		}
	}
    
    