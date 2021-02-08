    <?php 
	class reservation_class{
		// Attributs
		private $reservationId;
		private $date ;
		private $nombrePlace;
		private $BrocanteurId;
		        

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
			return $this->reservationId;
		}
		
		public function getDate (){
            $objDate = new DateTime($this->date);
			return $objDate->format("d/m/Y");
                }
		public function getNombrePlace(){
			return $this->nombrePlace;
		}
		public function getBrocanteurId(){
			return $this->brocanteurId;
		}
		
		
		
		// SETTERS 
		public function setReservationId($intReservationId){
			$this->reservationId = $intReservationId;
		}
		             
		public function setDate ($strDate ){
			$this->date  = $strDate ;
		}
		public function setnombrePlace($intnombrePlace){
			$this->nombrePlace = $int nombrePlace;
		}
		public function setBrocanteurId($intBrocanteurId){
			$this->brocanteurId = $intBrocanteurId;
		}
		
		
		
	}