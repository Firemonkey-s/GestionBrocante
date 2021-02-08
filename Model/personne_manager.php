<?php
	// Fichier de connection à la BDD
	require_once("manager.php");
	
	class personne_manager extends manager{
		
		public function findAll(){
			// Récupération des personnes dans la BDD
			$strRequete		= "SELECT PersonneId, Nom, Pernom,Email,RoleId
								FROM Personne ";
			$requete 		= $this->_db->query($strRequete);
			return $requete->fetchAll();				
		}
		
		public function getByMail(){
			$strRequete		= "SELECT PersonneId, Nom, Pernom,Telephone,Email,RoleId
								FROM Personne 
								WHERE Email = '".$_POST['mail']."' ";
			$requete 		= $this->_db->query($strRequete);
			return $requete->fetch();
		}
		
		public function getById(){
			$strRequete		= "SELECT PersonneId, Nom, Pernom,Telephone,Email,RoleId
								FROM Personne 
								WHERE PersonneId = '".$_['personne']['personneId']."' ";
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
		public function editPersonne($objPersonne){
			$strReq = "UPDATE Personne 
						SET PersonneId = PersonneId, Nom =:Nom,
						Prenom=:Prenom, Emai=:Email, RoleId=:RoleId,
						Telephone=:Telephone	
						WHERE PersonneId = PersonneId";

			$prep	= $this->_myDatabase->prepare($strReq);
			$prep->bindValue('PersonneId',$objPersonne->getPersonneId(), PDO::PARAM_INT);
			$prep->bindValue(':Nom', $objPersonne->getNom(), PDO::PARAM_STR);
			$prep->bindValue(':Prenom',$objPersonne->getPrenom(), PDO::PARAM_STR);
			$prep->bindValue('Telephone',$objPersonne->getTelephone(), PDO::PARAM_INT);
			$prep->bindValue(':Email',$objPersonne->getEmail(), PDO::PARAM_STR);
			$prep->bindValue('RoleId',$objPersonne->getRoleId(), PDO::PARAM_INT);
			return $prep->execute();
		}

		public function addPersonne($objPersonne){
			$strReq = "INSERT INTO Personne 
			            (PersonneId, Nom, Pernom,Telephone,Email,RoleId)
						VALUES (:PersonneId, :Nom, :Pernom, :Telephone, :Email, :RoleId)";
			$prep	= $this->_myDatabase->prepare($strReq);
			$prep->bindValue(':PersonneId', $objPersonne->getPersonneId(), PDO::PARAM_INT);
			$prep->bindValue(':Date',$objPersonne->getDate(), PDO::PARAM_STR);
			$prep->bindValue(':nombrePlace', $objPersonne->getNombrePlace(), PDO::PARAM_INT);
			$prep->bindValue(':BrocanteurId', $objPersonne->getPersonneId(), PDO::PARAM_INT);
			return $prep->execute();
		}

		public function deletePersonne($id){
			$strReq = "DELETE FROM Personne 
			            WHERE Personneid = PersonneId";
			$prep	= $this->_myDatabase->prepare($strReq);
			$prep->bindValue('PersonneId',$id, PDO::PARAM_INT);
			return $prep->execute();
		}
	}
    
	
    
    