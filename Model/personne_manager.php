<?php
	// Fichier de connection à la BDD
	require_once("manager.php");
	
	class personne_manager extends manager{
		
		public function findAll(){
			// Récupération des personnes dans la BDD
			$strRequete		= "SELECT PersonneId, 
			                          Nom, 
									  Prenom,
									  Email,
									  Telephone,
									  RoleId
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

		public function addPerson($objPersonne){
			$strReq = "INSERT INTO personne (Nom, Prenom, Telephone, Email, RoleId) 
			VALUES (:nom, :prenom, :telephone, :email, :roleid)";
			$prep	= $this->_db->prepare($strReq);
			$prep->bindValue(':nom', $objPersonne->getNom(), PDO::PARAM_STR);
			$prep->bindValue(':prenom', $objPersonne->getPreNom(), PDO::PARAM_STR);
			$prep->bindValue(':email', $objPersonne->getEmail(), PDO::PARAM_STR);
			$prep->bindValue(':telephone', $objPersonne->getTelephone(), PDO::PARAM_STR);
			$prep->bindValue(':roleid',$objPersonne->getRoleId(), PDO::PARAM_INT);
			return $prep->execute();	
		}
		
		public function editPersonne($objPersonne){
			$strRequete		= "UPDATE Personne 
								SET Nom = :nom,
									Prenom = :prenom,
									Telephone = :telephone,
									RoleId = :roleid,
									Email = :email;
							   WHERE Personneid = :personneid ";
			$prep	= $this->_db->prepare($strRequete);	
			$prep->bindValue(':personneid',$objPersonne->getPersonneId(), PDO::PARAM_INT);
			$prep->bindValue(':nom', $objPersonne->getNom(), PDO::PARAM_STR);
			$prep->bindValue(':prenom', $objPersonne->getPreNom(), PDO::PARAM_STR);
			$prep->bindValue(':email', $objPersonne->getEmail(), PDO::PARAM_STR);
			$prep->bindValue(':telephone', $objPersonne->getTelephone(), PDO::PARAM_STR);
			$prep->bindValue(':roleid',$objPersonne->getRoleId(), PDO::PARAM_INT);
			return $prep->execute();	

			return $this->_db->exec($strRequete);
		}

		public function deletePersonne($Id){
			$strRequete		= "delete from Personne where Personneid = :personneid";
			$prep	= $this->_db->prepare($strRequete);	
			$prep->bindValue(':personneid',$Id, PDO::PARAM_INT);
			return $prep->execute();	

			return $this->_db->exec($strRequete);

		}
	}
    
    