<?php
	// Fichier de connection à la BDD
    require_once("manager.php");
    	
	class role_manager extends manager{ 
		
		public function findAll(){
			// Récupération des roles dans la BDD
			$strRequete		= "SELECT RoleId,Titre
								FROM  Rolet ";//Role est un mot clé dans sql? pour ça, on met Rolet
			$requete 		= $this->_db->query($strRequete);
			return $requete->fetchAll();				
		}
		
		public function getRoleId(){
			$strRequete		= "SELECT roleId,Titre
								FROM Rolet 
								WHERE roleId = '".$_POST['roleId']."' ";
			$requete 		= $this->_db->query($strRequete);
			return $requete->fetch();
		}
		
		public function getByTitre(){
			$strRequete		= "SELECT roleId,Titre

								WHERE Titre= '".$_SESSION['rolet']['Titre']."' ";
			$requete 		= $this->_db->query($strRequete);
			return $requete->fetch();
		}

		public function editRole($objRole){
			$strReq = "UPDATE role 
						SET titre = :titre,
							
						WHERE roleid = :id";
			$prep	= $this->_myDatabase->prepare($strReq);
			$prep->bindValue(':titre', $objRole->getName(), PDO::PARAM_STR);
			$prep->bindValue(':id',$objRole->getRoleId(), PDO::PARAM_INT);
			return $prep->execute();
		}

		public function addRole($objRole){
			$strReq = "INSERT INTO role 
			            (titre)
						VALUES (:titre)";
			$prep	= $this->_myDatabase->prepare($strReq);
			$prep->bindValue(':titre', $objRole->getName(), PDO::PARAM_STR);
			$prep->bindValue(':id',$objRole->getRoleId(), PDO::PARAM_INT);
			return $prep->execute();
		}

		public function deleteRole($id){
			$strReq = "DELETE FROM role 
			            WHERE roleid = :id";
			$prep	= $this->_myDatabase->prepare($strReq);
			$prep->bindValue(':id',$id, PDO::PARAM_INT);
			return $prep->execute();
		}
		
	}
    
    