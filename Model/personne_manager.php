<?php
	// Fichier de connection à la BDD
	require_once("manager.php");
	
	class personne_manager extends manager{
		
		public function findAll(){
			// Récupération des personnes dans la BDD
			$strRequete		= "SELECT PersonneId, Nom, Pernom,RoleId
								FROM Personne ";
			$requete 		= $this->_db->query($strRequete);
			return $requete->fetchAll();				
		}
		
		public function getByMail(){
			$strRequete		= "SELECT PersonneId, Nom, Pernom,RoleId
								FROM Personne 
								WHERE Email = '".$_POST['mail']."' ";
			$requete 		= $this->_db->query($strRequete);
			return $requete->fetch();
		}
		
		public function getById(){
			$strRequete		= "SELECT PersonneId, Nom, Pernom,RoleId,Email
								FROM Personne 
								WHERE PersonneId = '".$_SESSION['personne']['personneId']."' ";
			$requete 		= $this->_db->query($strRequete);
			return $requete->fetch();
		}
		/*
		public function updatePersonne($objPersonne, $boolPwd){
			$strRequete		= "UPDATE Personne 
								SET Nom = '".$objPersonne->getName()."',
									Pernom = '".$objPersonne->getPrenom()."',
									Email = '".$objPersonne->getEmail()."'";
			if ($boolPwd){
				$strRequete		.= ", Personne_pwd = '".$objPersonne->getPwd()."'";		
			}				
			$strRequete		.= " WHERE personneid = '".$_SESSION['Personne']['personneid']."' ";		

			return $this->_db->exec($strRequete);
		}
		*/
	}
    
    