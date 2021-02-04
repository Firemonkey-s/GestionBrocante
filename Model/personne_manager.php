<?php
	// Fichier de connection à la BDD
	require_once("manager.php");
	
	class personne_manager extends Manager{
		
		public function findAll(){
			// Récupération des utilisateurs dans la BDD
			$strRequete		= "SELECT PersonneId, PersonneId, PersonneId
								FROM users ";
			$requete 		= $this->_db->query($strRequete);
			return $requete->fetchAll();				
		}
		
		public function getByMail(){
			$strRequete		= "SELECT user_id, user_name, user_firstname, user_pwd
								FROM users 
								WHERE user_mail = '".$_POST['mail']."' ";
			$requete 		= $this->_db->query($strRequete);
			return $requete->fetch();
		}
		
		public function getById(){
			$strRequete		= "SELECT user_id, user_name, user_firstname, user_mail
								FROM users 
								WHERE user_id = '".$_SESSION['user']['user_id']."' ";
			$requete 		= $this->_db->query($strRequete);
			return $requete->fetch();
		}
		
		public function updateUser($objUser, $boolPwd){
			$strRequete		= "UPDATE users 
								SET user_name = '".$objUser->getName()."',
									user_firstname = '".$objUser->getFirstname()."',
									user_mail = '".$objUser->getMail()."'";
			if ($boolPwd){
				$strRequete		.= ", user_pwd = '".$objUser->getPwd()."'";		
			}				
			$strRequete		.= " WHERE user_id = '".$_SESSION['user']['user_id']."' ";		

			return $this->_db->exec($strRequete);
		}
		
	}
    
    