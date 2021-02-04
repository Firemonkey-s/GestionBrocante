<?php
	// Fichier de connection à la BDD
	require_once("manager.php");
	
	class brocanteur_manager extends manager{
		
		public function findAll(){
			// Récupération des brocanteurs dans la BDD
			$strRequete		= "SELECT private BrocanteurId, CarteIdentite, Rue, CP, Ville, PersonneId
								FROM Brocanteur ";
			$requete 		= $this->_db->query($strRequete);
			return $requete->fetchAll();				
		}
		
		public function getByBrocanteurId(){
			$strRequete		= "SELECT BrocanteurId, CarteIdentite, Rue, CP, Ville, PersonneId
								FROM Brocanteur 
								WHERE BrocanteurId = '".$_POST['BrocanteurId']."' ";
			$requete 		= $this->_db->query($strRequete);
			return $requete->fetch();
		}
		
		public function getByBrocanteurId(){
			$strRequete		= "SELECT BrocanteurId, CarteIdentite, Rue, CP, Ville, PersonneId
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
                                    PersonneId = '".$objBrocanteur->getPersonneId()."'";
			if ($boolPwd){
				$strRequete		.= ", Brocanteur_pwd = '".$objBrocanteur->getPwd()."'";		
			}				
			$strRequete		.= " WHERE BrocanteurId = '".$_SESSION['Brocanteur']['BrocanteurId']."' ";		

			return $this->_db->exec($strRequete);
		}
		*/
	}
    
    