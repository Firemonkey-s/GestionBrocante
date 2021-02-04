<?php 
	class pesonne_class{
		// Attributs en privé
		private $PersonneId;
		private $Nom;
		private $Prenom;
		private $Telephone;
		private $Email;
		private $RoleAgir;

		/ constructeur
		public function __construct(){
		}
		
		public function hydrate($arrPesonne){
			$this->setPersonneId($arrPesonne['PersonneId']);		
			$this->setNom($arrPesonne['Nom']);
			$this->setPrenom($arrPesonne['Prenom']);
			$this->setEmail($arrPerson['Email']);
			$this->setTelephone($arrPerson['Telephone']);
			$this->setRoleAgir($arrPerson['RoleId_Agir']);
		}
		
		/* GETTERS */
		public function getPersonneId(){
			return $this->PersonneId;
		}
		public function getNom(){
			return $this->Nom;
		}
		public function getPrenom(){
			return $this->Prenom;
		}
		public function getTelephone(){
			return $this->Telephone;
		}
		public function getEmail(){
			return $this->Email;
		}
		public function getRoleAgir(){
			return $this->RoleAgir;
		}
		
		/* SETTERS */
		public function setPersonneId($intPersonneId){
			$this->PersonneId = $intPersonneId;
		}
		public function setNom($strNom){
			$this->Nom = $strNom;
		}
		public function setPrenom($strPrenom){
			$this->Prenom = $strPrenom;
		}
		public function setTelephone($intTelephone){
			$this->Telephone = $intTelephone;
		}
		public function setEmail($strEmail){
			$this->Email = $strEmail;
		}
		public function setRoleAgir($intRoleAgir){
			$this->RoleAgir = $intRoleAgir;
		}	
		
		
	}