        <?php 
	class Payement_class{
		// Attributs
		private $_payementId;
		private $_montant;
		private $_date ;
		private $_modePayement;
		private $_reservationId;
		        

		// constructeur
		public function __construct(){
		}
		
		public function hydrate($arrPayement){
			$this->setPayementId($arrPayement['PayementId']);		
			$this->setMontant($arrPayement['Montant']);
			$this->setDate ($arrPayement['Date ']);
                        $this->setModePayement($arrPerson['ModePayement']);
                        $this->setReservationId($arrPerson['ReservationId']);
			
		}
		
		// GETTERS
		public function getPayementId(){
			return $this->_payementId;
		}
		public function getMontant(){
			return $this->_montant;
		}
		public function getDate (){
                        $objDate = new DateTime($this->_date);
			return $objDate->format("d/m/Y");
                }
		public function getModePayement(){
			return $this->_modePayement;
		}
		public function getReservationId(){
			return $this->_reservationId;
		}
		
		
		
		// SETTERS 
		public function setPayementId($intPayementId){
			$this->_payementId = $intPayementId;
		}
		public function setMontant($intMontant){
			$this->_montant = $intMontant;
                }
                
		public function setDate ($strDate ){
			$this->_date  = $strDate ;
		}
		public function setModePayement($intModePayement){
			$this->_modePayement = $intModePayement;
		}
		public function setReservationId($strReservationId){
			$this->_reservationId = $strReservationId;
		}
		
		
		
	}