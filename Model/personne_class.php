<?php 
	class personne_class{
		// Attributs en privé
		private $_personneId;
		private $_nom;
		private $_prenom;
		private $_telephone;
		private $_email;
		private $_roleId;

		// constructeur
		public function __construct(){
		}
		
		public function hydrate($arrPersonne){
			//$this->setPersonneId($arrPersonne['PersonneId']);		
			$this->setNom($arrPersonne['Nom']);
			$this->setPrenom($arrPersonne['Prenom']);
			$this->setEmail($arrPersonne['Email']);
			$this->setTelephone($arrPersonne['Telephone']);
			$this->setRoleId($arrPersonne['RoleId']);
		}
		
		/* GETTERS */
		public function getPersonneId(){
			return $this->_personneId;
		}
		public function getNom(){
			return $this->_nom;
		}
		public function getPrenom(){
			return $this->_prenom;
		}
		public function getTelephone(){
			return $this->_telephone;
		}
		public function getEmail(){
			return $this->_email;
		}
		public function getRoleId(){
			return $this->_roleId;
		}
		
		/* SETTERS */
		public function setPersonneId($intPersonneId){
			$this->_personneId = $intPersonneId;
		}
		public function setNom($strNom){
			$this->_nom = $strNom;
		}
		public function setPrenom($strPrenom){
			$this->_prenom = $strPrenom;
		}
		public function setTelephone($intTelephone){
			$this->_telephone = $intTelephone;
		}
		public function setEmail($strEmail){
			$this->_email = $strEmail;
		}
		public function setRoleId($intRoleId){
			$this->_roleId = $intRoleId;
		}	
		
		
	}