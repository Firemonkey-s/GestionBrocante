<?php 
	class Product{
		// Attributs en privé
		private $_idplace;
		private $_numplace;
		private $_zone;
		private $_localite;
		private $_lat;
		private $_long;
		private $_coordx;
		private $_coordy;
		private $_reservee;
		private $_metreLin;
		
		// constructeur
		public function __construct(){
		}
		
		public function hydrate($arrData){
			
			$this->setIdPlace($arrData['IdPlace']);
			$this->setNumPlace($arrData['NumPlace']);
			$this->setZone($arrData['Zone']);
			$this->setLocal($arrData['Rue']);
			$this->setLat($arrData['Latitude']);
			$this->setLong($arrData['Longitude']);
			$this->setCoordX($arrData['CoordX']);
			$this->setCoordY($arrData['CoordY']);
			$this->setReservee($arrData['Reservee']);
			$this->setMetreLin($arrData['Metre_Lin']);
			
		}
		
		/* GETTERS */
		public function getIdPlace(){
			return $this->_idplace;
		}
		public function getNumPlace(){
			return $this->_numplace;
		}
		public function getZone(){
			return $this->_zone;
		}
		public function getLocalite(){
			return $this->_localite;
		}
		public function getLat(){
			return $this->_lat;
		}
		
		public function getLong(){
			return $this->_long;
		}
		
		public function getCoordX(){
			return $this->_coordx;
		}
		
		public function getCoordY(){
			return $this->_coordy;
		}
		
		public function getReservee(){
			return $this->_reservee;
		}
		
		public function getMetreLin(){
			return $this->_metreLin;
		}

		/* SETTERS */
		public function setIdPlace($intIdPlace){
			$this->_idplace = $intIdPlace;
		}
		public function setNumPlace($intNumPlace){
			$this->_numplace = $intNumPlace;
		}
		public function setZone($strZone){
			$this->_zone = $strZone;
		}
		public function setLocalite($strLocalite){
			$this->_localite = $strLocalite;
		}
		public function setLat($floatLat){
			$this->_lat = $floatLat;
		}
		
		public function setLong($floatLong){
			$this->_long = $floatLong;
		}
		
		public function setCoordX($intCoordx){
			$this->_coordx = $intCoordx;
		}
		
		public function setCoordY($intCoordy){
			$this->_coordy = $intCoordy;
		}
		
		public function setReservee($strReservee){
			$this->_reservee = $strReservee;
		}
			
		public function setMetreLin($intMetreLin){
			$this->_metreLin = $intMetreLin;
		}	
		
		
		
	}