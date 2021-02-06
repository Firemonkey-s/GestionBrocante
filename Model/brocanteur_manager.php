<?php
	// Fichier de connection à la BDD
	require_once("manager.php");
	
	class brocanteur_manager extends manager{
		
		public function findAll(){
			// Récupération des brocanteurs dans la BDD
			$strRequete		= "SELECT private BrocanteurId, CarteIdentite, Rue, CP, Ville, ReservationEmplacement,
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
		
		public function getByBrocanteurId(){
			$strRequete		= "SELECT BrocanteurId, CarteIdentite, Rue, CP, Ville, ReservationEmplacement,
			MetreLineaire, RCN_, PersonneId
								FROM Brocanteur 
								WHERE BrocanteurId = '".$_SESSION['Brocanteur']['BrocanteurId']."' ";
			$requete 		= $this->_db->query($strRequete);
			return $requete->fetch();
		}
		/*
		public function updateBrocanteur($objBrocanteur, $boolPwd){
			$strRequete		= "UPDATE Brocanteur
								SET  CarteIdentite = '".$objBrocanteur->getCarteIdentite()."',
									Rue = '".$objBrocanteur->getRue()."',
                                    CP = '".$objBrocanteur->getCP()."',
                                    Ville = '".$objBrocanteur->getVille()."',
                                    BrocanteurId = '".$objBrocanteur->getBrocanteurId()."'";
			if ($boolPwd){
				$strRequete		.= ", Brocanteur_pwd = '".$objBrocanteur->getPwd()."'";		
			}				
			$strRequete		.= " WHERE BrocanteurId = '".$_SESSION['Brocanteur']['BrocanteurId']."' ";		

			return $this->_db->exec($strRequete);
		}
		*/
		public function editBrocanteur($objBrocanteur){
			$strReq = "UPDATE Brocanteur 
						SET BrocanteurId = :BrocanteurId, CarteIdentite=:CarteIdentite, Rue=:Rue, CP=:CP,
						Ville=:Ville, ReservationEmplacement=:ReservationEmplacement,
						MetreLineaire=:MetreLineaire, RCN_=:RCN_,PersonneId=:PersonneId
						WHERE BrocanteurId = :BrocanteurId";

			$prep	= $this->_myDatabase->prepare($strReq);

			$prep->bindValue(':BrocanteurId',$objBrocanteur->getBrocanteurId(), PDO::PARAM_INT);
			$prep->bindValue(':CarteIdentite', $objBrocanteur->getCarteIdentite(), PDO::PARAM_STR);
			$prep->bindValue(':Rue',$objBrocanteur->getRue(), PDO::PARAM_STR);
			$prep->bindValue(':CP',$objBrocanteur->getCP(), PDO::PARAM_INT);
			$prep->bindValue(':Ville',$objBrocanteur->getVille(), PDO::PARAM_STR);
			$prep->bindValue(':ReservationEmplacement',$objBrocanteur->getReservationEmplacement(), PDO::PARAM_STR);
			$prep->bindValue(':MetreLineaire',$objBrocanteur->getMetreLineaire(), PDO::PARAM_INT);
			$prep->bindValue(':RCN_', $objBrocanteur->getRCN_(), PDO::PARAM_STR);
			$prep->bindValue(':PersonneId',$objBrocanteur->getPersonneId(), PDO::PARAM_INT);
			return $prep->execute();
		}

		public function addBrocanteur($objBrocanteur){
			$strReq = "INSERT INTO Brocanteur 
			            (BrocanteurId, CarteIdentite, Rue, CP, Ville, ReservationEmplacement,
			 MetreLineaire, RCN_, PersonneId)
						VALUES (:BrocanteurId, :CarteIdentite, :Rue, :CP, :Ville, :ReservationEmplacement,
			 :MetreLineaire, :RCN_, :PersonneId)";
			$prep	= $this->_myDatabase->prepare($strReq);
			$prep->bindValue(':BrocanteurId', $objBrocanteur->getBrocanteurId(), PDO::PARAM_INT);
			$prep->bindValue(':CarteIdentite', $objBrocanteur->getCarteIdentite(), PDO::PARAM_STR);
			$prep->bindValue(':Rue',$objBrocanteur->getRue(), PDO::PARAM_STR);
			$prep->bindValue(':CP',$objBrocanteur->getCP(), PDO::PARAM_INT);
			$prep->bindValue(':Ville',$objBrocanteur->getVille(), PDO::PARAM_STR);
			$prep->bindValue(':ReservationEmplacement',$objBrocanteur->getReservationEmplacement(), PDO::PARAM_STR);
			$prep->bindValue(':MetreLineaire',$objBrocanteur->getMetreLineaire(), PDO::PARAM_INT);
			$prep->bindValue(':RCN_', $objBrocanteur->getRCN_(), PDO::PARAM_STR);
			$prep->bindValue(':PersonneId',$objBrocanteur->getPersonneId(), PDO::PARAM_INT);
			return $prep->execute();
		}

		public function deleteBrocanteur($BrocanteurId){
			$strReq = "DELETE FROM Brocanteur 
			            WHERE Brocanteurid = :BrocanteurId";
			$prep	= $this->_myDatabase->prepare($strReq);
			$prep->bindValue('BrocanteurId',$BrocanteurId, PDO::PARAM_INT);
			return $prep->execute();
		}
	}
    
    