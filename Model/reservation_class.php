    <?php 
	class reservation_class{
		// Attributs
		private $ReservationId;
		private $Date ;
		private $nombrePlace;
		private $BrocanteurId;
		        

		// constructeur
		public function __construct(){
		}
		
		public function hydrate($arrPayement){
			$this->setReservationId($arrPayement['ReservationId']);		
			$this->setDate ($arrPayement['Date ']);
            $this->setnombrePlace($arrPerson[' nombrePlace']);
            $this->setBrocanteurId($arrPerson['BrocanteurId']);
			
		}
		
		// GETTERS
		public function getReservationId(){
			return $this->ReservationId;
		}
		
		public function getDate (){
            $objDate = new DateTime($this->Date);
			return $objDate->format("d/m/Y");
                }
		public function get nombrePlace(){
			return $this-> nombrePlace;
		}
		public function getBrocanteurId(){
			return $this->BrocanteurId;
		}
		
		
		
		// SETTERS 
		public function setReservationId($intReservationId){
			$this->ReservationId = $intReservationId;
		}
		             
		public function setDate ($strDate ){
			$this->Date  = $strDate ;
		}
		public function setnombrePlace($intnombrePlace){
			$this-> nombrePlace = $int nombrePlace;
		}
		public function setBrocanteurId($intBrocanteurId){
			$this->BrocanteurId = $intBrocanteurId;
		}
		
		
		
	}