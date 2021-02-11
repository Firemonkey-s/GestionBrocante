<?php
	// Fichier de connection à la BDD
	require_once("manager.php");
	
	class Brocanteur_manager extends manager{
		
		public function findAll(){
			// Récupération des brocanteurs dans la BDD
			$strRequete		= "SELECT BrocanteurId, CarteIdentite, Rue, CP, Ville, ReservationEmplacement,
			 MetreLineaire, RCN_, PersonneId
								FROM Brocanteur ";
			$requete 		= $this->_db->query($strRequete);
			return $requete->fetchAll();				
		}
		
		public function getByBrocanteurId(){
			$strRequete		= "SELECT BrocanteurId, CarteIdentite, Rue, CP, Ville, ReservationEmplacement,
			MetreLineaire, RCN_, PersonneId
								FROM Brocanteur 
								WHERE BrocanteurId = '".$_POST['BrocanteurId']."' ";
			$requete 		= $this->_db->query($strRequete);
			return $requete->fetch();
		}
		
		
		
		public function editBrocanteur($objBrocanteur){
			$strReq = "UPDATE Brocanteur 
						SET BrocanteurId = :brocanteurId, CarteIdentite=:carteIdentite, Rue=:rue, CP=:cP,
						Ville=:ville, ReservationEmplacement=:reservationEmplacement,
						MetreLineaire=:metreLineaire, RCN_=:rCN_,PersonneId=:personneId
						WHERE BrocanteurId = :brocanteurId";

			$prep	= $this->_db->prepare($strReq);

			$prep->bindValue(':brocanteurId',$objBrocanteur->getBrocanteurId(), PDO::PARAM_INT);
			$prep->bindValue(':carteIdentite', $objBrocanteur->getCarteIdentite(), PDO::PARAM_STR);
			$prep->bindValue(':rue',$objBrocanteur->getRue(), PDO::PARAM_STR);
			$prep->bindValue(':cP',$objBrocanteur->getCP(), PDO::PARAM_INT);
			$prep->bindValue(':ville',$objBrocanteur->getVille(), PDO::PARAM_STR);
			$prep->bindValue(':reservationEmplacement',$objBrocanteur->getReservationEmplacement(), PDO::PARAM_STR);
			$prep->bindValue(':metreLineaire',$objBrocanteur->getMetreLineaire(), PDO::PARAM_INT);
			$prep->bindValue(':rCN_', $objBrocanteur->getRCN_(), PDO::PARAM_STR);
			$prep->bindValue(':personneId',$objBrocanteur->getPersonneId(), PDO::PARAM_INT);
			return $prep->execute();
		}

		public function addBrocanteur($objBrocanteur){
			$strReq = "INSERT INTO Brocanteur 
			            (BrocanteurId, CarteIdentite, Rue, CP, Ville, ReservationEmplacement,
			 MetreLineaire, RCN_, PersonneId)
						VALUES (:brocanteurId, :carteIdentite, :rue, :cP, :ville, :reservationEmplacement,
			 :metreLineaire, :rCN_, :personneId)";
			$prep	= $this->_myDatabase->prepare($strReq);
			$prep->bindValue(':brocanteurId', $objBrocanteur->getBrocanteurId(), PDO::PARAM_INT);
			$prep->bindValue(':carteIdentite', $objBrocanteur->getCarteIdentite(), PDO::PARAM_STR);
			$prep->bindValue(':rue',$objBrocanteur->getRue(), PDO::PARAM_STR);
			$prep->bindValue(':cP',$objBrocanteur->getCP(), PDO::PARAM_INT);
			$prep->bindValue(':ville',$objBrocanteur->getVille(), PDO::PARAM_STR);
			$prep->bindValue(':reservationEmplacement',$objBrocanteur->getReservationEmplacement(), PDO::PARAM_STR);
			$prep->bindValue(':metreLineaire',$objBrocanteur->getMetreLineaire(), PDO::PARAM_INT);
			$prep->bindValue(':rCN_', $objBrocanteur->getRCN_(), PDO::PARAM_STR);
			$prep->bindValue(':personneId',$objBrocanteur->getPersonneId(), PDO::PARAM_INT);
			return $prep->execute();
		}

		public function deleteBrocanteur($BrocanteurId){
			$strReq = "DELETE FROM Brocanteur 
			            WHERE Brocanteurid = :brocanteurId";
			$prep	= $this->_myDatabase->prepare($strReq);
			$prep->bindValue(':brocanteurId',$BrocanteurId, PDO::PARAM_INT);
			return $prep->execute();
		}
	}
    
    