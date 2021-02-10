<?php 
	class Brocanteur_class{
		// Attributs en privé
		private $_brocanteurId;
		private $_carteIdentite;
		private $_rue;
		private $_cP;
		private $_ville;
		private $_reservationEmplacement;
		private $_metreLineaire;
		private  $_rCN_;
		private $_personneId;
        

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
			return $this->_brocanteurId;
		}
		public function getCarteIdentite(){
			return $this->_carteIdentite;
		}
		public function getRue(){
			return $this->_rue;
		}
		public function getCP(){
			return $this->_cP;
		}
		public function getVille(){
			return $this->_ville;
		}
		public function getReservationEmplacement(){
			return $this->_reservationEmplacement;
		}
		public function getMetreLineaire(){
			return $this->_metreLineaire;
		}
		public function getRCN_(){
			return $this->_rCN_;
		}
		public function getPersonneId(){
			return $this->_personneId;
		}
		
		
		/* SETTERS */
		public function setBrocanteurId($intBrocanteurId){
			$this->_brocanteurId = $intBrocanteurId;
		}
		public function setCarteIdentite($strCarteIdentite){
			$this->_carteIdentite = $strCarteIdentite;
		}
		public function setRue($strRue){
			$this->_rue = $strRue;
		}
		public function setCP($intCP){
			$this->_cP = $intCP;
		}
		public function setVille($strVille){
			$this->_ville = $strVille;
		}
		public function setReservationEmplacement($strReservationEmplacement){
			$this->_reservationEmplacement = $strReservationEmplacement;
		}	
		public function setMetreLineaire($intMetreLineaire){
			$this->_metreLineaire=$intMetreLineaire;
		}
		public function setRCN_($RNC){
			$this->_rCN_=$RCN_;
		}
		public function setPersonneId($PersonneId){
			$this->_personneId=$PersonneId;
		}
		
		
	}