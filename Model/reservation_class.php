    <?php 
	class Reservation_class{
		// Attributs
		private $_reservationId;
		private $_date ;
		private $_nombrePlace;
		private $_brocanteurId;
		        

		// constructeur
		public function __construct(){
		}
		
		public function hydrate($arrPayement){
			$this->setReservationId($arrPayement['reservationId']);		
			$this->setDate ($arrPayement['date ']);
            $this->setnombrePlace($arrPerson[' nombrePlace']);
            $this->setBrocanteurId($arrPerson['brocanteurId']);
			
		}
		
		// GETTERS
		public function getReservationId(){
			return $this->_reservationId;
		}
		
		public function getDate (){
            $objDate = new DateTime($this->_date);
			return $objDate->format("d/m/Y");
                }
		public function getNombrePlace(){
			return $this->_nombrePlace;
		}
		public function getBrocanteurId(){
			return $this->_brocanteurId;
		}
		
		
		
		// SETTERS 
		public function setReservationId($intReservationId){
			$this->_reservationId = $intReservationId;
		}
		             
		public function setDate ($strDate ){
			$this->_date  = $strDate ;
		}
		public function setnombrePlace($intnombrePlace){
			$this->_nombrePlace = $intnombrePlace;
		}
		public function setBrocanteurId($intBrocanteurId){
			$this->_brocanteurId = $intBrocanteurId;
		}
		
		
		
	}