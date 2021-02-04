        <?php 
	class payement_class{
		// Attributs
		private $PayementId;
		private $Montant;
		private $Date ;
		private $ModePayement;
		private $ReservationId;
		        

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
			return $this->PayementId;
		}
		public function getMontant(){
			return $this->Montant;
		}
		public function getDate (){
                        $objDate = new DateTime($this->Date);
			return $objDate->format("d/m/Y");
                }
		public function getModePayement(){
			return $this->ModePayement;
		}
		public function getReservationId(){
			return $this->ReservationId;
		}
		
		
		
		// SETTERS 
		public function setPayementId($intPayementId){
			$this->PayementId = $intPayementId;
		}
		public function setMontant($intMontant){
			$this->Montant = $intMontant;
                }
                
		public function setDate ($strDate ){
			$this->Date  = $strDate ;
		}
		public function setModePayement($intModePayement){
			$this->ModePayement = $intModePayement;
		}
		public function setReservationId($strReservationId){
			$this->ReservationId = $strReservationId;
		}
		
		
		
	}