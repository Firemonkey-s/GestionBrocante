<?php 
	class brocanteur_class{
		// Attributs en privé
		private $BrocanteurId;
		private $CarteIdentite;
		private $Rue;
		private $CP;
		private $Ville;
		private $ReservationEmplacement;
		private $MetreLineaire;
		private  $RCN_;
		private $PersonneId;
        

		// constructeur
		public function __construct(){
		}
		
		public function hydrate($arrBrocanteur){
			$this->setBrocanteurId($arrBrocanteur['BrocanteurId']);		
			$this->setCarteIdentite($arrBrocanteur['CarteIdentite']);
			$this->setRue($arrBrocanteur['Rue']);
			$this->setVille($arrPerson['Ville']);
			$this->setCP($arrPerson['CP']);
			$this->setReservationEmplacement($arrPerson['ReservationEmplacement']);
			$this->setMetreLineaire($arrPerson['MetreLineaire']);
			$this->setRCN_($arrPerson['RCN_']);
			$this->setPersonneId($arrPerson['PersonneId']);
		}
		
		/* GETTERS */
		public function getBrocanteurId(){
			return $this->BrocanteurId;
		}
		public function getCarteIdentite(){
			return $this->CarteIdentite;
		}
		public function getRue(){
			return $this->Rue;
		}
		public function getCP(){
			return $this->CP;
		}
		public function getVille(){
			return $this->Ville;
		}
		public function getReservationEmplacement(){
			return $this->ReservationEmplacement;
		}
		public function getMetreLineaire(){
			return $this->MetreLineaire;
		}
		public function getRCN_(){
			return $this->RCN_;
		}
		public function getPersonneId(){
			return $this->PersonneId;
		}
		
		
		/* SETTERS */
		public function setBrocanteurId($intBrocanteurId){
			$this->BrocanteurId = $intBrocanteurId;
		}
		public function setCarteIdentite($strCarteIdentite){
			$this->CarteIdentite = $strCarteIdentite;
		}
		public function setRue($strRue){
			$this->Rue = $strRue;
		}
		public function setCP($intCP){
			$this->CP = $intCP;
		}
		public function setVille($strVille){
			$this->Ville = $strVille;
		}
		public function setReservationEmplacement($strReservationEmplacement){
			$this->ReservationEmplacement = $strReservationEmplacement;
		}	
		public function setMetreLineaire($intMetreLineaire){
			$this->MetreLineaire=$intMetreLineaire;
		}
		public function setRCN_($RNC){
			$this->RCN_=$RCN_;
		}
		public function setPersonneId($PersonneId){
			$this->PersonneId=$PersonneId;
		}
		
		
	}