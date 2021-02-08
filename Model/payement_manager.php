<?php
	// Fichier de connection à la BDD
    require_once("manager.php");
   	
	class payement_manager extends manager{ 
		
		public function findAll(){
			// Récupération des payements dans la BDD
			$strRequete		= "SELECT private PayementId, Montant, Date,ModePayement, ReservationId
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
						SET PayementId = :PayementId,  Montant=:Montant, Date=:Date,ModePayement=:ModePayment, ReservationId=:ReservationId
						WHERE PayementId = :PayementId";

			$prep	= $this->_myDatabase->prepare($strReq);

			$prep->bindValue(':PayementId',$objPayement->getPayementId(), PDO::PARAM_INT);
			$prep->bindValue(':Montant', $objPayement->getMontant(), PDO::PARAM_STR);
			$prep->bindValue(':Date',$objPayement->getDate(), PDO::PARAM_STR);
			$prep->bindValue(':ModePayement',$objPayement->getModePayement(), PDO::PARAM_INT);
			$prep->bindValue(':ReservationId',$objPayement->getReservationId(), PDO::PARAM_STR);
			return $prep->execute();
		}

		public function addPayement($objPayement){
			$strReq = "INSERT INTO Payement 
			            (PayementId, Montant, Date, ModePayement, ReservationId, ReservationEmplacement,
			 MetreLineaire, RCN_, PersonneId)
						VALUES (:PayementId, :Montant, :Date, :ModePayement, :ReservationId, :ReservationEmplacement,
			 :MetreLineaire, :RCN_, :PersonneId)";
			$prep	= $this->_myDatabase->prepare($strReq);
			$prep->bindValue(':PayementId', $objPayement->getPayementId(), PDO::PARAM_INT);
			$prep->bindValue(':Montant', $objPayement->getMontant(), PDO::PARAM_STR);
			$prep->bindValue(':Date',$objPayement->getDate(), PDO::PARAM_STR);
			$prep->bindValue(':ModePayement',$objPayement->getModePayement(), PDO::PARAM_INT);
			$prep->bindValue(':ReservationId',$objPayement->getReservationId(), PDO::PARAM_STR);
			return $prep->execute();
		}

		public function deletePayement($id){
			$strReq = "DELETE FROM Payement 
			            WHERE Payementid = PayementId";
			$prep	= $this->_myDatabase->prepare($strReq);
			$prep->bindValue('PayementId',$id, PDO::PARAM_INT);
			return $prep->execute();
		}
	}
    
    