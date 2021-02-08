  <?php 
	class role_class{
		// Attributs
		private $RoleId;
		private $Titre ;
		
		        

		// constructeur
		public function __construct(){
		}
		
		public function hydrate($arrRole){
			$this->setRoleId($arrRole['RoleId']);		
			$this->setTitre ($arrRole['Titre ']);
           
			
		}
		
		// GETTERS
		public function getRoleId(){
			return $this->RoleId;
		}
		
		public function getTitre(){
			return $this->getTitre;
		}
		
		
		
		// SETTERS 
		public function setRoleId($intRoleId){
			$this->RoleId = $intRoleId;
		}
		             
		public function setTitre ($strTitre ){
			$this->Titre  = $strTitre ;
		}
		
		
		
	}