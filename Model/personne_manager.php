<?php
	// Fichier de connection à la BDD
	require_once("manager.php");
	
	class personne_manager extends manager{
		
		public function findAll(){
			// Récupération des personnes dans la BDD
			$strRequete		= "SELECT PersonneId, Nom, Prenom,Telephone,Email,RoleId
								FROM Personne ";
			$requete 		= $this->_db->query($strRequete);
			return $requete->fetchAll();				
		}
		
		public function getByMail(){
			$strRequete		= "SELECT PersonneId, Nom, Prenom,Telephone,Telephone,Email,RoleId
								FROM Personne 
								WHERE Email = '".$_POST['mail']."' ";
			$requete 		= $this->_db->query($strRequete);
			return $requete->fetch();
		}
		
		public function getById(){
			$strRequete		= "SELECT PersonneId, Nom, Prenom,Telephone,Telephone,Email,RoleId
								FROM Personne 
								WHERE PersonneId = '".$_POST['personne']['personneId']."' ";
			$requete 		= $this->_db->query($strRequete);
			return $requete->fetch();
		}
		
		public function editPersonne($objPersonne){
			$strReq = "UPDATE Personne 
						SET Nom =:nom,
						Prenom=:prenom, Emai=:email, RoleId=:roleId,
						Telephone=:telephone	
						WHERE PersonneId = :personneId";

			$prep	= $this->_db->prepare($strReq);
			$prep->bindValue(':personneId',$objPersonne->getPersonneId(), PDO::PARAM_INT);
			$prep->bindValue(':nom', $objPersonne->getNom(), PDO::PARAM_STR);
			$prep->bindValue(':prenom',$objPersonne->getPrenom(), PDO::PARAM_STR);
			$prep->bindValue(':telephone',$objPersonne->getTelephone(), PDO::PARAM_INT);
			$prep->bindValue(':email',$objPersonne->getEmail(), PDO::PARAM_STR);
			$prep->bindValue(':roleId',$objPersonne->getRoleId(), PDO::PARAM_INT);
			return $prep->execute();
		}

		public function addPersonne($objPersonne){
			$strReq = "INSERT INTO Personne 
			            (Nom, Prenom,Telephone,Email,RoleId)
						VALUES (:nom, :prenom,:telephone, :email, :roleId)";
			$prep	= $this->_db->prepare($strReq);	
			$prep->bindValue(':nom',$objPersonne->getNom(), PDO::PARAM_STR);
			$prep->bindValue(':prenom',$objPersonne->getPrenom(), PDO::PARAM_STR);
			$prep->bindValue(':telephone',$objPersonne->getTelephone(), PDO::PARAM_INT);
			$prep->bindValue(':email',$objPersonne->getEmail(), PDO::PARAM_STR);
			$prep->bindValue(':roleId',$objPersonne->getRoleId(), PDO::PARAM_INT);
			return $prep->execute();
		}

		public function deletePersonne($id){
			$strReq = "DELETE FROM Personne 
			            WHERE PersonneId = :personneId";
			$prep	= $this->_db->prepare($strReq);
			$prep->bindValue(':personneId',$id, PDO::PARAM_INT);
			return $prep->execute();
		}
	}
    