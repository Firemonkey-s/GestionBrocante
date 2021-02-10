<?php
	// Fichier de connection à la BDD
    require_once("manager.php");
   	
	class Payement_manager extends manager{ 
		
		public function findAll(){
			// Récupération des payements dans la BDD
			$strRequete		= "SELECT PayementId, Montant, Date,ModePayement, ReservationId
								FROM Payement ";
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

								WHERE ReservationId = '".$_POST['Payement']['ReservationId']."' ";
			$requete 		= $this->_db->query($strRequete);
			return $requete->fetch();
		}
		public function editPayement($objPayement){
			$strReq = "UPDATE Payement 
						SET PayementId = :payementId,  Montant=:montant, Date=:date,ModePayement=:modePayment, ReservationId=:reservationId
						WHERE PayementId = :payementId";

			$prep	= $this->_db->prepare($strReq);

			$prep->bindValue(':payementId',$objPayement->getPayementId(), PDO::PARAM_INT);
			$prep->bindValue(':montant', $objPayement->getMontant(), PDO::PARAM_STR);
			$prep->bindValue(':date',$objPayement->getDate(), PDO::PARAM_STR);
			$prep->bindValue(':modePayement',$objPayement->getModePayement(), PDO::PARAM_INT);
			$prep->bindValue(':reservationId',$objPayement->getReservationId(), PDO::PARAM_STR);
			return $prep->execute();
		}

		public function addPayement($objPayement){
			$strReq = "INSERT INTO Payement 
			            (PayementId, Montant, Date, ModePayement, ReservationId, ReservationEmplacement,
			 MetreLineaire, RCN_, PersonneId)
						VALUES (:payementId, :montant, :date, :modePayement, :reservationId, :reservationEmplacement,
			 :MetreLineaire, :RCN_, :PersonneId)";
			$prep	= $this->_myDatabase->prepare($strReq);
			$prep->bindValue(':payementId', $objPayement->getPayementId(), PDO::PARAM_INT);
			$prep->bindValue(':montant', $objPayement->getMontant(), PDO::PARAM_STR);
			$prep->bindValue(':date',$objPayement->getDate(), PDO::PARAM_STR);
			$prep->bindValue(':modePayement',$objPayement->getModePayement(), PDO::PARAM_INT);
			$prep->bindValue(':reservationId',$objPayement->getReservationId(), PDO::PARAM_STR);
			return $prep->execute();
		}

		public function deletePayement($id){
			$strReq = "DELETE FROM Payement 
			            WHERE Payementid = :payementId";
			$prep	= $this->_db->prepare($strReq);
			$prep->bindValue(':payementId',$id, PDO::PARAM_INT);
			return $prep->execute();
		}
	}
    
    